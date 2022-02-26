<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$id = $_POST['id'];
$status = $_POST['status'];
$user_id = $_POST['user_id'];
$bid_id = $_POST['bid_id'];



 $insquery = "UPDATE orders SET status = '$status', bid_id = '$bid_id' WHERE id = '$id'";
 
 $row = mysqli_query($dbhandle,$insquery);
 	
 	if($row)
 	{    
	
	
	$row3 = mysqli_query($dbhandle,"SELECT * FROM `bids` where id='$bid_id'");
    $fetch2 = mysqli_fetch_array($row3);
	$user_id = $fetch2['user_id'];
	$laod_type = $fetch2['laod_type'];
	$source = $fetch2['source'];
	$destination = $fetch2['destination'];
	$truck_type = $fetch2['truck_type'];
	$load_passing = $fetch2['load_passing'];
	$schedule = $fetch2['schedule'];
	$weight = $fetch2['weight'];
	$mid = $fetch2['material'];
	$remarks = $fetch2['remarks'];
	$length = $fetch2['length'];
	$width = $fetch2['width'];
	$height = $fetch2['height'];
	$truckTypeDetails = $fetch2['truckTypeDetails'];
	$truckCapacity = $fetch2['truckCapacity'];
	$boxLength = $fetch2['boxLength'];
	$boxWidth = $fetch2['boxWidth'];
	$boxArea = $fetch2['boxArea'];
	$selectedArea = $fetch2['selectedArea'];
	$remainingArea = $fetch2['remainingArea'];
	$selected = $fetch2['selected'];
	
	
	$insquery = "INSERT INTO `posted_trucks`
 (`user_id` , `laod_type` , `source` , `destination` , `truck_type` , `schedule` , `weight` , 
 `load_passing` , `remarks` , `length` , `width` , `height` , `status` , `material`, `truckTypeDetails`, `truckCapacity`, `boxLength`, `boxWidth`, `boxArea`, `selectedArea`, `remainingArea`, `selected`) VALUES 
 ('$user_id', '$laod_type', '$source', '$destination', '$truck_type', '$schedule', '$weight', 
 '$load_passing', '$remarks', '$length', '$width', '$height', 'posted' , '$mid', '$truckTypeDetails', '$truckCapacity', '$boxLength', '$boxWidth', '$boxArea', '$selectedArea', '$remainingArea', '$selected')";
 
 $row22 = mysqli_query($dbhandle,$insquery);
	
	
	$row331 = mysqli_query($dbhandle,"INSERT INTO loader_count SET orders = 'read', user_id = '$user_id'");
	    
	    $nmess1 = "Your bid for Order ID: $id has been accpeted";
	    
    $query3 = mysqli_query($con,"SELECT * FROM users WHERE id = '$user_id'");
		 $row3 = mysqli_fetch_array($query3);
		 
    $token1 = $row3['token'];
    
    sendnoti($nmess1, $token1);
	    
	    $data = array(
	        "status" => "1",
	        "message" => "Booking placed successfully",
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