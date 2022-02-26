<?php
include('config.php');
  $source = $_POST["source"];
   $destination = $_POST["destination"];
         $destinationn=implode(',',$destination);
           $truck_register_number = $_POST["truck_register_number"];
           $trucktype = $_POST["trucktype"];
              $weight = $_POST["weight"];
  $post_type= "Post a Truck";
    $status= "active";
    $path = $base_url."upload/book_truck_image/";
     
  $permit =$_FILES['permit']['name'];
  $tmp_path = $_FILES['permit']['tmp_name'];
  
  move_uploaded_file($tmp_path,$path.$permit);

$jsonResponse = array("book_truck_ap"=>array());

$insert = mysql_query("Insert INTO tbl_book_truck(source,destination,truck_reg_no,truck_type,weight,permit,post_type,status)VALUE
      ('".$source."','".$destinationn."','".$truck_register_number."','".$trucktype."','".$weight."','".$permit."','".$post_type."','".$status."')");
	$lastid = mysql_insert_id ();
	$details= array(
        'book_truck_id' => $lastid,
        'source' => $source,
        'weight' => $weight,
       
        'status' => 'active',
        'message' => "Registration Successfull.",
		);
	array_push($jsonResponse['book_truck_ap'],$details);
	


echo json_encode($jsonResponse);



?>