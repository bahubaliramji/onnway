<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	

$iidd = $_POST['user_id'];



		
$udata = mysqli_fetch_array(mysqli_query($dbhandle , "SELECT * FROM provider_profile_tbl WHERE user_id = '$iidd'"));
		
		
		
		
		$post_data = array(
 			 "status" => '1',
 			 "name" => $udata['name'],
 			 "transport_name" => $udata['transport_name'],
 			 "city" => $udata['city'],
			 );

	
	
	
	
	
	
 	
 	
 	
 	
 	$post_data= json_encode( $post_data );
 	
 	echo $post_data;
 	
 
 	
 ?>