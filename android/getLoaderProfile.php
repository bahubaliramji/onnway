<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	

$iidd = $_POST['user_id'];



		
$udata = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM loader_profile_tbl WHERE user_id = '$iidd'"));
		
		$pan = $udata['pan'];
		if(!empty($pan))
		{
		    $pan = base_url."Uploads/lkyc/".$udata['pan'];
		}
		$af = $udata['af'];
		if(!empty($af))
		{
		    $af = base_url."Uploads/lkyc/".$udata['af'];
		}
		
		$ab = $udata['ab'];
			$ab = $udata['af'];
		if(!empty($ab))
		{
		    $ab = base_url."Uploads/lkyc/".$udata['ab'];
		}
		
		$data = array(
		    "user_id" => $udata['user_id'],
		    "name" => $udata['name'],
		    "email" => $udata['email'],
		    "city" => $udata['city'],
		    "type" => $udata['type'],
		    "company" => $udata['company'],
		    "gst" => $udata['gst'],
		    "pan_verify" => $udata['pan_verify'],
		    "af_verify" => $udata['af_verify'],
		    "ab_verify" => $udata['ab_verify'],
		    "image" => base_url."Uploads/profile/".$udata['image'],
		    "pan" => $pan,
		    "af" => $af,
		    "ab" => $ab,
		    "created" => $udata['created'],
		    );
		
		
		$post_data = array(
 			 "status" => '1',
 			 "message" => 'Data',
 			 "data" => $data,
			 );

 	
 	$post_data= json_encode( $post_data );
 	
 	echo $post_data;
 	
 
 	
 ?>