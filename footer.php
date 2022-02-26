<footer>
    <div class="footer" id="footer">
       
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <h3> QUICK LINKS</h3>
                    <ul>
                        <li> <a href="<?php echo base_url ; ?>"> Home </a> </li>
                        <li> <a href="<?php echo base_url ; ?>about-us.php"> About us </a> </li>
                        <li> <a href="<?php echo base_url ; ?>contact-us.php"> Contact us </a> </li>
                        <li> <a href="<?php echo base_url ; ?>faq.php"> Faqs </a> </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <h3> IMPORTANT INFO</h3>
                    <ul>
                        <li> <a href="privacy_policy.php"> Privacy policy </a> </li>
                       <li> <a href="terms-n-condition.php"> Terms & conditon </a> </li>
                       <?php if(basename($_SERVER['PHP_SELF'])!='post-a-truck.php'){?>
                        <li> <a href="payment_terms.php"> Payment terms</a> </li>
                       <!-- <li> <a href="#"> RTO form download </a> </li> -->
                        <?php }else{?>
                         <li> <a>&nbsp;</a> </li>
                       <li> <a>&nbsp; </a> </li>
                        <?php }?>
                       
                       <li><a>&nbsp;</a></li>
                       
                      
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <h3> CONTACT US </h3>
                    <ul>
                        <li> <a href="tel:9111192233"><i class="fa fa-phone"></i>  +<?php if (isset($results[0][2])) {
						echo $results[0][2];
					} ?>3 </a> </li>
                        <li> <a href="tel:9111192244"><i class="fa fa-phone"></i>  +<?php if (isset($results[3][2])) {
						echo $results[3][2];
					} ?> </a> </li>
                       
                        
                        <li> <a href="mailto:support@onnway.com"><i class="fa fa-envelope"></i> <?php if (isset($results[4][2])) {
						echo $results[4][2];
					} ?> </a> </li>
                        
                    </ul>
                </div>
                
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <h3> FOLLOW US </h3>
                    <ul class="social">
                        <li> <a href="<?php if (isset($results[6][2])) {echo $results[6][2];} ?>"> <i class=" fa fa-facebook"> </i> </a> </li>
                        <li> <a href="<?php if (isset($results[7][2])) {echo $results[7][2];} ?>"> <i class="fa fa-instagram"> </i> </a> </li>
                        <li> <a href="<?php if (isset($results[8][2])) {echo $results[8][2];} ?>"> <i class="fa fa-twitter"> </i> </a> </li>
                    </ul>
                </div>
                 <div class="col-md-3 col-sm-12 col-xs-12 app-style">
                    <h3> DOWNLOAD  APP </h3>
                    <ul class="google">
                        <li> <a href="https://play.google.com/store/apps/details?id=com.onnway.app"> <img src="images/google-img.png"> </a> </li>
                        
                    </ul>
                </div>
                          </div>
            <!--row--> 
        </div>
       </div> 
        <!--container--> 
    </div>
    <!--footer-->
    
    <div class="footer-bottom">
        <div class="container">
            <p class="text-center"><?php if (isset($results[9][2])) {
						echo $results[9][2];
					} ?> &nbsp;&nbsp;&nbsp;&nbsp;</p>
        
        </div>
		</footer>
        <!-- SWEET ALERT -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<?php
if (isset($_SESSION['title']) && $_SESSION['title'] != "") {
?>
  <script>
    swal({
      title: "<?php echo $_SESSION['title']; ?>",
      // text: "You clicked the button!",
      icon: "<?php echo $_SESSION['icon']; ?>",
      // link: "<?php echo $_SESSION['link']; ?>",
      button: "Ok",
    });
  </script>
<?php
  unset($_SESSION['title']);
  unset($_SESSION['icon']);
  unset($_SESSION['link']);

  // unset($_SESSION['icon']);
  // unset($_SESSION['link']);
}
?>
       <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
        <script src="val/lib/jquery/jquery-1.3.2.js" type="text/javascript">
        </script>
        <script src="val/javascripts/jquery.validate.js" type="text/javascript">
        </script>
        <script src="val/javascripts/jquery.validation.functions.js" type="text/javascript">
        </script>
        <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){  
        jQuery("#name").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter Your Name"
                });
        
        jQuery("#password ").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter Password"
                });
        jQuery("#mobile").validate({
                    expression: "if (VAL.length > 9 && VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Your Phone Number in correct format"
                });
        jQuery("#email").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please enter a valid Email ID"
                });
      
     jQuery("#emaill").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please enter a valid Email ID"
                });
      jQuery("#loader_name").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter Your Name"
                });
      jQuery("#loader_mobile").validate({
                    expression: "if (VAL.length > 9 && VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Your Phone Number in correct format"
                });
       jQuery("#loader_email").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please enter a valid Email ID"
                });
       jQuery("#loader_password ").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter Password"
                });
       jQuery("#address").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter Your address"
                });
       jQuery("#city").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter Your city"
                });
        jQuery("#pincode").validate({
               expression: "if (VAL) return true; else return false;",
               message: "Please enter pincode"
                });
           jQuery("#designation").validate({
               expression: "if (VAL) return true; else return false;",
               message: "Please enter designation"
                });
        jQuery("#landline_number").validate({
               expression: "if (VAL) return true; else return false;",
               message: "Please enter landline number"
                });
        jQuery("#alternate_contact_person").validate({
               expression: "if (VAL) return true; else return false;",
               message: "Please enter alternate contact person"
                });
         jQuery("#alternate_mobile_no").validate({
                    expression: "if (VAL.length > 9 && VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "alternte mb Number in correct format"
                });
          jQuery("#truck_type").validate({
               expression: "if (VAL) return true; else return false;",
               message: "Please select truck type"
                });
         jQuery("#company_name").validate({
               expression: "if (VAL) return true; else return false;",
               message: "Please enter company name"
                });
         jQuery("#company_type").validate({
               expression: "if (VAL) return true; else return false;",
               message: "Please select company type"
                });
          jQuery("#service_tax").validate({
               expression: "if (VAL) return true; else return false;",
               message: "Please enter service tax"
                });
         jQuery("#pan_no").validate({
               expression: "if (VAL) return true; else return false;",
               message: "Please enter pan no"
                });
         jQuery("#file_5").validate({
               expression: "if (VAL) return true; else return false;",
               message: "Please select file"
                });
         jQuery("#file_6").validate({
               expression: "if (VAL) return true; else return false;",
               message: "Please select file"
                });
           jQuery("#tin-no").validate({
               expression: "if (VAL) return true; else return false;",
               message: "Please enter tin no"
                });
            jQuery("#company_website").validate({
               expression: "if (VAL) return true; else return false;",
               message: "Please enter company website"
                });
/////////////////////////////////////
              jQuery("#namev").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter Your Name"
                });
        
        jQuery("#passwordv ").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter Password"
                });
        jQuery("#mobilev").validate({
                    expression: "if (VAL.length > 9 && VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Your Phone Number in correct format"
                });
        jQuery("#emailv").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please enter a valid Email ID"
                });
         jQuery("#emaillv").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please enter a valid Email ID"
                });
            });
            /* ]]> */
        </script> -->