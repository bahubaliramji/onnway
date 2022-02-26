<?php 
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
$quote_id=$_POST['quote_id'];
$mobile_no=$_POST['mobile_no'];
$bid_price=$_POST['bid_price'];

	$query = mysqli_query($dbhandle,"INSERT INTO `full_bid_for_quotes`(`quote_id`, `mobile_no`, `bid_price`) VALUES ('$quote_id','$mobile_no','$bid_price')");
	$response["msg"] = array();
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
