<?php
require_once('config.php');
$jsonResponse = array("booktruck"=>array());
$query = mysql_query("select * from tbl_book_truck");

if (mysql_num_rows($query) > 0){
	while($data = mysql_fetch_array($query)){
		

		$comp_details= array(
        'book_truck_id' => $data['book_truck_id'],
		'source' => $data['source'],
		'weight' => $data['weight'],
	
    );
	array_push($jsonResponse['booktruck'],$comp_details);
         
        }
		echo json_encode($jsonResponse);   
}else{
	$comp_details['booktruck'] = [];
	echo json_encode($comp_details);

}