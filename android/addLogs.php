<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$delivery_id = $_POST['delivery_id'];
  $order_id = $_POST['order_id'];
  $lat = $_POST['lat'];
  $lng = $_POST['lng'];


    	
    	$row2 = mysqli_query($dbhandle,"INSERT INTO delivery_logs (delivery_id , order_id , lat , lng) VALUES ('$delivery_id','$order_id','$lat','$lng')");
    	
    	if($row2)
    	{
    	    $data = array(
	        "status" => "1",
	        "message" => "Updated Successfully"
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