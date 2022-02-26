<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$iidd = $_POST['id'];
 
 
 	
	$row2 = mysqli_query($dbhandle,"SELECT * FROM `posted_trucks` where id='$iidd' ");
    $fetch = mysqli_fetch_array($row2);
	
	$tid = $fetch['truck_type'];
	$mid = $fetch['material'];
    
    $row4 = mysqli_query($dbhandle,"SELECT * FROM `trucks` where id='$tid' ");
    $fetch3 = mysqli_fetch_array($row4);
	
	$row3 = mysqli_query($dbhandle,"SELECT * FROM `tbl_material` where id='$mid' ");
    $fetch2 = mysqli_fetch_array($row3);
	
    $response = array(
        "id" => $fetch['id'],
        "user_id" => $fetch['user_id'],
        "laod_type" => $fetch['laod_type'],
        "source" => $fetch['source'],
        "destination" => $fetch['destination'],
        "material" => $fetch2['material_name'],
        "truck_type" => $fetch3['title'].' '.$fetch3['type'],
        "truck_type2" => $fetch3['type'],
        "schedule" => $fetch['schedule'],
        "weight" => $fetch['weight'],
        "load_passing" => $fetch['load_passing'],
        "remarks" => $fetch['remarks'],
        "length" => $fetch['length'],
        "width" => $fetch['width'],
        "height" => $fetch['height'],
        "truckTypeDetails" => $fetch['truckTypeDetails'],
        "truckCapacity" => $fetch['truckCapacity'],
        "boxLength" => $fetch['boxLength'],
        "boxWidth" => $fetch['boxWidth'],
        "boxArea" => $fetch['boxArea'],
        "selectedArea" => $fetch['selectedArea'],
        "remainingArea" => $fetch['remainingArea'],
        "selected" => $fetch['selected'],
        "status" => $fetch['status'],
        "created" => $fetch['created'],
        );
    
	    
	    
	    $data = array(
	        "status" => "1",
	        "message" => "Truck Details",
	        "data" => $response
	        );
	    
echo json_encode($data);
	    
 	
 	

	    
	    
?>