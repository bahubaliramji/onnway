<?php
include('config.php');


$jsonResponse = array("city_list"=>array());
$query = mysql_query("select * from tbl_city ");

if (mysql_num_rows($query) > 0){
	while($data = mysql_fetch_array($query)){
		

		$comp_details= array(
        //'id' => $data['id'],
		'name' => $data['city_name'],
	

    );
	array_push($jsonResponse['city_list'],$comp_details);
         
        }
		echo json_encode($jsonResponse);   
}else{
	$comp_details['city_list'] = [];
	echo json_encode($comp_details);

}