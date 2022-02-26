<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$user_id = $_POST['user_id'];
$subject = $_POST['subject'];
$mesage = $_POST['mesage'];

 
 $insquery = "INSERT INTO `feedback`
 (`user_id` , `subject` , `mesage`) VALUES 
 ('$user_id', '$subject', '$mesage')";
 
 $row = mysqli_query($dbhandle,$insquery);
 	$iidd = mysqli_insert_id($dbhandle);
 	
 	if($row)
 	{
	    
	    $row33 = mysqli_query($dbhandle,"INSERT INTO count SET feedback = 'read'");
	    
	    $data = array(
	        "status" => "1",
	        "message" => "Feedback submitted successfully",
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
 	

	    
	    
?>