 <?php 	   session_start();
		error_reporting(0);
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php"); 

 if(!isset($_SESSION['last_id'])){
	 echo "<META http-equiv='refresh' content='0;URL=loader-registration-1.php'>";
 }else{
	 $user_id = $_SESSION['last_id'];
 }
 $path = $base_url."upload/documents/";
  $random_key = strtotime(date('Y-m-d H:i:s'));
if(isset($_POST['submit'])){
		$company_name = $_POST['company_name'];
		$gst_no = $_POST['gst_no'];
        $pan_no = $_POST['pan_no'];
        $company_website = $_POST['company_website'];
     
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
      


  $update = mysqli_query($dbhandle, "UPDATE tbl_loader SET company_name = '$company_name', gst_no = '$gst_no', pan_card_no = '$pan_no',	company_website='$company_website' $pan_file $gst_file
    WHERE id = '".$_SESSION['last_id']."'");
	
	 $popupalert = 'Your Account has been registered.' ;
	 
}

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
       <li><a class="bred-active"> Loader Registration </a></li>
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
          <h3> Loader Registration </h3>
       </div>
      </div> 
    </div>
</section>
<!--END OF LOADER REGISTRATION TOP HRTADING-->

<section>
  <div class="container">
     <div class="col-md-12 mobile-zero-padding" >
        <div class="loader-reg-stepper-1-style"> 
          <img src="images/loader-registration-stepper-3.png" class="img-responsive">
          <ul class="registyration12">
             <li> Personal <br> Information </li>
             <li class="contact-style">  Contact <br> Information </li>
             <li class="contact-style"> Company <br> Information </li>
          </ul>
       </div>
      </div> 
    </div>
</section>

<section class="form-section">

  <div class="container mobile-zero-padding">
  <?php  if(isset($sms1)){		echo $sms1 ;	}?>
  <div class="col-md-2">
    
  </div>
     <div class="col-md-8" >
        <div class="personal-information-section com-info"> 
        <div class="information-wrap">    
     <div class="pers-style-info">
     <h4> COMPANY INFORMATION </h4>
      </div>
	<form action="" name="form" method="POST" enctype="multipart/form-data" > 
      <div class="personal-information-form mobile-form">
         <div class="row">
            <div class="col-md-12">
                <label> Company Name <span style="color:red;">*</span> </label>
                <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter your Company Name">
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

            <span class="file-style-truck other-info hidden-xs"> Upload Pan Card File Here </span>

            <input type="file" name="pan_file" id="pan_file" class="inputfile7 inputfile-5" data-multiple-caption="{count} files selected">

            <label for="pan_file"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span><span class="ValidationErrors">*</span>Upload Image</span></label>

			</div>
               <br class="visible-xs">
               <br class="visible-xs">
             </div>
             
             
         </div>

         

           <div class="row">
            <div class="col-md-12">
                <label>  Company Website </label>
                <input type="text" name="company_website" id="company_website" class="form-control" placeholder=" Enter your company website ">
             </div>
             <div class="col-md-6">
                
             </div>
             
         </div>

          <div class="row">
            <div class="col-md-12 continue-btn">
                <button type="submit" name="submit"  class="cont-btn-style"> Register </button>
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


<?php include("footer.php") ;?>
<div class="modal fade company-page-modal" id="myModalLoaderSuccess" role="dialog">
    <div class="modal-dialog">

        <div id="container_demo">
		
            <div id="wrapper">

                <!--start of success-->

                <div  id="loginv" class="animate form">

                        <div class="col-md-12 zero-padding">

                            <button type="button" class="close close-style" data-dismiss="modal">&times;</button>


                            <div class="col-md-12">

                                <div class="thank-text text-center">

                                    <h4>Your Account has Been Created Successfully.Please Login Now</h4>

                                </div>

                            </div>

                        <div class="col-md-12">

                                <div class="create-acc-style text-center">

                                    <p> <a href="#tologinv" id="myModalv" class="to_login_l"> Login ? </a> </p>

                                </div>

                            </div>

                        </div>

                </div>

                <!--END OF SUCCESS-->

            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript">        </script>
		
        <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){  
        jQuery("#company_name").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please Enter Company Name"
                });
        
        jQuery("#pan_no").validate({
                     expression: "if (VAL) return true; else return false;",
                    message: "Please Enter Pan No"
                });
				
        jQuery("#pan_file").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please upload Pan Card"
                }); 
       
         
            });
            /* ]]> */
        </script>
<script type="text/javascript">
  $(document).ready(function(){
  $(".to_login_l").on("click", function(){
    $('#myModal').modal('show');
    $('#myModalLoaderSuccess').modal('hide');
  });
});
</script>
<?php if($popupalert!=""){ ?>
		<script type="text/javascript">
			$(function() {
				$("#myModalLoaderSuccess").modal();
			});
		</script>
 <?php }?>
</body>
</html>