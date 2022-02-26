<?php
session_start();
error_reporting(0);
include("../controls/define.php");
include("../admin/inc/db.php");

$user_id = $_POST['user_id'];

$row2 = mysqli_query($dbhandle, "SELECT * FROM `orders` where user_id='$user_id' AND (status = 'requsted for quote' OR status = 'accepted' OR status = 'assigned for quote' OR status = 'accepted quote' OR status = 'placed') ORDER BY created DESC ");

$response = array();

while ($fetch = mysqli_fetch_array($row2)) {

    $mid = $fetch['material'];
    $bid_id = $fetch['bid_id'];
    $bid_amount = "";

    if ($bid_id) {
        $row32 = mysqli_query($dbhandle, "SELECT * FROM `bids` where id='$bid_id' ");
        $fetch22 = mysqli_fetch_array($row32);
        $tid = $fetch22['truck_type'];
        $bid_amount = $fetch22['amount'];
    } else {
        $tid = $fetch['truck_type'];
    }



    $row3 = mysqli_query($dbhandle, "SELECT * FROM `tbl_material` where id='$mid' ");
    $fetch2 = mysqli_fetch_array($row3);

    $row21 = mysqli_query($dbhandle, "SELECT * FROM `trucks` where id='$tid' ");
    $fetch21 = mysqli_fetch_array($row21);

    $curr = date('Y-m-d H:i:s');

    $response[] = array(
        "id" => $fetch['id'],
        "user_id" => $fetch['user_id'],
        "laod_type" => $fetch['laod_type'],
        "source" => $fetch['source'],
        "destination" => $fetch['destination'],
        "truck_type" => $fetch21['title'] . ' ' . $fetch21['type'],
        "truck_type2" => $fetch21['type'],
        "bid_amount" => $bid_amount,
        "bid_id" => $bid_id,
        "schedule" => $fetch['schedule'],
        "weight" => $fetch['weight'],
        "material" => $fetch2['material_name'],
        "freight" => $fetch['freight'],
        "other_charges" => $fetch['other_charges'],
        "cgst" => $fetch['cgst'],
        "sgst" => $fetch['sgst'],
        "insurance" => $fetch['insurance'],
        "paid_percent" => $fetch['paid_percent'],
        "paid_amount" => $fetch['paid_amount'],
        "pickup_address" => $fetch['pickup_address'],
        "pickup_city" => $fetch['pickup_city'],
        "pickup_pincode" => $fetch['pickup_pincode'],
        "pickup_phone" => $fetch['pickup_phone'],
        "drop_address" => $fetch['drop_address'],
        "drop_city" => $fetch['drop_city'],
        "drop_pincode" => $fetch['drop_pincode'],
        "drop_phone" => $fetch['drop_phone'],
        "remarks" => $fetch['remarks'],
        "length" => $fetch['length'],
        "width" => $fetch['width'],
        "height" => $fetch['height'],
        "quantity" => $fetch['quantity'],
        "status" => $fetch['status'],
        "created" => $fetch['created'],
        "current" => "" . ($curr),
    );
}

$row331 = mysqli_query($dbhandle, "UPDATE loader_count SET waiting = 'unread' WHERE user_id = '$user_id'");

$data = array(
    "status" => "1",
    "message" => "Data",
    "data" => $response
);

echo json_encode($data);
