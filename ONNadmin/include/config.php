<?php
$username = "root";
$password = "";
$hostname = "localhost";
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password, "onnway")
	or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
//$selected = mysqli_select_db($dbhandle,"onnway")
//or die("Could not select examples");

/*$host = "localhost";
$db_name = "kedsons_new";
$username = "kedsons_new";
$password = "Kidsons@2018";

$dbhandle = mysqli_connect($host, $username, $password, $db_name) or die('Could not connect: ' . mysqli_connect_error());
*/
$baseurl = "http://localhost/onnway/";


/*

$con = @mysqli_connect('localhost', 'root', '', 'rahul_vehical');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}*/
//echo 'Connected to MySQL.';
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
	if ($sqlStatus === FALSE) {
		die(mysql_error()); // TODO: better error handling
	}
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



function getorderstatus($s)
{

	if ($s == 0) {
		$st = 'Pending';
	} else if ($s == 1) {
		$st = 'Processing';
	} else if ($s == 2) {
		$st = 'Confirm';
	} else if ($s == 3) {
		$st = 'Booked';
	} else if ($s == 4) {
		$st = 'Checked';
	} else if ($s == 5) {
		$st = 'Ready to move ';
	} else if ($s == 6) {
		$st = 'On the way';
	} else if ($s == 7) {
		$st = 'Delivered';
	} else if ($s == 8) {
		$st = 'Cancelled';
	}
	return $st;
}


function getResultID($id, $table)
{
	$sqlStatus = mysqli_query($dbhandle, "select * from $table where id= $id");
	$resultStatus = mysqli_fetch_array($sqlStatus);
	return $resultStatus;
}



function  notifi($regId, $msg, $title, $image)
{



	$image = 'http://localhost/onnway/images/logo.png';


	error_reporting(-1);
	ini_set('display_errors', 'On');
	require_once __DIR__ . '/firebase/firebase.php';
	require_once __DIR__ . '/firebase/push.php';
	$firebase = new Firebase();
	$push = new Push();
	$payload = array();
	$payload['team'] = 'India';
	$payload['score'] = '5.6';
	$title = $title;
	$messages = $msg;

	$push_type = 'individual';
	$push->setTitle($title);
	$push->setMessage($messages);
	$push->setImage($image);
	$push->setIsBackground(FALSE);
	$push->setPayload($payload);
	$json = '';
	$response = '';
	if ($push_type == 'topic') {
		$json = $push->getPush();
		return     $response = $firebase->sendToTopic('global', $json);
	} else if ($push_type == 'individual') {



		$regId = $regId;

		$json = $push->getPush();
		$response = $firebase->send($regId, $json);
		return $response;
	}
}



/*  echo $dfdf = notifi('evI80_uM28E:APA91bFX7HWYo42xl--vQ2Zhhz_3mR1gQ-gtzCOxSE3d25F4wS8ial129skQnzlun2r9oFGI0oGk86cArX-aYzwO5q4-aFZdzZuGfheIokFCJ40TJYOhU9d6nWfgf6wkvJqwgu5PmeME','sdff','$title','');
*/
