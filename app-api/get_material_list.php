<?php
include('config.php');
session_start();
if (isset($_POST['get_material'])) {
    $response["is_error"] = false;
    $response["message"] = "Material List";
    $response["data"]['material'] = getResult("select material_name from tbl_material order by material_name asc");
} else {
    $response["is_error"] = true;
    $response["message"]  = "Required field can't be blank";
}
echo json_encode($response);
?>