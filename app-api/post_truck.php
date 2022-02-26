<?php
   include('config.php');
  
  $source = $_POST["source"];
   $truck_reg_no = $_POST["truck_reg_no"];
   $weight = $_POST["weight"];
    $destination = $_POST["destination"];
   $truck_type = $_POST["truck_type"];
   

   $path = "upload/documents/";
   $permit =$_FILES['permit']['name'];
  $tmp_path = $_FILES['permit']['tmp_name'];

  move_uploaded_file($tmp_path,$path.$permit);
  // $status= "active";
    
  $jsonResponse = array("post_truck"=>array());
    $query = mysql_query("Insert INTO tbl_book_truck(source,destination,truck_reg_no,truck_type,weight
      ,permit)VALUE('".$source."','".$destination."','".$truck_reg_no."','".$truck_type."','".$weight."','".$permit."')");

         $lastid = mysql_insert_id ();
   $details= array(
         'id' => $lastid,
    
      'source' => $source,
      
      'destination' => $destination,
      'truck_reg_no' => $truck_reg_no,
      'truck_type' => $truck_type,
      'weight' => $weight,
      'permit' => $permit, 
        'message' => ' saved Successfully.',
        );
    array_push($jsonResponse['post_truck'],$details);


echo json_encode($jsonResponse);

  ?>