<?php
$target_dir = "Uploads/";
$target_file_name = $target_dir . basename($_FILES['file']['name']);
$response = array();

    if(move_uploaded_files($_FILES['file']['tmp_name'], $target_file_name)) {
        $success = "true";
        $message = "uploaded";
    } else {
        $success = "false";
        $message = "not uploaded";
    }
$response["success"] = $success;
$response["message"] = $message;
echo json_encode($response);

?>