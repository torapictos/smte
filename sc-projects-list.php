<?php
error_reporting(E_ALL);
?>
<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php
$school = $_SESSION['school'];
include_once('class/projectback.php');
include_once('class/adminback.php');
$obj = new adminback();
$objProject = new projectback();
$asso_student = $obj->display_associate_student_register($school);

$major_list = $objProject->major_list();
$major_type = $objProject->major_type();
$student = $objProject->select_student($school);
$teacher = $objProject->select_teacher($school);

$project = $objProject->display_project();

if (isset($_POST['add_project_btn'])) {
    $add_msg = $objProject->project_register($_POST);
    echo '<script>alert("' . $add_msg . '")</script>';
    echo '<script>window.location="sc-projects-list.php"</script>';
}

if (isset($_GET['edit_id'])) {
    $projectEdit = $objProject->display_project_edit($_GET);
}

if (isset($_GET['delete_id'])) {
    $delete_msg = $objProject->project_delete($_GET);
    echo '<script>alert("' . $delete_msg . '")</script>';
    echo '<script>window.location="sc-projects-list.php"</script>';
}




?>



<head>

    <title>ข้อมูลโครงงาน</title>

    <?php include 'layouts/title-meta.php'; ?>

    <?php include 'layouts/head-css.php'; ?>

    <script src='assets/js/sweetalert2.js'> </script>

</head>

