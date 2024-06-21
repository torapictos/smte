<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php
$school = $_SESSION['school'];
include_once('class/adminback.php');
$obj = new adminback();
$teacherProject = $obj->display_teacher_project_register($school);

if (isset($_POST['add_teacher_project_btn'])) {

    $add_msg = $obj->teacher_project_register($_POST);
    echo "<script>alert('$add_msg')</script>";
    echo "<script>window.location='sc-advisor-list.php'</script>";
}

if (isset($_POST['edit_teacher_project_btn'])) {

    $edit_msg = $obj->project_edit($_POST);
    echo "<script>alert('$edit_msg')</script>";
    echo "<script>window.location='sc-advisor-list.php'</script>";
    
}

if (isset($_GET['t_id'])) {
    $teacherId = $_GET['t_id'];
    $delete_msg = $obj->delete_teacher_project($teacherId);
    echo "<script>alert('$delete_msg')</script>";
    echo "<script>window.location='sc-advisor-list.php'</script>";
   
}


?>


<head>

    <title>ข้อมูลครูที่ปรึกษา</title>

    <?php include 'layouts/title-meta.php'; ?>

    <?php include 'layouts/head-css.php'; ?>

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
                        <div class="col">
                            <h3 class="page-title">ข้อมูลครูที่ปรึกษา</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.php">หน้าหลัก</a></li>
                                <li class="breadcrumb-item active">ข้อมูลครูที่ปรึกษา</li>
                            </ul>
                            <p class="text-danger">

                                <?php
                                if (isset($add_msg)) {
                                ?>
                                    <script>
                                        Swal.fire({
                                            position: "top-end",
                                            icon: "success",
                                            title: "เพิ่มข้อมูลสําเร็จ",
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                       
                                    </script>

                                <?php
                                    header("refresh:1; url=sc-teacher-list.php");
                                } ?>

                                <?php
                                if (isset($asso_info)) {
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
                                    header("refresh:1; url=sc-teacher-list.php");
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
                                    header("refresh:1; url=sc-teacher-list.php");
                                } ?>
                            </p>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_teacher"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูลที่ปรึกษา/ที่ปรึกษาพิเศษ</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>ตำแหน่ง</th>
                                        <th>เบอร์โทรศัพท์</th>                                        
                                        <th class="text-end no-sort">ดำเนินการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($teacherProject as $row) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $i ?>
                                            </td>
                                            <td><?php echo $row['t_prename'] ?><?php echo $row['t_firstname'] ?> <?php echo $row['t_lastname'] ?></td>
                                            <td><?php echo $row['t_type'] ?></td>  
                                            <td><?php echo $row['t_mobile'] ?></td>
                                            
                                            
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_teacher" 
                                                                data-teacher-id="<?php echo $row['t_id'] ?>"  
                                                                data-teacher-prename="<?php echo $row['t_prename'] ?>" 
                                                                data-teacher-firstname="<?php echo $row['t_firstname'] ?>" 
                                                                data-teacher-lastname="<?php echo $row['t_lastname'] ?>" 
                                                                data-teacher-mobile="<?php echo $row['t_mobile'] ?>"                                                     
                                                                data-teacher-type="<?php echo $row['t_type'] ?>" >
                                                                <i class="fa-solid fa-pencil m-r-5"></i> แก้ไข</a>

                                                        <a class="dropdown-item" href="?t_id=<?php echo $row['t_id'] ?>" > <i class="fa-regular fa-trash-can m-r-5"></i> ลบ</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php 
                                        $i++;
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Add Employee Modal -->
            <div id="add_teacher" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">เพิ่มข้อมูลครูที่ปรึกษา/ที่ปรึกษาพิเศษ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">คำนำหน้า <span class="text-danger">*</span></label>
                                            <input type="text" name="teacher_prename"  id="teacher_prename"  class="form-control"  require>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ชื่อ <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="teacher_firstname" id="teacher_firstname" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">นามสกุล<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="teacher_lastname" id="teacher_lastname" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                            <input type="text" id="teacher_mobile_add" name="teacher_mobile" required maxlength="10" class="form-control" value="" required onkeyup="validatePhoneNumberTeacher('asso_mobile')">
                                            <div id="phoneNumberErrorTeacherAdd" style="display: none; color: red;"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ตำแหน่ง <span class="text-danger">*</span></label>
                                            <input type="text" id="teacher_type" name="teacher_type" class="form-control" value="ครูที่ปรึกษา" readonly require>                            
                                        </div>
                                    </div>                                  

                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <input name="teacher_school" type="hidden" class="form-control" value="<?php echo $school ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="table-responsive m-t-15">

                                </div>
                                <div class="submit-section">
                                    <button type="submit" name="add_teacher_project_btn" class="btn btn-primary submit-btn">เพิ่มข้อมูล</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Employee Modal -->

            <!-- Edit Employee Modal -->
            <div id="edit_teacher" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">แก้ไขข้อมูลครูที่ปรึกษา/ที่ปรึกษาพิเศษ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="row">
                                
                                    <div class="col-md-4">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">คำนำหน้า <span class="text-danger">*</span></label>
                                            <input type="text" id="teacher_prename_edit" name="teacher_prename" class="form-control"  require>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ชื่อ <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="teacher_firstname" id="teacher_firstname_edit" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">นามสกุล<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="teacher_lastname" id="teacher_lastname_edit" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                            <input type="text" id="teacher_mobile_edit" name="teacher_mobile" required maxlength="10" class="form-control" value="" required onkeyup="validatePhoneNumberTeacher('asso_mobile')">
                                            <div id="phoneNumberErrorTeacherEdit" style="display: none; color: red;"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ตำแหน่ง <span class="text-danger">*</span></label>
                                            <input type="text" id="teacher_type_edit" name="teacher_type" class="form-control" value="ครูที่ปรึกษา" readonly  require>
                                        </div>
                                    </div>

                                   

                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <input name="teacher_school" id="teacher_school_edit" type="hidden" class="form-control" value="<?php echo $school ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="table-responsive m-t-15">

                                </div>
                                <div class="submit-section">
                                    <button type="submit" name="edit_teacher_project_btn" class="btn btn-primary submit-btn">แก้ไขข้อมูล</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Employee Modal -->


        </div>
        <!-- /Page Wrapper -->


    </div>
    <!-- end main wrapper-->

    <?php include 'layouts/customizer.php'; ?>
    <!-- JAVASCRIPT -->
    <?php include 'layouts/vendor-scripts.php'; ?>

   
    <!-- Check Phone Number Add -->
    <script>
        function validatePhoneNumberTeacher(phoneNumber) {
            // ลบช่องว่าง
            phoneNumber = phoneNumber.replace(/\s/g, '');

            // ตรวจสอบความยาว
            if (phoneNumber.length !== 10) {
                return false;
            }

            // ตรวจสอบตัวอักษรแรก
            if (phoneNumber[0] !== '0') {
                return false;
            }

            // ตรวจสอบตัวอักษร
            for (let i = 1; i < phoneNumber.length; i++) {
                if (!isNaN(phoneNumber[i])) {
                    continue;
                }
                return false;
            }

            return true;
        }

        const phoneNumberInput = document.getElementById('teacher_mobile_add');
        const phoneNumberError = document.getElementById('phoneNumberErrorTeacherAdd');

        phoneNumberInput.addEventListener('keyup', function() {
            const phoneNumber = phoneNumberInput.value;
            const isValid = validatePhoneNumberTeacher(phoneNumber);

            if (isValid) {
                phoneNumberError.style.display = 'none';
            } else {
                phoneNumberError.style.display = 'block';
                phoneNumberError.textContent = 'เบอร์โทรศัพท์ไม่ถูกต้อง';
            }
        });
    </script>

    <!-- Check Phone Number edit -->
    <script>
        function validatePhoneNumberEditTeacher(phoneNumber) {
            // ลบช่องว่าง
            phoneNumber = phoneNumber.replace(/\s/g, '');

            // ตรวจสอบความยาว
            if (phoneNumber.length !== 10) {
                return false;
            }

            // ตรวจสอบตัวอักษรแรก
            if (phoneNumber[0] !== '0') {
                return false;
            }

            // ตรวจสอบตัวอักษร
            for (let i = 1; i < phoneNumber.length; i++) {
                if (!isNaN(phoneNumber[i])) {
                    continue;
                }
                return false;
            }

            return true;
        }

        const phoneNumberEditInput = document.getElementById('teacher_mobile_edit');
        const phoneNumberEditError = document.getElementById('phoneNumberErrorTeacherEdit');

        phoneNumberEditInput.addEventListener('keyup', function() {
            const phoneNumber = phoneNumberEditInput.value;
            const isValid = validatePhoneNumberTeacher(phoneNumber);

            if (isValid) {
                phoneNumberEditError.style.display = 'none';
            } else {
                phoneNumberEditError.style.display = 'block';
                phoneNumberEditError.textContent = 'เบอร์โทรศัพท์ไม่ถูกต้อง';
            }
        });
    </script>

    <!-- Send Param for Edit in Modal -->
    <script>
        $(document).ready(function() {
            $('#edit_teacher').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // ลิงก์ที่คลิกเปิด modal
                var teacherId = button.data('teacher-id'); // ดึงค่าจาก data-asso-id
                var teacherPrename = button.data('teacher-prename');
                var teacherFirstname = button.data('teacher-firstname');
                var teacherLastname = button.data('teacher-lastname');
                var teacherType = button.data('teacher-type');
                var teacherMobile = button.data('teacher-mobile');
            
                // อัปเดตค่าของฟอร์มใน modal
                var modal = $(this);
                modal.find('.modal-body #teacher_id_edit').val(teacherId);
                modal.find('.modal-body #teacher_prename_edit').val(teacherPrename);
                modal.find('.modal-body #teacher_firstname_edit').val(teacherFirstname);
                modal.find('.modal-body #teacher_lastname_edit').val(teacherLastname);
                modal.find('.modal-body #teacher_type_edit').val(teacherType);
                modal.find('.modal-body #teacher_mobile_edit').val(teacherMobile);
            });
        });
    </script>

    <!-- Delete data of boss from database -->
    <script>
        $(document).ready(function() {
            $('.continue-btn').click(function() {
                var assoId = $(this).data('asso-id'); // ดึงค่า ID ของผู้บริหาร
                $.ajax({
                    url: "sc-boss-delete.php", // เปลี่ยนเป็น URL ของ PHP script จริงของคุณ
                    method: "POST",
                    data: {
                        id: assoId
                    }, // ส่ง ID ของข้อมูลให้กับ script
                    success: function(response) {
                        if (response === "success") {
                            Swal.fire({
                                title: 'ลบข้อมูลสำเร็จ!',
                                text: 'ข้อมูล ครูที่ปรึกษา/ผู้ดูแล ถูกลบออกจากระบบเรียบร้อยแล้ว',
                                icon: 'success'
                            }).then(function() {
                                $(this).closest("tr").remove();
                                window.location.href = "sc-teacher-list.php";
                            });
                        } else {
                            Swal.fire({
                                title: 'เกิดข้อผิดพลาด!',
                                text: 'ไม่สามารถลบข้อมูล ครูที่ปรึกษา/ผู้ดูแล ได้ กรุณาลองอีกครั้ง',
                                icon: 'error'
                            });
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>