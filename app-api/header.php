<?php
   if(isset($_POST['hed_reg_submit'])){
	   
    $name = $_POST["name"];
    $loader_type = $_POST["loader_type"];
     $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $password = $_POST["password"];
   $re_password = $_POST["re_password"];

   $p_id='1';

  $email_count = mysql_num_rows(mysql_query("SELECT * FROM tbl_loader WHERE email = '$email' or mb_no = '".$mobile."'"));

  if($email_count > 0 ){
	  
     $alert ="Email id / Mobile already exist. Please login ";
   
}else

   {   
   if($_POST['otp'] == $_SESSION['otp']){
  $query = mysql_query("Insert INTO tbl_loader(loader_type,name,email,mb_no,password)VALUE('".$loader_type."','".$name."','".$email."','".$mobile."','".$password."')");

  $alert ="Your Account has been successfully created. Please Login";     
   }else{
	  $alert ="Invalid Otp.Please Try Again Later";  
   }
    }

}

if(isset($_POST['login_submit'])){

  $emaill = $_POST['emaill'];

  $passwordd = $_POST['passwordd'];

$data_login = mysql_query("SELECT * FROM tbl_loader WHERE (email = '".$emaill."'  or mb_no = '".$emaill."' ) AND password = '".$passwordd."' ");

 $data_fetch = mysql_fetch_array($data_login);
   $contLo = mysql_num_rows($data_login) ;
  
if( $contLo > 0 ){

	$_SESSION['user_id']  = $data_fetch['id'] ; 
	$_SESSION['user_email']  = $data_fetch['email'] ; 
	$_SESSION['user_name']  = $data_fetch['name'] ; 
	$_SESSION['user_type']  = $data_fetch['loader_type'] ;
	 echo "<META http-equiv='refresh' content='0;URL=index.php'>";
	
}else{ 
$alert ="Login details is invalid.";
}

 
}

if(isset($_POST['f_submit'])){

   $user_name = $_POST['emailll'];
	$sqlPH = mysql_query("select * from tbl_loader where email = '".$user_name."'");
	$rowPH = mysql_fetch_assoc($sqlPH);
	$no = mysql_num_rows($sqlPH);
	 if($no > 0){
		 $user_password = $rowPH['password'] ;
		 $email = $rowPH['email'] ;
	$email_message = "\n Login Details of onnway.com
						  		\n Email Id : $user_name
						  		\n Password : $user_password";
							$email_subject = ' Login Details of onnway.com';
							$email_from = 'support@onnway.com';
								$email_to = $email;
							
							$headers  = "Reply-To: ".$from."\r\n";   	
							$headers .= 'From: '.$email_from."\r\n".
							'X-Mailer: PHP/' . phpversion();
							$mail= @mail($email_to, $email_subject, $email_message, $headers); 
							
							$alert .= "Please check your Email Id for Password. ";
				}else{
					$alert = "Email Id is Invalid";
				}

    }

	
	///******************************Vechile*****************************************/

    if(isset($_POST['submitt'])){

    $namev = $_POST["namev"];

    $vehicle_type = $_POST["vehicle_type"];

     $mobilev = $_POST["mobilev"];

    $emailv = $_POST["emailv"];

    $passwordv = $_POST["passwordv"];

   $re_passwordv = $_POST["re_passwordv"];

   $pr_id='2';

  $email_count = mysql_num_rows(mysql_query("SELECT * FROM tbl_vehicle_owner WHERE email = '$emailv' or mb_no = '".$mobilev."'"));

  if($email_count==0 && $passwordv==$re_passwordv){
		if($_POST['otp'] == $_SESSION['otp']){
			$queryy = mysql_query("Insert INTO tbl_vehicle_owner(name, email, mb_no, password, vehicle_owner_type)VALUE('".$namev."','".$emailv."','".$mobilev."','".$passwordv."','".$vehicle_type."')");
		  $sms="<p style='text-align:center;color:green;'> Registered Successfully.</p>";
  }else{
		$sms =  '<p class="error-msg">Invalid Otp.Please Try Again Later.</p>';
	}

}

 else

   {

        $sms="<p style='text-align:center;color:red;'> Email/Mobile No exist or password not matched </p>";

    }
	

} 

