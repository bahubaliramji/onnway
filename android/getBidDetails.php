<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$iidd = $_POST['id'];
$user_id = $_POST['user_id'];
 
 
  $row41 = mysqli_query($dbhandle,"SELECT * FROM `bids` where order_id='$iidd' AND user_id='$user_id' ");
 	    $bc = mysqli_fetch_array($row41);
 	
	$row2 = mysqli_query($dbhandle,"SELECT * FROM `orders` where id='$iidd' ");
    $fetch = mysqli_fetch_array($row2);
	
	$mid = $fetch['material'];
	$tid = $fetch['truck_type'];
	$tid2 = $bc['truck_type'];
	
	$row3 = mysqli_query($dbhandle,"SELECT * FROM `tbl_material` where id='$mid' ");
    $fetch2 = mysqli_fetch_array($row3);
    
    $row4 = mysqli_query($dbhandle,"SELECT * FROM `trucks` where id='$tid' ");
    $fetch3 = mysqli_fetch_array($row4);

    $row5 = mysqli_query($dbhandle,"SELECT * FROM `trucks` where id='$tid2' ");
    $fetch4 = mysqli_fetch_array($row5);
	
	if($fetch['material_image'])
	{
	    $imgg = base_url."Uploads/material/".$fetch['material_image'];
	}
	else
	{
	    $imgg = "";
	}
	
    $response = array(
        "id" => $fetch['id'],
        "user_id" => $fetch['user_id'],
        "laod_type" => $fetch['laod_type'],
        "source" => $fetch['source'],
        "destination" => $fetch['destination'],
        "truck_type" => $fetch3['title'].' '.$fetch3['type'],
        "truck_type2" => $fetch3['type'],
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
        "sourceLAT" => $fetch['sourceLAT'],
        "sourceLNG" => $fetch['sourceLNG'],
        "destinationLAT" => $fetch['destinationLAT'],
        "destinationLNG" => $fetch['destinationLNG'],
        "pickup_pincode" => $fetch['pickup_pincode'],
        "pickup_phone" => $fetch['pickup_phone'],
        "drop_address" => $fetch['drop_address'],
        "drop_city" => $fetch['drop_city'],
        "drop_pincode" => $fetch['drop_pincode'],
        "drop_phone" => $fetch['drop_phone'],
        "remarks" => $fetch['remarks'],
        "length" => $fetch['length'],
        "lat" => $fetch['length'],
        "lng" => $fetch['length'],
        "bid" => "".$bc['amount'],
        "bid_id" => "".$bc['id'],
        "load_passing" => "".$bc['load_passing'],
        "bid_remarks" => "".$bc['remarks'],
        "bid_weight" => "".$bc['weight'],
        "bid_truck_type" => $fetch4['title'].' '.$fetch4['type'],
        "bid_truck_type2" => $fetch4['type'],
        "width" => $fetch['width'],
        "height" => $fetch['height'],
        "quantity" => $fetch['quantity'],
        "material_image" => $imgg,
        "status" => $fetch['status'],
        "created" => $fetch['created'],
        );
    
	    
	    
	    $data = array(
	        "status" => "1",
	        "message" => "Order Details",
	        "data" => $response
	        );
	    
echo json_encode($data);
	    
 	
 	

	    
	    
?>