<?php require_once 'config.inc.php'; ?>
<?php 
function update_profile($post, $user_id)
{
	$err_flag = false;
	$errors = [];
	// $user_id = $post['user_id'];
	extract($post);

if (!empty($update_email)) {
	$email_tmp = sanitize_email($update_email);
	if ($email_tmp) {
		if (!check_duplicate_data('users', 'email', $email_tmp)) {
			$email = $email_tmp;
		}else{
			$err_flag = true;
			$errors['dublicate_email'] = true;
		}
	}else{
	$err_flag = true;
	$errors['invalid_email'] = true;
}
}else{
	$err_flag = true;
	$errors['email'] = true;
}


if (!empty($custom1)) {
	$fullname = sanitize($custom1);
}else{
	$err_flag = true;
	$errors['custom1'] = true;
}

if (!empty($custom4)) {
	$course_name = sanitize($custom4);
}else{
	$err_flag = true;
	$errors['custom4'] = true;
}

if (!empty($custom2)) {
	$reg_no = sanitize($custom2);
}else{
	$err_flag = true;
	$errors['custom2'] = true;
}

if (!empty($custom3)) {
	$username = sanitize($custom3);
}else{
	$err_flag = true;
	$errors['custom3'] = true;
}

if (!empty($custom5)) {
	$group_name = sanitize($custom5);
}else{
	$err_flag = true;
	$errors['custom5'] = true;
}


if ($err_flag === false) {
	$sql = "UPDATE users SET username='$username', email='$email', fullname='$fullname', reg_no='$reg_no', course_name='$course_name', group_name='$group_name' WHERE user_id = $user_id";

	$result = execute_iud($sql);
	if ($result) {
		return true;
	}else{
		$errors['DB'] = true;
	}
}else{
	return $errors;
}
}


function update_password($post)
{

$err_flag = false;
	$errors = [];
	extract($post);

	if (!empty($old_password)) {
	$Oldpassword_tmp = sanitize($old_password);
	$Oldpassword_tmp = sha1($Oldpassword_tmp);
	if ($Oldpassword_tmp == $current_password) {
		$Oldpassword = $Oldpassword_tmp;
	}else{
		$err_flag = true;
		$errors['Oldpassword'] = true;
	}
}else{
	$err_flag = true;
	$errors['old_password'] = true;
}



if (!empty($new_password)) {
	$password1 = sanitize($new_password);
}else{
	$err_flag = true;
	$errors['new_password'] = true;
}

if (!empty($confirm_new_password)) {
	$Password2 = sanitize($confirm_new_password);
}else{
	$err_flag = true;
	$errors['confirm_new_password'] = true;
}

if (isset($password1) and isset($Password2)) {
	if ($password1 == $Password2) {
		$password = sha1($password1);
	}else{
	$err_flag = true;
	$errors['password_mismatch'] = true;
}
}

if ($err_flag === false) {
	$sql = "UPDATE users SET password='$password' WHERE user_id = $user_id";

	$result = execute_iud($sql);
	if ($result) {
		return true;
	}else{
		echo"<script>alert('You are changing  to your current password')</script>";
		$errors['DB'] = true;
	}
}else{
	return $errors;
}

}
 ?>