if(isset($_POST['vCF_submit'])){

   $user_name = $_POST['emailll'];
	$sqlPH = mysql_query("select * from tbl_vehicle_owner where email = '".$user_name."'");
	$rowPH = mysql_fetch_assoc($sqlPH);
	$no = mysql_num_rows($sqlPH);
	 if($no > 0){
		 $user_password = $rowPH['password'] ;
		 $email = $rowPH['email'] ;
	$email_message = "\n Login Details of onnway.com
						  		\n Email Id : $user_name
						  		\n Password : $user_password";
							$email_subject = ' Login Details of onnway.com';
							$email_from = 'support@onnway.com';
								$email_to = $email;
							
							$headers  = "Reply-To: ".$from."\r\n";   	
							$headers .= 'From: '.$email_from."\r\n".
							'X-Mailer: PHP/' . phpversion();
							$mail= @mail($email_to, $email_subject, $email_message, $headers); 
							
							$alert .= "Please check your Email Id for Password. ";
				}else{
					$alert = "Email Id is Invalid";
				}

    }

if(isset($_POST['login_vehicle'])){

  $emaillv = $_POST['emaillv'];

  $passworddv = $_POST['passworddv'];

   $data_loginn = mysql_query("SELECT * FROM tbl_vehicle_owner WHERE  (email = '".$emaillv."'  or mb_no = '".$emaillv."' )  AND password = '".$passworddv."' ");
 
   $data_fetchh = mysql_fetch_array($data_loginn);

   $contLo = mysql_num_rows($data_loginn) ;
 
if( $contLo > 0 ){

	$_SESSION['vehicle_id']  = $data_fetchh['vehicle_owner_id'] ; 
	$_SESSION['user_email']  = $data_fetchh['email'] ; 
	$_SESSION['user_name']  = $data_fetchh['name'] ; 
	$_SESSION['user_type']  = $data_fetchh['vehicle_owner_type'] ;
	$_SESSION['vehicle_owner_type'] = $_SESSION['user_type'];
	header('Location: add-truck.php');
	
	
}else{ 
$alert ="Login details is invalid1.";
}

}

 if(isset($alert)){ 
	echo '<script>';  
echo 'alert("'.$alert.'")' ;	
	echo '</script>';   
   }

?>



<!DOCTYPE html>

<html>

<head>

	<title><?php echo $page_title ; ?></title>

	 <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta property="og:url" content="<?php echo $url_gm ; ?>"> 
<meta property="og:title" content="<?php echo $page_title ; ?>">
<meta property="og:description" content="<?php echo $seo_content ; ?>"> 
<meta name="keywords" content="<?php echo $seo_keyword ; ?>" />
<meta name="description" content="<?php echo $seo_content ; ?>"> 

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="css/style.css">

  <link rel="stylesheet" type="text/css" href="css/login-popup.css">

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

<header>

	<div class="container">

		<div class="col-md-3 col-sm-4 col-xs-6 logo">

			<a href="index.php"><img src="<?php echo base_url ; ?>images/logo.png" ></a>

		</div>

		<div class="col-md-9 header-top-right">
       
               <div class="col-sm-4">
  			         <a href="#"><span class="down-app"><img src="<?php echo base_url ; ?>images/mobile.png" > &nbsp;  Download App</span></a>
              </div>
           
              <div class="col-sm-4">
  			       <span class="phone-contact"><img src="<?php echo base_url ; ?>images/phone.png" > &nbsp;  +91 9 11 11 9 22 33</span>
             </div>
           
      



       <?php  





       if($_SESSION['user_id']=='' && $_SESSION['vehicle_id']==''){ ?>

     <span class="login-section"><a data-toggle="modal"  <?php if(basename($_SERVER['PHP_SELF'])=='post-a-truck.php'){?>id ="LoginToVechicle"<?php }else{?>data-target="#myModal"<?php }?>>LOGIN  </a></span>
      <span>|</span>
     <span class="login-section"><a href="<?php if(basename($_SERVER['PHP_SELF'])=='post-a-truck.php'){?>vehicle-registration.php<?php }else{?>loader-registration-1.php<?php }?>">REGISTRATION  </a></span>

          <?php } else { ?>

        <span class="login-section"><a href="<?php if($_SESSION['user_id']!=''){?>loader-account-details.php<?php }  if($_SESSION['vehicle_id']!=""){?>vehicle-my-account.php<?php }?>">My Account</a></span>
        <span>|</span>
        <span class="login-section"><a href="logout.php">LOGOUT</a></span>

         <?php }  ?>

			

			<!--<span class="dropdown-top">

			<select>

				<option>ENG</option>

				<option>HIN</option>

			</select>

			</span> -->

		</div>

	</div>

