<?php  session_start();
		error_reporting(0);
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php");

 if(!isset($_SESSION['last_vehicle_id'])){
	 echo "<META http-equiv='refresh' content='0;URL=vehicle-registration-1.php'>";
 }else{
	 $user_id = $_SESSION['last_vehicle_id'];
 }

  if(isset($_POST['vehicle_submit'])){
	   $company_name = $_POST['company_name'];

    $company_type = $_POST['company_type'];

  

    $tds_dclaration = $_POST['tds_dclaration'];

   $tan_no = $_POST['tan_no'];

      //  $tsd_form = $_POST['tsd_form'];



         $path = "upload/vehicle_documents/";

     

  $pan_file =$_FILES['pan_file']['name'];

  $pan_path = $_FILES['pan_file']['tmp_name'];

   $tin_file =$_FILES['tin_file']['name'];

  $tin_path = $_FILES['tin_file']['tmp_name'];

 /* $tds_file =$_FILES['tds_file']['name'];

  $tds_path = $_FILES['tds_file']['tmp_name']; */
  
  $tds_file = '' ;



   move_uploaded_file($pan_path,$path.$pan_file);
   move_uploaded_file($tin_path,$path.$tin_file); 
   /* move_uploaded_file($tds_path,$path.$tds_file);  */  

   // $trucktype = $_POST['trucktype'];

       



echo "UPDATE tbl_vehicle_owner SET company_name = '$company_name',  service_tax = '$service_tax', pan_card = '$pan_no', panfile = '$pan_file' , tan_no = '$tan_no', tin_file = '$tin_file', tds_dclaration = '$tds_dclaration'  WHERE vehicle_owner_id = '".$_SESSION['last_vehicle_id']."'";

  $update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET company_name = '$company_name',  service_tax = '$service_tax', pan_card = '$pan_no', panfile = '$pan_file' , tan_no = '$tan_no', tin_file = '$tin_file', tds_dclaration = '$tds_dclaration'  WHERE vehicle_owner_id = '".$_SESSION['last_vehicle_id']."'");
	  
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

<div class="col-md-12">

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

     <div class="col-md-12">

        <div class="loader-reg-heading"> 

          <h3> Vehicle Registration </h3>

       </div>

      </div> 

    </div>

</section>

<!--END OF LOADER REGISTRATION TOP HRTADING-->



<section>

  <div class="container">

     <div class="col-md-12" >

        <div class="loader-reg-stepper-1-style vehicle-registration"> 

          <img src="<?php echo base_url ; ?>images/vehicle-registration-3.png">

          <ul class="vehicle-sec">

             <li> Owner <br> Information </li>

             <li class="contact-color">  Contact <br> Information </li>

             <li class="contact-color"> Company <br> Information </li>

             <li> Bank <br> Details </li>

             <li> Add <br> Truck </li>

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

        <div class="personal-information-section vehicle-reg-style"> 

     <div class="pers-style-info">

     <h4> Company Information </h4>

      </div>


		<form action="" method="POST" enctype="multipart/form-data" > 
      <div class="personal-information-form choose-type">

          <div class="row">

            <div class="col-md-12">

                <label> Company Name  </label>

                <input type="text" name="company_name"  id="company_name" class="form-control" placeholder=" Enter your Company Name ">

             </div>

             

         </div>



         <div class="row attach-file">

            <div class="col-md-6">

                <label> Service Tax/GST Number (Attach File) </label>

            <div class="truck-permit">


            <span class="file-style-truck other-info"> File name goes here </span><!--<input type="file" name="file-5[]" id="file-5" class="inputfile7 inputfile-5" data-multiple-caption="{count} files selected" multiple="">-->

            <input type="file" name="tds_file" id="file-4" class="inputfile7 inputfile-5" data-multiple-caption="{count} files selected">

            <label for="file-4"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>

        </div>

             </div>



             <div class="col-md-6">

                <label> Pan Card No. (Attach File)  </label>
               <div class="truck-permit">

            <span class="file-style-truck other-info"> File name goes here </span><!--<input type="file" name="file-5[]" id="file-5" class="inputfile7 inputfile-5" data-multiple-caption="{count} files selected" multiple="">-->

            <input type="file" name="tds_file" id="file-5" class="inputfile7 inputfile-5" data-multiple-caption="{count} files selected">

            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>

        </div>
              
             </div>
 </div>

 <div class="row">

            <div class="col-md-6">

                <label>  TDS Declaration form </label>

                <input type="text" name="tds_dclaration" id="tds_dclaration" class="form-control" placeholder=" Enter TDS ">

             </div>



             <div class="col-md-6">

                <label>  Tan/Cin No. </label>

                <input type="text" name="tan_no" id="tan_no" class="form-control" placeholder=" Enter Tan/Cin No. ">
</div>



         </div>

          <div class="row">

            <div class="col-md-12 continue-btn">

              <div class="skip-tab">

                <a href="<?php echo base_url ; ?>vehicle-registration-4.php">Skip</a>

               </div>

                <button type="submit" name="vehicle_submit" class="cont-btn-style"> Continue </button>

             </div>



             

         </div>



      </div>
	  </form>

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



</body>

</html>