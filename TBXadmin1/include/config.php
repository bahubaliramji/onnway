<?php
$username = "onway";
$password = "Onway@2022";
$hostname = "localhost";
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password, "onway")
	or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

// //select a database to work with
// $selected = mysqli_select_db("onnway_way",$dbhandle)
//   or die("Could not select examples");


/*

$con = @mysqli_connect('localhost', 'root', '', 'rahul_vehical');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}*/
//echo 'Connected to MySQL';
date_default_timezone_set("Asia/Kolkata");
function getStatus($status)
{
	$sqlStatus = mysqli_query($dbhandle, "select name from tbl_status where id= $status");
	$resultStatus = mysqli_fetch_array($sqlStatus);
	return $resultStatus['name'];
}
function getCity($City)
{
	$sqlStatus = mysqli_query($dbhandle, "select city_name from tbl_city where id= $City");
	$resultStatus = mysqli_fetch_array($sqlStatus);
	return $resultStatus['city_name'];
}

function getTruckType($type)
{
	$sqlStatus = mysqli_query($dbhandle, "select dimension,length from vehicle_list where id= $type");
	$resultStatus = mysqli_fetch_array($sqlStatus);
	return $resultStatus['length'] . 'MT /' . $resultStatus['dimension'];
}
function getFullTruckType($type)
{
	$sqlStatus = mysqli_query($dbhandle, "select * from vehicle_list where id= $type");
	$resultStatus = mysqli_fetch_array($sqlStatus);
	return $resultStatus;
}
function getVehicleType($id)
{
	$sqlStatus = mysqli_query($dbhandle, "select vehicle_category from tbl_trucktype where id= $id");
	$resultStatus = mysqli_fetch_array($sqlStatus);
	return $resultStatus['vehicle_category'];
}
function getRegNoBytruckId($truckid)
{
	$sqlStatus = mysqli_query($dbhandle, "select truck_reg_no from tbl_trucks where id= $truckid");
	$resultStatus = mysqli_fetch_array($sqlStatus);
	return $resultStatus['truck_reg_no'];
}
function getVehicleOwnerInfo($vehicle_owner_id)
{
	$sqlStatus = mysqli_query($dbhandle, "select * from tbl_vehicle_owner where vehicle_owner_id= $vehicle_owner_id");
	$resultStatus = mysqli_fetch_array($sqlStatus);
	return $resultStatus;
}
function getLoaderInfo($loader_id)
{
	$sqlStatus = mysqli_query($dbhandle, "select * from tbl_loader where id= $loader_id");
	$resultStatus = mysqli_fetch_array($sqlStatus);
	return $resultStatus;
}
function getFullStatus($status)
{
	$sqlStatus = mysqli_query($dbhandle, "select name from tbl_status where id= $status");
	$resultStatus = mysqli_fetch_array($sqlStatus);

	$result = "<div class='";
	if ($status == 1) {
		$result .= 'oending-style';
	} else if ($status == 2) {
		$result .= 'orocessing-style';
	} else {
		$result .= 'oonfirm-style';
	}
	$result .= "'>" . $resultStatus['name'] . "</div>";



	return $result;
}

function getResultID($id, $table)
{
	$sqlStatus = mysqli_query($dbhandle, "select * from $table where id= $id");
	$resultStatus = mysqli_fetch_array($sqlStatus);
	return $resultStatus;
}