</header>

<!--end of top header-->




<div class="modal fade company-page-modal" id="myModal" role="dialog">

    <div class="modal-dialog">

    



         

         <div id="container_demo" >

        

                 <a class="hiddenanchor" id="toregister"></a>

                 <a class="hiddenanchor" id="tosuccess"></a>

                    <a class="hiddenanchor" id="tologin"></a>

                      <a class="hiddenanchor" id="tofpass"></a>

                    <div id="wrapper">

                     

                     <!--START OF LOGIN-->

            <div id="login" class="animate form">
			<form  action="" method="post"> 
        <div class="col-md-12 zero-padding">

<h1>Login  <button type="button" class="close" data-dismiss="modal">&times;</button></h1>

<div class="col-md-12 login-sec-style">

 <input type="text" class="form-control" name="emaill" id="emaill" placeholder="Email Id/Mobile No">
  <input type="password" class="form-control" name="passwordd" id="password"  placeholder="Password">

  <!--<div class="checkbox-inline generate-style">
  <input type="checkbox" name="">&nbsp; &nbsp;Generate OTP</div>-->

  <p class="forget-style"><a href="#tofpass" class="to_fpass">Forgot Password?</a> </p></div>

<div class="col-md-12">

<button type="submit" name="login_submit"  class="btn btn-default" id="sign-style">SIGN IN</button>

</div>



<d4v class="col-md-12">



<p class="create-new-style change_link text-center">

               <a href="#toregister" class="to_register"><strong>Create an account? </strong></a>
                <!-- <a href="#"> <strong> Go Back </strong> </a>
<a href="loader-registration-1.php" class="to_register"><strong>Create an account ?</strong></a>
                </p>-->

</div>

</div>



                     </form>







                        </div>





                        <!--END OF LOGIN-->



<!--start of success-->



   <div id="success" class="animate form">

                        

                                     <form  action="mysuperscript.php" autocomplete="on"> 

                                  <div class="col-md-12 zero-padding">



<button type="button" class="close close-style" data-dismiss="modal">&times;</button>

<div class="col-md-12">

  <div class="success-img text-center">

    <img src="images/success-img.png">

  </div>

</div>

<div class="col-md-12">

  <div class="thank-text text-center">

    <h4>Thank You for <span class="reg-style">Registration !<span></h4>

  </div>

</div>

<div class="col-md-12">

  <div class="your-account text-center">

    <p>Your Account has been created and a verification 

email has been sent to your registered email address.</p>

  </div>

</div>



<div class="col-md-12">

  <div class="create-acc-style text-center">

    <p> <a href="#tologin" class="to_login"> Login ? </a> </p>



  </div>

</div>



</div>

                                

                            </form>

                        </div>



<!--END OF SUCCESS-->

<!--START OF FORGET-->

                        <div id="fpass" class="animate form">

                        



                              <form  action="" method="post"> 

                             

<div class="col-md-12 zero-padding">



<h1 class="register-1">Forget Password <button type="button" class="close" data-dismiss="modal">&times;</button></h1>

<div class="col-md-12 login-sec-style">

 <input type="email" class="email-forget form-control" id="email" name="emailll" placeholder="Email Id">

</div>

<div class="col-md-12">

<button type="submit" class="btn btn-default" name="f_submit" id="sign-style">Send </button>

</div>





<div class="col-md-12">



<p class="change_link text-center">

                  

                 <a href="#toregister" class="to_register"><strong>Create an Account ?</strong></a>
				   <!-- <a href="loader-registration-1.php" class="to_register"><strong>Create an Account ?</strong></a>-->
				  <br>  <a href="#tologin" class="to_register"><strong>Already have an account ? Login</strong></a>

                </p>

</div>





</div>



                             

                                

                            </form>

                        </div>



                     <!--END OF FORGET-->

<!--START OF REGISTER-->

                        <div id="register" class="animate form">

                       

                              <form  action="" method="post"> 

                                  <div class="col-md-12 zero-padding">



<h1 class="register-1">Register <button type="button" class="close" data-dismiss="modal">&times;</button></h1>

<div class="col-md-12 login-sec-style">

 <input type="text" class="form-control" name="name" id="name_loader" placeholder="Name">
    <select name="loader_type" id="type_loader" class="form-control">

<option value="">Select Type</option>

<option value="Industry">Industry</option>

