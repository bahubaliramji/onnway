<?php 	
	session_start();
	error_reporting(0);
	include("controls/define2.php"); 
	include("TBXadmin/include/config.php");
	
	$check=mysqli_query($dbhandle, "SELECT length FROM vehicle_list WHERE  id = '".$_POST['vehicle_id']."'");
	$data1 = mysqli_fetch_array($check);

	if($_POST['weight']<=$data1['length']){
		$result['status'] = 1;
	}else{
		$result['status'] = 0;
	}
	echo json_encode($result);
 ?>