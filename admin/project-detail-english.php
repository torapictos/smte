<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>สรุปรายละเอียดโครงงาน</title>
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


$totalProject = $obj->total_project();

$totalAllDetailProject = $obj->total_all_detail_project_type('การนำเสนอเป็นภาษาอังกฤษ');


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
                        <h3 class="page-title">รายละเอียดโครงงานการนำเสนอเป็นภาษาอังกฤษ</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
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

        <!-- Data Tables -->
        <div class="col-sm-12">
            <div class="card mb-0">
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr class="text-center">
                                    <th clast="text-center">ลำดับ</th>
                                    <th>รายละเอียดโครงงาน</th>
                                    <th class="text-center">บทคัดย่อ</th>
                                    <th class="text-center">โรงเรียน</th>

                                    <!-- <th class="text-end no-sort">ดำเนินการ</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($totalAllDetailProject as $row) { ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $i ?>
                                        </td>
                                        <td class="text-wrap" width="60%"><strong>ชื่อโครงงาน (ภาษาไทย) :</strong> <?php echo $row['pj_name_th'] ?><br>
                                            <strong>ชื่อโครงงาน (ภาษาอังกฤษ) : </strong> <?php echo $row['pj_name_en'] ?><br>
                                            <strong>สาขา :</strong> <?php echo $row['pj_major'] ?><br>
                                            <strong>ประเภทโครงงาน :</strong> <?php echo $row['pj_type'] ?><br>
                                            <strong>รายชื่อนักเรียน :</strong> 1.<?php echo $row['pj_student_one'] ?> 2.<?php echo $row['pj_student_two'] ?> 3.<?php echo $row['pj_student_three'] ?><br>
                                            <strong> รายชื่อ ครู/อาจารย์ (ที่ปรึกษาหลัก) :</strong> 1.<?php echo $row['pj_advisor_one'] ?> 2.<?php echo $row['pj_advisor_two'] ?><br>
                                            <strong>รายชื่อ ครู/อาจารย์ (ที่ปรึกษาพิเศษ) :</strong> 1.<?php echo $row['pj_advisor_three'] ?><br>
                                            <strong>ชื่อไฟล์บทคัดย่อ :</strong> <?php echo $row['pj_abstract'] ?><br>


                                        </td>
                                        <td class="text-center"> <a href="<?php echo '../uploads/' . $row['pj_abstract'] ?>" target="_blank"><span style="font-size: 3em; color: #de242a;"><i class="fa-solid fa-file-pdf fa-lg"></i></span></a> </td>
                                        <td class="text-center text-wrap"> <?php echo $row['pj_school'] ?></td>

                                        <!-- <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">


                                                    <a class="dropdown-item" href="?project_id=<?php echo $row['pj_id'] ?>" data-bs-toggle="modal" data-bs-target="#edit_project" data-project-id="<?php echo $row['pj_id'] ?>" data-project-name-th="<?php echo $row['pj_name_th'] ?>" data-project-name-en="<?php echo $row['pj_name_en'] ?>" data-project-major="<?php echo $row['pj_major'] ?>" data-project-type="<?php echo $row['pj_type'] ?>" data-project-first-student="<?php echo $row['pj_student_one'] ?>" data-project-second-student="<?php echo $row['pj_student_two'] ?>" data-project-third-student="<?php echo $row['pj_student_three'] ?>" data-project-first-advisor="<?php echo $row['pj_advisor_one'] ?>" data-project-second-advisor="<?php echo $row['pj_advisor_two'] ?>" data-project-third-advisor="<?php echo $row['pj_advisor_three'] ?>" data-project-old-abstract="<?php echo $row['pj_abstract'] ?> ">
                                                        <i class="fa-solid fa-pencil m-r-5"></i> แก้ไข
                                                    </a>
                                                    <a class="dropdown-item" href="?delete_id=<?php echo $row['pj_id'] ?>"> <i class="fa-regular fa-trash-can m-r-5"></i> ลบ</a>
                                                </div>
                                            </div>
                                        </td> -->
                                    </tr>
                                <?php $i++;
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Data Tables -->
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