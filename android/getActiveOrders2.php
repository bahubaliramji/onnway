<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$user_id = $_POST['user_id'];

$userfetch = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM users WHERE id = '$user_id'"));
 
 $ph = $userfetch['phone'];
 
 $row2 = mysqli_query($dbhandle,"SELECT * FROM `assigned_orders` where (user_id='$user_id' OR driver_number='$ph') AND (truck_status = 'active') ORDER BY created DESC ");
    
    
	$response = array();
 	
 	
 	
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
	
	$row4 = mysqli_query($dbhandle,"SELECT * FROM `pod` where assign_id='$iidd'");
	while($p = mysqli_fetch_array($row4))
	{
	    $pod[] = array(
	        "id" => $p['id'],
	        "assign_id" => $p['assign_id'],
	        "name" => base_url."Uploads/pod/".$p['name'],
	        );
	}
	
	$doc = array();
	
	$row5 = mysqli_query($dbhandle,"SELECT * FROM `documents` where assign_id='$iidd'");
	while($p = mysqli_fetch_array($row5))
	{
	    $doc[] = array(
	        "id" => $p['id'],
	        "assign_id" => $p['assign_id'],
	        "name" => base_url."Uploads/documents/".$p['name'],
	        );
	}
	
	
    $response[] = array(
        "id" => $fetch['id'],
        "aid" => $fetch3['id'],
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
        "vehicle_number" => $fetch3['vehicle_number'],
        "driver_number" => $fetch3['driver_number'],
        "fare" => "".($fetch3['fare'] + $fetch3['other']),
        "other" => $fetch3['other'],
        "paid" => $fetch3['paid'],
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