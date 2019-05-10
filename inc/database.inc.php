<?php 
require_once 'config.inc.php';
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);

function execute_stmt($statement)
{
	global $conn;
	$query = mysqli_query($conn, $statement);
	if ($query) {
		return $query;
	}else{
		echo "connection to database failed  " . mysqli_error($conn);
		return false;
	}
}


function execute_select($sql)
{
	$result = execute_stmt($sql);
	if ($result) {
		$data = false;
		$count = mysqli_num_rows($result);

		if ($count == 1) {
			$data = mysqli_fetch_assoc($result);
			return $data;
		}

		if ($count > 1) {
			$data = [];
			
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
		}

		return $data;
	}else{
		echo "selection from database failed";
		return false;
	}
}

function execute_iud($sql)
{
	global $conn;
	$result = execute_stmt($sql);
	if ($result) {
		$num_of_row = mysqli_affected_rows($conn);
		return $num_of_row;
	}else{
		echo "insert, update or delete from database failed";
		return false;
	}
}

function sanitize($input)
{
	global $conn;
	$result = htmlentities(strip_tags(trim($input)));
	$result = mysqli_real_escape_string($conn, $input);
	return $result;
}


function sanitize_email($input)
{
	global $conn;
	$result = filter_var($input, FILTER_VALIDATE_EMAIL);
	if ($result) {
		$result = mysqli_real_escape_string($conn, $input);
		return $result;
	}else{
		echo "Enter a valid email!";
		return false;
	}
}
 ?>