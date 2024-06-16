<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>

    <title>รายละเอียดการเลือกเสื้อผู้ร่วมงาน</title>
    </title>

    <?php include 'layouts/title-meta.php'; ?>

    <?php include 'layouts/head-css.php'; ?>

</head>
<?php include 'class/adminback.php'; ?>


<?php
$obj = new adminback();
if (isset($_GET['logout'])) {
    if ($_GET['logout'] == 'logout') {
        $obj->admin_logout();
    }
}



$school_name = $obj->display_school();

$totalStudent = $obj->total_associate('นักเรียน');
$totalTeacher = $obj->total_associate('ครูที่ปรึกษา');
$totalBoss = $obj->total_associate('ผู้บริหาร');
$totalRetire = $obj->total_associate('ครูผู้เกษียณ');

$totalStudentShirt = $obj->total_associate_shirt('นักเรียน', '-เลือกขนาดเสื้อ-');
$totalStudentNotShirt = $obj->total_associate_not_shirt('นักเรียน', '-เลือกขนาดเสื้อ-');

$totalTeacherShirt = $obj->total_associate_shirt('ครูที่ปรึกษา', '-เลือกขนาดเสื้อ-');
$totalTeacherNotShirt = $obj->total_associate_not_shirt('ครูที่ปรึกษา', '-เลือกขนาดเสื้อ-');

$totalBossShirt = $obj->total_associate_shirt('ผู้บริหาร', '-เลือกขนาดเสื้อ-');
$totalBossNotShirt = $obj->total_associate_not_shirt('ผู้บริหาร', '-เลือกขนาดเสื้อ-');

$totalRetireShirt = $obj->total_associate_shirt('ครูผู้เกษียณ', '-เลือกขนาดเสื้อ-');
$totalRetireNotShirt = $obj->total_associate_not_shirt('ครูผู้เกษียณ', '-เลือกขนาดเสื้อ-');



?>

