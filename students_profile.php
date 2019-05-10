<?php $pagetitle = "Profile"; ?>
<?php require_once 'inc/page-header2.inc.php'; ?>
<?php 
if (isset($_POST['update_profile'])) {
	$result = update_profile($_POST, $user_id);
	extract($_POST);
    if ($result === true) {
        $msg = true;
    } else {
        $errors = $result;
    }

}


if (isset($_POST['update_password'])) {
	$result = update_password($_POST);
	extract($_POST);
    if ($result === true) {
        $msg2 = true;
    } else {
        $errors = $result;
    }

}

 ?>
				
	<div class="page-header">
		<h1>Welcome <?php echo($username); ?>!</h1>
	</div>
	<div class="row">
		<div class="col-md-6">

			<div class="panel panel-info">
				<div class="panel-body">
					<div class="form-group">
						<label><h1>Your Details</h1></label>
						<div class="form-control-static"><b>Email Address :</b> <?php echo $email; ?></div>
						<div class="form-control-static"><b>Fullname : </b><?php echo $fullname; ?></div>
						<div class="form-control-static"><b>Reg No : </b><?php echo $reg_no; ?></div>
						<div class="form-control-static"><b>Username : </b><?php echo $username; ?></div>
						<div class="form-control-static"><b>Course : </b><?php echo $course_name; ?></div>
						<div class="form-control-static"><b>Group : </b><?php echo $group_name; ?></div>
					</div>
				</div>
			</div>
			


			<!-- group and IP address -->
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="form-group">
						<label>Your IP address</label>
						<div class="form-control-static"><?php echo $_SERVER['REMOTE_ADDR']; ?></div>
					</div>
				</div>
			</div>

			<!-- group and IP address -->
			
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="glyphicon glyphicon-asterisk"></i>
						<!-- <i class="glyphicon glyphicon-lock"></i> -->
						Upload 	Profile Pics</h3>
				</div>
				<form method="post" action="uploads.php" enctype="multipart/form-data">
				<ul class="nav nav-activity-profile mg-t-20">
              <li class="nav-item" style="margin-top: 10px;">
                <label for="upload" class="nav-link"><i class="icon ion-ios-redo tx-purple" style="cursor: pointer;"></i><div style="cursor: pointer;padding: 10px;margin: 20px;width: 100%;display: block;text-align: center;background-color: #ccc; height: 40px;">Click to select a Picture</div></label><input id="upload" type="file" name="profile_img" style="display: none;"><input type="hidden" name="userid" value="<?php echo $user_id; ?>">
              </li>
              <li class="nav-item"><a href="" class="nav-link">
                <input type="submit" name="submit" value="Click to Upload Profile Picture" class="form-control button" style="cursor: pointer;"></a>
              </li>
            
              <?php if (isset($errors['unsupported_file_format']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i> The format of the selected file is not supported</i></p>
			            </div>
     		 <?php endif; ?>


     		 <?php if (isset($errors['large_img_size']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>The selected file size is too large</i></p>
			            </div>
     		   <?php endif; ?>


            </ul>
        </form>
			</div>

		</div>

		<div class="col-md-6">

			<!-- user info form -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="glyphicon glyphicon-info-sign"></i>
						Update Your info here	</h3>
				</div>
				<div class="panel-body">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
						
						<fieldset id="profile">
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="email" id="email" name="update_email" value="" class="form-control">
						</div>

													<div class="form-group">
								<label for="custom1">Full Name</label>
								<input type="text" id="custom1" name="custom1" value="" class="form-control">
							</div>
													<div class="form-group">
								<label for="custom2">Reg no</label>
								<input type="text" id="custom2" name="custom2" value="" class="form-control">
							</div>
													<div class="form-group">
								<label for="custom3">Username</label>
								<input type="text" id="custom3" name="custom3" value="" class="form-control">
							</div>
							<input type="hidden" name="user_id" value="<?php echo "$user_id"; ?>" >
							<!-- <div class="form-group">
								<label for="custom4">Course</label>
								<input type="text" id="custom4" name="custom4" value="" class="form-control">
							</div> -->


							<div class="form-group">
							<select class="form-control" id="custom4" name="custom4">
								<?php
								$table_rows = fetch_table_rows('course');
								 if (count($table_rows, COUNT_RECURSIVE) != count($table_rows)) {
								 	foreach ($table_rows as $table_row) {					 	
								  ?>
									<option   class=""  value="<?php echo $table_row['course_name'] ?>"><?php echo $table_row['course_name'] ?></option>
							<?php }	} ?>
							</select>
						</div>

							<div class="form-group">
							<select class="form-control" id="custom4" name="custom5">
								<?php
								$table_rows = fetch_table_rows('users_group');
								 if (count($table_rows, COUNT_RECURSIVE) != count($table_rows)) {
								 	foreach ($table_rows as $table_row) {					 	
								  ?>
									<option   class=""  value="<?php echo $table_row['group_name'] ?>"><?php echo $table_row['group_name'] ?></option>
							<?php }	} ?>
							</select>
						</div>

							<!-- <div class="form-group">
								<label for="custom4">Group</label>
								<input type="text" id="custom4" name="custom5" value="" class="form-control">
							</div> -->
						
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								
								<button id="update-profile" class="btn btn-primary btn-lg btn-block" type="submit" name="update_profile"><i class="glyphicon glyphicon-ok" value="Update profile"></i> Update profile</button>
							</div>
						
						</div>

						<?php if (isset($msg))  : ?>

			            <div class="form-group alert alert-success">
			                <p><i>update successful</i></p>
			            </div>
     					 <?php endif; ?>


     					  <?php if (isset($errors['dublicate_email']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Email already uses</i></p>
			            </div>
     					 <?php endif; ?>


     					  <?php if (isset($errors['invalid_email']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Email is invalid, Ensure it has the @ </i></p>
			            </div>
     					 <?php endif; ?>



     					 <?php if(isset($errors['custom1']) or isset($errors['custom4']) or isset($errors['custom2']) or isset($errors['custom3']) or isset($errors['custom5']) or isset($errors['email'])) : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>something went wrong <br>Ensure no field is left empty</i></p>
			            </div>
     					 <?php endif; ?>


					</fieldset>
					</form>
				</div>
			</div>

							<!-- change password -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">
							<i class="glyphicon glyphicon-asterisk"></i><i class="glyphicon glyphicon-asterisk"></i>
							Change your password						</h3>
					</div>
					<div class="panel-body">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
						<fieldset id="change-password">
							<div id="password-change-form">

								<div class="form-group">
									<label for="old-password">Old Password</label>
									<input type="password" id="old-password" autocomplete="off" class="form-control" name="old_password">
								</div>

								<?php if (isset($errors['old_password']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>old password cannot be left empty</i></p>
			            </div>
     					 <?php endif; ?>

     					 <?php if (isset($errors['Oldpassword']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>old password is incorrect</i></p>
			            </div>
     					 <?php endif; ?>

								<div class="form-group">
									<label for="new-password">New password</label>
									<input type="password" id="new-password" autocomplete="off" class="form-control" name="new_password">
									<p id="password-strength" class="help-block"></p>
								</div>

								<?php if (isset($errors['new_password']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>new password cannot be left empty</i></p>
			            </div>
     					 <?php endif; ?>

								<div class="form-group">
									<label for="confirm-password">Confirm Password</label>
									<input type="password" id="confirm-password" autocomplete="off" class="form-control" name="confirm_new_password">
									<p id="confirm-status" class="help-block"></p>
								</div>

								<?php if (isset($errors['confirm_new_password']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Confirm password cannot be left empty</i></p>
			            </div>
     					 <?php endif; ?>
								<input type="hidden" name="user_id" value="<?php echo "$user_id"; ?>" >
								<div class="row">
									<div class="col-md-4 col-md-offset-4">
										<button id="update-password" class="btn btn-primary btn-lg btn-block" type="submit" name="update_password"><i class="glyphicon glyphicon-ok"></i> Update password</button>
									</div>
									<input type="hidden" name="current_password" value="<?php echo $password; ?>">
								</div>

							</div>
						</fieldset>
						

						<?php if (isset($msg2))  : ?>

			            <div class="form-group alert alert-success">
			                <p><i> password update successful</i></p>
			            </div>
     					 <?php endif; ?>

     					 <?php if (isset($errors['DB']))  : ?>

			            <div class="form-group alert alert-success">
			                <p><i>You are changing  to your current password</i></p>
			            </div>
     					 <?php endif; ?>


					</form>
					</div>
				</div>
			
		</div>

	</div>


	<!-- <script>
		$j(function() {
						
			$('update-profile').observe('click', function(){
				post2(
					'membership_profile.php',
					{ action: 'saveProfile', email: $F('email'), custom1: $F('custom1'), custom2: $F('custom2'), custom3: $F('custom3'), custom4: $F('custom4'), csrf_token: $F('csrf_token') },
					'notify', 'profile', 'loader', 
					'membership_profile.php?notify=Your+profile+was+updated+successfully'
				);
			});

							$('update-password').observe('click', function(){
					/* make sure passwords match */
					if($F('new-password') != $F('confirm-password')){
						$('notify').addClassName('Error');
						notify('Error: Password doesn\'t match. Please go back and correct the password');
						$$('label[for="confirm-password"]')[0].pulsate({ pulses: 10, duration: 4 });
						$('confirm-password').activate();
						return false;
					}

					post2(
						'membership_profile.php',
						{ action: 'changePassword', oldPassword: $F('old-password'), newPassword: $F('new-password'), csrf_token: $F('csrf_token') },
						'notify', 'password-change-form', 'loader', 
						'membership_profile.php?notify=Your+password+was+changed+successfully'
					);
				});

				/* password strength feedback */
				$('new-password').observe('keyup', function(){
					ps = passwordStrength($F('new-password'), 'marycynthia');

					if(ps == 'strong')
						$('password-strength').update('Password strength: strong').setStyle({color: 'Green'});
					else if(ps == 'good')
						$('password-strength').update('Password strength: good').setStyle({color: 'Gold'});
					else
						$('password-strength').update('Password strength: weak').setStyle({color: 'Red'});
				});

				/* inline feedback of confirm password */
				$('confirm-password').observe('keyup', function(){
					if($F('confirm-password') != $F('new-password') || !$F('confirm-password').length){
						$('confirm-status').update('<img align="top" src="Exit.gif"/>');
					}else{
						$('confirm-status').update('<img align="top" src="update.gif"/>');
					}
				});
					});

		function notify(msg){
			$j('#notify').html(msg).fadeIn();
			window.setTimeout(function(){ $j('#notify').fadeOut(); }, 15000);
		}
	</script> -->

	
			
			
		</div> <!-- /div class="container" -->
				<script src="resources/lightbox/js/lightbox.min.js"></script>
	</body>
</html>