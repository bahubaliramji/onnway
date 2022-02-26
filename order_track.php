F<?php   session_start();
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php"); 
 
   if(!isset($_SESSION['user_id'])){
	 echo "<META http-equiv='refresh' content='0;URL=index.php'>";
 }else{
	 $user_id = $_SESSION['user_id'];
 } 
 

  

   $resultB = mysqli_query($dbhandle, "SELECT * FROM tbl_book_load WHERE loader_id = '".$_SESSION['user_id']."' and id='".$_GET['id']."'");
 	$page_title = "Track Order";
	$seo_keyword = "Track Order";
	$seo_content = "Track Order";
	
	 include("header.php"); 
	 include("header-bottom.php"); 
 ?>

<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
<div class="container">
<div class="col-md-12 mobile-zero-padding">
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
    <div class="container mobile-zero-padding">
	<?php  if(isset($sms)){		echo $sms ;	}
		include 'loader_dashboard_side_menu.php';
	?>
       
 
       <div class="col-md-8 col-sm-12">
       
          <div class="my-order-list">
            <h5> My Order List </h5>
          </div>

          <div class="box-style-of-my-order-list">
		  <?php 
		  $rowB = mysqli_fetch_array($resultB); ?>
      <div class="table-responsive1">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th>Load Post No.</th>
                <th> Scheduled Date </th>
                <th> Route </th>
                <th> Order Status </th>
                <th>Lr No</th>
				<th>Advance Payment </th>
                <th> Document Status </th>
                
                <th>Current Status </th>
                <th>Balance Payment Status </th>
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td> <?PHP ECHO $rowB['booking_id']; ?> </td>
                  <td> <?PHP ECHO $rowB['scheduled_date'] ." ".$rowB['scheduled_time']; ?></td>
                  <td><?PHP ECHO getCity($rowB['source']).' - ' .getCity($rowB['destination']); ?></td>
                  <td>
					<?php echo getFullStatus($rowB['status']);?>
					</td>
					<td>
					<?PHP ECHO $rowB['lr_no']; ?> 
					<?php if($rowB['lorry_file']!=""){?><br />
					<a href="<?php echo  $path.$rowB['lorry_file'];?>" target="_blank">Download</a><?php }?>
					</td>
                 <td>
					<?php echo getFullStatus($rowB['payment_status'])?>
				 </td>
                  <td>
					<?php echo getFullStatus($rowB['document_status'])?>
				  </td>
				  <td>
					<?php echo getFullStatus($rowB['delivery_status'])?>
				  </td>
				   <td>
					<?php echo getFullStatus($rowB['bal_payment_status'])?>
				  </td>
                </tr>
              </tbody>
            </table>
          </div>
<div class="stepper-style">
<?php if($rowB['status5']!=""){ $class5="active-status-stepper";?>
<img src="images/status5.png" class="img-responsive">
<?php }else if($rowB['status4']!=""){ $class4="active-status-stepper";?>
<img src="images/status4.png" class="img-responsive">
<?php }else if($rowB['status3']!=""){ $class3="active-status-stepper";?>
<img src="images/status3.png" class="img-responsive">
<?php }else if($rowB['status2']!=""){ $class2="active-status-stepper";?>
<img src="images/status2.png" class="img-responsive">
<?php }else if($rowB['status1']!=""){ $class1="active-status-stepper";?>
<img src="images/status1.png" class="img-responsive">
<?php }else{?>
<img src="images/status0.png" class="img-responsive">
<?php }?><ul class="bhus-style">
			<li><span class="<?php echo $class1;?>"><?php echo getCity($rowB['status1'])."<br />"; $time1 = explode(" ",$rowB['status1_time']);
			echo $time1[0]."<br />".$time1[1].$time1[2];?></span></li>
			<li><span class="<?php echo $class2;?>"><?php echo $rowB['status2']."<br />";
			$time2 = explode(" ",$rowB['status2_time']);
			echo $time2[0]."<br />".$time2[1].$time2[2];?></span></li>
			<li><span class="<?php echo $class3;?>"><?php echo $rowB['status3']."<br />"; 
			$time3 = explode(" ",$rowB['status3_time']);
			echo $time3[0]."<br />".$time3[1].$time3[2];?></span></li>
			<li><span class="<?php echo $class4;?>"><?php echo $rowB['status4']."<br />";
			$time4 = explode(" ",$rowB['status4_time']);
			echo $time4[0]."<br />".$time4[1].$time4[2];?></span></li>
			<li><span class="<?php echo $class5;?>"><?php echo getCity($rowB['status5'])."<br />"; $time5 = explode(" ",$rowB['status5_time']);
			echo $time5[0]."<br />".$time5[1].$time5[2];?></span></li>
		</ul>   
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