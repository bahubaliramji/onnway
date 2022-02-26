<?php
include('config.php');
if($_POST['token_id'] != ''){
	
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$fields = array('bank_name','branch_address','benificiary_name','acc_no','ifsc_code');
		$update = updateQuery('tbl_vehicle_owner',$fields,'vehicle_owner_id',$user_id,'');
		$response["is_error"] = false;
		$response["message"] = "Bank Details Updated Successfully.";
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