<?php  session_start();
		error_reporting(0);
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php");

 if(!isset($_SESSION['last_vehicle_id'])){
	   header('location:index.php');
 }else{
	 $user_id = $_SESSION['last_vehicle_id'];
 }
 if($_SESSION['vehicle_owner_type']=="agent"){
	header("location:vehicle-my-account.php"); 
 }
 $path = $base_url."upload/vehicle_documents/";
  if(isset($_POST['vehicle_submit'])){
		$company_name = $_POST['company_name'];
		$tds_dclaration = $_POST['tds_dclaration'];
		$company_type = $_POST['company_type'];
		$pan_no = $_POST['pan_no'];
		$gst_no = $_POST['gst_no'];
		
        

		$random_key = strtotime(date('Y-m-d H:i:s'));
		
		 if(!empty($_FILES['gst_file']['name'])){
			$gst_file =$_FILES['gst_file']['name'];
			$gst_file = rand().$random_key.'-'.$gst_file;
			$gst_file_tmp = $_FILES['gst_file']['tmp_name'];
			move_uploaded_file($gst_file_tmp,$path.$gst_file);
			$gst_file = ", gst_file = '$gst_file'";
		}else{
			$gst_file = "";
		}
		if(!empty($_FILES['pan_file']['name'])){
			$pan_file =$_FILES['pan_file']['name'];
			$pan_file = rand().$random_key.'-'.$pan_file;
			$pan_file_tmp = $_FILES['pan_file']['tmp_name'];
			move_uploaded_file($pan_file_tmp,$path.$pan_file);
			$pan_file = ", pan_file = '$pan_file'";
		}else{
			$pan_file = "";
		}
		if(!empty($_FILES['tds_file']['name'])){
			$tds_file =$_FILES['tds_file']['name'];
			$tds_file = rand().$random_key.'-'.$tds_file;
			$tds_file_tmp = $_FILES['tds_file']['tmp_name'];
			move_uploaded_file($tds_file_tmp,$path.$tds_file);
			$tds_file = ", tds_file = '$tds_file'";
		}else{
			$tds_file = "";
		}

  $update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET company_name = '$company_name', tds_dclaration = '$tds_dclaration', company_type='$company_type',pan_no='$pan_no',gst_no='$gst_no' $gst_file $pan_file $tds_file  WHERE vehicle_owner_id = '".$_SESSION['last_vehicle_id']."'");
	   if($_SESSION['vehicle_owner_type']=="transporter"){
		header("location:vehicle-my-account.php"); 
	 }else{
		 header("location:vehicle-registration-add-truck.php");
	 }
	  
  }


$page_title = "Vehicle Registration";
	$seo_keyword = "Vehicle Registration";
	$seo_content = "Vehicle Registration";
	
	include('header.php');

?>

<!--end of top header bottom-->

<!--START OF BREADCRUMB-->

<section>

<div class="container">

<div class="col-md-12 mobile-zero-padding">

  <div class="breadcrumb-section">

    <ul>

       <li><a href="<?php echo base_url ; ?>"> <img src="<?php echo base_url ; ?>images/home.png"> </a></li>

       <li><a href="<?php echo base_url ; ?>" class="bred-active"> Vehicle Registration </a></li>

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

          <img src="<?php echo base_url ; ?>images/vehicle-registration-stepper-4.png" class="img-responsive">

          <ul class="vehicle-sec1">

             <li> Owner <br> Information </li>

             <li class="contact-color">  Contact <br> Information </li>
			 
			 <li  class="contact-color"> Bank <br> Details </li>

             <li> Company <br> Information </li>

             <li> Add <br> Truck </li>

          </ul>

       </div>

      </div> 

    </div>

</section>



