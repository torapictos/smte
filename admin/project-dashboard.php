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


$totalProject = $obj->total_project()



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
                <!-- Total project -->
                <div class="row">

                    <div class="col-sm-12">
                        <h3 class="page-title"></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active"></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3 ">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa-solid fa-sitemap"></i></span>
                                <div class="dash-widget-info">
                                    <span class="text-center">จำนวนโครงงาน</span>
                                    <h3 class="text-center">
                                        <?php
                                        foreach ($totalProject as $row_totalProject) {
                                            echo $row_totalProject['count'];
                                        }
                                        ?>
                                    </h3>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3 ">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa-solid fa-sitemap"></i></span>
                                <div class="dash-widget-info">
                                    <span class="text-center">นำเสนอปากเปล่า</span>
                                    <h3 class="text-center">
                                        <?php
                                        $totalOral = $obj->total_all_type('การนำเสนอแบบปากเปล่า');
                                        foreach ($totalOral as $row_totalOral) {
                                            echo $row_totalOral['count'];
                                        }
                                        ?>
                                    </h3>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3 ">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa-solid fa-sitemap"></i></span>
                                <div class="dash-widget-info">
                                    <span class="text-center">นำเสนอแบบโปสเตอร์</span>
                                    <h3 class="text-center">
                                        <?php
                                        $totalPoster = $obj->total_all_type('การนำเสนอแบบโปสเตอร์');
                                        foreach ($totalPoster as $row_totalPoster) {
                                            echo $row_totalPoster['count'];
                                        }
                                        ?>
                                    </h3>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3 ">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa-solid fa-sitemap"></i></span>
                                <div class="dash-widget-info">
                                    <span class="text-center">นำเสนอภาษาอังกฤษ</span>
                                    <h3 class="text-center">
                                        <?php
                                        $totalEnglish = $obj->total_all_type('การนำเสนอเป็นภาษาอังกฤษ');
                                        foreach ($totalEnglish as $row_totalEnglish) {
                                            echo $row_totalEnglish['count'];
                                        }
                                        ?>
                                    </h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total project -->




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
                                            $totalAllProjectSChool = $obj->total_project();
                                            foreach ($totalAllProjectSChool as $row_totalAllProjectSChool) {
                                                echo $row_totalAllProjectSChool['count'];
                                            }
                                            ?>
                                        </td>

                                        <!-- Total oral -->
                                        <td class="text-center">
                                            <?php
                                            $totalOral = $obj->total_all_type('การนำเสนอแบบปากเปล่า');
                                            foreach ($totalOral as $row_totalOral) {
                                                echo $row_totalOral['count'];
                                            }
                                            ?>
                                        </td>
                                        <!-- Total poster -->
                                        <td class="text-center">
                                            <?php
                                            $totalPoster = $obj->total_all_type('การนำเสนอแบบโปสเตอร์');
                                            foreach ($totalPoster as $row_totalPoster) {
                                                echo $row_totalPoster['count'];
                                            }
                                            ?>
                                        </td>

                                        <!-- Total english -->
                                        <td class="text-center">
                                            <?php
                                            $totalEnglish = $obj->total_all_type('การนำเสนอเป็นภาษาอังกฤษ');
                                            foreach ($totalEnglish as $row_totalEnglish) {
                                                echo $row_totalEnglish['count'];
                                            }
                                            ?>
                                        </td>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($school_name as $row_school) { ?>
                                        <tr>
                                            <!-- Order -->
                                            <td>
                                                <?php echo $i ?>
                                            </td>

                                            <!-- School name -->
                                            <td><?php echo $row_school['user_school'] ?></td>


                                            <!-- Display total project for each school -->
                                            <td class="text-center">
                                                <?php

                                                if ($row_school['user_school'] == 'โรงเรียนเฉลิมพระเกียรติฯ หนองบัวลำภู') {
                                                    echo 0;
                                                } else {
                                                    $totalProjectSchool = $obj->total_all_project_school($row_school['user_school']);
                                                    foreach ($totalProjectSchool as $row_totalProjectSchool) {
                                                        echo $row_totalProjectSchool['count'];
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
                                                    $totalOralSchool = $obj->total_all_Oral($row_school['user_school']);
                                                    foreach ($totalOralSchool as $row_totalOralSchool) {
                                                        echo $row_totalOralSchool['count'];
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
                                                    $totalPosterSchool = $obj->total_all_poster($row_school['user_school']);
                                                    foreach ($totalPosterSchool as $row_totalPosterSchool) {
                                                        echo $row_totalPosterSchool['count'];
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
                                                    $totalEnglishSchool = $obj->total_all_english($row_school['user_school']);
                                                    foreach ($totalEnglishSchool as $row_totalEnglishSchool) {
                                                        echo $row_totalEnglishSchool['count'];
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