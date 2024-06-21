<?php

class  adminback
{

    private $connection;

    function __construct()
    {
        include 'config-class.php';

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->connection) {
            die("Databse connection error!!!");
        }
    }


    function update_users($data)
    {


        $user_id = $data['user_id'];
        $user_firstname = $data['user_firstname'];
        $user_lastname = $data['user_lastname'];
        $user_mobile = $data['user_mobile'];
        $user_level = $data['user_level'];
        $user_shirt = $data['user_shirt'];

        $query = "UPDATE `users` 
                    SET
                    `user_firstname` = '$user_firstname', 
                    `user_lastname` = '$user_lastname',
                    `user_mobile` = '$user_mobile',
                    `user_level` = '$user_level',
                    `user_shirt` = '$user_shirt'
                    WHERE `user_id`= '$user_id' ";
        if (mysqli_query($this->connection, $query)) {
            $up_msg = "แก้ไขข้อมูลเรียบร้อยแล้ว";
            return $up_msg;
        }
    }

    function display_user_profile()
    {
        $userId = $_SESSION['user_id'];
        //echo "<scrip>alert('$userId')</script>";
        $query = "SELECT
            user_id,
            user_firstname,
            user_lastname,
            user_mobile,
            user_level,
            user_shirt,
            user_school,
            size,
            level
            FROM
            `users`
            RIGHT JOIN shirt ON users.user_shirt = shirt.s_id
            LEFT JOIN teacher_level ON users.user_level = teacher_level.tl_id
            WHERE
            user_id = '$userId'";

        if (mysqli_query($this->connection, $query)) {
            $user_profile = mysqli_query($this->connection, $query);
            return $user_profile;
        }
    }

    function display_associate()
    {
        $query = "SELECT
            asso_id,
            asso_level,
            asso_id_card,
            asso_prename
            asso_firstname,
            asso_lastname
            asso_mobile,
            size,
            
            FROM
            `users`
            RIGHT JOIN shirt ON users.user_shirt = shirt.s_id
            LEFT JOIN teacher_level ON users.user_level = teacher_level.tl_id
            WHERE
            user_id = 1";

        if (mysqli_query($this->connection, $query)) {
            $user_profile = mysqli_query($this->connection, $query);
            return $user_profile;
        }
    }


    function display_user_details()
    {
        $query = "SELECT username FROM `users`";

        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function display_teacher_level_details()
    {
        $query = "SELECT * FROM `teacher_level`";

        if (mysqli_query($this->connection, $query)) {
            $teacher_level_info = mysqli_query($this->connection, $query);
            return $teacher_level_info;
        }
    }

    function display_shirt_info()
    {
        $query = "SELECT * FROM `shirt`";

        if (mysqli_query($this->connection, $query)) {
            $shirt_info = mysqli_query($this->connection, $query);
            return $shirt_info;
        }
    }

    function associate_register($data)
    {

        $asso_level = $data['asso_level'];
        $asso_id_card = $data['asso_id_card'];
        $asso_prename = $data['asso_prename'];
        $asso_firstname = $data['asso_firstname'];
        $asso_lastname = $data['asso_lastname'];
        $asso_mobile = $data['asso_mobile'];
        if ($data['asso_size'] == '-เลือกขนาดเสื้อ-') {
            $asso_size = '-เลือกขนาดเสื้อ-';
        } else {
            $asso_size = $data['asso_size'];
        }

        $asso_type = $data['asso_type'];
        $asso_status = $data['asso_status'];
        $asso_school = $data['asso_school'];

        $query = "INSERT INTO `associate`(`asso_id_card`, `asso_prename`, `asso_firstname`, `asso_lastname`, `asso_mobile`, `asso_size`, `asso_level`, `asso_type`, `asso_status`,`asso_school`) 
                                    VALUES ('$asso_id_card','$asso_prename','$asso_firstname','$asso_lastname','$asso_mobile','$asso_size','$asso_level','$asso_type','$asso_status','$asso_school')";

        if (mysqli_query($this->connection, $query)) {

            $msg = "เพิ่มข้อมูลสําเร็จ";
            return $msg;
        }
    }
    function associate_student_register($data)
    {

        $asso_level = $data['asso_student_level'];
        $asso_id_card = $data['asso_student_id_card'];
        $asso_prename = $data['asso_student_prename'];
        $asso_firstname = $data['asso_student_firstname'];
        $asso_lastname = $data['asso_student_lastname'];
        $asso_mobile = $data['asso_student_mobile'];
        $asso_size = $data['asso_student_size'];
        $asso_type = $data['asso_student_type'];
        $asso_status = $data['asso_student_status'];
        $asso_school = $data['asso_student_school'];


        $query = "INSERT INTO `associate`(`asso_id_card`, `asso_prename`, `asso_firstname`, `asso_lastname`, `asso_mobile`, `asso_size`, `asso_level`, `asso_type`, `asso_status`,`asso_school`) 
                                    VALUES ('$asso_id_card','$asso_prename','$asso_firstname','$asso_lastname','$asso_mobile','$asso_size','$asso_level','$asso_type','$asso_status','$asso_school')";

        if (mysqli_query($this->connection, $query)) {
            $msg = "เพิ่มข้อมูลสําเร็จ";
            return $msg;
        }
    }

    function associate_teacher_register($data)
    {

        $asso_level = $data['asso_teacher_level'];
        $asso_id_card = $data['asso_teacher_id_card'];
        $asso_prename = $data['asso_teacher_prename'];
        $asso_firstname = $data['asso_teacher_firstname'];
        $asso_lastname = $data['asso_teacher_lastname'];
        $asso_mobile = $data['asso_teacher_mobile'];
        $asso_size = $data['asso_teacher_size'];
        $asso_type = $data['asso_teacher_type'];
        $asso_status = $data['asso_teacher_status'];
        $asso_school = $data['asso_teacher_school'];


        $query = "INSERT INTO `associate`(`asso_id_card`, `asso_prename`, `asso_firstname`, `asso_lastname`, `asso_mobile`, `asso_size`, `asso_level`, `asso_type`, `asso_status`,`asso_school`) 
                                    VALUES ('$asso_id_card','$asso_prename','$asso_firstname','$asso_lastname','$asso_mobile','$asso_size','$asso_level','$asso_type','$asso_status','$asso_school')";

        if (mysqli_query($this->connection, $query)) {

            $msg = "เพิ่มข้อมูลสําเร็จ";
            return $msg;
        }
    }

    function associate_retire_register($data)
    {

        $asso_level = $data['asso_retire_level'];
        $asso_id_card = $data['asso_retire_id_card'];
        $asso_prename = $data['asso_retire_prename'];
        $asso_firstname = $data['asso_retire_firstname'];
        $asso_lastname = $data['asso_retire_lastname'];
        $asso_mobile = $data['asso_retire_mobile'];
        $asso_size = $data['asso_retire_size'];
        $asso_type = $data['asso_retire_type'];
        $asso_status = $data['asso_retire_status'];
        $asso_school = $data['asso_retire_school'];


        $query = "INSERT INTO `associate`(`asso_id_card`, `asso_prename`, `asso_firstname`, `asso_lastname`, `asso_mobile`, `asso_size`, `asso_level`, `asso_type`, `asso_status`,`asso_school`) 
                                    VALUES ('$asso_id_card','$asso_prename','$asso_firstname','$asso_lastname','$asso_mobile','$asso_size','$asso_level','$asso_type','$asso_status','$asso_school')";

        if (mysqli_query($this->connection, $query)) {
            //echo "<scrip>alert('เพิ่มข้อมูลสําเร็จ')</script>";
            $msg = "เพิ่มข้อมูลสําเร็จ";
            return $msg;
        }
    }

    function display_associate_register($school)
    {
        $query = "SELECT * FROM `associate` WHERE `asso_type` = 'ผู้บริหาร' AND `asso_school` = '$school'";

        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function display_associate_student_register($school)
    {
        $query = "SELECT * FROM `associate` WHERE `asso_type` = 'นักเรียน' AND `asso_school` = '$school' ORDER BY `asso_id` DESC";

        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function display_associate_teacher_register($school)
    {
        $query = "SELECT * FROM `associate` WHERE `asso_type` = 'ครูที่ปรึกษา' AND `asso_school` = '$school' ORDER BY `asso_id` DESC";

        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function display_associate_retire_register($school)
    {
        $query = "SELECT * FROM `associate` WHERE `asso_type` = 'ครูผู้เกษียณ' AND `asso_school` = '$school' ORDER BY `asso_id` DESC";

        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }


    function display_associate_register_edit($asso_id)
    {

        $query = "SELECT * FROM `associate` WHERE `asso_id` = '$asso_id'";

        if (mysqli_query($this->connection, $query)) {
            $asso_info = mysqli_query($this->connection, $query);
            return $asso_info;
        }
    }

    function update_associate($data)
    {

        $asso_id = $data['asso_id_edit'];
        $asso_level = $data['asso_level_edit'];
        $asso_prename = $data['asso_prename_edit'];
        $asso_firstname = $data['asso_firstname_edit'];
        $asso_lastname = $data['asso_lastname_edit'];
        $asso_mobile = $data['asso_mobile_edit'];
        $asso_need = $data['asso_needRadio_edit'];

        if ($asso_need == '-เลือกขนาดเสื้อ-') {
            $asso_size = '-เลือกขนาดเสื้อ-';
        } else {
            $asso_size = $data['asso_size_edit'];
        }
        $asso_status = $data['asso_status_edit'];



        $query = "UPDATE `associate` 
                    SET                     
                    `asso_prename` = '$asso_prename',
                    `asso_firstname` = '$asso_firstname',
                    `asso_lastname` = '$asso_lastname',
                    `asso_mobile` = '$asso_mobile',
                    `asso_size` = '$asso_size',
                    `asso_level` = '$asso_level',
                    `asso_status` = '$asso_status'

                    WHERE `asso_id`= '$asso_id' ";
        if (mysqli_query($this->connection, $query)) {
            $up_msg = "แก้ไขข้อมูลสําเร็จ";
            return $up_msg;
        }
    }
    function update_associate_student($data)
    {

        $asso_id = $data['asso_student_id_edit'];
        $asso_level = $data['asso_student_level_edit'];
        $asso_prename = $data['asso_student_prename_edit'];
        $asso_firstname = $data['asso_student_firstname_edit'];
        $asso_lastname = $data['asso_student_lastname_edit'];
        $asso_mobile = $data['asso_student_mobile_edit'];
        $asso_size = $data['asso_student_size_edit'];
        $asso_status = $data['asso_student_status_edit'];

        $query = "UPDATE `associate` 
                    SET                     
                    `asso_prename` = '$asso_prename',
                    `asso_firstname` = '$asso_firstname',
                    `asso_lastname` = '$asso_lastname',
                    `asso_mobile` = '$asso_mobile',
                    `asso_size` = '$asso_size',
                    `asso_level` = '$asso_level',
                    `asso_status` = '$asso_status'

                    WHERE `asso_id`= '$asso_id' ";
        if (mysqli_query($this->connection, $query)) {
            $up_msg = "แก้ไขข้อมูลสําเร็จ";
            return $up_msg;
        }
    }

    function update_associate_teacher($data)
    {

        $asso_id = $data['asso_teacher_id_edit'];
        $asso_level = $data['asso_teacher_level_edit'];
        $asso_prename = $data['asso_teacher_prename_edit'];
        $asso_firstname = $data['asso_teacher_firstname_edit'];
        $asso_lastname = $data['asso_teacher_lastname_edit'];
        $asso_mobile = $data['asso_teacher_mobile_edit'];
        $asso_size = $data['asso_teacher_size_edit'];
        $asso_status = $data['asso_teacher_status_edit'];


        $query = "UPDATE `associate` 
                    SET                     
                    `asso_prename` = '$asso_prename',
                    `asso_firstname` = '$asso_firstname',
                    `asso_lastname` = '$asso_lastname',
                    `asso_mobile` = '$asso_mobile',
                    `asso_size` = '$asso_size',
                    `asso_level` = '$asso_level',
                    `asso_status` = '$asso_status'

                    WHERE `asso_id`= '$asso_id' ";
        if (mysqli_query($this->connection, $query)) {
            $up_msg = "แก้ไขข้อมูลสําเร็จ";
            return $up_msg;
        }
    }

    function update_associate_retire($data)
    {

        $asso_id = $data['asso_retire_id_edit'];
        $asso_level = $data['asso_retire_level_edit'];
        $asso_prename = $data['asso_retire_prename_edit'];
        $asso_firstname = $data['asso_retire_firstname_edit'];
        $asso_lastname = $data['asso_retire_lastname_edit'];
        $asso_mobile = $data['asso_retire_mobile_edit'];
        $asso_size = $data['asso_retire_size_edit'];
        $asso_status = $data['asso_retire_status_edit'];
        $asso_need = $data['asso_retire_needRadio_edit'];


        if ($asso_need == '-เลือกขนาดเสื้อ-') {
            $asso_size = '-เลือกขนาดเสื้อ-';
        } else {
            $asso_size = $data['asso_retire_size_edit'];
        }

        $query = "UPDATE `associate` 
                    SET                     
                    `asso_prename` = '$asso_prename',
                    `asso_firstname` = '$asso_firstname',
                    `asso_lastname` = '$asso_lastname',
                    `asso_mobile` = '$asso_mobile',
                    `asso_size` = '$asso_size',
                    `asso_level` = '$asso_level',
                    `asso_status` = '$asso_status'

                    WHERE `asso_id`= '$asso_id' ";
        if (mysqli_query($this->connection, $query)) {
            $up_msg = "แก้ไขข้อมูลสําเร็จ";
            return $up_msg;
        }
    }

    function delete_associate($asso_id)
    {
        $query = "DELETE FROM `associate` WHERE `asso_id`=$asso_id";
        if (mysqli_query($this->connection, $query)) {
            $del_msg = "ลบข้อมูลสําเร็จ";
            return $del_msg;
        }
    }

    function user_register($data)
    {
        $username = $data['username'];
        $user_firstname = $data['user_firstname'];
        $user_lastname = $data['user_lastname'];
        $user_email = $data['user_email'];
        $user_password = md5($data['user_password']);
        $user_mobile = $data['user_mobile'];
        $user_address = $data['user_address'];
        $user_roles = $data['user_roles'];


        $user_check = "SELECT * FROM `users` WHERE user_name='$username' or user_email='$user_email'";

        $mysqli_result = mysqli_query($this->connection, $user_check);

        $row = mysqli_num_rows($mysqli_result);

        if ($row == 1) {
            $msg = "Username or email already exist";
            return $msg;
        } else {
            $query = "INSERT INTO `users`( `user_name`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_mobile`,`user_address`, `user_roles`) VALUES ('$username',' $user_firstname',' $user_lastname','$user_email','$user_password',$user_mobile,'$user_address',$user_roles)";

            if (mysqli_query($this->connection, $query)) {
                $msg = "Your registration done";
                return $msg;
            }
        }
    }
    function display_user_register()
    {
        $query = "SELECT * FROM `associate`";

        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }


    function user_login($data)
    {
        $user_name = $_POST['user_name'];
        $user_password = md5($_POST['user_password']);

        $query = "SELECT * FROM `users` WHERE `user_name`='$user_name' AND `user_password`='$user_password'";

        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $user_info = mysqli_fetch_array($result);
            if ($user_info) {
                header("location:school-dashboard.php");
                $_SESSION['user_id'] = $user_info['user_id'];
                $_SESSION['school'] = $user_info['user_school'];
                $_SESSION['username'] = $user_info['user_name'];
            } else {
                $logmsg = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
                return $logmsg;
            }
        }
    }

    function user_logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['password']);
        unset($_SESSION['username']);
        unset($_SESSION['school']);
        session_destroy();
        header("location:index.php");
    }



    // ================================= Project section ========================================

    function project_register($data)
    {
        $project_name_th = $data['project_name_th'];
        $project_name_en = $data['project_name_en'];
        $major = $data['major'];
        $major_type = $data['major_type'];
        $first_student = $data['first_student'];
        $second_student = $data['second_student'];
        $third_student = $data['third_student'];
        $first_teacher = $data['first_teacher'];
        $second_teacher = $data['second_teacher'];
        $third_teacher = $data['third_teacher'];
        $school = $data['project_school'];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_FILES['project_abstract']) && $_FILES['project_abstract']['error'] == UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['project_abstract']['tmp_name'];
                $fileName = $_FILES['project_abstract']['name'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));

                // Sanitize file name
                $newFileName = time() . $fileName . '.' . $fileExtension;

                // Check if the file has the right extension
                $allowedfileExtensions = array('pdf');
                if (in_array($fileExtension, $allowedfileExtensions)) {
                    // Directory in which the uploaded file will be moved
                    $uploadFileDir = './uploads/';
                    $dest_path = $uploadFileDir . $newFileName;

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        echo "กรุณารอสักครู่";
                    } else {
                        echo "เกิดข้อผิดพลาดในการอัพโหลดไฟล์";
                    }
                } else {
                    echo "คุณอัพโหลดไฟล์ที่ไม่ถูกต้อง: " . implode(',', $allowedfileExtensions);
                }
            } else {
                echo "มีบางอย่างผิดพลาดโปรดติดต่อผู้ดูแลระบบ<br>";
                echo 'Error:' . $_FILES['project_abstract']['error'];
            }
        } else {
            echo "Invalid request method.";
        }



        $query = "
        INSERT INTO `project` (`pj_name_th`, `pj_name_en`, `pj_major`, `pj_type`, `pj_student_one`, `pj_student_two`, `pj_student_three`, `pj_advisor_one`, `pj_advisor_two`, `pj_advisor_three`, `pj_abstract`, `pj_school`, `create_at`, `modify_at`)
        VALUES ('$project_name_th', '$project_name_en', '$major', '$major_type', '$first_student', '$second_student', '$third_student', '$first_teacher', '$second_teacher', '$third_teacher', '$newFileName', '$school', NOW(), NOW());
        ";

        if (mysqli_query($this->connection, $query)) {
            $msg = "ลงทะเบียนสําเร็จ";
            return $msg;
        } else {
            echo 'Error: ' . mysqli_error($this->connection);
            exit;
        }
    }

    function project_edit($data)
    {
        $project_name_th = $data['project_name_th_edit'];
        $project_name_en = $data['project_name_en_edit'];
        $major = $data['project_major_edit'];
        $major_type = $data['project_major_type_edit'];
        $first_student = $data['first_student_edit'];
        $second_student = $data['second_student_edit'];
        $third_student = $data['third_student_edit'];
        $first_advisor = $data['first_advisor_edit'];
        $second_advisor = $data['second_advisor_edit'];
        $third_advisor = $data['third_advisor_edit'];
        $abstract = $_FILES['project_abstract_edit']['name'];
        $projectId = $data['project_id'];
        $time = date("Y-m-d h:i:s");


        if (isset($abstract) && ($abstract == "")) {


            $query = " UPDATE `project` 
                        SET 
                            `pj_name_th`='$project_name_th',
                            `pj_name_en`='$project_name_en',
                            `pj_major`='$major',
                            `pj_type`='$major_type',
                            `pj_student_one`='$first_student',
                            `pj_student_two`='$second_student',
                            `pj_student_three`='$third_student',
                            `pj_advisor_one`='$first_advisor',
                            `pj_advisor_two`='$second_advisor',
                            `pj_advisor_three`='$third_advisor',
                            `modify_at`='$time' 
                        WHERE 
                            `pj_id` = '$projectId'            
                    ";

            if (mysqli_query($this->connection, $query)) {
                $msg = "ปรับปรุงไฟล์เดิมข้อมูลสําเร็จ";
                return $msg;
            } else {
                echo 'Error: ' . mysqli_error($this->connection);
                exit;
            }
        } else {


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_FILES['project_abstract_edit']) && $_FILES['project_abstract_edit']['error'] == UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['project_abstract_edit']['tmp_name'];
                    $fileName = $_FILES['project_abstract_edit']['name'];
                    $fileNameCmps = explode(".", $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));

                    // Sanitize file name
                    $newFileName = time() . $fileName . '.' . $fileExtension;

                    // Check if the file has the right extension
                    $allowedfileExtensions = array('pdf');
                    if (in_array($fileExtension, $allowedfileExtensions)) {
                        // Directory in which the uploaded file will be moved
                        $uploadFileDir = './uploads/';
                        $dest_path = $uploadFileDir . $newFileName;

                        if (move_uploaded_file($fileTmpPath, $dest_path)) {
                            echo "กรุณารอสักครู่";
                        } else {
                            echo "เกิดข้อผิดพลาดในการอัพโหลดไฟล์";
                        }
                    } else {
                        echo "คุณอัพโหลดไฟล์ที่ไม่ถูกต้อง: " . implode(',', $allowedfileExtensions);
                    }
                } else {
                    echo "มีบางอย่างผิดพลาดโปรดติดต่อผู้ดูแลระบบ<br>";
                    echo 'Error:' . $_FILES['project_abstract']['error'];
                }
            } else {
                echo "Invalid request method.";
            }


            $query = " UPDATE `project` 
                        SET 
                            `pj_name_th`='$project_name_th',
                            `pj_name_en`='$project_name_en',
                            `pj_major`='$major',
                            `pj_type`='$major_type',
                            `pj_student_one`='$first_student',
                            `pj_student_two`='$second_student',
                            `pj_student_three`='$third_student',
                            `pj_advisor_one`='$first_advisor',
                            `pj_advisor_two`='$second_advisor',
                            `pj_advisor_three`='$third_advisor',
                            `pj_abstract` = '$newFileName',
                            `modify_at`='$time' 
                        WHERE 
                            `pj_id` = '$projectId'            
                    ";

            if (mysqli_query($this->connection, $query)) {
                $msg = "ปรับปรุงข้อมูลไฟล์ใหม่สําเร็จ";
                return $msg;
            } else {
                echo 'Error: ' . mysqli_error($this->connection);
                exit;
            }
        }
    }

    function project_delete($data)
    {
        $projectId = $data['delete_id'];

        $query = "DELETE FROM `project` WHERE `project`.`pj_id` = '$projectId' ";
        if (mysqli_query($this->connection, $query)) {
            $msg = "ลบข้อมูลสําเร็จ";
            return $msg;
        }
    }

    function project_display_edit($editId)
    {

        $query = "SELECT * FROM `project` WHERE `pj_id` = '$editId' ";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }
    function major_list()
    {
        $query = "SELECT * FROM `major` ORDER BY `mj_name` ASC";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }

    function major_type()
    {
        $query = "SELECT * FROM `major_type` ORDER BY `mjt_type` DESC";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }

    function select_student($school)
    {
        $query = "SELECT * FROM `associate` WHERE `asso_type` = 'นักเรียน' AND `asso_school` = '$school' ORDER BY `asso_firstname` ASC";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }

    function select_teacher($school)
    {
        $query = "SELECT * FROM `associate` WHERE `asso_type` = 'ครูที่ปรึกษา' AND `asso_school` = '$school' ORDER BY `asso_firstname` ASC";
        $result = mysqli_query($this->connection, $query);

        return $result;
    }

    function display_project()
    {

        $query = "SELECT * FROM `project` ORDER BY `create_at` DESC";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }


    // <=============================== Assosiate Teacher Register =============================>

    function teacher_project_register($data)
    {
        $prename = $data['teacher_prename'];
        $firstname = $data['teacher_firstname'];
        $lastname = $data['teacher_lastname'];
        $type = $data['teacher_type'];
        $mobile = $data['teacher_mobile'];
        $school = $data['teacher_school'];


        $query = "INSERT INTO `teacher` (`t_prename`, `t_firstname`, `t_lastname`, `t_type`, `t_mobile`, `t_school`) 
                                    VALUES ('$prename', '$firstname', '$lastname', '$type', '$mobile', '$school')";

        if (mysqli_query($this->connection, $query)) {
            $msg = "เพิ่มข้อมูลสําเร็จ";
            return $msg;
        }
    }

    function display_teacher_project_register($school)
    {
        $query = "SELECT * FROM `teacher` WHERE `t_school` = '$school' ORDER BY `t_id` DESC";

        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function update_teacher_project($data)
    {
        $prename = $data['teacher_prename'];
        $firstname = $data['teacher_firstname'];
        $lastname = $data['teacher_lastname'];
        $type = $data['teacher_type'];
        $mobile = $data['teacher_mobile'];
        $school = $data['teacher_school'];
        $id = $data['teacher_id'];
        $time = date('Y-m-d H:i:s');
        $query = "  UPDATE `teacher` 
                    SET     `t_prename` = '$prename', 
                            `t_firstname` = '$firstname', 
                            `t_lastname` = '$lastname',
                            `t_type` = '$type', 
                            `t_mobile` = '$mobile', 
                            `update_at` = '$time' 
                    WHERE   `t_id` = '$id' ";

        if (mysqli_query($this->connection, $query)) {
            $msg = "แก้ไขข้อมูลสําเร็จ";
            return $msg;
        }
    }

    function delete_teacher_project($id)
    {
        $query = "DELETE FROM `teacher` WHERE `t_id` = '$id' ";
        if (mysqli_query($this->connection, $query)) {
            $msg = "ลบข้อมูลสําเร็จ";
            return $msg;
        }
    }
}
