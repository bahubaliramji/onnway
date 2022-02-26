<?php
session_start();
error_reporting(0);
include("../controls/define.php");
include("../admin/inc/db.php");

$user_id = $_POST['user_id'];
$id = $_POST['id'];
$amount = $_POST['amount'];

$laod_type = $_POST['laod_type'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$truck_type = $_POST['truck_type'];
$schedule = $_POST['schedule'];
$weight = $_POST['weight'];
$load_passing = $_POST['load_passing'];
$remarks = $_POST['remarks'];
$length = $_POST['length'];
$width = $_POST['width'];
$height = $_POST['height'];
$mid = $_POST['mid'];
$truckTypeDetails = $_POST['truckTypeDetails'];
$truckCapacity = $_POST['truckCapacity'];
$boxLength = $_POST['boxLength'];
$boxWidth = $_POST['boxWidth'];
$boxArea = $_POST['boxArea'];
$selectedArea = $_POST['selectedArea'];
$remainingArea = $_POST['remainingArea'];
$selected = $_POST['selected'];


$bquery = mysqli_query($dbhandle, "SELECT * FROM `orders` where id='$id' ");
$bfetch = mysqli_fetch_array($bquery);

$cre = $bfetch['created'];
$cre = strtotime($cre);

$cre = $cre + 3600;


$curr = date('Y-m-d H:i:s');
$curr = strtotime($curr);


if ($curr <= $cre) {
	$insquery = "INSERT INTO `bids`
 (`order_id` , `user_id` , `amount`, `laod_type` , `source` , `destination` , `truck_type` , `schedule` , `weight` , 
 `load_passing` , `remarks` , `length` , `width` , `height` , `status` , `material`, `truckTypeDetails`, `truckCapacity`, `boxLength`, `boxWidth`, `boxArea`, `selectedArea`, `remainingArea`, `selected`) VALUES 
 ('$id', '$user_id', '$amount', '$laod_type', '$source', '$destination', '$truck_type', '$schedule', '$weight', 
 '$load_passing', '$remarks', '$length', '$width', '$height', 'posted' , '$mid', '$truckTypeDetails', '$truckCapacity', '$boxLength', '$boxWidth', '$boxArea', '$selectedArea', '$remainingArea', '$selected')";

	$row = mysqli_query($dbhandle, $insquery);
	$iidd = mysqli_insert_id($dbhandle);

	if ($row) {

		$row2 = mysqli_query($dbhandle, "SELECT * FROM `bids` where id='$iidd' ");
		$fetch = mysqli_fetch_array($row2);

		$response = array(
			"id" => $fetch['id'],
			"order_id" => $fetch['order_id'],
			"user_id" => $fetch['user_id'],
			"amount" => $fetch['amount'],
			"created" => $fetch['created'],
		);



		$data = array(
			"status" => "1",
			"message" => "Bid placed successfully",
			"data" => $response
		);

		echo json_encode($data);
	} else {
		$data = array(
			"status" => "0",
			"message" => "Some error occurred",
			"data" => (object)[]
		);

		echo json_encode($data);
	}
} else {
	$data = array(
		"status" => "0",
		"message" => "The bid has ended",
		"data" => (object)[]
	);

	echo json_encode($data);
}
