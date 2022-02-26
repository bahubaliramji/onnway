<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	$id=$_POST['id'];
	$iid=(int)$id;
	$response["devices"] = array();
	$query = mysqli_query($dbhandle,"SELECT * FROM `full_truck_book_load` where id='$iid'");
 while($fetch = mysqli_fetch_array($query)){
	     
        $device["lat"] = $fetch['lat'];
        $device["lng"] = $fetch['lng'];

        array_push($response["devices"], $device);  }
    
	
	
    echo json_encode($response);
?>
	