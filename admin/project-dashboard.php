<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>สรุปจำนวนโครงงาน</title>
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
                        <h3 class="page-title">สรุปจำนวนโครงงาน!</h3>
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
                <div class="col-md-6 col-sm-6 col-lg-12 ">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa-solid fa-sitemap"></i></span>
                            <div class="dash-widget-info">
                                <span class="text-center">จำนวนโครงงาน</span>
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
                



            </div>



            <!-- Data Tables -->
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">แสดงรายละเอียดจำนวนโครงงาน</h4>
                        <p class="card-text">
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center">ลําดับ</th>
                                        <th rowspan="2" class="text-center">โรงเรียน</th>
                                        
                                    </tr>
                                    <tr>

                                        <th class="text-center">จำนวนโครงงาน</th>
                                        <th class="text-center">นำเสอแบบปากเปล่า</th>
                                        <th class="text-center">นำเสนอแบบโปสเตอร์</th>
                                        <th class="text-center">นำเสนอเป็นภาษอังกฤษ</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="fw-bolder">
                                        <td></td>
                                        <td class="text-end">
                                            <h5>รวมทั้งหมด</h5>
                                        </td>
                                        <!-- Total project -->
                                        <td class="text-center">
                                            <?php
                                            $totalStudentCome = $obj->total_count_come('นักเรียน', 'เข้าร่วมงาน');
                                            foreach ($totalStudentCome as $row_totalStudentCome) {
                                                echo $row_totalStudentCome['count'];
                                            }
                                            ?>
                                        </td>

                                        <!-- Total oral -->
                                        <td class="text-center">
                                            <?php
                                            $totalStudentNotCome = $obj->total_count_not_come('นักเรียน', 'ไม่เข้าร่วมงาน');
                                            foreach ($totalStudentNotCome as $row_totalStudentNotCome) {
                                                echo $row_totalStudentNotCome['count'];
                                            }
                                            ?>
                                        </td>
                                        <!-- Total poster -->
                                        <td class="text-center">
                                            <?php
                                            $totalTeacherCome = $obj->total_count_come('ครูที่ปรึกษา', 'เข้าร่วมงาน');
                                            foreach ($totalTeacherCome as $row_totalTeacherCome) {
                                                echo $row_totalTeacherCome['count'];
                                            }
                                            ?>
                                        </td>                                        

                                        <!-- Total english -->
                                        <td class="text-center">
                                            <?php
                                            $totalBossCome = $obj->total_count_come('ผู้บริหาร', 'เข้าร่วมงาน');
                                            foreach ($totalBossCome as $row_totalBossCome) {
                                                echo $row_totalBossCome['count'];
                                            }
                                            ?>
                                        </td>
                                        
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
                                            <!-- Display total -->
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
                                           
                                            <!-- /Display total -->

                                            <!-- Display oral -->
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
                                            
                                            <!-- /Display oral -->

                                            <!-- Display poster -->
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
                                            
                                            <!-- /Display oral -->

                                            <!-- Display english -->
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
                                            
                                            <!-- /Display english -->


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