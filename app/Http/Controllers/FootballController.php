<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use DOMDocument;
use DOMXPath;

class FootballController extends Controller
{
    public function index_tips()
    {
        $today = now()->format('Y-m-d');
        $filePath = "football/tips/{$today}.html";

        // ถ้ามีไฟล์อยู่แล้ว ใช้จาก local
        if (Storage::exists($filePath)) {
            $html = Storage::get($filePath);
        } else {
            // ดึงจากเว็บแล้วบันทึก
            $url = 'https://www.7mscorethai.live/football-view.html';
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0'
            ])->get($url);

            if (!$response->successful()) {
                return response()->json(['error' => 'ไม่สามารถดึงข้อมูลได้'], 500);
            }

            $html = $response->body();
            Storage::put($filePath, $html); // บันทึกลงไฟล์
        }

        // แปลง DOM
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html);
        libxml_clear_errors();

        $xpath = new DOMXPath($dom);
        $data = [];
        $currentLeague = '';

        $today = now()->format('Y-m-d'); // หรือใช้ date('Y-m-d');

        $data = [
            'date' => $today,
            'leagues' => []
        ];

        $currentLeague = '';
        $leagueIndex = -1;

        foreach ($xpath->query('//table//tr') as $tr) {
            $class = $tr->getAttribute('class');

            if ($class === 'league') {
                $currentLeague = trim($tr->textContent);
                $leagueIndex++;
                $data['leagues'][$leagueIndex] = [
                    'league' => $currentLeague,
                    'matches' => []
                ];
                continue;
            }

            if ($class === 'match') {
                $tds = $tr->getElementsByTagName('td');
                if ($tds->length >= 5) {
                    $match = [
                        'time' => trim($tds[0]->textContent),
                        'home' => trim($tds[1]->textContent),
                        'away' => trim($tds[2]->textContent),
                        'odds' => trim($tds[3]->textContent),
                        'prediction' => trim(preg_replace('/^\s*ทำนายว่า\s*/u', '', $tds[4]->textContent))
                    ];
                    $data['leagues'][$leagueIndex]['matches'][] = $match;
                }
            }
        }
        

        return response()->json($data);
    }

    public function index_handicap()
    {

        
        $today = now()->format('Y-m-d');
        $filePath = "football/handicap/{$today}.html";
        
        // 1. Load จากไฟล์ถ้ามี, ไม่งั้นดึงจากเว็บ
        if (Storage::exists($filePath)) {
            $html = Storage::get($filePath);
        } else {
            $url = 'https://www.7mscorethai.live/handicap.html';
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0'
            ])->get($url);
            if (!$response->successful()) {
                return response()->json(['error' => 'ไม่สามารถดึงข้อมูล handicap'], 500);
            }
            $html = $response->body();
            Storage::put($filePath, $html);
        }
        
        // 2. Parse ด้วย DOM
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html);
        libxml_clear_errors();
        $xpath = new DOMXPath($dom);
        
        // 3. เตรียมข้อมูล
        $data = [
            'date' => $today,
            'leagues' => []
        ];
        $currentLeague = '';
        $leagueIndex = -1;
        
        foreach ($xpath->query('//div[@id="handicap"]//table//tr') as $tr) {
            $class = $tr->getAttribute('class');
        
            if ($class === 'league') {
                $currentLeague = trim($tr->textContent);
                $leagueIndex++;
                $data['leagues'][$leagueIndex] = [
                    'league' => $currentLeague,
                    'matches' => []
                ];
                continue;
            }
        
            if ($class === 'match') {
                $tds = $tr->getElementsByTagName('td');
                if ($tds->length >= 5) {
                    // ดึงราคาบอลจาก innerHTML
                    $oddsHtml = '';
                    foreach ($tds[2]->childNodes as $node) {
                        if ($node->nodeType === XML_TEXT_NODE) {
                            $oddsHtml .= trim($node->textContent) . ' ';
                        }
                    }
        
                    $match = [
                        'time' => trim($tds[0]->textContent),
                        'home' => trim($tds[1]->textContent),
                        'odds' => trim($oddsHtml),
                        'away' => trim($tds[3]->textContent),
                        'prediction' => trim(preg_replace('/^\s*/u', '', $tds[4]->textContent)),
                    ];
                    $data['leagues'][$leagueIndex]['matches'][] = $match;
                }
            }
        }
        return response()->json($data);


    }
    public function index_fixtures()
    {
           $today = now()->format('Y-m-d');
            $filePath = "football/fixtures/{$today}.html";

            if (Storage::exists($filePath)) {
                $html = Storage::get($filePath);
            } else {
                $url = 'https://www.7mscorethai.live/fixtures.html';
                $response = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0'
                ])->get($url);
                if (!$response->successful()) {
                    return response()->json(['error' => 'โหลด fixtures ไม่สำเร็จ'], 500);
                }
                $html = $response->body();
                Storage::put($filePath, $html);
            }

            libxml_use_internal_errors(true);
            $dom = new DOMDocument();
            $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html);
            libxml_clear_errors();
            $xpath = new DOMXPath($dom);

            $data = [
                'date' => $today,
                'days' => []
            ];

            // ค้นหาทุก <div class="programball day_X">
            $days = $xpath->query('//div[contains(@class,"programball")]');

            foreach ($days as $dayDiv) {
                $matches = [];
                $currentLeague = '';
                $dayTitleNode = $xpath->query('.//thead//tr[@class="day"]/th', $dayDiv);
                $dayTitle = $dayTitleNode->length > 0 ? trim($dayTitleNode[0]->textContent) : null;

                $rows = $xpath->query('.//tbody/tr', $dayDiv);

                foreach ($rows as $tr) {
                    $class = $tr->getAttribute('class');

                    if ($class === 'league') {
                        $leagueLink = $xpath->query('.//a', $tr);
                        $currentLeague = $leagueLink->length > 0 ? trim($leagueLink[0]->textContent) : 'ไม่ระบุลีก';
                        continue;
                    }

                    if ($class === 'match') {
                        $tds = $tr->getElementsByTagName('td');
                        if ($tds->length >= 4) {
                            $matches[] = [
                                'league' => $currentLeague,
                                'time' => trim($tds[0]->textContent),
                                'home' => trim($tds[1]->textContent),
                                'away' => trim($tds[3]->textContent),
                            ];
                        }
                    }
                }

                if ($matches) {
                    $data['days'][] = [
                        'day' => $dayTitle,
                        'matches' => $matches
                    ];
                }
            }
        return response()->json($data);

    }
   


