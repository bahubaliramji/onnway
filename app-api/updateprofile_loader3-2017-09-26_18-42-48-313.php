<?php
include('config.php');

$edit_id = $_POST['id'];
 $company_name = $_POST["company_name"];
     $company_type = $_POST["company_type"];
    $service_tax = $_POST["service_tax"];
    $pan_no = $_POST["pan_no"];
   $tin_no = $_POST["tin_no"];
    $company_website = $_POST["company_website"];
    


$jsonResponse = array("updateprofile_loader3"=>array());

$username_c = mysql_query("select * from tbl_loader where id='".$edit_id."'");
//$username_count = mysql_num_rows($username_c);
//if($username_count>0){

	$update = mysql_query("UPDATE tbl_loader SET address = '$company_name', city = '$city', pincode = '$pincode', designation = '$designation', landline_no = '$landline_number', alt_contact_person = '$alternate_contact_person', alt_mb_no = '$alternate_mobile_no', truck_type = '$truck_type' WHERE id = '$edit_id'");
	 $details= array(
         'id' => $edit_id,
       
        'address' => $address,
        'city' => $city,
        
      
       
        'message' => ' Updated Successfully.',
		);
	array_push($jsonResponse['updateprofile_loader3'],$details);

//}
echo json_encode($jsonResponse);
 ?>