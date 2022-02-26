<?php
session_start();
error_reporting(0);
include("../controls/define.php");
include("../admin/inc/db.php");
$type = $_POST['type'];
$row = mysqli_query($dbhandle, "SELECT * FROM `trucks` where type='$type' ");

while ($fetch = mysqli_fetch_array($row)) {

    $response[] = array(
        "id" => $fetch['id'],
        "type" => $fetch['type'],
        "title" => $fetch['title'],
        "max_load" => $fetch['max_load'],
        "capcacity" => $fetch['capcacity'],
        "box_length" => $fetch['box_length'],
        "box_width" => $fetch['box_width'],
        "created" => $fetch['created'],
    );
}

$data = array(
    "status" => "1",
    "message" => "Data",
    "data" => $response
);

echo json_encode($response);
