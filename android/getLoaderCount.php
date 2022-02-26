<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
	
$user_id = $_POST['user_id'];
 
      $waitingdata = mysqli_num_rows(mysqli_query($dbhandle , "SELECT * FROM loader_count WHERE waiting = 'read' AND user_id = '$user_id' LIMIT 1"));
      $ordersdata = mysqli_num_rows(mysqli_query($dbhandle , "SELECT * FROM loader_count WHERE orders = 'read' AND user_id = '$user_id' LIMIT 1"));
      $quotesdata = mysqli_num_rows(mysqli_query($dbhandle , "SELECT * FROM loader_count WHERE quotes = 'read' AND user_id = '$user_id' LIMIT 1"));
    
	
 	
 	
 	$data = array(
	        "status" => "1",
	        "message" => "Data",
	        "waitingdata" => $waitingdata,
	        "ordersdata" => $ordersdata,
	        "quotesdata" => $quotesdata,
	        );
	    
echo json_encode($data);

	    
	    
?>