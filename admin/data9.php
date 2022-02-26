<?php
ob_start();
session_start();
include'inc/admindb.php';

$edit_id = $_POST['id'];
  $source = $_POST['source'];
              $destination = $_POST['destination'];
              $schedule = $_POST['schedule'];
              $weight = $_POST['weight'];
              $material = $_POST['material'];
              $load_passing = $_POST['load_passing'];
              $type = $_POST['type'];
              $length = $_POST['length'];
              $width = $_POST['width'];
              $height = $_POST['height'];
              $remarks = $_POST['remarks'];


$question_insert = "UPDATE posted_trucks SET 
source = '$source',
destination = '$destination',
schedule = '$schedule',
truck_type = '$type',
load_passing = '$load_passing',
weight = '$weight',
material = '$material',
length = '$length',
width = '$width',
height = '$height',
remarks = '$remarks'
WHERE id = '$edit_id'";

                      $run = mysqli_query($con , $question_insert);
	
	echo $run;
	//echo $_POST['aid'];


?>