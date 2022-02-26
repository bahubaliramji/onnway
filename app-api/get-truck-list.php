<?php
include('config.php');
session_start();
if($_POST['token_id'] != ''){
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
			$response["is_error"] = false;
			$response["message"] = "Truck List";
			$response["data"]['truck'] = getResult("select id,truck_reg_no from tbl_trucks where vehicle_owner_id='".$user_id."'order by truck_reg_no asc");
	}else{
		$response["is_error"] = true;
		$response["message"] = "Please Login again.Your Session Has been Expire.";
	}
}else{
	$response["is_error"] = true;
	$response["message"] = "Required parameter type is missing";
}
	echo json_encode($response);
?>