@extends('layouts.app')

@section('content')
<div class="owl-carousel">
    <div class="item">
        <img src="https://api.glo.or.th/utility/get/image/662d68e7-37f0-4b20-be58-7770ad878c97" alt="Slide 1">
    </div>
    <div class="item">
        <img src="https://api.glo.or.th/utility/get/image/77652df7-f080-40a7-a5fa-d1b859c33953" alt="Slide 2">
    </div>
</div>




<div class="header">
    <div class="header-content">
    
        <div class="search-box">
        <input type="number" id="searchNumber" 
       placeholder="{{ __('messages.draw_date') }}: 1 {{ __('messages.march') }} 2568"
       pattern="[0-9]*"
       inputmode="numeric"
       oninput="validateNumberInput(this)"
       min="0"
       step="1">

            <button class="btn-search" onclick="checkLotto()">🔍</button>
        </div>
    </div>
</div>


<div id="searchResult" class="search-result"></div>



<div class="lotto-container">
    <h2 class="lotto-header">{{ __('messages.lottery_results') }}</h2>
    <p class="lotto-date">{{ __('messages.draw_date') }}: 1 {{ __('messages.march') }} 2568</p>

    <!-- รางวัลที่ 1 และ เลขท้าย 2 ตัวในแถวเดียวกัน -->
    <div class="lotto-top-row">
        <div class="prize-box main-prize">
            <h3 class="prize-title">{{ __('messages.first_prize') }}</h3>
            <p class="prize-amount">{{ __('messages.prize_value', ['amount' => '6,000,000']) }}</p>
            <p class="prize-number main">818894</p>
        </div>

        <div class="prize-box two-digit-prize">
            <h3 class="prize-title">{{ __('messages.two_digit') }}</h3>
            <p class="prize-amount">{{ __('messages.prize_value', ['amount' => '2,000']) }}</p>
            <p class="prize-number two-digit">54</p>
        </div>
    </div>

    <!-- เลขหน้า 3 ตัว และ เลขท้าย 3 ตัว -->
    <div class="three-digit-grid">
        <div class="prize-box">
            <h3 class="prize-title">{{ __('messages.three_digit_front') }}</h3>
            <p class="prize-amount">{{ __('messages.prize_value', ['amount' => '4,000']) }}</p>
            <div class="prize-grid">
                <span>139</span>
                <span>530</span>
            </div>
        </div>
        <div class="prize-box">
            <h3 class="prize-title">{{ __('messages.three_digit_back') }}</h3>
            <p class="prize-amount">{{ __('messages.prize_value', ['amount' => '4,000']) }}</p>
            <div class="prize-grid">
                <span>656</span>
                <span>781</span>
            </div>
        </div>
    </div>
  <p style="
    font-size: 10px;
