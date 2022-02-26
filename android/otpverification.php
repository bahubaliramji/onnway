<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
		$_SESSION['otp'] = "";
	//	$result['exits'] = '0';
//	$result['sms']=="success";
		$string_shuffled = str_shuffle('0123456789');
	$result['otp'] =	$_SESSION['otp'] = substr($string_shuffled, 1,4);
	
//		require('../include/textlocal.class.php');
//require('../include/msg91.php');
//		$textlocal = new Textlocal('rsrajput77@gmail.com', '76582b55a18a37112d0f8277a9cff84b2c086a826ad2375a026475870e9a6835');

		$numbers = $_POST['mobile_no'];
		$sender = 'ONNWAY';
		$message = "Your Otp for Registration on onnway.com is ".$_SESSION['otp'];
        $num=$_POST['mobile_no'];
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?mobiles=".$numbers."&authkey=266484AgCc3hEjSl5c824792&route=4&sender=ONNWAY&message=".$message."&country=91",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
 // echo $response;
}
      /*  $msg=sendsmsmsg91($sender,$numbers, $message);
		try {
            
			//$resultsms = $textlocal->sendSms($numbers, $message, $sender);
			//$result['sms'] = $resultsms->status;
			$resultsms = $textlocal->sendSms($numbers, $message, $sender);
			$response["data"]['otp_status'] = $resultsms->status;
			$response["is_error"] = false;
			$response["message"] = "Otp Sent";
			$response["data"]['otp'] = $_SESSION['otp'];
			$int = $result['otp'];
			$query = mysqli_query($dbhandle,"SELECT * FROM mobile_numbers WHERE  mobile_number ='$num' ");
			if(mysqli_num_rows($query)<1) {
			    mysqli_query($dbhandle,"INSERT INTO `mobile_numbers` (`mobile_number`, `verification_code`) VALUES ('$num', '$int');");
			}
			else{
			    mysqli_query($dbhandle,"UPDATE `mobile_numbers` SET `verification_code`='$int' WHERE mobile_number='$num'");
			}
		} catch (Exception $e) {

			$response["is_error"] = true;
			$response["message"] = "There was some Error in sending sms.Try with Another Number";
			$response["data"]['otp'] = $_SESSION['otp'];
			die('Error: ' . $e->getMessage());
			
		}*/
	$response1["devices"] = array();



        $device["id"] = $num;
        $device["type"] = $int;


        array_push($response1["devices"], $device);  
    $response1["success"] = true;
    echo json_encode($response1);
//echo json_encode($result);
 ?>