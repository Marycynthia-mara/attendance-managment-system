<?php $pagetitle = 'All Groups';  ?>
<?php require_once 'inc/page-header2.inc.php'; ?>

<?php if (isset($_POST['delete_rows'])) {
	if (!empty($_POST['course_delete'])) {
		$stringsOfIds = implode(',', $_POST['course_delete']);
		$sql = "DELETE FROM users_group WHERE group_id IN ($stringsOfIds)";
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
						<img src="resources/table_icons/group.png"> All Groups</a>
					</div>


					<form method="post" action="group_search.php">
						<div class="col-sm-4">		
							<div class="input-group" >
								<input type="text"  name="SearchString" value="<?php if(isset($_POST['SearchString'])) {
									echo($_POST['SearchString']);
								} ?>" class="form-control" placeholder="Quick Search">
								<span class="input-group-btn">
								<button name="Search"  type="submit" class="btn btn-default" title="Quick Search"><i class="glyphicon glyphicon-search"></i></button>
								<!-- <button name="ClearQuickSearch"  class="btn btn-default" title="Clear Search box"><i class="glyphicon glyphicon-remove-circle"></i></button> -->
								</span>
							</div>
					</div>
					</form>
					
		</div>
	</h1>
</div>


<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

	</div>

<div class="row">
	<div class="table_view col-xs-12 ">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>

						<th class="students-name" ><h3><a href="" class="TableHeader">Groups</a></h3></th>

					</tr>
				</thead>

<tbody>
	
	
		

		<?php $all_users = fetch_all_user('group_name', 'users_group'); ?>
		<?php if (count($all_users) != count($all_users, COUNT_RECURSIVE)){ ?>
			<?php foreach ($all_users as $users) { ?>
			<tr>
				<td id="" class="students-name"><input style="height: 15px; margin: 0;" type="checkbox" name="course_delete[]" value="<?php echo $users['group_id']?>"><a href="" style="display: inline-block; padding:0px 0 0 20px;"><?php echo $users['group_name']?></a></td>
			</tr>
		<?php	} ?>
		<?php }elseif(count($all_users) == count($all_users, COUNT_RECURSIVE)){ ?>

			<tr>
				<td id="" class="students-name"><input style="height: 15px; margin: 0;" type="checkbox" name="course_delete[]" value="<?php echo $all_users['group_id']?>"><p style="display: inline-block; padding:0px 0 0 20px;"><?php echo $all_users['group_name']?></p></td>
			</tr>

		<?php } else{ ?>

			<tr>
				<td id="" class="students-name"><p style="display: inline-block; padding:0px 0 0 20px;">No Result found</p></td>
			</tr>

		<?php } ?>
		

</tbody>
	</table>
	</div>

	<div class="">
		<button  type="submit" name="delete_rows" id=""  class="btn btn-default"><i class="glyphicon glyphicon-remove-circle"></i> Delete selected row(s)</button>
	</div>

<div class="row pagination-section">
	
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