function validatePhoneNumber(phoneNumber) {
  // ลบช่องว่าง
  phoneNumber = phoneNumber.replace(/\s/g, "");

  // ตรวจสอบความยาว
  if (phoneNumber.length !== 10) {
    return false;
  }

  // ตรวจสอบตัวอักษรแรก
  if (phoneNumber[0] !== "0") {
    return false;
  }

  // ตรวจสอบตัวอักษร
  for (let i = 1; i < phoneNumber.length; i++) {
    if (!isNaN(phoneNumber[i])) {
      continue;
    }
    return false;
  }

  return true;
}

const phoneNumberInput = document.getElementById("user_mobile");
const phoneNumberError = document.getElementById("phoneNumberError");

phoneNumberInput.addEventListener("keyup", function () {
  const phoneNumber = phoneNumberInput.value;
  const isValid = validatePhoneNumber(phoneNumber);

  if (isValid) {
    phoneNumberError.style.display = "none";
  } else {
    phoneNumberError.style.display = "block";
    phoneNumberError.textContent = "เบอร์โทรศัพท์ไม่ถูกต้อง";
  }
});
