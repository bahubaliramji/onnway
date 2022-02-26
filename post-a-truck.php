<?php session_start();
		error_reporting(0);
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php");
/* print_r($_POST); */
echo "hy";
if(isset($_POST['post'])){
	date_default_timezone_set('Asia/Kolkata');
	$_SESSION['source'] = $_POST["source"];
    $_SESSION['destination'] = $_POST["destination"];
    $_SESSION['truck_reg_no'] = $_POST["truck_reg_no"];
    $_SESSION['vehicletype'] = $_POST["vehicletype"];
    $_SESSION['weight'] = $_POST["weight"];
    $_SESSION['scheduled_date'] = $_POST["scheduled_date"];
    $_SESSION['scheduled_time'] = $_POST["scheduled_time"];
    $_SESSION['name'] = $_POST["name"];
    $_SESSION['mobile'] = $_POST["mobile"];
    $_SESSION['post_date'] = date('h:i:s d-m-Y');
	
	

	$query = mysqli_query($dbhandle, "INSERT INTO `tbl_post_truck_enq` (`source`, `truck_reg_no`,  `vehicletype`, `weight`, `scheduled_date`, `scheduled_time`, `name`, `mobile`, `post_date`) VALUES ('".$_SESSION['source']."', '".$_SESSION['truck_reg_no']."', '".$_SESSION['vehicletype']."', '".$_SESSION['weight']."', '".$_SESSION['scheduled_date']."', '".$_SESSION['scheduled_time']."', '".$_SESSION['name']."', '".$_SESSION['mobile']."','".$_SESSION['post_date']."')") ;
	
 	$lastid = mysqli_insert_id($dbhandle);
	if(!empty($_POST['destination'])){
			for($i=0;$i<count($_POST['destination']);$i++){
				  mysqli_query($dbhandle, "INSERT INTO tbl_post_destination(tbl_post_truck_enq_id,	destination_id)VALUES('$lastid','".$_POST['destination'][$i]."')"); 
				 
			}
		} 
		
		

} 


 
 
    $page_title = "POST A TRUCK";
	$seo_keyword = "POST A TRUCK";
	$seo_content = "POST A TRUCK";
	
	include('header.php');
	include('header-bottom.php');



?>



<!--end of top header bottom-->

<!--START OF BREADCRUMB-->

<section>

<div class="container">

<div class="col-md-12 mobile-zero-padding">

  <div class="breadcrumb-section">

    <ul>

       <li><a href="<?php echo base_url ; ?>"> <img src="<?php echo base_url ; ?>images/home.png"> </a></li>

       <li><a  class="bred-active"> BECOME A PARTNER </a></li>

    </ul>

  </div>

  </div>

</div>

</section>

<!--END OF BREADCRUMB-->

<!--START OF LOADER REGISTRATION TOP HRTADING-->

<section>

  <div class="container">

     <div class="col-md-12 mobile-zero-padding">

        <div class="loader-reg-heading"> 

          <h3> BECOME A PARTNER  <!--<span style="float:right"><a href="#LoginToVechicle" id="LoginToVechicle" ><button class="tab-style-login">LOGIN HERE</button></a> </span>--></h3>
			
       </div>

      </div> 

    </div>

</section>

<!--END OF LOADER REGISTRATION TOP HRTADING-->

<section class="form-section">

  <div class="container mobile-zero-padding">
  
  <div class="col-md-4 post-truck-contant">
<div class="col-md-12 post-truck-heading">
    <h4>Benefits for Partner:</h4>
