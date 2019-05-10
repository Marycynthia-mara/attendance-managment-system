<?php require_once 'config.inc.php'; ?>
<?php 
if (!isset($_SESSION['users_id'])) {
	redirect_to("index.php");
}

$user_id = intval($_SESSION['users_id']);

$user = fetch_user($user_id);
extract($user);
$role = usersRole($user['role']);

 ?>

<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Attendance Management System | <?php echo "$pagetitle" ;?></title>
		<link id="browser_favicon" rel="shortcut icon" href="resources/images/appgini-icon.png">

		<link rel="stylesheet" href="resources/initializr/css/spacelab.css">
		<link rel="stylesheet" href="resources/lightbox/css/lightbox.css" media="screen">
		<link rel="stylesheet" href="resources/select2/select2.css" media="screen">
		<link rel="stylesheet" href="resources/timepicker/bootstrap-timepicker.min.css" media="screen">
		<link rel="stylesheet" href="resources/datepicker/css/datepicker.css" media="screen">
		<link rel="stylesheet" href="dynamic.css.php">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">

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
		<script src="js/sweetalert2.all.min.js"></script>
		<script src="js/custom.js"></script>
		
	</head>
	<body>
		<div class="container theme-spacelab theme-compact">
			
		<nav class="navbar navbar-default navbar-fixed-top hidden-print" role="navigation" style="margin-bottom: 50px;">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				<a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-home"></i> Attendance Management System</a>
			</div>
	<div class="collapse navbar-collapse" >
		<ul class="nav navbar-nav">
			<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Jump to ... <b class="caret"></b></a>
				<ul class="dropdown-menu" role="menu">
					<?php if ($role == "Admin") { ?>
						<li><a href="all_users.php"><img src="resources/table_icons/group.png" height="32"> Users</a></li>
						<li><a href="courses.php"><img src="resources/table_icons/attributes_display.png" height="32"> Courses</a></li>
						<li><a href="groups.php"><img src="resources/table_icons/books.png" height="32"> Groups</a></li>
					<?php } ?>
					
					<li><a href="events.php"><img src="resources/table_icons/books.png" height="32"> Events</a></li>
					
					
					<li><a href="students_profile.php"><img src="resources/table_icons/attributes_display.png" height="32"> Profile</a></li>
					<!-- <li><a href="attendance.php"><img src="resources/table_icons/application_view_icons.png" height="32"> Attendance</a></li> -->
				</ul>
			</li>									
		</ul>

						<ul class="nav navbar-nav navbar-right hidden-xs" style="min-width: 330px;">
							<a class="btn navbar-btn btn-default" href="sign-out.php"><i class="glyphicon glyphicon-log-out"></i> Sign Out</a>
							<p class="navbar-text" style="margin: 0;">
								Signed in as <strong>
					              <!-- src="http://via.placeholder.com/500x500" -->
					              <a href="students_profile.php"><span><?php echo ($user['username']); ?></span></a>
					              <img src="<?php if($user['profile_image_path'] != '0') : echo $user['profile_image_path']; endif; ?>" alt="" style="background: url(<?php if($user['profile_image_path'] != '0') : echo $user['profile_image_path']; endif; ?>); background-size: cover; width: 55px; height: 55px; border-radius: 100%; background-position-x: 57.667%">
					              
					              <i class="fa fa-angle-down"></i>
					            </strong>
							</p>


							<div class="dropdown dropdown-c show">
           
           
          </div>

						</ul>
						<ul class="nav navbar-nav visible-xs">
							<a class="btn navbar-btn btn-default btn-lg visible-xs" href="sign-out.php"><i class="glyphicon glyphicon-log-out"></i> Sign Out</a>
							<p class="navbar-text text-center">
								Signed in as <strong><a href="students_profile.php" class="logged-user" data-toggle="dropdown" aria-expanded="true">
					              <!-- src="http://via.placeholder.com/500x500" -->
					              <span><?php echo ($user['username']); ?></span>
					              
					              
					              <i class="fa fa-angle-down"></i>
					            </a>
					            <img src="<?php if($user['profile_image_path'] != '0') : echo $user['profile_image_path']; endif; ?>" alt="" style="background: url(<?php if($user['profile_image_path'] != '0') : echo $user['profile_image_path']; endif; ?>); background-size: cover; width: 55px; height: 55px; border-radius: 100%; background-position-x: 57.667%">
					        </strong>
							</p>
						</ul>
						
</div>
		</nav>
			<div style="height: 70px;" class="hidden-print"></div>
			
			
			<div class="notifcation-placeholder" id="notifcation-placeholder-71081106"></div>
			

			
			<!-- process notifications -->
						<div style="height: 60px; margin: -15px 0 -45px;">
							</div>

						<!-- Add header template below here .. -->
