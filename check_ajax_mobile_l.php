<?php
session_start();
// error_reporting(0);
include("controls/define2.php");
include("TBXadmin/include/config.php");

$check = mysqli_query($dbhandle, "SELECT id FROM tbl_loader WHERE  mb_no = '" . $_POST['mobile'] . "'");
// $check = 0;
if ($check == true) {
	$result['exits'] = '1';
} else {

	$_SESSION['otp'] = "";
	$result['exits'] = '0';
	$string_shuffled = str_shuffle('0123456789');
	$_SESSION['otp'] = substr($string_shuffled, 1, 5);

	// require('include/textlocal.class.php');

	// $textlocal = new Textlocal('rsrajput77@gmail.com', '140fe236292221b27b18bb592ea57fada68121182e2c3e0555374a3d08b30d14');

	// $numbers = '91' . $_POST['mobile'];
	// $sender = 'ONNWAY';
	// $message = "Your Otp for Registration on onnway.com is " . $_SESSION['otp'];

	// try {
	// 	$resultsms = $textlocal->sendSms($numbers, $message, $sender);
	// 	$result['sms'] = $resultsms->status;
	// } catch (Exception $e) {
	// 	die('Error: ' . $e->getMessage());
	// }



	$apikey = "y3B6BxL68ESYnTE5h5hKBg";
	$apisender = "DSMONL";
	$msg = "Your OTP for registration on DSM Online is " . $_SESSION['otp'];
	$num = '91' . $_POST['mobile']; // MULTIPLE NUMBER VARIABLE PUT HERE...!
	$ms = rawurlencode($msg); //This for encode your message content
	$url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $apikey . '&senderid=' . $apisender . '&channel=2&DCS=0&flashsms=0&number=' . $num . '&text=' . $ms . '&route=1';
	//echo $url;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 2);
	$result = curl_exec($ch);
	if (curl_exec($ch)) {
		$result['sms'] = 'success';
	}
}
echo json_encode($result);
