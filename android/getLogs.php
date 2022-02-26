<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$order_id = $_POST['order_id'];
 
 	$qqq1 = mysqli_query($dbhandle,"SELECT * FROM delivery_logs WHERE order_id = '$order_id' ORDER BY created DESC LIMIT 1");
$data1 = mysqli_fetch_array($qqq1);	



$qqq2 = mysqli_query($dbhandle,"SELECT * FROM orders WHERE id = '$order_id'");
$data2 = mysqli_fetch_array($qqq2);	

$mylat = $data2['destinationLAT'];
$mylng = $data2['destinationLNG'];

$driverlat = $data1['lat'];
$driverlng = $data1['lng'];


		
 	$post_data = array(
 			 "status" => '1',
 			 "message" => 'Data',
 			 "mylat" => $mylat,
 			 "mylng" => $mylng,
 			 "driverlat" => $driverlat,
 			 "driverlng" => $driverlng 
			 );
 	
	

						 
						 
	
	
 		
	
	
	
	
 	
 	$post_data= json_encode( $post_data );
 	
 	echo $post_data;
 	
 	

	    
	    
?>