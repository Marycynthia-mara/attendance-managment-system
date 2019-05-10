<?php $pageTitle = "Sign Up"; ?>
<?php require_once 'inc/config.inc.php'; ?>

<?php if (isset($_POST['signUp'])) {
	$result = add_user($_POST);

	extract($_POST);
    if ($result === true) {
        $msg = true;
    } else {
        $errors = $result;
    }
} ?>
				



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
			
									<nav class="navbar navbar-default navbar-fixed-top hidden-print" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-home"></i> Attendance Management System</a>
			</div>
			<div class="collapse navbar-collapse">

				
						<p class="navbar-text navbar-right">&nbsp;</p>
						<a href="index.php" class="btn btn-success navbar-btn navbar-right">Sign In</a>
						<p class="navbar-text navbar-right">
							You are not signed in						</p>
												</div>
		</nav>
						<div style="height: 70px;" class="hidden-print"></div>
			
			
			<div class="notifcation-placeholder" id="notifcation-placeholder-18572987"></div>

			
			<!-- process notifications -->
						<div style="height: 60px; margin: -15px 0 -45px;">
							</div>

						<!-- Add header template below here .. -->


	<div class="row">
		<div class="hidden-xs col-sm-4 col-md-6 col-lg-8" id="signup_splash">
			<!-- customized splash content here -->
		</div>

		<div class="col-sm-8 col-md-6 col-lg-4">
			<div class="panel panel-success">

				<div class="panel-heading">
					<h1 class="panel-title"><strong>Sign Up Here!</strong></h1>
				</div>

				<div class="panel-body signup_body">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
						<div class="form-group">
							<input class="form-control input-lg" type="text"  placeholder="Username" id="username" name="newUsername" value="<?php  if(isset($newUsername)){echo $newUsername; } ?>">
							
							 <?php if (isset($errors['newUsername']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Username cannot be left empty</i></p>
			            </div>
     					   <?php endif; ?>
						</div>

						<!-- <div class="row"> -->
							<!-- <div class="col-sm-6"> -->
								<div class="form-group">
									<input class="form-control" type="password"  placeholder="Password" id="password" name="password">
								</div>
							<!-- </div> -->

							<?php if (isset($errors['password']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Enter Your Password</i></p>
			            </div>
     					   <?php endif; ?>

							<!-- <div class="col-sm-6"> -->
								<div class="form-group">
									<input class="form-control" type="password"  placeholder="Confirm Password" id="confirmPassword" name="confirmPassword">
								</div>
							<!-- </div> -->

							<?php if (isset($errors['confirmPassword']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Confirm Your Password</i></p>
			            </div>
     					   <?php endif; ?>

     					    <?php if (isset($errors['password_mismatch']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Password Mismatch</i></p>
			            </div>
     					   <?php endif; ?>
						<!-- </div> -->

						<div class="form-group">
							<input class="form-control" type="email"  placeholder="Email Address" id="email" name="email" value="<?php  if(isset($email)){echo $email; } ?>">
						</div>

						<?php if (isset($errors['email']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Email cannot be left empty</i></p>
			            </div>
     					   <?php endif; ?>


     					   <?php if (isset($errors['dublicate_email']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Email have been used</i></p>
			            </div>
     					   <?php endif; ?>

						<div class="form-group">
							<input class="form-control input-lg" type="text"   placeholder="Fullname" id="fullname" name="fullname" value="<?php  if(isset($fullname)){echo $fullname; } ?>">
						</div>

						<?php if (isset($errors['fullname']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Fullname cannot be left empty</i></p>
			            </div>
     					   <?php endif; ?>


						<div class="form-group">
							<select class="form-control" name="group_name" id="group_name">
								<?php
								$table_rows = fetch_table_rows('users_group');
								 if (count($table_rows, COUNT_RECURSIVE) != count($table_rows)) {
								 	foreach ($table_rows as $table_row) {					 	
								  ?>
									<option   class=""  value="<?php echo $table_row['group_name'] ?>"><?php echo $table_row['group_name'] ?></option>
							<?php }	} ?>
								
								
							</select>							
						</div>
						 <?php if (isset($errors['group_name']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Choose a group</i></p>
			            </div>
     					   <?php endif; ?>

						<div class="form-group">
							<select class="form-control" name="course_name" id="course_name">
								<?php
								$table_rows = fetch_table_rows('course');
								 if (count($table_rows, COUNT_RECURSIVE) != count($table_rows)) {
								 	foreach ($table_rows as $table_row) {					 	
								  ?>
									<option   class=""  value="<?php echo $table_row['course_name'] ?>"><?php echo $table_row['course_name'] ?></option>
							<?php }	} ?>
							</select>							
						</div>
						 <?php if (isset($errors['course_name']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Select your course</i></p>
			            </div>
     					   <?php endif; ?>

						<div class="form-group">
							<input class="form-control input-lg" type="text"  placeholder="Registration Number" id="reg_no" name="reg_no" value="<?php  if(isset($reg_no)){echo $reg_no; } ?>">
						</div>
																
							 <?php if (isset($errors['reg_no']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Enter Your reg no</i></p>
			            </div>
     					   <?php endif; ?>													
																		
										
						<div class="row signed">
							<div class="col-sm-offset-3 col-sm-6">
								<button class="btn btn-primary btn-lg btn-block" value="signUp" id="submit" type="submit" name="signUp">Sign Up</button>
							</div>

						</div>

				 <?php if (isset($msg))  : ?>

			            <div class="form-group alert alert-success">
			                <p><i>Registration Successful</i></p>
			            </div>
     		   <?php endif; ?>

     		   
					</form>
				</div> <!-- /div class="panel-body" -->
			</div> <!-- /div class="panel ..." -->
		</div> <!-- /div class="col..." -->
	</div> <!-- /div class="row" -->


			<!-- Add footer template above here -->
			<div class="clearfix"></div>
							<div style="height: 70px;" class="hidden-print"></div>
			
		</div> <!-- /div class="container" -->
				<script src="resources/lightbox/js/lightbox.min.js"></script>
	</body>
</html>