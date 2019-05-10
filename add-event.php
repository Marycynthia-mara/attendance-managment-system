<?php $pageTitle = "Add Event"; ?>
<?php require_once 'inc/page-header.inc.php'; ?>

<?php if (isset($_POST['addEvent'])) {
	$result = add_event($_POST);

	extract($_POST);
    if ($result === true) {
        $msg = true;
    } else {
        $errors = $result;
    }
} ?>
				
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
			<!-- <div class="collapse navbar-collapse">

				
						<p class="navbar-text navbar-right">&nbsp;</p>
						<a href="index.php" class="btn btn-success navbar-btn navbar-right">Sign In</a>
						<p class="navbar-text navbar-right">
							You are not signed in						</p>
												</div> -->
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
					<h1 class="panel-title"><strong>Add Event Here!</strong></h1>
				</div>

				<div class="panel-body signup_body">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
						
						<div class="form-group">
							<input class="form-control" type="text"  placeholder="Enter Event Title here"  name="EventTitle" value="<?php  if(isset($EventTitle)){echo $EventTitle; } ?>">
						</div>

						<div class="form-group">
							<input class="form-control" type="text"  placeholder="Enter Event Location here"  name="EventLocation" value="<?php  if(isset($EventLocation)){echo $EventLocation; } ?>">
						</div>

						<?php if (isset($errors['EventLocation']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Event Location cannot be empty</i></p>
			            </div>
     					   <?php endif; ?>


     					   <div class="form-group">
							<input class="form-control" type="text"  placeholder="Enter Latitude of Event here "  name="EventLatitude" value="<?php  if(isset($EventLatitude)){echo $EventLatitude; } ?>">
						</div>

						<?php if (isset($errors['EventLatitude']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Event Latitude cannot be empty</i></p>
			            </div>
     					   <?php endif; ?>

     					     <?php if (isset($errors['EventLatitude_nomatch']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Enter a valid Latitude value </i></p>
			            </div>
     					   <?php endif; ?>


     					   <div class="form-group">
							<input class="form-control" type="text"  placeholder="Enter Longitude of Event here"  name="EventLongitude" value="<?php  if(isset($EventLongitude)){echo $EventLongitude; } ?>">
						</div>

						<?php if (isset($errors['EventLongitude']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Event Longitude cannot be empty</i></p>
			            </div>
     					   <?php endif; ?>

     					   <?php if (isset($errors['EventLongitude_nomatch']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Enter a valid Longitude value </i></p>
			            </div>
     					   <?php endif; ?>


     				<div class="form-group">
							<input class="form-control input-lg" type="date"   placeholder="Enter Event Date Here" name="eventDate" value="<?php  if(isset($eventDate)){echo $eventDate; } ?>">
						</div>

						<?php if (isset($errors['eventDate']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Event Date cannot be left empty</i></p>
			            </div>
     					   <?php endif; ?>

						<div class="form-group">
							<input class="form-control input-lg" type="time"   placeholder="Enter Event Start Time Here" name="eventStartTime" value="<?php  if(isset($eventStartTime)){echo $eventStartTime; } ?>">
						</div>

						<?php if (isset($errors['eventStartTime']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Event Start Time cannot be left empty</i></p>
			            </div>
     					   <?php endif; ?>

     					   <div class="form-group">
							<input class="form-control input-lg" type="time"   placeholder="Enter Event End Time Here" name="eventEndTime" value="<?php  if(isset($eventEndTime)){echo $eventEndTime; } ?>">
						</div>

						<?php if (isset($errors['eventEndTime']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Event End Time cannot be left empty</i></p>
			            </div>
     					   <?php endif; ?>


						
						

				<div class="form-group">
                  <textarea name="eventDescription"  class="form-control"  placeholder="Enter description of event here..." style="width: 100%;resize: none;height: 150px;"  value="<?php  if(isset($eventDescription)){echo $eventDescription; } ?>"></textarea>
                </div>
							
																
							 <?php if (isset($errors['eventDescription']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Event Description cannot be left empty</i></p>
			            </div>
     					   <?php endif; ?>													
																		
										
						<div class="row signed">
							<div class="col-sm-offset-3 col-sm-6">
								<button class="btn btn-primary btn-lg btn-block" value="Add Event" id="submit" type="submit" name="addEvent">Add Event</button>
							</div>

						</div>

				 <?php if (isset($msg))  : ?>

			            <div class="form-group alert alert-success">
			                <p><i>Event Added Successful</i></p>
			            </div>
     		   <?php endif; ?>

     		   
					</form>
				</div> <!-- /div class="panel-body" -->
			</div> <!-- /div class="panel ..." -->
		</div> <!-- /div class="col..." -->
	</div> <!-- /div class="row" -->

	<style>
		#usernameAvailable,#usernameNotAvailable{ cursor: pointer; }
	</style>


			<!-- Add footer template above here -->
			<div class="clearfix"></div>
							<div style="height: 70px;" class="hidden-print"></div>
			
		</div> <!-- /div class="container" -->
				<script src="resources/lightbox/js/lightbox.min.js"></script>
	</body>
</html>