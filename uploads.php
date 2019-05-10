<?php 
require_once 'inc/config.inc.php';
if (isset($_POST['submit']) && isset($_FILES['profile_img'])) {
	$result = upload_profile_image($_FILES['profile_img'], $_POST);
	if ($result) {
		echo($result);
		redirect_to('students_profile.php');
	}else{
		redirect_to('students_profile.php');
	}
}else{
	redirect_to('students_profile.php');
}
 ?>
