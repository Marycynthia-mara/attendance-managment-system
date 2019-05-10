<?php 
require_once 'inc/config.inc.php';
$user_id = $_GET['user_id'] ;
if (isset($_POST['submit']) && isset($_FILES['profile_img'])) {
	$result = upload_profile_image($_FILES['profile_img'], $_POST);
	if ($result) {
		echo($result);
		redirect_to("admin_user_view.php?user_id=$user_id");
	}else{
		redirect_to("admin_user_view.php?user_id=$user_id");
	}
}else{
	redirect_to("admin_user_view.php?user_id=$user_id");
}
 ?>
