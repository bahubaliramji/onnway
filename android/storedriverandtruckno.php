<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
    $id=$_POST['id'];
    $driver_mobile_no=$_POST['driver_mobile_no'];
    $truck_no=$_POST['truck_no'];
    $query = mysqli_query($dbhandle,"UPDATE `full_truck_book_load` SET `assigned_driver_mobile_no`='$driver_mobile_no',`truck_number`='$truck_no',`item_delivered`='1' WHERE id='$id'");
      if($query)
    {
        $device["msg"] = "Inserted Successfully";

        array_push($response["msg"], $device);
    }
    else
    {
         $device["msg"] = "Inserted Successfully";

        array_push($response["msg"], $device);
    }
    $response["success"] = true;
    echo json_encode($response);
?>