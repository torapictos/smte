<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>สรุปผู้เข้าร่วมงาน</title>
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



$school_name = $obj->display_school();
$totalCome = $obj->total_come('เข้าร่วมงาน');
$totalNotCome = $obj->total_come('ไม่เข้าร่วมงาน');



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
                        <h3 class="page-title">สรุปผู้เข้าร่วมงาน!</h3>
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




            </div>


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
                                <span class="text-center">จำนวนผู้เข้าร่วมงาน</span>
                                <h3 class="text-center">
                                    <?php 
                                        foreach ($totalCome as $row_totalCome) {
                                            echo $row_totalCome['count'];
                                        }
                                    ?>
                                </h3>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 ">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa-solid fa-user"></i></span>
                            <div class="dash-widget-info">
                                <span class="text-center">จำนวนผู้ไม่เข้าร่วมงาน</span>
                                <h3 class="text-center">
                                    <?php 
                                        foreach ($totalNotCome as $row_totalNotCome) {
                                            echo $row_totalNotCome['count'];
                                        }
                                    ?>
                                </h3>

                            </div>
                        </div>
                    </div>
                </div>



            </div>



            <!-- Data Tables -->
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">แสดงรายละเอียดผู้ลงทะเบียน</h4>
                        <p class="card-text">
                            แยกประเภทผู้ลงทะเบียนตามชื่อโรงเรียน
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center">ลําดับ</th>
                                        <th rowspan="2" class="text-center">โรงเรียน</th>
                                        <th colspan="2" class="text-center">นักเรียน</th>
                                        <th colspan="2" class="text-center">ครูที่ปรึกษา</th>
                                        <th colspan="2" class="text-center">ผู้บริหาร</th>
                                        <th colspan="2" class="text-center">ครูผู้เกษียณ</th>
                                    </tr>
                                    <tr>

                                        <th class="text-center">เข้าร่วม</th>
                                        <th class="text-center">ไม่เข้าร่วม</th>
                                        <th class="text-center">เข้าร่วม</th>
                                        <th class="text-center">ไม่เข้าร่วม</th>
                                        <th class="text-center">เข้าร่วม</th>
                                        <th class="text-center">ไม่เข้าร่วม</th>
                                        <th class="text-center">เข้าร่วม</th>
                                        <th class="text-center">ไม่เข้าร่วม</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="fw-bolder">
                                        <td></td>
                                        <td class="text-end">
                                            <h5>รวมทั้งหมด</h5>
                                        </td>
                                        <!-- Total student -->
                                        <td class="text-center">
                                            <?php
                                            $totalStudentCome = $obj->total_count_come('นักเรียน', 'เข้าร่วมงาน');
                                            foreach ($totalStudentCome as $row_totalStudentCome) {
                                                echo $row_totalStudentCome['count'];
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            $totalStudentNotCome = $obj->total_count_not_come('นักเรียน', 'ไม่เข้าร่วมงาน');
                                            foreach ($totalStudentNotCome as $row_totalStudentNotCome) {
                                                echo $row_totalStudentNotCome['count'];
                                            }
                                            ?>
                                        </td>
                                        <!-- /Total student -->

                                        <!-- Total teacher -->
                                        <td class="text-center">
                                            <?php
                                            $totalTeacherCome = $obj->total_count_come('ครูที่ปรึกษา', 'เข้าร่วมงาน');
                                            foreach ($totalTeacherCome as $row_totalTeacherCome) {
                                                echo $row_totalTeacherCome['count'];
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            $totalTeacherNotCome = $obj->total_count_not_come('ครูที่ปรึกษา', 'ไม่เข้าร่วมงาน');
                                            foreach ($totalTeacherNotCome as $row_totalTeacherNotCome) {
                                                echo $row_totalTeacherNotCome['count'];
                                            }
                                            ?>
                                        </td>
                                        <!-- /Total teaher -->

                                        <!-- Total boss -->
                                        <td class="text-center">
                                            <?php
                                            $totalBossCome = $obj->total_count_come('ผู้บริหาร', 'เข้าร่วมงาน');
                                            foreach ($totalBossCome as $row_totalBossCome) {
                                                echo $row_totalBossCome['count'];
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            $totalBossNotCome = $obj->total_count_not_come('ผู้บริหาร', 'ไม่เข้าร่วมงาน');
                                            foreach ($totalBossNotCome as $row_totalBossNotCome) {
                                                echo $row_totalBossNotCome['count'];
                                            }
                                            ?>
                                        </td>
                                        <!-- /Total boss -->


                                        <!-- Total boss -->
                                        <td class="text-center">
                                            <?php
                                            $totalRetireCome = $obj->total_count_come('ครูผู้เกษียณ', 'เข้าร่วมงาน');
                                            foreach ($totalRetireCome as $row_totalRetireCome) {
                                                echo $row_totalRetireCome['count'];
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            $totalRetireNotCome = $obj->total_count_not_come('ครูผู้เกษียณ', 'ไม่เข้าร่วมงาน');
                                            foreach ($totalRetireNotCome as $row_totalRetireNotCome) {
                                                echo $row_totalRetireNotCome['count'];
                                            }
                                            ?>
                                        </td>
                                        <!-- /Total boss -->
                                    </tr>
                                </tfoot>
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

                                                if ($row_school['user_school'] == 'โรงเรียนเฉลิมพระเกียรติฯ หนองบัวลำภู') {
                                                    echo 0;
                                                } else {
                                                    $student_count = $obj->display_student_count($row_school['user_school']);
                                                    foreach ($student_count as $row_student) {
                                                        echo $row_student['student_count'];
                                                    }
                                                }


                                                ?>
                                            </td>
                                            <td class="text-center">0</td>
                                            <!-- /Display student -->

                                            <!-- Display teacher -->
                                            <td class="text-center">
                                                <?php
                                                if ($row_school['user_school'] == 'โรงเรียนเฉลิมพระเกียรติฯ หนองบัวลำภู') {
                                                    echo 0;
                                                } else {
                                                    $totalTeacherComeSchool = $obj->total_count_come_school('ครูที่ปรึกษา', 'เข้าร่วมงาน', $row_school['user_school']);
                                                    foreach ($totalTeacherComeSchool as $row_totalTeacherComeSchool) {
                                                        echo $row_totalTeacherComeSchool['count'];
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $totalTeacherNotComeSchool = $obj->total_count_not_come_school('ครูที่ปรึกษา', 'ไม่เข้าร่วมงาน', $row_school['user_school']);
                                                foreach ($totalTeacherNotComeSchool as $row_totalTeacherNotComeSchool) {
                                                    echo $row_totalTeacherNotComeSchool['count'];
                                                }
                                                ?>
                                            </td>
                                            <!-- /Display teacher -->

                                            <!-- Display boss -->
                                            <td class="text-center">

                                                <?php
                                                if ($row_school['user_school'] == 'โรงเรียนเฉลิมพระเกียรติฯ หนองบัวลำภู') {
                                                    echo 0;
                                                } else {
                                                    $totalBossComeSchool = $obj->total_count_come_school('ผู้บริหาร', 'เข้าร่วมงาน', $row_school['user_school']);
                                                    foreach ($totalBossComeSchool as $row_totalBossComeSchool) {
                                                        echo $row_totalBossComeSchool['count'];
                                                    }
                                                }


                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $totalBossNotComeSchool = $obj->total_count_not_come_school('ผู้บริหาร', 'ไม่เข้าร่วมงาน', $row_school['user_school']);
                                                foreach ($totalBossNotComeSchool as $row_totalBossNotComeSchool) {
                                                    echo $row_totalBossNotComeSchool['count'];
                                                }
                                                ?>
                                            </td>
                                            <!-- /Display boss -->

                                            <!-- Display retire -->
                                            <td class="text-center">

                                                <?php
                                                if ($row_school['user_school'] == 'โรงเรียนเฉลิมพระเกียรติฯ หนองบัวลำภู') {
                                                    echo 0;
                                                } else {
                                                    $retireCountComeSchool = $obj->total_count_come_school('ครูผู้เกษียณ', 'เข้าร่วมงาน', $row_school['user_school']);
                                                    foreach ($retireCountComeSchool as $row_retireCountComeSchool) {
                                                        echo $row_retireCountComeSchool['count'];
                                                    }
                                                }

                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $totalRetireNotComeSchool = $obj->total_count_not_come_school('ครูผู้เกษียณ', 'ไม่เข้าร่วมงาน', $row_school['user_school']);
                                                foreach ($totalRetireNotComeSchool as $row_totalRetireNotComeSchool) {
                                                    echo $row_totalTeacherNotComeSchool['count'];
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