<?php 
include('config.php');
if($_POST['token_id']!=''){
	
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$query = mysql_query("select * from tbl_vehicle_owner where vehicle_owner_id='$user_id'");
		$result = mysql_fetch_assoc($query);
		$response["is_error"] = false;
		$response["message"] = "User Details.";
		$response["data"]["address"] = $result['address'];
		
		$response["data"]["city_id"] = $result['city'];
		$response["data"]["city"] = getCity($result['city']);
		$response["data"]["pincode"] = $result['pincode'];
		$response["data"]["designation"] = $result['designation'];
		$response["data"]["alt_contact_person"] = $result['alt_contact_person'];
		$response["data"]["alt_mb_no"] = $result['alt_mb_no'];
		/* if($result['vehicle_owner_type']=="agent"){ */
		$response["data"]["agent_pan_card_no"] = $result['agent_pan_card_no'];
		$response["data"]["agent_aadhar_card_no"] = $result['agent_aadhar_card_no'];
		$response["data"]['file_path'] = "http://onnway.com/rahul-vehicle/upload/vehicle_documents/";
		$response["data"]["agent_pan_card_file"] = $result['agent_pan_card_file'];
		$response["data"]["agent_aadhar_card_file"] = $result['agent_aadhar_card_file'];
		/* } */
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