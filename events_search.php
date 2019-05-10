<?php $pagetitle = 'Event_search';  ?>
<?php require_once 'inc/page-header2.inc.php'; ?>

<?php 
if (isset($_POST['Search'])) {
	$result = fetch_search_events($_POST);

extract($_POST);
    if ($result) {
        $msg = true;
    } else {
        $errors = $result;
    }
    }
 ?>


<div class="row">
	<div class="col-xs-12" style="margin-bottom: 20px;">
		<!-- <form method="post" name="myform" action=""> -->
		<input id="EnterAction" type="submit" style="position: absolute; left: 0px; top: -250px;" >
		<div class="page-header">
			<h1>
				<div class="row">
					<div class="col-sm-8">
						<a style="text-decoration: none; color: inherit;" >
						<img src="resources/table_icons/books.png"> Found Event(s)</a>
					</div>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
						<div class="col-sm-4">		
							<div class="input-group" id="quick-search">
								<input type="text" id="SearchString" name="SearchString"  class="form-control" placeholder="Quick Search" value="<?php if(isset($_POST['SearchString'])) {
									echo($_POST['SearchString']);
								} ?>">
								<span class="input-group-btn">
								<button name="Search"   type="submit" 
								 class="btn btn-default" title="Quick Search"><i class="glyphicon glyphicon-search"></i></button>
								<!-- <button name="ClearQuickSearch"  id="ClearQuickSearch" type="submit" onclick="ClearQuickSearch('SearchString')" 
								 class="btn btn-default" title="Clear Search box"><i class="glyphicon glyphicon-remove-circle"></i></button> -->
								</span>
							</div>
					</div>

					</form>
		</div>
	</h1>
</div>


	
	</div>
	
	</div>

<div class="row">
	<div class="table_view col-xs-12 ">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="students-name" ><a href="" class="TableHeader"><h2>Events</h2></a></th>
					</tr>
				</thead>

<tbody>
	<?php if (isset($msg)){ ?>

	<?php $all_users = fetch_search_events($_POST);
		 ?>

		<?php if ( count($all_users) != count($all_users, COUNT_RECURSIVE)){
		$suffix = 0;
		?>
			<?php foreach ($all_users as $users) { 
				$suffix += 1;
				?>
			<tr>
				<td  class="students-name" style="padding-top: 50px; padding-left: 20px; padding-bottom: 50px; padding-right: 20px;">

					

				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
					<?php if ($role == "Admin") : ?>
					 <button  type="submit" name="approve_event<?php echo "$suffix";  ?>"  value="1" class="btn btn-default event_btn"><i class="glyphicon "></i>Approve Event</button>
					<button  type="submit" name="disapprove_event<?php echo "$suffix";  ?>"  value="1" class="btn btn-default event_btn"><i class="glyphicon "></i>Dispprove Event</button>
					<button  type="submit" name="delete_event<?php echo "$suffix";  ?>"  value="1" class="btn btn-default event_btn"><i class="glyphicon "></i>delete Event</button>
					<?php endif; ?>

				</form>
				 <h1><a href=""><?php echo ucwords($users['event_title']); ?></a></h1>
					<p>Event Description : <?php echo ucfirst($users['event_description']); ?></p>
					<p>Event location : <?php echo ucwords($users['event_location']); ?></p>
					<p>Event Date : <?php echo ($users['event_date']); ?></p>
					<p>Event Start Time : <?php echo timeIn24hrTo12hrTime($users['event_time_start']); ?></p>
					<p>Event End Time : <?php echo timeIn24hrTo12hrTime($users['event_time_end']); ?></p>
					<?php $_SESSION['event_id'] = $users['event_id']; ?>
					<a href='attendance.php?event_id=<?php echo $users['event_id']; ?>&event_lat=<?php echo $users['event_latitude']; ?>&event_long=<?php echo $users['event_longitude']; ?>'><button  type="submit" name="delete_event<?php echo "$suffix";  ?>"  value="1" class="btn btn-default event_btn"><i class="glyphicon "></i>Take attendance for this event</button></a>
			</td>
			
			</tr>

		
			<?php  
			  $approve_index = "approve_event"."$suffix";
			  $disapprove_index = "disapprove_event"."$suffix";
			  $delete_index = "delete_event"."$suffix";
			// echo($post_index);
			?>
		<?php if (isset($_POST["$approve_index"])) {
						$result = update_table('events', 'event_status', '1', $users['event_id'] );
						if ($result) {
							echo "<script>alert('approval successfully')</script>";
						}else{
							echo "<script>alert('events already approved')</script>";
						}
					} ?>

					<?php if (isset($_POST["$disapprove_index"])) {
						$result = update_table('events', 'event_status', '0', $users['event_id'] );
						if ($result) {
							echo "<script>alert('disapproval successfully')</script>";
						}else{
							echo "<script>alert('events already disapproved')</script>";
						}
					} ?>
					


					<?php if (isset($_POST["$delete_index"])) {
						$result = delete_table('events', $users['event_id'] );
						if ($result) {
							echo "<script>alert('delete successfully')</script>";
						}else{
							echo "<script>alert('delete not successfully')</script>";
						}
					} ?>
					<?php	} ?>
		<?php }else{ ?>

					
			<tr>
				<td  class="students-name" style="padding-top: 50px; padding-left: 20px; padding-bottom: 50px; padding-right: 20px;">

					

				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
					<?php if ($role == "Admin") : ?>
					 <button  type="submit" name="approve_event"  value="1" class="btn btn-default event_btn"><i class="glyphicon "></i>Approve Event</button>
					<button  type="submit" name="disapprove_event"  value="1" class="btn btn-default event_btn"><i class="glyphicon "></i>Dispprove Event</button>
					<button  type="submit" name="delete_event"  value="1" class="btn btn-default event_btn"><i class="glyphicon "></i>delete Event</button>
					<?php endif; ?>

				</form>
				 <h1><a href=""><?php echo ucwords($all_users['event_title']); ?></a></h1>
					<p>Event Description : <?php echo ucfirst($all_users['event_description']); ?></p>
					<p>Event location : <?php echo ucwords($all_users['event_location']); ?></p>
					<p>Event Date : <?php echo ($all_users['event_date']); ?></p>
					<p>Event Start Time : <?php echo timeIn24hrTo12hrTime($all_users['event_time_start']); ?></p>
					<p>Event End Time : <?php echo timeIn24hrTo12hrTime($all_users['event_time_end']); ?></p>
					<?php $_SESSION['event_id'] = $all_users['event_id']; ?>
					<a href='attendance.php'><button  type="submit" name="attrnded_event"  value="1" class="btn btn-default event_btn"><i class="glyphicon "></i>Take attendance for this event</button></a>
			</td>
			
			</tr>

		
			<?php  
			
			?>
		<?php if (isset($_POST["approve_event"])) {
						$result = update_table('events', 'event_status', '1', $users['event_id'] );
						if ($result) {
							echo "<script>alert('approval successfully')</script>";
						}else{
							echo "<script>alert('events already approved')</script>";
						}
					} ?>

					<?php if (isset($_POST["disapprove_event"])) {
						$result = update_table('events', 'event_status', '0', $users['event_id'] );
						if ($result) {
							echo "<script>alert('disapproval successfully')</script>";
						}else{
							echo "<script>alert('events already disapproved')</script>";
						}
					} ?>
					


					<?php if (isset($_POST["delete_event"])) {
						$result = delete_table('events', $users['event_id'] );
						if ($result) {
							echo "<script>alert('delete successfully')</script>";
						}else{
							echo "<script>alert('delete not successfully')</script>";
						}
					} ?>


		<?php } ?>


<!-- end of count -->
<?php } else{ ?>
	<tr>
		<td>
			<h4 style="color: maroon;">No result found</h4>
		</td>
	</tr>
<?php }?> 
<!-- end if $msg -->
		
         </tbody>
	</table>
