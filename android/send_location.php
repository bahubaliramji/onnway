<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	$id=$_POST['id'];
	$iid=(int)$id;
	$lat=$_POST['lat'];
	$lng=$_POST['lng'];
	$query = mysqli_query($dbhandle,"UPDATE `full_truck_book_load` SET `lat`='$lat',`lng`='$lng' WHERE id='$iid'");
	$response["msg"] = array();
    if($query)
    {
        $device["msg"] = "Inserted Successfully";

        array_push($response["msg"], $device);
    }
    else
    {
       $device["msg"] = "Not Inserted Successfully";

       array_push($response["msg"], $device);
    }
    $response["success"] = true;
    echo json_encode($response);
?>
	