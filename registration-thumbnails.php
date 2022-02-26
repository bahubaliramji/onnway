<?php 	   session_start();
		error_reporting(0);
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php");


 $page_title = "Registration";
	$seo_keyword = "Registration";	
$seo_content = "Registration";
 include("header.php"); 
  include("header-bottom.php"); ?>

<!--end of top header bottom-->



<!--START OF BREADCRUMB-->

<section>

<div class="container">

<div class="col-md-12">

  <div class="breadcrumb-section register">

    <ul>

       <li><a href="<?php echo base_url ; ?>"> <img src="images/home.png"> </a></li>

       <li><a  class="bred-active"> Register </a></li>

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

        <div class="loader-reg-heading thumbail"> 

          <h3> Registration  </h3>

       </div>

      </div> 

    </div>

</section>

<!--END OF LOADER REGISTRATION TOP HRTADING-->



<section class="loader-vehicle-reg">

  <div class="container">
<div class="row">
<div class="col-md-12">
        <div class="col-md-2">

        

        </div>



        <div class="col-md-8 loader-and-vehicle-reg-sedction">
         <div class="col-md-6 padding-zero">
          <a href="<?php echo base_url ; ?>loader-registration-1.php"> <h4 class="loader-sec active-1"> Loader <br> <span class="registration-style"> Registation </span> </h4></a>
          </div>
        <div class="col-md-6 padding-zero">
           <a href="<?php echo base_url ; ?>vehicle-registration.php"> <h5 class="loader-sec"> Vehicle <br> <span class="registration-style"> Registation </span> </h5></a>
           </div>

        </div>





        <div class="col-md-2">

        

        </div>


</div>
    
      </div>

  </div>

</section>





<?php include("footer.php"); ?>



<script>

  $('.loader-sec').click(function(){

$(".loader-sec").removeClass("active-1");

 $(this).addClass('active-1');

})

</script>
<script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript">        </script>
<?php include 'validation.php';?>
</body>

</html>