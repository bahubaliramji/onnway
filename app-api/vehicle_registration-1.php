<?php
include('config.php');
session_start();
if($_POST['name']!="" && $_POST['mb_no']!="" && $_POST['otp']!=""  && $_POST['email']!="" && $_POST['password']!="" && $_POST['re_password']!=""  && $_POST['vehicle_owner_type']!=""){
	$name = $_POST["name"];
	$last_name = $_POST["last_name"];
	$aadhar_no = $_POST["aadhar_no"];
    $mb_no = $_POST["mb_no"];
    $email = $_POST["email"];
    $vehicle_owner_type = $_POST["vehicle_owner_type"];
    $password = $_POST["password"];
	$re_password = $_POST["re_password"];
	$transport_name = $_POST['transport_name'];
	
	$check=mysql_num_rows(mysql_query("SELECT * FROM tbl_vehicle_owner WHERE email = '$email' or mb_no = '".$mb_no."'"));
	if ($check >0 || $password!=$re_password)
	{
		$response["is_error"] = true;
		$response["message"] = "Email id / Mobile Already Exists or Password not Matched";
	}else{
		$getotp = mysql_query("SELECT mobile,otp FROM otp_vehicle WHERE mobile = '".$_POST['mb_no']."' and status='1' order by id desc limit 1");
		$otp_result = mysql_fetch_assoc($getotp);
		
		if($_POST['otp'] == $otp_result['otp'] && $_POST['mb_no'] == $otp_result['mobile']){
			mysql_query("update otp_vehicle set status='0' WHERE mobile = '".$_POST['mb_no']."' ");
			$token = rand().md5(rand().uniqid('', true));
			$insert = mysql_query("Insert INTO tbl_vehicle_owner(vehicle_owner_type, name, last_name, aadhar_no,  mb_no, email, password,token,transport_name,created_date)VALUE('".$vehicle_owner_type."','".$name."','".$last_name."','".$aadhar_no."','".$mb_no."','".$email."','".$password."','".$token."','$transport_name' ,'".date('h:i:s d-m-Y')."')");
			$lastid = mysql_insert_id();
			$response["is_error"] = false;
			$response["message"] = "Registration Successfull";
			$response["data"]["token_id"] = $token;
			$response["data"]["name"] = $name;
			$response["data"]["last_name"] = $last_name;
			$response["data"]["email"] = $email;
			$response["data"]["mb_no"] = $mb_no;
			$response["data"]["vehicle_owner_type"] = $vehicle_owner_type;
			
		}else{
			$response["is_error"] = true;
			$response["message"] = "Otp is Invalid.Please Try again.";
		}
	}
	
}else{
	$response["is_error"] = true;
	$response["message"] = "Required field can't be blank";
}
	echo json_encode($response);
?>