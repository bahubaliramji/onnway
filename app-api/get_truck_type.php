<?php
include('config.php');
session_start();
if(isset($_POST['get_truck'])){
			$response["is_error"] = false;
			$response["message"] = "Truck List";
			
			$roww = mysql_query("select vehicle_category,id from tbl_trucktype");
			while($fetchh = mysql_fetch_array($roww)){
				//$response["data"]['vehicle_category'][] = $fetchh['vehicle_category'];
				$rowtruck = mysql_query("select * from vehicle_list where status = 1 and vehicle_type='".$fetchh['id']."' order by length asc ");
				while($fetchhh = mysql_fetch_array($rowtruck)){
					if($fetchh['id']==2){
						$array = array();
						$data['id']  = $fetchhh['id'];
						if($fetchhh['sub_type']=='1'){
							$value = "Flat Bed - ";
						}
						if($fetchhh['sub_type']=='2'){
							$value = "Semi Bed - ";
						}
						$data['value'] = $value.$fetchhh['length']." MT / ". $fetchhh['dimension'];
						$response["data"]['vehicle_category'][$fetchh['vehicle_category']][] = array($data['id'],$data['value'],$fetchhh['length']);
					}else{ 
						$array = array();
						 $data['id'] = $fetchhh['id'];
						 $data['value'] = $fetchhh['length']." MT / ". $fetchhh['dimension'];
						 $response["data"]['vehicle_category'][$fetchh['vehicle_category']][] = array($data['id'],$data['value'],$fetchhh['length']);
					}
				} 
			}
			//$response["data"]['truck_type'] = getResult("select vehicle_category,id from tbl_trucktype");
}else{
	$response["is_error"] = true;
	$response["message"] = "Required field can't be blank";
}
	echo json_encode($response);
?>