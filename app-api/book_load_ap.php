<?php
include('config.php');
      $source = $_POST["source"];
      $destination = $_POST["destination"];
         $destinationn=implode(',',$destination);
    $material = $_POST["material"];
  $weight = $_POST["weight"];
   $dimension = $_POST["dimension"];
     $vehicletype = $_POST["vehicletype"];
   $noofvehicle = $_POST["noofvehicle"];
    $scheduleddate = $_POST["scheduleddate"];
  $status= "active";
    $post_type= "Post a Load";

$jsonResponse = array("book_load"=>array());

$insert = mysql_query("Insert INTO tbl_book_load(source,destination,material_type,weight,dimension,vehicle_type,no_vehicle
      ,scheduled_date,post_type,status)VALUE('".$source."','".$destinationn."','".$material."','".$weight."','".$dimension."'
    ,'".$vehicletype."','".$noofvehicle."','".$scheduleddate."','".$post_type."','".$status."')");
	$lastid = mysql_insert_id ();
	$details= array(
        'book_load_id' => $lastid,
        'source' => $source,
        'weight' => $weight,
        
        'status' => 'active',
        'message' => "Registration Successfull.",
		);
	array_push($jsonResponse['book_load'],$details);
echo json_encode($jsonResponse);
?>