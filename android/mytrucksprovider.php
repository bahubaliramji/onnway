<?php
    	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
$provider_mobile_no=$_POST['user_id'];

$row = mysqli_query($dbhandle,"SELECT * FROM `mytrucksprovider` WHERE provider_mobile_no='$provider_mobile_no'");
 
 	$response = array();
 	
while($fetch = mysqli_fetch_array($row)){
     
     $tid = $fetch['vehicle_type'];
     
        
	    $row21 = mysqli_query($dbhandle,"SELECT * FROM `trucks` where id='$tid' ");
    $fetch21 = mysqli_fetch_array($row21);
	    
	    $response[] = array(
        "truck_reg_no" => $fetch['truck_reg_no'],
        "trucktype" => $fetch21['title'].' '.$fetch21['type'],
        "truck_type2" => $fetch21['type'],
        "driver_name" => $fetch['driver_name'],
        "driver_mobile_no" => $fetch['driver_mobile_no'],
        );
	    
}
$data = array(
	        "status" => "1",
	        "message" => "Data",
	        "data" => $response
	        );
	    
echo json_encode($data);
?>