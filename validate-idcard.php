<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>ตรวจสอบเลขประชาชน</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.min.css">
</head>
<body>
  <h1>ตรวจสอบเลขประชาชน</h1>

  <label for="idCard">เลขประชาชน:</label>
  <input type="text" id="idCard" name="idCard" required><br><br>

  <button onclick="validateIdCard()">ตรวจสอบ</button>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.min.js"></script>
  <script>
    function validateIdCard() {
      const idCard = document.getElementById('idCard').value;

      // ตรวจสอบความยาวของเลขประชาชน
      if (idCard.length != 13) {
        Swal.fire({
          icon: 'error',
          title: 'ข้อผิดพลาด',
          text: 'เลขประชาชนต้องมี 13 หลัก'
        });
        return;
      }

      // แปลงเลขประชาชนเป็นตัวเลข
      const idCardNumbers = [];
      for (let i = 0; i < 13; i++) {
        idCardNumbers[i] = parseInt(idCard.charAt(i));
      }

      // คำนวณผลรวมของเลขคูณตำแหน่ง
      let sum = 0;
      for (let i = 0; i < 12; i++) {
        sum += idCardNumbers[i] * (13 - i);
      }

      // หาเศษของผลรวมหารด้วย 11
      const remainder = sum % 11;

      // ตรวจสอบเลขหลักสุดท้าย
      let lastDigit;
      if (remainder == 0) {
        lastDigit = 0;
      } else {
        lastDigit = 11 - remainder;
      }

      // เปรียบเทียบเลขหลักสุดท้ายที่คำนวณได้กับเลขหลักสุดท้ายที่รับมา
      if (idCardNumbers[12] == lastDigit) {
        Swal.fire({
          icon: 'success',
          title: 'ตรวจสอบสำเร็จ',
          text: 'เลขประชาชนถูกต้อง'
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'ตรวจสอบไม่ผ่าน',
          text: 'เลขประชาชนไม่ถูกต้อง'
        });
      }
    }
  </script>
</body>
</html>
