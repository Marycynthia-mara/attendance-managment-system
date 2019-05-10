<?php $pagetitle = 'All Users';  ?>
<?php require_once 'inc/page-header2.inc.php'; ?>




<div class="row" style="margin: 10px;">
	<div class="col-xs-12" style="margin-bottom: 20px;">

		<!-- <form method="post" name="myform" action="students_view.php"> -->
		<input id="EnterAction" type="submit" style="position: absolute; left: 0px; top: -250px;" >
		<div class="page-header">
			<h1>
				<div class="row">
					<div class="col-sm-8">
						<a style="text-decoration: none; color: inherit;" href="">
						<img src="resources/table_icons/group.png"> All users</a>
					</div>


					<form method="post" action="all_users_search.php">
						<div class="col-sm-4">		
							<div class="input-group" >
								<input type="text"  name="SearchString"  class="form-control" placeholder="Quick Search" value="<?php if(isset($_POST['SearchString'])) {
									echo($_POST['SearchString']);
								} ?>">
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

<div id="top_buttons" class="hidden-print">
	

	
	</div>

	</div>

	
	<div class="online-users" style="padding:10px 20px;">
			<p>50 online users</p>
	</div>


<div class="row">
	<div class="table_view col-xs-12 ">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>

						<th class="students-name" ><h3><a href="" class="TableHeader">Users</a></h3></th>

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
			$all_users = fetch_limited_user('username', 'users', $start_page, $num_of_page);
			 ?>
	
		<?php if (count($all_users) != count($all_users, COUNT_RECURSIVE)){ ?>
			<?php foreach ($all_users as $users) { ?>
			<tr>
				<td id="" class="students-name"><a href="admin_user_view.php?user_id=<?php echo $users['user_id'] ?>" style="display: block; padding:0px;"><?php echo $users['username']?></a></td>
			</tr>
		<?php	} ?>
		<?php }else{?>
			<tr>
				<td id="" class="students-name"><a href="admin_user_view.php?user_id=<?php echo $all_users['user_id'] ?>" style="display: block; padding:0px;"><?php echo $all_users['username']?></a></td>
			</tr>

		<?php } ?>
		

		

</tbody>
	</table></div>
<div class="row pagination-section">
<?php
			$total_record = get_total( 'users', 'username');
			$total_page = ceil($total_record/$num_of_page);


			if ($page > 1) {
				echo "<a href='all_users.php?page=".($page - 1)."' class='btn btn-primary'>Previous</a>";
			}


			for ($i=1; $i < $total_page; $i++) { 
				echo "<a href='all_users.php?page=".$i."' class='btn btn-primary'>$i</a>";
			}


			if ($i > $page ) {
				echo "<a href='all_users.php?page=".($page + 1)."' class='btn btn-primary'>Next</a>";
			}
			 ?>
	<!-- <form method="post" action="<?php 	echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">	
	<div class="col-xs-4 col-md-3 col-lg-2 vspacer-lg">
		<button  type="submit" name="Previous" id="Previous" value="1" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i> <span class="hidden-xs">Previous</span></button>
	</div>
</form> -->


	<div class="col-xs-4 col-md-4 col-lg-2 col-md-offset-1 col-lg-offset-3 text-center vspacer-lg"></div>

	<!-- <form method="post" action="<?php 	echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">	
	<div class="col-xs-4 col-md-3 col-lg-2 col-md-offset-1 col-lg-offset-3 text-right vspacer-lg">
		<button  type="submit" name="Next" id="Next" value="1" class="btn btn-default btn-block"><span class="hidden-xs">Next</span> <i class="glyphicon glyphicon-chevron-right"></i></button>
	</div>
</form> -->
	

</div>
</div>
</div></form></div><div class="col-xs-1 md-hidden lg-hidden"></div></div>
			<div class="clearfix"></div>
							<div style="height: 70px;" class="hidden-print"></div>
			
		</div> <!-- /div class="container" -->
				<script src="resources/lightbox/js/lightbox.min.js"></script>
	</body>
</html>