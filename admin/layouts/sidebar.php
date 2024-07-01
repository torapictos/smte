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

                <li class="menu-title">
                    <span><b>
                            Poject
                        </b></span>
                    <small class="newly-added-features">New</small>
                </li>
                <li class="<?php echo ($page == 'project-dashboard.php') ? 'active' : ''; ?>">
                    <a href="project-dashboard.php"><i class="fa fa-sitemap"></i> <span> สรุปการลงทะเบียนโครงงาน </span></a>
                </li>


                <li class="submenu">
                        <a href="#" class="noti-dot"><i class="fa fa-rocket"></i> <span> รายละเอียดโครงงาน</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a class="<?php echo ($page == 'project-detail.php')?'active':'';?>" href="project-detail.php">โครงงานทั้งหมด</a></li>
                            <li><a class="<?php echo ($page == 'project-detail-oral.php')?'active':'';?>" href="project-detail-oral.php">การนำเสนอแบบปากเปล่า</a></li>
                            <li><a class="<?php echo ($page == 'project-detail-poster.php')?'active':'';?>" href="project-detail-poster.php">การนำเสนอแบบโปสเตอร์</a></li>
                            <li><a class="<?php echo ($page == 'project-detail-english.php')?'active':'';?>" href="project-detail-english.php">การนำเสนอเป็นภาษาอังกฤษ</a></li>
                        </ul>
                    </li>
                <!-- <li class="submenu">
                    <a href="#" class="noti-dot"><i class="fa fa-rocket"></i> <span> รายละเอียดโครงงาน</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="<?php echo ($page == 'project-detail.php') ? 'active' : ''; ?>">
                            <a href="project-detail.php"><span> รายละเอียดโครงงาน </span></a>
                        </li>
                    </ul>


                </li> -->




            </ul>

        </div>
    </div>
</div>

<!-- /Sidebar -->