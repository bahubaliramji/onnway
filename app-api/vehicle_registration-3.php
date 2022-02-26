<?php
include('config.php');
if($_POST['token_id'] != ''){
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$bank_name = $_POST['bank_name'];
		$branch_address = $_POST['branch_address'];
		$benificiary_name = $_POST['benificiary_name'];
		$acc_no = $_POST['acc_no'];
		$ifsc_code = $_POST['ifsc_code'];
		
		$update = mysql_query("UPDATE tbl_vehicle_owner SET bank_name = '$bank_name', branch_address = '$branch_address', benificiary_name = '$benificiary_name', acc_no = '$acc_no' , ifsc_code = '$ifsc_code'  WHERE vehicle_owner_id = '".$user_id."'");

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