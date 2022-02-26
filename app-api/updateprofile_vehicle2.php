<?php
include('config.php');
if($_POST['token_id'] != '' && $_POST['address']!="" && $_POST['city'] && $_POST['pincode']){
	
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$fields = array('address','city','pincode','designation','alt_contact_person','alt_mb_no','agent_pan_card_no','agent_aadhar_card_no');
		$files = array('agent_pan_card_file','agent_aadhar_card_file');
		$update = updateQuery('tbl_vehicle_owner',$fields,'vehicle_owner_id',$user_id,$files);
		$response["is_error"] = false;
		$response["message"] = "Contact Details Updated Successfully.";
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