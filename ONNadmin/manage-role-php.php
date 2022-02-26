<?php
include("include/config.php");
$id=$_GET['id'];
$loadrequest=0;
$loadrequest=$_POST['loadrequest'];
echo $loadrequest;
$managequote=0;
$managequote=$_POST['managequote'];
echo $managequote;
$employeelogin=0;
$employeelogin=$_POST['employeelogin'];
$loaderregistration=0;
$loaderregistration=$_POST['loaderregistration'];
$vechileregistration=0;
$vechileregistration=$_POST['vechileregistration'];
$trackorder=0;
$trackorder=$_POST['trackorder'];
$bookedtruck=0;
$bookedtruck=$_POST['bookedtruck'];
$bookedorder=0;
$bookedorder=$_POST['bookedorder'];
$setting=0;
$setting=$_POST['setting'];
$transportform=0;
$transportform=$_POST['transportform'];
$row = mysqli_query($dbhandle,"UPDATE `tbl_admin` SET `managequotes`='$managequote',`loadrequest`='$loadrequest',`employeelogin`='$employeelogin',`loaderreg`='$loaderregistration',`vehiclereg`='$vechileregistration',`trackorder`='$trackorder',`bookedtruck`='$bookedtruck',`bookedorder`='$bookedorder',`setting`='$setting',`transportform`='$transportform' WHERE `id`='$id'");
header('location:employeelogin.php');
?>