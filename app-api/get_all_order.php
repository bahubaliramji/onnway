<?php 
include('config.php');
if($_POST['token_id']!=''){
	
	$user_id = checkLoaderToken($_POST['token_id']);
	if($user_id!=""){
		$query = mysql_query("SELECT * FROM tbl_book_load WHERE loader_id = '$user_id' order by id desc");
		if(mysql_num_rows($query)>0){
			$result = mysql_fetch_assoc($query);
			$response["is_error"] = false;
			$response["message"] = "All Order List.";
			//$resultArray = array();
			$result = mysql_query("SELECT * FROM tbl_book_load WHERE loader_id = '$user_id' order by id desc");
			$rowCount = mysql_num_rows($result);
			$resultArray = array("all_order"=>array());
			while($arrayResult = mysql_fetch_assoc($result)) {	
				 
				$comp_details= array(
					'id' => $arrayResult['id'],
					'booking_id' => $arrayResult['booking_id'],
					'scheduled_date' => $arrayResult['scheduled_date'],
					'scheduled_time' => $arrayResult['scheduled_time'],
					'source' => getCity($arrayResult['source']),
					'destination' => getCity($arrayResult['destination']),
					'status' => $arrayResult['status'],
					'lr_no' => $arrayResult['lr_no'],
					'lorry_file' => $arrayResult['lorry_file'],
					'payment_status' => $arrayResult['payment_status'],
					'document_status' => $arrayResult['document_status'],
					'delivery_status' => $arrayResult['delivery_status'],
					'bal_payment_status' => $arrayResult['bal_payment_status'],
					
				);
			array_push($resultArray['all_order'],$comp_details);
				
			}
			
			$response["data"] = $resultArray;
			

		}else{
			$response["is_error"] = true;
			$response["message"] = "No Order Found.";
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