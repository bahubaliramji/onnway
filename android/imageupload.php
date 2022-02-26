<?php
session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
$mobile_no=$_POST['mobile_no'];
$name=$_POST['name'];
$user_type=$_POST['user_type'];
str_replace('"', '', $name);
str_replace('"', '', $mobile_no);
if($user_type=="driver"){
$query1 = mysqli_query($dbhandle,"UPDATE `driver_profile_tbl` SET `$name`='1' WHERE `mobile_no`='$mobile_no'");
}
if($user_type=="provider"){
$query1 = mysqli_query($dbhandle,"UPDATE `provider_profile_tbl` SET `$name`='1' WHERE `mobile_no`='$mobile_no'");
}
$result = array("success" => $_FILES["file"]["name"]);
$file_path = "Uploads/".$mobile_no.$name.".png";
if(move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
    $result = array("success" => "File successfully uploaded");
} else{
    $result = array("success" => "error uploading file");
}
echo json_encode($result, JSON_PRETTY_PRINT);
/*


 
 
 $DefaultId = 0;
 
 $ImageData = $_POST['image_path'];
 
 $ImageName = $_POST['image_name'];


 
 $ImagePath = "Uploads/".$ImageName.".jpg";
 
 

 file_put_contents($ImagePath,base64_decode($ImageData));

 echo "Your Image Has Been Uploaded.";
 */
?>
