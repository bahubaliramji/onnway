<?php session_start();
//error_reporting(0);
ob_start();
include("controls/define2.php");
include("TBXadmin/include/config.php");
$page_title = "About Us";
$seo_keyword = "About Us";
$seo_content = "About Us";
?>
<?php include("header.php");
include("header-bottom.php");
?>

<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
  <div class="container">
    <div class="col-md-12">
      <div class="breadcrumb-section register">
        <ul>
          <li class="login-style"><a href="#"> <img src="<?php echo base_url; ?>images/home.png"></a></li>
          <li><a href="#" class="bred-active"> About us </a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!--END OF BREADCRUMB-->
<section class="about-us-section-top">
  <div class="container">
    <div class="col-md-1">

    </div>
    <div class="col-md-10 about-us-style">
      <?php
      $sql8 = "SELECT * FROM aboutus";
      $res8 = mysqli_query($dbhandle, $sql8);
      foreach ($res8 as $category) {
      ?>
      <H3>ABOUT <span class="transport-text-style"> US </span></H3>
        <div class="about-content">
          <p><?php echo $category['a_text']; ?></p>

        </div>


        <p class="p-margin">&nbsp;</p>
        
        <?php } ?>
    </div>


  </div>
</section>

<!--START OF LOGIN SECTION-->

<!--END OF LOGIN SECTION-->



<?php include("footer.php"); ?>
<script src="<?php echo base_url; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript"> </script>
<?php include 'validation.php'; ?>
</body>

</html>