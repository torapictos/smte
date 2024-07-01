<?php include 'layouts/config.php'; ?>
<?php
// ดึง ID ของข้อมูลจาก request
$dataID = $_POST["id"];

// สร้าง SQL query สำหรับการลบข้อมูล
$sql = "DELETE FROM associate WHERE asso_id = $dataID";

// ดำเนินการ query
if ($db->query($sql) === TRUE) {
  echo "success";
} else {
  echo "error";
}

// ปิดการเชื่อมต่อกับฐานข้อมูล
$db->close();

?>
