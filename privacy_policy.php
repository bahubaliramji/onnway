<?php session_start();
//error_reporting(0);
ob_start();
include("controls/define2.php");
include("TBXadmin/include/config.php");
$page_title = "Privacy Policy";
$seo_keyword = "Privacy Policy";
$seo_content = "Privacy Policy";
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
          <li><a href="#" class="bred-active">Privacy Policy
            </a></li>
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
      <h3>Privacy <span class="transport-text-style"> Policy </span></h3><br><br>
      <?php
          $sql9 = "SELECT * FROM termscondition";
          $res9 = mysqli_query($dbhandle, $sql9);
          foreach ($res9 as $category) {
            echo ''.$category['privacy_desc'].'';
          }
          ?>
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