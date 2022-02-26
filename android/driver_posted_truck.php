<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
$mobile_no=$_POST['mobile_no'];
 $row = mysqli_query($dbhandle,"SELECT * FROM `full_posted_truck` where mobile_no='$mobile_no' ORDER BY posted_truck_id DESC");
 	$response["devices"] = array();
 	
while($fetch = mysqli_fetch_array($row)){
    
    if($fetch['type']==2){
     $vid=$fetch['vehicle_type'];
	    
	    $query1 = mysqli_query($dbhandle,"SELECT * FROM `vehicle_list` where id='$vid'");
	    while($fetch1 = mysqli_fetch_array($query1)){
	        $v_type=$fetch1['vehicle_type'];
	        $dimension=$fetch1['dimension'];
	        $length=$fetch1['length'];
	        
	        if($v_type==1){
	            $vec_type="Truck";
	        }
	        if($v_type==2){
	            $vec_type="Trailer";
	        }
	        if($v_type==3){
	            $vec_type="Container";
	        }
	        $c=$vec_type.' '.$length.' mt '.$dimension;
	        	$truckid=$fetch['posted_truck_id'];
           $row1 = mysqli_query($dbhandle,"SELECT * FROM `full_posted_truck_destination` where posted_truck_id='$truckid'");

	
while($fetch2 = mysqli_fetch_array($row1)){
    $device["source"] = $fetch['source'];
   $device["sch_date"] = $fetch['sch_date'];
    $device["trucktype"] = $c;
   
     $device["destination"] = $fetch2['destination'];

     array_push($response["devices"], $device);
	  }  }
} }
    echo json_encode($response);
?>