<option value="Logistics">Logistics</option>

 <!--<option value="type3">Type3</option>-->

</select> 

<input type="text" class="form-control" name="mobile" id="mobile_loader" maxlength="10" placeholder="Mobile Number">
<input type="text" name="otp" id="otp_ll"  maxlength="5" class="form-control" style="display:none" placeholder="Enter Otp Here" >
<span style="color:green;display:none;" id="otp_sent_l">Otp Sent</span>
				<span style="float:right;display:none;color: #337ab7;cursor:pointer;" id="resend_otp_l">Resend Otp</span>
 <input type="email" class="form-control" name="email" id="email_loader" placeholder="Email ID">

 

  <input type="password" class="form-control" name="password" id="password_loader" placeholder="Password">

  <input type="password" class="form-control" name="re_password" id="re_password_loader" placeholder="Confirm Password">

  <div class="checkbox-inline generate-style">

  

  <input type="checkbox" name="accept" value="agree" id="load_agree">&nbsp; &nbsp;I Accept <span class="terms-and-cond-style"> <a href="#tosuccess" class="to_success"> Terms and condition </a></span> <span class="terms-and-cond-style">And <a href="#tosuccess" class="to_success"> Privacy Policy</a></span> </div>

</div>

 <div class="col-md-12">



<button type="submit" class="btn btn-default load_reg_submit" disabled name="hed_reg_submit" id="sign-style">REGISTER </button>

</div>

<p class="change_link text-center">

                  

                    </br><a href="#tologin" class="to_register"><strong>Already have an account ? Login</strong></a>

                </p>

</div>

                                

                            </form>

                        </div>

<!--END OF REGISTER-->



            

                    </div>

                </div>





      

    </div>

  </div>




  <div class="modal fade company-page-modal" id="myModalv" role="dialog">

    <div class="modal-dialog">

    



         

         <div id="container_demo" >

        

                 <a class="hiddenanchor" id="toregisterv"></a>

                 <a class="hiddenanchor" id="tosuccessv"></a>

                    <a class="hiddenanchor" id="tologinv"></a>

                      <a class="hiddenanchor" id="tofpassv"></a>

                    <div id="wrapper">

                     

                     <!--START OF LOGIN-->

                        <div id="loginv" class="animate form">

                        

                                  <form  action="" method="post"> 

                                <div class="col-md-12 zero-padding">



<h1>Login  <button type="button" class="close" data-dismiss="modal">&times;</button></h1>





<div class="col-md-12 login-sec-style">


 <input type="text" class="form-control" name="emaillv" id="emaillv" placeholder="Email/Phone No.">

 

  <input type="password" class="form-control" name="passworddv" id="passworddv"  placeholder="Password">

 <!-- <div class="checkbox-inline generate-style">

  

  <input type="checkbox" name="">&nbsp; &nbsp;Generate OTP</div>-->

  <p class="forget-style"><a href="#tofpassv" class="to_fpass">Forgot Password?</a> </p></div>

<div class="col-md-12">

<button type="submit" name="login_vehicle"  class="btn btn-default" id="sign-style">SIGN IN </button>

</div>



<div class="col-md-12">



<p class="create-new-style change_link text-center">

                  

                <a href="#toregisterv" class="to_register"><strong>Create an account ?</strong></a>

                </p>

</div>

</div>



                     </form>







                        </div>





                        <!--END OF LOGIN-->



<!--start of success-->



   <div id="successv" class="animate form">

      <form  action="mysuperscript.php" autocomplete="on"> 

            <div class="col-md-12 zero-padding">

<button type="button" class="close close-style" data-dismiss="modal">&times;</button>

<div class="col-md-12">

  <div class="success-img text-center">

    <img src="images/success-img.png">

  </div>

</div>

<div class="col-md-12">

  <div class="thank-text text-center">

    <h4>Thank You for <span class="reg-style">Registration !<span></h4>

  </div>

</div>

<div class="col-md-12">

  <div class="your-account text-center">

    <p>Your Account has been created and a verification 

email has been sent to your registered email address.</p>

  </div>

</div>



<div class="col-md-12">

  <div class="create-acc-style text-center">

    <p> <a href="#tologinv" class="to_login"> Login ? </a> </p>



  </div>

</div>



</div>

                                

                            </form>

                        </div>



<!--END OF SUCCESS-->

<!--START OF FORGET-->

                        <div id="fpassv" class="animate form">

                        



                              <form  action="" method="post"> 

                             

