<?php
require_once('config.php');
$jsonResponse = array("individual_load"=>array());
$query = mysql_query("select * from tbl_loader_individual");

if (mysql_num_rows($query) > 0){
	while($data = mysql_fetch_array($query)){
		

		$comp_details= array(
        'loader_comp_id' => $data['tbl_l_individual_id'],
		'f_name' => $data['f_name'],
		
    );
	array_push($jsonResponse['individual_load'],$comp_details);
         
        }
		echo json_encode($jsonResponse);   
}else{
	$comp_details['individual_load'] = [];
	echo json_encode($comp_details);

}