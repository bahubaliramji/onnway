<?php
session_start();
error_reporting(0);
include("../controls/define.php");
include("../admin/inc/db.php");

$mobile_no = $_POST['user_id'];
$vehicle_type = $_POST['trucktype'];
$reg_no = $_POST['truck_reg_no'];
$driverName = $_POST['driver_name'];
$driverNumber = $_POST['driver_mobile_no'];

$imm1 = '';
$imm2 = '';

$ythumb1 = $_FILES['front']['name'];
$ytmp_thumb1 = $_FILES['front']['tmp_name'];
$ypath1 = "Uploads/trucks/" . $ythumb1;
if (move_uploaded_file($ytmp_thumb1, $ypath1)) {
	$imm1 = $ythumb1;
}


	$ythumb2 = $_FILES['back']['name'];
	$ytmp_thumb2 = $_FILES['back']['tmp_name'];
	$ypath2 = "Uploads/trucks/" . $ythumb2;
	if (move_uploaded_file($ytmp_thumb2, $ypath2)) {
		$imm2 = $ythumb2;
	}


	$query = mysqli_query($dbhandle, "INSERT INTO `mytrucksprovider`
    	(`provider_mobile_no`, `truck_reg_no`, `driver_name`, `driver_mobile_no`, `vehicle_type`,`front`,`back`) VALUES 
    	('$mobile_no','$reg_no','$driverName','$driverNumber','$vehicle_type','$imm1' , '$imm2')");


	if ($query) {
		$data = array(
			"status" => "1",
			"message" => "Truck added successfully"
		);

		echo json_encode($data);
	} else {
		$data = array(
			"status" => "0",
			"message" => "Some error occurred"
		);

		echo json_encode($data);
	}

