<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<?php
include_once('class/adminback.php');
$obj = new adminback();
$user_profile =  $obj->display_user_profile();
$teacher_level_info = $obj->display_teacher_level_details();
$shirt_info = $obj->display_shirt_info();
$user_profile_modal = $obj->display_user_profile();



if (isset($_POST['update_user_btn'])) {

    $update_msg = $obj->update_users($_POST);
    echo "<script>alert('$update_msg')</script>";
    echo "<script>window.location.href = 'profile.php'</script>";
}

?>

<head>

    <title>ข้อมูลส่วนตัว</title>

    <?php include 'layouts/title-meta.php'; ?>

    <?php include 'layouts/head-css.php'; ?>

</head>

<body>
    <div class="main-wrapper">
        <?php include 'layouts/menu.php'; ?>


        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid pb-0">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">ข้อมูลส่วนตัว</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="employee-dashboard.php">หน้าหลัก</a></li>
                                <li class="breadcrumb-item active">ข้อมูลส่วนตัว</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <?php while ($user = mysqli_fetch_assoc($user_profile)) { ?>
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-view">

                                        <div class="profile-basic">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="profile-info-left">
                                                        <h2 class="user-name m-t-0 mb-0"><?php echo $user['user_firstname'] . " " . $user['user_lastname'] ?></h2>
                                                        <h4 class="text-muted">ผู้ประสานงานโรงเรียน</h4>
                                                        <div class="staff-msg"><a class="btn btn-custom" data-bs-target="#profile_info" data-bs-toggle="modal" class="edit-icon" href="#">แก้ไขข้อมูลส่วนตัว</a></div>

                                                        <p class="text-success account-subtitle" id="update_msg">
                                                            <?php
                                                            if (isset($update_msg)) {
                                                                echo $update_msg;
                                                            }

                                                            ?>


                                                        </p>



                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="personal-info">
                                                        <li>
                                                            <div class="title">หมายเลขโทรศัพท์:</div>
                                                            <div class="text"><a href="#"><?php echo $user['user_mobile'] ?></a></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">ตำแหน่ง:</div>
                                                            <div class="text"><a href="#"><?php echo $user['level'] ?></a></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">ขนาดเสื้อ:</div>
                                                            <div class="text"><a href="#"><?php echo $user['size'] ?></a></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">โรงเรียน:</div>
                                                            <div class="text"><a href="#"><?php echo $_SESSION['school'] ?></a></div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pro-edit"><a data-bs-target="#profile_info" data-bs-toggle="modal" class="edit-icon" href="#"><i class="fa-solid fa-pencil"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>



            </div>
            <!-- /Page Content -->

            <!-- Profile Modal -->
            <div id="profile_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">แก้ไขข้อมูลส่วนตัว</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <?php while ($userModal = mysqli_fetch_assoc($user_profile_modal)) { ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-block mb-3">
                                                        <label class="col-form-label">ชื่อ</label>
                                                        <input type="text" name="user_firstname" class="form-control" value="<?php echo $userModal['user_firstname'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-block mb-3">
                                                        <label class="col-form-label">นามสกุล</label>
                                                        <input type="text" name="user_lastname" class="form-control" value="<?php echo $userModal['user_lastname'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">หมายเลขโทรศัพท์</label>
                                                <input type="text" id="user_mobile" name="user_mobile" class="form-control" value="<?php echo $userModal['user_mobile'] ?>" onkeyup="validatePhoneNumber()">
                                                <div id="phoneNumberError" style="display: none; color: red;"></div>
                                            </div>
                                        </div>

                

                                        <div class="col-md-4">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">ตำแหน่ง <span class="text-danger">*</span></label>
                                                <select name="user_level" class="select" required>
                                                    <option value="9">- เลือกตำแหน่ง -</option>
                                                    <?php while ($teacherLevel = mysqli_fetch_assoc($teacher_level_info)) { ?>
                                                        <option value="<?php echo $teacherLevel['tl_id'] ?>" <?php if ($userModal['user_level'] == $teacherLevel['tl_id']) { ?> selected <?php } ?>><?php echo $teacherLevel['level'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">ขนาดเสื้อ <span class="text-danger">*</span></label>
                                                <select name="user_shirt" class="select" required >
                                                    <option value="10">- เลือกขนาดเสื้อ -</option>
                                                    <?php while ($shirt = mysqli_fetch_assoc($shirt_info)) { ?>
                                                        <option value="<?php echo $shirt['s_id'] ?>" <?php if ($userModal['user_shirt'] == $shirt['s_id']) { ?> selected <?php } ?>> <?php echo $shirt['size'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input-block mb-3">
                                                <input type="hidden" name="user_id" class="form-control" value="<?php echo $userModal['user_id'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn" name="update_user_btn" type="submit">บันทึก</button>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Profile Modal -->
        </div>
        <!-- /Page Wrapper -->


    </div>
    <!-- end main wrapper-->

    <?php include 'layouts/customizer.php'; ?>
    <!-- JAVASCRIPT -->
    <?php include 'layouts/vendor-scripts.php'; ?>





</body>

</html>