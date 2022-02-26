<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$city = $_POST['city'];
$type = $_POST['type'];
$company = $_POST['company'];
$gst = $_POST['gst'];



 $insquery = "UPDATE `loader_profile_tbl` SET
 name = '$name',
 email = '$email',
 city = '$city',
 type = '$type',
 company = '$company',
 gst = '$gst' WHERE user_id = '$user_id'";
 
 $row = mysqli_query($dbhandle,$insquery);
 	$iidd = mysqli_insert_id($dbhandle);
 	
 	if($row)
 	{
 	
	$row2 = mysqli_query($dbhandle,"SELECT * FROM `loader_profile_tbl` where id='$iidd' ");
    $fetch = mysqli_fetch_array($row2);
	
    $response = array(
        "id" => $fetch['id'],
        "user_id" => $fetch['user_id'],
        "name" => $fetch['name'],
        "email" => $fetch['email'],
        "city" => $fetch['city'],
        "type" => $fetch['type'],
        "company" => $fetch['company'],
        "created" => $fetch['created'],
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