<ul>
<li>Every day loads across India</li>
<li>Right  & Beneficial price </li>
<li>Quick payment settlements </li>
<li>Easy operations </li>
<li>Speedy resolution of issues, if any  Resolution </li>
<li>Largest network of Industries</li>
<li>Guaranteed Savings</li>
<li>More Possibilities of get loaded without empty days</li>
<li>Grow your business with our network</li>
<img src="images/benefit-truck.png">
</ul>
</div>
  </div>

     <div class="col-md-8" >

        <!--<div class="personal-information-section vehicle-reg-style">--> 

     <div class=" col-md-12 post-a-truck-heading post-a-truck-res">
        <h3>Post a truck</h3>
	   



      <div class="personal-information-form choose-type mobile-form1">
	  <form action="" method="POST">
          <div class="row">
            <div class="col-md-6">

                <label>  Source  <span style="color:red">*</span></label>

                <select name="source" id="pl_source" class="form-control">

					<option value="">Source</option>
					 <?php 
                                 $row = mysqli_query($dbhandle, "select * from tbl_city order by city_name");

	                               while($fetch = mysqli_fetch_array($row)){ ?>

					<option value="<?php echo $fetch['city_name'];?>"><?php echo $fetch['city_name'];?></option>
										<?php } ?>
				</select>

             </div>



             <div class="col-md-6">

                 <label> Destination </label>
				<select name="destination[]" id="pl_destination" class="form-control select2 mobile3" multiple="multiple" data-placeholder="Select a State">

					 <?php 
                                 $row = mysqli_query($dbhandle, "select * from tbl_city order by city_name ");

	                               while($fetch = mysqli_fetch_array($row)){	 ?>
					
					<option value="<?php echo $fetch['city_name'];?>"><?php echo $fetch['city_name'];?></option>
										<?php } ?>
					
				</select>

             </div>



         </div>



         <div class="row">

            <div class="col-md-12">

                <label>Truck Reg. No.  <span style="color:red">*</span></label>
                <input type="text" id="pl_truck_reg_no" name="truck_reg_no" class="form-control" placeholder=" Truck Reg. No. ">
             </div>
         </div>



         <div class="row">
            <div class="col-md-6">

                <label>  Select Truck Type  <span style="color:red">*</span> </label>

                <select name="vehicletype" id="pl_vehicletype" class="form-control" >
					<option value="">Select Truck Type</option>
					 <?php 
                                 $roww = mysqli_query($dbhandle, "select vehicle_category,id from tbl_trucktype");
									while($fetchh = mysqli_fetch_array($roww)){
									?>
							<optgroup label="<?php echo $fetchh['vehicle_category'];?>">
							<?php $rowtruck = mysqli_query($dbhandle, "select * from vehicle_list where status = 1 and vehicle_type='".$fetchh['id']."' order by length asc ");
									while($fetchhh = mysqli_fetch_array($rowtruck)){
										if($fetchh['id']==2){
											
										?>
											<option value="<?php echo $fetchhh['id'];?>"><img src="upload/vechile_image/<?php echo $fetchhh['pimage'];?>"><?php if($fetchhh['sub_type']=='1'){ echo "Flat Bed - ";} if($fetchhh['sub_type']=='2'){ echo "Semi Bed - ";} echo $fetchhh['length'];?> MT /<?php echo $fetchhh['dimension'];?></option>
								<?php	}else{?>
											<option value="<?php echo $fetchhh['id'];?>"><img src="upload/vechile_image/<?php echo $fetchhh['pimage'];?>"><?php echo $fetchhh['length'];?> MT /<?php echo $fetchhh['dimension'];?></option>
							<?php	
										}
									} ?>
							</optgroup>
								
						<?php } ?>
					
				</select>

             </div>



             <div class="col-md-6">

                 <label> Weight in Ton  <span style="color:red">*</span> </label>
				 <input id="pl_vecweight" class="form-control" Placeholder="Weight in Ton" type="text" name="weight" value="">
                

             </div>



         </div>




               <div class="row">

            <div class="col-md-6">

                <label> Select Scheduled Date  <span style="color:red">*</span> </label>
			<input type="text" name="scheduled_date" class="form-control" placeholder="Select Scheduled Date" id="datepicker">
                 

             </div>

			<div class="col-md-6">

                <label> Select Scheduled Date  <span style="color:red">*</span> </label>
			<select name="scheduled_time" class="form-control" id="scheduled_time">
					<option value="" id="defaultOpen">Select Scheduled Time </option>
										 <option value="12AM-3AM"> 12AM - 3AM</option>
										 <option value="3AM-6AM"> 3AM - 6AM</option>
										 <option value="6AM-9AM"> 6AM - 9AM</option>
										 <option value="9AM-12PM"> 9AM - 12PM</option>
										 <option value="12PM-3PM"> 12PM - 3PM</option>
										 <option value="3PM-6PM"> 3PM - 6PM</option>
										 <option value="6PM-9PM"> 6PM - 9PM</option>
										 <option value="9PM-12AM"> 9PM - 12AM</option>
										
										 
				</select>
                 

             </div>

    

         </div>



           <div class="row">

            <div class="col-md-6">

                <label>  Name <span style="color:red">*</span> </label>

                <input type="text" name="name" class="form-control" id="pl_name" placeholder=" Enter Your Name. ">

             </div>
			 
			   <div class="col-md-6">

                <label>  Mobile No. <span style="color:red">*</span> </label>

                <input type="text" name="mobile" class="form-control" id="pl_mobile" placeholder=" Enter Your Mobile No. " maxlength="10">

             </div>



         </div>


          <div class="row">

            <div class="col-md-12 continue-btn mobile-zero-padding">

                <button type="submit" name="post" class="cont-btn-style"> CONTINUE </button>

             </div>



             

         </div>
		</form>

      </div>

       <!--</div>-->

      </div>



 

    </div>

</section>



<!--START OF LOGIN SECTION-->



<!--END OF LOGIN SECTION-->



<!--START OF POP UP-->



<div class="complete-reg-pop-up" >

      <div class="col-md-12">

        <div class="close-btn">

          <p>X</p>

        </div>

      </div>

    

    <div class="col-md-12">

        <div class="success-img-style check-img">

           <img src="images/success-img.png">

        </div>

      </div>



      <div class="col-md-12">

        <div class="thankyou-reg registration-style">

          <h6> Thank You for <span class="reg-color"> Registration ! <span> </h6>

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





