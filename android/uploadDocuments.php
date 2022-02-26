<?php
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	
$assign_id = $_POST['assign_id'];


$ythumb = $_FILES['name']['name'];
$ytmp_thumb = $_FILES['name']['tmp_name'];
 $ypath1 = "Uploads/documents/".$ythumb ;
if(move_uploaded_file($ytmp_thumb,$ypath1))
{
    	$imm = $ythumb;
    	
    	$row2 = mysqli_query($dbhandle,"INSERT INTO documents (assign_id , name) VALUES ('$assign_id' , '$imm')");
    	
    	if($row2)
    	{
    	    $data = array(
	        "status" => "1",
	        "message" => "Document uploaded successfully"
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