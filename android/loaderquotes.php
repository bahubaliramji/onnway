<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
    $mobile_no=$_POST['mobile_no'];
    $rw=mysqli_query($dbhandle,"SELECT * FROM `full_quote_details` where mobile_no='$mobile_no'");
    
    $response["users"] = array();
    while($fetch=mysqli_fetch_array($rw)){
        $user["quoteId"] = $fetch['quote_id']; 
        $user["quoteDate"] = $fetch['sch_date']; 
        $user["sourceAddress"] = $fetch['source']; 
        $user["destinationAddress"] = $fetch['destination']; 
        $user["materialType"] = $fetch['material_type']; 
        $user["materialWeight"] = $fetch['weight']; 
            $user["payableFreight"] = $fetch['final_price']; 
            array_push($response["users"], $user);
        }
        	echo json_encode($response);
?>