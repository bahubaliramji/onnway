<?php 	   session_start();
		error_reporting(0);
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php");

if(isset($_SESSION['vehicle_id'])){
	header("location:index.php");
}

if(isset($_POST['submit'])){
    $fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$aadhar_no = $_POST["adhar_no"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $optradio = $_POST["optradio"];
    $password = $_POST["password"];
	$transport_name = $_POST['transport_name'];
	
   $check=mysqli_num_rows(mysqli_query($dbhandle, "SELECT * FROM tbl_vehicle_owner WHERE email = '".$email."' or mb_no = '".$mobile."'"));

if ($check >0)

{

    $sms =  '<p class="error-msg">Email Id or Phone number is already exits. Please try with another details</p>';

}

  else

{
	if($_POST['otp'] != $_SESSION['otp']){
	   $query = mysqli_query($dbhandle, "Insert INTO tbl_vehicle_owner(vehicle_owner_type, name, last_name, aadhar_no,  mb_no, email, password,transport_name,created_date)VALUE('".$optradio."','".$fname."','".$lname."','".$aadhar_no."','".$mobile."','".$email."','".$password."','$transport_name' ,'".date('h:i:s d-m-Y')."')");
	   $_SESSION['last_vehicle_id'] = mysqli_insert_id($dbhandle) ;
	   $_SESSION['vehicle_owner_type'] = $optradio;

	   header("location:vehicle-registration-contact.php");
	}else{
		$sms =  '<p class="error-msg">Otp is Invalid.Please Try again.</p>';
	}
 }

 

 }
 $page_title = "Vechicle Registration";
	$seo_keyword = "Vechicle Registration";	
$seo_content = "Vechicle Registration";
  include('header.php'); 
   include("header-bottom.php");

?>

<!--START OF BREADCRUMB-->

<section>

<div class="container">

<div class="col-md-12 mobile-zero-padding">

  <div class="breadcrumb-section">

    <ul>

       <li><a href="<?php echo base_url ; ?>"> <img src="<?php echo base_url ; ?>images/home.png"> </a></li>

       <li><a class="bred-active"> Vehicle Registration </a></li>

    </ul>

  </div>

  </div>

</div>

</section>

<!--END OF BREADCRUMB-->

<!--START OF LOADER REGISTRATION TOP HRTADING-->

<section>

  <div class="container ">

     <div class="col-md-12 mobile-zero-padding">

        <div class="loader-reg-heading"> 

          <h3> Vehicle Registration </h3>

       </div>

      </div> 

    </div>

</section>

<!--END OF LOADER REGISTRATION TOP HRTADING-->



<section>

  <div class="container">

     <div class="col-md-12 mobile-zero-padding" >

        <div class="loader-reg-stepper-1-style vehicle-registration"> 

          <img src="<?php echo base_url ; ?>images/transport-registration-stepper-1.png" class="img-responsive">

          <ul class="vehicle-sec1">

             <li> Owner <br> Information </li>

             <li>  Contact <br> Information </li>
			 
			 <li> Bank <br> Details </li>

             <li> Company <br> Information </li>

             <li> Add <br> Truck </li>

          </ul>

       </div>

      </div> 

    </div>

</section>



<section class="form-section">

  <div class="container mobile-zero-padding">
  
 <?php if(isset($sms)){ echo $sms ;  } ?>

  <div class="col-md-2">


  </div>

     <div class="col-md-8" >
   
        <div class="personal-information-section vehicle-reg-style"> 
			<form action="" method="post">
           <h3> SELECT TYPE &nbsp; &nbsp;  | <span class="radio-tab"> 

    <label class="radio-inline">

      <input type="radio" name="optradio" value="owner" id="owner" class="vehicle_type_select" > Vehicle Owner

    </label>

<label class="radio-inline trans-style">

      <input type="radio" name="optradio" id="transporter" value="transporter" class="vehicle_type_select" >  Transporter

    </label>
	
	
    <label class="radio-inline trans-style">

      <input type="radio" name="optradio" id="agent" value="agent" class="vehicle_type_select" >   Agent

    </label>

     </span></h3>
<div class="information-wrap">
     <div class="pers-style-info" id="form_vehicle_reg_Show_1"  style="display:none;">

     <h4> PERSONAL INFORMATION </h4>

      </div>



      <div class="personal-information-form mobile-form choose-type" id="form_vehicle_reg_Show" style="display:none;">



          <div class="row">

            <div class="col-md-6">

                <label> First Name <span style="color:red">*</span> </label>

                <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your First Name">

             </div>

             

               <div class="col-md-6">

                <label> Last Name </label>

                <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your Last Name">

             </div>

             

         </div>



         <div class="row">

            <div class="col-md-6">

                <label> Mobile Number <span style="color:red">*</span></label>

                <input type="text" name="mobile" id="ve_mobile" maxlength='10' class="form-control" placeholder="Enter your Mobile Number">

             </div>
			 <div class="col-md-6" id="otpdiv" style="display:none">

                <label> Enter Otp <span style="color:red">*</span></label>
				<span style="color:green;display:none;" id="otp_sent1">Otp Sent</span>
				<span style="float:right;display:none;color: #337ab7;cursor:pointer;" id="resend_otp1">Resend Otp</span>
                <input type="text" name="otp" id="otp1" class="form-control" maxlength="5" placeholder="Enter Otp Here" >

             </div>



             <div class="col-md-6" id="aadhar">

                <label> Aadhar Number  </label>

                <input type="text" name="adhar_no" id="adhar_no" class="form-control required" maxlength="12" placeholder="Enter your Aadhar Number">

             </div>
			 
			 <div class="col-md-6" id="transport_name" style="display:none;" >

                <label> Transport Name  </label>

                <input type="text" name="transport_name" id="transporter_name" class="form-control"  placeholder="Enter Transport Name">

             </div>



         </div>



         <div class="row">
			<div class="col-md-12">
         <label> Email Id   <span style="color:red">*</span></label>

                <input type="email" name="email" id="ve_email" class="form-control marg15" placeholder="Enter your Email id">
</div>
          

         </div>

          <div class="row">
		  
		    <div class="col-md-6">

                <label> Password <span style="color:red">*</span></label>

                <input type="password" id="ve_password" name="password" class="form-control marg15" placeholder="Enter your password">

             </div>
          <div class="col-md-6">

                <label> Confirm Password  <span style="color:red">*</span> </label>

                <input type="password" id="re_password" name="re_password" class="form-control marg15" placeholder=" Enter your confirm password ">

             </div>

            <div class="col-md-6 continue-btn">

              <!-- <div class="skip-tab">

                <a href="vehicle-registration-2.php">Skip</a>

               </div>-->

             </div>
             </div>
<div class="row">
            <div class="col-md-8 accept-res">
                <input type="checkbox" name="accept" value="agree" id="Vehicle_Agreed">&nbsp; &nbsp;I Accept <span class="terms-and-cond-style"> <a href="terms-n-condition.php" class="to_success"> Terms and condition </a></span> <span class="terms-and-cond-style">And <a href="privacy_policy.php" class="to_success"> Privacy Policy</a></span> 
             </div>

            
             
         </div>
               <div class="row">
          <div class="col-md-6">
             </div>

            <div class="col-md-6 continue-btn">

              <!-- <div class="skip-tab">

                <a href="vehicle-registration-2.php">Skip</a>

               </div>-->

                <button type="submit" name="submit" disabled id="enable_submit" class="cont-btn-style"> Continue </button>

             </div>
             </div>
              </form>

         </div>
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



<!--START OF POP UP-->

<div class="vehicle-reg-pop-up" >

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

        <div class="thankyou-reg">

          <h6> Thank You for <span class="reg-color"> Registration ! <span> </h6>

        </div>

      </div>





      <div class="col-md-12">

        <div class="update-text">

          <h5> Proceed to complete/<br> contact /  company /  bank details before post a truck. </h5>

        </div>

      </div>



       <div class="col-md-12">

        <div class="con-btn text-center">

          <button type="button" class="con-btn-style"> Continue To Update </button>

          <p><a href="#">Skip this step</a></p>

        </div>

      </div>



    </div>



<!--END OF POP UP-->

<div class="overlay">

      </div>



<?php include('footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript">        </script>
		
        <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){  
 
        jQuery("#fname").validate({
                    expression: "if (VAL.length > 2 && VAL.match(/^[a-zA-Z\s]+$/)) return true; else return false;",
                    message: "Please Enter First Name Only In Alphabets "
                });
        jQuery("#ve_mobile").validate({
                    expression: "if (VAL.length > 9 && VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Your Phone Number is Invalid"
                });
				
		
/* 			jQuery("#adhar_no").validate({
                   expression: "if (VAL.length > 11 && VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Your Aadhar Number is Invalid"
             }); */


		jQuery("#otp1").validate({
                    expression:  "if (VAL.length > 4 && VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Please Enter Valid Otp Here"
                });
        jQuery("#ve_email").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please Enter a Valid Email ID"
                });
				
		jQuery("#ve_password").validate({
                    expression: "if (VAL.length > 4 && VAL) return true; else return false;",
                    message: "Please Enter a Valid Password Min 5 Character "
                });
        jQuery("#re_password").validate({
                    expression: "if ((VAL == jQuery('#ve_password').val()) && VAL) return true; else return false;",
                    message: "Confirm Password Doesn't Match"
                });
				
				
         
            });
            /* ]]> */
	$(document).ready(function(){		
	$("#Vehicle_Agreed").change(function(){
		if ($(this).is(':checked')) {
			$("#enable_submit").removeAttr("disabled");
		}else{
			$("#enable_submit").attr("disabled","disabled");
		}

    });	
	$(".vehicle_type_select").change(function(){
		if ($(this).is(':checked')) {
			$("#form_vehicle_reg_Show").show();
			$("#form_vehicle_reg_Show_1").show();
		}

    });	
	//check Mobile already exits or not for vehicle  
	
 	$("#ve_mobile").blur(function(){
		if (!isNaN( $("#ve_mobile").val() ) && $("#ve_mobile").val().length == '10') {
			$.ajax({
					type: "POST",
					url: "check_ajax_mobile.php",
					data: { mobile: $(this).val(), tab: "Check" },
					dataType:"JSON",
					beforeSend: function(){
						$("#otpdiv").show();
				},
				success: function(result){
					if(result['exits'] == 1){
						alert("Mobile No Already Exits in Our Database");
						$("#ve_mobile").val('');
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
			$("#ve_mobile").val('');
			alert('Mobile No is Not Valid.Please Enter 10 Digit Mobile No');
		}	
	});
	
		$("#resend_otp1").click(function(){
		$("#otp_sent1").hide();
		$("#resend_otp1").hide();
		if (!isNaN( $("#ve_mobile").val() ) && $("#ve_mobile").val().length == '10') {
			$.ajax({
					type: "POST",
					url: "check_ajax_mobile.php",
					data: { mobile: $("#ve_mobile").val(), tab: "Check" },
					dataType:"JSON",
					beforeSend: function(){
						$("#otpdiv").show();
				},
				success: function(result){
					if(result['exits'] == 1){
						alert("Mobile No Already Exits in Our Database");
						$("#ve_mobile").val('');
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
			$("#ve_mobile").val('');
			alert('Mobile No is Not Valid.Please Enter 10 Digit Mobile No');
		}	
	});
});
        </script>
<script type="text/javascript">
  $(document).ready(function(){
		$("#transporter").on("click", function(){
			$('#aadhar').hide();
			$('#transport_name').show();
			$('.required').removeAttr("id");
		});
		$("#agent").on("click", function(){
			$('#aadhar').hide();
			$('#transport_name').show();
			$('.required').removeAttr("id");
		});
		$("#owner").on("click", function(){
			$('#aadhar').show();
			$('#transport_name').show();
			$('.required').attr("id","adhar_no");
		});
	});
</script>
<?php include 'validation.php';?>

</body>

</html>