<?php
 
 include('config.php');
if($_POST['token_id'] != '' && $_POST['truck_reg_no'] != '' && $_POST['source'] != '' && $_POST['truck_type'] != '' && $_POST['weight'] != '' && $_POST['schedule_date'] != '' ){
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$truck_reg_no = $_POST['truck_reg_no'];
		$resultB = mysql_query("SELECT id FROM tbl_post_truck_info order by id desc limit 1");
		$rowB = mysql_fetch_array($resultB);
		$post_truck_id = 'IT'.($rowB['id']+1001);
		
		$source = $_POST['source'];
		$truck_type = $_POST['truck_type'];
		$weight = $_POST['weight'];
		$schedule_date = $_POST['schedule_date'];
		$destination = $_POST['destination'];

		
		$insert = mysql_query("Insert INTO tbl_post_truck_info(vehicle_owner_id, truck_reg_no, post_truck_id, source, destination, truck_type, weight,  schedule_date, created_date)VALUE('".$user_id."','".$truck_reg_no."','$post_truck_id' ,'".$source."','".$destination."','".$truck_type."','".$weight."','".$schedule_date."','".date('h:i:s d-m-Y')."')");

		$response["is_error"] = false;
		$response["message"] = "Your Truck Details Posted Successfully.";
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