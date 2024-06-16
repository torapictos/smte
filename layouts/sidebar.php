<?php
$link = $_SERVER['PHP_SELF'];
$link_array = explode('/', $link);
$page = end($link_array);
?>
<?php
include_once('class/adminback.php');
$obj = new adminback();
$user_sidebar =  $obj->display_user_profile();

?>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">

            <ul class="sidebar-vertical">
                <li class="menu-title">
                    <span><b>
                    <?php while ($userSidebar = mysqli_fetch_assoc($user_sidebar))
                            echo $userSidebar['user_school'];
                        ?>
                    </b></span>
                    <!-- <small class="newly-added-features">New</small> -->
                </li>
                <li class="<?php echo ($page == 'school-dashboard.php') ? 'active' : ''; ?>">
                    <a href="school-dashboard.php"><i class="la la-building"></i> <span> หน้าหลัก </span></a>
                </li>

                <li class="<?php echo ($page == 'sc-projects-list.php') ? 'active' : ''; ?>">
                    <a href="sc-projects-list.php" class="noti-dot"><i class="la la-rocket"></i> <span> ข้อมูลโครงงาน </span></a>
                </li>

                <li class="submenu">
                    <a href="#" ><i class="la la-user"></i> <span> ข้อมูลรายชื่อ</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="<?php echo ($page == 'sc-students-list.php') ? 'active' : ''; ?>" href="sc-students-list.php">รายชื่อนักเรียน</a></li>
                        <li><a class="<?php echo ($page == 'sc-teacher-list.php') ? 'active' : ''; ?>" href="sc-teacher-list.php">รายชื่อครูที่ปรึกษา/ผู้ดูแล</a></li>
                        <li><a class="<?php echo ($page == 'sc-boss-list.php') ? 'active' : ''; ?>" href="sc-boss-list.php">รายชื่อผู้บริหาร</a></li>
                        <li><a class="<?php echo ($page == 'sc-retire-list.php') ? 'active' : ''; ?>" href="sc-retire-list.php">รายชื่อครูเกษียณ</a></li>

                    </ul>
                </li>
            </ul>

        </div>
    </div>
</div>

<!-- /Sidebar -->