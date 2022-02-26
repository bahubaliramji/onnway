<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$user_id = $_POST['user_id'];
$laod_type = $_POST['laod_type'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$truck_type = $_POST['truck_type'];
$schedule = $_POST['schedule'];
$weight = $_POST['weight'];
$material = $_POST['material'];
$freight = $_POST['freight'];
$other_charges = $_POST['other_charges'];
$cgst = $_POST['cgst'];
$sgst = $_POST['sgst'];
$insurance = $_POST['insurance'];
$paid_percent = $_POST['paid_percent'];
$paid_amount = $_POST['paid_amount'];
$pickup_address = $_POST['pickup_address'];
$pickup_city = $_POST['pickup_city'];
$pickup_pincode = $_POST['pickup_pincode'];
$pickup_phone = $_POST['pickup_phone'];
$drop_address = $_POST['drop_address'];
$drop_city = $_POST['drop_city'];
$drop_pincode = $_POST['drop_pincode'];
$drop_phone = $_POST['drop_phone'];
$remarks = $_POST['remarks'];
$length = $_POST['length'];
$width = $_POST['width'];
$height = $_POST['height'];
$quantity = $_POST['quantity'];
 
 $insquery = "INSERT INTO `orders`
 (`user_id` , `laod_type` , `source` , `destination` , `schedule` , `weight` , 
 `material` , `paid_percent` , `paid_amount` , 
 `pickup_address` , `pickup_city` , `pickup_pincode` , `pickup_phone` , `drop_address` , `drop_city` , `drop_pincode`, 
 `drop_phone` , `remarks` , `length` , `width` , `height` , `quantity` , `status`) VALUES 
 ('$user_id', '$laod_type', '$source', '$destination', '$schedule', '$weight', 
 '$material', '$paid_percent', '$paid_amount', 
 '$pickup_address', '$pickup_city', '$pickup_pincode', '$pickup_phone', '$drop_address', '$drop_city', '$drop_pincode', 
 '$drop_phone', '$remarks', '$length', '$width', '$height', '$quantity', 'requsted for quote')";
 
 $row = mysqli_query($dbhandle,$insquery);
 	$iidd = mysqli_insert_id($dbhandle);
 	
 	if($row)
 	{
 	
	$row2 = mysqli_query($dbhandle,"SELECT * FROM `orders` where id='$iidd' ");
    $fetch = mysqli_fetch_array($row2);
	
    $response = array(
        "id" => $fetch['id'],
        "user_id" => $fetch['user_id'],
        "laod_type" => $fetch['laod_type'],
        "source" => $fetch['source'],
        "destination" => $fetch['destination'],
        "truck_type" => $fetch21['truck_type'],
        "schedule" => $fetch['schedule'],
        "weight" => $fetch['weight'],
        "material" => $fetch['material'],
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
    
	    
	    
	    $data = array(
	        "status" => "1",
	        "message" => "Your booking will be confirmed within 60 minutes!!",
	        "data" => $response
	        );
	    
echo json_encode($data);
	    
 	}
 	else
 	{
 	    $data = array(
	        "status" => "0",
	        "message" => "Some error occurred",
	        "data" => (object)[]
	        );
	    
echo json_encode($data);
 	}
 	

	    
	    
?>