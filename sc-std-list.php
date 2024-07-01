<?php
error_reporting(E_ALL);
?>
<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php
$school = $_SESSION['school'];
include_once('class/adminback.php');
$obj = new adminback();
$asso_student = $obj->display_associate_student_register($school);

if (isset($_POST['add_student_btn'])) {
    $add_msg = $obj->associate_student_register($_POST);
}



if (isset($_POST['edit_student_btn'])) {
    $studentId = $_POST['asso_student_id_edit'];
    $update_msg = $obj->update_associate_student($_POST);
}

if (isset($_GET['id'])) {
    $studentId = $_GET['id'];
    $delete_msg = $obj->delete_associate($studentId);
}




?>


<head>

    <title>ข้อมูลนักเรียน</title>

    <?php include 'layouts/title-meta.php'; ?>

    <?php include 'layouts/head-css.php'; ?>

    <script src='assets/js/sweetalert2.js'> </script>

</head>

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
                            <h3 class="page-title">ข้อมูลนักเรียน </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.php">หน้าหลัก</a></li>
                                <li class="breadcrumb-item active">ข้อมูลนักเรียน</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>ตำแหน่ง</th>
                                        <th>เบอร์โทรศัพท์</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($asso_student as $row) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $i ?>
                                            </td>
                                            <td><?php echo $row['asso_prename'] ?><?php echo $row['asso_firstname'] ?> <?php echo $row['asso_lastname'] ?></td>
                                            <td><?php echo $row['asso_type'] ?></td>
                                            <td><?php echo $row['asso_mobile'] ?></td>
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

    <?php include 'layouts/customizer.php'; ?>
    <!-- JAVASCRIPT -->
    <?php include 'layouts/vendor-scripts.php'; ?>



</body>

</html>