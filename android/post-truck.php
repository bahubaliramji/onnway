<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
    $mobile_no=$_POST['mobile_no'];
    $type=$_POST['type'];
    $source=$_POST['source'];
    $vehicle_type=$_POST['vehicle_type'];
    $destination=$_POST['destination'];
    $sch_date=$_POST['sch_date'];
    $query = mysqli_query($dbhandle,"INSERT INTO `full_posted_truck` (`mobile_no`, `type`, `source`, `vehicle_type`, `sch_date`) VALUES ('$mobile_no', '$type', '$source', '$vehicle_type', '$sch_date');");
    $query1 = mysqli_query($dbhandle,"SELECT * FROM `full_posted_truck` WHERE 1 ORDER BY `full_posted_truck`.`posted_truck_id` ASC");
    $post_truckid=0;
    while($fetch = mysqli_fetch_array($query1))
    {
        $post_truckid=$fetch['posted_truck_id'];
    }
    $query2 = mysqli_query($dbhandle,"INSERT INTO `full_posted_truck_destination` (`posted_truck_id`, `destination`) VALUES ('$post_truckid', '$destination');");
    $response["msg"] = array();
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