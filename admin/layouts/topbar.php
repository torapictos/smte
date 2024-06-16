<?php
include_once('class/adminback.php');
$obj = new adminback();

if (isset($_GET['logout'])) {
    if ($_GET['logout'] == 'logout') {
        $obj->user_logout();
    }
}


?>

<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="employee-dashboard.php" class="logo">
            <!-- <img src="assets/img/logo.svg" alt="Logo"> -->
        </a>
        <a href="employee-dashboard.php" class="logo collapse-logo">
            <!-- <img src="assets/img/collapse-logo.svg" alt="Logo"> -->
        </a>
        <a href="employee-dashboard.php" class="logo2">
            <!-- <img src="assets/img/logo2.png" width="40" height="40" alt="Logo"> -->
        </a>
    </div>
    <!-- /Logo -->

    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Title -->
    <div class="page-title-box">
        <h3>ระบบการประชุมวิชาการเครือข่ายห้องเรียนพิเศษฯ</h3>
    </div>
    <!-- /Header Title -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa-solid fa-bars"></i></a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Search -->
        <li class="nav-item">
            <div class="top-nav-search">
                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>               
            </div>
        </li>
        <!-- /Search -->




        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img"><img src="assets/img/avatar/avatar-27.jpg" alt="User Image">
                    <span class="status online"></span></span>
                <span>Admin</span>
            </a>
            <div class="dropdown-menu">          
                <a class="dropdown-item" href="?logout=logout">ออกจากระบบ</a>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.php">My Profile</a>
            <a class="dropdown-item" href="settings.php">Settings</a>
            <a class="dropdown-item" href="index.php?logout=logout">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->

</div>
<!-- /Header -->