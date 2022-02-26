<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
    $mobile_no=$_POST['mobile_no'];
    $source=$_POST['source'];
    $destination=$_POST['destination'];
    $truck_type=$_POST['truck_type'];
    $weight=$_POST['weight'];
    $material_type=$_POST['material_type'];
    $sch_date=$_POST['sch_date'];
    $pickup_street=$_POST['pickup_street'];
    $pickup_pincode=$_POST['pickup_pincode'];
    $drop_street=$_POST['drop_street'];
    $drop_pincode=$_POST['drop_pincode'];
    $price=$_POST['price'];
    $lid=$_POST['load_type'];
   $quote_id=$_POST['quote_id'];
   if($quote_id==0){
    $q= mysqli_query($dbhandle,"INSERT INTO `full_truck_book_load`(`load_type`, `loader_mobile_no`, `source`, `destination`, `material_type`, `weight`, `vehicle_type`, `sch_date`, `price`, `pickup_street`, `pickup_pincode`, `drop_street`, `drop_pincode`) VALUES ('$lid','$mobile_no','$source','$destination','$material_type','$weight','$vid','$sch_date','$price','$pickup_street','$pickup_pincode','$drop_street','$drop_pincode')");
   }
   else
   {
       $q= mysqli_query($dbhandle,"INSERT INTO `full_truck_book_load`(`load_type`, `loader_mobile_no`, `source`, `destination`, `material_type`, `weight`, `vehicle_type`, `sch_date`, `price`, `pickup_street`, `pickup_pincode`, `drop_street`, `drop_pincode`) VALUES ('$lid','$mobile_no','$source','$destination','$material_type','$weight','$vid','$sch_date','$price','$pickup_street','$pickup_pincode','$drop_street','$drop_pincode')");
       $p=mysqli_query($dbhandle,"DELETE FROM `full_quote_details` WHERE `quote_id`='$quote_id'");
   }
     $response["devices"] = array();
 	if($query)
    {
        $device["msg"] = "Inserted Successfully";

        array_push($response["msg"], $device);
    }
    else
    {
       $device["msg"] = "NOt Inserted Successfully";

       array_push($response["msg"], $device);
    }
    $response["success"] = true;
    echo json_encode($response);
?>