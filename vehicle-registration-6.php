<!DOCTYPE html>
<html>
<head>
  <title>Rahul Rajppot</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/login-popup.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https:/resources/demos/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<header>
  <div class="container">
    <div class="col-sm-3 logo">
      <a href="index.html"><img src="images/logo.png"></a>
    </div>
    <div class="col-sm-9 header-top-right">
      <span class="down-app"><img src="images/mobile.png"> &nbsp;  Download App</span>
      <span class="phone-contact"><img src="images/phone.png"> &nbsp;  +91 9313 9313 93</span>
      <span class="login-section"><a data-toggle="modal" data-target="#myModal">LOGIN  |  REGISTER</a></span>
      <span class="dropdown-top">
      <select>
        <option>ENG</option>
        <option>HIN</option>
      </select>
      </span>
    </div>
  </div>
</header>
<!--end of top header-->
<header class="header-bottom">
  <div class="container">
    <div class="col-md-5 header-bottom-right-text">
      <h3>SERVICES&nbsp; &nbsp; &nbsp; &nbsp;|&nbsp; &nbsp; &nbsp; &nbsp;TRACK & TRACE</h3>
    </div>

    <div class="col-md-7">
    <div class="header-bottom-right-section">
      <button type="button" class="tab-style">POST A TRUCK</button>
    </div>
    
      
      
    </div>
  </div>
</header>
<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
<div class="container">
<div class="col-md-12">
  <div class="breadcrumb-section">
    <ul>
       <li><a href="#"> <img src="images/home.png"> </a></li>
       <li><a href="#" class="bred-active"> Vehicle Registration </a></li>
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
          <img src="images/vehicle-registration-stepper-5.png">
          <ul class="vehicle-sec">
             <li> Owner <br> Information </li>
             <li class="contact-color">  Contact <br> Information </li>
             <li class="contact-color"> Company <br> Information </li>
             <li class="contact-color"> Bank <br> Details </li>
             <li class="contact-color"> Add <br> Truck </li>
          </ul>
       </div>
      </div> 
    </div>
</section>

<section class="add-truck-info">
  <div class="container">
    <div class="col-md-2">
    </div>
   <div class="col-md-8">
   <div class="panel-group" id="accordion1">
      <div class="accordion-container-1">
  <div class="set1">
    <a href="#">
      ADD TRUCK INFORMATION
      <!--<i class="fa fa-plus"></i>-->
    </a>
    <div class="content-1">
       <div class="personal-information-section vehicle-reg-style"> 
     

      <div class="personal-information-form choose-type">

          <div class="row">
            <div class="col-md-6">
                <label> Select Truck Type  </label>
                 <select class="form-control">
                     <option>Truck Type</option>
                     <option>Truck 1</option>
                 </select>
             </div>
      <div class="col-md-6">
        <label> Load Passing  </label>
                 <select class="form-control">
                     <option>No. of Tons</option>
                     <option> 1 Tons</option>
                 </select>
               
      </div>
    
         </div>

         <div class="row">
            <div class="col-md-6">
                <label> Operate Your Route </label>
              <select class="form-control">
                     <option>Enter Route</option>
                     <option>New Delhi</option>
                 </select>
             </div>
          <div class="col-md-6">
                    <div class="add-driver-file">
           <label>Truck Permit</label>
            <span class="file-style add-dri file-style-of-truck"> File name goes here </span><input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-18" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-1"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
                
          </div>
         </div>

          <div class="row">
            <div class="col-md-6">
                <label> Truck Registration No. </label>
                 <input type="text" name="truck-reg-no" class="form-control" placeholder=" Enter No. ">
             </div>

             <div class="col-md-6">
             <div class="add-driver-file">
           <label></label>
            <span class="file-style add-dri file-truck-style"> File name goes here </span><input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-19" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-1"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
                 
             </div>

         </div>

         <div class="row">
            <div class="col-md-6">
                 <label>  Truck Validity </label>

              
                <div class="form-group">
                <div class='input-group date'>
                    <input type='text' class="form-control" id="datepicker3" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
                
             </div>

             <div class="col-md-6">
                   <label>  Driver Certificate by Owner </label>
                  <div class="add-driver-file">
          
            <span class="file-style add-dri "> File name goes here </span><input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-12" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-1"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
             </div>

         </div>

          <div class="row">
            <div class="col-md-12 continue-btn add-driver-info">
                <button type="button" class="cont-btn-style"> Continue </button>
             </div>

             
         </div>

      </div>
       </div>
    </div>
  </div>
  <div class="set1">
    <a href="#">
      ADD DRIVER INFORMATION
     <!-- <i class="fa fa-plus"></i>-->
    </a>
    <div class="content-1">
            <div class="personal-information-section vehicle-reg-style"> 
     

      <div class="personal-information-form choose-type">

          <div class="row">
            <div class="col-md-6">
                <label> Driver Name  </label>
                 <input type="text" name="driver-name" class="form-control" placeholder=" Name ">
             </div>
      <div class="col-md-6">
        <label> Mobile Number  </label>
                 <input type="text" name="mobile-no" class="form-control" placeholder=" Enter your Mobile Number ">
               
      </div>
    
         </div>

         <div class="row">
            <div class="col-md-6">
                <label> Driving Licence </label>
               <input type="text" name="driver-licence" class="form-control" placeholder=" Enter licence no.">
             </div>
          <div class="col-md-6">
                    <div class="add-driver-file">
           <label></label>
            <span class="file-style add-dri"> File name goes here </span><input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-12" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-1"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
                
          </div>
         </div>

          <div class="row">
            <div class="col-md-6">
                <label> Aadhar number </label>
                 <input type="text" name="aadhar-no" class="form-control" placeholder=" Enter No. ">
             </div>

             <div class="col-md-6">
             <div class="add-driver-file">
           <label></label>
            <span class="file-style add-dri"> File name goes here </span><input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-12" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-1"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
                 
             </div>

         </div>

         <div class="row">
            <div class="col-md-6">
                 <label>  Fitness Certificate </label>
                  <div class="add-driver-file">
          
            <span class="file-style add-dri"> File name goes here </span><input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-12" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-1"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
                
             </div>

             <div class="col-md-6">
                   <label>  Driver Certificate by Owner </label>
                  <div class="add-driver-file">
          
            <span class="file-style add-dri "> File name goes here </span><input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-12" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-1"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
             </div>

         </div>

          <div class="row">
            <div class="col-md-12 continue-btn add-driver-info">
                <button type="button" class="cont-btn-style"> Continue </button>
             </div>

             
         </div>

      </div>
       </div>
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

