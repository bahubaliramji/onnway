<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$assign_id = $_POST['assign_id'];
$vehicle_number = $_POST['vehicle_number'];
$driver_number = $_POST['driver_number'];


$row2 = mysqli_query($dbhandle,"UPDATE assigned_orders SET vehicle_number = '$vehicle_number', driver_number = '$driver_number' WHERE id = '$assign_id'");
    	
    	if($row2)
    	{
    	    $data = array(
	        "status" => "1",
	        "message" => "Details added successfully"
	        );
	    
echo json_encode($data);
    	}
    	else
    	{
    	    $data = array(
	        "status" => "0",
	        "message" => "Some error occurred"
	        );
	    
echo json_encode($data);
    	}



	

	
	

 
 
    

	    
	    
?>