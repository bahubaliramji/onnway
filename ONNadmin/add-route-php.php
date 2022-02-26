<?php
include("include/config.php");
$source=$_POST['source'];
$j=getCapsPosn($source);
 function getCapsPosn($str)
 {
  $i = 0;
  $CapsPosn = -1;
  for ($i =0 ; $i < strlen($str) ; $i++)
  {
    if (ord($str[$i]) == 44 )
    {
        //echo ord($str[$i]);
        $CapsPosn = $i;
        return $CapsPosn;
    }
  }
 }
 function getCapsPon($str)
 {
  $i = 0;
  $CapsPosn = -1;
  for ($i =0 ; $i < strlen($str) ; $i++)
  {
    if (ord($str[$i]) == 44 )
    {
        //echo ord($str[$i]);
        $CapsPosn = $i;
        return $CapsPosn;
    }
  }
 }
 $source1=substr($source, 0, $j);
 echo $source1;
 $destination=$_POST['destination'];
$j1=getCapsPon($destination);
 
 $destination1=substr($destination, 0, $j1);
 echo $destination1;
 $vehicle=$_POST['vehicle'];
 echo $vehicle;
 $price=$_POST['price'];
 echo $price;
 $row = mysqli_query($dbhandle,"INSERT INTO `tbl_estimate`( `from_id`, `to_id`, `truck_type`, `price`) VALUES ('$source1','$destination1','$vehicle','$price')");
    
    header('location:route-estimate.php');
?>