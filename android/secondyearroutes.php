<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	$route_names=$_POST['route_name'];
    $route_name=explode('*',$route_names);
	$bus_number=$_POST['bus_number'];
	
		for($i=0;$i<count($route_name);$i++){
				  mysqli_query($dbhandle,"INSERT INTO `secondyear_route`( `route_name`,`bus_number`) VALUES ('$route_name[$i]','$bus_number')"); 
				 
			}
	$response["msg"] = array();
    
        $device["msg"] = "Inserted Successfully";

        array_push($response["msg"], $device);
    
    $response["success"] = true;
    echo json_encode($response);
?>

