<?php
 
 include('config.php');
/* if($_POST['truck_reg_no'] != '' && $_POST['source'] != '' && $_POST['vehicletype'] != '' && $_POST['weight'] != '' && $_POST['scheduled_date'] != '' && $_POST['name'] != '' && $_POST['mobile'] != '' ){ */

		$truck_reg_no = $_POST['truck_reg_no'];		
		$source = $_POST['source'];
		$truck_type = $_POST['vehicletype'];
		$weight = $_POST['weight'];
		$scheduled_date = $_POST['scheduled_date'];
		$scheduled_time = $_POST['scheduled_time'];
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$post_date = date('h:i:s d-m-Y');
		
		$query = mysql_query("INSERT INTO `tbl_post_truck_enq` (`source`, `truck_reg_no`,  `vehicletype`, `weight`, `scheduled_date`, `scheduled_time`, `name`, `mobile`, `post_date`) VALUES ('".$source."', '".$truck_reg_no."', '".$truck_type."', '".$weight."', '".$scheduled_date."', '".$scheduled_time."', '".$name."', '".$mobile."','".$post_date."')") ;
	
 	$lastid = mysql_insert_id();
	if(!empty($_POST['destination'])){
			$destination = explode(",",$_POST['destination']);
			for($i=0;$i<count($destination);$i++){
				  mysql_query("INSERT INTO tbl_post_destination(tbl_post_truck_enq_id,	destination_id)VALUES('$lastid','".$destination[$i]."')"); 
				 
			}
		} 

		$response["is_error"] = false;
	echo 	$response["message"] = "Your Truck Details Enquiry Posted Successfully.";
/* 
}else{
	$response["is_error"] = true;
	$response["message"] = "Required parameter type is missing";
}

//echo json_encode($response); */

?>