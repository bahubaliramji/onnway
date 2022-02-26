<?php 

	session_start();
	include('include/config.php');
	include_once("../controls/define.php");
	extract($_POST);
  $dat = explode(" ", $id);

$sqld = mysqli_query($dbhandle, "select * from tbl_vehicle_owner where name='".$dat[0]."' and last_name='".$dat[1]."'");
      $rowss = mysqli_fetch_assoc($sqld);


  if($id==1){
  	$rowss['mb_no']='Please enter driver Mobile';
  	$id = 'Please enter driver Name';
  }
		$result['driver_name'] = $id;
		$result['mobile_no'] =  $rowss['mb_no'];
	echo json_encode($result);

 ?>