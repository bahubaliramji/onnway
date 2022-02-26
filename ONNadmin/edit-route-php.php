<?php
include("include/config.php");
$source=$_POST['source'];
$id=$_GET['id'];
 $destination=$_POST['destination'];

 $vehicle=$_POST['truck_type'];
echo $vehicle;
 $price=$_POST['price'];

 $row = mysqli_query($dbhandle,"UPDATE `tbl_estimate` SET `from_id`='$source',`to_id`='$destination',`price`='$price' WHERE `id`='$id'");
    
   header('location:loaderlogin.php');
?>