<?php
include('config.php');
session_start();
if ($_POST['name'] != "" && $_POST['mb_no'] != "" && $_POST['otp'] != "" && $_POST['email'] != "" && $_POST['password'] != "" && $_POST['re_password'] != "" && $_POST['loader_type'] != "") {
    $name        = $_POST["name"];
    $mb_no       = $_POST["mb_no"];
    $email       = $_POST["email"];
    $loader_type = $_POST["loader_type"];
    $password    = $_POST["password"];
    $re_password = $_POST["re_password"];
  
    $check = mysql_num_rows(mysql_query("SELECT * FROM tbl_loader WHERE email = '$email' or mb_no = '" . $mb_no . "'"));
    if ($check > 0 || $password != $re_password) {
        $response["is_error"] = true;
        $response["message"]  = "Email id / Mobile Already Exists or Password not Matched";
    } else {
        $getotp     = mysql_query("SELECT mobile,otp FROM otp_loader WHERE mobile = '" . $_POST['mb_no'] . "' and status='1' order by id desc limit 1");
        $otp_result = mysql_fetch_assoc($getotp);
        if ($_POST['otp'] == $otp_result['otp'] && $_POST['mb_no'] == $otp_result['mobile']) {
            mysql_query("update otp_loader set status='0' WHERE mobile = '" . $_POST['mb_no'] . "' ");
            $token  = rand().md5(rand().uniqid('', true));
            $insert  = mysql_query("Insert INTO tbl_loader(loader_type, name, mb_no, email, password,token,created_date)VALUE('" . $loader_type . "','" . $name . "','" . $mb_no . "','" . $email . "','" . $password . "','" . $token . "','" . date('h:i:s d-m-Y') . "')");
            $lastid  = mysql_insert_id();
            $response["is_error"]  = false;
            $response["message"] = "Registration Successfull";
            $response["data"]["token_id"]  = $token;
            $response["data"]["name"] = $name;
            $response["data"]["email"] = $email;
            $response["data"]["mb_no"] = $mb_no;
            $response["data"]["loader_type"] = $loader_type;
        } else {
            $response["is_error"] = true;
            $response["message"]  = "Otp is Invalid.Please Try again.";
        }
    }
} else {
    $response["is_error"] = true;
    $response["message"]  = "Required field can't be blank";
}
echo json_encode($response);
?>