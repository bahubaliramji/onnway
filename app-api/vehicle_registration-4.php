<?php
include('config.php');
if ($_POST['token_id'] != '' && $_POST['company_name'] != "" && $_POST['pan_no'] != "" && $_FILES['pan_file']['name'] != "") {
    $user_id = checkUserToken($_POST['token_id']);
    if ($user_id != "") {
        $company_name   = $_POST['company_name'];
        $tds_dclaration = $_POST['tds_dclaration'];
        $company_type   = $_POST['company_type'];
        $pan_no         = $_POST['pan_no'];
        $gst_no         = $_POST['gst_no'];
        $path           = "../upload/vehicle_documents/";
        $random_key     = strtotime(date('Y-m-d H:i:s'));
        if (!empty($_FILES['gst_file']['name'])) {
            $gst_file     = $_FILES['gst_file']['name'];
            $gst_file     = rand() . $random_key . '-' . $gst_file;
            $gst_file_tmp = $_FILES['gst_file']['tmp_name'];
            move_uploaded_file($gst_file_tmp, $path . $gst_file);
            $gst_file = ", gst_file = '$gst_file'";
        } else {
            $gst_file = "";
        }
        if (!empty($_FILES['pan_file']['name'])) {
            $pan_file     = $_FILES['pan_file']['name'];
            $pan_file     = rand() . $random_key . '-' . $pan_file;
            $pan_file_tmp = $_FILES['pan_file']['tmp_name'];
            move_uploaded_file($pan_file_tmp, $path . $pan_file);
            $pan_file = ", pan_file = '$pan_file'";
        } else {
            $pan_file = "";
        }
        if (!empty($_FILES['tds_file']['name'])) {
            $tds_file     = $_FILES['tds_file']['name'];
            $tds_file     = rand() . $random_key . '-' . $tds_file;
            $tds_file_tmp = $_FILES['tds_file']['tmp_name'];
            move_uploaded_file($tds_file_tmp, $path . $tds_file);
            $tds_file = ", tds_file = '$tds_file'";
        } else {
            $tds_file = "";
        }
        $update = mysql_query("UPDATE tbl_vehicle_owner SET company_name = '$company_name', tds_dclaration = '$tds_dclaration', company_type='$company_type',pan_no='$pan_no',gst_no='$gst_no' $gst_file $pan_file $tds_file  WHERE vehicle_owner_id = '" . $user_id . "'");
        $response["is_error"] = false;
        $response["message"]  = "Company Details Updated Successfully.";
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