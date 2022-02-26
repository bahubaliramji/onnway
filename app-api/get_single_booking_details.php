<?php
 include('config.php');
if ($_POST['id'] != "" && is_numeric($_POST['id']) && $_POST['book_id'] != "" &&  is_numeric($_POST['book_id'])){
        $query = mysql_query("SELECT id FROM tbl_trucks WHERE  id = '".$_POST['id']."' order by id desc limit 1 ");

     if(mysql_num_rows($query) > 0) {
			$query1 = mysql_query("SELECT * FROM tbl_post_truck WHERE id = '".$_POST['book_id']."' order by id desc");
		if(mysql_num_rows($query1)>0){
			
			$response["is_error"] = false;
			$response["message"] = "Single Truck Info.";
			$result = mysql_fetch_assoc($query1);
			 $resultArray = array("booking"=>array());
			
				 //$resultArray = array();
				 $new_sql = mysql_query("SELECT loader_id,scheduled_date,scheduled_time,pickup_street,	pickup_city,pickup_pincode,drop_street,destination_name,drop_pincode FROM tbl_book_load WHERE assign_truck = '".$result['id']."' order by id desc");
				 
				 if(mysql_num_rows($new_sql)>0){
					 $st  = "Assign";
				 }else{
					 $st  = "";
				 }
				$new_result= mysql_fetch_assoc($new_sql);
				$new_sql1 = mysql_query("SELECT name FROM tbl_loader WHERE id = '".$new_result['loader_id']."' ");
				$new_result1= mysql_fetch_assoc($new_sql1);
				
				$comp_details= array(
					'book_id' => $result['id'],
					'post_truck_id' => $result['post_truck_id'],
					'status' => $result['status'],
					'assign' => $st,
					'Loader_name' => $new_result1['name'],
					'scheduled_time' => $new_result['scheduled_time'],
					'scheduled_date' => $new_result['scheduled_date'],
					
					'pickup_street' => $new_result['pickup_street'],
					'pickup_city' => getCity($new_result['pickup_city']),
					'pickup_city_lat' => getlat($new_result['pickup_city']),
					'pickup_city_lon' => getlon($new_result['pickup_city']),
					'pickup_pincode' => $new_result['pickup_pincode'],
					'drop_street' => $new_result['drop_street'],
					'drop_city' => getCity($new_result['destination_name']),
					'drop_city_lat' => getlat($new_result['destination_name']),
					'drop_city_lon' => getlon($new_result['destination_name']),
					'drop_pincode' => $new_result['drop_pincode'],
				);
			array_push($resultArray['booking'],$comp_details);
				
			
			
			$response["data"] = $resultArray; 
			

		}else{
			$response["is_error"] = true;
			$response["message"] = "No Order Found.";
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