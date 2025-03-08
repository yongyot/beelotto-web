<!DOCTYPE html>
<html lang="{{ $lang }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ __('messages.page_title') }}</title>
    <style>
        :root {
            --primary-color: #eeb50e;
            --bg-color: #f5f5f5;
            --text-color: #333;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            text-align: center;
            padding: 0;
            margin: 0;
        }

        .container {
          
            margin: auto;
            padding: 15px;
        }

        .lotto-card {
            background: white;
            border-radius: 12px;
            padding: 18px;
            margin: 12px 0;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .lotto-card:hover {
            transform: translateY(-3px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
        }

        .lotto-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .lotto-number {
            font-size: 28px;
            color: var(--primary-color);
            font-weight: bold;
        }

        .footer {
            padding: 12px;
            font-size: 14px;
            color: #777;
        }

        /* 🎯 ปรับให้รองรับ WebView (Mobile & Tablet) */
        @media (max-width: 768px) {
            .container {
                max-width: 100%;
                padding: 10px;
            }

            .lotto-card {
                padding: 16px;
                font-size: 14px;
            }

            .lotto-number {
                font-size: 24px;
            }

            .lang-btn {
                font-size: 12px;
                padding: 6px 10px;
            }
        }

        /* 🔄 ปรับภาษา RTL (รองรับภาษาอาหรับ) */
        [lang="ar"] {
            direction: rtl;
        }

        /* 🌍 ปุ่มเลือกภาษา */
        .language-switcher {
            margin-top: 10px;
        }

        .lang-btn {
            padding: 10px 14px;
            margin: 5px;
            border-radius: 8px;
            background: rgba(238, 182, 14, 0.42);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 14px;
            transition: 0.2s;
        }

        .lang-btn:hover {
            background: rgb(238 175 9);
        }

        .lang-btn.active {
            background: rgb(238, 175, 9);
        }
    </style>
</head>
<body>

    <div class="">
        @yield('content')
    </div>

    <div class="footer">
        © 2025 BeeHuay - ตรวจหวยออนไลน์
    </div>

</body>
</html>
