<?php 	
	session_start();
	error_reporting(0);
	include("controls/define2.php"); 
	include("TBXadmin/include/config.php");
	
	$check=mysqli_num_rows(mysqli_query($dbhandle, "SELECT vehicle_owner_id FROM tbl_vehicle_owner WHERE  mb_no = '".$_POST['mobile']."'"));

	if($check >0)
	{
		$result['exits'] = '1';
	}else{
		$_SESSION['otp'] = "";
		$result['exits'] = '0';
		$string_shuffled = str_shuffle('0123456789');
		$_SESSION['otp'] = substr($string_shuffled, 1, 5);
		
		require('include/textlocal.class.php');

		$textlocal = new Textlocal('rsrajput77@gmail.com', '140fe236292221b27b18bb592ea57fada68121182e2c3e0555374a3d08b30d14');

		$numbers = array('91'.$_POST['mobile']);
		$sender = 'ONNWAY';
		$message = "Your Otp for Registration on onnway.com is ".$_SESSION['otp'];

		try {
			$resultsms = $textlocal->sendSms($numbers, $message, $sender);
			$result['sms'] = $resultsms->status;
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}

		
	}
	echo json_encode($result);
 ?>