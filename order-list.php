<?php   session_start();
		ob_start();
		/*  error_reporting(E_ALL); ini_set('display_errors', 1); */
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php"); 
 
   if(!isset($_SESSION['user_id'])){
	 echo "<META http-equiv='refresh' content='0;URL=index.php'>";
 }else{
	 $user_id = $_SESSION['user_id'];
 } 


  
   if(isset($_POST['Cancel']) && $_POST['load_del_id']!=""){	  
	  
      $update = mysqli_query($dbhandle, "UPDATE tbl_book_load SET status='9' where id = '".$_POST['load_del_id']."' and loader_id = '".$_SESSION['user_id']."'");
	  
	  $sms = '<p class="success-msg">Order Details Cancelled Successfully</p>' ;
    }
 $path = $base_url."upload/documents/";
 $random_key = strtotime(date('Y-m-d H:i:s'));
 if(isset($_POST['upload_file']) && $_POST['order_load_id']!=""){
	if(!empty($_FILES['file1']['name'])){
		 $file1 =$_FILES['file1']['name'];
		 $file1 = rand().$random_key.'-'.$file1;
		 $file1_tmp = $_FILES['file1']['tmp_name'];
		 move_uploaded_file($file1_tmp,$path.$file1);
		 $file1 = ", file1 = '$file1'";	
	}else{
		$file1 = "";
	}	
	if(!empty($_FILES['file2']['name'])){	
		$file2 =$_FILES['file2']['name'];
		$file2 = rand().$random_key.'-'.$file2;	
		$file2_tmp = $_FILES['file2']['tmp_name'];	
		move_uploaded_file($file2_tmp,$path.$file2);	
		$file2 = ", file2 = '$file2'";				
	}else{	
		$file2 = "";
	}			
	if(!empty($_FILES['file3']['name'])){
		$file3 =$_FILES['file3']['name'];	
		$file3 = rand().$random_key.'-'.$file3;
		$file3_tmp = $_FILES['file3']['tmp_name'];
		move_uploaded_file($file3_tmp,$path.$file3);
		$file3 = ", file3 = '$file3'";
	}else{
		$file3 = "";
	}	
	if(!empty($_FILES['file4']['name'])){
		$file4 =$_FILES['file4']['name'];
		$file4 = rand().$random_key.'-'.$file4;
		$file4_tmp = $_FILES['file4']['tmp_name'];
		move_uploaded_file($file4_tmp,$path.$file4);
		$file4 = ", file4 = '$file4'";	
	}else{			
		$file4 = "";
	}		
	if(!empty($_FILES['file5']['name'])){	
		$file5 =$_FILES['file5']['name'];	
		$file5 = rand().$random_key.'-'.$file5;
		$file5_tmp = $_FILES['file5']['tmp_name'];
		move_uploaded_file($file5_tmp,$path.$file5);
		$file5 = ", file5 = '$file5'";	
	}else{			
		$file5 = "";
	}
	

		$update = mysqli_query($dbhandle, "UPDATE tbl_book_load SET post_type='' $file1 $file2 $file3 $file4 $file5 where loader_id = '".$_SESSION['user_id']."' and id='".$_POST['order_load_id']."'");
		$sms = '<p class="success-msg">Order Details Updated Successfully</p>' ;

 }
  
 	$page_title = "My Order List";
	$seo_keyword = "My Order List";
	$seo_content = "My Order List";
	
	 include("header.php"); 
	 include("header-bottom.php"); 

include_once 'paginate.php';
 	$per_page = 6;
	$query = "SELECT * FROM tbl_book_load WHERE loader_id = '".$_SESSION['user_id']."' order by id desc";
  function getResult($sql) {
		$resultArray = array();
		$result = mysqli_query($dbhandle, $sql);
		$rowCount = mysqli_num_rows($result);
		while($arrayResult = mysqli_fetch_assoc($result)) {
			$resultArray[] = $arrayResult;	
		}
		return $resultArray;
	}
	$result = getResult($query);
	$total_results = count($result);
	$total_pages = ceil($total_results / $per_page);//total pages we going to have

	//-------------if page is setcheck------------------//
	if (isset($_GET['page'])) {
		$show_page = $_GET['page'];             //it will telles the current page
		if ($show_page > 0 && $show_page <= $total_pages) {
			$start = ($show_page - 1) * $per_page;
			$end = $start + $per_page;
		} else {
			// error - show first set of results
			$start = 0;              
			$end = $per_page;
		}
	} else {
		// if page isn't set, show first set of results
		$start = 0;
		$end = $per_page;
	}
	// display pagination
	$page = intval($_GET['page']);

	$tpages=$total_pages;
	if ($page <= 0)
		$page = 1;
 ?>

