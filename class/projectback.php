<?php

class  projectback
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

    function display_project_edit($data)
    {
        $id = $data['edit_id'];
        $query = "SELECT * FROM `project` WHERE `pj_id` = $id";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }

   
}
