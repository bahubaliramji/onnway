<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$id = $_POST['id'];

$row7 = mysqli_query($dbhandle,"SELECT * FROM `assigned_orders` where truck_id='$id'");
 $fetch4 = mysqli_num_rows($row7);

if($fetch4 == 0)
{
    $insquery = "UPDATE posted_trucks SET status = 'cancelled' WHERE id = '$id'";
 
 $row = mysqli_query($dbhandle,$insquery);
 	
 	if($row)
 	{    
	    
	    $data = array(
	        "status" => "1",
	        "message" => "Truck cancelled successfully",
	        "data" => (object)[]
	        );
	    
echo json_encode($data);
	    
 	}
 	else
 	{
 	    $data = array(
	        "status" => "0",
	        "message" => "Some error occurred",
	        "data" => (object)[]
	        );
	    
echo json_encode($data);
 	}
}
else
{
    $data = array(
	        "status" => "0",
	        "message" => "Truck has been assigned to a Booking. Please contact Support to cancel this truck",
	        "data" => (object)[]
	        );
	    
echo json_encode($data);
}

 
 	

	    
	    
?>