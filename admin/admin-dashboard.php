<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>แดชบอร์ดผู้ดูแลระบบ</title>
    <?php include 'layouts/title-meta.php'; ?>
    <?php include 'layouts/head-css.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>
<?php include 'class/adminback.php'; ?>


<?php
$obj = new adminback();
if (isset($_GET['logout'])) {
    if ($_GET['logout'] == 'logout') {
        $obj->admin_logout();
    }
}

$user_info_count = $obj->display_count_register();
$user_shirt = $obj->display_count_shirt();
$size_ss = $obj->display_count_shirt_size('SS(อก34,ยาว25)');
$size_s = $obj->display_count_shirt_size('S(อก36,ยาว26)');
$size_m = $obj->display_count_shirt_size('M(อก38,ยาว27)');
$size_l = $obj->display_count_shirt_size('L(อก40,ยาว28)');
$size_xl = $obj->display_count_shirt_size('XL(อก42,ยาว29)');
$size_2xl = $obj->display_count_shirt_size('2XL(อก44,ยาว30)');
$size_3xl = $obj->display_count_shirt_size('3XL(อก46,ยาว31)');
$size_4xl = $obj->display_count_shirt_size('4XL(อก48,ยาว32)');
$size_5xl = $obj->display_count_shirt_size('5XL(อก50,ยาว33)');

$school_name = $obj->display_school()



?>

<!-- Main Wrapper -->
<div class="main-wrapper">
    <?php include 'layouts/menu.php'; ?>
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">ยินดีต้อนรับ ผู้ดูแลระบบ!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">หน้าแดชบอร์ด</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">

                <div class="col-sm-12">
                    <h3 class="page-title"></h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 ">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa-solid fa-user"></i></span>
                            <div class="dash-widget-info">
                                <span class="text-center">จำนวนผู้ลงทะเบียน</span>
                                <h3 class="text-center"><?php echo $user_info_count ?></h3>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 ">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa-solid fa-shirt"></i></span>
                            <div class="dash-widget-info">
                                <span class="text-center">จำนวนผู้ที่ต้องการเสื้อ</span>
                                <h3 class="text-center"><?php echo $user_shirt ?></h3>

                            </div>
                        </div>
                    </div>
                </div>



            </div>

            <!-- Statistics Widget -->
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-12">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h4 class="card-title">จำนวนเสื้อแยกตามขนาด</h4>

                            <div>
                                <p><i class="fa fa-dot-circle-o text-purple me-2"></i>SS(อก34,ยาว25)<span class="float-end"><?php echo $size_ss ?> ตัว</span></p>
                                <p><i class="fa fa-dot-circle-o text-purple me-2"></i>S(อก36,ยาว26)<span class="float-end"><?php echo $size_s ?> ตัว</span></p>
                                <p><i class="fa fa-dot-circle-o text-warning me-2"></i>M(อก38,ยาว27) <span class="float-end"><?php echo $size_m ?> ตัว</span></p>
                                <p><i class="fa fa-dot-circle-o text-success me-2"></i>L(อก40,ยาว28) <span class="float-end"><?php echo $size_l ?> ตัว</span></p>
                                <p><i class="fa fa-dot-circle-o text-danger me-2"></i>XL(อก42,ยาว29) <span class="float-end"><?php echo $size_xl ?> ตัว</span></p>
                                <p><i class="fa fa-dot-circle-o text-info me-2"></i>2XL(อก44,ยาว30) <span class="float-end"><?php echo $size_2xl ?> ตัว</span></p>
                                <p><i class="fa fa-dot-circle-o text-info me-2"></i>3XL(อก46,ยาว31) <span class="float-end"><?php echo $size_3xl ?> ตัว</span></p>
                                <p><i class="fa fa-dot-circle-o text-info me-2"></i>4XL(อก48,ยาว32) <span class="float-end"><?php echo $size_4xl ?> ตัว</span></p>
                                <p><i class="fa fa-dot-circle-o text-info me-2"></i>5XL(อก50,ยาว33) <span class="float-end"><?php echo $size_5xl ?> ตัว</span></p>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /Statistics Widget -->

            <!-- Data Tables -->
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">แสดงรายละเอียดผู้ลงทะเบียน</h4>
                        <p class="card-text">
                            รายละเอียดการลงทะเบียนตามชื่อโรงเรียน
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>โรงเรียน</th>
                                        <th>นักเรียน</th>
                                        <th>ครูที่ปรึกษา</th>
                                        <th>ผู้บริหาร</th>
                                        <th>ครูผู้เกษียน</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($school_name as $row_school) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $i ?>
                                            </td>
                                            <td><?php echo $row_school['user_school'] ?></td>
                                            <!-- Display student -->
                                            <td class="text-center">
                                                <?php
                                                $student_count = $obj->display_student_count($row_school['user_school']);
                                                if (isset($student_count) && !empty($student_count)) {
                                                    foreach ($student_count as $row_student) {
                                                        echo $row_student['student_count'];
                                                    }
                                                } else {
                                                    echo '';
                                                }
                                                ?>
                                            </td>
                                            <!-- /Display student -->

                                            <!-- Display teacher -->
                                            <td class="text-center">

                                                <?php
                                                $teacher_count = $obj->display_teacher_count($row_school['user_school']);
                                                if (isset($teacher_count) && !empty($teacher_count)) {
                                                    foreach ($teacher_count as $row_teacher) {
                                                        echo $row_teacher['teacher_count'];
                                                    }
                                                } else {
                                                    echo '';
                                                }
                                                ?>
                                            </td>
                                            <!-- /Display teacher -->

                                            <!-- Display boss -->
                                            <td class="text-center">

                                                <?php
                                                $boss_count = $obj->display_boss_count($row_school['user_school']);
                                                if (isset($boss_count) && !empty($boss_count)) {
                                                    foreach ($boss_count as $row_boss) {
                                                        echo $row_boss['boss_count'];
                                                    }
                                                } else {
                                                    echo '';
                                                }
                                                ?>
                                            </td>
                                            <!-- /Display boss -->

                                            <!-- Display retire -->
                                            <td class="text-center">

                                                <?php
                                                $retire_count = $obj->display_retire_count($row_school['user_school']);
                                                if (isset($retire_count) && !empty($retire_count)) {
                                                    foreach ($retire_count as $row_retire) {
                                                        echo $row_retire['retire_count'];
                                                    }
                                                } else {
                                                    echo '';
                                                }
                                                ?>
                                            </td>
                                            <!-- /Display retire -->


                                        </tr>
                                    <?php $i++;
                                    } ?>

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->



    </div>
    <!-- /Page Wrapper -->


