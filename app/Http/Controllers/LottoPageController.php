<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LottoResult;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class LottoPageController extends Controller
{
    public function index($lang= 'th')
    {
        // ✅ รายการภาษาที่รองรับ
        $supportedLanguages = ['th', 'en', 'zh'];

        // ✅ ตรวจสอบว่าภาษาที่ส่งมาถูกต้อง
        if (!in_array($lang, $supportedLanguages)) {
            abort(404, "Language not supported");
        }

        // ✅ ตั้งค่าภาษาใน Laravel
        App::setLocale($lang);

        // ✅ ใช้ Cache เพื่อลดการ Query ซ้ำ (เก็บผลลัพธ์ 10 นาที)
        $latestLotto = Cache::remember('latest_lotto', 600, function () {
            return LottoResult::orderBy('draw_date', 'desc')->first();
        });

        $historyLotto = Cache::remember('history_lotto', 600, function () {
            return LottoResult::orderBy('draw_date', 'desc')->take(10)->get();
        });

        if ($latestLotto) {
            $latestLotto->three_digit = json_decode($latestLotto->three_digit, true);
            $latestLotto->near_first_prize = json_decode($latestLotto->near_first_prize, true);
            $latestLotto->second_prize = json_decode($latestLotto->second_prize, true);
            $latestLotto->third_prize = json_decode($latestLotto->third_prize, true);
            $latestLotto->fourth_prize = json_decode($latestLotto->fourth_prize, true);
            $latestLotto->fifth_prize = json_decode($latestLotto->fifth_prize, true);
        }

        // ✅ ป้องกันปัญหาถ้าผลลัพธ์เป็น NULL
        $latestLotto = $latestLotto ?? null;
        $historyLotto = $historyLotto ?? collect([]);

        // ✅ ส่งข้อมูลไปยัง View
        return view('lotto.index', compact('latestLotto', 'historyLotto', 'lang'));
    }
}
