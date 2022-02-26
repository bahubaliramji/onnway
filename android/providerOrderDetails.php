<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$id = $_POST['id'];
 
 $row2 = mysqli_query($dbhandle,"SELECT * FROM `assigned_orders` where id='$id'");
    
    
	
 	
 	
 	while($fetch3 = mysqli_fetch_array($row2))
 	{
 	    
 	    $oid = $fetch3['order_id'];
 	    $iidd = $fetch3['id'];
 	    $truck_id = $fetch3['truck_id'];
 	    
 	    $fetch = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM orders WHERE id = '$oid'"));
 	    
 	    
 	    $mid = $fetch['material'];
 	$tid = $fetch['truck_type'];
 	
 	$ltype = $fetch['laod_type'];
 	
 	$row3 = mysqli_query($dbhandle,"SELECT * FROM `tbl_material` where id='$mid' ");
    $fetch2 = mysqli_fetch_array($row3);
	
 if($ltype == 'full')
    {
        $row21 = mysqli_query($dbhandle,"SELECT * FROM `trucks` where id='$tid' ");
    $fetch21 = mysqli_fetch_array($row21);
    }
    else
    {
        
        $fetch22 = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM posted_trucks WHERE id = '$truck_id'"));
        
        $ttiidd = $fetch22['truck_type'];
        
        $row21 = mysqli_query($dbhandle,"SELECT * FROM `trucks` where id='$ttiidd' ");
    $fetch21 = mysqli_fetch_array($row21);
    }
	
	
	$pod = array();
	
	$row4 = mysqli_query($dbhandle,"SELECT * FROM `pod` where assign_id='$iidd' AND status = 'active'");
	while($p = mysqli_fetch_array($row4))
	{
	    $pod[] = array(
	        "id" => $p['id'],
	        "assign_id" => $p['assign_id'],
	        "name" => base_url."Uploads/pod/".$p['name'],
	        );
	}
	
	$doc = array();
	
	$row5 = mysqli_query($dbhandle,"SELECT * FROM `documents` where assign_id='$iidd' AND status = 'active'");
	while($p = mysqli_fetch_array($row5))
	{
	    $doc[] = array(
	        "id" => $p['id'],
	        "assign_id" => $p['assign_id'],
	        "name" => base_url."Uploads/documents/".$p['name'],
	        );
	}
	
	if($fetch['material_image'])
	{
	    $imgg = base_url."Uploads/material/".$fetch['material_image'];
	}
	else
	{
	    $imgg = "";
	}
	
	$fetch222 = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM posted_trucks WHERE id = '$truck_id'"));
	
    $response = array(
        "id" => $fetch['id'],
        "user_id" => $fetch['user_id'],
        "laod_type" => $fetch['laod_type'],
        "source" => $fetch['source'],
        "destination" => $fetch['destination'],
        "truck_type" => $fetch21['title'].' '.$fetch21['type'],
        "truck_type2" => $fetch21['type'],
        "schedule" => $fetch['schedule'],
        "weight" => $fetch['weight'],
        "material" => $fetch2['material_name'],
        "freight" => $fetch['freight'],
        "other_charges" => $fetch['other_charges'],
        "cgst" => $fetch['cgst'],
        "sgst" => $fetch['sgst'],
        "insurance" => $fetch['insurance'],
        "paid_percent" => $fetch['paid_percent'],
        "paid_amount" => $fetch['paid_amount'],
        "pickup_address" => $fetch['pickup_address'],
        "pickup_city" => $fetch['pickup_city'],
        "pickup_pincode" => $fetch['pickup_pincode'],
        "pickup_phone" => $fetch['pickup_phone'],
        "drop_address" => $fetch['drop_address'],
        "sourceLAT" => $fetch['sourceLAT'],
        "sourceLNG" => $fetch['sourceLNG'],
        "destinationLAT" => $fetch['destinationLAT'],
        "destinationLNG" => $fetch['destinationLNG'],
        "drop_city" => $fetch['drop_city'],
        "drop_pincode" => $fetch['drop_pincode'],
        "drop_phone" => $fetch['drop_phone'],
        "remarks" => $fetch['remarks'],
        "length" => $fetch['length'],
        "width" => $fetch['width'],
        "height" => $fetch['height'],
        "quantity" => $fetch['quantity'],
        "material_image" => $imgg,
        "status" => $fetch['status'],
        "created" => $fetch['created'],
        "vehicle_number" => $fetch3['vehicle_number'],
        "driver_number" => $fetch3['driver_number'],
        "fare" => $fetch3['fare'],
        "other" => $fetch3['other'],
        "paid" => $fetch3['paid'],
        "truckTypeDetails" => $fetch222['truckTypeDetails'],
        "truckCapacity" => $fetch222['truckCapacity'],
        "boxLength" => $fetch222['boxLength'],
        "boxWidth" => $fetch222['boxWidth'],
        "boxArea" => $fetch222['boxArea'],
        "selectedArea" => $fetch222['selectedArea'],
        "remainingArea" => $fetch222['remainingArea'],
        "selected" => $fetch222['selected'],
        "pod" => $pod,
        "doc" => $doc,
        );
    
	    
	    
	    
	    
 	}
 	
 	$data = array(
	        "status" => "1",
	        "message" => "Data",
	        "data" => $response
	        );
	    
echo json_encode($data);

	    
	    
?>