</div>
<!-- /Main Wrapper -->

<?php include 'layouts/customizer.php'; ?>
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- Delete data of student from database -->
<script>
    $(document).ready(function() {
        $('#delete-continue-btn').click(function() {
            var adminAssoId = $(this).data('admin-asso-id');
            console.log(adminAssoId);
            // $.ajax({
            //     url: "admin-delete.php", // เปลี่ยนเป็น URL ของ PHP script จริงของคุณ
            //     method: "POST",
            //     data: {
            //         id: adminAssoId
            //     }, // ส่ง ID ของข้อมูลให้กับ script
            //     success: function(response) {
            //         if (response === "success") {
            //             Swal.fire({
            //                 title: 'ลบข้อมูลสำเร็จ!',
            //                 text: 'ข้อมูลถูกลบออกจากระบบเรียบร้อยแล้ว',
            //                 icon: 'success'
            //             }).then(function() {
            //                 $(this).closest("tr").remove();
            //                 window.location.href = "admin-dashboard.php";
            //             });
            //         } else {
            //             Swal.fire({
            //                 title: 'เกิดข้อผิดพลาด!',
            //                 text: 'ไม่สามารถลบข้อมูลนักเรียนได้ กรุณาลองอีกครั้ง',
            //                 icon: 'error'
            //             });
            //         }
            //     }
            // });
        });
    });
</script>

</body>

</html>