<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
<div class="container">
<div class="col-md-12 mobile-zero-padding">
  <div class="breadcrumb-section">
    <ul>
       <li><a href="<?php echo base_url ; ?>"> <img src="<?php echo base_url ; ?>images/home.png"> </a></li>
       <li><a href="#" class="bred-active"> My Order</a></li>
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
       
 
       <div class="col-md-9 col-sm-6">
       
          <div class="my-order-list">
            <h5> My Order List </h5>
          </div>

          <div class="box-style-of-my-order-list table-responsive">
      		
      		  <?php 
							if($total_results>0){
							
							for ($i = $start; $i < $end; $i++) {
									// make sure that PHP doesn't try to show results that don't exist
								   if ($i == $total_results) {
								 break;
								 }
							?> 
                  <table class="table table-bordered table-padding ">
                    <thead>
                    <tr>
                      <th>Load Post No.</th>
                      <th> Scheduled Date </th>
                      <th> Route </th>
                      <th> Order Status </th>
                      <th>Lorry Receipt No</th>
      				        <th>Advance Payment </th>
                      <th> Document Status </th>
                      <th>Current Status </th>
                      <th>Balance Payment Status </th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td> <a href="view_order.php?id=<?php echo $result[$i]['id'];?>"><?PHP echo $result[$i]['booking_id']; ?></a> </td>
                        <td> <?PHP echo $result[$i]['scheduled_date'] ." ".$result[$i]['scheduled_time']; ?></td>
                        <td><?PHP ECHO getCity($result[$i]['source']).' - ' .getCity($result[$i]['destination']); ?></td>
                        <td>
      					<?php echo getFullStatus($result[$i]['status']);?>
      					</td>
      					<td>
      					<?PHP ECHO $result[$i]['lr_no']; ?> 
      					<?php if($result[$i]['lorry_file']!=""){?><br />
      					<a href="<?php echo  $path.$result[$i]['lorry_file'];?>" target="_blank">Download</a><?php }?>
      					</td>
                       <td>
      					<?php echo getFullStatus($result[$i]['payment_status'])?>
      				 </td>
                        <td>
      					<?php echo getFullStatus($result[$i]['document_status'])?>
      				  </td>
      				  <td>
      					<?php echo getFullStatus($result[$i]['delivery_status'])?>
      				  </td>
      				   <td>
      					<?php echo getFullStatus($result[$i]['bal_payment_status'])?>
      				  </td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="track-section"><a href="order_track.php?id=<?php echo $result[$i]['id'];?>">
                    <!--<img src="images/track.png"><span class="track-style">TRACK</span></a>-->
                    <button type="button" class="track-btn"><!--<img src="images/track.png">-->Track</button></a>
                         
                     <div class="track-section-btn">
      			   <?php if($result[$i]['lorry_file']!=""){?>
      			   <a href="<?php echo $path.$result[$i]['lorry_file'];?>" target="_blank" >Download Lorry Receipt </a>
      		  <?php }?> &nbsp;
                  <!--<input type="file" name="file-1[]" id="file-2" class="inputfile2 inputfile-2">-->
                  <button type="button" class="doc-upload-tab" value="<?php echo $result[$i]['id'];?>" >DOC UPLOAD </button>
                  <!-- <button type="button" value="<?php echo $result[$i]['id'];?>" class="track-del">Cancel</button>-->
                           
                  </div>
                           <!--
                           <div class="col-md-12">
                              <div class="order-detail-image">
                                 <center><img src="images/status0.png"></center>
                              </div>
                           </div>
                           -->  
                  </div> 
      			<?php 
									}
							 }else{
								 
								 echo "No order Found";
							 }?>   
                        
     </div>
     <!--== pegination==-->
	 <div class="clearfix"></div>
	  <?php
              //$reload = $_SERVER['PHP_SELF'] . "?";
               $reload = basename($_SERVER['PHP_SELF']) . "?";
                 if(!isset($_POST['sumit'])){$reload .= "orderby=".$_REQUEST['orderby']."&";} 
                $reload .= "tpages=" . $tpages;
                    echo '<div class="pagination"><ul>';
                    if ($total_pages > 1) {
                        echo paginate($reload, $show_page, $total_pages);
                    }
                    echo "</ul></div>";
            // pagination 
			?>
     
     <!-- <div class="col-md-12">
         <ul class="pagination pagination">
            <li><a href="#"> < </a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
            <li><a href="#">8</a></li>
            <li><a href="#">9</a></li>
            <li><a href="#"> > </a></li>
          </ul>
      </div>-->
  
     <!--==end pegination==-->
    </div>
  </div>
</section>
<!--END OF ADDRESS BOOK-->
<section class="pegination">
    
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

<!--END OF SUCCESS-->
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
<form name="mgaform" id="mgaform" method="post" action="" enctype="multipart/form-data" >
    <div class="require-doc-pop-up new-page-pop" >
<p class="close-btn-pop-up">x</p>
<div id="get_file_upload_loader"></div>
         </div>
		 </form>
         <div class="overlay30">
           
         </div>

<?php include("footer.php") ;?>
<div class="modal mypopup bs-example-modal-md" id="citypopup"  role="dialog" aria-labelledby="citypopupLabel"  >
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="citypopupLabel">Are You sure to Cancel This Order?</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body citypopup">
        <form action="" method="post">
			<span>
				<input type="hidden" name="load_del_id" id="load_del_id" value="" >
				<input type="submit" class="truck-edit-btn" name="Cancel" value="Yes">&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" class="truck-delete-btn" data-dismiss="modal" value="No">&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
		</form>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
		$(".doc-upload-tab").on("click", function(){
			$(".require-doc-pop-up").css('display','block');
			$(".overlay30").css('display','block');
			var loader_id = $(this).val();
			$.ajax({
					type: "POST",
					url: "check_file.php",
					data: { order_id: loader_id, tab: "Check" },
					//dataType:"JSON",
					beforeSend: function(){
						//$("#otp_ll").show();
				},
				success: function(result){
					$('#get_file_upload_loader').html(result);
				}
			});
		});
		$(".close-btn-pop-up").click(function(){
			$(".require-doc-pop-up").css('display','none');
			$(".overlay30").css('display','none');
		});
	});
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $(".track-del").on("click", function(){
    $('#citypopup').modal('show');
	var truck_id = $(this).val();
      $('#load_del_id').val(truck_id)
  });
});
</script>

</body>
</html>