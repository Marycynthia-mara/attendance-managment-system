<?php 
require_once 'config.inc.php';
function check_duplicate_data($table, $column, $input)
{
	$sql = "SELECT $column FROM $table WHERE $column = '$input'";
	$result = execute_select($sql);
	if ($result) {
		// echo "duplicate email found <br>";
		return true;
	}else{
		// echo "duplicate email not found <br>";
		return false;
	}
}


function redirect_to($url)
{
	$url = urlencode($url);
	header("Location: $url");
	exit();
}

function usersRole($role)
{
	if ($role == 1) {
		return "Admin";
	}return "User";
}

function timeIn24hrTo12hrTime($time)
{
$time = date('h:i:s', strtotime($time));
if (date('h', strtotime($time) )< 12) {
	$meridian = 'AM';
}else{
	$meridian = 'PM';
}$time = "$time  $meridian";
return $time;
}

function validateLatitude($lat)
{
	if (true) {
		// preg_match('/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1-6})?))$/', $lat)
		return true;
	}return false;
}

function validateLongitude($long)
{
	if (true) {
		// preg_match('/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1-6})?))$/', $long)
		return true;
	}return false;
}

function update_table($table, $column, $value, $event_id)
{
	$sql = "UPDATE $table SET $column = $value WHERE event_id = $event_id";
	$result = execute_iud($sql);
	if ($result > 0) {
		return true;
	}else{
		return false;
	}
}


function delete_table($table, $event_id)
{

	$sql = "DELETE  FROM $table  WHERE event_id = $event_id";
	$result = execute_iud($sql);
	if ($result > 0) {
		return true;
	}else{
		return false;
	}
}


function get_total($table, $column)
{
		$sql = "SELECT $column FROM $table";
	$results = execute_select($sql);
	$counter = 0;
	if ($results) {
		foreach ($results as $result) {
			$counter += 1;
		}return $counter;
	}else{
		echo "no";
		return false;
	}
}

function get_total_events($table, $column, $role)
{
	if ($role === "Admin") {
		$sql = "SELECT $column FROM $table";
	}else{
		$sql = "SELECT $column FROM $table WHERE event_status = '1'";
	}
	$results = execute_select($sql);
	$counter = 0;
	if ($results) {
		foreach ($results as $result) {
			$counter += 1;
		}return $counter;
	}else{
		echo "no";
		return false;
	}
}


function get_image_path($file)
{
	$err_flag = false;
	extract($file);
	if ($size > 1022976) {
		$err_flag = true;
		$errors['large_img_size'] = true;
		return false;
	}

	$allowed_extensions = ['png', 'jpg', 'jpeg', 'svg', 'gif'];
	$split = explode('/', $type);
	$endofarray = end($split);
	$image_ext = strtolower($endofarray);

	// in_array(needle, haystack)
	if (!in_array($image_ext, $allowed_extensions)) {
	$err_flag = true;
	$errors['unsupported_file_format'] = true;
	return false;		
	}

	$file_destn = 'uploads/';
	$image_name = $file_destn. 'attendanceMgtSyst_' .sha1(uniqid()).'.'.$image_ext;

		// move_uploaded_file(filename, destination)
	if (move_uploaded_file($tmp_name, $image_name)) {
		return $image_name;
	}return false;
}


function fetch_table_rows($table)
{
	
	$sql = "SELECT * FROM $table";
	$result = execute_select($sql);

	if ($result) {
		return $result;
	}else{
		return false;
}
}


function check_user_location($event_lat, $event_long)
{
	return 1;
}

// function delete_rows()
// {
// 	$sql = ""
// }
?>