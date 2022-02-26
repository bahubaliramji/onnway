<?php
ob_start();
session_start();
include'inc/admindb.php';


  $id = $_POST['id'];
  $freight = $_POST['freight'];
  $other_charges = $_POST['other_charges'];
  $cgst = $_POST['cgst'];
  $sgst = $_POST['sgst'];
  $insurance = $_POST['insurance'];
  $discount = $_POST['discount'];


$query = "UPDATE orders SET 
freight = '$freight',
other_charges = '$other_charges',
cgst = '$cgst',
sgst = '$sgst',
insurance = '$insurance',
discount = '$discount'
WHERE id = '$id'";

                      $run = mysqli_query($con , $query);
	
	echo $run;
	//echo $_POST['aid'];


?>