!--END OF SUCCESS-->
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
<!--END OF LOGIN SECTION-->

<!--START OF POP UP-->

<div class="your-truck-pop-up" >
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
          <h6> Your truck is succefully posted </h6>
        </div>
      </div>

       <div class="col-md-12">
        <div class="con-btn text-center">
          <button type="button" class="con-btn-style"> Continue To Add More </button>
          <p><a href="#">Skip this step</a></p> 
        </div>
      </div>

    </div>

<!--END OF POP UP-->

<div class="overlay">
      </div>

<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3> QUICK LINKS </h3>
                    <ul>
                       <li> <a href="index.html"> Home </a> </li>
                        <li> <a href="about-us.html"> About us </a> </li>
                        <li> <a href="contact-us.html"> Contact us </a> </li>
                        <li> <a href="faq.html"> Faqs </a> </li>
                        <li> <a href="#"> Careers </a> </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3> QUICK LINKS</h3>
                    <ul>
                        <li> <a href="#"> How it works </a> </li>
                        <li> <a href="#"> Track & trace</a> </li>
                        <li> <a href="#"> Payment terms</a> </li>
                        <li> <a href="#"> RTO form download </a> </li>
                        <li> <a href="#"> Privacy policy </a> </li>
                        <li> <a href="#"> Terms & conditon </a> </li>
                        <li> <a href="#"> Support </a> </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3> CONTACT US </h3>
                    <ul>
                        <li> <a href="#"> Contact no </a> </li>
                        <li> <a href="#"> +91-8860978927 </a> </li>
                        <li> <a href="#"> Address </a> </li>
                        <li> <a href="#"> Neque porro quisquam est </a> </li>
                        <li> <a href="#"> qui dolorem </a> </li>
                        <li> <a href="#"> Email Id </a> </li>
                        <li> <a href="#"> amitsoni.@technobrix.com </a> </li>
                    </ul>
                </div>
              
                <div class="col-md-3">
                    <h3> FOLLOW US </h3>
                    <ul class="social">
                        <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                    </ul>
                </div>
                 <div class="col-md-3 app-style">
                    <h3> DOWNLOAD  APP </h3>
                    <ul class="google">
                        <li> <a href="#"> <img src="images/google-img.png"> </a> </li>
                        
                    </ul>
                </div>
            </div>
            <!--row--> 
        </div>
        <!--container--> 
    </div>
    <!--footer-->
    
    <div class="footer-bottom">
        <div class="container">
            <p class="text-center"> Designed by Technobrix.com </p>
        
        </div>
<script type="text/javascript">
  $(document).ready(function(){
  $(".set1 > a").on("click", function(){
    if($(this).hasClass('active')){
      $(this).removeClass("active");
      $(this).siblings('.content-1').slideUp(0);
      $(".set1 > a i").removeClass("fa-minus").addClass("fa-plus");
    }else{
      $(".set1 > a i").removeClass("fa-minus").addClass("fa-plus");
    $(this).find("i").removeClass("fa-plus").addClass("fa-minus");
    $(".set1 > a").removeClass("active");
    $(this).addClass("active");
    $('.content-1').slideUp(0);
    $(this).siblings('.content-1').slideDown(0);
    }
    
  });
});
</script>
 <script>
  $( function() {
    $( "#datepicker3" ).datepicker();
  } );
  </script>
</body>
</html>