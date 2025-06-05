@extends('layouts.app')

@section('content')



<!-- ℹ️ ข้อความชี้แจง -->
<section class="app-disclaimer" style="
    margin-bottom: 5px;
">
  <div class="container">
    <p class="disclaimer-text">
       <strong>หวยบี</strong> เป็นแอปที่ให้ข้อมูลผลล็อตเตอรี่ ข้อมูลทั้งหมดนำมาจากแหล่งข้อมูลสาธารณะ แอปนี้ไม่ได้เป็นแอปทางการของสำนักงานสลากกินแบ่งรัฐบาล   ℹ️ ข้อมูลผลสลากกินแบ่งรัฐบาลนำมาจากเว็บไซต์ <a href="https://www.glo.or.th" target="_blank">www.glo.or.th</a>
    </p>
 
  </div>
</section>

<a title="ติดตาม Facebook Sanook Horoscope" href="https://www.facebook.com/sanookhoroscope/" target="_blank"><img src="//s.isanook.com/sr/0/images/facebook/horo.jpg" width="363"></a>

@php
  use Carbon\Carbon;

  Carbon::setLocale('th');
  $thaiDate = Carbon::now()->translatedFormat('lที่ j F Y');
@endphp

<div class="horo-card">
  <div class="horo-image">
    <img width="363" src="https://static.thairath.co.th/media/hBbh9CaTadKWNdn7XJLpyoIM6leqnTfdLdCPe6fg2f2xX3hdBWfeAwX0w0F4jclu8MUVEkH.jpg" alt="ดวงวันนี้">
  </div>
  <div class="horo-date">{{ $thaiDate }}</div>
  <div class="horo-detail">
    แรม 13 ค่ำ เดือน 4 (วันนี้ยังไม่เหมาะแก่การกระทำการมงคล)<br>
    <strong>เคล็ดดวงดี:</strong> คนเกิดปีกุนแม้ว่าจะมีเรื่องให้หนักใจบ้างแต่ไม่นานจะดีขึ้น ควรทำบุญช่วยเหลือสัตว์จรจัดเพื่อเสริมดวง
  </div>

</div>

<!-- 🔮 เลขโชคดีประจำวัน -->
<section class="lucky-number-section">
  <div class="container">
    <h2>🔮 เลขโชคดีประจำวัน</h2>
    <div class="lucky-card">
      <p class="lucky-text">เลขนำโชคของคุณวันนี้คือ:</p>
      <div class="lucky-number">{{ rand(10, 99) }} - {{ rand(100, 999) }}</div>
      <p class="lucky-hint">วันนี้เหมาะกับการเสี่ยงโชคช่วงเย็น เลขคู่มาแรง!</p>
      <button onclick="shareLuckyNumber()" class="btn-share">📤 แชร์เลขนี้</button>
    </div>
  </div>
</section>

<!-- 📅 ปฏิทินหวยแบบย่อ -->
<section class="lotto-calendar-preview">
  <div class="container">
    <h2>📅 ปฏิทินหวย (งวดถัดไป)</h2>
    <p>หวยรัฐบาลไทยงวดถัดไป: <strong>1 พฤษภาคม 2568</strong></p>
    <button onclick="window.location.href='https://www.pptvhd36.com/news/%E0%B8%A5%E0%B8%AD%E0%B8%95%E0%B9%80%E0%B8%95%E0%B8%AD%E0%B8%A3%E0%B8%B5%E0%B9%88/240688" class="btn-calendar">ดูปฏิทินทั้งหมด</button>
  </div>
</section>

<!-- 🗓️ แสดงหวยประจำวันที่ 16 มีนาคม 2025 -->
<section class="lotto-highlight">
  <div class="container">
    <h2>📌 ผลสลากกินแบ่งรัฐบาลประจำวันที่ 16 เมษายน 2568</h2>
    <div class="lotto-card">
      <p><strong>รางวัลที่ 1:</strong> 266227</p>
      <p><strong>เลขท้าย 2 ตัว:</strong> 85</p>
      <p><strong>เลขหน้า 3 ตัว:</strong> 413, 254</p>
      <p><strong>เลขท้าย 3 ตัว:</strong> 760, 474</p>
    </div>
  </div>
</section>



