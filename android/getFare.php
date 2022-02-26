<?php
session_start();
error_reporting(0);
include("../controls/define.php");
include("../admin/inc/db.php");

$user_id = $_POST['user_id'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$truck_id = $_POST['truck_id'];
$mid = $_POST['mid'];
$weight = $_POST['weight'];
$schedule = $_POST['schedule'];
$sourceLAT = $_POST['sourceLAT'];
$sourceLNG = $_POST['sourceLNG'];
$destinationLAT = $_POST['destinationLAT'];
$destinationLNG = $_POST['destinationLNG'];

$row = mysqli_query($dbhandle, "SELECT * FROM `fares` where source='$source' AND destination = '$destination' AND truck_id = '$truck_id'");

$row121 = mysqli_query($dbhandle, "INSERT INTO enquiry
 	 (
 	 user_id,
 	 source,
 	 destination,
 	 truck_type,
 	 material,
 	 weight,
 	 schedule,
 	 sourceLAT,
 	 sourceLNG,
 	 destinationLAT,
 	 destinationLNG
 	     ) VALUES
 	     (
 	     '$user_id',
 	     '$source',
 	     '$destination',
 	     '$truck_id',
 	     '$mid',
 	     '$weight',
 	     '$schedule',
 	     '$sourceLAT',
 	     '$sourceLNG',
 	     '$destinationLAT',
 	     '$destinationLNG'
 	         )");

$ccc = mysqli_num_rows($row);

if ($ccc > 0) {
	while ($fetch = mysqli_fetch_array($row)) {

		$tid = $fetch['truck_id'];

		$row2 = mysqli_query($dbhandle, "SELECT * FROM `trucks` where id='$tid' ");
		$fetch2 = mysqli_fetch_array($row2);

		$row21 = mysqli_query($dbhandle, "SELECT * FROM `tbl_material` where id='$mid' ");
		$fetch21 = mysqli_fetch_array($row21);

		$f = $fetch['other_charges'];
		if (empty($f)) {
			$f = '0';
		}

		$c = $fetch['cgst'];
		if (empty($c)) {
			$c = '0';
		}

		$s = $fetch['sgst'];
		if (empty($s)) {
			$s = '0';
		}

		$i = $fetch['insurance'];
		if (empty($i)) {
			$i = '0';
		}

		$response = array(
			"id" => $fetch['id'],
			"source" => $fetch['source'],
			"destination" => $fetch['destination'],
			"truck_id" => $fetch2['title'],
			"truck_type" => $fetch2['type'],
			"material" => $fetch21['material_name'],
			"freight" => $fetch['freight'],
			"weight" => $weight,
			"other_charges" => $f,
			"cgst" => $c,
			"sgst" => $s,
			"insurance" => $i,
		);
	}

	$data = array(
		"status" => "1",
		"message" => "Data",
		"data" => $response
	);

	echo json_encode($data);
} else {
	$data = array(
		"status" => "0",
		"message" => "No Fare Found",
		"data" => (object)[]
	);

	echo json_encode($data);
}
