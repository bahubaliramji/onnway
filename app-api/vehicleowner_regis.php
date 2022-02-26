<?php
include('config.php');

$name = $_POST["name"];
$city = $_POST["city"];
   
    
    
        $mb_no = $_POST["phone"];
   
      
        $address_error = "enter address";
  
  
        $address = $_POST["address"];
  
        $email = $_POST["email"];
  
        $password = $_POST["password"];
  
    
        $no_truck = $_POST["no_truck"];
  
        $driver_name = $_POST["driver_name"];
  
        $driver_phone = $_POST["driver_phone"];
  
        $truck_type = $_POST["truck_type"];
  
        $load_passing = $_POST["load_passing"];
  
        $operate_route = $_POST["operate_route"];
  
//$type = $_POST['type'];
//$date = date('Y-m-d');
 $path = $base_url."upload/vehicle_owner_image/";
$pancard_file =$_FILES['pancard_file']['name'];
$tmp_path = $_FILES['pancard_file']['tmp_name'];



$aadharcard_kyc =$_FILES['aadharcard_kyc']['name'];
$tmp_path = $_FILES['aadharcard_kyc']['tmp_name'];


    
    
    
    
      $tds_file =$_FILES['tds_file']['name'];
  $tmp_path = $_FILES['tds_file']['tmp_name'];
  


      $truck_registration =$_FILES['truck_registration']['name'];
  $tmp_path = $_FILES['truck_registration']['tmp_name'];
  

  
  


$driver_license =$_FILES['driver_license']['name'];
  $tmp_path = $_FILES['driver_license']['tmp_name'];
  

    $aadhar_voterfile =$_FILES['aadhar_voterfile']['name'];
  $tmp_path = $_FILES['aadhar_voterfile']['tmp_name'];
  

   
   $fitness_certificate =$_FILES['fitness_certificate']['name'];
  $tmp_path = $_FILES['fitness_certificate']['tmp_name'];
  



  $truck_permit =$_FILES['truck_permit']['name'];
  $tmp_path = $_FILES['truck_permit']['tmp_name'];
  

  $driver_certificate =$_FILES['driver_certificate']['name'];
  $tmp_path = $_FILES['driver_certificate']['tmp_name'];
  

  $truck_insurance =$_FILES['truck_insurance']['name'];
  $tmp_path = $_FILES['truck_insurance']['tmp_name'];
  

    $status= "active";
    
 
    move_uploaded_file($tmp_path,$path.$pancard_file);
    move_uploaded_file($tmp_path,$path.$aadharcard_kyc);
    move_uploaded_file($tmp_path,$path.$tds_file);
    move_uploaded_file($tmp_path,$path.$tds_file);
    move_uploaded_file($tmp_path,$path.$truck_registration);
    move_uploaded_file($tmp_path,$path.$driver_license);
    move_uploaded_file($tmp_path,$path.$aadhar_voterfile);
    move_uploaded_file($tmp_path,$path.$fitness_certificate);
    move_uploaded_file($tmp_path,$path.$truck_permit);
    move_uploaded_file($tmp_path,$path.$driver_certificate);
    move_uploaded_file($tmp_path,$path.$truck_insurance);

$jsonResponse = array("vehicleowner_regis"=>array());

$insert = mysql_query("Insert INTO tbl_vehicle_owner(name,city,mb_no,address,pan_card,aadhar_card,email,password,no_trucks,
      d_form,t_r_no,driver_name,d_mb_no,d_license_no,aadhar_voter_id,truck_type,load_passing,f_certificate,route,truck_permit
      ,driver_certificate
      ,truck_insurance,status)
      VALUE('".$name."','".$city."','".$mb_no."','".$address."','".$pancard_file."'
    ,'".$aadharcard_kyc."','".$email."','".$password."','".$no_truck."','".$tds_file."','".$truck_registration."','".$driver_name."'
    ,'".$driver_phone."','".$driver_license."'
    ,'".$aadhar_voterfile."','".$truck_type."','".$load_passing."','".$fitness_certificate."','".$operate_route."','".$truck_permit."'
    ,'".$driver_certificate."','".$truck_insurance."','".$status."')");
	$lastid = mysql_insert_id ();
	$details= array(
        'vehicle_owner_id' => $lastid,
        'name' => $name,
        'city' => $city,
       
        'mb_no' => $mb_no,
        'status' => 'active',
        'message' => "Registration Successfull.",
		);
	array_push($jsonResponse['vehicleowner_regis'],$details);
	echo json_encode($jsonResponse);



?>