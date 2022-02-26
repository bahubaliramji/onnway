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


$ythumb = $_FILES['image']['name'];
$ytmp_thumb = $_FILES['image']['tmp_name'];
$ypath1 = "Uploads/receipt/" . $ythumb;
if (move_uploaded_file($ytmp_thumb, $ypath1)) {
	$imm = $ythumb;

	$row2 = mysqli_query($dbhandle, "INSERT INTO receipt (
    	    order_id ,
    	    user_id,
    	    type,
    	    pid,
    	    pvalue,
    	    insused,
    	    inin,
    	    isinsurance,
    	    image
    	    ) VALUES (
    	        '$order_id' ,
    	        '$user_id',
    	        '$type',
    	        '$pid',
    	        '$pvalue',
    	        '$insused',
    	        '$inin',
    	        '$isinsurance',
    	        '$imm'
    	        )");

	if ($row2) {


		$row33 = mysqli_query($dbhandle, "INSERT INTO count SET receipts = 'read'");


		$data = array(
			"status" => "1",
			"message" => "Receipt uploaded successfully"
		);

		echo json_encode($data);
	} else {
		$data = array(
			"status" => "0",
			"message" => "Some error occurred"
		);

		echo json_encode($data);
	}
} else {
	$data = array(
		"status" => "0",
		"message" => "Some error occurred"
	);

	echo json_encode($data);
}
