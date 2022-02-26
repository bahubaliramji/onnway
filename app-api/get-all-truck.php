<?php 
 include('config.php');
if($_POST['token_id']!=''){
	
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$query = mysql_query("select * from tbl_trucks where vehicle_owner_id='$user_id'");
		if(mysql_num_rows($query)>0){
			$result = mysql_fetch_assoc($query);
			$response["is_error"] = false;
			$response["message"] = "Truck List.";
			$response["data"]['file_path'] = "http://onnway.com/rahul-vehicle/upload/vehicle_documents/";
			$response["data"]['truck_list'] = getResult("select * from tbl_trucks where vehicle_owner_id='$user_id'");


		}else{
			$response["is_error"] = true;
			$response["message"] = "No Truck Found.";
		}
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