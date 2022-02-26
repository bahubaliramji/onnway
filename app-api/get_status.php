<?php
include('config.php');
session_start();
if(isset($_POST['get_status'])){
			$response["is_error"] = false;
			$response["message"] = "Status";
			$response["data"]['status'] = getResult("select id,name from tbl_status ");
}else{
	$response["is_error"] = true;
	$response["message"] = "Required field can't be blank";
}
	echo json_encode($response);
?>