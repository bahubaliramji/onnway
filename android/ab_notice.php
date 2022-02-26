<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	$date=$_POST['date'];
	$notice=$_POST['notice'];
	$query1 = mysqli_query($dbhandle,"INSERT INTO `ab_notice`(`date`,`notice`) VALUES ('$date','$notice')");
	$response["success"] = true;
    echo json_encode($response);
?>