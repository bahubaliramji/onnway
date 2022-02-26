<?php
   include('config.php');
	$user_id = $_POST["user_id"];
  $source = $_POST["source"];
   $material = $_POST["material"];
   $weight = $_POST["weight"];
    $destination = $_POST["destination"];
   $dimension = $_POST["dimension"];
   $vehicletype = $_POST["vehicletype"];
   $noofvehicle = $_POST["noofvehicle"];
   $scheduleddate = $_POST["scheduleddate"];
   $status= "pending";
		
	$jsonResponse = array("post_load"=>array());
		$query = mysql_query("Insert INTO tbl_book_load(loader_id,source,destination,material_type,weight,vehicle_type
			,scheduled_date,status)VALUE('".$user_id."','".$source."','".$destination."','".$material."','".$weight."','".$vehicletype."','".$scheduleddate."','".$pending."')");

         $lastid = mysql_insert_id ();
	 $details= array(
         'id' => $lastid,
    'user_id' => $user_id,
      'source' => $source,
       'destination' => $destination,
        'message' => ' saved Successfully.',
        );
    array_push($jsonResponse['post_load'],$details);


echo json_encode($jsonResponse);

	?>