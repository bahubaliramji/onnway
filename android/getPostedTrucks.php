<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$user_id = $_POST['user_id'];
 
 $row2 = mysqli_query($dbhandle,"SELECT * FROM `posted_trucks` where user_id='$user_id' AND (status = 'posted' OR status = 'cancelled' OR status = 'assigned') ORDER BY created DESC ");
    
	$response = array();
 	
 	while($fetch = mysqli_fetch_array($row2))
 	{
 	    
 	$tid = $fetch['truck_type'];
 	
	
	$row21 = mysqli_query($dbhandle,"SELECT * FROM `trucks` where id='$tid' ");
    $fetch21 = mysqli_fetch_array($row21);
	
    $response[] = array(
        "id" => $fetch['id'],
        "user_id" => $fetch['user_id'],
        "laod_type" => $fetch['laod_type'],
        "source" => $fetch['source'],
        "destination" => $fetch['destination'],
        "truck_type" => $fetch21['title'].' '.$fetch21['type'],
        "truck_type2" => $fetch21['type'],
        "schedule" => $fetch['schedule'],
        "weight" => $fetch['weight'],
        "load_passing" => $fetch['load_passing'],
        "remarks" => $fetch['remarks'],
        "length" => $fetch['length'],
        "width" => $fetch['width'],
        "height" => $fetch['height'],
        "status" => $fetch['status'],
        "created" => $fetch['created'],
        );
    
	    
	    
	    
	    
 	}
 	
 	$data = array(
	        "status" => "1",
	        "message" => "Data",
	        "data" => $response
	        );
	    
echo json_encode($data);

	    
	    
?>