<?php include("footer.php") ;?>

   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript">        </script> 
		
        <script type="text/javascript">

            /* <![CDATA[ */

            jQuery(function(){  
			jQuery("#loader_type").validate({
                    expression: "if (VAL != '') return true; else return false;",
                    message: "Please select a Type"
                });

    

        jQuery("#name").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Your Name"

                });

        

        jQuery("#password ").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please Write password"

                });

        jQuery("#mobile").validate({

                    expression: "if (VAL.length > 9 && VAL.match(/^[0-9]*$/)) return true; else return false;",

                    message: "Your Phone Number in correct format"

                });

        jQuery("#email").validate({

                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",

                    message: "Please enter a valid Email ID"

                });

      

     jQuery("#emaill").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter a valid Email/Phone No"

                });

          jQuery("#loader_password").validate({
                    expression: "if (VAL.length > 5 && VAL) return true; else return false;",
                    message: "Please enter a valid Password"
                });
          jQuery("#re_password").validate({
                    expression: "if ((VAL == jQuery('#loader_password').val()) && VAL) return true; else return false;",
                    message: "Confirm password doesn't match"
                });
				jQuery("#pl_source").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please Select Source"

                });
				jQuery("#pl_destination").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please Select Destination"

                });
				jQuery("#pl_truck_reg_no").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Truck reg no"

                });
				jQuery("#pl_vehicletype").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please Select Vehicle Type"

                });
				jQuery("#pl_vecweight").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Weight"

                });
				jQuery("#pl_name").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Name"

                });
				jQuery("#pl_mobile").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Mobile No"

                });
				jQuery("#emaillv").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Email Id"

                });
				

				
				
				
				jQuery("#passworddv").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Password"

                });
				jQuery("#namev").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Name"

                });
				jQuery("#emailv").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Email"

                });
				jQuery("#mobilev").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Mobile No"

                });
				jQuery("#otp").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Otp here"

                });
				jQuery("#passwordv").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Password"

                });
				jQuery("#re_passwordrv").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Confirm Password"

                });
				jQuery("#vcf_email").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Valid Email"

                });
				jQuery("#datepicker").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Scheduled Date"

                });
				jQuery("#scheduled_time").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please Select Scheduled Time"

                });

            });

            /* ]]> */

        </script> 

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
 <!-- Select2 -->

  <link rel="stylesheet" href="<?php echo base_url ; ?>css/select2.min.css">
<script src="<?php echo base_url ; ?>js/select2.full.min.js"></script>
  <script>
 
  $( function() {
    $( "#datepicker" ).datepicker({ 
	minDate: 0,
	maxDate: 4
	});
	
	$(".select2").select2();
  });
  </script>
  
 <?php if(isset($_POST['post'])){ ?>
<script type="text/javascript">
       $(function() {
			$("#myModalv").modal();
		});
		</script>
  <?php }?> 
<?php if(isset($_POST['submitt'])){ ?>
<script type="text/javascript">
       $(function() {
			$("#myModalsuccess").modal();
		});
		</script>
  <?php }?>
  <script type="text/javascript">
        $("#LoginToVechicle").on("click", function(){
			$("#myModalv").modal();
		});
		</script>
<script type="text/javascript">
$(document).ready(function(){		
	  
	$("#agree_v").change(function(){
		if ($(this).is(':checked')) {
			$(".ve_submitt").removeAttr("disabled");
		}else{
			$(".ve_submitt").attr("disabled","disabled");
		}

    });
	//check Mobile already exits or not for vehicle
 	$("#mobilev").blur(function(){
		if (!isNaN( $("#mobilev").val() ) && $("#mobilev").val().length == '10') {
			$.ajax({
					type: "POST",
					url: "check_ajax_mobile.php",
					data: { mobile: $(this).val(), tab: "Check" },
					dataType:"JSON",
					beforeSend: function(){
						$("#otp").show();
				},
				success: function(result){
					if(result['exits'] == 1){
						alert("Mobile No Already Exits in our Database");
						$("#mobilev").val('');
						$("#otp").hide();
					}else{
						if(result['sms']=="success"){
							$("#otp_sent").show();
						}
					}
				},
				complete: function(){
					$("#resend_otp").show();
					
				}
			});
		} else {
			$("#mobilev").val('');
			alert('Mobile No is Not valid.Please Enter 10 Digit Mobile No');
		}	
	});
		$("#resend_otp").click(function(){
		$("#otp_sent").hide();
		$("#resend_otp").hide();
		if (!isNaN( $("#mobilev").val() ) && $("#mobilev").val().length == '10') {
			$.ajax({
					type: "POST",
					url: "check_ajax_mobile.php",
					data: { mobile: $("#mobilev").val(), tab: "Check" },
					dataType:"JSON",
					beforeSend: function(){
						$("#otp").show();
				},
				success: function(result){
					if(result['exits'] == 1){
						alert("Mobile No Already Exits in our Database");
						$("#mobilev").val('');
						$("#otp").hide();
					}else{
						if(result['sms']=="success"){
							$("#otp_sent").show();
						}
						
					}
				},
				complete: function(){
					$("#resend_otp").show();
					
				}
			});
		} else {
			$("#mobilev").val('');
			alert('Mobile No is Not valid.Please Enter 10 Digit Mobile No');
		}	
	});
});	
</script>
<?php include 'validation.php';?>
</body>

</html>