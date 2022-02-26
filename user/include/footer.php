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
                        <li> <a href="<?php echo base_url ; ?>career.php"> Careers </a> </li>
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
                        <li> <a href="tel:9111192233"><i class="fa fa-phone"></i>  +91-9111192233 </a> </li>
                        <li> <a href="tel:9111192244"><i class="fa fa-phone"></i>  +91-9111192244 </a> </li>
                       
                        
                        <li> <a href="mailto:support@onnway.com"><i class="fa fa-envelope"></i> support@onnway.com </a> </li>
                        
                    </ul>
                </div>
                
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <h3> FOLLOW US </h3>
                    <ul class="social">
                        <li> <a href="https://www.instagram.com/onnway/?hl=en"> <i class=" fa fa-facebook"> </i> </a> </li>
                        <li> <a href="https://www.instagram.com/onnway/?hl=en"> <i class="fa fa-instagram"> </i> </a> </li>
                        <li> <a href="https://twitter.com/onnway_com?lang=en"> <i class="fa fa-twitter"> </i> </a> </li>
                    </ul>
                </div>
                 <div class="col-md-3 col-sm-12 col-xs-12 app-style">
                    <h3> DOWNLOAD  APP </h3>
                    <ul class="google">
                        <li> <a href="https://play.google.com/store/apps/details?id=com.onnway.app"> <img src="../images/google-img.png"> </a> </li>
                        
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
            <p class="text-center">Copyright © 2020-21 ONNWAY
SOLUTIONS PRIVATE LIMITED, All Rights Reserved. &nbsp;&nbsp;&nbsp;&nbsp;</p>
        
        </div>
		</footer>


<script src="../js/sweetalert.js"></script>

<?php if (isset($_SESSION['swal_title']) && $_SESSION['swal_title'] != "") {
?>
  <script>
    swal({
      title: "<?php echo $_SESSION['swal_title']; ?>",

      icon: "<?php echo $_SESSION['swal_icon']; ?>",
      button: "Ok, Got it..",

    });
    <?php if (isset($_SESSION['link'])) { ?>
      setTimeout(() => {
        window.location.href = "<?php echo $_SESSION['link']; ?>";
      }, 2000);
    <?php } ?>
  </script>
<?php
  unset($_SESSION['swal_title']);
  unset($_SESSION['swal_icon']);
  unset($_SESSION['link']);
}
?>


        </body>

</html>