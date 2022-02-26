<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	

$phone = $_POST['phone'];
  $token = $_POST['token'];



		


 
 //echo "SELECT * FROM users WHERE phone = '$phone'";
	$query = mysqli_query($dbhandle , "SELECT * FROM users WHERE phone = '$phone' AND type != 'loader'");
	//$query = mysql_query("SELECT * FROM play_users WHERE (play_id = '$play_id' AND phone = '$phone') OR (play_id = '$play_id' AND deviceId = '$deviceId') OR (play_id = '$play_id' AND ipaddress = '$ipaddress')");
	//print_r($query);
	$count = mysqli_num_rows($query);
	
	
	
	
	if($count > 0)
	{
		$otp = rand(1000,9999);
		//$otp = '1234';
		$sender = 'ONNWAY';
		$message = "<#> Your Otp for Registration on onnway.com is ".$otp." QcMIPeXlIUK";
        
		
		$ddata = mysqli_fetch_array($query);
		
		$iidd = $ddata['id'];
		
		
		
		$qqq = mysqli_query($dbhandle , "UPDATE users SET token = '$token' WHERE id = '$iidd'");
		
		sendotp($phone , $message);
		
		$udata = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM provider_profile_tbl WHERE user_id = '$iidd'"));
		
		$post_data = array(
 			 "status" => '1',
 			 "message" => 'Welcome',
 			 "type" => $ddata['type'],
 			 "userId" => "".$iidd,
 			 "phone" => "".$phone,
 			 "otp" => "".$otp,
 			 "name" => "".$udata['name'],
 			 "email" => "".$udata['transport_name'],
 			 "city" => "".$udata['city'],
			 );
	}
	else
	{
		$otp = rand(1000,9999);
		//$otp = '1234';
		$sender = 'ONNWAY';
		$message = "<#> Your Otp for Registration on onnway.com is ".$otp." QcMIPeXlIUK";
        
		
		//echo "INSERT INTO users (phone , token,type) VALUES ('$phone' , '$token','loader')";
		
		$query2 = mysqli_query($dbhandle , "INSERT INTO users (phone , token) VALUES ('$phone' , '$token')");
		
		// if the user is new, then get the winnerid for all skus and search in users table if current phone or deviceid is available or not.
		
		$iidd = mysqli_insert_id($dbhandle);
		
		sendotp($phone , $message);
		
		$udata = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM provider_profile_tbl WHERE user_id = '$iidd'"));
		
		$post_data = array(
 			 "status" => '1',
 			 "message" => 'Welcome',
 			 "type" => '',
 			 "userId" => "".$iidd,
 			 "phone" => "".$phone,
 			 "otp" => "".$otp,
 			 "name" => "".$udata['name'],
 			 "email" => "".$udata['transport_name'],
 			 "city" => "".$udata['city'],
			 );
	
	}
	
	
	
 	
 	
 	
 	
 	$post_data= json_encode( $post_data );
 	
 	echo $post_data;
 	
 	
 	function sendotp($phone , $message)
	{
		
		$curl = curl_init();

/*
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
*/


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
 	
 ?>