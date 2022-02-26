<?php
session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	$mobile_no=$_POST['mobile_no'];
	$source=$_POST['source'];
	$destination=$_POST['destination'];
	$query = mysqli_query($dbhandle,"DELETE FROM `provider_source_des` WHERE mobile_no='$mobile_no' AND source='$source' AND destination='$destination'");
	$response["msg"] = array();
    if($query)
    {
        $device["msg"] = "Deleted Successfully";

        array_push($response["msg"], $device);
    }
    else
    {
       $device["msg"] = "Not deleted ";

       array_push($response["msg"], $device);
    }
    $response["success"] = true;
    echo json_encode($response);
?>