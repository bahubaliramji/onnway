<?php
 include('config.php');
if($_POST['mobile']!=""){
	
	$mobile = $_POST["mobile"];
	
	if(is_numeric($mobile) && (strlen($mobile)==10)){
		session_start();
		error_reporting(0);
	 
		$check=mysql_num_rows(mysql_query("SELECT id FROM tbl_loader WHERE  mb_no = '".$mobile."'"));

	if($check >0)
	{
		$response["is_error"] = true;
		$response["message"] = "Mobile no already registered with us.";
	}else{
		$_SESSION['otp'] = "";
		$_SESSION['mobile'] = "";
		$string_shuffled = str_shuffle('0123456789');
		$_SESSION['otp'] = substr($string_shuffled, 1, 5);
		$_SESSION['mobile'] = $_POST['mobile'];
		mysql_query("INSERT INTO otp_loader (mobile, otp)VALUES('".$_SESSION['mobile']."','".$_SESSION['otp']."')");
		
		require('../include/textlocal.class.php');

		$textlocal = new Textlocal('rsrajput77@gmail.com', '140fe236292221b27b18bb592ea57fada68121182e2c3e0555374a3d08b30d14');

		$numbers = array('91'.$_POST['mobile']);
		$sender = 'ONNWAY';
		$message = "Your Otp for Registration on onnway.com is ".$_SESSION['otp'];

		try {
			$resultsms = $textlocal->sendSms($numbers, $message, $sender);
			$response["data"]['otp_status'] = $resultsms->status;
			$response["is_error"] = false;
			$response["message"] = "Otp Sent";
			$response["data"]['otp'] = $_SESSION['otp'];
		} catch (Exception $e) {
			$response["is_error"] = true;
			$response["message"] = "There was some Error in sending sms.Try with Another Number";
			$response["data"]['otp'] = $_SESSION['otp'];
			
		}
		
		
	}
	}else{
		$response["is_error"] = true;
		$response["message"] = "Mobile No is Invalid.Please enter 10 digit Valid Mobile No.";
	}
}else{
	$response["is_error"] = true;
	$response["message"] = "Required field can't be blank";
}
	echo json_encode($response);
?>