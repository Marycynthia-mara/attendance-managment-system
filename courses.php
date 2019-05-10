<?php $pagetitle = 'All Courses';  ?>
<?php require_once 'inc/page-header2.inc.php'; ?>


<?php if (isset($_POST['delete_rows'])) {
	if (!empty($_POST['course_delete'])) {
		$stringsOfIds = implode(',', $_POST['course_delete']);
		// echo($stringsOfIds);
		$sql = "DELETE FROM course WHERE course_id IN ($stringsOfIds)";
		$result = execute_iud($sql);

		if ($result) {
			echo "<script>alert('Delete Successful')</script>";
		}
	}
	// $row = $_POST['course_delete'];
	// while (list ($key, $val) = @each($row)) {
		// $sql = "DELETE FROM course WHERE course_id IN ($stringsOfIds)";
		// $result = execute_iud($sql);
	// 	echo $key, $val;
	// }
} ?>


<div class="row" style="margin: 10px;">
	<div class="col-xs-12" style="margin-bottom: 20px;">

		<!-- <form method="post" name="myform" action="students_view.php"> -->
		<input id="EnterAction" type="submit" style="position: absolute; left: 0px; top: -250px;" >
		<div class="page-header">
			<h1>
				<div class="row">
					<div class="col-sm-8">
						<a style="text-decoration: none; color: inherit;" href="">
						<img src="resources/table_icons/attributes_display.png"> All Courses</a>
					</div>


					<form method="post" action="course_search.php">
						<div class="col-sm-4">		
							<div class="input-group" >
								<input type="text"  name="SearchString" value="<?php if(isset($_POST['SearchString'])) {
									echo($_POST['SearchString']);
								} ?>" class="form-control" placeholder="Quick Search">
								<span class="input-group-btn">
								<button name="Search"  type="submit" class="btn btn-default" title="Quick Search"><i class="glyphicon glyphicon-search"></i></button>
							<!-- 	<button name="ClearQuickSearch"  class="btn btn-default" title="Clear Search box"><i class="glyphicon glyphicon-remove-circle"></i></button> -->
								</span>
							</div>
					</div>
					</form>
					
		</div>
	</h1>
</div>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<div id="top_buttons" class="hidden-print">
	
	
	</div>
	
	</div>

<div class="row">
	<div class="table_view col-xs-12 ">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>

						<th class="students-name" ><h3><a href="" class="TableHeader">Courses</a></h3></th>

					</tr>
				</thead>

<tbody>
		<?php 	
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		}else{
			$page = 1;
		}	

		$num_of_page = 5;
		$start_page = ($page - 1) * $num_of_page;
			$all_users = fetch_limited_user('course_name', 'course', $start_page, $num_of_page);
			 ?>
	
		<?php if (count($all_users) != count($all_users, COUNT_RECURSIVE)){ ?>
			<?php foreach ($all_users as $users) { ?>
			<tr>
				<td id="" class="students-name"><input style="height: 15px; margin: 0;" type="checkbox" name="course_delete[]" value="<?php echo $users['course_id']?>"><p style="display: inline-block; padding:0px 0 0 20px;"><?php echo $users['course_name']?></p></td>
			</tr>
		<?php	} ?>
		<?php }elseif(count($all_users) == count($all_users, COUNT_RECURSIVE)){ ?>

			<tr>
				<td id="" class="students-name"><input style="height: 15px; margin: 0;" type="checkbox" name="course_delete[]" value="<?php echo $all_users['course_id']?>"><p style="display: inline-block; padding:0px 0 0 20px;"><?php echo $all_users['course_name']?></p></td>
			</tr>

		<?php } else{ ?>

			<tr>
				<td id="" class="students-name"><p style="display: inline-block; padding:0px 0 0 20px;">No Result found</p></td>
			</tr>

		<?php } ?>
	

</tbody>
	<!-- <tfoot><tr><td colspan=4>Records 1 to 5 of 5</td></tr> -->

	</tfoot>
</table>
</div>

<div class="">
		<button  type="submit" name="delete_rows" id=""  class="btn btn-default"><i class="glyphicon glyphicon-remove-circle"></i> Delete selected row(s)</button>
	</div>

<div class="row pagination-section" style="margin-top: 20px;">

	<?php
			$total_record = get_total( 'course', 'course_name');
			$total_page = ceil($total_record/$num_of_page);


			if ($page > 1) {
				echo "<a href='courses.php?page=".($page - 1)."' class='btn btn-primary'>Previous</a>";
			}


			for ($i=1; $i < $total_page; $i++) { 
				echo "<a href='courses.php?page=".$i."' class='btn btn-primary'>$i</a>";
			}


			if ($i > $page ) {
				echo "<a href='courses.php?page=".($page + 1)."' class='btn btn-primary'>Next</a>";
			}
			 ?>

	<!-- <div class="col-xs-4 col-md-3 col-lg-2 vspacer-lg">
		<button  type="submit" name="Previous_x" id="Previous" value="1" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i> <span class="hidden-xs">Previous</span></button>
	</div>
	<div class="col-xs-4 col-md-4 col-lg-2 col-md-offset-1 col-lg-offset-3 text-center vspacer-lg"></div>
	<div class="col-xs-4 col-md-3 col-lg-2 col-md-offset-1 col-lg-offset-3 text-right vspacer-lg">
		<button  type="submit" name="Next_x" id="Next" value="1" class="btn btn-default btn-block"><span class="hidden-xs">Next</span> <i class="glyphicon glyphicon-chevron-right"></i></button> -->
	</div>
</form>
</div>
</div>
</div></form></div><div class="col-xs-1 md-hidden lg-hidden"></div></div>
			<div class="clearfix"></div>
							<div style="height: 70px;" class="hidden-print"></div>
			
		</div> <!-- /div class="container" -->
				<script src="resources/lightbox/js/lightbox.min.js"></script>
	</body>
</html>