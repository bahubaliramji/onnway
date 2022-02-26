<?php   session_start();
		ob_start();
 include("controls/define.php"); 
 include("TBXadmin/include/config.php"); 
 
   if(!isset($_SESSION['user_id'])){
	 echo "<META http-equiv='refresh' content='0;URL=index.php'>";
 }else{
	 $user_id = $_SESSION['user_id'];
 } 
 
  $resultB = mysql_query("SELECT * FROM tbl_book_load WHERE loader_id = '".$_SESSION['user_id']."'");
  
  
 
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
       <li><a href="#" class="bred-active"> Loader Dashboard </a></li>
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
       <div class="col-md-4">
          <div class="user-dashboard-section">
            <h4>User Dashboard</h4>
          </div>
          <div class="dashboad-details">
            <ul>
             <li><a href="<?php echo base_url ; ?>loader-account-details.php"> <img src="<?php echo base_url ; ?>images/account-detail.png"> Account Details </a></li>
              <li><a href="<?php echo base_url ; ?>company-details.php"> <img src="<?php echo base_url ; ?>images/com-detail.png"> Company Details </a></li>
               <li class="dropdown"><a href="<?php echo base_url ; ?>order-list.php"> <img src="<?php echo base_url ; ?>images/my-order.png"> My order </a></li>
			    <li><a href="<?php echo base_url ; ?>address-book.php"> <img src="<?php echo base_url ; ?>images/address-book.png"> Address Book </a></li>
               
            </ul>
          </div>
       </div>
 
       <div class="col-md-8">
       
          <div class="my-order-list">
            <h5> My Order List </h5>
          </div>

          <div class="box-style-of-my-order-list">
		  <?php 
		  while($rowB = mysql_fetch_array($resultB)){ ?>
            <table class="table table-bordered">
              <thead>
              <tr>
                <th>Order No.</th>
                <th> Scheduled Date </th>
                <th> Route </th>
                <th> Order Status </th>
                <th> Ebay Status </th>
                <th>Payment </th>
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td> <?PHP ECHO $rowB['booking_id']; ?> </td>
                  <td> <?PHP ECHO $rowB['scheduled_date'] ." ".$rowB['scheduled_time']; ?></td>
                  <td><?PHP ECHO $rowB['source'].' - ' .$rowB['destination']; ?></td>
                  <td><div class="oending-style">Pending</div></td>
                 <td><div class="oending-style">Pending</div></td>
                  <td><div class="oending-style">Pending</div></td>
                </tr>
              </tbody>
            </table>

            <div class="track-section">
              <img src="images/track.png"><span class="track-style">TRACK</span>

               <div class="track-section-btn">
            <input type="file" name="file-1[]" id="file-2" class="inputfile2 inputfile-2">
            <label for="file-2"> <span>DOC UPLOAD </span></label>
        
              <button type="button" class="track-del">DELETE</button>
              
            </div>
            </div> 
			

            

            <?php }  ?>       
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
<!--END OF LOGIN SECTION-->

<?php include("footer.php") ;?>

</body>
</html>