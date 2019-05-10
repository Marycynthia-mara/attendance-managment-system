<?php 
require_once 'config.inc.php';

function add_group($post)
{
	$err_flag = false;
	$errors = [];

	extract($post);

	if (!empty($groupName)) {
		$groupName_tmp = sanitize($groupName);
	if ($groupName_tmp) {
		if (!check_duplicate_data('users_group', 'group_name', $groupName_tmp)) {
			$groupName = $groupName_tmp;
		}else{
			$err_flag = true;
			$errors['dublicate_groupName'] = true;
		}
		
	}else{
		$err_flag = true;
		$errors['groupName']= true;
	}
	}else{
		$err_flag = true;
		$errors['groupName']= true;
	}


	if ($err_flag === false) {
	$sql = "INSERT INTO users_group (group_name) VALUES ('$groupName')";

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