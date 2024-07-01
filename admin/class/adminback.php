<?php

class  adminback
{
    private $connection;
    function __construct()
    {

        include "config-class.php";

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->connection) {
            die("Databse connection error!!!");
        }
    }

    function admin_login($data)
    {
        $admin_username = $data['user_name'];
        $admin_password = md5($data['user_password']);

        $query = "SELECT * FROM `admin_info` WHERE `admin_username`='$admin_username' AND `admin_password`='$admin_password'";

        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $admin_info = mysqli_fetch_array($result);
            if ($admin_info) {
                header("location:admin-dashboard.php");
                $_SESSION['admin_id'] = $admin_info['admin_id'];
                $_SESSION['admin_username'] = $admin_info['admin_username'];
            } else {
                $logmsg = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
                return $logmsg;
            }
        }
    }

    function admin_logout()
    {
        session_destroy();
        header("location:./");
    }

    function display_count_register()
    {

        $query = "SELECT asso_id FROM `associate`";

        if ($count = mysqli_query($this->connection, $query)) {
            $num_row = mysqli_num_rows($count);
            $msg = $num_row;
            return $msg;
        }
    }

    function display_count_shirt()
    {

        $query = "SELECT asso_id FROM `associate` WHERE asso_size != '-เลือกขนาดเสื้อ-' ";

        if ($count = mysqli_query($this->connection, $query)) {
            $num_row = mysqli_num_rows($count);
            $msg = $num_row;
            return $msg;
        }
    }

    function display_count_shirt_size($size)
    {

        $query = "SELECT asso_id FROM `associate` WHERE asso_size = '$size' ";

        if ($count = mysqli_query($this->connection, $query)) {
            $num_row = mysqli_num_rows($count);
            $msg = $num_row;
            return $msg;
        }
    }

    function display_school()
    {

        $query = "SELECT DISTINCT user_school FROM `users`";

        if ($count = mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function display_student_count($school)
    {
        $query = "SELECT asso_school, COUNT(asso_id) AS student_count
                    FROM associate
                    WHERE asso_type = 'นักเรียน' AND asso_school = '$school'
                    GROUP BY asso_school
                    ORDER BY student_count ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }
    function display_teacher_count($school)
    {
        $query = "SELECT asso_school, COUNT(asso_id) AS teacher_count
                    FROM associate
                    WHERE asso_type = 'ครูที่ปรึกษา' AND asso_school = '$school'
                    GROUP BY asso_school
                    ORDER BY teacher_count ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }
    function display_boss_count($school)
    {
        $query = "SELECT asso_school, COUNT(asso_id) AS boss_count
                    FROM associate
                    WHERE asso_type = 'ผู้บริหาร' AND asso_school = '$school'
                    GROUP BY asso_school
                    ORDER BY boss_count ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function display_retire_count($school)
    {
        $query = "SELECT asso_school, COUNT(asso_id) AS retire_count
                    FROM associate
                    WHERE asso_type = 'ครูผู้เกษียณ' AND asso_school = '$school'
                    GROUP BY asso_school
                    ORDER BY retire_count ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function display_associate_student_register($school)
    {
        $query = "SELECT * FROM `associate` WHERE `asso_type` = 'นักเรียน' AND `asso_school` = '$school'";

        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_count_come($type, $status)
    {
        $query = "SELECT COUNT(asso_id) AS count
                    FROM associate
                    WHERE asso_type = '$type' AND asso_status = '$status' 
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_count_not_come($type, $status)
    {
        $query = "SELECT COUNT(asso_id) AS count
                    FROM associate
                    WHERE asso_type = '$type' AND asso_status = '$status' 
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_count_come_school($type, $status, $school)
    {
        $query = "SELECT COUNT(asso_id) AS count
                    FROM associate
                    WHERE asso_type = '$type' AND asso_status = '$status' AND asso_school = '$school' 
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_count_not_come_school($type, $status, $school)
    {
        $query = "SELECT COUNT(asso_id) AS count
                    FROM associate
                    WHERE asso_type = '$type' AND asso_status = '$status' AND asso_school = '$school'
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_come($status)
    {
        $query = "SELECT COUNT(asso_id) AS count
                    FROM associate
                    WHERE asso_status = '$status' 
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_student()
    {

        $query = "SELECT COUNT(asso_id) AS count
                    FROM associate
                    WHERE asso_type = 'นักเรียน' 
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_student_school($school)
    {

        $query = "SELECT COUNT(asso_id) AS count
                    FROM associate
                    WHERE asso_type = 'นักเรียน' AND asso_school = '$school' 
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_count_school($type, $school)
    {

        $query = "SELECT COUNT(asso_id) AS count
                    FROM associate
                    WHERE asso_type = '$type' AND asso_school = '$school'
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }
    function total_school_shirt($type, $school)
    {

        $query = "SELECT COUNT(asso_id) AS count
                    FROM associate
                    WHERE asso_type = '$type' AND asso_school = '$school' AND asso_size != '-เลือกขนาดเสื้อ-'
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_school_not_shirt($type, $school)
    {

        $query = "SELECT COUNT(asso_id) AS count
                    FROM associate
                    WHERE asso_type = '$type' AND asso_school = '$school' AND asso_size = '-เลือกขนาดเสื้อ-'
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_associate($type)
    {

        $query = "SELECT COUNT(asso_id) AS count
                    FROM associate
                    WHERE asso_type = '$type' 
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_associate_shirt($type, $shirt)
    {

        $query = "SELECT COUNT(asso_id) AS count
                    FROM associate
                    WHERE asso_type = '$type' AND asso_size != '$shirt'
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_associate_not_shirt($type, $shirt)
    {

        $query = "SELECT COUNT(asso_id) AS count
                    FROM associate
                    WHERE asso_type = '$type' AND asso_size = '$shirt'
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    // ==================== Project Dashboard Count ==================================

    function total_project()
    {
        $query = "SELECT COUNT(pj_id) AS count
                    FROM project WHERE pj_school != ''
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_project_school($school)
    {
        $query = "SELECT COUNT(pj_id) AS count
                    FROM project
                    WHERE pj_school = '$school'
                    AND pj_school != ''
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_all_project_school($school)
    {

        $query = "SELECT COUNT(pj_id) AS count
                    FROM project
                    WHERE pj_school = '$school'
                    AND pj_school != ''
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_all_type($type)
    {

        $query = "SELECT COUNT(pj_id) AS count
                    FROM project
                    WHERE pj_type = '$type'
                    AND pj_school != ''
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_all_Oral($school)
    {

        $query = "SELECT COUNT(pj_id) AS count
                    FROM project
                    WHERE pj_type = 'การนำเสนอแบบปากเปล่า' 
                    AND pj_school = '$school'
                    AND pj_school != ''
                 ";

        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_all_poster($school)
    {

        $query = "SELECT COUNT(pj_id) AS count
                    FROM project
                    WHERE pj_type = 'การนำเสนอแบบโปสเตอร์' 
                    AND pj_school = '$school'
                    AND pj_school != ''
                 ";

        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_all_english($school)
    {

        $query = "SELECT COUNT(pj_id) AS count
                    FROM project
                    WHERE pj_type = 'การนำเสนอเป็นภาษาอังกฤษ' 
                    AND pj_school = '$school'
                    AND pj_school != ''
                 ";

        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    // ============================= Project_dashboard_Detail ===========================
    function total_all_detail_project()
    {
        $query = "SELECT * FROM project WHERE pj_school != ''
                    order by pj_school asc
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }

    function total_all_detail_project_type($type)
    {
        $query = "SELECT * FROM project WHERE pj_type = '$type' AND pj_school != ''
                    order by pj_school asc
                 ";
        if (mysqli_query($this->connection, $query)) {
            $user_info = mysqli_query($this->connection, $query);
            return $user_info;
        }
    }


}
