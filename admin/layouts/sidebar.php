<?php
$link = $_SERVER['PHP_SELF'];
$link_array = explode('/', $link);
$page = end($link_array);
?>
<?php
include_once('class/adminback.php');
$obj = new adminback();

?>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">

            <ul class="sidebar-vertical">
                <li class="menu-title">
                    <span><b>
                    Admin
                    </b></span>
                    <small class="newly-added-features">New</small>
                </li>
                <li class="<?php echo ($page == 'admin-dashboard.php') ? 'active' : ''; ?>">
                    <a href="admin-dashboard.php"><i class="la la-home"></i> <span> หน้าหลัก </span></a>
                </li>
                <li class="<?php echo ($page == 'admin-dashboard.php') ? 'active' : ''; ?>">
                    <a href="associate-dashboard.php"><i class="la la-building"></i> <span> สรุปผู้เข้าร่วมงาน </span></a>
                </li>
                <li class="<?php echo ($page == 'admin-dashboard.php') ? 'active' : ''; ?>">
                    <a href="shirt-dashboard.php"><i class="fa-solid fa-shirt"></i> <span> สรุปเสื้อผู้ร่วมงาน </span></a>
                </li>

           

               
            </ul>

        </div>
    </div>
</div>

<!-- /Sidebar -->