<div class="col-md-12 zero-padding">



<h1 class="register-1">Forget Password <button type="button" class="close" data-dismiss="modal">&times;</button></h1>

<div class="col-md-12 login-sec-style">

 <input type="email" class="email-forget form-control" name="emailll" id="vcf_email" placeholder="Email Id">

</div>

<div class="col-md-12">

<button type="submit" class="btn btn-default" name="vCF_submit" id="sign-style">Send </button>

</div>


<div class="col-md-12">
<p class="change_link text-center">                 

     <a href="#toregisterv" class="to_register"><strong>Create an Account ?</strong></a><br>  <a href="#tologinv" class="to_register"><strong>Already have an account ? Login</strong></a>
                </p>
</div>





</div>


                            </form>

                        </div>



                     <!--END OF FORGET-->

<!--START OF REGISTER-->

                        <div id="registerv" class="animate form">

                       

                              <form  action="" method="post"> 

                                  <div class="col-md-12 zero-padding">



<h1 class="register-1">Register <button type="button" class="close" data-dismiss="modal">&times;</button></h1>

<div class="col-md-12 login-sec-style">

 <select name="vehicle_type" id="vehicle_type_v" class="form-control">

<option value="owner">Vehicle Owner</option>
<option value="transporter">Transporter</option>
<option value="agent">Agent</option>

 <!--<option value="type3">Type3</option>-->

</select>  

 <input type="text" class="form-control" name="namev" id="namev" placeholder="Name">

 <input type="email" class="form-control" name="emailv" id="emailv" placeholder="Email ID">

 <input type="text" class="form-control" name="mobilev" maxlength='10' id="mobilev" placeholder="Mobile">

 <input type="text" name="otp" id="otp" maxlength="5" class="form-control" style="display:none" placeholder="Enter Otp Here" >
<span style="color:green;display:none;" id="otp_sent">Otp Sent</span>
				<span style="float:right;display:none;color: #337ab7;cursor:pointer;" id="resend_otp">Resend Otp</span>

  <input type="password" class="form-control" name="passwordv" id="passwordv" placeholder="Password">

  <input type="password" class="form-control" name="re_passwordv" id="re_passwordrv" placeholder="Confirm Password">

 <div class="checkbox-inline generate-style">

  

  <input type="checkbox" name="agree_v" id="agree_v" value="agree">&nbsp; &nbsp;I Agree with the <span class="terms-and-cond-style"> <a href="#tosuccessv" class="to_success"> Terms and condition </a></span></div>

</div>

 <div class="col-md-12">



<button type="submit" class="btn btn-default ve_submitt" name="submitt" disabled id="sign-style">REGISTER </button>

</div>

<div class="col-md-12">
<p class="change_link text-center">                 

     <a href="#tologinv" class="to_register"><strong>Already have an account ? Login</strong></a>
                </p>
</div>

</div>

                                

                            </form>

                        </div>

<!--END OF REGISTER-->



            

                    </div>

                </div>





      

    </div>

  </div>


<div class="modal fade company-page-modal" id="myModalsuccess" role="dialog">
    <div class="modal-dialog">

        <div id="container_demo">
		
            <div id="wrapper">

                <!--start of success-->

                <div  id="loginv" class="animate form">

                    <form action="mysuperscript.php" autocomplete="on">

                        <div class="col-md-12 zero-padding">

                            <button type="button" class="close close-style" data-dismiss="modal">&times;</button>

                           <!-- <div class="col-md-12">

                                <div class="success-img text-center">

                                    <img src="images/success-img.png">

                                </div>

                            </div>-->

                            <div class="col-md-12">

                                <div class="thank-text text-center">

                                    <h4><?php if($sms){ echo $sms;}?></h4>

                                </div>

                            </div>

                            <!--<div class="col-md-12">

                                <div class="your-account text-center">

                                    <p>Your Account has been created and a verification email has been sent to your registered email address.</p>

                                </div>

                            </div>-->

                            <div class="col-md-12">

                                <div class="create-acc-style text-center">

                                    <p> <a href="#tologinv" id="myModalv" class="to_login"> Login ? </a> </p>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

                <!--END OF SUCCESS-->

            </div>
        </div>
    </div>
</div>





  
<script type="text/javascript">
  $(document).ready(function(){
  $(".to_login").on("click", function(){
    $('#myModalv').modal('show');
    $('#myModalsuccess').modal('hide');
  });
});
</script>
     


        

      </body>

      </html>