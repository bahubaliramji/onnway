<?php
 include('config.php');
if($_POST['token_id'] != '' && $_POST['company_name']!=""  && $_POST['pan_card_no']!="" ){
	
	$user_id = checkLoaderToken($_POST['token_id']);
	if($user_id!=""){
		$fields = array('company_name','pan_card_no','gst_no','company_website');
		$files = array('gst_file','pan_file');
		$update = updateQuery('tbl_loader',$fields,'id',$user_id,$files);
		
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