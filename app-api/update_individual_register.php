<?php
include('config.php');
$edit_id = $_POST['edit_id'];
//print_r($edit_id);
       $fname = $_POST['fname'];
        $lname = $_POST['lname'];
      
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    //    $repassword = $_POST['repassword'];
     //   $company = $_POST['company'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];
        $altercontactinfo = $_POST['altercontactinfo'];
        $altermobnumber = $_POST['altermobnumber'];
        $landlinenumber = $_POST['landlinenumber'];
        $pan_number = $_POST['pan_number'];
        $trucktype = $_POST['trucktype'];
        $aadhar_number = $_POST['aadhar_number'];
        $status= "active";
$jsonResponse = array("update_individual_register"=>array());
//$username_c = mysql_query("select * from tbl_loader_individual where tbl_l_individual_id='".$editid."'");
//$username_count = mysql_num_rows($username_c);
//if($username_count>0){

	$update = mysql_query("UPDATE tbl_loader_individual SET f_name = '$fname', l_name = '$lname', mb_no = '$phone', email = '$email'
    , password = '$password', address = '$address', city = '$city', pincode = '$pincode'
    , a_contact_no = '$altercontactinfo', a_mb_no = '$altermobnumber', landline_no = '$landlinenumber', pan_no = '$pan_number'
    , truck_used = '$trucktype', aadhar_no = '$aadhar_number' WHERE tbl_l_individual_id = '$edit_id'");
	 $details= array(
         'tbl_l_individual_id' => $edit_id,
       
        'f_name' => $fname,
        'l_name' => $lname,
        'mb_no' => $phone,
       'email' =>  $email,
       'password' => $password,
       'address' =>  $address,
       'city' => $city,
       'pincode' => $pincode,
      'a_contact_no' => $altercontactinfo,
       'a_mb_no' => $altermobnumber,
       'landline_no' => $landlinenumber,
       'pan_no' => $pan_number,
       'truck_used' => $trucktype,
       'aadhar_no' => $aadhar_number,
        'message' => ' Updated Successfully.',
		);
	array_push($jsonResponse['update_individual_register'],$details);

//}
echo json_encode($jsonResponse);



?>