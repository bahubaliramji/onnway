<?php


date_default_timezone_set('Asia/Kolkata');
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../android/vendor/autoload.php';

function sendemail($iidd, $email, $name, $source, $destination, $truck_type, $material, $schedule, $laod_type)
    {

      $htmlbody = '<p>Dear Sir/Madam, </p>
      
      <p>Thank you for choosing Onnway.com, We have received your Loading Confirm with the Order ID: '.$iidd.'. </p>
      
      <p>This is not a booking confirmation and you’ll have to wait for truck assign. Your booking will be confirmed within 60 minutes according to truck availability at your location. You will receive updates through Call/SMS and Email. </p>
      
      <p>Please refer your loading details below: </p>
      
      <table border="1" data-table data-tablelook="1184" style="width: 50%;margin-left: auto;margin-right: auto;"><tbody ><tr role="row" ><td role="rowheader" data-celllook="16" ><p>Source </p></td>
      <td role="columnheader" data-celllook="4096" ><p>'.$source.'</p></td>
      </tr>
      
      <tr role="row" ><td role="rowheader" data-celllook="16" ><p>Destination </p></td>
      <td data-celllook="4096" ><p>'.$destination.'</p></td>
      </tr>
      
      <tr role="row" ><td role="rowheader" data-celllook="16" ><p>Vehicle Type </p></td>
      <td data-celllook="4096" ><p>'.$truck_type.'</p></td>
      </tr>
      
      
      <tr role="row" ><td role="rowheader" data-celllook="16" ><p>Material Type </p></td>
      <td data-celllook="4096" ><p>'.$material.'</p></td>
      </tr>
      
      <tr role="row" ><td role="rowheader" data-celllook="16" ><p>Scheduled Date </p></td>
      <td data-celllook="4096" ><p>'.$schedule.'</p></td>
      </tr>
      
      <tr role="row" ><td role="rowheader" data-celllook="16" ><p>Load Type </p></td>
      <td data-celllook="4096" ><p>'.$laod_type.'</p></td>
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
        $mail->Subject = 'New Enquiry on MRTecks';
        $mail->Body    = $htmlbody;
    
        $mail->send();
        //echo 'Message has been sent';
      } catch (Exception $e) {
        //echo 'Message could not be sent.';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
      }
}






$url_gm = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page_title = "Full Load Quote";
$seo_keyword = "OnnWay";
$seo_content = "OnnWay";

include("include/header.php");

if(!isset($_SESSION['fl_quote']) ){
    header('Location: index.php');
    // echo "1";
} 


$data = $_SESSION['fl_quote'];
// $data1 = $_SESSION['check_fare_add'];
// unset($_SESSION['check_fare']);
echo "<script>alert('No fare Found')</script>";


// echo "<pre>";
// print_r($data1);
// echo "<br>";
// print_r($data);

// die();
$id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {


    $user_id = $id;
    $laod_type = "full";
    $source = $data['source'];
    $destination = $data['destination'];
    $truck_type = $data['vehicletype'];
    $schedule = $data['scheduled_date'];
    $weight = $data['weight']." KG";
    $material = $data['materialtype'];
    $freight = "";
    $other_charges = "";
    $cgst = "";
    $sgst = "";
    $insurance = "";
    // $paid_percent = $_POST['paid_percent'];
    // $paid_amount = $_POST['paid_amount'];
    $pickup_address = $_POST['p_add'];
    $pickup_city = $_POST['p_city'];
    $pickup_pincode = $_POST['p_pin'];
    $pickup_phone = $_POST['p_contact'];
    $drop_address = $_POST['d_add'];
    $drop_city = $_POST['d_city'];
    $drop_pincode = $_POST['d_pin'];
    $drop_phone = $_POST['d_contact'];
    $remarks = "";

   
        $pvalue = 0;
        $promo_code = "";
   

    $paid_amount = "";
    $paid_percent = "";
    $length = "";
    $width = "" ;
    $height = "";
    $quantity = "";

   
    $sourceLAT = "";
    $sourceLNG = "";
    $destinationLAT = "";
    $destinationLNG = "";

    $insquery = "INSERT INTO `orders`
    (`user_id` , `laod_type` , `source` , `destination` , `truck_type` , `schedule` , `weight` , 
    `material` , `freight` , `other_charges` , `cgst` , `sgst` , `insurance` , `paid_percent` , `paid_amount` , 
    `pickup_address` , `pickup_city` , `pickup_pincode` , `pickup_phone` , `drop_address` , `drop_city` , `drop_pincode`, 
    `drop_phone` , `remarks` , `length` , `width` , `height` , `quantity` , `status`,`pvalue`,`promo_code`,`sourceLAT`,`sourceLNG`,`destinationLAT`,`destinationLNG`) VALUES 
    ('$user_id', '$laod_type', '$source', '$destination', '$truck_type', '$schedule', '$weight', 
    '$material', '$freight', '$other_charges', '$cgst', '$sgst', '$insurance', '$paid_percent', '$paid_amount', 
    '$pickup_address', '$pickup_city', '$pickup_pincode', '$pickup_phone', '$drop_address', '$drop_city', '$drop_pincode', 
    '$drop_phone', '$remarks', '$length', '$width', '$height', '$quantity', 'requsted for quote','$pvalue','$promo_code','$sourceLAT','$sourceLNG','$destinationLAT','$destinationLNG')";
   
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
   
    
     $nmess = "Dear Sir/Madam, We have received your Loading Confirm with the Order ID: $iidd. Your booking will be confirmed within 60 minutes according to truck availability at your location. You will receive updates through Call/SMS and Email. For more details Visit www.onnway.com.";
   
    //  sendnoti($nmess, $token);
   
    //  sendotp($phh, $nmess);
   
     if ($laod_type == 'full') {
       $lty = 'FULL';
     } else {
       $lty = 'PART';
     }
   
     sendemail($iidd, $email, $name, $source, $destination, $try, $mat, $schedule, $lty, $freight);
   
   
    $_SESSION['swal_title'] = "Quote Requested successfully!";
                $_SESSION['swal_icon'] = "success";
                $_SESSION['link'] = "orders.php";

    unset($_SESSION['fl_quote']);
    // unset($_SESSION['check_fare_add']);

   
   
    
   } else {

    $_SESSION['swal_title'] = "Some error occurred";
                $_SESSION['swal_icon'] = "error";
                // $_SESSION['link'] = "index.php";
   }
    
}

