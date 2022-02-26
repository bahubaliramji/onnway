<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
$type=$_POST['type'];
 $row = mysqli_query($dbhandle,"SELECT * FROM `subject`");
 	
while($fetch = mysqli_fetch_array($row)){
    
    $response[] = array(
        "id" => $fetch['id'],
        "type" => $fetch['title'],
        "title" => $fetch['title'],
        "created" => $fetch['title'],
        );
    
	    }
	    
	    $data = array(
	        "status" => "1",
	        "message" => "Data",
	        "data" => $response
	        );
	    
echo json_encode($response);
?>