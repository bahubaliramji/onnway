<?php 
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
$name="back_aadhar";
$query1 = mysqli_query($dbhandle,"UPDATE `driver_profile_tbl` SET `$name`='1' WHERE `mobile_no`='7717703788'");
 echo json_encode($response);
?>