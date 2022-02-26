<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$user = $_POST['user'];
$transport_name = $_POST['transport_name'];
$city = $_POST['city'];


 $insquery = "UPDATE `provider_profile_tbl`
 SET `transport_name` = '$transport_name', `city` = '$city' WHERE user_id = '$user_id'";
 
 $row = mysqli_query($dbhandle,$insquery);	
 	if($row)
 	{
 	
	$row2 = mysqli_query($dbhandle,"SELECT * FROM `provider_profile_tbl` where user_id='$user_id' ");
    $fetch = mysqli_fetch_array($row2);
	
    $response = array(
        "id" => $fetch['id'],
        "user_id" => $fetch['user_id'],
        "name" => $fetch['name'],
        "email" => $fetch['transport_name'],
        "city" => $fetch['city']
        );
    
	    
	    
	    $data = array(
	        "status" => "1",
	        "message" => "Profile updated successfully",
	        "data" => $response
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