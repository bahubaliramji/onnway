<?php
session_start();
error_reporting(0);
include("../controls/define.php");
include("../admin/inc/db.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$user_id = $_POST['user_id'];
$laod_type = $_POST['laod_type'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$truck_type = $_POST['truck_type'];
$schedule = $_POST['schedule'];
$weight = $_POST['weight'];
$material = $_POST['material'];
$freight = $_POST['freight'];
$other_charges = $_POST['other_charges'];
$cgst = $_POST['cgst'];
$sgst = $_POST['sgst'];
$insurance = $_POST['insurance'];
$paid_percent = $_POST['paid_percent'];
$paid_amount = $_POST['paid_amount'];
$pickup_address = $_POST['pickup_address'];
$pickup_city = $_POST['pickup_city'];
$pickup_pincode = $_POST['pickup_pincode'];
$pickup_phone = $_POST['pickup_phone'];
$drop_address = $_POST['drop_address'];
$drop_city = $_POST['drop_city'];
$drop_pincode = $_POST['drop_pincode'];
$drop_phone = $_POST['drop_phone'];
$remarks = $_POST['remarks'];
$length = $_POST['length'];
$width = $_POST['width'];
$height = $_POST['height'];
$quantity = $_POST['quantity'];
$pvalue = $_POST['pvalue'];
$promo_code = $_POST['pid'];
$sourceLAT = $_POST['sourceLAT'];
$sourceLNG = $_POST['sourceLNG'];
$destinationLAT = $_POST['destinationLAT'];
$destinationLNG = $_POST['destinationLNG'];

$insquery = "INSERT INTO `orders`
 (`user_id` , `laod_type` , `source` , `destination` , `truck_type` , `schedule` , `weight` , 
 `material` , `freight` , `other_charges` , `cgst` , `sgst` , `insurance` , `paid_percent` , `paid_amount` , 
 `pickup_address` , `pickup_city` , `pickup_pincode` , `pickup_phone` , `drop_address` , `drop_city` , `drop_pincode`, 
 `drop_phone` , `remarks` , `length` , `width` , `height` , `quantity` , `status`,`pvalue`,`promo_code`,`sourceLAT`,`sourceLNG`,`destinationLAT`,`destinationLNG`) VALUES 
 ('$user_id', '$laod_type', '$source', '$destination', '$truck_type', '$schedule', '$weight', 
 '$material', '$freight', '$other_charges', '$cgst', '$sgst', '$insurance', '$paid_percent', '$paid_amount', 
 '$pickup_address', '$pickup_city', '$pickup_pincode', '$pickup_phone', '$drop_address', '$drop_city', '$drop_pincode', 
 '$drop_phone', '$remarks', '$length', '$width', '$height', '$quantity', 'placed','$pvalue','$promo_code','$sourceLAT','$sourceLNG','$destinationLAT','$destinationLNG')";

$row = mysqli_query($dbhandle, $insquery);
$iidd = mysqli_insert_id($dbhandle);

if ($row) {

  $row33 = mysqli_query($dbhandle, "INSERT INTO count SET loading = 'read'");
  $row331 = mysqli_query($dbhandle, "INSERT INTO loader_count SET waiting = 'read', user_id = '$user_id'");

  $row2 = mysqli_query($dbhandle, "SELECT * FROM `orders` where id='$iidd' ");
  $fetch = mysqli_fetch_array($row2);

  $row567 = mysqli_query($dbhandle, "SELECT * FROM `users` where id='$user_id' ");
  $fetch567 = mysqli_fetch_array($row567);

  $row5671 = mysqli_query($dbhandle, "SELECT * FROM `loader_profile_tbl` where user_id='$user_id' ");
  $fetch5671 = mysqli_fetch_array($row5671);

  $row56712 = mysqli_query($dbhandle, "SELECT * FROM `tbl_material` where id ='$material' ");
  $fetch56712 = mysqli_fetch_array($row56712);

  $row567123 = mysqli_query($dbhandle, "SELECT * FROM `trucks` where id ='$truck_type' ");
  $fetch567123 = mysqli_fetch_array($row567123);

  $phh = $fetch567['phone'];
  $token = $fetch567['token'];
  $name = $fetch5671['name'];
  $email = $fetch5671['email'];
  $mat = $fetch56712['material_name'];
  $try = $fetch567123['title'] . ' ' . $fetch567123['type'];

  $response = array(
    "id" => $fetch['id'],
    "user_id" => $fetch['user_id'],
    "laod_type" => $fetch['laod_type'],
    "source" => $fetch['source'],
    "destination" => $fetch['destination'],
    "truck_type" => $fetch21['truck_type'],
    "schedule" => $fetch['schedule'],
    "weight" => $fetch['weight'],
    "material" => $fetch['material'],
    "freight" => $fetch['freight'],
    "other_charges" => $fetch['other_charges'],
    "cgst" => $fetch['cgst'],
    "sgst" => $fetch['sgst'],
    "insurance" => $fetch['insurance'],
    "paid_percent" => $fetch['paid_percent'],
    "paid_amount" => $fetch['paid_amount'],
    "pickup_address" => $fetch['pickup_address'],
    "pickup_city" => $fetch['pickup_city'],
    "pickup_pincode" => $fetch['pickup_pincode'],
    "pickup_phone" => $fetch['pickup_phone'],
    "drop_address" => $fetch['drop_address'],
    "drop_city" => $fetch['drop_city'],
    "drop_pincode" => $fetch['drop_pincode'],
    "drop_phone" => $fetch['drop_phone'],
    "remarks" => $fetch['remarks'],
    "length" => $fetch['length'],
    "width" => $fetch['width'],
    "height" => $fetch['height'],
    "quantity" => $fetch['quantity'],
    "status" => $fetch['status'],
    "created" => $fetch['created'],
  );

  $nmess = "Dear Sir/Madam, We have received your Loading Confirm with the Order ID: $iidd. Your booking will be confirmed within 60 minutes according to truck availability at your location. You will receive updates through Call/SMS and Email. For more details Visit www.onnway.com.";

  sendnoti($nmess, $token);

  sendotp($phh, $nmess);

  if ($laod_type == '1') {
    $lty = 'FULL';
  } else {
    $lty = 'PART';
  }

  sendemail($iidd, $email, $name, $source, $destination, $try, $mat, $schedule, $lty, $freight);

  $data = array(
    "status" => "1",
    "message" => "Booking will be confirmed shortly according to truck availability at your location",
    "data" => $response
  );

  echo json_encode($data);
} else {
  $data = array(
    "status" => "0",
    "message" => "Some error occurred",
    "data" => (object)[]
  );

  echo json_encode($data);
}


function sendotp($phone, $message)
{

  $curl = curl_init();



  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{ \"sender\": \"ONNWAY\", \"route\": \"4\", \"country\": \"91\", \"sms\": [ { \"message\": \"" . $message . "\", \"to\": [ " . $phone . "] } ] }",
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HTTPHEADER => array(
      "authkey: 266484AgCc3hEjSl5c824792",
      "content-type: application/json"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
}


function sendnoti($m, $token)
{



  $Eresult = array(
    "message" => $m,
    "image" => "",
  );




  $url = 'https://fcm.googleapis.com/fcm/send';

  $fields = array();
  $fields['data'] = $Eresult;

  //if(is_array($token)){
  $fields['to'] = $token;
  $fields['priority'] = 'high';
  //}else{
  //	$fields['to'] = $token;
  //	$fields['priority'] = 'high';
  //}

  define("GOOGLE_API_KEY", "AAAAHwzc0WE:APA91bGykghU3ZdD-49yW11vV9B0u4o5PIWXtXq9g7U8uJZwht1J9LSXZxL3asS_ytYpOLLSQsOmkUdUYF0SwAWxfj5EbZTKUAXVOfFaZsJ3CnDtVE9HjdBtFlaz82tbxwkfd8jHLss-");

  $headers = array(
    'Content-Type:application/json',
    'Authorization: key=' . GOOGLE_API_KEY
  );
  //print_r($fields);	

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
  $result = curl_exec($ch);

  //echo $result;

  if ($result === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
  }
  curl_close($ch);
}

function sendemail($iidd, $email, $name, $source, $destination, $truck_type, $material, $schedule, $laod_type, $fare)
{



  $htmlbody = '<p>Dear Sir/Madam, </p>
  
  <p>Thank you for choosing Onnway.com, We have received your Loading Confirm with the Order ID: ' . $iidd . '. </p>
  
  <p>This is not a booking confirmation and you’ll have to wait for truck assign. Your booking will be confirmed within 60 minutes according to truck availability at your location. You will receive updates through Call/SMS and Email. </p>
  
  <p>Please refer your loading details below: </p>
  
  <table border="1" data-table data-tablelook="1184" style="width: 50%;margin-left: auto;margin-right: auto;"><tbody ><tr role="row" ><td role="rowheader" data-celllook="16" ><p>Source </p></td>
  <td role="columnheader" data-celllook="4096" ><p>' . $source . '</p></td>
  </tr>
  
  <tr role="row" ><td role="rowheader" data-celllook="16" ><p>Destination </p></td>
  <td data-celllook="4096" ><p>' . $destination . '</p></td>
  </tr>
  
  <tr role="row" ><td role="rowheader" data-celllook="16" ><p>Vehicle Type </p></td>
  <td data-celllook="4096" ><p>' . $truck_type . '</p></td>
  </tr>
  
  <tr role="row" ><td role="rowheader" data-celllook="16" ><p>Fare </p></td>
  <td data-celllook="4096" ><p>₹' . $fare . '</p></td>
  </tr>
  
  <tr role="row" ><td role="rowheader" data-celllook="16" ><p>Material Type </p></td>
  <td data-celllook="4096" ><p>' . $material . '</p></td>
  </tr>
  
  <tr role="row" ><td role="rowheader" data-celllook="16" ><p>Scheduled Date </p></td>
  <td data-celllook="4096" ><p>' . $schedule . '</p></td>
  </tr>
  
  <tr role="row" ><td role="rowheader" data-celllook="16" ><p>Load Type </p></td>
  <td data-celllook="4096" ><p>' . $laod_type . '</p></td>
  </tr>
  
  </tbody>
  </table>
  
  <p>If you have any questions regarding this enquiry or any other service, then please contact us. Our phone number is +91 91111 92233, +91 91111 92244 and our Email is <a href="mailto:support@onnway.com" target="_blank" rel="noreferrer noopener" >support@onnway.com</a>. For terms and conditions visit <a href="http://www.onnway.com/" target="_blank" rel="noreferrer noopener" >www.onnway.com</a> . </p>
  
  <p>Your sincerely, </p>
  
  <p>Onnway.com </p>
  
  <p>KEDSONS TECHNOLOGIES </p>
  ';

  //print_r($htmlbody);

  $mail = new PHPMailer(true);
  try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtpout.secureserver.net';
    $mail->SMTPAuth = true;
    $mail->Username = 'mukulraw@mrtecks.com';
    $mail->Password = 'Zedistark1@';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('support@onnway.com', 'Onnway Support');
    $mail->addAddress($email, $name);


    //Attachments

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Onnway Support';
    $mail->Body    = $htmlbody;

    $mail->send();
    //echo 'Message has been sent';
  } catch (Exception $e) {
    //echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
  }
}
