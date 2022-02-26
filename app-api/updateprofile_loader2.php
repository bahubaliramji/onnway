<?php
include('config.php');
if($_POST['token_id'] != '' && $_POST['address']!=""  && $_POST['city']!="" && $_POST['pincode']!="" && $_POST['designation']!="" ){
	
	$user_id = checkLoaderToken($_POST['token_id']);
	if($user_id!=""){
		$fields = array('address','city','pincode','designation','landline_no','alt_contact_person','alt_mb_no');
		$update = updateQuery('tbl_loader',$fields,'id',$user_id,'');
		
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