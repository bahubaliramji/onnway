<?php 
include('config.php');
if($_POST['token_id']!=''){
	
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$query = mysql_query("select * from tbl_vehicle_owner where vehicle_owner_id='$user_id'");
		$result = mysql_fetch_assoc($query);
		$response["is_error"] = false;
		$response["message"] = "User Details.";
		$response["data"]['file_path'] = "http://onnway.com/rahul-vehicle/upload/vehicle_documents/";
		$response["data"]["company_name"] = $result['company_name'];
		$response["data"]["pan_no"] = $result['pan_no'];
		$response["data"]["pan_file"] = $result['pan_file'];
		$response["data"]["tds_dclaration"] = $result['tds_dclaration'];
		$response["data"]["company_type"] = $result['company_type'];
		$response["data"]["gst_no"] = $result['gst_no'];
		$response["data"]["gst_file"] = $result['gst_file'];
		$response["data"]["tds_file"] = $result['tds_file'];
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