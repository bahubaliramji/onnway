<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$user_id = $_POST['user_id'];
$type = $_POST['type'];


$ythumb = $_FILES['image']['name'];
$ytmp_thumb = $_FILES['image']['tmp_name'];
 $ypath1 = "Uploads/pkyc/".$ythumb ;
if(move_uploaded_file($ytmp_thumb,$ypath1))
{
    	$imm = $ythumb;
    	
    	$insquery = "UPDATE provider_profile_tbl SET $type = '$imm' WHERE user_id = '$user_id'";
    	
    	 $row = mysqli_query($dbhandle,$insquery);
    	
    	if($row)
    	{
    	    $data = array(
	        "status" => "1",
	        "message" => "Uploaded successfully"
	        );
	    
echo json_encode($data);
    	}
    	else
    	{
    	    $data = array(
	        "status" => "0",
	        "message" => "Some error occurred"
	        );
	    
echo json_encode($data);
    	}
    	
}
else
{
    $data = array(
	        "status" => "0",
	        "message" => "Some error occurred"
	        );
	    
echo json_encode($data);
}
	
	

	
	

 
 
    

	    
	    
?>