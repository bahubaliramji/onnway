<?php
include('config.php');
if($_POST['token_id'] != '' && $_POST['name']!=""){
	
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$fields = array('name','last_name','aadhar_no','transport_name');
		updateQuery('tbl_vehicle_owner',$fields,'vehicle_owner_id',$user_id);
		$response["is_error"] = false;
		$response["message"] = "Details Updated Successfully.";
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