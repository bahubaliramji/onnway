<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
    $mobile_no=$_POST['mobile_no'];
    $name=$_POST['user_name'];
    $type=$_POST['user_type'];
    $email=$_POST['user_email'];
    $city=$_POST['user_city'];
    $address=$_POST['user_address'];
    //echo $name;
    //echo $mobile_no;
    //echo $email;
    //echo $city;
    //echo $type;
    //echo $address;
    $query = mysqli_query($dbhandle,"INSERT INTO `loader_profile_tbl`(`mobile_no`, `name`, `email`, `city`, `type`, `address`) VALUES (
        '$mobile_no','$name','$email','$city','$type','$address');");
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