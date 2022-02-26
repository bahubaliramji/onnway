<?php 
 include('config.php');
if($_POST['token_id']!=''){
	
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$query = mysql_query("SELECT * FROM tbl_post_truck WHERE vehicle_owner_id = '$user_id' order by id desc");
		if(mysql_num_rows($query)>0){
			$result = mysql_fetch_assoc($query);
			$response["is_error"] = false;
			$response["message"] = "Posted Truck List.";
			/* //$resultArray = array(); */
			$query1 = mysql_query("SELECT tpt.id, tpt.post_truck_id, tpt.source, tpt.destination, tpt.schedule_date, tt.truck_reg_no FROM tbl_post_truck as tpt INNER JOIN tbl_trucks as tt ON tpt.truck_id = tt.id WHERE tpt.vehicle_owner_id = '$user_id' order by tpt.id desc");
			$rowCount = mysql_num_rows($query1);
			$resultArray = array("posted_truck"=>array());
			while($arrayResult = mysql_fetch_assoc($query1)) {
				/* //$resultArray[] = $arrayResult; */
				
				$route_sql = mysql_query("SELECT source as new_source,destination as new_destination,status,payment_status_t,advance_pay_file_t,delivery_status,bal_payment_status_t,bal_pay_file_t,amount_truck FROM tbl_book_load WHERE assign_truck = '".$arrayResult['id']."'");
				$asign_r = array(
							"new_source" => getCity($route_result['new_source']),
							"new_destination" => getCity($route_result['new_destination']),
							"status" => getStatus($route_result['status']),
							"payment_status_t" => getStatus($route_result['payment_status_t']),
							"advance_pay_file_t" => $route_result['advance_pay_file_t'],
							"delivery_status" => getStatus($route_result['delivery_status']),
							"bal_payment_status_t" => getStatus($route_result['bal_payment_status_t']),
							"bal_pay_file_t" => $route_result['bal_pay_file_t'],
							"amount_truck" => $route_result['amount_truck'],
						);
				if(mysql_num_rows($route_sql)==1){
						$route_result = mysql_fetch_assoc($route_sql);
						$assign_status = "1";
						$asign_r = array(
							"new_source" => getCity($route_result['new_source']),
							"new_destination" => getCity($route_result['new_destination']),
							"status" => getStatus($route_result['status']),
							"payment_status_t" => getStatus($route_result['payment_status_t']),
							"advance_pay_file_t" => $route_result['advance_pay_file_t'],
							"delivery_status" => getStatus($route_result['delivery_status']),
							"bal_payment_status_t" => getStatus($route_result['bal_payment_status_t']),
							"bal_pay_file_t" => $route_result['bal_pay_file_t'],
							"amount_truck" => $route_result['amount_truck'],
						);
					}else{
						$assign_status = "0";
					}
					$destination = explode(',',$arrayResult['destination']);
						$cm = '';
						$route="";
						foreach($destination as $id =>$value){
							$route .= $cm.getCity($value);
							$cm = ',';
						}
				$comp_details= array(
					'id' => $arrayResult['id'],
					'post_truck_id' => $arrayResult['post_truck_id'],
					'source' => getCity($arrayResult['source']),
					'destination' => $route,
					'schedule_date' => $arrayResult['schedule_date'],
					'truck_reg_no' => $arrayResult['truck_reg_no'],
					'assign'  => $assign_status,
					'assign_details'  => $asign_r,
				);
			array_push($resultArray['posted_truck'],$comp_details);
				
			}
			
			$response["data"] = $resultArray;
			$response["data"]['file_path'] = "http://onnway.com/rahul-vehicle/upload/vehicle_documents/";


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