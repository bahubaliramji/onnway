<?php
include('config.php');
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST["phone"];
$email = $_POST['email'];
$password = $_POST['password'];
// $repassword = $_POST["repassword"];
$company = $_POST["company"];
  $address = $_POST["address"];
   $city = $_POST["city"];
    $pincode = $_POST["pincode"];
     $altercontactinfo = $_POST["altercontactinfo"];
  $altermobnumber = $_POST["altermobnumber"];
$landlinenumber = $_POST["landlinenumber"];
 $pan_number = $_POST["pan_number"];
  $trucktype = $_POST["trucktype"];
  $aadhar_number = $_POST["aadhar_number"];
 
   $status= "active";


$jsonResponse = array("individual_regis"=>array());

$insert = mysql_query("Insert INTO tbl_loader_individual(f_name,l_name,mb_no,email,password,repassword,address,city,pincode,a_contact_no,a_mb_no
      ,landline_no,pan_no,truck_used,aadhar_no,status)
      VALUE('".$fname."','".$lname."','".$phone."','".$email."'
    ,'".$password."' ,'".$company."','".$address."','".$city."','".$pincode."','".$altercontactinfo."','".$altermobnumber."'
    ,'".$landlinenumber."'
    ,'".$pan_number."','".$trucktype."','".$aadhar_number."','".$status."')");
	$lastid = mysql_insert_id ();
	$details= array(
        'tbl_l_individual_id' => $lastid,
        'email' => $email,
        'f_name' => $fname,
        'l_name' => $lname,
        'mb_no' => $phone,
        'status' => 'active',
        'message' => "Registration Successfull.",
		);
	array_push($jsonResponse['individual_regis'],$details);
	


echo json_encode($jsonResponse);



?>