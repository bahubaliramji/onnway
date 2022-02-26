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
    $material_type=$_POST['material_type'];
    $rem_payload=$_POST['rem_payload'];
    $rem_payload_unit=$_POST['rem_payload_unit'];
    $rem_len=$_POST['rem_len'];
    $rem_len_unit=$_POST['rem_len_unit'];
    $rem_wid=$_POST['rem_wid'];
    $rem_wid_unit=$_POST['rem_wid_unit'];
    $rem_hei=$_POST['rem_hei'];
    $rem_hei_unit=$_POST['rem_hei_unit'];
    $box_1=$_POST['box_1'];
    $box_2=$_POST['box_2'];
    $box_3=$_POST['box_3'];
    $box_4=$_POST['box_4'];
    $box_5=$_POST['box_5'];
    $box_6=$_POST['box_6'];
    $box_7=$_POST['box_7'];
    $box_8=$_POST['box_8'];
    
    $query = mysqli_query($dbhandle,"INSERT INTO `part_posted_truck`(`mobile_no`, `type`, `source`, `vehicle_type`, `sch_date`, `material_type`, `rem_payload`, `rem_payload_unit`, `rem_length`, `rem_length_unit`, `rem_wid`, `rem_wid_unit`, `rem_hei`, `rem_hei_unit`, `div1`, `div2`, `div3`, `div4`, `div5`, `div6`, `div7`, `div8`) VALUES ('$mobile_no', '$type', '$source', '$vehicle_type', '$sch_date','$material_type','$rem_payload','$rem_payload_unit','$rem_len','$rem_len_unit','$rem_wid','$rem_wid_unit','$rem_hei','$rem_hei_unit','$box_1','$box_2','$box_3','$box_4','$box_5','$box_6','$box_7','$box_8');");
    $query1 = mysqli_query($dbhandle,"SELECT * FROM `part_posted_truck` WHERE 1 ORDER BY `part_posted_truck`.`posted_truck_id` ASC");
    $post_truckid=0;
    while($fetch = mysqli_fetch_array($query1))
    {
        $post_truckid=$fetch['posted_truck_id'];
    }
    $query2 = mysqli_query($dbhandle,"INSERT INTO `part_posted_truck_destination` (`posted_truck_id`, `destination`) VALUES ('$post_truckid', '$destination');");
    $response["msg"] = array();
    if($query)
    {
        $device["msg"] = "Inserted Successfully";

        array_push($response["msg"], $device);
    }
    else
    {
         $device["msg"] = "Not Inserted Successfully";

        array_push($response["msg"], $device);
    }
    $response["success"] = true;
    echo json_encode($response);
?>