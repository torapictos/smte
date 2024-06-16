<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php
include_once('class/adminback.php');
$obj = new adminback();



if (isset($_POST['user_login_btn'])) {
	$logmsg = $obj->admin_login($_POST);
	echo '<script> alert("' . $logmsg . '");</script>';
	
}

if (isset($_SESSION['admin_id'])) {
	$userId = $_SESSION['admin_id'];
	// if ($userId) {
	// 	echo "<script>window.location.href='admin-dashboard.php'</script>";
	// }
}
?>

<head>

	<title>เข้าสู่ระบบ - smte</title>
	<?php include 'layouts/title-meta.php'; ?>

	<?php include 'layouts/head-css.php'; ?>

</head>

<body class="account-page">

	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="account-content">

			<!-- Account Logo -->
			<div class="account-logo" >
				<img src="assets/img/logo-smte.png" alt="SMTE">
			</div>
			<!-- /Account Logo -->


			<div class="account-box">
				<div class="account-wrapper">
					<h3 class="account-title">เข้าสู่ระบบ</h3>
					<p class="account-subtitle">โครงการห้องเรียนพิเศษ วิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยี และสิ่งแวดล้อม ครั้งที่ 16</p>

					<p class="text-danger account-subtitle" id="logMsg">
						<?php
						if (isset($logmsg)) {
							echo $logmsg;
						}
						?>

					</p>

					<script>
						// รอ 5 วินาที
						setTimeout(function() {
							// ซ่อน elements
							document.getElementById('logMsg').style.display = 'none';
						}, 3000);
					</script>

					<!-- Account Form -->
					<form action="" name="frm-login" method="post">
						<div class="input-block mb-4">
							<label class="col-form-label">ชื่อผู้ใช้</label>
							<input class="form-control" name="user_name" type="text">
						</div>
						<div class="input-block mb-4">
							<div class="row align-items-center">
								<div class="col">
									<label class="col-form-label">รหัสผ่าน</label>
								</div>
							</div>
							<div class="position-relative">
								<input class="form-control" name="user_password" type="password" value="" id="password">
								<span class="fa-solid fa-eye-slash" id="toggle-password"></span>
							</div>
						</div>
						<div class="input-block mb-4 text-center">
							<button class="btn btn-primary account-btn" name="user_login_btn" type="submit">เข้าสู่ระบบ</button>
						</div>
					</form>
					<!-- /Account Form -->

				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- /Main Wrapper -->
	<?php include 'layouts/vendor-scripts.php'; ?>

</body>

</html>