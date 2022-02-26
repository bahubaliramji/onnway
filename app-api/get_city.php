<?php
include('config.php');
session_start();
if(isset($_POST['get_city'])){
			$response["is_error"] = false;
			$response["message"] = "City List";
			$response["data"]['city'] = getResult("select id,city_name,state_name from tbl_city order by city_name asc");
}else{
	$response["is_error"] = true;
	$response["message"] = "Required field can't be blank";
}
	echo json_encode($response);
?>