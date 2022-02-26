<?php
 include('config.php');
if($_POST['token_id'] != '' && $_POST['load_id']!="" ){
	
	$user_id = checkLoaderToken($_POST['token_id']);
	if($user_id!=""){
		
		$files = array('file1','file2','file3','file4','file5');
		$update = updateQuery('tbl_book_load','','id',$_POST['load_id'],$files);
		
		$response["is_error"] = false;
		$response["message"] = "Document Uploaded Successfully.";
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