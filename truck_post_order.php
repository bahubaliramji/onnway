<?php   session_start();
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php"); 
 
   if(!isset($_SESSION['vehicle_id']) || $_SESSION['vehicle_id']==""){
	 header("location:index.php");
 }else{
	 $user_id = $_SESSION['user_id'];
 } 
 if($_SESSION['vehicle_owner_type']!="owner"){
	header("location:vehicle-my-account.php"); 
 }
 



   $resultB = mysqli_query($dbhandle, "SELECT * FROM tbl_post_truck WHERE vehicle_owner_id = '".$_SESSION['vehicle_id']."' and id='".$_GET['id']."'");
   if(mysqli_num_rows($resultB)==0){
	header("location:my-posted-truck.php");
   }
   $resultA = mysqli_query($dbhandle, "SELECT * FROM tbl_book_load WHERE  assign_truck='".$_GET['id']."'");
   $data = mysqli_fetch_array($resultA);
 	$page_title = "My Account";
	$seo_keyword = "My Account";
	$seo_content = "My Account";
	
	 include("header.php"); 
	 include("header-bottom.php"); 
 ?>

<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
<div class="container">
<div class="col-md-12">
  <div class="breadcrumb-section">
    <ul>
       <li><a href="<?php echo base_url ; ?>"> <img src="<?php echo base_url ; ?>images/home.png"> </a></li>
       <li><a  class="bred-active"> Vendor Dashboard </a></li>
    </ul>
  </div>
  </div>
</div>
</section>
<!--END OF BREADCRUMB-->

<!--START OF ADDRESS BOOK-->
<section>
  <div class="main-dashboarsd-section">
    <div class="container">
	<?php  if(isset($sms)){		echo $sms ;	}?>
       <div class="col-md-4">
          <div class="vendor-dashboard-section">
            <h4>USER DASHBOARD</h4>
          </div>
          <div class="dashboad-details">
		  <?php include('include/vehicle-sidebar.php') ; ?>
           
          </div>
       </div>
       
 
       <div class="col-md-8">
       
          <div class="box-style-of-view-order">
          <div class="order-id-top">
            <h5>Order ID : <?php echo $data['booking_id'];?></h5>
            <h4>Amount : <?php echo $data['cost'];?> /-</h4>
          </div>

             <div class="order-date">
               <p>Date <span class="date-style"> <?php echo $data['booking_date'];?> </span> </p>
             </div>
          
          <div class="truck-detail-list">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th>Truck Type</th>
                <th> Route </th>
                <th> No. of Vehicles </th>
                <!--<th> Date of loading </th>-->
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td> <?php echo getTruckType($data['vehicle_type']);?> </td>
                  <td> <?php echo getCity($data['source']).'-'.getCity($data['destination']);?> </td>
                  <td><?php echo $data['no_vehicle'];?></td>
                  <!--<td><?php echo $data['truck_type'];?></td>-->
                </tr>
              </tbody>
            </table>

            <div class="material-information">
               <h5>Material Information</h5>
            
          <table class="table table-bordered">
              <thead>
              <tr>
                <th> Industry Type </th>
                <th> Material Type </th>
                <th> Weight </th>
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td> <?php echo $data['company_type'];?> </td>
                  <td> <?php echo $data['material_type'];?> </td>
                  <td><?php echo $data['weight'];?> Ton</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="contact-detail">
               <h5>Contact Details</h5>
            
          <table class="table table-bordered">
              <thead>
              <tr>
                <th> Company Name </th>
                <th> Contact No. </th>
                <th> Address </th>
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td> <?php echo $data['company_name'];?> </td>
                  <td> <?php echo $data['landline_no'];?> </td>
                  <td><?php echo $data['address'];?><br> <?php echo $data['city_name'];?> -<?php echo $data['pincode'];?></td>
                </tr>
              </tbody>
            </table>
          </div>
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
         <div class="overlay30">
           
         </div>

<?php include("footer.php") ;?>

</body>
</html>