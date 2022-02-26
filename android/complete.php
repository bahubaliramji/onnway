<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$id = $_POST['id'];


    $insquery = "UPDATE orders SET status = 'completed' WHERE id = '$id'";
 
 $row = mysqli_query($dbhandle,$insquery);
 	
 	if($row)
 	{    
	    
	    mysqli_query($dbhandle, "UPDATE assigned_orders SET truck_status = 'completed' WHERE order_id = '$id'");
	    
	    
	    $data = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM orders WHERE id = '$id'"));
		  
		  $user_id = $data['user_id'];
		  $source = $data['source'];
		  $destination = $data['destination'];
 	    
 	    $udata = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM users WHERE id = '$user_id'"));
 	    
 	    $m = "Your Order #".$id." has completed";

$token = $udata['token'];
$phh = $udata['phone'];

   $nmess = "Hello  Sir/Madam, Your order on onnway.com From $source To $destination with Order ID: $id is reached its destination and delivered. Happy to serve you! Visit www.onnway.com";
    
	    sendnoti($nmess, $token);
	    
	    sendotp($phh, $nmess);
   
	    
	    $data = array(
	        "status" => "1",
	        "message" => "Booking completed successfully",
	        "data" => (object)[]
	        );
	    
echo json_encode($data);
	    
 	}
 	else
 	{
 	    $data = array(
	        "status" => "0",
	        "message" => "Some error occurred",
	        "data" => (object)[]
	        );
	    
echo json_encode($data);
 	}


 function sendotp($phone , $message)
	{
		
		$curl = curl_init();



curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
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
 	
 	
 	function sendnoti($m , $token)
 	{
 	    


$Eresult = array(
	 "message" => $m,
	 "image" => "",
	) ;
    
   
   
   
   $url = 'https://fcm.googleapis.com/fcm/send';
			
$fields = array();
$fields['data'] = $Eresult;

//if(is_array($token)){
	$fields['to'] = $token;
	$fields['priority'] = 'high';
//}else{
//	$fields['to'] = $token;
//	$fields['priority'] = 'high';
//}

define("GOOGLE_API_KEY", "AAAAHwzc0WE:APA91bGykghU3ZdD-49yW11vV9B0u4o5PIWXtXq9g7U8uJZwht1J9LSXZxL3asS_ytYpOLLSQsOmkUdUYF0SwAWxfj5EbZTKUAXVOfFaZsJ3CnDtVE9HjdBtFlaz82tbxwkfd8jHLss-");

$headers = array(
	'Content-Type:application/json',
  'Authorization: key=' . GOOGLE_API_KEY
);
		//print_r($fields);	
		
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$result = curl_exec($ch);

//echo $result;

if ($result === FALSE) {
	die('FCM Send Error: ' . curl_error($ch));
}
curl_close($ch);
 	}
 	

	    
	    
?>