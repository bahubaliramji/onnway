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


			$response["data"]["booking_id"] = $result['booking_id'];
			$response["data"]["scheduled_date"] = $result['scheduled_date'];
			$response["data"]["scheduled_time"] = $result['scheduled_time'];
			$response["data"]["source"] = getCity($result['source']);
			$response["data"]["destination"] = getCity($result['destination']);
			$response["data"]["status"] = $result['status'];
			$response["data"]["lr_no"] = $result['lr_no'];
			$response["data"]["lorry_file"] = $result['lorry_file'];
			$response["data"]["payment_status"] = $result['payment_status'];
			$response["data"]["document_status"] = $result['document_status'];
			$response["data"]["delivery_status"] = $result['delivery_status'];
			$response["data"]["bal_payment_status"] = $result['bal_payment_status'];
			$response["data"]["status5"] = getCity($result['status5']);
			$response["data"]["status4"] = $result['status4'];
			$response["data"]["status3"] = $result['status3'];
			$response["data"]["status2"] = $result['status2'];
			$response["data"]["status1"] = getCity($result['status1']);
			$response["data"]["status5_time"] = $result['status5_time'];
			$response["data"]["status4_time"] = $result['status4_time'];
			$response["data"]["status3_time"] = $result['status3_time'];
			$response["data"]["status2_time"] = $result['status2_time'];
			$response["data"]["status1_time"] = $result['status1_time'];
			

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