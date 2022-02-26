<?php
require_once('config.php');
$jsonResponse = array("vehicle_agent_ap"=>array());
$query = mysql_query("select * from tbl_agent");

if (mysql_num_rows($query) > 0){
	while($data = mysql_fetch_array($query)){
		
$comp_details= array(
        'agent_id' => $data['agent_id'],
		'f_name' => $data['f_name'],
		
    );
	array_push($jsonResponse['vehicle_agent_ap'],$comp_details);
         
        }
		echo json_encode($jsonResponse);   
}else{
	$comp_details['vehicle_agent_ap'] = [];
	echo json_encode($comp_details);

}