<?php
require_once('config.php');
$jsonResponse = array("bookload"=>array());
$query = mysql_query("select * from tbl_book_load");

if (mysql_num_rows($query) > 0){
	while($data = mysql_fetch_array($query)){
		

		$comp_details= array(
        'book_load_id' => $data['book_load_id'],
		'source' => $data['source'],
		
    );
	array_push($jsonResponse['bookload'],$comp_details);
         
        }
		echo json_encode($jsonResponse);   
}else{
	$comp_details['bookload'] = [];
	echo json_encode($comp_details);

}