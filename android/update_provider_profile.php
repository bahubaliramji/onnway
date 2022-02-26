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

$qqq = mysqli_query($dbhandle , "UPDATE users SET type = '$user' WHERE id = '$user_id'");


 $insquery = "INSERT INTO `provider_profile_tbl`
 (`user_id` , `name` , `transport_name` , `city`) VALUES 
 ('$user_id', '$name', '$transport_name', '$city')";
 
 $row = mysqli_query($dbhandle,$insquery);
 	$iidd = mysqli_insert_id($dbhandle);
 	
 	if($row)
 	{
 	
	$row2 = mysqli_query($dbhandle,"SELECT * FROM `provider_profile_tbl` where id='$iidd' ");
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
	        "message" => "Profile added successfully",
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