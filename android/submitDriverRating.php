<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$id = $_POST['id'];
$driver_rating = $_POST['driver_rating'];


    $insquery = "UPDATE assigned_orders SET driver_rating = '$driver_rating' WHERE id = '$id'";
 
 $row = mysqli_query($dbhandle,$insquery);
 	
 	if($row)
 	{   
 	    
 	    $row33 = mysqli_query($dbhandle,"INSERT INTO count SET ratings = 'read'");
 	    
 	    $data2 = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM assigned_orders WHERE id = '$id'"));
 	    
 	    $data = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM assigned_orders WHERE order_id = '$id'"));
		
		$user_id = $data['user_id'];
 	    
 	    $udata = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM users WHERE id = '$user_id'"));
 	    
 	    $m = "You got ".$loader_rating." rating for Order #".$id;

$token = array();

$token[] = $udata['token'];
$token[] = $budata['token'];


$Eresult = array(
	 "message" => $m,
	 "image" => "",
	) ;
    
   
   
   
   $url = 'https://fcm.googleapis.com/fcm/send';
			
$fields = array();
$fields['data'] = $Eresult;

//if(is_array($token)){
	$fields['registration_ids'] = $token;
	$fields['priority'] = 'high';
//}else{
//	$fields['to'] = $token;
//	$fields['priority'] = 'high';
//}

define("GOOGLE_API_KEY", "AAAAqGvFmJM:APA91bGPphPrqejFtYtN5pB21B1aMMFOqBIbb8K5ttTCffiRBYjI0Ifpnf6bDaPYSGwaJ2usTZ805I9OkvNVPy8Bn3BSvC6dK4ZfV3jCgXXNKqbgItemMKgeqtVVCs2QHVi5SCMNwv6X");

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
 	    
	    
	    $data = array(
	        "status" => "1",
	        "message" => "Submitted successfully",
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


 
 	

	    
	    
?>