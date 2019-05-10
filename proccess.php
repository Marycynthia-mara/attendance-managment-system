<?php 
require_once 'inc/config.inc.php';
if (isset($_POST['update_password'])) {
	$result = update_password($_POST);
	extract($_POST);
    if ($result === true) {
        $msg2 = true;
    } else {
        $errors = $result;
    }

    extract($_POST);
}





