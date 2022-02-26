<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
$type=$_POST['type'];
 $row = mysqli_query($dbhandle,"SELECT * FROM `tbl_material`");
 	
while($fetch = mysqli_fetch_array($row)){
    
    $response[] = array(
        "id" => $fetch['id'],
        "type" => $fetch['material_name'],
        "title" => $fetch['material_name'],
        "created" => $fetch['material_name'],
        );
    
	    }
	    
	    $data = array(
	        "status" => "1",
	        "message" => "Data",
	        "data" => $response
	        );
	    
echo json_encode($response);
?>