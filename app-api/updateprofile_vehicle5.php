<?php
include('config.php');
          $id = $_POST['id'];
         $truck_reg_no = $_POST['truck_reg_no'];
         $driver_name = $_POST['driver_name'];
        $driver_mb_no = $_POST['driver_mb_no'];
        $aadhar_no = $_POST['aadhar_no'];
       $bank_details = $_POST['bank_details'];
         $truck_type = $_POST['truck_type'];
        // $fitness_certificate = $_POST['fitness_certificate'];
        $route = $_POST['route'];
      //  $truck_permit = $_POST['truck_permit'];
     //  $driver_certificate = $_POST['driver_certificate'];
  $path = "upload/vehicle_documents/";
  $truck_permit =$_FILES['truck_permit']['name'];
  $tmp_path = $_FILES['truck_permit']['tmp_name'];
   $driver_certificate =$_FILES['driver_certificate']['name'];
  $tmp_path = $_FILES['driver_certificate']['tmp_name'];
 $truck_reg_file =$_FILES['truck_reg_file']['name'];
  $tmp_path = $_FILES['truck_reg_file']['tmp_name'];

 $dl_file =$_FILES['dl_file']['name'];
  $tmp_path = $_FILES['dl_file']['tmp_name'];
   $aadhar_file =$_FILES['aadhar_file']['name'];
  $tmp_path = $_FILES['aadhar_file']['tmp_name'];
 $fitness_certificate =$_FILES['fitness_certificate']['name'];
  $tmp_path = $_FILES['fitness_certificate']['tmp_name'];

  move_uploaded_file($tmp_path,$path.$truck_permit);
   move_uploaded_file($tmp_path,$path.$driver_certificate); 
   move_uploaded_file($tmp_path,$path.$truck_reg_file); 

 move_uploaded_file($tmp_path,$path.$dl_file);
   move_uploaded_file($tmp_path,$path.$aadhar_file); 
   move_uploaded_file($tmp_path,$path.$fitness_certificate);
       $truck_insurance = $_POST['truck_insurance'];
       
$jsonResponse = array("vehicle_individual_registration5"=>array());
$username_c = mysql_query("select * from tbl_vehicle_owner where vehicle_owner_id='".$id."'");
//$username_count = mysql_num_rows($username_c);
//if($username_count>0){

	$update = mysql_query("UPDATE tbl_vehicle_owner SET truck_reg_no = '$truck_reg_no', driver_name = '$driver_name', d_mb_no = '$driver_mb_no', aadhar_voter_id = '$aadhar_no' , bank_details = '$bank_details', truck_type = '$truck_type', truck_reg_file = '$truck_reg_file', dl_file = '$dl_file', aadhar_file = '$aadhar_file', f_certificate = '$fitness_certificate', route = '$route' , truck_permit = '$truck_permit', driver_certificate = '$driver_certificate' , truck_insurance = '$truck_insurance'  WHERE vehicle_owner_id = '$id'");
	 $details= array(
         'id' => $id,
       
        'truck_reg_file' => $truck_reg_file,
        'driver_name' => $driver_name,
          'driver_mb_no' => $driver_mb_no,
        'aadhar_no' => $aadhar_no,
          'truck_type' => $truck_type,
        'route' => $route,
          'truck_permit' => $truck_permit,
        'driver_certificate' => $driver_certificate,
         
        'dl_file' => $dl_file,
          'fitness_certificate' => $fitness_certificate,
        'truck_insurance' => $truck_insurance,
       
        'message' => ' saved Successfully.',
		);
	array_push($jsonResponse['vehicle_individual_registration5'],$details);

//}
echo json_encode($jsonResponse);



?>