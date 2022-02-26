<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
    $mobile_no=$_POST['mobile_no'];
    $source=$_POST['source'];
    $destination=$_POST['destination'];
    $truck_type=$_POST['truck_type'];
    $query = mysqli_query($dbhandle,"INSERT INTO `order_enquiry`(`source`, `destination`, `vehicle_type`) VALUES ('$source','$destination','$truck_type')");
    $rw = mysqli_query($dbhandle,"SELECT * FROM `tbl_estimate` where from_id='$source' and to_id='$destination' and truck_type='$truck_type'");
    $rowcount=mysqli_num_rows($rw);
    $response["users"] = array();
    if($rowcount==1)
    {
    
        while($fetch=mysqli_fetch_array($rw)){
            $user["price"] = $fetch['price']; 
            array_push($response["users"], $user);
        }
    }
    else
    {
        $user["price"] = ""; 
        array_push($response["users"], $user);
    }
	echo json_encode($response);
?>