">ข้อมูลจาก สำนักงานสลากกินแบ่งฯ</p>  
</div>







    <div class="container">
  

    

  
   

   

        <div class="lotto-grid">
            <!-- 🏆 รางวัลที่ 1 -->
           
         
          
           <!-- ✅ รางวัลอื่น ๆ (ซ่อนโดยค่าเริ่มต้น) -->
           <div id="extraPrizes" style="display: none;">
              <!-- 🏅 รางวัลข้างเคียงรางวัลที่ 1 -->
            <div class="lotto-box">
                <h3>{{ __('messages.near_first_prize') }}</h3>
                <p class="lotto-number">818893, 818895</p>
            </div>

            <!-- 🏅 รางวัลที่ 2 -->
            <div class="lotto-box">
                <h3>{{ __('messages.second_prize') }}</h3>
                <p class="lotto-number">626086, 009425, 706361, 445710, 966801</p>
            </div>

            <!-- 🥉 รางวัลที่ 3 -->
            <div class="lotto-box">
                <h3>{{ __('messages.third_prize') }}</h3>
                <p class="lotto-number">
                    073890, 543296, 989397, 164491, 337602, 708975, 265729, 198946, 939068, 123509
                </p>
            </div>

            <!-- 🎖 รางวัลที่ 4 -->
            <div class="lotto-box">
                <h3>{{ __('messages.fourth_prize') }}</h3>
                <p class="lotto-number">
                940408, 033953, 531409, 036660, 705735, 083894, 298466, 403073, 109672, 776759, 050705, 892775, 917346, 596529, 648142, 606229, 534220, 035786, 656620, 802886, 924160, 359272, 461198, 730796, 347098, 314436, 652959, 466654, 963209, 938342, 190194, 786889, 482643, 760808, 764499, 770896, 433312, 399140, 261092, 730690, 783813, 127601, 121143, 801667, 406749, 300157, 052868, 722324, 815244, 047197
                </p>
            </div>
            <div class="lotto-box">
                <h3>รางวัลที่ 5</h3>
                <p class="lotto-number" data-prize="fifth">
                608427, 795363, 399660, 215784, 720680, 622328, 154530, 495643, 253930, 172143, 993052, 400084, 237014, 561656, 880304, 336835, 325053, 827929, 332950, 359521, 108798, 922294, 272193, 765241, 850203, 837254, 196824, 157570, 713335, 244432, 255142, 028348, 879210, 092952, 836397, 989074, 372164, 816587, 641873, 679023, 906844, 989237, 557740, 060137, 753659, 450981, 667158, 506232, 219953, 701748, 750470, 583089, 660401, 549267, 767982, 824645, 510846, 702804, 291205, 519732, 419305, 432973, 429243, 983571, 805860, 376226, 519069, 284819, 875552, 840042, 140002, 384608, 887529, 968167, 777059, 965121, 266027, 933882, 609909, 764291, 452554, 560073, 163865, 013081, 522828, 712633, 289079, 751539, 015145, 735425, 044736, 947659, 261524, 554737, 015230, 181502, 336944, 153215, 788314, 559492
                </p>
            </div>
           </div>
        </div>

    
             <!-- 🔘 ปุ่มแสดงเพิ่มเติม -->
             <button onclick="toggleExtraPrizes()" class="">แสดงเพิ่มเติม</button>
             <br>  <br>

             <!-- 🎥 วิดีโอถ่ายทอดสดการออกรางวัล -->
        <div class="video-section">
            <h2>🎥 การออกรางวัลสลากกินแบ่งรัฐบาล</h2>
            <iframe width="100%" height="400" 
                src="https://www.youtube.com/embed/GBnTpYlkNuE" 
                frameborder="0" 
                allowfullscreen>
            </iframe>
        </div>
        <br>
        
        <div class="news-container">
    <h2>🎉 ข่าวคนดวงเฮง ถูกรางวัลลอตเตอรี่ 🎉</h2>
    
    <div class="news-grid">
        <div class="news-item">
            <a href="https://www.thairath.co.th/lottery/news/2844751" target="_blank">
                <img src="https://static.thairath.co.th/media/00_A5B2844751C2E480.webp" alt="หนุ่มขับรถขยะ ถูกหวย 12 ล้าน">
                <h3>หนุ่มขับรถขยะ ถูกหวย 12 ล้าน หลังความฝันให้โชค</h3>
                <span>02 มี.ค. 2568 11:00 น.</span>
            </a>
        </div>

        <div class="news-item">
            <a href="https://www.thairath.co.th/lottery/news/2844734" target="_blank">
                <img src="https://static.thairath.co.th/media/00_A5B2844734C2E480.webp" alt="ป้าน้อย ถูกหวย 30 ล้าน">
                <h3>ป้าน้อย ขายแคบหมูดวงปัง ถูกรางวัลที่ 1 รับ 30 ล้าน</h3>
                <span>02 มี.ค. 2568 07:52 น.</span>
            </a>
        </div>

        <div class="news-item">
            <a href="https://www.thairath.co.th/lottery/news/2844698" target="_blank">
                <img src="https://static.thairath.co.th/media/00_A5B2844698C2E480.webp" alt="คนถูกรางวัลที่ 1 รับ 150 ล้าน">
                <h3>วาสนาแรง คนถูกรางวัลที่ 1 รับเงิน 150 ล้านบาท</h3>
                <span>01 มี.ค. 2568 16:47 น.</span>
            </a>
        </div>

        <div class="news-item">
            <a href="https://www.thairath.co.th/lottery/news/2844694" target="_blank">
                <img src="https://static.thairath.co.th/media/00_A5B2844694C1E480.webp" alt="สลากดิจิทัล รับ 162 ล้าน">
                <h3>ถูกรางวัลที่ 1 สลากดิจิทัล รวม 162 ล้าน</h3>
                <span>01 มี.ค. 2568 16:31 น.</span>
            </a>
        </div>

        <div class="news-item">
            <a href="https://www.thairath.co.th/lottery/latest-result/2844689" target="_blank">
                <img src="https://static.thairath.co.th/media/00_A5B2844689C1E480.webp" alt="ผลสลาก N3 งวด 1 มีนาคม 2568">
                <h3>ผลสลาก N3 งวด 1 มีนาคม 2568 ออกแล้ว</h3>
                <span>01 มี.ค. 2568 16:09 น.</span>
            </a>
        </div>
    </div>
