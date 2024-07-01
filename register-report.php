<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>

    <title>ข้อมูลผู้ลงทะเบียน
    </title>

    <?php include 'layouts/title-meta.php'; ?>

    <?php include 'layouts/head-css.php'; ?>

</head>

<body>
    <table>
        <thead>
            <tr>
                <th rowspan="2">ลำดับ</th>
                <th rowspan="2">โรงเรียน</th>
                <th rowspan="2">นักเรียน</th>
                <th colspan="2">ครูที่ปรึกษา</th>
                <th colspan="2">ผู้บริหาร</th>
                <th colspan="2">ครูผู้เกษียณอายุราชการ</th>
            </tr>
            <tr>
                <th>เข้าร่วม</th>
                <th>ไม่เข้าร่วม</th>
                <th>เข้าร่วม</th>
                <th>ไม่เข้าร่วม</th>
                <th>เข้าร่วม</th>
                <th>ไม่เข้าร่วม</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ธาตุนารายณ์วิทยา</td>
                <td>30</td>
                <td>15</td>
                <td>-</td>
                <td>4</td>
                <td>-</td>
                <td>2</td>
                <td>-</td>
            </tr>
            <tr>
                <td>อุดรพิทยานุกูล</td>
                <td>30</td>
                <td>10</td>
                <td>3</td>
                <td>1</td>
                <td>-</td>
                <td>3</td>
                <td>1</td>
            </tr>
            <tr>
                <td colspan="8">รวมทั้งสิ้น</td>
            </tr>
        </tbody>
    </table>





    <?php include 'layouts/customizer.php'; ?>
    <!-- JAVASCRIPT -->
    <?php include 'layouts/vendor-scripts.php'; ?>
</body>

</html>


</body>

</html>