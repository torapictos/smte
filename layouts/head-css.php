<?php
$link = $_SERVER['PHP_SELF'];
$link_array = explode('/', $link);
$page = end($link_array);
?>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<!-- Lineawesome CSS -->
<link rel="stylesheet" href="assets/css/line-awesome.min.css">
<link rel="stylesheet" href="assets/css/material.css">


<?php if ($page !== 'activities.php') {   ?>
	<!-- Feather CSS -->
	<link rel="stylesheet" href="assets/css/feather.css">
<?php } ?>

<?php if ($page == 'ui-clipboard.php' || $page == 'ui-drag-drop.php') {   ?>
	<!-- Dragula CSS -->
	<link rel="stylesheet" href="assets/plugins/dragula/css/dragula.min.css">
<?php } ?>

<?php if ($page == 'ui-notification.php') {   ?>
	<link rel="stylesheet" href="assets/plugins/alertify/alertify.min.css">
<?php } ?>

<?php if ($page == 'ui-stickynote.php') {   ?>
	<!-- Sticky CSS -->
	<link rel="stylesheet" href="assets/plugins/stickynote/sticky.css">
<?php } ?>

<?php if ($page == 'ui-text-editor.php' || $page == 'company-details.php' || $page == 'contact-details.php' || $page == 'laeds-details') {   ?>
	<!-- Summernote CSS -->
	<link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
<?php } ?>
<?php if ($page == 'icon-weather.php') {   ?>
	<!-- Pe7 CSS -->
	<link rel="stylesheet" href="assets/plugins/icons/weather/weathericons.css">
<?php } ?>

<?php if ($page == 'ui-toasts.php') {   ?>
	<!-- Toatr CSS -->
	<link rel="stylesheet" href="assets/plugins//toastr/toatr.css">
<?php } ?>
<?php if ($page == 'icon-typicon.php') {   ?>
	<!-- Pe7 CSS -->
	<link rel="stylesheet" href="assets/plugins/icons/typicons/typicons.css">
<?php } ?>
<?php if ($page == 'icon-flag.php') {   ?>
	<!-- Pe7 CSS -->
	<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
<?php } ?>
<?php if ($page == 'chart-c3.php') {   ?>
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/plugins/c3-chart/c3.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
<?php } ?>

<?php if ($page == 'ui-rangeslider.php') {   ?>
	<!-- Rangeslider CSS -->
	<link rel="stylesheet" href="assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<?php } ?>
<?php if ($page == 'ui-lightbox.php') {   ?>
	<!-- Lightbox CSS -->
	<link rel="stylesheet" href="assets/plugins/lightbox/glightbox.min.css">
<?php } ?>
<?php if ($page == 'sc-projects-list.php' ||$page == 'sc-advisor-list.php' || $page == 'form-select2.php'|| $page == 'ui-clipboard.php') {   ?>
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<?php } ?>

<?php if ($page == 'icon-feather.php' || $page == 'employee-dashboard.php') {   ?>
	<!-- Feather CSS -->
	<link rel="stylesheet" href="assets/plugins/icons/feather/feather.css">
<?php } ?>
<?php if ($page == 'icon-ionic.php') {   ?>
	<!-- Ionic CSS -->
	<link rel="stylesheet" href="assets/plugins/icons/ionic/ionicons.css">
<?php } ?>
<?php if ($page == 'icon-simpleline.php') {   ?>
	<!-- Simpleline CSS -->
	<link rel="stylesheet" href="assets/plugins/simpleline/simple-line-icons.css">
<?php } ?>
<?php if ($page == 'icon-material.php') {   ?>
	<!-- Material CSS -->
	<link rel="stylesheet" href="assets/plugins/material/materialdesignicons.css">
<?php } ?>
<?php if ($page == 'icon-themify.php') {   ?>
	<!-- Themify CSS -->
	<link rel="stylesheet" href="assets/plugins/icons/themify/themify.css">
<?php } ?>
<?php if ($page == 'icon-pe7.php') {   ?>
	<!-- Pe7 CSS -->
	<link rel="stylesheet" href="assets/plugins/icons/pe7/pe-icon-7.css">
<?php } ?>
<?php if ($page == 'admin-dashboard.php' || $page == 'leads-dashboard.php' || $page == 'deals-dashboard.php' || $page == 'assets-category.php' || $page == 'assets-new.php') {   ?>
	<!-- Chart CSS -->
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<?php if ($page == 'ui-scrollbar.php') {   ?>
		<link rel="stylesheet" href="assets/plugins/scrollbar/scroll.min.css">
	<?php } ?>

	<?php if ($page == 'leads-dashboard.php' || $page == 'deals.php' || $page == 'deals-details.php' || $page == 'deals-kanban.php' || $page == 'deals-dashboard.php' || $page == 'assets-category.php' || $page == 'assets-details.php' || $page == 'assets-new.php' || $page == 'leads.php' || $page == 'activities.php' || $page == 'pipeline.php') {   ?>
		<!-- Daterangepikcer CSS -->
		<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">

	<?php } ?>
<?php }
if (
	$page == 'projects-add.php' || $page == 'sc-advisor-list.php' || $page == 'profile.php' ||$page == 'sc-students-list.php' ||$page == 'sc-teacher-list.php' || $page == 'sc-boss-list.php' || $page == 'sc-retire-list.php' 
) { ?>
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">

<?php }
if (
	$page == 'sc-students-list.php' ||  $page == 'sc-teacher-list.php' || $page == 'sc-boss-list.php' || $page == 'sc-retire-list.php' 
) { ?>
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<?php }
if ($page == 'events.php') { ?>
	<!-- Calendar CSS -->
	<link rel="stylesheet" href="assets/css/fullcalendar.min.css">
<?php }
if ($page == 'school-dashboard.php') { ?>
	<!-- Owl carousel CSS -->
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">

<?php }


if (
	$page == 'sc-projects-list.php' || $page == 'sc-advisor-list.php' || $page == 'associate-dashboard.php'|| $page == 'sc-students-list.php' || $page == 'sc-teacher-list.php' || $page == 'sc-boss-list.php' || $page == 'sc-retire-list.php'
) { ?>
	<!-- Datatable CSS -->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">



<?php }
if ($page == 'projects.php' || $page == 'project-list.php' || $page == 'tasks.php' || $page == 'compose.php') { ?>
	<!-- Ck Editor -->
	<link rel="stylesheet" href="assets/css/ckeditor.css">

<?php }
if ($page == 'profile.php' || $page == 'components.php' || $page == 'leave-settings.php' || $page == 'leads-kanban' || $page == 'deals' || $page == 'deals-details' || $page == 'deals-kanban' || $page == 'company-details.php' || $page == 'companies-grid.php' || $page == 'companies.php' || $page == 'contact-details.php' || $page == 'contact-grid.php' || $page == 'contact-list.php' || $page == 'analytics.php' || $page == 'leads.php' || $page == 'activities.php' || $page == 'pipeline.php') { ?>
	<!-- Tagsinput CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
<?php } ?>

<?php if ($page !== 'settings.php') { ?>
	<!-- Daterangepikcer CSS -->
	<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">

	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
<?php } ?>

<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">