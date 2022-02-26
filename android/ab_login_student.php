<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	$email=$_POST['email'];
	$query1 = mysqli_query($dbhandle,"INSERT INTO `ab_login`(`email`) VALUES ('$email')");
	$response["success"] = true;
    echo json_encode($response);
?>