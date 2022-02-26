<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	$query = mysqli_query($dbhandle,"SELECT * FROM `full_quote_details` ORDER BY quote_id DESC");
	$response["devices"] = array();
	while($fetch = mysqli_fetch_array($query)){
	    
	    $vid=$fetch['vehicle_type'];
	    
	    $query1 = mysqli_query($dbhandle,"SELECT * FROM `vehicle_list` where id='$vid'");
	    while($fetch1 = mysqli_fetch_array($query1)){
	        $v_type=$fetch1['vehicle_type'];
	        $dimension=$fetch1['dimension'];
	        if($v_type==1){
	            $vec_type="Truck";
	        }
	        if($v_type==2){
	            $vec_type="Trailer";
	        }
	        if($v_type==3){
	            $vec_type="Container";
	        }
	    $device['slat']=$fetch['slat'];
	    $device['slng']=$fetch['slng'];
	    $device['dlat']=$fetch['dlat'];
	    $device['dlng']=$fetch['dlng'];
	    $device['quote_id']=$fetch['quote_id'];
        $device["source"] = $fetch['source'];
        $device["destination"] = $fetch['destination'];
        $device["trucktype"] = $vec_type;
        $device["trucktype1"] = $fetch1['dimension'];
        $device["material"] = $fetch['material_type'];
        $device["weight"] = $fetch['weight'];
        $device["sch_date"] = $fetch['sch_date'];

        array_push($response["devices"], $device);  }
    
	}
	$response["success"] = true;
    echo json_encode($response["devices"]);
?>