<!-- 📰 ข่าวหวยล่าสุด -->
<section class="lotto-news">
  <div class="container">
    <div class="css-xsximz e1jz6ffu5">
      <div class="news-item">
        <a href="https://www.thairath.co.th/lottery/news/2848501" target="_blank">
          <img src="https://static.thairath.co.th/media/00_A5B2848501C3E480.webp" alt="คอหวยส่องเลขเด็ดทะเบียนรถนายก">
          <h3>คอหวยส่อง "เลขเด็ด" ทะเบียนรถนายก "อิ๊งค์" ลงพื้นที่ดูงาน จ.นครสวรรค์</h3>
          <span>21 มี.ค. 2568 16:20 น.</span>
        </a>
      </div>
      <div class="news-item">
        <a href="https://www.thairath.co.th/lottery/news/2848257" target="_blank">
          <img src="https://static.thairath.co.th/media/00_A5B2848257C1E480.webp" alt="ป้าพาหลานแก้บน หลวงพ่อสมหวัง">
          <h3>ป้าพาหลานแก้บน "หลวงพ่อสมหวัง" หลังอาการป่วยดีขึ้น ได้เลขเด็ดติดมือกลับไปลุ้น</h3>
          <span>20 มี.ค. 2568 14:59 น.</span>
        </a>
      </div>
      <div class="news-item">
        <a href="https://www.thairath.co.th/lottery/news/2847575" target="_blank">
          <img src="https://static.thairath.co.th/media/00_A5B2847575C5E480.webp" alt="คนงานเก็บไม้ดวงเฮง">
          <h3>คนงานเก็บไม้ดวงเฮง หลังขอโชคลาภ "หลวงพ่อใหญ่" วัดห้วยสูบ ถูกหวยนับ 10 ใบ</h3>
          <span>17 มี.ค. 2568 12:31 น.</span>
        </a>
      </div>
    </div>
  </div>
</section>

<script>
function shareLuckyNumber() {
  const message = "🔮 เลขนำโชควันนี้ของฉันคือ {{ rand(10,99) }} และ {{ rand(100,999) }}! ลองเสี่ยงโชคกันดูสิ 🍀";
  if (navigator.share) {
    navigator.share({
      title: 'เลขโชคดีวันนี้',
      text: message,
      url: window.location.href
    }).catch(console.error);
  } else {
    alert('อุปกรณ์ของคุณไม่รองรับการแชร์');
  }
}
</script>

<style>
body {
  background: linear-gradient(to bottom, #1c102b, #120820);
  color: #fefefe;
  font-family: 'Prompt', sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  padding: 16px;
  max-width: 800px;
  margin: auto;
}

h2 {
  color: #fcd34d;
  font-size: 1.5rem;
  margin-bottom: 10px;
  text-shadow: 0 0 4px rgba(252, 211, 77, 0.4);
}

.lucky-number-section,
.lotto-calendar-preview,
.lotto-highlight,
.lotto-news {
  background: rgba(255, 255, 255, 0.05);
  padding: 20px;
  margin-bottom: 20px;
  border-radius: 16px;
  border: 1px solid rgba(252, 211, 77, 0.3);
  box-shadow: 0 0 20px rgba(255, 215, 0, 0.08);
  text-align: center;
}

.lucky-card,
.lotto-card {
  background: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(255, 215, 0, 0.4);
  padding: 20px;
  border-radius: 12px;
  backdrop-filter: blur(4px);
  color: #fefefe;
}

.lucky-number {
  font-size: 36px;
  font-weight: bold;
  color: #facc15;
  margin: 12px 0;
  text-shadow: 0 0 10px rgba(255, 239, 184, 0.8);
}

.lucky-hint {
  font-style: italic;
  color: #ddd;
}

.btn-share,
.btn-calendar {
  background: linear-gradient(to right, #facc15, #fcd34d);
  color: #2e1e0f;
  border: none;
  padding: 12px 24px;
  font-size: 16px;
  border-radius: 12px;
  cursor: pointer;
  font-weight: bold;
  box-shadow: 0 2px 6px rgba(252, 211, 77, 0.5);
  transition: all 0.2s;
  margin-top: 10px;
}
.btn-share:hover,
.btn-calendar:hover {
  transform: scale(1.05);
}

.app-disclaimer {
  background-color: rgba(255, 255, 255, 0.1);
  padding: 10px;
  border-radius: 12px;
  color: #fcd34d;
  text-align: center;
  font-size: 13px;
  border: 1px solid rgba(252, 211, 77, 0.3);
}

.app-disclaimer a {
  color: #fde68a;
  text-decoration: underline;
}

.horo-card {
  background: rgba(255, 255, 255, 0.07);
  border: 1px solid rgba(253, 224, 71, 0.4);
  border-radius: 16px;
  padding: 20px;
  margin: auto;
  color: #fefefe;
  box-shadow: 0 4px 12px rgba(253, 224, 71, 0.1);
}

.horo-date {
  font-size: 18px;
  font-weight: bold;
  margin-top: 16px;
  color: #fde047;
  text-shadow: 0 0 6px rgba(253, 224, 71, 0.5);
}

.horo-detail {
  font-size: 16px;
  margin-top: 10px;
  line-height: 1.6;
}

.lotto-news .news-item {
  background: rgba(255, 255, 255, 0.06);
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.2);
  margin-bottom: 15px;
}

.lotto-news .news-item a {
  color: #fefefe;
  text-decoration: none;
  display: block;
  padding: 12px;
}

.lotto-news .news-item h3 {
  font-size: 16px;
  margin: 10px 0 5px;
}

.lotto-news .news-item span {
  font-size: 14px;
  color: #ccc;
}


</style>

@endsection
