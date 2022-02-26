<?php
include('config.php');

$pid = $_POST['delete_id'];
$jsonResponse = array("delete_address"=>array());

$query = mysql_query("delete from tbl_address_book where id='$pid'");
//if (mysql_num_rows($query) > 0){
	//while($data = mysql_fetch_array($query)){
		

		$comp_details= array(

		'message' => ' Deleted Successfully.',
      
    );
	array_push($jsonResponse['delete_address'],$comp_details);
         
     //   }
	//	echo json_encode($jsonResponse);   
//}else{
	//$comp_details['delete_address'] = [];
	echo json_encode($comp_details);

//}