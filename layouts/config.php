<?php
// เชื่อมต่อกับฐานข้อมูล
include_once('../class/config-class.php');

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


