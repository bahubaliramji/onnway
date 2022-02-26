<?php
session_start();

	$_SESSION['otp'] = rand(1000, 9999);

	$message = "<#> Your Otp for Registration on onnway.com is ".$_SESSION['otp']." zQhGX8tdPOk";
        
		
		//echo "INSERT INTO users (phone , token,type) VALUES ('$phone' , '$token','loader')";
		
		// $query2 = mysqli_query($dbhandle , "INSERT INTO users (phone , token,type) VALUES ('$phone' , '$token','loader')");
		
		// // if the user is new, then get the winnerid for all skus and search in users table if current phone or deviceid is available or not.
		
		// $iidd = mysqli_insert_id($dbhandle);
		
		sendotp('91' . $_POST['mobile'] , $message);
	// $apikey = "y3B6BxL68ESYnTE5h5hKBg";
	// $apisender = "DSMONL";
	// $msg = "Your OTP for registration on DSM Online is " . $_SESSION['otp'];
	// $num = '91' . $_POST['mobile']; // MULTIPLE NUMBER VARIABLE PUT HERE...!
	// $ms = rawurlencode($msg); //This for encode your message content
	// $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=' . $apikey . '&senderid=' . $apisender . '&channel=2&DCS=0&flashsms=0&number=' . $num . '&text=' . $ms . '&route=1';
	// //echo $url;
	// $ch = curl_init($url);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($ch, CURLOPT_POST, 1);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, "");
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 2);
	// $result = curl_exec($ch);
	 if (curl_exec($ch)) {
		$_SESSION['otp_sent'] = "1";
		echo 1;
	} else {
		echo 0;
	}
// }

function sendotp($phone , $message)
	{
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms?country=91",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "{ \"sender\": \"ONNWAY\", \"route\": \"4\", \"country\": \"91\", \"sms\": [ { \"message\": \"".$message."\", \"to\": [ ".$phone."] } ] }",
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_HTTPHEADER => array(
				"authkey: 266484AgCc3hEjSl5c824792",
				"content-type: application/json"
			),	
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
	}