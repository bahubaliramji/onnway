<?php
session_start();
error_reporting(0);
include("../controls/define.php");
include("../admin/inc/db.php");
$mobile_no = $_POST['mobile_no'];
$transport = $_POST['transport'];
$city = $_POST['city'];
$row = mysqli_query($dbhandle, "INSERT INTO `transport_change_request` SET `user_id`='$mobile_no', transport = '$transport', city = '$city'");

$row33 = mysqli_query($dbhandle, "INSERT INTO count SET transport = 'read'");

if ($row) {
    $data = array(
        "status" => "1",
        "message" => "Request sent successfully",
        "data" => (object)[]
    );
} else {
    $data = array(
        "status" => "0",
        "message" => "Some error occurred",
        "data" => (object)[]
    );
}
echo json_encode($data);
