<?php
session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	$mobile_no=$_POST['mobile_no'];
	$source=$_POST['source'];
	$destination=$_POST['destination'];
	$query = mysqli_query($dbhandle,"INSERT INTO `provider_source_des`(`mobile_no`, `source`, `destination`) VALUES ('$mobile_no','$source','$destination')");
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