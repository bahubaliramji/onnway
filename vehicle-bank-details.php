<?php   session_start();
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php"); 
 
   if(!isset($_SESSION['vehicle_id'])  || $_SESSION['vehicle_id']==""){
	header("location:index.php");
 }else{
	 $user_id = $_SESSION['user_id'];
 } 
 
 if(isset($_POST['update_bank'])){
    $bank_name = $_POST["bank_name"];
     $branch_address = $_POST["branch_address"];
    $ifsc_code = $_POST["ifsc_code"];
    $benificiary_name = $_POST["benificiary_name"];
   $acc_no = $_POST["acc_no"];
	  

	  
      $update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET bank_name = '$bank_name', branch_address = '$branch_address', ifsc_code = '$ifsc_code', benificiary_name = '$benificiary_name'   , acc_no = '$acc_no'   WHERE vehicle_owner_id = '".$_SESSION['vehicle_id']."'");
	  
	  $sms = '<p class="success-msg">Bank Details updated Successfully</p>' ;
    }
 
	$row_sql = mysqli_query($dbhandle, "select * from tbl_vehicle_owner WHERE vehicle_owner_id = '".$_SESSION['vehicle_id']."'");
	$fetch_result = mysqli_fetch_array($row_sql);

 	$page_title = "Bank Details";
	$seo_keyword = "Bank Details";
	$seo_content = "Bank Details";
	
	 include("header.php"); 
	 include("header-bottom.php"); 
 ?>

<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
<div class="container">
<div class="col-md-12 mobile-zero-padding">
  <div class="breadcrumb-section">
    <ul>
        <li><a href="<?php echo base_url ; ?>"> <img src="<?php echo base_url ; ?>images/home.png"> </a></li>
       <li><a  class="bred-active"> Bank Details </a></li>
    </ul>
  </div>
  </div>
</div>
</section>
<!--END OF BREADCRUMB-->

<!--START OF ADDRESS BOOK-->
<section>
  <div class="main-dashboarsd-section style-dash">
    <div class="container mobile-zero-padding">
	<?php  if(isset($sms)){		echo $sms ;	}?>
       <div class="col-md-4">
          <div class="vendor-dashboard-section">
            <h4>VEHICLE DASHBOARD</h4>
          </div>
          <div class="dashboad-details">
           <?php include('include/vehicle-sidebar.php') ; ?>
          </div>
       </div>
 
       <div class="col-md-7">
       <div class="box-style-of-truck-info-style">
 <div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'London')"> Bank Details </button>

</div>

<div id="London" class="tabcontent information company-detail" style="display: block;">
<form action="" method="POST" enctype="multipart/form-data" >  
  <div class="row">
  
  <div class="col-md-12">
    <label> Bank Name </label>
    <input name="bank_name" value="<?php echo $fetch_result['bank_name'];?>" type="text" id="bank_name" <?php echo ($fetch_result['bank_name']!='')?'readonly':''; ?> class="form-control" placeholder=" Enter your Bank Name">
  </div>

  </div>


   <div class="row">
  
  <div class="col-md-6">
    <label> Branch Address  </label>
     
    <input name="branch_address" value="<?php echo $fetch_result['branch_address'];?>" id="branch_address" type="text" <?php echo ($fetch_result['branch_address']!='')?'readonly':''; ?> class="form-control" placeholder=" Enter Branch Address. " >
           
  </div>

  <div class="col-md-6">
    <label>  IFSC Code     </label>
     
    <input name="ifsc_code" name="ifsc_code" value="<?php echo $fetch_result['ifsc_code'];?>" id="ifsc_code" type="text" <?php echo ($fetch_result['ifsc_code']!='')?'readonly':''; ?> class="form-control" placeholder=" IFSC Code " >
           
  </div>
  </div>
  
   <div class="row">
  
  <div class="col-md-6">
    <label> Beneficiary Name   </label>
     
    <input name="benificiary_name" value="<?php echo $fetch_result['benificiary_name'];?>" id="benificiary_name" type="text" <?php echo ($fetch_result['benificiary_name']!='')?'readonly':''; ?> class="form-control" placeholder=" Enter Beneficiary Name. " >
           
  </div>

  <div class="col-md-6">
    <label>  Account No.   </label>
     
    <input name="acc_no" value="<?php echo $fetch_result['acc_no'];?>" id="acc_no" type="text" <?php echo ($fetch_result['acc_no']!='')?'readonly':''; ?> class="form-control" placeholder=" Account No. " >
           
  </div>
  </div>

   
   <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-2">
  </div>
  <div class="col-md-9 truck-info-update-btn">
    <button type="submit" name="update_bank" class="update-truck-info-btn"> Update </button>
  </div>
  
  </div>
  <p>&nbsp;</p>
  </form>

  </div>



  </div>

       

    </div>
  </div>
