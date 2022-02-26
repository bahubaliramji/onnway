 <?php 	   session_start();
		error_reporting(0);
		ob_start();
 include("controls/define.php"); 
 include("TBXadmin/include/config.php");


 
 if(isset($_POST['submit'])){
    $name = $_POST["name"];
     $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $optradio = $_POST["optradio"];
    $password = $_POST["password"];
   $re_password = $_POST["re_password"];
   $created_date = date('h:i:s d-m-Y');
   $check=mysql_num_rows(mysql_query("SELECT * FROM tbl_loader WHERE email = '$email' or mb_no = '".$mobile."'"));
if ($check >0 )
{
    $sms = "<span style='color:red;'>User Already Exists or Password not Matched</span>";
}
  else
{
if($_POST['otp'] == $_SESSION['otp']){
   $query = mysql_query("Insert INTO tbl_loader(name,loader_type,mb_no,email,password,created_date)VALUE('".$name."','".$optradio."','".$mobile."','".$email."'
    ,'".$password."','".$created_date."')");
	
	$_SESSION['last_id'] = mysql_insert_id() ;
	
	echo "<META http-equiv='refresh' content='0;URL=loader-registration-2.php'> ";
}else{
		$sms =  '<p class="error-msg">Otp is Invalid.Please Try again.</p>';
	}		
	
 }
 }

 ?>
 <?php include("header.php");
?>


<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
<div class="container">
<div class="col-md-12">
  <div class="breadcrumb-section">
    <ul>
       <li><a href="#"> <img src="images/home.png"> </a></li>
       <li><a href="#" class="bred-active"> Loader Registration </a></li>
    </ul>
  </div>
  </div>
</div>
</section>
<!--END OF BREADCRUMB-->
<!--START OF LOADER REGISTRATION TOP HRTADING-->
<section>
  <div class="container">
     <div class="col-md-12">
        <div class="loader-reg-heading"> 
          <h3> Loader Registration </h3>
       </div>
      </div> 
    </div>
</section>
<!--END OF LOADER REGISTRATION TOP HRTADING-->

<section>
  <div class="container">
     <div class="col-md-12" >
        <div class="loader-reg-stepper-1-style"> 
          <img src="images/loader-registration-stepper-1.png">
          <ul>
             <li> Personal <br> Information </li>
             <li>  Contact <br> Information </li>
             <li> Company <br> Information </li>
          </ul>
       </div>
      </div> 
    </div>
</section>

<section class="form-section">
  <div class="container">
  <div class="col-md-2">
    
  </div>
     <div class="col-md-8" >
        <div class="personal-information-section"> 
           <form action="" method="post">
           <h3> SELECT TYPE &nbsp; &nbsp;  | <span class="radio-tab">
    <label class="radio-inline">
      <input type="radio" name="optradio" value="Industry" class="loader_type_select" > Industry
    </label> &nbsp; &nbsp; &nbsp;
<label class="radio-inline">
      <input type="radio" name="optradio" value="Logistics" class="loader_type_select">  Logistics
    </label>
      </span></h3>
     <div class="pers-style-info"  id="form_loader_reg_Show_1" style="display:none;" >
     <h4> PERSONAL INFORMATION </h4>
	<?php if($sms){?> <h4><?php  echo $sms;?><h4><?php }?>
      </div>
      <div class="personal-information-form"  id="form_loader_reg_Show" style="display:none;">
         <div class="row">
            <div class="col-md-12">
                <label> Name <span style="color:red;">*</span></label>
                <input type="text" name="name" id="loader_name" class="form-control" placeholder="Enter your name">
             </div>
         </div>

          <div class="row">
            <div class="col-md-6">
                <label> Mobile Number <span style="color:red;">*</span></label>
                <input type="text" name="mobile" id="loader_mobile" maxlength ="10" class="form-control" placeholder="Enter your Mobile Number">
             </div>
			<div class="col-md-6" id="otpdiv" style="display:none">

                <label> Enter Otp <span style="color:red">*</span></label>
				<span style="color:green;display:none;" id="otp_sent1">Otp Sent</span>
				<span style="float:right;display:none;color: #337ab7;cursor:pointer;" id="resend_otp1">Resend Otp</span>
                <input type="text" name="otp" id="otp1" maxlength="5" class="form-control" placeholder="Enter Otp Here" >

             </div>
             <div class="col-md-6">
                <label> Email Id  <span style="color:red;">*</span> </label>
                <input type="email" name="email" id="loader_email" class="form-control" placeholder="Enter your Email id">
             </div>

         </div>

          <div class="row">
            <div class="col-md-6">
                <label> Password <span style="color:red;">*</span></label>
                <input type="password" name="password" id="loader_passwordd" class="form-control" placeholder="Enter your  password">
             </div>

             <div class="col-md-6">
                <label> Confirm password  <span style="color:red;">*</span></label>
                <input type="password" id="confirm_password" name="re_password" class="form-control" placeholder="Enter your Confirm password">
             </div>
             
         </div>
		 <div class="row">
            <div class="col-md-8">
                <input type="checkbox" name="accept" value="agree" id="loader_agreed">&nbsp; &nbsp;I Accept <span class="terms-and-cond-style"> <a href="#tosuccess" class="to_success"> Terms and condition </a></span> <span class="terms-and-cond-style">And <a href="#tosuccess" class="to_success"> Privacy Policy</a></span> 
             </div>

            
             
         </div>

          <div class="row">
            <div class="col-md-12 continue-btn">
               <div class="skip-tab">
               <!-- <a href="loader-registration-2.php">Skip</a>-->
               </div>
  <button  type="submit" name="submit" disabled class="cont-btn-style" id="enable_submit" data-target="#myModal"> Continue </button>
 <!-- <input  type="submit" name="submit"  value="Continue">-->
 <!--<span class="login-section"><a data-toggle="modal" data-target="#myModal">LOGIN  </a></span>-->
             </form>
         </div>

      </div>
       </div>
      </div>

      <div class="col-md-2">
    
  </div> 
    </div>
