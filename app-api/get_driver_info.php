<?php
 include('config.php');
if ($_POST['id'] != ""  && is_numeric($_POST['id'])){
        $query = mysql_query("SELECT * FROM tbl_trucks WHERE  id = '".$_POST['id']."' order by id desc limit 1 ");
                if (mysql_num_rows($query) > 0) {
					$token = rand().md5(rand().uniqid('', true));
                    $result = mysql_fetch_array($query);
                    $response["is_error"] = false;
                    $response["message"]  = "Driver Details.";
					$response["data"]["truck_reg_no"] = $result['truck_reg_no'];
					$response["data"]["truck_reg_file"] = $result['truck_reg_file'];
					$response["data"]["truck_type"] = getTruckType($result['truck_type']);
					$response["data"]["load_passing"] = $result['load_passing'];
					$destination = explode(',',$result['route_operate']);
						$cm = '';
						foreach($destination as $id =>$value){
							$route .= $cm.getCity($value);
							$cm = ',';
						}
					$response["data"]["route_operate"] = $route;
					$response["data"]["truck_permit_no"] = $result['truck_permit_no'];
					$response["data"]["truck_permit_file"] = $result['truck_permit_file'];
					$response["data"]["truck_validity"] = $result['truck_validity'];
					$response["data"]["insurance_file"] = $result['insurance_file'];
					$response["data"]["driver_name"] = $result['driver_name'];
					$response["data"]["mobile_no"] = $result['mobile_no'];
					$response["data"]["dl"] = $result['dl'];
					$response["data"]["dl_file"] = $result['dl_file'];
					$response["data"]["aadhar_no"] = $result['aadhar_no'];
					$response["data"]["aadhar_file"] = $result['aadhar_file'];
					$response["data"]["fitness_cert_no"] = $result['fitness_cert_no'];
					$response["data"]["fitness_cert_file"] = $result['fitness_cert_file'];
					$response["data"]["auth_driver_cert_no"] = $result['auth_driver_cert_no'];
					$response["data"]["auth_driver_cert_file"] = $result['auth_driver_cert_file'];
					$response["data"]['file_path'] = "http://onnway.com/rahul-vehicle/upload/vehicle_documents/";
					
                } else {
                    $response["is_error"] = true;
                    $response["message"]  = "Invalid User Id.";
                }
} else {
    $response["is_error"] = true;
    $response["message"]  = "Required parameter type is missing";
}
echo json_encode($response);
?>