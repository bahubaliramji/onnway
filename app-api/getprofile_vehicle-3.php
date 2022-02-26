<?php 
include('config.php');
if($_POST['token_id']!=''){
	
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$query = mysql_query("select * from tbl_vehicle_owner where vehicle_owner_id='$user_id'");
		$result = mysql_fetch_assoc($query);
		$response["is_error"] = false;
		$response["message"] = "User Details.";
		$response["data"]["bank_name"] = $result['bank_name'];
		$response["data"]["branch_address"] = $result['branch_address'];
		$response["data"]["benificiary_name"] = $result['benificiary_name'];
		$response["data"]["acc_no"] = $result['acc_no'];
		$response["data"]["ifsc_code"] = $result['ifsc_code'];
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