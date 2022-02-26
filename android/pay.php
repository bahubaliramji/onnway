<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$order_id = $_POST['order_id'];
$user_id = $_POST['user_id'];
$type = $_POST['type'];
$pid = $_POST['pid'];
$pvalue = $_POST['pvalue'];
$insused = $_POST['insused'];
$inin = $_POST['inin'];
$isinsurance = $_POST['isinsurance'];
$amount = $_POST['amount'];


$row21 = mysqli_query($dbhandle,"SELECT * FROM `orders` where id='$order_id' ");
    $fetch = mysqli_fetch_array($row21);

$amm = $fetch['paid_amount'];

$amount = $amount + $amm;
    	
    	$row2 = mysqli_query($dbhandle,"UPDATE `orders` SET 
`paid_amount` = '$amount',
`paid_percent` = '$type',
`promo_code` = '$pid',
`pvalue` = '$pvalue',
`insurance_used` = '$insused'
WHERE id = '$order_id'");
    	
    	if($row2)
    	{
    	    
    	    
    	    //$row33 = mysqli_query($dbhandle,"INSERT INTO count SET receipts = 'read'");
    	    
    	    
    	    $data = array(
	        "status" => "1",
	        "message" => "Paid Successfully"
	        );
	    
echo json_encode($data);
    	}
    	else
    	{
    	    $data = array(
	        "status" => "0",
	        "message" => "Some error occurred"
	        );
	    
echo json_encode($data);
    	}
    	

	
	

	
	

 
 
    

	    
	    
?>