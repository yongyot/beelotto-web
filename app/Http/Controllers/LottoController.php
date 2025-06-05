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
                'home_webview_url_th' => 'https://bee168huay.com/broker/superhuaybee?openExternalBrowser=1',
                'home_webview_url_en' => 'https://bee168huay.com/broker/superhuaybee?openExternalBrowser=1',
                'home_webview_url_zh' => 'https://bee168huay.com/broker/superhuaybee?openExternalBrowser=1',
                 'app_share_url' => 'https://bee168huay.com/broker/superhuaybee?openExternalBrowser=1',
               //  'home_webview_url_th' => 'https://huaybee789.com/broker/id/superhuaybee?openExternalBrowser=1',
               //  'home_webview_url_en' => 'https://huaybee789.com/broker/id/superhuaybee?openExternalBrowser=1',
               //  'home_webview_url_zh' => 'https://huaybee789.com/broker/id/superhuaybee?openExternalBrowser=1',
               //  'app_share_url' => 'https://huaybee789.com/broker/id/superhuaybee?openExternalBrowser=1',


                'app_is_menu' => true,
            ]);
   }
   public function getSettingTH()
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
        'app_name' => 'หวยบี',
   
        'home_webview_url' => 'https://bee-lotto.com/web/th/lotto/th',
        'app_theme_color_hex' => '0xFFeeb50e',
        'app_theme_color' => '#eeb50e',
        'app_theme_color_rgb' => 'RGB(238, 181, 14)',
        'home_webview_url_th' => 'https://bee-lotto.com/web/th/lotto/th',
        'home_webview_url_en' => 'https://bee-lotto.com/web/th/lotto/th',
        'home_webview_url_zh' => 'https://bee-lotto.com/web/th/lotto/th',
        'app_share_url' => 'https://pathumrat-phr.blogspot.com/2025/04/privacy-policy.html',
        'app_is_menu' => true,
        'lotto_result' => [
            'date' => '16 มีนาคม 2568',
            'url' => 'https://news.sanook.com/lotto/check/16032568/',
            'prize_1' => '757563',
            'front_3' => ['595', '927'],
            'last_3' => ['457', '309'],
            'last_2' => '32'
        ],
        'banner_items' => [
        
            [
                "title" => "คอหวยมาขอโชค กุมารทองเจ้าสัวเฮง ไม่ผิดหวังได้",
                "url" => "https://aduang.co/",
                "image" => "https://aduang-contents.okbcdn.net/upload/638387799047762059.jpg",
                "date" => "23 เม.ย. 68",
                "category" => "เลขเด็ด",
                "source" => "sanook.com",
                "detail_image" => "https://aduang-contents.okbcdn.net/upload/638387799047762059.jpg"
              ],
     
        ],
        "new_items" => [
            [
                "title" => "10 อันดับ เลขเด็ดขายดีที่สุดงวดนี้ 16/4/68 หวยแม่จำเนียร แนวทางงวดนี้",
                "url" => "https://www.sanook.com/news/9777078/",
                "image" => "https://s.isanook.com/ns/0/ud/1955/9777078/newproject(12).jpg?ip/resize/w728/q80/jpg",
                "date" => "23 เม.ย. 68",
                "category" => "เลขเด็ด",
                "source" => "sanook.com",
                "detail_image" => "https://s.isanook.com/ns/0/ud/1955/9777078/newproject(12).jpg?ip/resize/w728/q80/jpg"
              ],
              [
                "title" => "แนวทาง 10 เลขดังมาแรง จาก แม่ทำเนียน หวยสงกรานต์ล่าสุด 16 เมษายน 2568",
                "url" => "https://today.line.me/th/v2/article/qogLp2D",
                "image" => "https://today-obs.line-scdn.net/0hOFrXNbAkEGlPIQH-oXxvPnd3HBh8RwpgbURYCTl1TQw2DV5sJhNDCj52HUUyE1RqbxULWjpzTlkwFQM2dg/w1200",
                "date" => "23 เม.ย. 68",
                "category" => "เลขเด็ด",
                "source" => "sanook.com",
                "detail_image" => "https://today-obs.line-scdn.net/0hOFrXNbAkEGlPIQH-oXxvPnd3HBh8RwpgbURYCTl1TQw2DV5sJhNDCj52HUUyE1RqbxULWjpzTlkwFQM2dg/w1200"
              ],
            [
              "title" => "คอหวยมาขอโชค กุมารทองเจ้าสัวเฮง ไม่ผิดหวังได้",
              "url" => "https://www.thairath.co.th/lottery/news/2853172",
              "image" => "https://static.thairath.co.th/media/Dtbezn3nNUxytg04avfjBLapB6RfL6CcCR83SrzSXZvoxx.webp",
              "date" => "23 เม.ย. 68",
              "category" => "เลขเด็ด",
              "source" => "sanook.com",
              "detail_image" => "https://static.thairath.co.th/media/Dtbezn3nNUxytg04avfjBLapB6RfL6CcCR83SrzSXZvoxx.webp"
            ],
            [
              "title" => "คอหวย แห่ขูดเลขเด็ด คานโบสถ์เก่าอายุ 120 ปี ตกน้ำมัน",
              "url" => "https://www.matichon.co.th/region/news_3699649",
              "image" => "https://www.matichon.co.th/wp-content/uploads/2022/11/%E0%B8%9B%E0%B8%81-%E0%B9%80%E0%B8%A5%E0%B8%82%E0%B9%80%E0%B8%94%E0%B9%87%E0%B8%94.jpg",
              "date" => "26 มี.ค. 68",
              "category" => "เลขเด็ด",
              "source" => "matichon",
               "detail_image" => "https://www.matichon.co.th/wp-content/uploads/2022/11/%E0%B8%9B%E0%B8%81-%E0%B9%80%E0%B8%A5%E0%B8%82%E0%B9%80%E0%B8%94%E0%B9%87%E0%B8%94.jpg"

            ],
            [
                "title" => "คอหวย แห่ส่องเลขเด็ด ปลาไหลเผือกสีทอง-ชมพู ชาวบ้านเผย สัมผัสแล้วสื่อสารได้ เชื่อช่วยค้ำคูณให้โชค",
                "url" => "https://www.matichon.co.th/region/news_4820590",
                "image" => "https://www.matichon.co.th/wp-content/uploads/2024/10/%E0%B8%AD%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B8%97%E0%B8%AD%E0%B8%876.jpg",
                "date" => "26 มี.ค. 68",
                "category" => "เลขเด็ด",
                "source" => "matichon",
                 "detail_image" => "https://www.matichon.co.th/wp-content/uploads/2024/10/%E0%B8%AD%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B8%97%E0%B8%AD%E0%B8%876.jpg"
  
              ],
              [
                'title' => 'ดูดวงเดือนพฤษภาคม 2568 การงาน การเงิน ความรัก โชคลาภ ครบทั้ง 12 ราศี',
                'image' => 'https://static.thairath.co.th/media/00_A5B2854203C13E1280.webp',
                'url' => 'https://www.thairath.co.th/horoscope/interesting/2854203',
                'date' => '23 เม.ย. 68',
                'category' => 'ทำนายทายทัก',
                'detail_image' => 'https://static.thairath.co.th/media/00_A5B2854203C13E1280.webp',
            ],
            [
                'title' => 'เคล็ดลับเสริมดวง 12 ราศี พลิกร้ายกลายเป็นดี ทำแล้วรวยตลอดพฤษภาคม 2568',
                'image' => 'https://static.thairath.co.th/media/00_A5B2854084C1E1280.webp',
                'url' => 'https://www.thairath.co.th/horoscope/belief/2854084',
                'date' => '23 เม.ย. 68',
                'category' => 'ความเชื่อ',
                'detail_image' => 'https://static.thairath.co.th/media/00_A5B2854084C1E1280.webp',
            ],
          
          ]
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
    

    public function getScanCheck(Request $request)
    {

        if($request->number == "266227"){


            return response()->json([
                'result' => true,
                'message' => 'ดีใจด้วยถูก รางวัลที่ 1 ให้ตรวจสอบให้แน่นใจข้อมูลผลสลากกินแบ่งรัฐบาลนำมาจากสำนักงานสลากกินแบ่งรัฐบาล (www.glo.or.th)',
    
            ]);

        }else if($request->number == "413" || $request->number == "254"  || $request->number == "760" || $request->number == "474"){

  


                return response()->json([
                    'result' => true,
                    'message' => 'ดีใจด้วยถูก เลขหน้า 3 ตัว ให้ตรวจสอบให้แน่นใจข้อมูลผลสลากกินแบ่งรัฐบาลนำมาจากสำนักงานสลากกินแบ่งรัฐบาล (www.glo.or.th)',
        
                ]);
    
            
        }
        else if($request->number == "85"){

  


            return response()->json([
                'result' => true,
                'message' => 'ดีใจด้วยถูก เลขหน้า 2 ตัว ให้ตรวจสอบให้แน่นใจข้อมูลผลสลากกินแบ่งรัฐบาลนำมาจากสำนักงานสลากกินแบ่งรัฐบาล (www.glo.or.th)',
    
            ]);

        
    }
        else{
            return response()->json([
                'result' => false,
                'message' => 'เสียใจ ไม่ถูกรายงวัล ให้ตรวจสอบให้แน่นใจข้อมูลผลสลากกินแบ่งรัฐบาลนำมาจากสำนักงานสลากกินแบ่งรัฐบาล (www.glo.or.th)',
    
            ]);

        }
    
 
       
 
    }
    public function getSettinAll()
    {
      
 
 
           return response()->json([
                 'result' => true,
                 'message' => 'ดึงข้อมูลสำเร็จ',

               //  'app_url_policy' => 'https://huaybee789.com/broker/id/superhuaybee2?openExternalBrowser=1',
               //  'app_share_url' => 'https://huaybee789.com/broker/id/superhuaybee2?openExternalBrowser=1',

                 'app_url_policy' => 'https://bee168huay.com/broker/superhuaybee2?openExternalBrowser=1',
                 'app_share_url' => 'https://bee168huay.com/broker/superhuaybee2?openExternalBrowser=1',
            //    'app_url_policy' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
             //   'app_share_url' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
                 'app_is_policy' => true,
             ]);
    }


    public function getSettinProjectAll($channel,$code)
    {
      //ใช้สำรหับทำ config ทุกแอพ
 
        if($code =="7bbed257-5306-4975-80ef-c2d1649ecc17"){

                    //App huaybee 789  https://top-forecast.site
            return response()->json([
                'result' => true,
                'message' => 'ดึงข้อมูลสำเร็จ',
                'code' => $code,
              //  'app_url_policy' => 'https://huaybee789.com/broker/id/superhuaybee2?openExternalBrowser=1',
              //  'app_share_url' => 'https://huaybee789.com/broker/id/superhuaybee2?openExternalBrowser=1',
                'app_url_policy' => 'https://bee168huay.com/broker/superhuaybee2?openExternalBrowser=1',
                'app_share_url' => 'https://bee168huay.com/broker/superhuaybee2?openExternalBrowser=1',
              // 'app_url_policy' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
              // 'app_share_url' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
                'app_is_policy' => true,
            ]);

        }
        else if($code =="488c06a1-27d5-42ef-a670-34ace84c8753"){
               //App upfavip  beemagicnumber.shop
            return response()->json([
                'result' => true,
                'message' => 'ดึงข้อมูลสำเร็จ',
                'code' => $code,
              //  'app_url_policy' => 'https://huaybee789.com/broker/id/superhuaybee2?openExternalBrowser=1',
              //  'app_share_url' => 'https://huaybee789.com/broker/id/superhuaybee2?openExternalBrowser=1',
           //  'app_url_policy' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
             //   'app_share_url' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
             //  'app_url_policy' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
             //   'app_share_url' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
             'app_url_policy' => 'https://member.ufabet-vip.cam/register.php?u=ufabbscsa0004',
             'app_share_url' => 'https://member.ufabet-vip.cam/register.php?u=ufabbscsa0004',

             //  'app_url_policy' => 'https://www.ufabet-vip.cam',
              // 'app_share_url' => 'https://www.ufabet-vip.cam',
                'app_is_policy' => true,
            ]);

        }
        else if($code =="488c06a1-27d5-42ef-a670-34ace86323445"){
            //App hang 36   bmibalance.club
            return response()->json([
                'result' => true,
                'message' => 'ดึงข้อมูลสำเร็จ',
                'code' => $code,
              //  'app_url_policy' => 'https://huaybee789.com/broker/id/superhuaybee2?openExternalBrowser=1',
              //  'app_share_url' => 'https://huaybee789.com/broker/id/superhuaybee2?openExternalBrowser=1',
           //  'app_url_policy' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
             //   'app_share_url' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
               'app_url_policy' => 'https://member.ufabet-vip.cam/register.php?u=ufabbscsa0004',
                'app_share_url' => 'https://member.ufabet-vip.cam/register.php?u=ufabbscsa0004',


             //  'app_url_policy' => 'https://www.ufabet-vip.cam',
              // 'app_share_url' => 'https://www.ufabet-vip.cam',
                'app_is_policy' => true,
                'app_is_policy_name' => "Hang36",
            ]);

        }

        else if($code =="488c06a1-27d5-42ef-a671-34ace86432"){
            //App 123betting trip   forecast-123.shop
            return response()->json([
                'result' => true,
                'message' => 'ดึงข้อมูลสำเร็จ',
                'code' => $code,
              //  'app_url_policy' => 'https://huaybee789.com/broker/id/superhuaybee2?openExternalBrowser=1',
              //  'app_share_url' => 'https://huaybee789.com/broker/id/superhuaybee2?openExternalBrowser=1',
               'app_url_policy' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
                'app_share_url' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
          //     'app_url_policy' => 'https://member.ufabet-vip.cam/register.php?u=ufabbscsa0004',
           //     'app_share_url' => 'https://member.ufabet-vip.cam/register.php?u=ufabbscsa0004',


             //  'app_url_policy' => 'https://www.ufabet-vip.cam',
              // 'app_share_url' => 'https://www.ufabet-vip.cam',
                'app_is_policy' => false,
                'app_is_policy_name' => "123bettingtrip",
            ]);

        }
        
        
        else{
            return response()->json([
                'result' => true,
                'message' => 'ดึงข้อมูลสำเร็จ',
              //  'app_url_policy' => 'https://huaybee789.com/broker/superhuaybee2?openExternalBrowser=1',
              //  'app_share_url' => 'https://huaybee789.com/broker/superhuaybee2?openExternalBrowser=1',
               'app_url_policy' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
               'app_share_url' => 'https://simathongwirapon.blogspot.com/p/about-and-privacy-policy.html',
                'app_is_policy' => false,
            ]);

        }
 
        
    }


    
   
}
