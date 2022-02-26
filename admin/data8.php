<?php
ob_start();
session_start();
include 'inc/admindb.php';

$edit_id = $_POST['id'];
$assid = $_POST['assid'];

$source = $_POST['source'];
$destination = $_POST['destination'];
$schedule = $_POST['schedule'];
$weight = $_POST['weight'];
$material = $_POST['material'];
$load_passing = $_POST['load_passing'];
$type = $_POST['type'];
$pickup_pincode = $_POST['pickup_pincode'];
$pickup_phone = $_POST['pickup_phone'];
$drop_address = $_POST['drop_address'];
$drop_city = $_POST['drop_city'];
$drop_pincode = $_POST['drop_pincode'];
$drop_phone = $_POST['drop_phone'];
$remarks = $_POST['remarks'];

$vehicle_number = $_POST['vehicle_number'];
$driver_number = $_POST['driver_number'];


$question_insert = "UPDATE posted_trucks SET 
source = '$source',
destination = '$destination',
schedule = '$schedule',
truck_type = '$type',
load_passing = '$load_passing',
remarks = '$remarks'
WHERE id = '$edit_id'";

$run = mysqli_query($con, $question_insert);

$queryupdate = "UPDATE assigned_orders SET vehicle_number = '$vehicle_number', driver_number = '$driver_number' WHERE id = '$assid'";

$run2 = mysqli_query($con, $queryupdate);

echo $run2;
	//echo $_POST['aid'];
