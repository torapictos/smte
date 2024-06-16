<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php
$school = $_SESSION['school'];
include_once('class/adminback.php');
$obj = new adminback();
$asso_boss = $obj->display_associate_register($school);

if (isset($_POST['add_boss_btn'])) {

    $add_msg = $obj->associate_register($_POST);
    
}

if (isset($_POST['edit_boss_btn'])) {

    $boss_id = $_POST['asso_id_edit'];
    $asso_info = $obj->update_associate($_POST);
   
}

if (isset($_GET['id'])) {
    $assoId = $_GET['id'];
    $delete_msg = $obj->delete_associate($assoId);
    
}

?>


<head>

    <title>ข้อมูลผู้บริหาร</title>

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
                            <h3 class="page-title">ข้อมูลผู้บริหาร</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.php">หน้าหลัก</a></li>
                                <li class="breadcrumb-item active">ข้อมูลผู้บริหาร</li>
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
                                    header("refresh:1; url=sc-students-list.php");
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
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_employee"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูลผู้บริหาร</a>
            
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
                                        <th class="text-nowrap">ขนาดเสื้อ</th>
                                        <th>สถานะเข้าร่วมงาน</th>
                                        <th class="text-end no-sort">ดำเนินการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($asso_boss as $row) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $i ?>
                                            </td>
                                            <td><?php echo $row['asso_prename'] ?><?php echo $row['asso_firstname'] ?> <?php echo $row['asso_lastname'] ?></td>
                                            <td><?php echo $row['asso_level'] ?></td>
                                            <td><?php echo $row['asso_mobile'] ?></td>
                                            <td><?php
                                                if ($row['asso_size'] == '-เลือกขนาดเสื้อ-') {
                                                    echo "ไม่รับเสื้อ";
                                                } else {
                                                    echo $row['asso_size'];
                                                } ?>
                                            </td>
                                            <td><?php if ($row['asso_status'] == 'เข้าร่วมงาน') {
                                                    echo "<span class='badge bg-success'>เข้าร่วมงาน</span>";
                                                } else {
                                                    echo "<span class='badge bg-danger'>ไม่เข้าร่วมงาน</span>";
                                                } ?></td>
                                            </td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee" data-asso-id="<?php echo $row['asso_id'] ?>"  data-asso-prename="<?php echo $row['asso_prename'] ?>" data-asso-firstname="<?php echo $row['asso_firstname'] ?>" data-asso-lastname="<?php echo $row['asso_lastname'] ?>" data-asso-mobile="<?php echo $row['asso_mobile'] ?>" data-asso-size="<?php echo $row['asso_size'] ?>" data-asso-level="<?php echo $row['asso_level'] ?>" data-asso-type="<?php echo $row['asso_type'] ?>" data-asso-status="<?php echo $row['asso_status'] ?>"><i class="fa-solid fa-pencil m-r-5"></i> แก้ไข</a>
                                                        <a class="dropdown-item" href="?id=<?php echo $row['asso_id'] ?>" > <i class="fa-regular fa-trash-can m-r-5"></i> ลบ</a>
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

            <!-- Add Employee Modal -->
            <div id="add_employee" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">เพิ่มข้อมูลผู้บริหาร</h5>
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
                                            <select class="select" name="asso_prename" id="asso_prename" required>
                                                <option>-เลือกคำนำหน้า-</option>
                                                <option>นาย</option>
                                                <option>นางสาว</option>
                                                <option>นาง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ชื่อ <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="asso_firstname" id="asso_firstname" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">นามสกุล<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="asso_lastname" id="asso_lastname" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">ตำแหน่ง <span class="text-danger">*</span></label>
                                            <select class="select" name="asso_level" id="asso_level" required>
                                                <option>-เลือกตำแหน่ง-</option>
                                                <option value="ผู้อำนวยการ">ผู้อำนวยการ</option>
                                                <option value="รองผู้อำนวยการ">รองผู้อำนวยการ</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">เบอร์โทรศัพท์ </label>
                                            <input type="text" id="asso_mobile" name="asso_mobile"  maxlength="10" class="form-control" value="" onkeyup="validatePhoneNumber('asso_mobile')">
                                            <div id="phoneNumberError" style="display: none; color: red;"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">สถานะการเข้าร่วมงาน <span class="text-danger">*</span></label>
                                            <select class="select" name="asso_status" id="asso_status" required>
                                                <option> -เลือกสถานะ- </option>
                                                <option value="เข้าร่วมงาน">เข้าร่วมงาน</option>
                                                <option value="ไม่เข้าร่วมงาน">ไม่เข้าร่วมงาน</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">

                                        <div class="input-block mb-3">
                                            <label class="d-block col-form-label"><span class="text-danger">*</span>ต้องการรับเสื้อค่าย (230 บาท/ตัว)</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="asso_needRadio" id="needRadioButton" value="ต้องการ">
                                                <label class="form-check-label" for="needRadioButton">ต้องการ</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="asso_needRadio" id="notNeedRadioButton" value="ไม่ต้องการ">
                                                <label class="form-check-label" for="notNeedRadioButton">ไม่ต้องการ</label>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-6">

                                        <div class="input-block mb-3" id="selectBoxContainer" style="display: none;">
                                            <label class="col-form-label">ขนาดเสื้อ <span class="text-danger">*</span></label>
                                            <select class="select" name="asso_size" id="asso_size" required>
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
                                </div>

                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                    <input type="hidden" id="asso_id_card" name="asso_id_card"class="form-control" value="ไม่ต้องระบุ">
                                        <input name="asso_type" type="hidden" class="form-control" value="ผู้บริหาร">
                                        <input name="asso_school" type="hidden" class="form-control" value="<?php echo $school ?>">
                                    </div>
                                </div>

                                <div class="table-responsive m-t-15">

                                </div>
                                <div class="submit-section">
                                    <button type="submit" name="add_boss_btn" class="btn btn-primary submit-btn">เพิ่มข้อมูล</button>
                                </div>
                        </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Employee Modal -->

        <!-- Edit Employee Modal -->
        <div id="edit_employee" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">แก้ไขข้อมูลผู้บริหาร </h5>
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
                                        <select class="select" name="asso_prename_edit" id="asso_prename_edit" required>
                                            <option>-เลือกคำนำหน้า-</option>
                                            <option>นาย</option>
                                            <option>นางสาว</option>
                                            <option>นาง</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">ชื่อ <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="asso_firstname_edit" id="asso_firstname_edit" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">นามสกุล<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="asso_lastname_edit" id="asso_lastname_edit" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">ตำแหน่ง <span class="text-danger">*</span></label>
                                        <select class="select" name="asso_level_edit" id="asso_level_edit" required>
                                            <option>-เลือกตำแหน่ง-</option>
                                            <option value="ผู้อำนวยการ">ผู้อำนวยการ</option>
                                            <option value="รองผู้อำนวยการ">รองผู้อำนวยการ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">เบอร์โทรศัพท์ </label>
                                        <input type="text" id="asso_mobile_edit" name="asso_mobile_edit"  maxlength="10" class="form-control" value="" onkeyup="validatePhoneNumber('asso_mobile')">
                                        <div id="phoneNumberErrorEdit" style="display: none; color: red;"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">สถานะการเข้าร่วมงาน <span class="text-danger">*</span></label>
                                        <select class="select" name="asso_status_edit" id="asso_status_edit" required>
                                            <option> -เลือกสถานะ- </option>
                                            <option value="เข้าร่วมงาน">เข้าร่วมงาน</option>
                                            <option value="ไม่เข้าร่วมงาน">ไม่เข้าร่วมงาน</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                    <div class="input-block mb-3">
                                        <label class="d-block col-form-label"><span class="text-danger">*</span>ต้องการรับเสื้อค่าย (230 บาท/ตัว)</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="asso_retire_needRadio_edit" id="needRadioButtonEdit" value="">
                                            <label class="form-check-label" for="needRadioButton">ต้องการ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="asso_retire_needRadio_edit" id="notNeedRadioButtonEdit" value="-เลือกขนาดเสื้อ-">
                                            <label class="form-check-label" for="notNeedRadioButton">ไม่ต้องการ</label>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6">

                                    <div class="input-block mb-3" id="selectBoxContainerEdit" style="display: none;">
                                        <label class="col-form-label">ขนาดเสื้อ <span class="text-danger">*</span></label>
                                        <select class="select" name="asso_size_edit" id="asso_size_edit" required>
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
                            </div>

                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <input type="hidden" id="asso_id_card_edit" name="asso_id_card_edit" class="form-control" value="ไม่ต้องระบุ">
                                    <input name="asso_type_edit" type="hidden" class="form-control" value="ผู้บริหาร">
                                    <input name="asso_id_edit" id="asso_id_edit" type="hidden" class="form-control">
                                </div>
                            </div>

                            <div class="table-responsive m-t-15">

                            </div>
                            <div class="submit-section">
                                <button type="submit" name="edit_boss_btn" class="btn btn-primary submit-btn">แก้ไขข้อมูล</button>
                            </div>
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

    <!-- Check Accept to Associate Add-->
    <script>
        const needRadioButton = document.getElementById('needRadioButton');
        const notNeedRadioButton = document.getElementById('notNeedRadioButton');
        const selectBoxContainer = document.getElementById('selectBoxContainer');

        needRadioButton.addEventListener('change', function() {
            if (needRadioButton.checked) {
                selectBoxContainer.style.display = 'block';
            } else {
                selectBoxContainer.style.display = 'none';
            }
        });

        notNeedRadioButton.addEventListener('change', function() {
            if (notNeedRadioButton.checked) {
                selectBoxContainer.style.display = 'none';
            }
        });
    </script>

    <!-- Check Accept to Associate Edit-->
    <script>
        const needRadioButtonEdit = document.getElementById('needRadioButtonEdit');
        const notNeedRadioButtonEdit = document.getElementById('notNeedRadioButtonEdit');
        const selectBoxContainerEdit = document.getElementById('selectBoxContainerEdit');

        needRadioButtonEdit.addEventListener('change', function() {
            if (needRadioButtonEdit.checked) {
                selectBoxContainerEdit.style.display = 'block';
            } else {
                selectBoxContainerEdit.style.display = 'none';
            }
        });

        notNeedRadioButtonEdit.addEventListener('change', function() {
            if (notNeedRadioButtonEdit.checked) {
                selectBoxContainerEdit.style.display = 'none';
            }
        });
    </script>
    
    <!-- Check Phone Number Add -->
    <script>
        function validatePhoneNumber(phoneNumber) {
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

        const phoneNumberInput = document.getElementById('asso_mobile');
        const phoneNumberError = document.getElementById('phoneNumberError');

        phoneNumberInput.addEventListener('keyup', function() {
            const phoneNumber = phoneNumberInput.value;
            const isValid = validatePhoneNumber(phoneNumber);

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
        function validatePhoneNumberEdit(phoneNumber) {
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

        const phoneNumberEditInput = document.getElementById('asso_mobile_edit');
        const phoneNumberEditError = document.getElementById('phoneNumberEditError');

        phoneNumberEditInput.addEventListener('keyup', function() {
            const phoneNumber = phoneNumberEditInput.value;
            const isValid = validatePhoneNumber(phoneNumber);

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
            $('#edit_employee').on('show.bs.modal', function(event) {
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
                var assoNeed = button.data('asso-size');
                var assoNotNeed = button.data('asso-size');

                // อัปเดตค่าของฟอร์มใน modal
                var modal = $(this);
                modal.find('.modal-body #asso_id_edit').val(assoId);
                modal.find('.modal-body #asso_level_edit').val(assoLevel);
                modal.find('.modal-body #asso_prename_edit').val(assoPrename);
                modal.find('.modal-body #asso_firstname_edit').val(assoFirstname);
                modal.find('.modal-body #asso_lastname_edit').val(assoLastname);
                modal.find('.modal-body #asso_mobile_edit').val(assoMobile);
                modal.find('.modal-body #asso_size_edit').val(assoSize);
                modal.find('.modal-body #asso_type_edit').val(assoType);
                modal.find('.modal-body #asso_status_edit').val(assoStatus);



                // อัปเดตค่าของฟอร์มใน modal

                if (assoLevel) {
                    modal.find('.modal-body #asso_level_edit').val(assoLevel).change();
                }
                if (assoPrename) {
                    modal.find('.modal-body #asso_prename_edit').val(assoPrename).change();
                }
                if (assoSize) {
                    modal.find('.modal-body #asso_size_edit').val(assoSize).change();
                }
                if (assoStatus) {
                    modal.find('.modal-body #asso_status_edit').val(assoStatus).change();
                }

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
                                text: 'ข้อมูลผู้บริหารถูกลบออกจากระบบเรียบร้อยแล้ว',
                                icon: 'success'
                            }).then(function() {
                                $(this).closest("tr").remove();
                                window.location.href = "sc-boss-list.php";
                            });
                        } else {
                            Swal.fire({
                                title: 'เกิดข้อผิดพลาด!',
                                text: 'ไม่สามารถลบข้อมูลผู้บริหารได้ กรุณาลองอีกครั้ง',
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