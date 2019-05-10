<?php require_once 'config.inc.php'; ?>

<?php 
if (!isset($_SESSION['users_id'])) {
	redirect_to("index.php");
}

$user_id = intval($_SESSION['users_id']);

$user = fetch_user($user_id);
$role = usersRole($user['role']);

 ?>
<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Attendance Management System | <?php echo $pageTitle;?></title>
		<link id="browser_favicon" rel="shortcut icon" href="resources/images/appgini-icon.png">

		<link rel="stylesheet" href="resources/initializr/css/spacelab.css">
		<link rel="stylesheet" href="resources/lightbox/css/lightbox.css" media="screen">
		<link rel="stylesheet" href="resources/select2/select2.css" media="screen">
		<link rel="stylesheet" href="resources/timepicker/bootstrap-timepicker.min.css" media="screen">
		<link rel="stylesheet" href="resources/datepicker/css/datepicker.css" media="screen">
		<link rel="stylesheet" href="dynamic.css.php">
		<link rel="stylesheet" type="text/css" href="css/styles.css">

		<script src="resources/jquery/js/jquery-1.12.4.min.js"></script>
		<script>var $j = jQuery.noConflict();</script>
		<script src="resources/jquery/js/jquery.mark.min.js"></script>
		<script src="resources/initializr/js/vendor/bootstrap.min.js"></script>
		<script src="resources/lightbox/js/prototype.js"></script>
		<script src="resources/lightbox/js/scriptaculous.js?load=effects"></script>
		<script src="resources/select2/select2.min.js"></script>
		<script src="resources/timepicker/bootstrap-timepicker.min.js"></script>
		<script src="resources/jscookie/js.cookie.js"></script>
		<script src="resources/datepicker/js/datepicker.packed.js"></script>
		<script src="common.js.php"></script>
		
	</head>
	