public function index_live_scores()
{
    $url = 'https://www.7mscorethai.live/soccer-score.html';

    $response = Http::withHeaders([
        'User-Agent' => 'Mozilla/5.0'
    ])->get($url);

    if (!$response->successful()) {
        return response()->json(['error' => 'ไม่สามารถดึงข้อมูล'], 500);
    }

    $html = $response->body();

    libxml_use_internal_errors(true);
    $dom = new \DOMDocument();
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html);
    libxml_clear_errors();

    $xpath = new \DOMXPath($dom);

    $data = [
        'date' => now()->format('Y-m-d'),
        'leagues' => []
    ];

    $leagueName = '';
    $leagueIndex = -1;

    foreach ($xpath->query('//table//tr') as $tr) {
        $class = $tr->getAttribute('class');

        if ($class === 'league') {
            // ดึงชื่อจาก <a>
            $link = $tr->getElementsByTagName('a');
            if ($link->length > 0) {
                $leagueName = trim($link[0]->textContent);
                $leagueIndex++;
                $data['leagues'][$leagueIndex] = [
                    'league' => $leagueName,
                    'matches' => []
                ];
            }
        }

        if ($class === 'match') {
            $tds = $tr->getElementsByTagName('td');

            if ($tds->length >= 7) {
                $match = [
                    'time'      => trim($tds[0]->textContent),
                    'status'    => trim($tds[1]->textContent),
                    'home'      => trim($tds[2]->textContent),
                    'score'     => trim($tds[3]->textContent),
                    'away'      => trim($tds[4]->textContent),
                    'ht'        => trim($tds[5]->textContent),
                    'handicap'  => trim($tds[6]->textContent),
                ];

                $data['leagues'][$leagueIndex]['matches'][] = $match;
            }
        }
    }

    return response()->json($data);
}

}
