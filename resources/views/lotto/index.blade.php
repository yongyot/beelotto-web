<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>PG Slot Lucky - WebView</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0d131c;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            
            max-width: 1200px;
            padding: 20px;
        }
        .game-section {
            margin-top: 20px;
            width: 100%;
        }
        .game-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            width: 100%;
        }
        .game-card {
            background-color: #1a1f2b;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s ease;
        }
        .game-card:hover {
            transform: scale(1.05);
        }
        .game-card img {
            width: 100%;
            border-radius: 10px;
        }
        .game-card p {
            margin: 8px 0;
            font-size: 14px;
        }
        .play-free-button {
            display: block;
            width: 100%;
            background-color: #ffcc00;
            color: #000;
            padding: 8px 0;
            margin-top: 8px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
            transition: background 0.2s ease;
        }
        .play-free-button:hover {
            background-color: #ffaa00;
        }

        /* Modal เต็มหน้าจอ */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #000; /* สีดำสนิท */
            overflow: hidden;
        }

        /* iframe เต็มจอ */
        .modal iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* ปุ่มย้อนกลับ */
        .close-button {
            position: absolute;
            top: 15px;
            left: 15px;
            font-size: 28px;
            color: white;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .close-button:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .game-grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        @media screen and (min-width: 900px) {
            .game-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        .banner {
            position: relative;
            text-align: center;
            max-width: 100%;
            border-radius: 10px;
            overflow: hidden;
        }
        .banner img {
            width: 100%;
            display: block;
        }
        .banner .play-button {
            position: absolute;
            bottom: 10%;
            left: 50%;
            transform: translateX(-50%);
            background-color: red;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="container">

    <div class="banner">
            <img src="https://www.i3siam.com/wp-content/uploads/2024/02/%E0%B9%80%E0%B8%97%E0%B8%A3%E0%B8%99%E0%B8%94%E0%B9%8C%E0%B8%9E%E0%B8%B1%E0%B8%92%E0%B8%99%E0%B8%B2%E0%B9%80%E0%B8%81%E0%B8%A1-2024-1536x1024.jpg" alt="Slot Banner">
            <a href="https://www.i3siam.com/%E0%B9%80%E0%B8%97%E0%B8%A3%E0%B8%99%E0%B8%94%E0%B9%8C%E0%B8%9E%E0%B8%B1%E0%B8%92%E0%B8%99%E0%B8%B2%E0%B9%80%E0%B8%81%E0%B8%A1/#google_vignette" class="play-button">เทรนด์พัฒนาเกมสล็อตออนไลน์ในปี 2024</a>
        </div>


        <div class="game-section">
            <h2>🎮 House Games</h2>
            PG Slot Lucky เป็นแอปพลิเคชันที่พัฒนาขึ้นเพื่อความบันเทิงเท่านั้น และ ไม่มีความเกี่ยวข้อง หรือได้รับอนุญาตจาก PG Soft, PG Slot หรือค่ายเกมสล็อตอื่น ๆ

📌 สิ่งที่ควรทราบ

PG Slot Lucky ไม่ได้เป็นตัวแทน หรือมีความเชื่อมโยงกับผู้พัฒนาเกมสล็อตรายใด
แอปพลิเคชันนี้ ไม่มีการให้บริการการพนันด้วยเงินจริง และ ไม่สนับสนุนการเดิมพันในทุกรูปแบบ
ข้อมูล, รูปภาพ และเนื้อหาทั้งหมดภายในแอปพลิเคชันใช้เพื่อ การจำลองและความบันเทิงเท่านั้น
เครื่องหมายการค้า, โลโก้ และชื่อเกมทั้งหมดเป็นกรรมสิทธิ์ของเจ้าของที่เกี่ยวข้อง เราไม่มีสิทธิ์ความเป็นเจ้าของ หรือมีความเกี่ยวข้องใด ๆ กับแบรนด์เหล่านั้น
📢 PG Slot Lucky เป็นแอปที่ให้ผู้ใช้สามารถเล่นเกมสล็อตในโหมดทดลองได้ฟรีโดยไม่มีค่าใช้จ่าย และไม่มีการเดิมพันด้วยเงินจริง
<br>
            <div class="game-grid">
                <div class="game-card">
                    <img src="https://market-resized.envatousercontent.com/previews/files/598287474/590x300.jpg?w=590&h=300&cf_fit=crop&crop=top&format=auto&q=85&s=d0d71ef3833dd79a94df112f33e9da031d30fffef2291f65070cb228c614cff4" alt="Fortune Tiger">
                    <p>Soccer</p>
                    <a href="#" class="play-free-button" onclick="openModal('https://previews.customer.envatousercontent.com/files/598287973/index.html')">เล่น</a>
                </div>
                <div class="game-card">
                    <img src="https://market-resized.envatousercontent.com/previews/files/511707030/Preview-Image.jpg?w=590&h=300&cf_fit=crop&crop=top&format=auto&q=85&s=c2db5b736432a0ded0f142e6498662b5bbdf407608af79f5adc7c274910d13a8" alt="Aviator">
                    <p>Donuts</p>
                    <a href="#" class="play-free-button" onclick="openModal('https://previews.customer.envatousercontent.com/files/511707062/index.html')">เล่น</a>
                </div>

                <div class="game-card">
                    <img src="https://market-resized.envatousercontent.com/previews/files/260897662/slotmachine_bg.jpg?w=590&h=300&cf_fit=crop&crop=top&format=auto&q=85&s=8ab3c6c5cbb0ca385671187133cf4de2013f7ac00116844abe8688be5e06f2e9" alt="Aviator">
                    <p>Machine</p>
                    <a href="#" class="play-free-button" onclick="openModal('https://demonisblack.com/code/2019/slotmachine/game')">เล่น</a>
                </div>


                <div class="game-card">
                    <img src="https://market-resized.envatousercontent.com/previews/files/505776596/590x300.png?w=590&h=300&cf_fit=crop&crop=top&format=auto&q=85&s=66cc835d2dc1323b29c421eb2ddcf6fc17d3375eeac8d8ce91eb1d76e45552af" alt="Aviator">
                    <p>FE</p>
                    <a href="#" class="play-free-button" onclick="openModal('https://showcase.tegagame.com/games/fe-slot/')">เล่น</a>
                </div>


                <div class="game-card">
                    <img src="https://market-resized.envatousercontent.com/previews/files/483200703/590x300.png?w=590&h=300&cf_fit=crop&crop=top&format=auto&q=85&s=d265cf1bd4b4b56beec38aa1b640822c04bc4312467300e6d73e51ef12c18dad" alt="Aviator">
                    <p>Fish</p>
                    <a href="#" class="play-free-button" onclick="openModal('https://showcase.tegagame.com/games/fish-slot')">เล่น</a>
                </div>


                <div class="game-card">
                    <img src="https://market-resized.envatousercontent.com/previews/files/501030280/590x300.jpg?w=590&h=300&cf_fit=crop&crop=top&format=auto&q=85&s=a3a7ea9d87358a9d5951ddcef7916b07a545a46f7c1213dd6f78aefe8d20e142" alt="Aviator">
                    <p>Poker</p>
                    <a href="#" class="play-free-button" onclick="openModal('https://previews.customer.envatousercontent.com/files/501030288/index.html')">เล่น</a>
                </div>



                <div class="game-card">
                    <img src="https://market-resized.envatousercontent.com/previews/files/452881031/590x300.jpg?w=590&h=300&cf_fit=crop&crop=top&format=auto&q=85&s=4ff734f3414b44e9c57b3b24017f7e6a5679e1405cb3d06c666b5637f6011c94" alt="Aviator">
                    <p>Super Soccer</p>
                    <a href="#" class="play-free-button" onclick="openModal('https://previews.customer.envatousercontent.com/files/452881034/index.html')">เล่น</a>
                </div>

                <div class="game-card">
                    <img src="https://market-resized.envatousercontent.com/previews/files/460513962/590.png?w=590&h=300&cf_fit=crop&crop=top&format=auto&q=85&s=bb481286e401f9c4b3ab5fb099da7d335090ed3148745f3fe42a0e5c26851403" alt="Aviator">
                    <p>Aquarium</p>
                    <a href="#" class="play-free-button" onclick="openModal('https://www.jocmania.com/mjuegos/slot-aquarium')">เล่น</a>
                </div>

                <div class="game-card">
                    <img src="https://market-resized.envatousercontent.com/previews/files/422711680/Preview-Image.jpg?w=590&h=300&cf_fit=crop&crop=top&format=auto&q=85&s=3e9499ee3cceb22d8db74029cbd66a58b2cc51f3b468af9571f11190dab25843" alt="Aviator">
                    <p>Realistic</p>
                    <a href="#" class="play-free-button" onclick="openModal('https://previews.customer.envatousercontent.com/files/422711722/index.html')">เล่น</a>
                </div>

                
            </div>
        </div>
    </div>
    <div class="footer">
        © 2025 PG Slot Lucky
    </div>
    <!-- Modal -->
    <div id="gameModal" class="modal">
        <span class="close-button" onclick="closeModal()">&#x2190;</span>
        <iframe id="gameFrame" src="" allowfullscreen></iframe>
    </div>

    <script>
        function openModal(gameUrl) {
            document.getElementById("gameFrame").src = gameUrl;
            document.getElementById("gameModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("gameModal").style.display = "none";
            document.getElementById("gameFrame").src = "";
        }
    </script>

</body>
</html>
