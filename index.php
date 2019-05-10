<?php require_once 'inc/config.inc.php'; ?>

 <?php

if (isset($_SESSION['users_id'])) {
    redirect_to("dashboard.php");
}

if (isset($_POST['signIn'])) {
	$result = login_user($_POST);
	extract($_POST);
	if ($result === true) {
		redirect_to('dashboard.php');
	}else{
		$errors = $result;
	}
}
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

	
				<body>

		<div class="container theme-spacelab theme-compact">
			

						<div style="height: 70px;" class="hidden-print"></div>
			
			
			<div class="notifcation-placeholder" id="notifcation-placeholder-25586508"></div>

			
			<!-- process notifications -->
						<div style="height: 60px; margin: -15px 0 -45px;">
							</div>

						<!-- Add header template below here .. -->



<div class="row">
	<div class="col-sm-6 col-lg-8" id="login_splash">
		<!-- customized splash content here -->
	</div>
	<div class="col-sm-6 col-lg-4 signIn_cont">
		<div class="panel panel-success ">

			<div class="panel-heading sighIn_header">
				<h1 class="panel-title"><strong>Welcome Back! <br> Sign in to continue</strong></h1>
									<a class="btn btn-success pull-right" href="sign-up.php">Sign Up</a>
								<div class="clearfix"></div>
			</div>

			<div class="panel-body sighIn_body">
				<form method="post" action="<?php echo htmlspecialchars(($_SERVER['PHP_SELF'])); ?>">
					<div class="form-group">
						<input class="form-control" name="username" id="username" type="text" placeholder="Username" value="<?php if(isset($username)){echo $username; } ?>">
					</div>
					<?php if (isset($errors['username'])): ?>
						<div class="form-group alert alert-danger">
						<p><?php echo $errors['username']; ?></p>
					</div>
					<?php endif; ?>
					<div class="form-group">
						<input class="form-control" name="password" id="password" type="password" placeholder="Password" <?php if(isset($password)){echo $password;} ?>">
						<!-- <span class="help-block">Forgot your password? <a href=membership_passwordReset.php>Click here</a></span> -->
					</div>

					<?php if (isset($errors['password'])): ?>
						<div class="form-group alert alert-danger">
						<p><?php echo $errors['password']; ?></p>
					</div>
					<?php endif; ?>
					<!-- <div class="checkbox">
						<label class="control-label" for="rememberMe">
							<input type="checkbox" name="rememberMe" id="rememberMe" value="1">
							Remember me	</label>
					</div> -->

					<div class="row">
						<div class="col-sm-offset-3 col-sm-6">
							<button name="signIn" type="submit" id="submit" value="signIn" class="btn btn-primary btn-lg btn-block">Sign In</button>
						</div>
					</div>
					<?php if (isset($errors['login'])): ?>
						<div class="form-group alert alert-danger">
						<p><?php echo $errors['login']; ?></p>
					</div>
					<?php endif; ?>
				</form>
			</div>

			
		</div>
	</div>
</div>

			<!-- Add footer template above here -->
			<div class="clearfix"></div>
							<div style="height: 70px;" class="hidden-print"></div>
			
		</div> <!-- /div class="container" -->
				<script src="resources/lightbox/js/lightbox.min.js"></script>
	</body>
</html>