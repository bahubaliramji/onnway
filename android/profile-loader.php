<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
    $mobile_no=$_POST['mobile_no'];
    $name=$_POST['name'];
    $type=$_POST['type'];
    $transport_name=$_POST['transport_name'];
    $city=$_POST['city'];
    if($type=="1"){
    $query = mysqli_query($dbhandle,"INSERT INTO `provider_profile_tbl` (`mobile_no`, `name`, `transport_name`, `city`) VALUES ('$mobile_no', '$name', '$transport_name', '$city');");
    }
    if($type=="2"){
    $query = mysqli_query($dbhandle,"INSERT INTO `driver_profile_tbl`(`mobile_no`, `name`, `transport_name`, `city`) VALUES ('$mobile_no', '$name', '$transport_name', '$city');");
    }
    $response["msg"] = array();
    if($query)
    {
        $device["msg"] = "Inserted Successfully";

        array_push($response["msg"], $device);
    }
    else
    {
         $device["msg"] = "Not inserted";

        array_push($response["msg"], $device);
    }
    $response["success"] = true;
    echo json_encode($response);
?>