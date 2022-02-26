<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
	$query = mysqli_query($dbhandle,"SELECT * FROM `ab_notice`");
	$response["devices"] = array();
		while($fetch = mysqli_fetch_array($query)){
		     $device['date']=$fetch['date'];
	    $device['notice']=$fetch['notice'];
	    array_push($response["devices"], $device);
		}
	$response["success"] = true;
    echo json_encode($response);
?>