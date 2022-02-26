<?php 
include('config.php');
if($_POST['token_id']!='' && $_POST['load_id']!=''){
	
	$user_id = checkLoaderToken($_POST['token_id']);
	if($user_id!=""){
		$query = mysql_query("select * from tbl_book_load where loader_id='$user_id' and id='".$_POST['load_id']."'");
		if(mysql_num_rows($query)==1){
			$result = mysql_fetch_assoc($query);
			$response["is_error"] = false;
			$response["message"] = "Load Information.";

			$response["data"]['file_path'] = "http://onnway.com/rahul-vehicle/upload/documents/";
			$response["data"]["booking_id"] = $result['booking_id'];
			$response["data"]["cost"] = $result['cost'];
			$response["data"]["booking_date"] = $result['booking_date'];
			$response["data"]["vehicle_type"] = getTruckType($result['vehicle_type']);
			$response["data"]["source"] = getCity($result['source']);
			$response["data"]["destination"] = getCity($result['destination']);
			$response["data"]["no_vehicle"] = $result['no_vehicle'];/* 
			$response["data"]["truck_type"] = $result['truck_type'];
			$response["data"]["company_type"] = $result['company_type']; */
			$response["data"]["material_type"] = $result['material_type'];
			$response["data"]["weight"] = $result['weight'];
			$response["data"]["file1"] = $result['file1'];
			$response["data"]["file2"] = $result['file2'];
			$response["data"]["file3"] = $result['file3'];
			$response["data"]["file4"] = $result['file4'];
			$response["data"]["file5"] = $result['file5'];
			$sql_result = mysql_fetch_array(mysql_query("select * from tbl_loader where id='".$user_id."'"));
			$response["data"]["company_name"] = $sql_result['company_name'];
			$response["data"]["landline_no"] = $sql_result['landline_no'];
			$response["data"]["address"] = $sql_result['address'];
			$response["data"]["city"] = $sql_result['city'];
			$response["data"]["pincode"] = $sql_result['pincode'];
			

		}else{
			$response["is_error"] = true;
			$response["message"] = "No Load Found.";
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