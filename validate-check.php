<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Radio Button ตัวเลือก ต้องการ/ไม่ต้องการ</title>
</head>
<body>
    <h1>ต้องการหรือไม่ต้องการ?</h1>
    <label for="needRadioButton">ต้องการ</label>
    <input type="radio" id="needRadioButton" name="needRadio" value="need">

    <label for="notNeedRadioButton">ไม่ต้องการ</label>
    <input type="radio" id="notNeedRadioButton" name="needRadio" value="notNeed">

    <div id="selectBoxContainer" style="display: none;">
        <label for="selectBox">ตัวเลือกเพิ่มเติม:</label>
        <select id="selectBox" name="selectBox">
            <option value="option1">ตัวเลือก 1</option>
            <option value="option2">ตัวเลือก 2</option>
            <option value="option3">ตัวเลือก 3</option>
        </select>
    </div>

    <script>
        const needRadioButton = document.getElementById('needRadioButton');
        const notNeedRadioButton = document.getElementById('notNeedRadioButton');
        const selectBoxContainer = document.getElementById('selectBoxContainer');

        needRadioButton.addEventListener('change', function() {
            if (needRadioButton.checked) {
                selectBoxContainer.style.display = 'block';
            } else {
                selectBoxContainer.style.display = 'none';
            }
        });

        notNeedRadioButton.addEventListener('change', function() {
            if (notNeedRadioButton.checked) {
                selectBoxContainer.style.display = 'none';
            }
        });
    </script>
</body>
</html>