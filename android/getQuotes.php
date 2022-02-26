<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$user_id = $_POST['user_id'];
 
 $row2 = mysqli_query($dbhandle,"SELECT * FROM `orders` where user_id='$user_id' AND (status = 'accepted quote') ORDER BY created DESC ");
    
	$response = array();
 	
 	while($fetch = mysqli_fetch_array($row2))
 	{
 	    
 	    $mid = $fetch['material'];
 	
 	$oid = $fetch['id'];
 	
 	$row212 = mysqli_query($dbhandle,"SELECT * FROM `bids` where order_id='$oid' AND status = 'accepted'");
    $fetch212 = mysqli_fetch_array($row212);
 	
 	$tid = $fetch212['truck_type'];
 	$bid_id = $fetch212['id'];
 	
 	$row3 = mysqli_query($dbhandle,"SELECT * FROM `tbl_material` where id='$mid' ");
    $fetch2 = mysqli_fetch_array($row3);
	
	$row21 = mysqli_query($dbhandle,"SELECT * FROM `trucks` where id='$tid' ");
    $fetch21 = mysqli_fetch_array($row21);
	
		
	
    $response[] = array(
        "id" => $fetch['id'],
        "user_id" => $fetch['user_id'],
        "laod_type" => $fetch['laod_type'],
        "source" => $fetch['source'],
        "destination" => $fetch['destination'],
        "truck_type" => $fetch21['title'].' '.$fetch21['type'],
        "truck_type2" => $fetch21['type'],
        "bid_id" => $bid_id,
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
        "drop_city" => $fetch['drop_city'],
        "drop_pincode" => $fetch['drop_pincode'],
        "drop_phone" => $fetch['drop_phone'],
        "remarks" => $fetch['remarks'],
        "length" => $fetch['length'],
        "width" => $fetch['width'],
        "height" => $fetch['height'],
        "quantity" => $fetch['quantity'],
        "status" => $fetch['status'],
        "created" => $fetch['created'],
        );
    
	    
	    
	    
	    
 	}
 	
 	$row331 = mysqli_query($dbhandle,"UPDATE loader_count SET quotes = 'unread' WHERE user_id = '$user_id'");
 	
 	$data = array(
	        "status" => "1",
	        "message" => "Data",
	        "data" => $response
	        );
	    
echo json_encode($data);

	    
	    
?>