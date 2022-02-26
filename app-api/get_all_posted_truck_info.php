<?php 
include('config.php');
if($_POST['token_id']!=''){
	
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$query = mysql_query("SELECT * FROM tbl_post_truck_info WHERE vehicle_owner_id = '$user_id' order by id desc");
		if(mysql_num_rows($query)>0){
			$result = mysql_fetch_assoc($query);
			$response["is_error"] = false;
			$response["message"] = "Posted Truck List.";
			//$resultArray = array();
			$query1 = mysql_query("SELECT * FROM tbl_post_truck_info WHERE vehicle_owner_id = '$user_id' order by id desc");
			$rowCount = mysql_num_rows($query1);
			$resultArray = array("posted_truck"=>array());
			while($arrayResult = mysql_fetch_assoc($query1)) {	
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
					'truck_reg_no' => $arrayResult['truck_reg_no'],
					'source' => getCity($arrayResult['source']),
					'destination' => $route,
					'schedule_date' => $arrayResult['schedule_date'],
					'truck_status' => getStatus($arrayResult['truck_status']),
					
				);
			array_push($resultArray['posted_truck'],$comp_details);
				
			}
			
			$response["data"] = $resultArray;
			

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