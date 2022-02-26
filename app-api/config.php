<?php $base_url = 'http://localhost/onnway/rahul-vehicle/';
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
/* $username = "rahul_vehical";
$password = "rahul_vehical@123";
$hostname = "localhost";
//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("rahul_vehical",$dbhandle)
  or die("Could not select examples"); */
date_default_timezone_set('Asia/Kolkata');
$username = "onnway_way";
$password = "tbx#^SQL@!534";
$hostname = "localhost";
//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
	or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("onnway_way", $dbhandle)
	or die("Could not select examples");


function checkUserToken($token)
{
	$token = mysql_real_escape_string($token);
	$query = mysql_query("select vehicle_owner_id from tbl_vehicle_owner where token='$token' ");
	$count_row = mysql_num_rows($query);

	if ($count_row == 1) {
		$getUser = mysql_fetch_array($query);
		$result = $getUser['vehicle_owner_id'];
	} else {
		$result = "";
	}
	return $result;
}
function checkLoaderToken($token)
{
	$token = mysql_real_escape_string($token);
	$query = mysql_query("select id from tbl_loader where token='$token' ");
	$count_row = mysql_num_rows($query);

	if ($count_row == 1) {
		$getUser = mysql_fetch_array($query);
		$result = $getUser['id'];
	} else {
		$result = "";
	}
	return $result;
}

function getResult($sql)
{
	$resultArray = array();
	$result = mysql_query($sql);
	$rowCount = mysql_num_rows($result);
	while ($arrayResult = mysql_fetch_assoc($result)) {
		$resultArray[] = $arrayResult;
	}
	return $resultArray;
}

function updateQuery($table, $fields, $id, $value, $files)
{
	$semaphore = false;
	$semaphore1 = false;
	$query = "UPDATE $table SET ";

	foreach ($fields as $field) {
		if (isset($_POST[$field]) && !empty($_POST[$field])) {
			$var = mysql_real_escape_string($_POST[$field]);
			$sets[] .= $field . " = '$var'";
			$semaphore = true;
		}
	}
	foreach ($files as $file) {
		if (isset($_FILES[$file]['name']) && !empty($_FILES[$file]['name'])) {
			if ($table == "tbl_loader" || $table == "tbl_book_load") {
				$path = "../upload/documents/";
			} else {
				$path = "../upload/vehicle_documents/";
			}
			$random_key = strtotime(date('Y-m-d H:i:s'));
			$file_name = rand() . $random_key . '-' . $_FILES[$file]['name'];
			move_uploaded_file($_FILES[$file]['tmp_name'], $path . $file_name);
			$sets[] .= $file . " = '$file_name'";
			$semaphore = true;
		}
	}

	if ($semaphore) {
		$set = implode(', ', $sets);
		$query .= $set;
		$query .= " WHERE $id = '" . $value . "'";
		mysql_query($query);
	}
}

function checkRequiredField($array)
{
	$error = true;
	foreach ($array as $field) {
		if (empty($_POST[$field])) {
			$error = false;
		}
	}

	if ($error) {
		return true;
	} else {
		return false;
	}
}
function getCity($City)
{
	$sqlStatus = mysql_query("select city_name from tbl_city where id= $City");
	$resultStatus = mysql_fetch_array($sqlStatus);
	return $resultStatus['city_name'];
}
function getlat($City)
{
	$sqlStatus = mysql_query("select latitude,longitude from tbl_city where id= $City");
	$resultStatus = mysql_fetch_array($sqlStatus);
	return $resultStatus['latitude'];
}
function getlon($City)
{
	$sqlStatus = mysql_query("select latitude,longitude from tbl_city where id= $City");
	$resultStatus = mysql_fetch_array($sqlStatus);
	return $resultStatus['longitude'];
}
function getStatus($status)
{
	$sqlStatus = mysql_query("select name from tbl_status where id= $status");
	$resultStatus = mysql_fetch_array($sqlStatus);
	return $resultStatus['name'];
}
function getTruckType($type)
{
	$sqlStatus = mysql_query("select dimension,length from vehicle_list where id= $type");
	$resultStatus = mysql_fetch_array($sqlStatus);
	return $resultStatus['length'] . 'MT /' . $resultStatus['dimension'];
}
/*

$con = @mysqli_connect('localhost', 'root', '', 'rahul_vehical');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}*/
//echo 'Connected to MySQL';