<section class="form-section">

  <div class="container mobile-zero-padding">

  <div class="col-md-2">

    

  </div>

     <div class="col-md-8" >

        <div class="personal-information-section vehicle-reg-style"> 
        
        <div class="information-wrap">

     <div class="pers-style-info">

     <h4> Company Information </h4>

      </div>


		<form action="" method="POST" enctype="multipart/form-data" > 
      <div class="personal-information-form mobile-form choose-type">

          <div class="row">

            <div class="col-md-12">

                <label> Company Name   <span style="color:red">*</span></label>

                <input type="text" name="company_name"  id="company_name" class="form-control" placeholder=" Enter your Company Name ">

             </div>

             

         </div>



         <div class="row">
			<div class="col-md-6">
                <label> GST Number    </label>
                <input type="text" name="gst_no" id="gst_no" class="form-control" placeholder=" Enter GST number ">
             </div>
            <div class="col-md-6">

                <label> GST File. (Attach File)  </label>
               <div class="truck-permit truck-res-gst">

            <span class="file-style-truck other-info hidden-xs"> Upload GST File Here </span>

            <input type="file" name="gst_file" id="gst_file" class="inputfile7 inputfile-5" data-multiple-caption="{count} files selected">

            <label for="gst_file"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>

			</div>
         <br class="visible-xs">
              <br class="visible-xs">
            
              
             </div>

</div>

             <div class="row">

                 <div class="col-md-6">
                <label> Pan Card No. <span style="color:red;">*</span></label>
               <input type="text" name="pan_no" id="pan_no" class="form-control" placeholder="Enter No.">
             </div>

             
               <div class="col-md-6">

                <label> Pan Card No. (Attach File) <span style="color:red;">*</span> </label>
               <div class="truck-permit truck-res-gst">

            <span class="file-style-truck other-info hidden-xs"> Upload Pan Card File </span>

            <input type="file" name="pan_file" id="pan_file" class="inputfile7 inputfile-5" data-multiple-caption="{count} files selected">

            <label for="pan_file"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span><span class="ValidationErrors">*</span>Upload Image</span></label>

			</div>
              <br class="visible-xs">
              <br class="visible-xs">
             </div>
              
             </div>

<?php if($_SESSION['vehicle_owner_type']=="owner"){?>
 <div class="row">

            <div class="col-md-6">

                <label>  TDS Declaration form </label>

                <input type="text" name="tds_dclaration" id="tds_dclaration" class="form-control" placeholder=" Enter TDS ">

             </div>

 <div class="col-md-6">

                <label> TDS Declaration. (Attach File)  </label>
               <div class="truck-permit truck-res-gst">

            <span class="file-style-truck other-info hidden-xs"> Upload TDS Declaration File  </span>

            <input type="file" name="tds_file" id="tds_file" class="inputfile7 inputfile-5" data-multiple-caption="{count} files selected">

            <label for="tds_file"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>

			</div>
            <br class="visible-xs">
            <br class="visible-xs">
              
             </div>





         </div>
<?php }?>


              <?php if($_SESSION['vehicle_owner_type']=="transporter"){?>
					<div class="row">
						<div class="col-md-6">

							<label> Company Type  <span style="color:red">*</span></label>

							<select class="form-control" name="company_type" id="company_type">
							   <option value=""> Select Company Type </option>
							   <option value="Commison Agent"> Commison Agent </option>
							   <option value="Fleet Owner"> Fleet Owner </option>
							   <option value="Logistic"> Logistic </option>

							</select>

					</div>
				</div>
  <?php }?>
             


        
          <div class="row">

            <div class="col-md-12 continue-btn">

             
				<?php  if($_SESSION['vehicle_owner_type']=="owner"){?>
                <a href="<?php echo base_url ; ?>vehicle-registration-add-truck.php"><button type="button" class="cont-btn-style"> Skip </button></a>
				<?php }else{?>
					<a href="<?php echo base_url ; ?>vehicle-my-account.php"><button type="button" class="cont-btn-style"> Skip </button></a>
				 <?php }?>
              
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" name="vehicle_submit" class="cont-btn-style"> Continue </button>

             </div>



             

         </div>



      </div>
	  </form>
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

<!--

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

-->

<!--END OF POP UP-->

<!--

<div class="overlay">

      </div>

-->

<?php include('footer.php'); ?>
 <script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript">        </script>
		
        <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){  
        jQuery("#company_name").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please Enter Company Name"
                });
				
				
		jQuery("#pan_file").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please Upload Pan Card File"
                });
				jQuery("#pan_no").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter pan Card No"
                });
				jQuery("#company_type").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please select Company Type"
                });
				
				
        
				
         
            });
            /* ]]> */
			
        </script>


</body>

</html>