</div>
<div class="row pagination-section">
	<!-- <div class="col-xs-4 col-md-3 col-lg-2 vspacer-lg">
		<button  type="submit" name="Previous_x" id="Previous" value="1" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i> <span class="hidden-xs">Previous</span></button>
	</div>
	<div class="col-xs-4 col-md-4 col-lg-2 col-md-offset-1 col-lg-offset-3 text-center vspacer-lg"></div>
	<div class="col-xs-4 col-md-3 col-lg-2 col-md-offset-1 col-lg-offset-3 text-right vspacer-lg">
		<button  type="submit" name="Next_x" id="Next" value="1" class="btn btn-default btn-block"><span class="hidden-xs">Next</span> <i class="glyphicon glyphicon-chevron-right"></i></button>
	</div> -->
</div>
</div>
</div></form></div><div class="col-xs-1 md-hidden lg-hidden"></div></div>
			<div class="clearfix"></div>
							<div style="height: 70px;" class="hidden-print"></div>
			
		</div> <!-- /div class="container" -->
				<script src="resources/lightbox/js/lightbox.min.js"></script>

				  <script>
                                            $(document).ready(function () {
                                                $('#submit').click(function (e) {
                                                    e.preventDefault();
                                                    if ($('#message').val() != "") {
                                                        $.ajax({
                                                            // alert($('#contact_form'))
                                                            type : 'post',
                                                            url :  'proccess-comment.php',
                                                            data : $('#contact_form').serialize(),
                                                            success : function (data) {
                                                                notifyWithToast('success', data);
                                                            }
                                                            
                                                        })
                                                    }else{
                                                         notifyWithToast('error', 'Comment cannot be empty!');
                                                    }
                                                })
                                            })


                                            function notifyWithToast(type, message) {
                                                const Toast = Swal.mixin({
                                                    toast: true,
                                                    position: 'bottom-start',
                                                    showConfirmButton: false,
                                                    timer: 5000
                                                });

                                                Toast.fire({
                                                    type: type,
                                                    title: message
                                                })
                                            }
                            </script> 


	</body>
</html>