<body>
    <div class="main-wrapper">
        <?php include 'layouts/menu.php'; ?>

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">รายละเอียดการเลือกเสื้อผู้ร่วมงาน</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.php">หน้าหลัก</a></li>
                                <li class="breadcrumb-item active">รายละเอียดเสื้อผู้ร่วมงาน</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Leave Statistics -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>นักเรียน</h6>
                            <h6>(ทั้งหมด/รับเสื้อ/ไม่รับเสื้อ)</h6>
                            <h4>
                                <?foreach ($totalStudent as $row_totalStudent) {
                                    echo $row_totalStudent['count'];
                                }?> | <?foreach ($totalStudentShirt as $row_totalStudentShirt) {
                                    echo $row_totalStudentShirt['count'];
                                }?> | <?foreach ($totalStudentNotShirt as $row_totalStudentNotShirt) {
                                    echo $row_totalStudentNotShirt['count'];
                                }?>
                            
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>ครูที่ปรึกษา</h6>
                            <h6>(ทั้งหมด/รับเสื้อ/ไม่รับเสื้อ)</h6>
                            <h4>
                                <?foreach ($totalTeacher as $row_totalTeacher) {
                                    echo $row_totalTeacher['count'];
                                }?> | <?foreach ($totalTeacherShirt as $row_totalTeacherShirt) {
                                    echo $row_totalTeacherShirt['count'];
                                }?> | <?foreach ($totalTeacherNotShirt as $row_totalTeacherNotShirt) {
                                    echo $row_totalTeacherNotShirt['count'];
                                }?>
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>ผู้บริหาร</h6>
                            <h6>(ทั้งหมด/รับเสื้อ/ไม่รับเสื้อ)</h6>
                            <h4>
                                <?foreach ($totalBoss as $row_totalBoss) {
                                    echo $row_totalBoss['count'];
                                }?> | <?foreach ($totalBossShirt as $row_totalBossShirt) {
                                    echo $row_totalBossShirt['count'];
                                }?> | <?foreach ($totalBossNotShirt as $row_totalBossNotShirt) {
                                    echo $row_totalBossNotShirt['count'];
                                }?>
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>ครูผู้เกษียณ</h6>
                            <h6> (ทั้งหมด/รับเสื้อ/ไม่รับเสื้อ)</h6>
                            <h4>
                                <?foreach ($totalRetire as $row_totalRetire) {
                                    echo $row_totalRetire['count'];
                                }?> | <?foreach ($totalRetireShirt as $row_totalRetireShirt) {
                                    echo $row_totalRetireShirt['count'];
                                }?> | <?foreach ($totalRetireNotShirt as $row_totalRetireNotShirt) {
                                    echo $row_totalRetireNotShirt['count'];
                                }?>
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- /Leave Statistics -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table leave-employee-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>โรงเรียน</th>
                                        <th>นักเรียน</th>
                                        <th>ครูที่ปรึกษา</th>
                                        <th>ผู้บริหาร</th>
                                        <th>ครูผู้เกษียณ</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($school_name as $row_school) { ?>

                                        <?php $school_name = $row_school['user_school'] ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $school_name ?></td>
                                            <!-- Student -->
                                            <td>
                                                <?php
                                                $totalStudents = $obj->total_count_school('นักเรียน', $school_name);
                                                foreach ($totalStudents as $row_totalStudent) {
                                                    echo $row_totalStudent['count'];
                                                }
                                                ?>
                                                |
                                                <?php
                                                $totalStudents = $obj->total_school_shirt('นักเรียน', $school_name);
                                                foreach ($totalStudents as $row_totalStudent) {
                                                    echo $row_totalStudent['count'];
                                                }
                                                ?>
                                                |
                                                <?php
                                                $totalStudents = $obj->total_school_not_shirt('นักเรียน', $school_name);
                                                foreach ($totalStudents as $row_totalStudent) {
                                                    echo $row_totalStudent['count'];
                                                }
                                                ?>


                                            </td>

                                            <!-- Teacher -->
                                            <td>
                                                <?php
                                                $totalTeacher = $obj->total_count_school('ครูที่ปรึกษา', $school_name);
                                                foreach ($totalTeacher as $row_totalTeacher) {
                                                    echo $row_totalTeacher['count'];
                                                }
                                                ?>
                                                |
                                                <?php
                                                $totalTeacher = $obj->total_school_shirt('ครูที่ปรึกษา', $school_name);
                                                foreach ($totalTeacher as $row_totalTeacher) {
                                                    echo $row_totalTeacher['count'];
                                                }
                                                ?>
                                                |
                                                <?php
                                                $totalTeacher = $obj->total_school_not_shirt('ครูที่ปรึกษา', $school_name);
                                                foreach ($totalTeacher as $row_totalTeacher) {
                                                    echo $row_totalTeacher['count'];
                                                }
                                                ?>


                                            </td>

                                            <!-- Boss -->
                                            <td>
                                                <?php
                                                $totalBoss = $obj->total_count_school('ผู้บริหาร', $school_name);
                                                foreach ($totalBoss as $row_totalBoss) {
                                                    echo $row_totalBoss['count'];
                                                }
                                                ?>
                                                |
                                                <?php
                                                $totalBoss = $obj->total_school_shirt('ผู้บริหาร', $school_name);
                                                foreach ($totalBoss as $row_totalBoss) {
                                                    echo $row_totalBoss['count'];
                                                }
                                                ?>
                                                |
                                                <?php
                                                $totalBoss = $obj->total_school_not_shirt('ผู้บริหาร', $school_name);
                                                foreach ($totalBoss as $row_totalBoss) {
                                                    echo $row_totalBoss['count'];
                                                }
                                                ?>


                                            </td>

                                            <!-- Retire -->
                                            <td>
                                                <?php
                                                $totalRetire = $obj->total_count_school('ครูผู้เกษียณ', $school_name);
                                                foreach ($totalRetire as $row_totalRetire) {
                                                    echo $row_totalRetire['count'];
                                                }
                                                ?>
                                                |
                                                <?php
                                                $totalRetire = $obj->total_school_shirt('ครูผู้เกษียณ', $school_name);
                                                foreach ($totalRetire as $row_totalRetire) {
                                                    echo $row_totalRetire['count'];
                                                }
                                                ?>
                                                |
                                                <?php
                                                $totalRetire = $obj->total_school_not_shirt('ครูผู้เกษียณ', $school_name);
                                                foreach ($totalRetire as $row_totalRetire) {
                                                    echo $row_totalRetire['count'];
                                                }
                                                ?>


                                            </td>

                                        </tr>


                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->





        </div>
        <!-- /Page Wrapper -->


    </div>
    <!-- end main wrapper-->

    <?php include 'layouts/customizer.php'; ?>
    <!-- JAVASCRIPT -->
    <?php include 'layouts/vendor-scripts.php'; ?>



</body>

</html>