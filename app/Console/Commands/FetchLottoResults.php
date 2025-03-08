<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Panther\Client;
use App\Models\LottoResult;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FetchLottoResults extends Command
{
    protected $signature = 'lotto:fetch';
    protected $description = 'ดึงข้อมูลผลสลากกินแบ่งจากเว็บ GLO และบันทึกลงฐานข้อมูล';

    public function handle()
    {
        $this->info("🔄 กำลังดึงข้อมูลหวยจาก GLO...");

        try {
            $client = Client::createChromeClient(null, [
                '--no-sandbox',
                '--disable-dev-shm-usage',
                '--headless',
                '--disable-gpu'
            ]);

            $crawler = $client->request('GET', 'https://www.glo.or.th/mission/awarding/orderby-time');
        } catch (\Exception $e) {
            Log::error("❌ ไม่สามารถโหลดหน้าเว็บ GLO: " . $e->getMessage());
            $this->error("❌ ไม่สามารถโหลดหน้าเว็บ GLO");
            return;
        }

        // ✅ ดึงวันที่ออกรางวัล
        try {
            $draw_date_text = $crawler->filter('.award-lotto-header .topic')->text();
            preg_match('/(\d{1,2})\s(\S+)\s(\d{4})/', $draw_date_text, $matches);

            $thai_months = [
                'มกราคม' => 1, 'กุมภาพันธ์' => 2, 'มีนาคม' => 3, 'เมษายน' => 4,
                'พฤษภาคม' => 5, 'มิถุนายน' => 6, 'กรกฎาคม' => 7, 'สิงหาคม' => 8,
                'กันยายน' => 9, 'ตุลาคม' => 10, 'พฤศจิกายน' => 11, 'ธันวาคม' => 12
            ];
            $draw_date = Carbon::create($matches[3] - 543, $thai_months[$matches[2]], $matches[1])->toDateString();
            $this->info("📅 วันที่ออกหวย: $draw_date");
        } catch (\Exception $e) {
            Log::error("❌ ไม่สามารถดึงวันที่ออกหวย: " . $e->getMessage());
            return;
        }

        // ✅ ดึงข้อมูลรางวัล
        $lotto_results = [
            'first_prize' => null,
            'three_digit' => [],
            'two_digit' => null,
            'near_first_prize' => [],
            'other_prizes' => []
        ];

        $crawler->filter('.award-lotto-item')->each(function ($node) use (&$lotto_results) {
            try {
                $prize_name = trim($node->filter('.award-name')->text());
                $prize_numbers = $node->filterXPath('//div[contains(@class, "award-number")] | //p[contains(@class, "number-bold")] | //p[contains(@class, "number")]')
                    ->each(fn($n) => trim($n->text()));
                
                $prize_numbers = array_merge(...array_map(fn($num) => preg_split('/\s+/', trim($num)), $prize_numbers));
                
                if (empty($prize_numbers)) {
                    Log::warning("⚠️ ข้อมูลรางวัล {$prize_name} ว่างเปล่า");
                }
                
                Log::info("📌 ดึงข้อมูล {$prize_name}: " . json_encode($prize_numbers));

                if (preg_match('/รางวัลที่ 1/', $prize_name)) {
                    $lotto_results['first_prize'] = $prize_numbers[0] ?? null;
                } elseif (preg_match('/เลขหน้า 3 ตัว|เลขท้าย 3 ตัว/', $prize_name)) {
                    $lotto_results['three_digit'] = array_merge($lotto_results['three_digit'], $prize_numbers);
                } elseif (preg_match('/เลขท้าย 2 ตัว/', $prize_name)) {
                    $lotto_results['two_digit'] = $prize_numbers[0] ?? null;
                } elseif (preg_match('/รางวัลข้างเคียง/', $prize_name)) {
                    $lotto_results['near_first_prize'] = $prize_numbers;
                } else {
                    $lotto_results['other_prizes'][] = [
                        'prize_name' => $prize_name,
                        'prize_numbers' => $prize_numbers
                    ];
                }
            } catch (\Exception $e) {
                Log::warning("⚠️ ดึงข้อมูลรางวัล {$prize_name} ไม่สำเร็จ: " . $e->getMessage());
            }
        });

        Log::info("📊 ข้อมูลทั้งหมดที่ดึงได้: " . json_encode($lotto_results, JSON_UNESCAPED_UNICODE));

        // ✅ บันทึกลงฐานข้อมูล
        try {
            DB::transaction(function () use ($draw_date, $lotto_results) {
                LottoResult::updateOrCreate(
                    ['draw_date' => $draw_date],
                    [
                        'first_prize' => $lotto_results['first_prize'],
                        'three_digit' => json_encode($lotto_results['three_digit'], JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR),
                        'two_digit' => $lotto_results['two_digit'],
                        'near_first_prize' => json_encode($lotto_results['near_first_prize'], JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR),
                        'other_prizes' => json_encode($lotto_results['other_prizes'], JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR)
                    ]
                );
            });
            $this->info("🎉 ดึงข้อมูลหวยสำเร็จ!");
        } catch (\Exception $e) {
            Log::error("❌ ไม่สามารถบันทึกข้อมูลลงฐานข้อมูล: " . $e->getMessage());
        }
    }
}
