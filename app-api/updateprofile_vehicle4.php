<?php
include('config.php');
if($_POST['token_id'] != '' && $_POST['company_name']!="" && $_POST['pan_no'] ){
	
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$fields = array('company_name','tds_dclaration','company_type','pan_no','gst_no');
		$files = array('gst_file','pan_file','tds_file');
		$update = updateQuery('tbl_vehicle_owner',$fields,'vehicle_owner_id',$user_id,$files);
		$response["is_error"] = false;
		$response["message"] = "Company Details Updated Successfully.";
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