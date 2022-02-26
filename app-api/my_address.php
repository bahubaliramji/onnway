<?php
include('config.php');

$pid = $_POST['user_id'];
$jsonResponse = array("my_address"=>array());
//$query = mysql_query("select * from tbl_address_book where user_id='$pid'");
$query = mysql_query("select * from tbl_address_book where user_id='$pid'");
if (mysql_num_rows($query) > 0){
	while($data = mysql_fetch_array($query)){
		

		$comp_details= array(

		'id' => $data['id'],
        'user_id' => $data['user_id'],
        
		'address' => $data['address'],
		
         'city' => $data['city'],

          'pincode' => $data['pincode'],
      
    );
	array_push($jsonResponse['my_address'],$comp_details);
         
        }
		echo json_encode($jsonResponse);   
}else{
	$comp_details['my_address'] = [];
	echo json_encode($comp_details);

}