?>



<section>
    <div class="container">
        <div class="col-md-12">
            <div class="breadcrumb-section">
                <ul>
                    <li><a href="#"> <img src="../images/home.png"> </a></li>
                    <li><a href="#" class="bred-active"> User Dashboard </a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--END OF BREADCRUMB-->

<!--START OF ADDRESS BOOK-->
<section>
    <div class="main-dashboarsd-section">
        <div class="container">
            <div class="col-md-4">
                <div class="user-dashboard-section">
                    <h4>User Dashboard</h4>
                </div>
                <div class="dashboad-details">
                    <ul>
                        <li><a href="index.php"> <img src="../images/account-detail.png"> Account Detail </a></li>
                        <li><a href="user_kyc.php"> <img src="../images/account-detail.png"> KYC Detail </a></li>
                        <li style="color:white; background-color:#d11f26;"><a style="color:white;" href="#"> <img src="../images/my-order.png"> My order </a></li>
                        <li><a href="#"> <img src="../images/com-detail.png"> Company Details </a></li>
                        <li><a href="#"> <img src="../images/address-book.png"> Address Book </a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">

                <div class="box-style-of-view-order">
                    <div class="tab">
                        <button class="tablinks active" style="width: 100%;" onclick="openCity(event, 'London')">Address</button>
                        <!-- <button class="tablinks change-pad" onclick="openCity(event, 'Paris')">CHANGE PASSWORD</button> -->
                    </div>


                    <div style="padding:10px">
                        <form action="" method="post" enctype="multipart/form-data">
                            


                            <!-- <input type="hidden" name="user_id" value="<?= $data2['id']; ?>"> -->

                            
                            <div style="padding:10px;">
                                <h3>PickUp Location</h3>
                                <textarea name="p_add" id="p_add" class="form-control" placeholder="Address" required rows="2"></textarea>
                                <br>
                                <input name="p_city" type="text" id="p_city" readonly class="form-control" required value="<?= $data['source'] ?>">

                                <input name="p_pin" type="text" maxlength="6" id="p_pin" class="form-control" required placeholder="PIN Code">

                                <input name="p_contact" type="text" maxlength="10" id="p_contact" class="form-control" required placeholder="Contact Person Mobile Number">
                            </div>

                            <div style="padding:10px;">
                                <h3>Drop Location</h3>
                                <textarea name="d_add" id="d_add" class="form-control" placeholder="Address" required rows="2"></textarea>
                                <br>
                                <input name="d_city" type="text" id="d_city" readonly class="form-control" required value="<?= $data['destination'] ?>">

                                <input name="d_pin" type="text" id="d_pin" maxlength="6" class="form-control" required placeholder="PIN Code">

                                <input name="d_contact" type="text" maxlength="10" id="d_contact" class="form-control" required placeholder="Contact Person Mobile Number">
                            </div>





                            <div class="row">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-7">
                                    <button type="submit" name="update_profile" class="update-password-btn " style="background-color: green;"> Confirm </button>
                                </div>
                                <div class="col-md-1">

                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>


        </div>
    </div>
</section>



<!-- google map -->
<?php
include("include/footer.php");
?>