</div>



<section class="this-draw-lottery">
<hgroup><a href="https://lottery.kapook.com/luckynumber"><h2>เลขเด็ดงวดนี้</h2></a><h3>หวยเด็ดงวดนี้ 16 มีนาคม 2568</h3></hgroup>

        <article>
            <a href="https://lottery.kapook.com/view289653.html" title="เลขเด็ดปฏิทินคำชะโนด 16 มี.ค. 68 เลขท้ายสองตัว มาแรงแซงทุกสำนัก คอหวยเตรียมรวย !" target="_blank"><img class=" ls-is-cached lazyloaded" src="https://my.kapook.com/rq/166/124/60/imagescontent/mobile_web/523/m_289653_7741.jpg" alt="เลขเด็ดปฏิทินคำชะโนด 16 มี.ค. 68 เลขท้ายสองตัว มาแรงแซงทุกสำนัก คอหวยเตรียมรวย !" onerror="this.onerror=null;this.src='/images/lottery-img-01.png';">
                <h4>เลขเด็ดปฏิทินคำชะโนด 16 มี.ค. 68 เลขท้ายสองตัว มาแรงแซงทุกสำนัก คอหวยเตรียมรวย !</h4>
                <span>เลขเด็ดงวดนี้ 16 มีนาคม 2568 จากปฏิทินคำชะโนด เตรียมลุ้นรางวัลใหญ่ด้วยเลขมงคลที่น่าสนใจ</span>
            </a>
        </article>
        <article>
            <a href="https://lottery.kapook.com/view289652.html" title="ไม่ต้องรอ ! หลวงพ่อปากแดงปล่อยเลขเด็ดงวดนี้ 16/03/68 คอหวยรีบเช็กก่อนใคร" target="_blank"><img class=" ls-is-cached lazyloaded" src="https://my.kapook.com/rq/166/124/60/imagescontent/mobile_web/522/m_289652_3928.jpg" alt="ไม่ต้องรอ ! หลวงพ่อปากแดงปล่อยเลขเด็ดงวดนี้ 16/03/68 คอหวยรีบเช็กก่อนใคร" onerror="this.onerror=null;this.src='/images/lottery-img-01.png';">
                <h4>ไม่ต้องรอ ! หลวงพ่อปากแดงปล่อยเลขเด็ดงวดนี้ 16/03/68 คอหวยรีบเช็กก่อนใคร</h4>
                <span>หวยหลวงพ่อปากแดงแจกเลขเด็ดงวดนี้ 16 มี.ค. 68 พร้อมแนวทางเลขเด็ดที่มาพร้อมแม่นที่ห้ามพลาด</span>
            </a>
        </article>
        <article>
            <a href="https://lottery.kapook.com/view289642.html" title="หวยซองสั่งลุยแจกเลขเด็ด 16 มี.ค. 68 คัดเลขสวยมาให้เน้น ๆ" target="_blank"><img class=" ls-is-cached lazyloaded" src="https://my.kapook.com/rq/166/124/60/imagescontent/mobile_web/512/m_289642_8134.jpg" alt="หวยซองสั่งลุยแจกเลขเด็ด 16 มี.ค. 68 คัดเลขสวยมาให้เน้น ๆ" onerror="this.onerror=null;this.src='/images/lottery-img-01.png';">
                <h4>หวยซองสั่งลุยแจกเลขเด็ด 16 มี.ค. 68 คัดเลขสวยมาให้เน้น ๆ</h4>
                <span>แนวทางเลขเด็ดมาใหม่ หวยซองสั่งลุย งวด 16/03/68 คัดสรรเฉพาะตัวเลขที่มาแรง รีบส่องก่อนพลาดโอกาสรับโชค</span>
            </a>
        </article>
        <article>
            <a href="https://lottery.kapook.com/view289628.html" title="เลขเด็ดมาไว ! ดุ่ย ภรัญฯ เปิดแนวทางงวด 16 มี.ค. 68 เลขสวยน่าตาม " target="_blank"><img class=" ls-is-cached lazyloaded" src="https://my.kapook.com/rq/166/124/60/imagescontent/mobile_web/498/m_289628_2587.jpg" alt="เลขเด็ดมาไว ! ดุ่ย ภรัญฯ เปิดแนวทางงวด 16 มี.ค. 68 เลขสวยน่าตาม " onerror="this.onerror=null;this.src='/images/lottery-img-01.png';">
                <h4>เลขเด็ดมาไว ! ดุ่ย ภรัญฯ เปิดแนวทางงวด 16 มี.ค. 68 เลขสวยน่าตาม </h4>
                <span>ส่องแนวทาง หวยดุ่ย ภรัญฯ งวด 16 มีนาคม 2568 มาแล้วครบเซต พร้อมเลขเด็ดทั้ง 3 ตัวและ 2 ตัว  </span>
            </a>
        </article>
        <article>
            <a href="https://lottery.kapook.com/view289617.html" title="ม้าสีหมอกมาแล้ว ! เลขเด็ดงวดนี้ 16 มี.ค. 68 เด่น 0-3 คอหวยต้องรีบตาม" target="_blank"><img class=" ls-is-cached lazyloaded" src="https://my.kapook.com/rq/166/124/60/imagescontent/mobile_web/487/m_289617_1646.jpg" alt="ม้าสีหมอกมาแล้ว ! เลขเด็ดงวดนี้ 16 มี.ค. 68 เด่น 0-3 คอหวยต้องรีบตาม" onerror="this.onerror=null;this.src='/images/lottery-img-01.png';">
                <h4>ม้าสีหมอกมาแล้ว ! เลขเด็ดงวดนี้ 16 มี.ค. 68 เด่น 0-3 คอหวยต้องรีบตาม</h4>
                <span>หวยม้าสีหมอก เผยเลขเด็ดงวดนี้ 16 มีนาคม 2568 มาดูกันว่ามีเลขเด็ดอะไรบ้าง  </span>
            </a>
        </article>
        <article>
            <a href="https://lottery.kapook.com/view265414.html" title="เช็ก 10 คำทำนายฝันแม่น ๆ พร้อมตีเลขเด็ดให้โชค" target="_blank"><img class=" ls-is-cached lazyloaded" src="https://my.kapook.com/rq/166/124/60/imagescontent/mobile_web/212/m_265414_9435.jpg" alt="เช็ก 10 คำทำนายฝันแม่น ๆ พร้อมตีเลขเด็ดให้โชค" onerror="this.onerror=null;this.src='/images/lottery-img-01.png';">
                <h4>เช็ก 10 คำทำนายฝันแม่น ๆ พร้อมตีเลขเด็ดให้โชค</h4>
                <span>วิเคราะห์ 10 คำทำนายฝันแม่น ๆ พร้อมดูเลขเด็ดมาแรง เทคนิคตีหวยจากความฝัน ไปดูกันเลย</span>
            </a>
        </article>

    
