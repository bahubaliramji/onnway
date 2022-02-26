<?php
include('config.php');


$jsonResponse = array("trucktype_list"=>array());
$query = mysql_query("select * from tbl_trucktype ");

if (mysql_num_rows($query) > 0){
	while($data = mysql_fetch_array($query)){
		

		$comp_details= array(
        //'id' => $data['id'],
		'truck type' => $data['truck_type'],
	     'category' => $data['vehicle_category'],
  'weight' => $data['weight'],
  'dimension' => $data['dimension'],
  'price/km' => $data['price_km'],
    );
	array_push($jsonResponse['trucktype_list'],$comp_details);
         
        }
		echo json_encode($jsonResponse);   
}else{
	$comp_details['trucktype_list'] = [];
	echo json_encode($comp_details);

}