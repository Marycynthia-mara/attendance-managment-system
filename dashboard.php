<?php $pageTitle = "Dashboard"; ?>
<?php require_once 'inc/page-header2.inc.php'; ?>




<style>
	.panel-body-description{
		margin-top: 10px;
		height: 100px;
		overflow: auto;
	}
	.panel-body .btn img{
		margin: 0 10px;
		max-height: 32px;
	}
</style>


				
					<div class="row table_links">
						<?php if ($role == "Admin") : ?>
						<div id="students-tile" class="col-sm-12 col-md-8 col-lg-6">
							<div class="panel panel-warning">
								<div class="panel-body">
									
										<div class="btn-group" style="width: 100%;">
										   <a style="width: 85%;" class="btn btn-lg btn-warning" title="" href="all_users.php"><img src="resources/table_icons/group.png"><strong>All users</strong><span class="badge hspacer-lg text-bold"><?php echo get_total('users', 'user_id') ?></span></a>
										   <a id="students_add_new" style="width: 15%;" class="btn btn-add-new btn-lg btn-warning" title="Add New User" href="sign-up.php?"><i style="vertical-align: bottom;" class="glyphicon glyphicon-plus"></i></a>
										</div>
									
									<div class="panel-body-description"></div>
								</div>
							</div>
						</div>
						<?php endif; ?>

						<div id="units-tile" class="col-sm-6 col-md-4 col-lg-3">
							<div class="panel panel-info">
								<div class="panel-body">
									
										<div class="btn-group" style="width: 100%;">
										   <a style="width: 85%;" class="btn btn-lg btn-info" title="" href="events.php"><img src="resources/table_icons/books.png"><strong>Events</strong><span class="badge hspacer-lg text-bold"><?php echo get_total_events('events', 'event_id', $role) ?></span></a>
										   <?php if ($role == "Admin") : ?>
										   <a id="units_add_new" style="width: 15%;" class="btn btn-add-new btn-lg btn-info" title="Add New Event" href="add-event.php"><i style="vertical-align: bottom;" class="glyphicon glyphicon-plus"></i></a>
										   <?php endif; ?>
										</div>
									
									<div class="panel-body-description"></div>
								</div>
							</div>
						</div>
										

						<?php if ($role == "Admin") : ?>														
						<div id="courses-tile" class="col-sm-6 col-md-4 col-lg-3">
							<div class="panel panel-info">
								<div class="panel-body">
									
										<div class="btn-group" style="width: 100%;">
										   <a style="width: 85%;" class="btn btn-lg btn-info" title="" href="courses.php"><img src="resources/table_icons/attributes_display.png"><strong>Courses</strong><span class="badge hspacer-lg text-bold"><?php echo get_total('course', 'course_id') ?></span></a>
										   <a id="courses_add_new" style="width: 15%;" class="btn btn-add-new btn-lg btn-info" title="Add New Course" href="add-course.php"><i style="vertical-align: bottom;" class="glyphicon glyphicon-plus"></i></a>
										</div>
									
									<div class="panel-body-description"></div>
								</div>
							</div>
						</div>
						<?php endif; ?>

						<?php if ($role == "Admin") : ?>
						<div id="courses-tile" class="col-sm-6 col-md-4 col-lg-3">
							<div class="panel panel-info">
								<div class="panel-body">
									
										<div class="btn-group" style="width: 100%;">
										   <a style="width: 85%;" class="btn btn-lg btn-info" title="" href="groups.php"><img src="resources/table_icons/group.png"><strong>Groups</strong><span class="badge hspacer-lg text-bold"><?php echo get_total('users_group', 'group_id') ?></span></a>
										   <a id="courses_add_new" style="width: 15%;" class="btn btn-add-new btn-lg btn-info" title="Add New" href="add-group.php"><i style="vertical-align: bottom;" class="glyphicon glyphicon-plus"></i></a>
										</div>
									
									<div class="panel-body-description"></div>
								</div>
							</div>
						</div>
						<?php endif; ?>
																								
						<!-- <div id="attendance-tile" class="col-sm-6 col-md-4 col-lg-3">
							<div class="panel panel-info">
								<div class="panel-body">
									
										<a class="btn btn-block btn-lg btn-info" title="" href="attendance.php"><img src="resources/table_icons/application_view_icons.png"><strong>Attendance Record</strong></a>
									
									<div class="panel-body-description"></div>
								</div>
							</div>
						</div> -->

						<div id="attendance-tile" class="col-sm-6 col-md-4 col-lg-3">
							<div class="panel panel-info">
								<div class="panel-body">
									
										<a class="btn btn-block btn-lg btn-info" title="" href="students_profile.php"><img src="resources/table_icons/application_view_icons.png"><strong>Profile</strong></a>
									
									<div class="panel-body-description"></div>
								</div>
							</div>
						</div>
									
					</div> <!-- /.table_links -->
				
					<div class="row custom_links" id="custom_links">
											</div>

											
<script>
	$j(function(){
		var table_descriptions_exist = false;
		$j('div[id$="-tile"] .panel-body-description').each(function(){
			if($j.trim($j(this).html()).length) table_descriptions_exist = true;
		});

		if(!table_descriptions_exist){
			$j('div[id$="-tile"] .panel-body-description').css({height: 'auto'});
		}

		$j('.panel-body .btn').height(32);

		$j('.btn-add-new').click(function(){
			var tn = $j(this).attr('id').replace(/_add_new$/, '');
			modal_window({
				url: tn + '_view.php?addNew_x=1&Embedded=1',
				size: 'full',
				title: $j(this).prev().text() + ": Add New" 
			});
			return false;
		});

		/* adjust arrow directions on opening/closing groups, and initially open first group */
		$j('.collapser').click(function(){
			$j(this).children('.glyphicon').toggleClass('glyphicon-chevron-right glyphicon-chevron-down');
		});

		/* hide empty table groups */
		$j('.collapser').each(function(){
			var target = $j(this).attr('href');
			if(!$j(target + " .row div").length) $j(this).hide();
		});
		$j('.collapser:visible').eq(0).click();
	});
</script>

			<!-- Add footer template above here -->
			<div class="clearfix"></div>
							<div style="height: 70px;" class="hidden-print"></div>
			
		</div> <!-- /div class="container" -->
				<script src="resources/lightbox/js/lightbox.min.js"></script>
	</body>
</html>