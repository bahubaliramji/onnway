<?php
include('config.php');
if ($_POST['token_id'] != '' && $_POST['truck_type'] != "" && $_POST['load_passing'] != "" && $_POST['truck_permit_no'] != "" && $_FILES['truck_permit_file']['name'] != "" && $_POST['truck_reg_no'] != "" && $_FILES['truck_reg_file']['name'] != "" && $_POST['truck_validity'] != "" && $_FILES['insurance_file']['name'] != "" && $_POST['fitness_cert_no'] != "" && $_FILES['fitness_cert_file']['name'] != "" && $_POST['driver_name'] != "" && $_POST['mobile_no'] != "" && $_POST['dl'] != "" && $_FILES['dl_file']['name'] != "" && $_POST["vehicle_owner_type"]=="owner") {
    $user_id = checkUserToken($_POST['token_id']);
    if ($user_id != "") {
        $truck_reg_no        = $_POST['truck_reg_no'];
        $driver_name         = $_POST['driver_name'];
        $mobile_no           = $_POST['mobile_no'];
        $dl                  = $_POST['dl'];
        $aadhar_no           = $_POST['aadhar_no'];
        $bank_details        = $_POST['bank_details'];
        $truck_type          = $_POST['truck_type'];
        $load_passing        = $_POST['load_passing'];
        $fitness_cert_no     = $_POST['fitness_cert_no'];
        $truck_permit_no     = $_POST['truck_permit_no'];
        $auth_driver_cert_no = $_POST['auth_driver_cert_no'];
        $truck_validity      = $_POST['truck_validity'];
        $path                = "../upload/vehicle_documents/";
        $random_key          = strtotime(date('Y-m-d H:i:s'));
        $route_operate = $_POST['route_operate'];

        $insert   = mysql_query("Insert INTO tbl_trucks(vehicle_owner_id, truck_reg_no, truck_type, load_passing, route_operate, truck_permit_no, truck_validity, driver_name, mobile_no, dl, aadhar_no, fitness_cert_no,auth_driver_cert_no, created_date)VALUE('" . $user_id . "','" . $truck_reg_no . "','" . $truck_type . "','" . $load_passing . "', '" . $route_operate . "', '" . $truck_permit_no . "','" . $truck_validity . "','" . $driver_name . "','" . $mobile_no . "','" . $dl . "','" . $aadhar_no . "','" . $fitness_cert_no . "','" . $auth_driver_cert_no . "','" . date('d-m-Y') . "')");
        $truck_id = mysql_insert_id();
        if (!empty($_FILES['truck_reg_file']['name'])) {
            $truck_reg_file = $_FILES['truck_reg_file']['name'];
            $truck_reg_file = rand() . $random_key . '-' . $truck_reg_file;
            $truck_reg_tmp  = $_FILES['truck_reg_file']['tmp_name'];
            move_uploaded_file($truck_reg_tmp, $path . $truck_reg_file);
            $truck_reg_file = ", truck_reg_file = '$truck_reg_file'";
        } else {
            $truck_reg_file = "";
        }
        if (!empty($_FILES['truck_permit_file']['name'])) {
            $truck_permit_file = $_FILES['truck_permit_file']['name'];
            $truck_permit_file = rand() . $random_key . '-' . $truck_permit_file;
            $truck_permit_tmp  = $_FILES['truck_permit_file']['tmp_name'];
            move_uploaded_file($truck_permit_tmp, $path . $truck_permit_file);
            $truck_permit_file = ", truck_permit_file = '$truck_permit_file'";
        } else {
            $truck_permit_file = "";
        }
        if (!empty($_FILES['insurance_file']['name'])) {
            $insurance_file = $_FILES['insurance_file']['name'];
            $insurance_file = rand() . $random_key . '-' . $insurance_file;
            $insurance_tmp  = $_FILES['insurance_file']['tmp_name'];
            move_uploaded_file($insurance_tmp, $path . $insurance_file);
            $insurance_file = ", insurance_file = '$insurance_file'";
        } else {
            $insurance_file = "";
        }
        if (!empty($_FILES['fitness_cert_file']['name'])) {
            $fitness_cert_file = $_FILES['fitness_cert_file']['name'];
            $fitness_cert_file = rand() . $random_key . '-' . $fitness_cert_file;
            $fitness_cert_tmp  = $_FILES['fitness_cert_file']['tmp_name'];
            move_uploaded_file($fitness_cert_tmp, $path . $fitness_cert_file);
            $fitness_cert_file = ", fitness_cert_file = '$fitness_cert_file'";
        } else {
            $fitness_cert_file = "";
        }
        if (!empty($_FILES['auth_driver_cert_file']['name'])) {
            $auth_driver_cert_file = $_FILES['auth_driver_cert_file']['name'];
            $auth_driver_cert_file = rand() . $random_key . '-' . $auth_driver_cert_file;
            $auth_driver_cert_tmp  = $_FILES['auth_driver_cert_file']['tmp_name'];
            move_uploaded_file($auth_driver_cert_tmp, $path . $auth_driver_cert_file);
            $auth_driver_cert_file = ", auth_driver_cert_file = '$auth_driver_cert_file'";
        } else {
            $auth_driver_cert_file = "";
        }
        if (!empty($_FILES['dl_file']['name'])) {
            $dl_file = $_FILES['dl_file']['name'];
            $dl_file = rand() . $random_key . '-' . $dl_file;
            $$dl_tmp = $_FILES['dl_file']['tmp_name'];
            move_uploaded_file($$dl_tmp, $path . $dl_file);
            $dl_file = ", dl_file = '$dl_file'";
        } else {
            $dl_file = "";
        }
        if (!empty($_FILES['aadhar_file']['name'])) {
            $aadhar_file = $_FILES['aadhar_file']['name'];
            $aadhar_file = rand() . $random_key . '-' . $aadhar_file;
            $aadhar_tmp  = $_FILES['aadhar_file']['tmp_name'];
            move_uploaded_file($aadhar_tmp, $path . $aadhar_file);
            $aadhar_file = ", aadhar_file = '$aadhar_file'";
        } else {
            $aadhar_file = "";
        }
        $update = mysql_query("UPDATE tbl_trucks SET status='1' $truck_reg_file  $truck_permit_file $insurance_file  $fitness_cert_file $auth_driver_cert_file $dl_file $aadhar_file where vehicle_owner_id = '" . $user_id . "' and id='" . $truck_id . "'");
        $response["is_error"] = false;
        $response["message"]  = "Truck Details Added Successfully.";
    } else {
        $response["is_error"] = true;
        $response["message"]  = "Please Login again.Your Session Has been Expire.";
    }
} else {
    $response["is_error"] = true;
    $response["message"]  = "Required parameter type is missing";
}
echo json_encode($response);
?>