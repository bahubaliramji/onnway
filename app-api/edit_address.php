<?php
include('config.php');

$edit_id = $_POST['edit_id'];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $pincode = $_POST["pincode"];
   $email = $_POST["email"];

$jsonResponse = array("edit_address"=>array());

$username_c = mysql_query("select * from tbl_address_book where id='".$edit_id."'");
//$username_count = mysql_num_rows($username_c);
//if($username_count>0){
$data = mysql_fetch_array($username_c);
$update = mysql_query("UPDATE tbl_address_book SET address = '$address', city = '$city', pincode = '$pincode' , email = '$email' WHERE id = '$edit_id' ");
	 $details= array(
         'id' => $edit_id,
       
        'address' => $address,
        'city' => $city,
      'pincode' => $pincode,
      'email' => $email,
      
        'message' => ' Updated Successfully.',
		);
	array_push($jsonResponse['edit_address'],$details);

//}
echo json_encode($jsonResponse);
 ?>