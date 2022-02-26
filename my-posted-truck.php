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
 $path= $base_url.'upload/documents/';
 if(isset($_POST['delete']) && $_POST['truck_del_id']!=""){
    $address = $_POST["address"];
     $city = $_POST["city"];
    $pincode = $_POST["pincode"];
    $designation = $_POST["designation"];
   $landline_number = $_POST["landline_number"];
    $alternate_contact_person = $_POST["alternate_contact_person"];
     $alternate_mobile_no = $_POST["alternate_mobile_no"];
      $truck_type = $_POST["truck_type"];
	  
	  
      $update = mysqli_query($dbhandle, "DELETE FROM tbl_trucks  WHERE id = '".$_POST['truck_del_id']."' and vehicle_owner_id = '".$_SESSION['vehicle_id']."'");
	  
	  $sms = '<p class="success-msg">Truck Details Deleted Successfully</p>' ;
    }
	

	

 
 	$page_title = "My Posted Truck";
	$seo_keyword = "My Posted Truck";
	$seo_content = "My Posted Truck";
	
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
    <div class="container mobile-zero-padding">
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
       
          <div class="my-listed-truck">
            <h5> My Posted Trucks </h5>
            <h4> <a href="<?php echo base_url ; ?>post-truck.php">+ Post TRUCK</a></h4>
          </div>
<?php
		$result = mysqli_query($dbhandle, "SELECT * FROM tbl_post_truck WHERE vehicle_owner_id = '".$_SESSION['vehicle_id']."' order by id desc");
		$serial_no = 1;
 ?>
          <div class="box-style-of-my-listed-truck table-responsive">
		 <?php while($rowU = mysqli_fetch_array($result)){
			 $route_result = mysqli_fetch_array(mysqli_query($dbhandle, "SELECT * FROM tbl_book_load WHERE assign_truck = '".$rowU['id']."'"));?>
		 <div>Amount : <?php echo $route_result['amount_truck']; ?></div>
		<!-- <div style="float:right">
		 <?php if($route_result['advance_pay_file_t']!=""){ echo "<a href='".$path.$route_result['advance_pay_file_t']."' target='_blank'>Advance Payment File</a>";}?>
		 <?php if($route_result['bal_pay_file_t']!=""){ echo "<a href='".$path.$route_result['bal_pay_file_t']."' target='_blank'>Balance Payment File</a>";}?>
		 </div>-->
            <table class="table table-bordered">
              <thead>
              <tr>
                
                <th width="10%"> Post Id. </th>
				<th width="15%"> Scheduled Date </th>
                <th width="15%"> Truck Reg No </th>
                <th width="20%"> Route </th>
				<th width="10%"> Order Status </th>
                <th width="10%"> Advance Payment Status </th>
                <th width="10%"> Current Status </th>
                <th width="10%"> Balance Payment Status </th>
                
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td> <!--<a href="truck_post_order.php?id=<?php echo $rowU['id'];?>">--><?php echo $rowU['post_truck_id']; ?> </td>
				  <td> <?php echo $rowU['schedule_date']; ?> </td>
                  <td> <?php echo getRegNoBytruckId($rowU['truck_id']); ?> </td>
                  <td> <?php 
				  if($route_result['source']!=""){
						echo getCity($route_result['source'])." - ".getCity($route_result['destination']);
				  }else{
					  echo getCity($rowU['source'])." - ";
					  $destination = explode(',',$rowU['destination']);
						$cm = '';
						foreach($destination as $id =>$value){
							echo $cm.getCity($value);
							$cm = ', ';
						}
				  }
							?>
					</td>
                  
                  <td> <?php echo getFullStatus($route_result['status']); ?> </td>
                  <td> 
				  <?php echo getFullStatus($route_result['payment_status_t']); ?>
				  <?php if($route_result['advance_pay_file_t']!=""){?><br /><a href="<?php echo $path.$route_result['advance_pay_file_t'];?>" target="_blank">Download</a><?php }?>
				  </td>
				  <td><?php echo getFullStatus($route_result['delivery_status']); ?></td>
				  <td><?php echo getFullStatus($route_result['bal_payment_status_t']); ?>
				  <?php if($route_result['bal_pay_file_t']!=""){?><br /><a href="<?php echo $path.$route_result['bal_pay_file_t'];?>"  target="_blank">Download</a><?php }?>
                </tr>
              </tbody>
            </table>

            <div class="list-truck-section-btn">
               <!--<button type="button" id="<?php echo $rowU['id'];?>" value="<?php echo $rowU['id'];?>"  class="truck-delete-btn">DELETE</button>
              <a href="view-truck.php?truck_id=<?php echo $rowU['id'];?>"><button type="submit" name="edit_truck" class="truck-edit-btn"> View  Truck </button></a>-->
            </div>      
		 <?php
				$serial_no++;
			}
		 ?>
       
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

<?php include 'footer.php';?>
<div class="modal mypopup bs-example-modal-md" id="citypopup"  role="dialog" aria-labelledby="citypopupLabel"  >
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="citypopupLabel">Are You sure to Delete This Truck?</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">�</span></button>
      </div>
      <div class="modal-body citypopup">
        <form action="" method="post">
			<span>
				<input type="hidden" name="truck_del_id" id="truck_del_id" value="" >
				<input type="submit" class="truck-edit-btn" name="delete" value="Yes">&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" class="truck-delete-btn" data-dismiss="modal" value="No">&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
		</form>
    </div>
  </div>
</div>
</div>
	
	

			<script type="text/javascript">
  $(document).ready(function(){
  $(".truck-delete-btn").on("click", function(){
    $('#citypopup').modal('show');
	var truck_id = $(this).val();
      $('#truck_del_id').val(truck_id)
  });
});
</script>
</body>
</html>