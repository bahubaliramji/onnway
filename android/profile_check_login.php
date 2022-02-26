<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	$mobile_no=$_POST['mobile_no'];

	$query = mysqli_query($dbhandle,"SELECT * FROM `provider_profile_tbl` where mobile_no='$mobile_no'");
	$query1 = mysqli_query($dbhandle,"SELECT * FROM `driver_profile_tbl` where mobile_no='$mobile_no'");
	   $response["users"] = array();
$rowcount=mysqli_num_rows($query);
$rowcount1=mysqli_num_rows($query1);
	if($rowcount>0)
	{
	   
	
    	while($fetch = mysqli_fetch_array($query)){
    	    
	         $user['name']=$fetch['name'];
             $user["transport_name"] = $fetch['transport_name'];
             $user["city"] = $fetch['city'];
             $user["type"] = 1;
             $user["mobile_no"] = $mobile_no;
             array_push($response["users"], $user);
    	} 
	}
	
	else    if($rowcount1>0)
    	{
	      
        	while($fetch = mysqli_fetch_array($query1)){
	         $user['name']=$fetch['name'];
             $user["transport_name"] = $fetch['transport_name'];
             $user["city"] = $fetch['city'];
             $user["type"] = 2;
             $user["mobile_no"] = $mobile_no;
             array_push($response["users"], $user);
    	} 
	    }
	    else
	    {
	        $user['name']="";
             $user["transport_name"] ="";
             $user["city"] = "";
             $user["type"] = "";
             $user["mobile_no"] = "";
             array_push($response["users"], $user);
	    }
	
	echo json_encode($response);
	?>
	