<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$user_id = $_POST['user_id'];
$laod_type = $_POST['laod_type'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$truck_type = $_POST['truck_type'];
$schedule = $_POST['schedule'];
$weight = $_POST['weight'];
$load_passing = $_POST['load_passing'];
$remarks = $_POST['remarks'];
$length = $_POST['length'];
$width = $_POST['width'];
$height = $_POST['height'];
$mid = $_POST['mid']; 
$truckTypeDetails = $_POST['truckTypeDetails']; 
$truckCapacity = $_POST['truckCapacity']; 
$boxLength = $_POST['boxLength']; 
$boxWidth = $_POST['boxWidth']; 
$boxArea = $_POST['boxArea']; 
$selectedArea = $_POST['selectedArea']; 
$remainingArea= $_POST['remainingArea']; 
$selected= $_POST['selected']; 

 $insquery = "INSERT INTO `posted_trucks`
 (`user_id` , `laod_type` , `source` , `destination` , `truck_type` , `schedule` , `weight` , 
 `load_passing` , `remarks` , `length` , `width` , `height` , `status` , `material`, `truckTypeDetails`, `truckCapacity`, `boxLength`, `boxWidth`, `boxArea`, `selectedArea`, `remainingArea`, `selected`) VALUES 
 ('$user_id', '$laod_type', '$source', '$destination', '$truck_type', '$schedule', '$weight', 
 '$load_passing', '$remarks', '$length', '$width', '$height', 'posted' , '$mid', '$truckTypeDetails', '$truckCapacity', '$boxLength', '$boxWidth', '$boxArea', '$selectedArea', '$remainingArea', '$selected')";
 
 $row = mysqli_query($dbhandle,$insquery);
 	$iidd = mysqli_insert_id($dbhandle);
 	
 	if($row)
 	{
 	
 	
 	if($laod_type == 'full')
 	    {
 	        $row33 = mysqli_query($dbhandle,"INSERT INTO count SET full_load_trucks = 'read'");
 	    }
 	    if($laod_type == 'part')
 	    {
 	        $row33 = mysqli_query($dbhandle,"INSERT INTO count SET part_load_trucks = 'read'");
 	    }
 	
 	
	$row2 = mysqli_query($dbhandle,"SELECT * FROM `posted_trucks` where id='$iidd' ");
    $fetch = mysqli_fetch_array($row2);
	
	
	$row567 = mysqli_query($dbhandle,"SELECT * FROM `users` where id='$user_id' ");
    $fetch567 = mysqli_fetch_array($row567);
    
    $phh = $fetch567['phone'];
    $token = $fetch567['token'];
	
	
    $response = array(
        "id" => $fetch['id'],
        "user_id" => $fetch['user_id'],
        "laod_type" => $fetch['laod_type'],
        "source" => $fetch['source'],
        "destination" => $fetch['destination'],
        "truck_type" => $fetch21['truck_type'],
        "schedule" => $fetch['schedule'],
        "weight" => $fetch['weight'],
        "load_passing" => $fetch['load_passing'],
        "remarks" => $fetch['remarks'],
        "length" => $fetch['length'],
        "width" => $fetch['width'],
        "height" => $fetch['height'],
        "status" => $fetch['status'],
        "created" => $fetch['created'],
        );
    
	    $nmess = "Dear Sir/Madam, We have received your Truck Post with the Truck ID: $iidd. Your booking will be confirmed shortly according to load availability at your location. You will receive updates through Call/SMS and Email. For more details Visit www.onnway.com";
    
	    sendnoti($nmess, $token);
	    
	    sendotp($phh, $nmess);
	    
	    $data = array(
	        "status" => "1",
	        "message" => "Truck posted successfully",
	        "data" => $response
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