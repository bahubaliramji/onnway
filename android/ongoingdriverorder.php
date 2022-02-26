<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
$mobile_no=$_POST['mobile_no'];
 $row = mysqli_query($dbhandle,"SELECT * FROM `full_truck_book_load` where assigned_driver_mobile_no='$mobile_no' ");
 	$response["devices"] = array();
 	
while($fetch = mysqli_fetch_array($row)){
     if($fetch['type']==2){
    if($fetch['item_delivered']!=5){
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
         $device["id"] = $fetch['id']; 
    $device["source"] = $fetch['source'];
    $device["material_type"] = $fetch['material_type'];
    $device["weight"] = $fetch['weight'];
   $device["sch_date"] = $fetch['sch_date'];
   $device["price"] = $fetch['price'];
   $device["money_paid"] = $fetch['price'];
    $device["trucktype"] = $c;
    $device["drop_street"] = $fetch['drop_street'];
$d = $fetch['item_delivered'];
   $device["status"]=(string)$d;
   
   $device["truck_number"]= $fetch['truck_number'];
     $device["destination"] = $fetch['destination'];

     array_push($response["devices"], $device);
	    }
} }}
    echo json_encode($response);
?>