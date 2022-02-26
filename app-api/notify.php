<?php
 include('config.php');
if ($_POST['id'] != "" ){
        $query = mysql_query("SELECT id FROM tbl_trucks WHERE id = '".$_POST['id']."' order by id desc limit 1 ");
		if ($_POST['latitude'] != "" && $_POST['longitude'] != "" ){

		$abc = mysql_query("INSERT INTO `driver_log` (`truck_id`, `lat`,  `lon`, `date`, `time`) VALUES ('".$_POST['id']."', '".$_POST['latitude']."', '".$_POST['longitude']."', '".date('Y-m-d')."', '".date('h:i:s')."')") ; 
		}
     if(mysql_num_rows($query) > 0) {
			$query1 = mysql_query("SELECT * FROM tbl_notify WHERE user_id = '".$_POST['id']."' and status='0'");
		if(mysql_num_rows($query1)>0){
			
			$response["is_error"] = false;
			$response["message"] = "All Notification.";
			$resultArray = array("notify"=>array());
			while($result = mysql_fetch_assoc($query1)) {
				 //$resultArray = array();
				 $new_sql = mysql_query("SELECT loader_id,scheduled_date,scheduled_time,pickup_street,	pickup_city,pickup_pincode,drop_street,destination_name,drop_pincode FROM tbl_book_load WHERE assign_truck = '".$result['post_truck_id']."' order by id desc");
				 
				
				$new_result= mysql_fetch_assoc($new_sql);
				$new_sql1 = mysql_query("SELECT name FROM tbl_loader WHERE id = '".$new_result['loader_id']."' ");
				$new_result1= mysql_fetch_assoc($new_sql1);
				
				$comp_details= array(
					'notify_id' => $result['id'],
					'status' => $result['status'],
					'Loader_name' => $new_result1['name'],
					'scheduled_time' => $new_result['scheduled_time'],
					'scheduled_date' => $new_result['scheduled_date'],
					
					'pickup_street' => $new_result['pickup_street'],
					'pickup_city' => getCity($new_result['pickup_city']),
					'pickup_pincode' => $new_result['pickup_pincode'],
					'drop_street' => $new_result['drop_street'],
					'drop_city' => getCity($new_result['destination_name']),
					'drop_pincode' => $new_result['drop_pincode'],
				);
			array_push($resultArray['notify'],$comp_details);
				
			}
			mysql_query("update tbl_notify set status='1' where user_id = '".$_POST['id']."' ");
			$response["data"] = $resultArray; 
			

		}else{
			$response["is_error"] = true;
			$response["message"] = "No Status.";
		}
					
    } else {
            $response["is_error"] = true;
            $response["message"]  = "Invalid User Id.";
    }
} else {
    $response["is_error"] = true;
    $response["message"]  = "Required parameter type is missing";
}
echo json_encode($response);
?>