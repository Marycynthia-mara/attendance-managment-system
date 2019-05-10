<?php $pagetitle = 'Group Search';  ?>
<?php require_once 'inc/page-header2.inc.php'; ?>



<?php 
if (isset($_POST['Search'])) {
	$result = find_search_result($_POST,  'users_group', 'group_name');

extract($_POST);
    if ($result) {
        $msg = true;
    } else {
        $errors = $result;
    }
    }
 ?>


<div class="row" style="margin: 10px;">
	<div class="col-xs-12" style="margin-bottom: 20px;">
	<!-- <form method="post" name="myform" action="students_view.php"> -->
		<input id="EnterAction" type="submit" style="position: absolute; left: 0px; top: -250px;" >
		<div class="page-header">
			<h1>
				<div class="row">
					<div class="col-sm-8">
						<a style="text-decoration: none; color: inherit;">
						<img src="resources/table_icons/group.png">Found Group</a>
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
								<!-- <button name="ClearQuickSearch"  id="ClearQuickSearch" type="submit" 
								 class="btn btn-default" title="Clear Search box"><i class="glyphicon glyphicon-remove-circle"></i></button> -->
								</span>
							</div>
					</div>

					</form>
					
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

						<th class="students-name" ><h3><a href="" class="TableHeader">Group</a></h3></th>

					</tr>
				</thead>

<tbody>

	
		<?php if (isset($msg)){
			if (count($result) != count($result, COUNT_RECURSIVE)) { 
				 foreach ($result as $search_result) { ?>
			<tr>
				<td id="" class="students-name"><a href="admin_user_view.php?user_id=<?php echo $search_result['group_id'] ?>" style="display: block; padding:0px;"><?php echo $search_result['group_name']?></a></td>
			</tr>
		<?php	} }else{ ?>
				<tr>
				<td id="" class="students-name"><a href="admin_user_view.php?user_id=<?php echo $result['group_id'] ?>" style="display: block; padding:0px;"><?php echo $result['group_name']?></a></td>
			</tr>
	<?php	} }else{?>
		<tr>
				<td id="" class="students-name"><h4 style="
				color: maroon;">No result found</h4></td>
			</tr>

		<?php } ?>
		

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
	</body>
</html>