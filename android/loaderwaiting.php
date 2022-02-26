<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
    $mobile_no=$_POST['mobile_no'];
    $rw=mysqli_query($dbhandle,"SELECT * FROM `full_truck_book_load` where loader_mobile_no='$mobile_no' ORDER BY id DESC");
    
    $response["users"] = array();
    while($fetch=mysqli_fetch_array($rw)){
        if($fetch['item_delivered']==0){
        $user["orderId"] = $fetch['id']; 
        $user["loadType"] = $fetch['load_type']; 
        $user["loadStatus"] = $fetch['item_delivered']; 
        $user["orderDate"] = $fetch['sch_date']; 
        $user["sourceAddr"] = $fetch['source']; 
        $user["destinationAddr"] = $fetch['destination']; 
        $user["materialType"] = $fetch['material_type']; 
        $user["materialWeight"] = $fetch['weight']; 
            $user["payableFreight"] = $fetch['price']; 
            array_push($response["users"], $user);
    }    }
        	echo json_encode($response);
?>