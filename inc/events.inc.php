<?php 
require_once 'config.inc.php';

function add_event($post)
{
	$err_flag = false;
	$errors = [];

	extract($post);

	if (!empty($EventTitle)) {
		$EventTitle = sanitize($EventTitle);
	}else{
		echo "err_flag ";
		$err_flag = true;
		$errors['EventTitle']= true;
	}

	if (!empty($EventLocation)) {
		$EventLocation = sanitize($EventLocation);
	}else{
		echo "err_flag ";
		$err_flag = true;
		$errors['EventLocation']= true;
	}

	if (!empty($EventLatitude)) {
		$EventLatitude_tmp = sanitize($EventLatitude);
		if (validateLatitude($EventLatitude_tmp)) {
			$EventLatitude = $EventLatitude_tmp;
		}else{
		echo "err_flag ";
		$err_flag = true;
		$errors['EventLatitude_nomatch']= true;
	}
	}else{
		echo "err_flag ";
		$err_flag = true;
		$errors['EventLatitude']= true;
	}

	if (!empty($EventLongitude)) {
		$EventLongitude_tmp = sanitize($EventLongitude);
		if (validateLongitude($EventLongitude_tmp)) {
			$EventLongitude = $EventLongitude_tmp;
		}else{
		echo "err_flag ";
		$err_flag = true;
		$errors['EventLongitude_nomatch']= true;
	}
	}else{
		echo "err_flag ";
		$err_flag = true;
		$errors['EventLongitude']= true;
	}

	if (!empty($eventDate)) {
		$eventDate = sanitize($eventDate);
	}else{
		echo "err_flag ";
		$err_flag = true;
		$errors['eventDate']= true;
	}

	if (!empty($eventStartTime)) {
		$eventStartTime = sanitize($eventStartTime);
	}else{
		echo "err_flag ";
		$err_flag = true;
		$errors['eventStartTime']= true;
	}

	if (!empty($eventEndTime)) {
		$eventEndTime = sanitize($eventEndTime);
	}else{
		echo "err_flag ";
		$err_flag = true;
		$errors['eventEndTime']= true;
	}

	if (!empty($eventDescription)) {
		$eventDescription = sanitize($eventDescription);
	}else{
		echo "err_flag ";
		$err_flag = true;
		$errors['eventDescription']= true;
	}

	if ($err_flag === false) {
	$sql = "INSERT INTO events (event_title, event_location, event_latitude, event_longitude, event_date, event_time_start, event_time_end, event_description) VALUES ('$EventTitle', '$EventLocation', '$EventLatitude', '$EventLongitude', '$eventDate', '$eventStartTime', '$eventEndTime', '$eventDescription')";

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



function fetch_all_events($column, $table, $role, $limit, $offset)
{
	if ($role == "Admin") {
		$sql = "SELECT $column FROM $table ORDER BY event_id ASC LIMIT $limit, $offset";
	}else{
		$sql = "SELECT $column FROM $table WHERE event_status = '1' ORDER BY event_id ASC LIMIT $limit, $offset";
	}
	
	$result = execute_select($sql);

	if ($result) {
		return $result;
	}else{
		return false;
	}
}

function check_if_events($eventid, $event_lat, $event_long)
{
	$sql = "SELECT * FROM events WHERE event_id = $eventid and event_latitude = $event_lat and event_longitude = $event_long";
		$result = execute_select($sql);

		if ($result) {
			return true;
		}else{
			echo "<h1 style'color:maroon;'>Event not found</h1>";
			exit();
		}
}

function get_single_event($column, $table, $eventid, $event_lat, $event_long)
{
	$valid_event = check_if_events($eventid, $event_lat, $event_long);
	if ($valid_event) {
		$sql = "SELECT $column FROM $table WHERE event_id = $eventid";
		$result = execute_select($sql);

		if ($result) {
			return $result;
		}else{
			return false;
		}
	}
	
}
 ?>