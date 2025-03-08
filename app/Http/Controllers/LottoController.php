<?php

namespace App\Http\Controllers;

use App\Models\LottoResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DOMDocument;
use App\Models\FCMToken;

class LottoController extends Controller
{
    // ✅ ดึงผลหวยล่าสุด
    public function latest()
    {
        return response()->json(LottoResult::orderBy('draw_date', 'desc')->first());
    }

    // ✅ ดึงประวัติหวยย้อนหลัง
    public function history()
    {
        return response()->json(LottoResult::orderBy('draw_date', 'desc')->take(10)->get());
    }

    // ✅ ตรวจหวยจากหมายเลขที่กรอก
    public function checkLotto(Request $request)
    {
        $number = $request->input('number');
        $latestLotto = LottoResult::orderBy('draw_date', 'desc')->first();

        $result = ['status' => 'ไม่ถูกรางวัล', 'message' => 'หมายเลขนี้ไม่ถูกรางวัลในงวดล่าสุด'];

        if ($latestLotto->first_prize === $number) {
            $result = ['status' => 'ถูกรางวัลที่ 1', 'message' => '🎉 ยินดีด้วย! คุณถูกรางวัลที่ 1'];
        } elseif (in_array($number, json_decode($latestLotto->three_digit))) {
            $result = ['status' => 'ถูกรางวัลเลขท้าย 3 ตัว', 'message' => '🎉 คุณถูกรางวัลเลขท้าย 3 ตัว'];
        } elseif ($latestLotto->two_digit === $number) {
            $result = ['status' => 'ถูกรางวัลเลขท้าย 2 ตัว', 'message' => '🎉 คุณถูกรางวัลเลขท้าย 2 ตัว'];
        }

        return response()->json($result);
    }
   // 📌 ดึงข้อมูลหวยย้อนหลังเป็น JSON พร้อมลำดับ No
   public function getLotteryData()
   {
       $data = [
           ["date" => "2025-03-01", "first_prize" => "818894", "three_digit_front" => ["139", "530"], "three_digit_back" => ["656", "781"], "two_digit" => "54"],
           ["date" => "2025-02-16", "first_prize" => "847377", "three_digit_front" => ["268", "613"], "three_digit_back" => ["652", "001"], "two_digit" => "50"],
           ["date" => "2025-02-01", "first_prize" => "558700", "three_digit_front" => ["285", "418"], "three_digit_back" => ["824", "685"], "two_digit" => "51"],
           ["date" => "2025-01-17", "first_prize" => "807779", "three_digit_front" => ["961", "699"], "three_digit_back" => ["448", "477"], "two_digit" => "23"],
           ["date" => "2025-01-02", "first_prize" => "730209", "three_digit_front" => ["446", "065"], "three_digit_back" => ["376", "297"], "two_digit" => "51"],
           ["date" => "2024-12-16", "first_prize" => "097863", "three_digit_front" => ["290", "742"], "three_digit_back" => ["881", "339"], "two_digit" => "21"]
       ];

       // 📌 เพิ่ม `No` ให้กับข้อมูล โดยงวดล่าสุดเป็น No = 1
       $data = array_map(function ($item, $index) {
           $item['No'] = $index + 1;
           return $item;
       }, $data, array_keys($data));

       return response()->json([
        'result' => true,
        'message' => 'ดึงข้อมูลสำเร็จ',
        'data' => $data
    ]);
   }
   public function getLotteryLastData()
   {
       $data = [
 
       ];

       // 📌 เพิ่ม `No` ให้กับข้อมูล โดยงวดล่าสุดเป็น No = 1
       $data = array_map(function ($item, $index) {
           $item['No'] = $index + 1;
           return $item;
       }, $data, array_keys($data));


          return response()->json([
                'result' => true,
                'message' => 'ดึงข้อมูลสำเร็จ',
                'data' => $data
            ]);
   }
   public function getSetting()
   {
       $data = [
 
       ];

       // 📌 เพิ่ม `No` ให้กับข้อมูล โดยงวดล่าสุดเป็น No = 1
       $data = array_map(function ($item, $index) {
           $item['No'] = $index + 1;
           return $item;
       }, $data, array_keys($data));


          return response()->json([
                'result' => true,
                'message' => 'ดึงข้อมูลสำเร็จ',
                'app_name_th' => 'HuayBee',
                'app_name_en' => 'HuayBee',
                'app_name_zh' => '好运蜂',
                'app_theme_color_hex' => '0xFFeeb50e',
                'app_theme_color' => '#eeb50e',
                'app_theme_color_rgb' => 'RGB(238, 181, 14)',
                'home_webview_url_th' => 'https://bee-lotto.com/web/lotto/th',
                'home_webview_url_en' => 'https://bee-lotto.com/web/lotto/en',
                'home_webview_url_zh' => 'https://bee-lotto.com/web/lotto/zh',
                'app_share_url' => 'https://bee-lotto.com',
            ]);
   }
   public function fetchNews()
    {
        $feeds = [
         
            "Sanook" => "https://rssfeeds.sanook.com/rss/feeds/sanook/horoscope.index.xml",
         
        ];

        $newsList = [];
    
        foreach ($feeds as $source => $url) {
            $rss = new DOMDocument();
            $rss->load($url);
            $items = $rss->getElementsByTagName('item');

            foreach ($items as $item) {
                $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
                $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
                $date = $item->getElementsByTagName('pubDate')->item(0)->nodeValue;

                $newsList[] = [
                    'title' => $title,
                    'link' => $link,
                    'date' => date('Y-m-d H:i:s', strtotime($date)),
                    'source' => $source
                ];
            }
        }

        return response()->json([
            'result' => true,
            'message' => 'ดึงข่าวสำเร็จ',
            'data' => $newsList
        ]);
    }


    public function device_token(Request $request) {
        $request->validate([
            'device_token' => 'required|string'
        ]);
    
        if (FCMToken::where('device_token', $request->device_token)->exists()) {
            return response()->json(['message' => 'FCM Token already exists'], 200);
        }
    
        $userId =  null;
    
        $token = FCMToken::create([
            'user_id' => $userId,
            'device_token' => $request->device_token
        ]);
    
        return response()->json(['message' => 'FCM Token saved successfully', 'data' => $token], 200);
    }
    
   
}
