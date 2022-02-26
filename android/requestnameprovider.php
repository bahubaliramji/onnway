<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
$mobile_no=$_POST['mobile_no'];
$change_name=$_POST['change_name'];
 $row = mysqli_query($dbhandle,"INSERT INTO `name_change_request` SET `user_id`='$mobile_no', `name` = '$change_name'");
 	$response["devices"] = array();
 	
 	$row33 = mysqli_query($dbhandle,"INSERT INTO count SET name = 'read'");
 	
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

 	