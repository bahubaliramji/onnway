<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$order_id = $_POST['order_id'];
$user_id = $_POST['user_id'];


    	$imm = $ythumb;
    	
    	$row2 = mysqli_query($dbhandle,"INSERT INTO get_call (
    	    order_id ,
    	    user_id
    	    ) VALUES (
    	        '$order_id' ,
    	        '$user_id'
    	        )");
    	
    	if($row2)
    	{
    	    
    	    
    	    $row33 = mysqli_query($dbhandle,"INSERT INTO count SET get_call = 'read'");
    	    
    	    
    	    $data = array(
	        "status" => "1",
	        "message" => "Request sent successfully"
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