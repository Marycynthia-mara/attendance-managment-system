<?php 

function take_attendance($event_id, $post, $event_lat, $event_long)
{
	$err_flag = false;
	$errors = [];

	extract($post);
if (isset($attendance)) {
	if (check_user_location($event_lat, $event_long)) {
		$attendance_status = $attendance;
		$user_id = $_SESSION['users_id'];
		// echo($attendance_status );
		$event_id = $_GET['event_id'];
		// echo($event_id);
	}else{
	$err_flag = true;
	$errors['user_location'] = true;
}
	
}else{
	$err_flag = true;
	$errors['attendance'] = true;
}
	

	if ($err_flag === false) {
		$sql = "INSERT INTO attendance (user_id_fk, event_id_fk, attendance) VALUES ('$user_id', '$event_id', '$attendance_status')";

		$result = execute_iud($sql);
		if ($result) {
			echo "<script>alert('Attendance marked')</script>";
			return true;
		}else{
			echo "<script>alert('Attendance can not be taken you are not in that location')</script>";
			// $errors['login'] = "Invalid Login details";
		}
	}else{
		return $errors;
	}
}

function add_attd_excuse($eventid, $user_id, $post)
{

	$err_flag = false;
	$errors = [];

	extract($post);
if (isset($attd_excuse_txt)) {
	$attd_excuse_purpose = sanitize($attd_excuse_txt);
	$user_id = $user_id;
	$event_id = $eventid;
}else{
	echo "<script>alert('enter excuse to continue ' )</script>";
	$err_flag = true;
	$errors[] = true;
}
	

	if ($err_flag === false) {
		$sql = "INSERT INTO attendance (user_id_fk, event_id_fk, attendance, attendance_excuse) VALUES ('$user_id', '$event_id', 'absent', '$attd_excuse_purpose')";

		$result = execute_iud($sql);
		if ($result) {
			echo "<script>alert('Attendance marked')</script>";
			return true;
		}else{
			echo "<script>alert('Ooops something went wrong, Attendance not marked, Try again ' )</script>";
			// echo "<script>alert('Ooops something went wrong ' . " <br> " . ' Attendance not marked. ' . " <br> " . 'Try again' );</script>";
			// $errors['login'] = "Invalid Login details";
		}
	}else{
		echo "<script>alert('Ooops something went wrong, Attendance not marked, Try again ' )</script>";
		return $errors;
	}
	
}
 ?>