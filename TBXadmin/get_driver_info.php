<?php 
if(isset($_POST['id']) && $_POST['id']!=""){
	session_start();
	include('include/config.php');
	include_once("../controls/define.php");
	$type = $_SESSION['type']; 
	$sidepage = 'Booking';
	$innersidepage = 'bookload';
	if($_SESSION['user_id']==''){
		header('location:index.php');
	}

	$select = mysqli_query($dbhandle, "select p.id,t.driver_name,t.mobile_no,t.vehicle_owner_id from tbl_post_truck as p INNER JOIN tbl_trucks as t ON p.truck_id = t.id where p.id='".$_POST['id']."' ");
	$data = mysqli_fetch_array($select);
		$result['post_truck_id'] = $data['id'];
		$result['driver_name'] = $data['driver_name'];
		$result['mobile_no'] =  $data['mobile_no'];

 $vehh = mysqli_fetch_assoc(mysqli_query($dbhandle, "select * from  tbl_vehicle_owner where vehicle_owner_id='".$data['vehicle_owner_id']."'"));

$result['ownername'] =  $vehh['name'];

	echo json_encode($result);
}
 ?>