</section>

<!--START OF LOGIN SECTION-->

<!--END OF LOGIN SECTION-->

<!--POP UP SECTION-->

<section>
    <div class="continue-to-update-pop-up-success">
      <div class="col-md-12">
        <div class="close-btn">
          <p>X</p>
        </div>
      </div>
    
    <div class="col-md-12">
        <div class="success-img-style">
           <img src="images/success-img.png">
        </div>
      </div>

      <div class="col-md-12">
        <div class="update-text-style update">
          <h5>Update contact/ company/ details to post order</h5>
        </div>
      </div>

       <div class="col-md-12">
        <div class="con-btn text-center">
          <button type="button" class="con-btn-style"> Continue To Update </button>
          <p><a href="#">Skip this step</a></p>
        </div>
      </div>

    </div>
  </section>

  <div class="overlay">
      </div>

<!--END POP UP SECTION-->

<?php include("footer.php"); ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript">        </script>
		
        <script type="text/javascript">

$(document).ready(function(){	
$("#loader_agreed").change(function(){
		if ($(this).is(':checked')) {
			$("#enable_submit").removeAttr("disabled");
		}else{
			$("#enable_submit").attr("disabled","disabled");
		}

    });	
	$(".loader_type_select").change(function(){
		if ($(this).is(':checked')) {
			$("#form_loader_reg_Show").show();
			$("#form_loader_reg_Show_1").show();
		}

    });	
	//check Mobile already exits or not for vehicle  
	
 	$("#loader_mobile").blur(function(){
		if (!isNaN( $("#loader_mobile").val() ) && $("#loader_mobile").val().length == '10') {
			$.ajax({
					type: "POST",
					url: "check_ajax_mobile_l.php",
					data: { mobile: $(this).val(), tab: "Check" },
					dataType:"JSON",
					beforeSend: function(){
						$("#otpdiv").show();
				},
				success: function(result){
					if(result['exits'] == 1){
						alert("Mobile No Already Exits in our Database");
						$("#loader_mobile").val('');
						$("#otpdiv").hide();
					}else{
						if(result['sms']=="success"){
							$("#otp_sent1").show();
						}
					}
				},
				complete: function(){
					$("#resend_otp1").show();
					
				}
			});
		} else {
			$("#loader_mobile").val('');
			alert('Mobile No is Not valid.Please Enter 10 Digit Mobile No');
		}	
	});	

	$("#resend_otp1").click(function(){
		$("#otp_sent1").hide();
		$("#resend_otp1").hide();
		
		if (!isNaN( $("#loader_mobile").val() ) && $("#loader_mobile").val().length == '10') {
			$.ajax({
					type: "POST",
					url: "check_ajax_mobile_l.php",
					data: { mobile: $("#loader_mobile").val(), tab: "Check" },
					dataType:"JSON",
					beforeSend: function(){
						$("#otpdiv").show();
				},
				success: function(result){
					if(result['exits'] == 1){
						alert("Mobile No Already Exits in our Database");
						$("#loader_mobile").val('');
						$("#otpdiv").hide();
					}else{
						if(result['sms']=="success"){
							$("#otp_sent1").show();
						}
					}
				},
				complete: function(){
					$("#resend_otp1").show();
					
				}
			});
		} else {
			$("#loader_mobile").val('');
			alert('Mobile No is Not valid.Please Enter 10 Digit Mobile No');
		}	
	});
});	
            /* <![CDATA[ */
            jQuery(function(){  
        jQuery("#loader_name").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please Enter Loader Name"
                });
        
        jQuery("#loader_mobile").validate({
                    expression: "if (VAL.length > 9 && VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Your Phone Number Invalid"
                });
        jQuery("#loader_email").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please Enter A Valid Email ID"
                });
			jQuery("#emaill").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please Enter A Valid Email ID"
                });
				jQuery("#otp1").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please Enter Otp Here"
                });
				jQuery("#password").validate({
                    expression: "if (VAL.length > 5 && VAL) return true; else return false;",
                    message: "Please Enter A Valid Password Min. 5 Character"
                });
				
				 jQuery("#loader_passwordd").validate({
                    expression: "if (VAL.length > 5 && VAL) return true; else return false;",
                    message: "Please Enter A Valid Password Min. 5 Character"
                });
                jQuery("#confirm_password").validate({
                    expression: "if ((VAL == jQuery('#loader_passwordd').val()) && VAL) return true; else return false;",
                    message: "Confirm Password Doesn't Match"
                });
				
				
         
            });
            /* ]]> */
        </script>
		<?php include 'validation.php';?>
</body>
</html>