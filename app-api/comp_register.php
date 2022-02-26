<?php
include('config.php');
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mb_no = $_POST["phone"];
$email = $_POST['email'];
$password = $_POST['password'];
// $repassword = $_POST["repassword"];
  $address = $_POST["address"];
   $city = $_POST["city"];
    $pincode = $_POST["pincode"];
     $altercontactinfo = $_POST["altercontactinfo"];
  $altermobnumber = $_POST["altermobnumber"];
$landlinenumber = $_POST["landlinenumber"];
 $pan_number = $_POST["pan_number"];
  $trucktype = $_POST["trucktype"];
  $aadhar_number = $_POST["aadhar_number"];
  $company_name = $_POST["company_name"];
  $company_type = $_POST["company_type"];
   $company_website = $_POST["company_website"];
//$type = $_POST['type'];
//$date = date('Y-m-d');
   $status= "active";
$path = $base_url."upload/loader_company_profile/";
$comp_img =$_FILES['pimage']['name'];
$tmp_path = $_FILES['pimage']['tmp_name'];
        

 $path =$base_url."upload/loader_company_service/";
$service_img =$_FILES['service_tax']['name'];
$tmp_path = $_FILES['service_tax']['tmp_name'];
        

$path = $base_url."upload/loader_company_pan/";
 $pan_file =$_FILES['pan_file']['name'];
$tmp_path = $_FILES['pan_file']['tmp_name'];

move_uploaded_file($tmp_path,$path.$pan_file);
move_uploaded_file($tmp_path,$path.$comp_img);  
move_uploaded_file($tmp_path,$path.$service_img);

$jsonResponse = array("comp_register"=>array());

$insert = mysql_query("Insert INTO tbl_loader_company(f_name,l_name,mb_no,email,prof_image,password,address,
                        city,pin_code,alt_c_no,alt_m_no,landline_no,pan_no,truck_used,aadhar_no,comp_name,comp_type,service_tax,c_pan_no,
                        company_website,status)VALUE('".$fname."','".$lname."','".$phone."','".$email."','".$comp_img."'
                ,'".$password."','".$address."','".$city."','".$pincode."','".$altercontactinfo."','".$altermobnumber."','".$landlinenumber."',
                '".$pan_number."'
                ,'".$trucktype."','".$aadhar_number."','".$company_name."','".$company_type."','".$service_img."','".$pan_file."','".$company_website."','".$status."')");
	$lastid = mysql_insert_id ();
	$details= array(
        'loader_comp_id' => $lastid,
        'email' => $email,
        'f_name' => $fname,
        'l_name' => $lname,
        'mb_no' => $phone,
        'status' => 'active',
        'message' => "Registration Successfull.",
		);
	array_push($jsonResponse['comp_register'],$details);
	


echo json_encode($jsonResponse);



?>