<div class="readmore"><a href="https://lottery.kapook.com/luckynumber" title="ดูเลขเด็ดงวดนี้ทั้งหมด">ดูเลขเด็ดงวดนี้ทั้งหมด</a></div>
</section>


<section class="stat-lottery">
<hgroup>
    <h2>สถิติหวย</h2>

</hgroup>

    <article>
        <a href="https://lottery.kapook.com/stats" title="สถิติหวย" target="_blank"><img src="https://lottery.kapook.com/uploads/3bd30a283818e7beb86db32cacdb011d.jpg" alt="" onerror="this.onerror=null;this.src='/images/lottery-img-01.png';">
        <h4>สถิติหวย</h4>
        </a>
    </article>
    <article>
        <a href="https://lottery.kapook.com/stats/yearly" title="สถิติหวย 9 ปีล่าสุด" target="_blank"><img src="https://lottery.kapook.com/uploads/0c9798d6904eaf5f73ae7660853f3702.jpg" alt="" onerror="this.onerror=null;this.src='/images/lottery-img-01.png';">
        <h4>สถิติหวย 9 ปีล่าสุด</h4>
        </a>
    </article>
    <article>
        <a href="https://lottery.kapook.com/stats/daily/sun/9" title="สถิติหวยออกวันอาทิตย์" target="_blank"><img src="https://lottery.kapook.com/uploads/5d17f5d752c299e2c7b6a9b889020ae1.jpg" alt="" onerror="this.onerror=null;this.src='/images/lottery-img-01.png';">
        <h4>สถิติหวยออกวันอาทิตย์</h4>
        </a>
    </article>
    <article>
        <a href="https://lottery.kapook.com/stats/monthly/mar/9" title="สถิติหวยออกเดือนมีนาคม" target="_blank"><img src="https://lottery.kapook.com/uploads/0cf86e17e0124dcef53edd4a5ec297f5.jpg" alt="" onerror="this.onerror=null;this.src='/images/lottery-img-01.png';">
        <h4>สถิติหวยออกเดือนมีนาคม</h4>
        </a>
    </article>
	
