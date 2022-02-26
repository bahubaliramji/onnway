<?php
ob_start();
session_start();
include 'inc/admindb.php';


$id = $_POST['id'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$truck_type = $_POST['type'];
$schedule = $_POST['schedule'];
$weight = $_POST['weight'];
$material = $_POST['material'];
$pickup_address = $_POST['pickup_address'];
$pickup_city = $_POST['pickup_city'];
$pickup_pincode = $_POST['pickup_pincode'];
$pickup_phone = $_POST['pickup_phone'];
$drop_address = $_POST['drop_address'];
$drop_city = $_POST['drop_city'];
$drop_pincode = $_POST['drop_pincode'];
$drop_phone = $_POST['drop_phone'];
$remarks = $_POST['remarks'];
$length = $_POST['length'];
$width = $_POST['width'];
$height = $_POST['height'];
$quantity = $_POST['quantity'];


$query = "UPDATE orders SET 
source = '$source',
destination = '$destination',
truck_type = '$truck_type',
schedule = '$schedule',
weight = '$weight',
material = '$material',
pickup_address = '$pickup_address',
pickup_city = '$pickup_city',
pickup_pincode = '$pickup_pincode',
pickup_phone = '$pickup_phone',
drop_address = '$drop_address',
drop_city = '$drop_city',
drop_pincode = '$drop_pincode',
drop_phone = '$drop_phone',
remarks = '$remarks',
length = '$length',
width = '$width',
height = '$height',
quantity = '$quantity'
WHERE id = '$id'";

$run = mysqli_query($con, $query);

echo $run;
	//echo $_POST['aid'];
