<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	$route_name=$_POST['route_name'];
	$route_type=$_POST['route_type'];
	$query = mysqli_query($dbhandle,"SELECT * FROM `ab_secondyear` where `route_name`='$route_name'");
		$response["devices"] = array();
	while($fetch = mysqli_fetch_array($query)){
	    if($fetch['changed_status']=='0'){
	        if($fetch['route_type']==$route_type){
	    $device['bus_number']=$fetch['bus_number'];
	    $device['place']=$fetch['place'];
	    $device['time']=$fetch['time'];
	    array_push($response["devices"], $device);
	 }   }
	}
	$query1 = mysqli_query($dbhandle,"SELECT * FROM `ab_secondyear` where `changed_route_name`='$route_name'");
		
	while($fetch1 = mysqli_fetch_array($query1)){
	    if($fetch1['changed_status']=='1'){
	         if($fetch['route_type']==$route_type){
	    $device['bus_number']=$fetch1['bus_number'];
	    $device['place']=$fetch1['place'];
	    $device['time']=$fetch1['time'];
	    array_push($response["devices"], $device);
	}    }
	}
	$response["success"] = true;
    echo json_encode($response);
?>