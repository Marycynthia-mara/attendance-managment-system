<?php 
require_once 'config.inc.php';

function add_course($post)
{
	$err_flag = false;
	$errors = [];

	extract($post);

	if (!empty($courseName)) {
		echo "yess";
		$courseName_tmp = sanitize($courseName);
	if ($courseName_tmp) {
		if (!check_duplicate_data('course', 'course_name', $courseName_tmp)) {
			$courseName = $courseName_tmp;
		}else{
			$err_flag = true;
			$errors['dublicate_courseName'] = true;
		}
		
	}else{
		$err_flag = true;
		$errors['courseName']= true;
	}
	}else{
		$err_flag = true;
		$errors['courseName']= true;
	}

	if ($err_flag === false) {
	$sql = "INSERT INTO course (course_name) VALUES ('$courseName')";

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

 ?>