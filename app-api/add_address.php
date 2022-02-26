<?php
include('config.php');
 $user_id = $_POST["id"];
     $address = $_POST["address"];
    $city = $_POST["city"];
    $pincode = $_POST["pincode"];
    $email = $_POST["email"];

$jsonResponse = array("add_address"=>array());


  
$insert = mysql_query("Insert INTO tbl_address_book(user_id,address,city,pincode,email)VALUE('".$user_id."','".$address."','".$city."','".$pincode."','".$email."')");


	$lastid = mysql_insert_id ();
	$details= array(
        'id' => $lastid,
        'user id' => $user_id,
        'address' => $city,
        'pincode' => $pincode,
        'email' => $email,
        'message' => "saved Successfully.",
		);
	array_push($jsonResponse['add_address'],$details);
	


echo json_encode($jsonResponse);



?>