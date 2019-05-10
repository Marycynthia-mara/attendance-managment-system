<?php 
session_start();
require_once 'config.inc.php';
function add_user($post)
{

	$err_flag = false;
	$errors = [];

	extract($post);

if (!empty($newUsername)) {
	$newUsername = sanitize($newUsername);
}else{
	$err_flag = true;
	$errors['newUsername'] = true;
}

if (!empty($password)) {
	$password1 = sanitize($password);
}else{
	$err_flag = true;
	$errors['password'] = true;
}

if (!empty($confirmPassword)) {
	$Password2 = sanitize($confirmPassword);
}else{
	$err_flag = true;
	$errors['confirmPassword'] = true;
}

if (isset($password1) and isset($Password2)) {
	if ($password1 == $Password2) {
		$password = sha1($password1);
	}else{
	$err_flag = true;
	$errors['password_mismatch'] = true;
}
}

if (!empty($email)) {
	$email_tmp = sanitize_email($email);
	if ($email_tmp) {
		if (!check_duplicate_data('users', 'email', $email_tmp)) {
			$email = $email_tmp;
		}else{
			$err_flag = true;
			$errors['dublicate_email'] = true;
		}
	}else{
	$err_flag = true;
	$errors['email'] = true;
}
}else{
	$err_flag = true;
	$errors['email'] = true;
}


if (!empty($fullname)) {
	$fullname = sanitize($fullname);
}else{
	$err_flag = true;
	$errors['fullname'] = true;
}

if (!empty($group_name)) {
	$group_name = sanitize($group_name);
}else{
	$err_flag = true;
	$errors['group_name'] = true;
}

if (!empty($course_name)) {
	$course_name = sanitize($course_name);
}else{
	$err_flag = true;
	$errors['course_name'] = true;
}

if (!empty($reg_no)) {
	$reg_no = sanitize($reg_no);
}else{
	$err_flag = true;
	$errors['reg_no'] = true;
}


if ($err_flag === false) {
	$sql = "INSERT INTO users (username, password, email, fullname, reg_no, group_name, course_name) VALUES ('$newUsername', '$password', '$email', '$fullname', '$reg_no',' $group_name', '$course_name')";

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

function login_user($post)
{
	$err_flag = false;
	$errors = [];

	extract($post);

	if (!empty($password)) {
		$password = sha1(sanitize($password));
	}else{
		$err_flag = true;
		$errors['password']= "Enter Password";
	}

	if (!empty($username)) {
		$username = sanitize($username);
	}else{
		$err_flag = true;
		$errors['username']= "Enter username";
	}

	if ($err_flag === false) {
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

		$result = execute_select($sql);
		if ($result) {
			$_SESSION['users_id'] = $result['user_id'];
			return true;
		}else{
			$errors['login'] = "Invalid Login details";
			echo "<script>alert('Invalid Login details');</script>";
		}
	}else{
		return $errors;
	}
}


function fetch_user($userid)
{
	$sql = "SELECT * FROM users WHERE user_id = '$userid'";
	$result = execute_select($sql);

	if ($result) {
		return $result;
	}else{
		return false;
	}
}

// function fetch_all_user($column, $table, $offset, $limit)
function fetch_all_user($column, $table)
{

	$sql = "SELECT * FROM $table ORDER BY $column ";
	// $sql = "SELECT * FROM $table ORDER BY $column ASC limit $limit OFFSET $offset";
	$result = execute_select($sql);

	if ($result) {
		return $result;
	}else{
		return false;
	}
}

function fetch_limited_user($column, $table, $limit, $offset)
{

	// $sql = "SELECT * FROM $table ORDER BY $column ";
	$sql = "SELECT * FROM $table ORDER BY $column ASC limit $limit, $offset";
	$result = execute_select($sql);

	if ($result) {
		return $result;
	}else{
		return false;
	}
}



function find_search_result($post, $table, $column)
{
	extract($post);
	$sql = "SELECT *  FROM $table WHERE $column LIKE '%$SearchString%'";
	$result = execute_select($sql);

	if ($result) {
		return $result;
	}else{
		return false;
	}
}

function fetch_search_events($post)
{
	extract($post);
	$sql = "SELECT *  FROM events WHERE event_id LIKE '$SearchString' or event_title LIKE '%$SearchString%' or event_location LIKE '%$SearchString%' or event_latitude LIKE '%$SearchString%' or event_longitude LIKE '%$SearchString%' or event_description LIKE '%$SearchString%'";
	$result = execute_select($sql);

	if ($result) {
		return $result;
	}else{
		return false;
	}
}


function upload_profile_image($file, $post)
{
	$err_flag = false;
	$user_id = $_SESSION['users_id'];
	$result = get_image_path($file);
	if ($result) {
		$image_path = $result;
	}else{
		echo "err_flag set to true";
		$err_flag = true;
	}

	if ($err_flag === false) {
		$sql = "UPDATE users SET profile_image_path = '$image_path' WHERE user_id = '$user_id'";

		if (execute_iud($sql)) {
			return true;
		}return false;
	}
}


 ?>