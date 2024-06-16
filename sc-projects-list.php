<?php
error_reporting(E_ALL);
?>
<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php
$school = $_SESSION['school'];
include_once('class/adminback.php');
$obj = new adminback();
$asso_student = $obj->display_associate_student_register($school);

$major_list = $obj->major_list();
$major_type = $obj->major_type();
$student = $obj->select_student($school);
$teacher = $obj->select_teacher($school);

if (isset($_POST['add_project_btn'])) {
    $add_msg = $obj->project_register($_POST);
}



if (isset($_POST['edit_student_btn'])) {
    $studentId = $_POST['asso_student_id_edit'];
    $update_msg = $obj->update_associate_student($_POST);
}

if (isset($_GET['id'])) {
    $studentId = $_GET['id'];
    $delete_msg = $obj->delete_associate($studentId);
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
                            <p class="text-danger">



                                <?php
                                if (isset($add_msg)) { ?>

                                    <script>
                                        Swal.fire({
                                            position: "top-end",
                                            icon: "success",
                                            title: "<?php echo $add_msg; ?>",
                                            showConfirmButton: false,
                                            timer: 1500
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = "sc-projects-list.php";
                                            }
                                        });
                                    </script>
                                <?php
                                }
                                if (isset($update_msg)) {
                                ?>
                                    <script>
                                        Swal.fire({
                                            position: "top-end",
                                            icon: "success",
                                            title: "แก้ไขข้อมูลสําเร็จ",
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                    </script>

                                <?php
                                    header("refresh:1; url=sc-students-list.php");
                                } ?>

                                <?php
                                if (isset($delete_msg)) {
                                ?>
                                    <script>
                                        Swal.fire({
                                            position: "top-end",
                                            icon: "success",
                                            title: "ลบข้อมูลสําเร็จ",
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                    </script>

                                <?php
                                    header("refresh:1; url=sc-students-list.php");
                                } ?>
                            </p>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_project"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูลโครงงาน</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รายละเอียดโครงงาน</th>
                                        <th>บทคัดย่อ</th>

                                        <th class="text-end no-sort">ดำเนินการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($asso_student as $row) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $i ?>
                                            </td>
                                            <td><?php echo $row['asso_prename'] ?><?php echo $row['asso_firstname'] ?> <?php echo $row['asso_lastname'] ?></td>
                                            <td><?php echo $row['asso_mobile'] ?></td>

                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="?id=<?php echo $row['asso_id'] ?>" data-bs-toggle="modal" data-bs-target="#edit_student" data-asso-id="<?php echo $row['asso_id'] ?>" data-asso-prename="<?php echo $row['asso_prename'] ?>" data-asso-firstname="<?php echo $row['asso_firstname'] ?>" data-asso-lastname="<?php echo $row['asso_lastname'] ?>" data-asso-mobile="<?php echo $row['asso_mobile'] ?>" data-asso-size="<?php echo $row['asso_size'] ?>" data-asso-level="<?php echo $row['asso_level'] ?>" data-asso-type="<?php echo $row['asso_type'] ?>" data-asso-status="<?php echo $row['asso_status'] ?>"><i class="fa-solid fa-pencil m-r-5"></i> แก้ไข</a>
                                                        <a class="dropdown-item" href="?id=<?php echo $row['asso_id'];
                                                                                            $std_id = $row['asso_id']; ?>"> <i class="fa-regular fa-trash-can m-r-5"></i> ลบ</a>
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
                </div> -->

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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ชื่อโครงงาน (ภาษาไทย) <span class="text-danger">*</span></label>
                                            <input type="text" id="project_name_th_add" name="project_name_th" placeholder="" class="form-control" required pattern="[\u0E00-\u0E7F\u0E50-\u0E590-9\s\.\,\-\!\?\(\)\*]+" title="กรุณากรอกตัวอักษรภาษาไทยเท่านั้น">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ชื่อโครงงาน (ภาษาอังกฤษ) <span class="text-danger">*</span></label>
                                            <input type="text" id="project_name_en_add" name="project_name_en" placeholder="" class="form-control" required pattern="[A-Za-z0-9\s\.\,\-\!\?\(\)\*]+" title="กรุณากรอกข้อมูลเป็นภาษาอังกฤษเท่านั้น">
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
                                                <label class="col-form-label">นักเรียนคนที่ 2<span class="text-danger">*</span></label>
                                                <select name="second_student" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" required>
                                                    <?php foreach ($student as $row_student) { ?>
                                                        <option><?php echo $row_student['asso_prename'] . $row_student['asso_firstname'] . ' ' . $row_student['asso_lastname'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">นักเรียนคนที่ 3<span class="text-danger">*</span></label>
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
                                                <label class="col-form-label">ครู/อาจารย์ ที่ปรึกษาคนที่ 2<span class="text-danger">*</span></label>
                                                <select name="second_teacher" class="form-control tagging" multiple="multiple" data-maximum-selection-length="1" placeholder="เลือกสาขาวิชา">
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
        </div>
        <!-- /Add Project Modal -->

        <!-- Edit Project Modal -->
        <div id="edit_project" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">แก้ไขข้อมูลผู้นักเรียน </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>
                    <div class="modal-body">

                        <form action="" method="post">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">ระดับชั้น <span class="text-danger">*</span></label>
                                        <input type="text" id="asso_student_level_edit" name="asso_student_level_edit" class="form-control" value="ชั้นมัธยมศึกษาปีที่ 6" readonly>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">คำนำหน้า <span class="text-danger">*</span></label>
                                        <select name="asso_student_prename_edit" id="asso_student_prename_edit" class="select">
                                            <option>-เลือกคำนำหน้า-</option>
                                            <option valude="นาย">นาย</option>
                                            <option valude="นางสาว">นางสาว</option>
                                            <option valude="นาง">นาง</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">ชื่อ <span class="text-danger">*</span></label>
                                        <input name="asso_student_firstname_edit" id="asso_student_firstname_edit" value="" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">นามสกุล <span class="text-danger">*</span></label>
                                        <input name="asso_student_lastname_edit" id="asso_student_lastname_edit" value="" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">เบอร์โทรศัพท์ </label>
                                        <input type="text" id="asso_student_mobile_edit" name="asso_student_mobile_edit" class="form-control" maxlength="10" value="" onkeyup="validatePhoneNumberEditStudent()">
                                        <div id="phoneNumberEditErrorStudent" style="display: none; color: red;"></div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">ขนาดเสื้อ <span class="text-danger">*</span></label>
                                        <select name="asso_student_size_edit" id="asso_student_size_edit" class="select">
                                            <option> -เลือกขนาดเสื้อ- </option>
                                            <option value="SS(อก34,ยาว25)">SS(อก34,ยาว25)</option>
                                            <option value="S(อก36,ยาว26)">S(อก36,ยาว26)</option>
                                            <option value="M(อก38,ยาว27)">M(อก38,ยาว27)</option>
                                            <option value="L(อก40,ยาว28)">L(อก40,ยาว28)</option>
                                            <option value="XL(อก42,ยาว29)">XL(อก42,ยาว29)</option>
                                            <option value="2XL(อก44,ยาว30)">2XL(อก44,ยาว30)</option>
                                            <option value="3XL(อก46,ยาว31)">3XL(อก46,ยาว31)</option>
                                            <option value="4XL(อก48,ยาว32)">4XL(อก48,ยาว32)</option>
                                            <option value="5XL(อก50,ยาว33)">5XL(อก50,ยาว33)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">เข้าร่วมงาน <span class="text-danger">*</span></label>
                                        <select name="asso_student_status_edit" id="asso_student_status_edit" class="select">
                                            <option> -เลือกสถานะ- </option>
                                            <option value="เข้าร่วมงาน">เข้าร่วมงาน</option>
                                            <option value="ไม่เข้าร่วมงาน">ไม่เข้าร่วมงาน</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <input type="hidden" id="asso_student_id_card_edit" name="asso_student_id_card_edit" class="form-control" value="ไม่ต้องระบุ">
                                    <input name="asso_student_type_edit" type="hidden" class="form-control" value="นักเรียน">
                                    <input name="asso_student_id_edit" id="asso_student_id_edit" type="hidden" class="form-control">
                                </div>
                            </div>

                            <div class="table-responsive m-t-15">

                            </div>
                            <div class="submit-section">
                                <button name="edit_student_btn" type="submit" class="btn btn-primary submit-btn">แก้ไขข้อมูล</button>
                            </div>

                        </form>

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
                var assoId = button.data('asso-id'); // ดึงค่าจาก data-asso-id
                var assoLevel = button.data('asso-level');
                var assoPrename = button.data('asso-prename');
                var assoFirstname = button.data('asso-firstname');
                var assoLastname = button.data('asso-lastname');
                var assoMobile = button.data('asso-mobile');
                var assoSize = button.data('asso-size');
                var assoType = button.data('asso-type');
                var assoStatus = button.data('asso-status');

                // อัปเดตค่าของฟอร์มใน modal
                var modal = $(this);
                modal.find('.modal-body #asso_student_id_edit').val(assoId);
                modal.find('.modal-body #asso_student_prename_edit').val(assoPrename);
                modal.find('.modal-body #asso_student_firstname_edit').val(assoFirstname);
                modal.find('.modal-body #asso_student_lastname_edit').val(assoLastname);
                modal.find('.modal-body #asso_student_mobile_edit').val(assoMobile);
                modal.find('.modal-body #asso_student_size_edit').val(assoSize);
                modal.find('.modal-body #asso_student_type_edit').val(assoType);
                modal.find('.modal-body #asso_student_status_edit').val(assoStatus);


                // อัปเดตค่าของฟอร์มใน modal


                if (assoPrename) {
                    modal.find('.modal-body #asso_student_prename_edit').val(assoPrename).change();
                }
                if (assoSize) {
                    modal.find('.modal-body #asso_student_size_edit').val(assoSize).change();
                }
                if (assoStatus) {
                    modal.find('.modal-body #asso_student_status_edit').val(assoStatus).change();
                }
            });
        });
    </script>

</body>

</html>