<div class="readmore"><a href="https://lottery.kapook.com/stats" title="ดูสถิติหวยทั้งหมด">ดูสถิติหวยทั้งหมด</a></div>
</section>
        
    </div>


    

    <script>
        function checkLotto() {
            let inputNumber = document.getElementById('searchNumber').value.trim();
            let resultBox = document.getElementById('searchResult');
            let found = false;

            document.querySelectorAll('.lotto-number').forEach(element => {
                let prizeNumbers = element.innerText.split(', ').map(num => num.trim());
                if (prizeNumbers.includes(inputNumber)) {
                    let prizeType = element.closest('.lotto-box').querySelector('h3').innerText;
                    resultBox.innerHTML = `<p class="success">🎉 ${inputNumber} {{ __('messages.win') }} ${prizeType}!</p>`;
                    found = true;
                }
            });

            if (!found) {
                resultBox.innerHTML = `<p class="error">❌ {{ __('messages.not_win') }}</p>`;
            }
        }

        function toggleExtraPrizes() {
            let extraPrizes = document.getElementById('extraPrizes');
            let button = document.querySelector('.btn-show-more');

            if (extraPrizes.style.display === "none") {
                extraPrizes.style.display = "block";
                button.innerHTML = "🔽 ซ่อนรางวัลอื่น ๆ";
            } else {
                extraPrizes.style.display = "none";
                button.innerHTML = "📢 แสดงเพิ่มเติม";
            }
        }
        function validateNumberInput(input) {
    input.value = input.value.replace(/[^0-9]/g, ''); // กรองเฉพาะตัวเลข 0-9
}

    </script>

@endsection

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }
    .container {

        margin: auto;
        padding: 20px;
        text-align: center;
    }
    .title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 15px;
    }
    .lotto-date {
        font-size: 18px;
        margin-bottom: 20px;
        color: #666;
    }
    .lotto-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
    }
    .lotto-box {
        background: #fff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        text-align: center;
    }
    .lotto-box:hover {
        transform: scale(1.05);
    }
    .highlight {
        background: #ffea2f;
        font-weight: bold;
    
    }
    .search-box {
  
        justify-content: center;
        margin-bottom: 20px;
    }
    .search-box input {
        padding: 10px;
        width: 70%;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 20px;
    }
    .search-box button {
      
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        margin-left: 10px;
        cursor: pointer;
    }
    .success {
        color: green;
        font-weight: bold;
    }
    .error {
        color: red;
        font-weight: bold;
    }
    @media screen and (max-width: 768px) {
        .container {
            max-width: 95%;
        }
        .lotto-box {
            padding: 10px;
        }
    }
    @media screen and (max-width: 480px) {
        .lotto-box {
            padding: 8px;
        }
    }
    .btn-required {

        
        border: 0;
        background-color: #eeaf0a;
        font-size: 18px;
        font-weight: 500;
        color: #ffffff;
        border-radius: 10px;
        -webkit-transition: 0.3s ease-in-out;
        transition: 0.3s ease-in-out;
        }
        .btn-required:hover {
        opacity: 0.6;
        }
        .btn-required, .btn-show-more {
        border: 0;
        background-color: #eeaf0a;
        font-size: 18px;
        font-weight: 500;
        color: #ffffff;
        padding: 10px;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s;
        margin: 10px;
    }

    .btn-show-more:hover, .btn-required:hover {
        opacity: 0.6;
    }
    .container {
        margin: auto;
        padding: 20px;
        text-align: center;
    }
    
    .title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .lotto-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
    }

    .lotto-box {
        background: #fff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        text-align: center;
    }
