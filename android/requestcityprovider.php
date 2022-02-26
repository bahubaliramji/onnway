<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
$mobile_no=$_POST['mobile_no'];
$change_city=$_POST['change_city'];
 $row = mysqli_query($dbhandle,"UPDATE `provider_profile_tbl` SET `change_city`='$change_city' WHERE `mobile_no`='$mobile_no'");
 	$response["devices"] = array();
 	if($query)
    {
        $device["msg"] = "Inserted Successfully";

        array_push($response["msg"], $device);
    }
    else
    {
       $device["msg"] = "NOt Inserted Successfully";

       array_push($response["msg"], $device);
    }
    $response["success"] = true;
    echo json_encode($response);
    
?>

 	