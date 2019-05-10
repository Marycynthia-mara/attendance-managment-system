<?php $pagetitle = 'Attendance';  ?>
<?php require_once 'inc/page-header2.inc.php'; ?>

<?php

$eventid = $_GET['event_id'];
$event_lat = $_GET['event_lat'];
$event_long = $_GET['event_long'];
$user_id = $_SESSION['users_id'];
 $all_users = get_single_event('*', 'events', $eventid, $event_lat, $event_long); 

if (isset($_POST['take_attendance'])) {
	if (isset($_POST['attendance'])) {
		if ($_POST['attendance'] == 'present') {
			$result = take_attendance($eventid, $_POST, $event_lat, $event_long);
		}else {
			
			

		if (isset($_POST['take_attendance']) && isset($_POST['attendance'])) {
	// echo "<script>alert('Check either present or absent')</script>";
			$result = take_attendance($eventid, $_POST, $event_lat, $event_long);
		}

		
		}
	}
}

if(isset($_POST['add_excuse_finish'])) {
	if (isset($_POST['attendance'])) {
		if ($_POST['attendance'] == 'absent') {
			$attendance_excuse_form = "show";
		}
			
	}
}

if(isset($_POST['add_excuse_finish'])) {
	if (isset($_POST['attendance'])) {
		if ($_POST['attendance'] == 'present') {
			echo "<script>alert('You can only add excuse if you are absent, click finish instead if present')</script>";
		}
			
	}
}

if (isset($_POST['take_attendance']) && !isset($_POST['attendance'])) {
	echo "<script>alert('Ooops! Check either present or absent to continue')</script>";
}

if (isset($_POST['attd_excuse'])) {
			$result = add_attd_excuse($eventid, $user_id, $_POST);
		}

 ?>
<div class="row">
	<div class="page-header">
			<h1>
				<div class="row">
					<div class="col-sm-8">
						<a style="text-decoration: none; color: inherit;" href="">
						<img src="resources/table_icons/group.png"> Attendance</a>
					</div>
					
		</div>
	</h1>
</div>
</div>

<div class="row">
	<div class="table_view col-xs-12 ">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>

						<th class="students-name" ><a href="" class="TableHeader"><h2>Take Attendance Here...</h2></a></th>

					</tr>
				</thead>

<tbody>
	<tr>
		<td  class="students-name"><a href="" style="display: block; padding:30px 20px 30px 20px;"><h3>Attendance for <?php echo "$all_users[event_title]" ?></h3></a>
			<form method="post" action="attendance.php?event_id=<?php echo $eventid; ?>&event_lat=<?php echo $event_lat; ?>&event_long=<?php echo $event_long; ?> ">
				<div class="attendance_radio_cont">
				<label for="present">Present : </label>
				<input type="radio" name="attendance" id="present" value="present">
			</div>

			<div class="attendance_radio_cont">
				<label for="absent">Absent : </label>
				<input type="radio" name="attendance" id="absent" value="absent">
			</div>
			 <button  type="submit" id="take_attendance" name="take_attendance" class="btn btn-default event_btn">finish</button>
			  <button  type="submit" id="" name="add_excuse_finish" class="btn btn-default event_btn">Add Excuse and finish</button>

			 <!--  <div class="alert alert-success" style="margin-top: 20px; display: none;" id="success">New Category added Successfully!.</div>

                  <div class="alert alert-danger" style="margin-top: 20px; display: none;" id="error">Ooops, action could not complete</div> -->
			</form>
		</td>
	</tr>

</tbody>

</div>

</div>
</div>
</div>

<?php if (isset($attendance_excuse_form)) :  ?>
	<div class="row">
		<div class="hidden-xs col-sm-4 col-md-6 col-lg-8" id="signup_splash">
		</div>

		<div class="col-sm-8 col-md-6 col-lg-4">
			<div class="panel panel-success">

				<div class="panel-heading">
					<h1 class="panel-title"><strong>Add Attendance Excuse Here!</strong></h1>
				</div>

				<div class="panel-body signup_body">
					<form method="post" action="attendance.php?event_id=<?php echo $eventid; ?>&event_lat=<?php echo $event_lat; ?>&event_long=<?php echo $event_long; ?>">
						
						

				<div class="form-group">
                  <textarea name="attd_excuse_txt"  class="form-control"  placeholder="Type in attendance Excuse  here..." style="width: 100%;resize: none;height: 150px;"  value="<?php  if(isset($attd_excuse_txt)){echo $attd_excuse_txt; } ?>"></textarea>
                </div>


						 <?php if (isset($errors['attd_excuse_txt']))  : ?>

			            <div class="form-group alert alert-danger">
			                <p><i>Fill in the attendance excuse form</i></p>
			            </div>
     					   <?php endif; ?>												
										
						<div class="row signed">
							<div class="col-sm-offset-3 col-sm-6">
								<button class="btn btn-primary btn-lg btn-block" value="Add Excuse" id="submit" type="submit" name="attd_excuse">Add Excuse</button>
							</div>

						</div>

				 <?php if (isset($msg))  : ?>

			            <div class="form-group alert alert-success">
			                <p><i>Attendance Excuse Added Successful</i></p>
			            </div>
     		   <?php endif; ?>

     		   
					</form>
				</div> <!-- /div class="panel-body"
			</div> <!-- /div class="panel ..." -->
		</div> <!-- /div class="col..." -->
	</div>
<?php endif; ?>

			
		</div> <!-- /div class="container" -->
				<script src="resources/lightbox/js/lightbox.min.js"></script>

		<!-- <script>
           $(document).ready(function () {
            $('#take_attendance').on('click', function (e) {
              e.preventDefault();
              $('#error').css('display', 'none');
              $('#success').css('display', 'none');
              let cat = $('#absent').val();
             if (cat != "") {
              $.ajax({
                type : 'post',
                url : 'proccess.php',
                data : 'category='+cat,
                success : function (data) {
                  //alert(data)
                  $('#txtCat').val("");
                 if (data === '1') {
                   $('#success').html('New category added successfully');
                  $('#success').css('display', 'block');
                }else if(data === '2'){
                   $('#error').html('Ooops!, something went wrong');
                  $('#error').css('display', 'block');
                }else if (data === '3'){
                   $('#error').html('category already exist! pick another category');
                  $('#error').css('display', 'block');
                } else {
                  $('#error').html("Something isn't right!");
                  $('#error').css('display', 'block');
                }
                }
              })
             }else{
              alert('No');
             }
            })
             
           })
       </script> -->

	</body>
</html>