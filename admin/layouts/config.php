<?php
// เชื่อมต่อกับฐานข้อมูล
$db = new mysqli("localhost", "regsmte_site", "TmGWJhwX5eESfX5e4mEk", "regsmte_site");

// Check connection
if ($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