</style>

<style>
.news-container {
    margin: 20px auto;
    max-width: 1200px;
    text-align: center;
}

.news-container h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #333;
}

.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
}

.news-item {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.news-item:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
}

.news-item a {
    text-decoration: none;
    color: #333;
    display: block;
}

/* ✅ แก้ปัญหารูปภาพล้นหน้าจอ */
.news-item img {
    width: 100%;
    height: 180px; /* กำหนดความสูงให้เท่ากัน */
    object-fit: cover; /* ป้องกันภาพบิดเบี้ยว */
    border-radius: 10px 10px 0 0;
    display: block;
}

.news-item h3 {
    font-size: 16px;
    font-weight: bold;
    margin: 10px;
}

.news-item span {
    font-size: 14px;
    color: #777;
    margin-bottom: 15px;
    display: block;
}

/* 📌 ปรับขนาดสำหรับมือถือ */
@media screen and (max-width: 768px) {
    .news-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }

    .news-item h3 {
        font-size: 14px;
    }

    .news-item span {
        font-size: 12px;
    }

    .news-item img {
        height: 150px; /* ปรับขนาดรูปให้เล็กลงในมือถือ */
    }
}

@media screen and (max-width: 480px) {
    .news-grid {
        grid-template-columns: 1fr;
    }

    .news-item {
        margin-bottom: 10px;
    }

    .news-item img {
        height: 140px;
    }
}

    /* 🔍 ค้นหาหมายเลข */
    .search-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
    }

    .input-wrapper {
        display: flex;
        align-items: center;
        width: 100%;
        max-width: 300px;
        background: #fff;
        border-radius: 25px;
        padding: 5px 10px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .input-wrapper input {
        flex: 1;
        border: none;
        font-size: 16px;
        padding: 10px;
        border-radius: 20px;
        outline: none;
    }

    .btn-search {
        background: transparent;
        border: none;
        font-size: 18px;
        cursor: pointer;
        color: #777;
    }

    .btn-check {
        margin-top: 10px;
        width: 100%;
        max-width: 300px;
        background-color: #ffaf02;
        color: white;
        font-size: 18px;
        font-weight: bold;
        padding: 10px;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-check:hover {
        background-color: #ff9800;
    }
    /* ✅ ปรับดีไซน์ Input ให้ปุ่มอยู่ข้างใน */
.input-wrapper {
    position: relative;
    width: 100%;
    max-width: 300px;
}

.input-wrapper input {
    width: 100%;
    padding: 12px 40px 12px 15px; /* เผื่อพื้นที่ให้ไอคอน */
    font-size: 16px;
    border: 2px solid #ddd;
    border-radius: 25px;
    outline: none;
    background: #fff;
    transition: 0.3s;
}

.input-wrapper input:focus {
    border-color: #ffaf02;
}

/* 🔎 ปุ่มค้นหาอยู่ใน Input */
.btn-search {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    font-size: 20px;
    cursor: pointer;
    color: #777;
}
/* ✅ ส่วนหัวสีฟ้า + โค้งมน */
.header {
    background: linear-gradient(135deg, #FFD700, #F7B500); /* ไล่เฉดสีเหลือง */
    color: white;
    text-align: center;
    padding: 20px 15px;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    position: relative;
}


.header-content {
    max-width: 500px;
    margin: auto;
}

.header h1 {
    font-size: 22px;
    font-weight: bold;
    margin-bottom: 15px;
}

/* 🔍 ช่องค้นหา */
.search-box {
    position: relative;
    width: 100%;
    max-width: 350px;
    margin: auto;
}

.search-box input {
    width: 100%;
    padding: 12px 40px 12px 15px;
    font-size: 16px;
    border: none;
    border-radius: 25px;
    outline: none;
}

.search-box .btn-search {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    font-size: 20px;
    cursor: pointer;
    color: #777;
}
/* ✅ จัดการขนาดกล่องรางวัล */


/* ✅ หัวข้อหลัก */
h2 {
    font-size: 22px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #000;
}

h3 {
    font-size: 18px;
    color: #666;
    font-weight: normal;
}

/* ✅ กล่องแสดงรางวัล */
.prize-box {
    margin: 15px 0;
}

.prize-title {
    font-size: 18px;
    font-weight: bold;
    color: #0056b3;
}

.prize-amount {
    font-size: 16px;
    color: #666;
}

/* ✅ เลขรางวัล */
.prize-number {
    font-size: 26px;
    font-weight: bold;
    color: #000;
}

/* ✅ รางวัลที่ 1 สีแดง */
.prize-number.main {
    font-size: 36px;
    color: red;
}

/* ✅ เลขท้าย 2 ตัว */
.prize-number.two-digit {
    font-size: 32px;
}

/* ✅ จัดกล่องเลขหน้า-ท้าย 3 ตัวให้อยู่แถวเดียวกัน */
.three-digit-grid {
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

.three-digit-grid .prize-box {
    width: 48%;
}

/* 📱 รองรับมือถือ */
@media screen and (max-width: 480px) {
   
}


/* สไตล์สำหรับส่วนสถิติหวย */
.stat-lottery {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

.stat-lottery hgroup h2 {
    font-size: 1.8rem;
    font-weight: bold;
    text-align: center;
    color: #d9534f; /* สีแดงคล้ายข่าวคนดวงเฮง */
    margin-bottom: 15px;
}

.stat-lottery .article-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    justify-content: center;
}

.stat-lottery article {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.stat-lottery article:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.stat-lottery article a {
    text-decoration: none;
    color: inherit;
    display: block;
}

.stat-lottery article img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-bottom: 2px solid #d9534f;
}

.stat-lottery article h4 {
    font-size: 1.2rem;
    text-align: center;
    margin: 10px 0;
    font-weight: bold;
    color: #333;
}

.stat-lottery .readmore {
    text-align: center;
    margin-top: 15px;
}

.stat-lottery .readmore a {
    display: inline-block;
    padding: 8px 15px;
    font-size: 1rem;
    font-weight: bold;
    color: #fff;
    background: #d9534f;
    border-radius: 5px;
    text-decoration: none;
    transition: background 0.2s ease;
}

.stat-lottery .readmore a:hover {
    background: #c9302c;
}



.owl-carousel {
    width: 100%;
    max-width: 100%;
    height: 200px;
}

.owl-carousel .item img {
    width: 100%;
    height: 100%;
    object-fit: cover;

}

.owl-nav{

    display: none;
}

/* ✅ ทำให้ Swiper หรือ Owl Carousel แสดงผลได้เหมาะสม */
.swiper-container, .owl-carousel {
    width: 100%;
    max-width: 100%;
    height: 180px; /* ความสูงเริ่มต้น */
    overflow: hidden;
    border-radius: 10px; /* ทำขอบมน */
    background: #f5f5f5; /* ป้องกันพื้นหลังโปร่งแสง */
}

/* ✅ จัดให้ Swiper Wrapper ไม่ล้น */
.swiper-wrapper {
    display: flex;
    align-items: center;
}

/* ✅ ทำให้รูปเต็มขนาด */
.swiper-slide, .owl-carousel .item {
    display: flex !important;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    border-radius: 0px;
}

.swiper-slide img, .owl-carousel .item img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* ป้องกันภาพบิดเบี้ยว */
    border-radius: 0px;
}

/* ✅ ปรับขนาด Swiper สำหรับ iPad */
@media screen and (max-width: 1024px) {
    .swiper-container, .owl-carousel {
        height: 220px; /* ขยายขนาดให้เหมาะสม */
    }
}

/* ✅ ปรับขนาด Swiper สำหรับมือถือ */
@media screen and (max-width: 768px) {
    .swiper-container, .owl-carousel {
        height: 180px; /* ลดขนาดในมือถือ */
    }
}

/* ✅ ปรับขนาด Swiper สำหรับหน้าจอเล็ก */
@media screen and (max-width: 480px) {
    .swiper-container, .owl-carousel {
        height: 150px; /* ลดความสูงลงสำหรับหน้าจอเล็ก */
    }
}


/* ✅ ตั้งค่าพื้นฐาน */
.lotto-container {
    width: 100%;
    margin: auto;
    background: #fff;
    padding: 5px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* ✅ หัวข้อหลัก */
.lotto-header {
    font-size: 22px;
    font-weight: bold;
    color: #28a745;
    margin-bottom: 5px;
}

.lotto-date {
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
}

/* ✅ ปรับรางวัลที่ 1 และเลขท้าย 2 ตัวให้แสดงถูกต้อง */
.lotto-top-row {
    display: flex;
    justify-content: space-between;
    align-items: stretch;
    gap: 10px;
    flex-wrap: wrap; /* ทำให้ปรับเป็น 2 แถวอัตโนมัติถ้าจอแคบ */
}

/* ✅ ปรับขนาดรางวัลที่ 1 */
.main-prize {
    background: #ffebeb;
    padding: 10px;
    border-radius: 8px;
    width: 55%;
    min-width: 200px; /* ป้องกันการย่อเล็กเกินไป */
}

/* ✅ ปรับขนาดเลขท้าย 2 ตัว */
.two-digit-prize {
    background: #f8f9fa;
    padding: 10px;
    border-radius: 8px;
    width: 40%;
    min-width: 100px;
}

/* ✅ ตัวเลขรางวัล */
.prize-number {
    font-size: 28px;
    font-weight: bold;
    color: #000;
}

/* ✅ แสดงผลเลข 3 ตัวแบบ 2 แถว */
.three-digit-grid {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    margin: 5px 0;
    margin-top: -20px;
}

.three-digit-grid .prize-box {
    background: #f8f9fa;
    width: 48%;
    padding: 12px;
    border-radius: 8px;
}

/* ✅ จัดเรียงตัวเลขแบบ 2 แถว */
.prize-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 5px;
    font-size: 24px;
    font-weight: bold;
    color: #000;
    justify-content: center;
}

.prize-grid span {
    display: block;
    text-align: center;
}

/* ✅ Responsive สำหรับมือถือเล็ก */
@media screen and (max-width: 360px) {
    .lotto-container {
        max-width: 95%;
    }

    /* ปรับเป็น 2 แถวในมือถือเล็ก */
    .lotto-top-row {
        flex-direction: column;
        gap: 5px;
    }

    .main-prize, .two-digit-prize {
        width: 100%;
    }

    .prize-number {
        font-size: 24px;
    }
}
.this-draw-lottery {
    padding: 10px;
    margin: 0;
    background-color: #ffffff;
}

.this-draw-lottery hgroup {
    text-align: center;
    margin-bottom: 15px;
}

.this-draw-lottery h2 {
    font-size: 20px;
    font-weight: bold;
    color: #d32f2f; /* สีแดงเข้ม */
}

.this-draw-lottery h3 {
    font-size: 16px;
    color: #555;
}

.this-draw-lottery article {
    display: flex;
    align-items: center;
    background: #fff;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.this-draw-lottery article a {
    display: flex;
    flex-direction: row;
    align-items: center;
    text-decoration: none;
    color: #333;
    width: 100%;
}

.this-draw-lottery article img {
    width: 80px;
    height: 80px;
    border-radius: 6px;
    object-fit: cover;
    margin-right: 10px;
}

.this-draw-lottery article h4 {
    font-size: 14px;
    font-weight: bold;
    margin: 0;
    color: #000;
}

.this-draw-lottery article span {
    font-size: 12px;
    color: #777;
}

.readmore {
    text-align: center;
    margin-top: 15px;
}

.readmore a {
    display: inline-block;
    background: #d32f2f;
    color: white;
    padding: 8px 12px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
}

</style>
<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            nav: true,
            dots: true,
            items: 1
        });
    });
</script>




@php
function formatLottoDate($date, $locale) {
    $months = [
        'th' => [
            '01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม', '04' => 'เมษายน',
            '05' => 'พฤษภาคม', '06' => 'มิถุนายน', '07' => 'กรกฎาคม', '08' => 'สิงหาคม',
            '09' => 'กันยายน', '10' => 'ตุลาคม', '11' => 'พฤศจิกายน', '12' => 'ธันวาคม'
        ],
        'en' => [
            '01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April',
            '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August',
            '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
        ],
        'zh' => [
            '01' => '1月', '02' => '2月', '03' => '3月', '04' => '4月',
            '05' => '5月', '06' => '6月', '07' => '7月', '08' => '8月',
            '09' => '9月', '10' => '10月', '11' => '11月', '12' => '12月'
        ]
    ];

    [$year, $month, $day] = explode('-', $date);

    if ($locale === 'th') {
        $year += 543;
        return "$day {$months[$locale][$month]} $year";
    } elseif ($locale === 'zh') {
        return "$year年{$months[$locale][$month]}$day日";
    } else {
        return "$day {$months[$locale][$month]} $year";
    }
}
@endphp