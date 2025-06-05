<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ติดต่อเรา / แจ้งปัญหา - แอพหวยออนไลน์</title>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet" />
  <style>
    :root {
      --primary-color: #efce1d;
      --text-color: #333;
      --background-color: #fffdf5;
    }

    body {
      font-family: 'Tahoma', sans-serif;
      background-color: var(--background-color);
      margin: 0;
      padding: 1rem;
    }

    .container {
      max-width: 800px;
      margin: auto;
      padding: 1rem;
    }

    h1 {
      color: var(--primary-color);
      text-align: center;
    }

    .contact-info,
    form {
      background: #fff;
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      margin-top: 1.5rem;
    }

    .contact-info p {
      margin: 0.5rem 0;
      line-height: 1.6;
      color: var(--text-color);
    }

    label {
      display: block;
      margin-top: 1rem;
      font-weight: bold;
      color: var(--text-color);
    }

    input,
    textarea {
      width: 100%;
      padding: 10px;
      margin-top: 0.3rem;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      box-sizing: border-box;
    }

    button {
      margin-top: 1.5rem;
      padding: 12px 20px;
      background-color: var(--primary-color);
      color: #000;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      background-color: #e2bc1c;
    }

    a {
      color: #000;
      text-decoration: none;
    }

    @media (max-width: 480px) {
      body {
        padding: 0.5rem;
      }
      .contact-info, form {
        padding: 1rem;
      }
      h1 {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>ติดต่อเรา / แจ้งปัญหา</h1>

    <div class="contact-info">
      <p><strong>ชื่อแอป:</strong> แอพหวยออนไลน์</p>
      <p><strong>ผู้ติดต่อ:</strong> Wirapon Simathong</p>
      <p><strong>เบอร์โทร:</strong> 062-361-7268</p>
      <p><strong>อีเมล:</strong> <a href="simathongwirapon@gmail.com">simathongwirapon@gmail.com</a></p>
      <p><strong>ที่อยู่:</strong>
        56 หมู่ 3
        ตำบลบางปรอก อำเภอเมืองปทุมธานี
        จังหวัดปทุมธานี 12000
      </p>
    </div>

    <form onsubmit="handleSubmit(event)">
      <label for="name">ชื่อของคุณ</label>
      <input type="text" id="name" name="name" required />

      <label for="email">อีเมล</label>
      <input type="email" id="email" name="email" required />

      <label for="phone">เบอร์โทรศัพท์</label>
      <input type="tel" id="phone" name="phone" />

      <label for="message">รายละเอียดปัญหา / ข้อเสนอแนะ</label>
      <textarea id="message" name="message" rows="5" required></textarea>

      <button type="submit">ส่งข้อมูล</button>
    </form>
  </div>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function handleSubmit(event) {
      event.preventDefault();
      Swal.fire({
        icon: 'success',
        title: 'ได้รับข้อมูลแล้ว!',
        text: 'ขอบคุณที่ติดต่อเรา ทีมงานจะตรวจสอบและติดต่อกลับโดยเร็วที่สุด',
        confirmButtonText: 'ตกลง',
        confirmButtonColor: '#efce1d'
      });
      event.target.reset();
    }
  </script>
</body>
</html>
