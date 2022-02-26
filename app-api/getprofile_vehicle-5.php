<?php
include('config.php');

$pid = $_POST['id'];
$jsonResponse = array("profile_vehicle1"=>array());
$query = mysql_query("select * from tbl_vehicle_owner where vehicle_owner_id='$pid'");

if (mysql_num_rows($query) > 0){
	while($data = mysql_fetch_array($query)){
	$d_c_image = 'http://nationproducts.in/rahul-vehicle/app-api/upload/vehicle_documents/'.$data['driver_certificate']; 
    $permit_img = 'http://nationproducts.in/rahul-vehicle/app-api/upload/vehicle_documents/'.$data['truck_permit'];  
$fitness_img = 'http://nationproducts.in/rahul-vehicle/app-api/upload/vehicle_documents/'.$data['f_certificate'];	
$reg_file = 'http://nationproducts.in/rahul-vehicle/app-api/upload/vehicle_documents/'.$data['truck_reg_file']; 
    $aadhar_img = 'http://nationproducts.in/rahul-vehicle/app-api/upload/vehicle_documents/'.$data['aadhar_file'];  
$dl_img = 'http://nationproducts.in/rahul-vehicle/app-api/upload/vehicle_documents/'.$data['dl_file'];  
		$comp_details= array(
        'id' => $data['vehicle_owner_id'],
		'vehicle_owner_type' => $data['vehicle_type'],
        'truck_reg_no' => $data['truck_reg_no'],
         'driver_name' => $data['driver_name'],
          'driver_mb_no' => $data['d_mb_no'],
           'aadhar_no' => $data['aadhar_voter_id'],
            'truck_type' => $data['truck_type'],
            'dl_file' => $dl_img,
            'aadhar_file' => $aadhar_img,
         //   'driver_certificate' => $data['driver_certificate'],
            'truck_reg_file' => $reg_file,
             'load_passing' => $data['load_passing'],
              'fitness_certificate' => $fitness_img,
             'route' => $data['route'],
           'truck_permit' => $permit_img,
            'driver_certificate' => $d_c_image,
             'truck_insurance' => $data['truck_insurance'],
             
            

    );
	array_push($jsonResponse['profile_vehicle1'],$comp_details);
         
        }
		echo json_encode($jsonResponse);   
}else{
	$comp_details['profile_loader1'] = [];
	echo json_encode($comp_details);

}