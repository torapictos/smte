<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php
$username = $_SESSION['username'];
include_once('class/adminback.php');
$obj = new adminback();

$user = $obj->display_user_profile();

if (isset($_GET['logout'])) {
    if ($_GET['logout'] == "logout") {
        $obj->user_logout();
        header('location:index.php');
    }
}

?>

<head>

    <title>ลงทะเบียน - SMTE</title>

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

                <!-- Leave Alert -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="employee-alert-box">
                            <div class="alert alert-outline-danger alert-dismissible fade show">
                                <div class="employee-alert-request">
                                <i class="feather-alert-octagon flex-shrink-0 me-2"></i>
                                    เปิดระบบให้ลงทะเบียนโครงงานภายใน <span>“วันที่ 24 มิถุนายน 2567 - วันที่ 30 มิถุนายน 2567”</span> เท่านั้น!!!
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-xmark"></i></button>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        &nbsp;
                    </div>
                </div>
                <!-- /Leave Alert -->

                <div class="row">

                    <!-- Profiles Details -->
                    <div class="col-lg- col-md-12">
                        <div class="card employee-welcome-card flex-fill">
                            <div class="card-body">
                                <div class="welcome-info">
                                    <div class="welcome-content">
                                        <?php while ($user_profile = mysqli_fetch_assoc($user)) { ?>
                                            <h4>ยินดีต้อนรับ <?php echo $user_profile['user_firstname'] . ' ' . $user_profile['user_lastname']; ?></h4>
                                            <p><strong>ผู้ประสานงาน</strong> <span>โรงเรียน<?php echo $_SESSION['school']; ?></span></p>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="welcome-btn">
                                    <a href="profile.php" class="btn">ข้อมูลส่วนตัว</a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /Profiles Details -->

                    <div class="row">

                        <!-- Project Details -->
                        <div class="col-lg- col-md-12">

                            <div class="card info-card flex-fill">
                                <div class="card-body">
                                    <h4>ข้อมูลโครงงานตามสาขาวิชา</h4>
                                    <div class="holiday-details">
                                        <div class="holiday-calendar">
                                            <div class="holiday-calendar-icon">
                                                <img src="assets/img/icons/holiday-calendar.svg" alt="Icon">
                                            </div>
                                            <div class="holiday-calendar-content">
                                                <h6>เปิดระบบให้ส่งข้อมูลโครงงาน</h6>
                                                <p>วันที่ 24 มิถุนายน 2567 - วันที่ 30 มิถุนายน 2567 นี้เท่านั้น</p>
                                            </div>
                                        </div>
                                        <!-- <div class="holiday-btn">
                                            <a href="projects.php" class="btn">ดูทั้งหมด</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /Project Details -->
                    </div>


                </div>


                <!-- /Page Content -->

            </div>
            <!-- /Page Wrapper -->

        </div>
        <!-- end main wrapper-->

        <?php include 'layouts/customizer.php'; ?>

        <?php include 'layouts/vendor-scripts.php'; ?>
</body>

</html>