<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
$mobile_no=$_POST['mobile_no'];
 $row = mysqli_query($dbhandle,"SELECT * FROM `driver_source_des` where mobile_no='$mobile_no' ");
 	$response["devices"] = array();
 	
while($fetch = mysqli_fetch_array($row)){
     $device["source"] = $fetch['source'];
      $device["destination"] = $fetch['destination'];

     array_push($response["devices"], $device);
	    }
echo json_encode($response);
?>