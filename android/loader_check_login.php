<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	$mobile_no=$_POST['mobile_no'];

	$query = mysqli_query($dbhandle,"SELECT * FROM `loader_profile_tbl` where mobile_no='$mobile_no'");
	$response["users"] = array();
    $rowcount=mysqli_num_rows($query);
    if($rowcount>0)
	{
	   
	
    	while($fetch = mysqli_fetch_array($query)){
    	    
	         $user['name']=$fetch['name'];
	         $user['type']=$fetch['type'];
             $user["city"] = $fetch['city'];
             $user["address"] = $fetch['address'];
             $user["mobile_no"] = $mobile_no;
             array_push($response["users"], $user);
    	} 
	}
	else
	    {
	        $user['name']="";
             $user["city"] = "";
            $user['type']="";
             $user["address"] = "";
              $user["mobile_no"] = "";
             array_push($response["users"], $user);
	    }
	
	echo json_encode($response);
	?>