<?php 
include('config.php');
if($_POST['token_id']!='' && $_POST['truck_id']!=''){
	
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$query = mysql_query("select * from tbl_trucks where vehicle_owner_id='$user_id' and id='".$_POST['truck_id']."'");
		if(mysql_num_rows($query)==1){
			$result = mysql_fetch_assoc($query);
			$response["is_error"] = false;
			$response["message"] = "User Details.";

			$response["data"]['file_path'] = "http://onnway.com/rahul-vehicle/upload/vehicle_documents/";
			$response["data"]["truck_type"] = getTruckType($result['truck_type']);
			$response["data"]["load_passing"] = $result['load_passing'];
			$response["data"]["truck_permit_no"] = $result['truck_permit_no'];
			$response["data"]["truck_permit_file"] = $result['truck_permit_file'];
			$response["data"]["truck_reg_no"] = $result['truck_reg_no'];
			$response["data"]["truck_reg_file"] = $result['truck_reg_file'];
			$response["data"]["truck_validity"] = $result['truck_validity'];
			$response["data"]["insurance_file"] = $result['insurance_file'];
			$response["data"]["fitness_cert_no"] = $result['fitness_cert_no'];
			$response["data"]["fitness_cert_file"] = $result['fitness_cert_file'];
			$response["data"]["driver_name"] = $result['driver_name'];
			$response["data"]["mobile_no"] = $result['mobile_no'];
			$response["data"]["dl"] = $result['dl'];
			$response["data"]["dl_file"] = $result['dl_file'];
			$response["data"]["route_operate"] = $result['route_operate'];
			$response["data"]["aadhar_no"] = $result['aadhar_no'];
			$response["data"]["auth_driver_cert_no"] = $result['auth_driver_cert_no'];
			$response["data"]["auth_driver_cert_file"] = $result['auth_driver_cert_file'];
			$response["data"]["aadhar_file"] = $result['aadhar_file'];
			

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