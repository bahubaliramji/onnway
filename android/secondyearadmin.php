<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	$route_name=$_POST['changed_route_name'];
	$place=$_POST['place'];
	$bus_number=$_POST['bus_number'];
		for($i=0;$i<count($bus_number);$i++){
				  mysqli_query($dbhandle,"UPDATE `ab_secondyear` SET `changed_route_name`='$route_name[$i]',`place`='$place[$i]',`changed_status`='1' WHERE `bus_number`='$bus_number[$i]'"); 
				 
			}
	$response["msg"] = array();
    
        $device["msg"] = "Inserted Successfully";

        array_push($response["msg"], $device);
    
    $response["success"] = true;
    echo json_encode($response);
?>
