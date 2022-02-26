<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$iidd = $_POST['id'];
 
 
  $row7 = mysqli_query($dbhandle,"SELECT * FROM `assigned_orders` where order_id='$iidd'");
 $fetch4 = mysqli_fetch_array($row7);
 
 $iidd1 = $fetch4['id'];
 $truck_id = $fetch4['truck_id'];
 	
	$row2 = mysqli_query($dbhandle,"SELECT * FROM `orders` where id='$iidd' ");
    $fetch = mysqli_fetch_array($row2);
	
	$mid = $fetch['material'];
	$tid = $fetch['truck_type'];
	$ltype = $fetch['laod_type'];
	
	$row32323 = mysqli_query($dbhandle,"SELECT * FROM `order_lr` where order_id='$iidd' ");
    $lrcount = mysqli_num_rows($row32323);


	$row3 = mysqli_query($dbhandle,"SELECT * FROM `tbl_material` where id='$mid' ");
    $fetch2 = mysqli_fetch_array($row3);
    
    if($ltype == 'full')
    {
        $row6 = mysqli_query($dbhandle,"SELECT * FROM `trucks` where id='$tid' ");
    $fetch3 = mysqli_fetch_array($row6);
    }
    else
    {
        
        $fetch22 = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM posted_trucks WHERE id = '$truck_id'"));
        
        $ttiidd = $fetch22['truck_type'];
        if($ttiidd == null)
        {
            $ttiidd = $tid;
        }
        
        $row6 = mysqli_query($dbhandle,"SELECT * FROM `trucks` where id='$ttiidd' ");
    $fetch3 = mysqli_fetch_array($row6);
    }
    
	
	
	
	$pod = array();
	
	$row4 = mysqli_query($dbhandle,"SELECT * FROM `pod` where assign_id='$iidd1' AND status = 'active'");
	while($p = mysqli_fetch_array($row4))
	{
	    $pod[] = array(
	        "id" => $p['id'],
	        "assign_id" => $p['assign_id'],
	        "name" => base_url."Uploads/pod/".$p['name'],
	        );
	}
	
	$doc = array();
	
	$row5 = mysqli_query($dbhandle,"SELECT * FROM `documents` where assign_id='$iidd1' AND status = 'active'");
	while($p = mysqli_fetch_array($row5))
	{
	    $doc[] = array(
	        "id" => $p['id'],
	        "assign_id" => $p['assign_id'],
	        "name" => base_url."Uploads/documents/".$p['name'],
	        );
	}
	
	$lr = array();
	
	$row8 = mysqli_query($dbhandle,"SELECT * FROM `lr` where assign_id='$iidd1' AND status = 'active'");
	while($p = mysqli_fetch_array($row8))
	{
	    $lr[] = array(
	        "id" => $p['id'],
	        "assign_id" => $p['assign_id'],
	        "name2" => $p['name'],
	        "name" => base_url."Uploads/lr/".$p['name'],
	        );
	}
	
	
	$invoice = array();
	
	$row9 = mysqli_query($dbhandle,"SELECT * FROM `invoice` where assign_id='$iidd1' AND status = 'active'");
	while($p = mysqli_fetch_array($row9))
	{
	    $invoice[] = array(
	        "id" => $p['id'],
	        "assign_id" => $p['assign_id'],
	        "name" => base_url."Uploads/invoice/".$p['name'],
	        );
	}
	
	$pc = $fetch['promo_code'];
	
	$row61 = mysqli_query($dbhandle,"SELECT * FROM `promo` where id='$pc' ");
    $fetch31 = mysqli_fetch_array($row61);
	
	$uid = $fetch['user_id'];
	
	$row62 = mysqli_query($dbhandle,"SELECT * FROM `receipt` where order_id='$iidd' AND user_id = '$uid' AND type = '90' ORDER BY created DESC");
    $fetch32 = mysqli_fetch_array($row62);
    
    $p80 = $fetch32['status'];
    
    if(empty($p80))
    {
        $p80 = 'pending';
    }
	
	$row621 = mysqli_query($dbhandle,"SELECT * FROM `receipt` where order_id='$iidd' AND user_id = '$uid' AND type = '100'");
    $fetch321 = mysqli_fetch_array($row621);
    
    $p100 = $fetch321['status'];
    
    if(empty($p100))
    {
        $p100 = 'pending';
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
	
    $freight = $fetch['freight'];
    $discount = $fetch['discount'];
    $discvalue = ($discount / 100) * $freight;

    $response = array(
        "id" => $fetch['id'],
        "user_id" => $fetch['user_id'],
        "assign_id" => $iidd1,
        "laod_type" => $fetch['laod_type'],
        "source" => $fetch['source'],
        "destination" => $fetch['destination'],
        "truck_type" => $fetch3['title'].' '.$fetch3['type'],
        "truck_type2" => $fetch3['type'],
        "schedule" => $fetch['schedule'],
        "weight" => $fetch['weight'],
        "material" => $fetch2['material_name'],
        "freight" => $freight,
        "discount" => $discount,
        "discvalue" => "".$discvalue,
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
        "material_image" => $imgg,
        "status" => $fetch['status'],
        "created" => $fetch['created'],
        "insurance_used" => $fetch['insurance_used'],
        "vehicle_number" => $fetch4['vehicle_number'],
        "driver_number" => $fetch4['driver_number'],
        "pod" => $pod,
        "doc" => $doc,
        "lr" => $lr,
        "per80" => $p80,
        "per100" => $p100,
        "promo_code" => $fetch31['code'],
        "pvalue" => $fetch['pvalue'],
        "invoice" => $invoice,
        "truckTypeDetails" => $fetch222['truckTypeDetails'],
        "truckCapacity" => $fetch222['truckCapacity'],
        "boxLength" => $fetch222['boxLength'],
        "boxWidth" => $fetch222['boxWidth'],
        "boxArea" => $fetch222['boxArea'],
        "selectedArea" => $fetch222['selectedArea'],
        "remainingArea" => $fetch222['remainingArea'],
        "selected" => $fetch222['selected'],
        "remarks2" => $fetch222['remarks'],
        "lrcount" => $lrcount,
        );
    
	    
	    
	    $data = array(
	        "status" => "1",
	        "message" => "Order Details",
	        "data" => $response
	        );
	    
echo json_encode($data);
