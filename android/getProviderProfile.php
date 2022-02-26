<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	

$iidd = $_POST['user_id'];



		
$udata = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM provider_profile_tbl WHERE user_id = '$iidd'"));
		
		$back_visiting = $udata['back_visiting'];
		if(!empty($back_visiting))
		{
		    $back_visiting = base_url."Uploads/pkyc/".$udata['back_visiting'];
		}
		$front_visiting = $udata['front_visiting'];
		if(!empty($front_visiting))
		{
		    $front_visiting = base_url."Uploads/pkyc/".$udata['front_visiting'];
		}
		
		$back_pan = $udata['back_pan'];
		if(!empty($back_pan))
		{
		    $back_pan = base_url."Uploads/pkyc/".$udata['back_pan'];
		}
		$front_pan = $udata['front_pan'];
		if(!empty($front_pan))
		{
		    $front_pan = base_url."Uploads/pkyc/".$udata['front_pan'];
		}
		
		
		$back_aadhar = $udata['back_aadhar'];
		if(!empty($back_aadhar))
		{
		    $back_aadhar = base_url."Uploads/pkyc/".$udata['back_aadhar'];
		}
		$front_aadhar = $udata['front_aadhar'];
		if(!empty($front_aadhar))
		{
		    $front_aadhar = base_url."Uploads/pkyc/".$udata['front_aadhar'];
		}
		
		$back_passbook = $udata['back_passbook'];
		if(!empty($back_passbook))
		{
		    $back_passbook = base_url."Uploads/pkyc/".$udata['back_passbook'];
		}
		
		$front_passbook = $udata['front_passbook'];
		if(!empty($front_passbook))
		{
		    $front_passbook = base_url."Uploads/pkyc/".$udata['front_passbook'];
		}
		
		$back_other = $udata['back_other'];
		if(!empty($back_other))
		{
		    $back_other = base_url."Uploads/pkyc/".$udata['back_other'];
		}
		$front_other = $udata['front_other'];
		if(!empty($front_other))
		{
		    $front_other = base_url."Uploads/pkyc/".$udata['front_other'];
		}
		
		$data = array(
		    "user_id" => $udata['user_id'],
		    "name" => $udata['name'],
		    "email" => $udata['email'],
		    "city" => $udata['city'],
		    "type" => "".$udata['type'],
		    "company" => "".$udata['company'],
		    "gst" => "".$udata['gst'],
		    "ba_verify" => $udata['ba_verify'],
		    "fa_verify" => $udata['fa_verify'],
		    "bp_verify" => $udata['bp_verify'],
		    "fp_verify" => $udata['fp_verify'],
		    "bv_verify" => $udata['bv_verify'],
		    "fv_verify" => $udata['fv_verify'],
		    "fpa_verify" => $udata['fpa_verify'],
		    "bpa_verify" => $udata['bpa_verify'],
		    "fo_verify" => $udata['fo_verify'],
		    "bo_verify" => $udata['bo_verify'],
		    "image" => base_url."Uploads/profile/".$udata['image'],
		    "back_aadhar" => "".$back_aadhar,
		    "front_aadhar" => "".$front_aadhar,
		    "back_pan" => "".$back_pan,
		    "front_pan" => "".$front_pan,
		    "back_visiting" => "".$back_visiting,
		    "front_visiting" => "".$front_visiting,
		    "front_passbook" => "".$front_passbook,
		    "back_passbook" => "".$back_passbook,
		    "front_other" => "".$front_other,
		    "back_other" => "".$back_other,
		    "created" => "".$udata['created'],
		    );
		
		
		$post_data = array(
 			 "status" => '1',
 			 "message" => 'Data',
 			 "data" => $data,
			 );

	
	
	
	
	
	
 	
 	
 	
 	
 	$post_data= json_encode( $post_data );
 	
 	echo $post_data;
 	
 
 	
 ?>