</section>
<!--END OF ADDRESS BOOK-->

<!--START OF LOGIN SECTION-->
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
                        
                                    <form  action="mysuperscript.php" autocomplete="on"> 
                                <div class="col-md-12 zero-padding">

<h1>Login  <button type="button" class="close" data-dismiss="modal">&times;</button></h1>


<div class="col-md-12 login-sec-style">


 <input type="text" class="form-control" name="name" placeholder="Email/Phone No">
 
  <input type="password" class="form-control" name="password" placeholder="Password">
  <div class="checkbox-inline generate-style">
  
  <input type="checkbox" name="">&nbsp; &nbsp;Generate OTP</div>
  <span class="forget-style"><a href="#tofpass" class="to_fpass">Forgot Password?</a> </span></div>
<div class="col-md-12">
<button type="submit" class="btn btn-default" id="sign-style">SIGN IN </button>
</div>

<div class="col-md-12">

<p class="create-new-style change_link text-center">
                  
                <a href="#toregister" class="to_register"><strong>Create an account ?</strong></a>
                </p>
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
    <p>Create an account ?</p>
  </div>
</div>

</div>
                                
                            </form>
                        </div>

<!--END OF SUCCESS-->
<!--START OF FORGET-->
                        <div id="fpass" class="animate form">
                        

                              <form  action="" autocomplete="on"> 
                             
<div class="col-md-12 zero-padding">

<h1 class="register-1">Forget Password <button type="button" class="close" data-dismiss="modal">&times;</button></h1>
<div class="col-md-12 login-sec-style">
 <input type="email" class="email-forget form-control" name="email" placeholder="Email Id">
</div>
<div class="col-md-12">
<button type="submit" class="btn btn-default" id="sign-style">Send </button>
</div>


<div class="col-md-12">

<p class="change_link text-center">
                  
                  <a href="#toregister" class="to_register"><strong>Create an Account ?</strong></a><br>  <a href="#tologin" class="to_register"><strong>Already have an account ? Login</strong></a>
                </p>
</div>


</div>

                             
                                
                            </form>
                        </div>

                        <!--END OF FORGET-->
<!--START OF REGISTER-->
                        <div id="register" class="animate form">
                       
                              <form  action="mysuperscript.php" autocomplete="on"> 
                                  <div class="col-md-12 zero-padding">

<h1 class="register-1">Register <button type="button" class="close" data-dismiss="modal">&times;</button></h1>
<div class="col-md-12 login-sec-style">
 <input type="text" class="form-control" name="name" placeholder="Name">
 <input type="email" class="form-control" name="email" placeholder="Email ID">
 <input type="text" class="form-control" name="number" placeholder="Mobile">
  <input type="password" class="form-control" name="password" placeholder="Password">
  <input type="password" class="form-control" name="re-password" placeholder="Retype Password">
  <div class="checkbox-inline generate-style">
  
  <input type="checkbox" name="">&nbsp; &nbsp;I Agree with the <span class="terms-and-cond-style"> <a href="#tosuccess" class="to_success"> Terms and condition </a></span></div>
</div>
 <div class="col-md-12">

<button type="submit" class="btn btn-default" id="sign-style">REGISTER </button>
</div>
</div>
                                
                            </form>
                        </div>
<!--END OF REGISTER-->

            
                    </div>
                </div>


      
    </div>
  </div>




<?php include("footer.php"); ?>

<!--END OF LOGIN SECTION-->
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript"></script>
<script type="text/javascript">
   /* <![CDATA[ */
   jQuery(function() {
      /*  jQuery("#bank_name").validate({
           expression: "if (VAL) return true; else return false;",
           message: "Please Enter Bank Name"
       });
	   jQuery("#branch_address").validate({
           expression: "if (VAL) return true; else return false;",
           message: "Please Enter Branch Address"
       });
	   jQuery("#ifsc_code").validate({
           expression: "if (VAL) return true; else return false;",
           message: "Please Enter IFSC Code"
       });
	   jQuery("#benificiary_name").validate({
           expression: "if (VAL) return true; else return false;",
           message: "Please Enter Beneficiery Name"
       });
       jQuery("#acc_no").validate({
           expression: "if (VAL.length > 5 && VAL.match(/^[0-9]*$/)) return true; else return false;",
           message: "Your Account Number is Invalid"
       }); */
       
   }); /* ]]> */
</script>
</body>
</html>