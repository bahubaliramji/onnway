<?php
include('config.php');

$pid = $_POST['loader_id'];
$jsonResponse = array("my_order"=>array());
$query = mysql_query("select * from tbl_book_load where loader_id='$pid'");

if (mysql_num_rows($query) > 0){
	while($data = mysql_fetch_array($query)){
		

		$comp_details= array(
        'id' => $data['book_load_id'],
        'loader_id' => $data['loader_id'],
        'source' => $data['source'],
		'destination' => $data['destination'],
		'no_of_vehicle' => $data['no_vehicle'],
        'scheduled_date' => $data['scheduled_date'],
         'material_type' => $data['material_type'],
     

        'weight' => $data['weight'],
        /* 'company name' => $data['company_name'],
         'contact no' => $data['contact_no'],
         'address' => $data['address'],*/

    );
	array_push($jsonResponse['my_order'],$comp_details);
         
        }
		echo json_encode($jsonResponse);   
}else{
	$comp_details['my_order'] = [];
	echo json_encode($comp_details);

}