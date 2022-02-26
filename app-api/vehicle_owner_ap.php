<?php
require_once('config.php');
$jsonResponse = array("vehicle_owner"=>array());
$query = mysql_query("select * from tbl_vehicle_owner");

if (mysql_num_rows($query) > 0){
	while($data = mysql_fetch_array($query)){
		

		$comp_details= array(
        'vehicle_owner_id' => $data['vehicle_owner_id'],
		'name' => $data['name'],
		
    );
	array_push($jsonResponse['vehicle_owner'],$comp_details);
         
        }
		echo json_encode($jsonResponse);   
}else{
	$comp_details['vehicle_owner'] = [];
	echo json_encode($comp_details);

}