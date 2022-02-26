<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$user_id = $_POST['user_id'];
 
 
	$row2 = mysqli_query($dbhandle,"SELECT * FROM `assigned_orders` where driver_number='$user_id' AND truck_status = 'completed' AND driver_rating = '' LIMIT 1");
	$count = mysqli_num_rows($row2);
	
	if($count > 0)
	{
	    $fetch = mysqli_fetch_array($row2);
	    $data = array(
	        "status" => "1",
	        "message" => $fetch['id'],
	        "data" => (object)[]
	        );
	    
echo json_encode($data);
	}
	else
	{
	    $data = array(
	        "status" => "0",
	        "message" => "No data",
	        "data" => (object)[]
	        );
	    
echo json_encode($data);
	}
	
    
	
	
	    
 	
 	

	    
	    
?>