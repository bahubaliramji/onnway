<?php
include('config.php');
if($_POST['token_id'] != '' && $_POST['address']!=""  && $_POST['city']!="" && $_POST['pincode']!=""){
	
	$user_id = checkUserToken($_POST['token_id']);
	if($user_id!=""){
		$address = $_POST['address'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];
        $designation = $_POST['designation'];
		//$landline_no = $_POST['landline_no'];
		$alt_contact_person = $_POST['alt_contact_person'];
        $alt_mb_no = $_POST['alt_mb_no'];
        $agent_pan_card_no = $_POST['agent_pan_card_no'];
        $agent_aadhar_card_no = $_POST['agent_aadhar_card_no'];
		$path = "../upload/vehicle_documents/";
		$random_key = strtotime(date('Y-m-d H:i:s'));
		
        if(!empty($_FILES['agent_pan_card_file']['name'])){
			$agent_pan_card_file =$_FILES['agent_pan_card_file']['name'];
			$agent_pan_card_file = rand().$random_key.'-'.$agent_pan_card_file;
			move_uploaded_file($_FILES['agent_pan_card_file']['tmp_name'],$path.$agent_pan_card_file);
			$agent_pan_card_file = ", agent_pan_card_file = '$agent_pan_card_file'";
		}else{
			$agent_pan_card_file = "";
		}
		
		if(!empty($_FILES['agent_aadhar_card_file']['name'])){
			$agent_aadhar_card_file =$_FILES['agent_aadhar_card_file']['name'];
			$agent_aadhar_card_file = rand().$random_key.'-'.$agent_aadhar_card_file;
			move_uploaded_file($_FILES['agent_aadhar_card_file']['tmp_name'],$path.$agent_aadhar_card_file);
			$agent_aadhar_card_file = ", agent_aadhar_card_file = '$agent_aadhar_card_file'";
		}else{
			$agent_aadhar_card_file = "";
		}
	
        $update = mysql_query("UPDATE tbl_vehicle_owner SET address = '$address', city = '$city', pincode = '$pincode', designation = '$designation', alt_contact_person = '$alt_contact_person', alt_mb_no = '$alt_mb_no', agent_pan_card_no='$agent_pan_card_no', agent_aadhar_card_no='$agent_aadhar_card_no' $agent_pan_card_file $agent_aadhar_card_file  WHERE vehicle_owner_id = '".$user_id."'");

		$response["is_error"] = false;
		$response["message"] = "Contact Details Updated Successfully.";
	}else{
		$response["is_error"] = true;
		$response["message"] = "Please Login again.Your Session Has been Expire.";
	}
}else{
	$response["is_error"] = true;
	$response["message"] = "Required parameter type is missing";
}

echo json_encode($response);

?>