<body>


    <div class="main-wrapper">
        <?php include 'layouts/menu.php'; ?>

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <h3 class="page-title">ข้อมูลโครงงาน </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.php">หน้าหลัก</a></li>
                                <li class="breadcrumb-item active">ข้อมูลโครงงาน</li>
                            </ul>

                        </div>
                        <div class="col-auto float-end ms-auto">
                            <span class="text-success account-subtitle" id="logMsg">
                                <?php
                                if (isset($add_msg)) {

                                    echo '
                                    
                                    <script>
                                        Swal.fire({
                                                position: "top-end",
                                                icon: "success",
                                                title: "เพิ่มข้อมูลสําเร็จ",
                                                showConfirmButton: false,
                                                timer: 5000
                                            });
                                       window.location.href = "sc-projects-list.php";
                                </script>';
                                }

                                if (isset($delete_msg)) {

                                    echo '
                                    
                                    <script>
                                        Swal.fire({
                                                position: "top-end",
                                                icon: "success",
                                                title: "ลบข้อมูลสําเร็จ",
                                                showConfirmButton: false,
                                                timer: 5000
                                            });
                                       window.location.href = "sc-projects-list.php";
                                </script>';
                                }
                                ?>

                            </span>

                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_project"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูลโครงงาน</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr class="text-center">
                                        <th clast="text-center">ลำดับ</th>
                                        <th>รายละเอียดโครงงาน</th>
                                        <th class="text-center">บทคัดย่อ</th>

                                        <th class="text-end no-sort">ดำเนินการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($project as $row) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $i ?>
                                            </td>
                                            <td><strong>ชื่อโครงงาน (ภาษาไทย) :</strong> <?php echo $row['pj_name_th'] ?><br>
                                                <strong>ชื่อโครงงาน (ภาษาอังกฤษ) : </strong> <?php echo $row['pj_name_en'] ?><br>
                                                <strong>สาขา :</strong> <?php echo $row['pj_major'] ?><br>
                                                <strong>ประเภทโครงงาน :</strong> <?php echo $row['pj_type'] ?><br>
                                                <strong>รายชื่อนักเรียน :</strong> 1.<?php echo $row['pj_student_one'] ?> 2.<?php echo $row['pj_student_two'] ?> 3.<?php echo $row['pj_student_three'] ?><br>
                                                <strong> รายชื่อ ครู/อาจารย์ (ที่ปรึกษาหลัก) :</strong> 1.<?php echo $row['pj_advisor_one'] ?> 2.<?php echo $row['pj_advisor_two'] ?><br>
                                                <strong>รายชื่อ ครู/อาจารย์ (ที่ปรึกษาพิเศษ) :</strong> 1.<?php echo $row['pj_advisor_three'] ?>

                                            </td>
                                            <td class="text-center"> <a href="<?php echo 'uploads/' . $row['pj_abstract'] ?>" target="_blank"><span style="font-size: 3em; color: #de242a;"><i class="fa-solid fa-file-pdf fa-lg"></i></span></a> </td>

                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="?edit_id=<?php echo $row['pj_id'] ?>" data-bs-toggle="modal" data-bs-target="#edit_project"> <i class="fa-solid fa-pencil m-r-5"></i> แก้ไข</a>
                                                        <a class="dropdown-item" href="?delete_id=<?php echo $row['pj_id'] ?>"> <i class="fa-regular fa-trash-can m-r-5"></i> ลบ</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Content -->

            <!-- Add Project Modal -->
            <div id="add_project" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">เพิ่มข้อมูลโครงงาน</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <!-- Form start -->
                            <form name="project_form" action="" method="post" enctype="multipart/form-data">

                                <!-- Debug section of form -->
                                <div class="row">
                                    <div class="col-md-12" style="display: none;">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title"></h5>
                                            </div>
                                            <div class="card-body card-buttons">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <select class="form-control form-small select">
                                                            <option selected="selected">.</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Debug section of form  -->


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ชื่อโครงงาน (ภาษาไทย) <span class="text-danger">*หากไม่มีให้เลือก <strong class="text-info">ไม่มี</strong></span></label>
                                            <select name="project_name_th" id="project_name_th_add" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" placeholder="เลือกสาขาวิชา" required>
                                                <option>ไม่มี</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ชื่อโครงงาน (ภาษาอังกฤษ) <span class="text-danger">*หากไม่มีให้เลือก <strong class="text-info">ไม่มี</strong></span></label>
                                            <select name="project_name_en" id="project_name_en_add" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" placeholder="เลือกสาขาวิชา" required>
                                                <option>ไม่มี</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">สาขาวิชา<span class="text-danger">*</span></label>
                                            <select name="major" id="major" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" placeholder="เลือกสาขาวิชา" required>
                                                <?php foreach ($major_list as $row_major) { ?>
                                                    <option><?php echo $row_major['mj_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ประเภทการนำเสนอ<span class="text-danger">*</span></label>
                                            <select name="major_type" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" placeholder="เลือกสาขาวิชา">
                                                <?php foreach ($major_type as $row_major_type) { ?>
                                                    <option><?php echo $row_major_type['mjt_type'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">นักเรียนคนที่ 1<span class="text-danger">*</span></label>
                                                <select name="first_student" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" required>
                                                    <?php foreach ($student as $row_student) { ?>
                                                        <option><?php echo $row_student['asso_prename'] . $row_student['asso_firstname'] . ' ' . $row_student['asso_lastname'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">นักเรียนคนที่ 2<span class="text-danger">*หากไม่มีให้เลือก <strong class="text-info">ไม่มี</strong></span></label>
                                                <select name="second_student" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" required>
                                                    <?php foreach ($student as $row_student) { ?>
                                                        <option><?php echo $row_student['asso_prename'] . $row_student['asso_firstname'] . ' ' . $row_student['asso_lastname'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">นักเรียนคนที่ 3<span class="text-danger">*หากไม่มีให้เลือก <strong class="text-info">ไม่มี</strong></span></label>
                                                <select name="third_student" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" required>
                                                    <option>ไม่มี</option>
                                                    <?php foreach ($student as $row_student) { ?>
                                                        <option><?php echo $row_student['asso_prename'] . $row_student['asso_firstname'] . ' ' . $row_student['asso_lastname'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">ครู/อาจารย์ ที่ปรึกษาคนที่ 1<span class="text-danger">*</span></label>
                                                <select name="first_teacher" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" placeholder="เลือกสาขาวิชา">
                                                    <?php foreach ($teacher as $row_teacher) { ?>
                                                        <option><?php echo $row_teacher['asso_prename'] . $row_teacher['asso_firstname'] . ' ' . $row_teacher['asso_lastname'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">ครู/อาจารย์ ที่ปรึกษาคนที่ 2<span class="text-danger">*หากไม่มีให้เลือก <strong class="text-info">ไม่มี</strong></span></label>
                                                <select name="second_teacher" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" placeholder="เลือกสาขาวิชา">
                                                    <option>ไม่มี</option>
                                                    <?php foreach ($teacher as $row_teacher) { ?>
                                                        <option><?php echo $row_teacher['asso_prename'] . $row_teacher['asso_firstname'] . ' ' . $row_teacher['asso_lastname'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">ครู/อาจารย์ ที่ปรึกษาพิเศษ<span class="text-danger"> *หากไม่มีให้เลือก <strong class="text-info">ไม่มี</strong></span></label>
                                                <select name="third_teacher" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" placeholder="เลือกสาขาวิชา">
                                                    <option>ไม่มี</option>
                                                    <?php foreach ($teacher as $row_teacher) { ?>
                                                        <option><?php echo $row_teacher['asso_prename'] . $row_teacher['asso_firstname'] . ' ' . $row_teacher['asso_lastname'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">บทคัดย่อ (ไฟล์ PDF เท่านั้น)<span class="text-danger">*</span></label>
                                            <input type="file" name="project_abstract" id="abstract_add" accept="application/pdf" class="form-control" required>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="input-block mb-3">
                                        <input name="project_school" type="hidden" class="form-control" value="<?php echo $school ?>">
                                    </div>
                                </div>

                                <div class="table-responsive m-t-15">

                                </div>

                                <div class="submit-section">
                                    <button type="submit" name="add_project_btn" class="btn btn-primary submit-btn">เพิ่มข้อมูล</button>
                                </div>

                        </div>

                        </form>
                        <!-- /Form End -->
                    </div>
                </div>
            </div>
            <!-- /Add Project Modal -->
        </div>


        <!-- Edit Project Modal -->
        <div id="edit_project" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">แก้ไขข้อมูลโครงงาน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!-- Form start -->
                        <form action="" method="post" enctype="multipart/form-data">

                            <!-- Debug section of form -->
                            <div class="row">
                                <div class="col-md-12" style="display: none;">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title"></h5>
                                        </div>
                                        <div class="card-body card-buttons">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <select class="form-control form-small select">
                                                        <option selected="selected">.</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Debug section of form  -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">ชื่อโครงงาน (ภาษาไทย) <span class="text-danger">*หากไม่มีให้เลือก <strong class="text-info">ไม่มี</strong></span></label>
                                        <select name="project_name_th" id="project_name_th_edit" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" required>

                                            <option selected></option>

                                            <option>ไม่มี</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">ชื่อโครงงาน (ภาษาอังกฤษ) <span class="text-danger">*หากไม่มีให้เลือก <strong class="text-info">ไม่มี</strong></span></label>
                                        <select name="project_name_en" id="project_name_en_edit" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" required>
                                            <option>ไม่มี</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">สาขาวิชา<span class="text-danger">*</span></label>
                                        <select name="major_edit" id="major_edit" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" required>
                                            <?php foreach ($major_list as $row_major) { ?>
                                                <option><?php echo $row_major['mj_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">ประเภทการนำเสนอ<span class="text-danger">*</span></label>
                                        <select name="major_type_edit" id="major_type_edit" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1">
                                            <?php foreach ($major_type as $row_major_type) { ?>
                                                <option><?php echo $row_major_type['mjt_type'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">นักเรียนคนที่ 1<span class="text-danger">*</span></label>
                                            <select name="first_student_edit" id="first_student_edit" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" required>
                                                <?php foreach ($student as $row_student) { ?>
                                                    <option><?php echo $row_student['asso_prename'] . $row_student['asso_firstname'] . ' ' . $row_student['asso_lastname'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">นักเรียนคนที่ 2<span class="text-danger">*หากไม่มีให้เลือก <strong class="text-info">ไม่มี</strong></span></label>
                                            <select name="second_student_edit" id="second_student_edit" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" required>
                                                <?php foreach ($student as $row_student) { ?>
                                                    <option><?php echo $row_student['asso_prename'] . $row_student['asso_firstname'] . ' ' . $row_student['asso_lastname'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">นักเรียนคนที่ 3<span class="text-danger">*หากไม่มีให้เลือก <strong class="text-info">ไม่มี</strong></span></label>
                                            <select name="third_student_edit" id="third_student_edit" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" required>
                                                <option>ไม่มี</option>
                                                <?php foreach ($student as $row_student) { ?>
                                                    <option><?php echo $row_student['asso_prename'] . $row_student['asso_firstname'] . ' ' . $row_student['asso_lastname'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ครู/อาจารย์ ที่ปรึกษาคนที่ 1<span class="text-danger">*</span></label>
                                            <select name="first_advisor_edit" id="first_advisor_edit" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1">
                                                <?php foreach ($teacher as $row_teacher) { ?>
                                                    <option><?php echo $row_teacher['asso_prename'] . $row_teacher['asso_firstname'] . ' ' . $row_teacher['asso_lastname'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ครู/อาจารย์ ที่ปรึกษาคนที่ 2<span class="text-danger">*หากไม่มีให้เลือก <strong class="text-info">ไม่มี</strong></span></label>
                                            <select name="second_advisor_edit" id="second_advisor_edit" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1">
                                                <option>ไม่มี</option>
                                                <?php foreach ($teacher as $row_teacher) { ?>
                                                    <option><?php echo $row_teacher['asso_prename'] . $row_teacher['asso_firstname'] . ' ' . $row_teacher['asso_lastname'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ครู/อาจารย์ ที่ปรึกษาพิเศษ<span class="text-danger"> *หากไม่มีให้เลือก <strong class="text-info">ไม่มี</strong></span></label>
                                            <select name="third_advisor_edit" id="third_advisor_edit" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1">
                                                <option>ไม่มี</option>
                                                <?php foreach ($teacher as $row_teacher) { ?>
                                                    <option><?php echo $row_teacher['asso_prename'] . $row_teacher['asso_firstname'] . ' ' . $row_teacher['asso_lastname'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">บทคัดย่อ (ไฟล์ PDF เท่านั้น)<span class="text-danger">*</span></label>
                                        <input type="file" name="project_abstract_edit" id="project_abstract_edit" accept="application/pdf" class="form-control" required>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="input-block mb-3">
                                    <input name="project_school" type="hidden" class="form-control" value="<?php echo $school ?>">
                                </div>
                            </div>

                            <div class="table-responsive m-t-15">

                            </div>

                            <div class="submit-section">
                                <button type="submit" name="edit_project_btn" class="btn btn-primary submit-btn">แก้ไขข้อมูล</button>
                            </div>

                    </div>

                    </form>
                    <!-- /Form End -->
                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- /Edit Project Modal -->



    </div>
    <!-- /Page Wrapper -->


    </div>
    <!-- end main wrapper-->

    <?php include 'layouts/customizer.php'; ?>
    <!-- JAVASCRIPT -->
    <?php include 'layouts/vendor-scripts.php'; ?>


    <!-- Send Param for Edit in Modal -->
    <script>
        $(document).ready(function() {
            $('#edit_student').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // ลิงก์ที่คลิกเปิด modal
                var projectId = button.data(pj - id);
                var projectNameTh = button.data(pj - name - th);
                var projectNameEn = button.data(pj - name - en);
                var projectMajor = button.data(pj - major);

                // อัปเดตค่าของฟอร์มใน modal
                var modal = $(this);
                // modal.find('.modal-body #asso_student_id_edit').val(assoId);
                // modal.find('.modal-body #asso_student_prename_edit').val(assoPrename);
                // modal.find('.modal-body #asso_student_firstname_edit').val(assoFirstname);
                // modal.find('.modal-body #asso_student_lastname_edit').val(assoLastname);
                // modal.find('.modal-body #asso_student_mobile_edit').val(assoMobile);
                // modal.find('.modal-body #asso_student_size_edit').val(assoSize);
                // modal.find('.modal-body #asso_student_type_edit').val(assoType);
                // modal.find('.modal-body #asso_student_status_edit').val(assoStatus);


                // อัปเดตค่าของฟอร์มใน modal


                // if (assoPrename) {
                //     modal.find('.modal-body #asso_student_prename_edit').val(assoPrename).change();
                // }
                // if (assoSize) {
                //     modal.find('.modal-body #asso_student_size_edit').val(assoSize).change();
                // }
                // if (assoStatus) {
                //     modal.find('.modal-body #asso_student_status_edit').val(assoStatus).change();
                // }
            });
        });
    </script>

</body>

</html>