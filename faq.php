<?php session_start();
//error_reporting(0);
ob_start();
include("controls/define2.php");
include("TBXadmin/include/config.php");
$page_title = "Faq";
$seo_keyword = "Faq";
$seo_content = "Faq";
?>
<?php include("header.php");
include("header-bottom.php"); ?>

<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
  <div class="container">
    <div class="col-md-12 mobile-zero-padding">
      <div class="breadcrumb-section register">
        <ul>
          <li class="login-style"><a href="#"> <img src="<?php echo base_url; ?>images/home.png"> </a></li>
          <li><a href="#" class="bred-active"> Faq </a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!--END OF BREADCRUMB-->
<section class="fsq-accordian">
  <div class="container mobile-zero-padding">
    <div class="col-md-2">

    </div>
    <div class="col-md-8 accordion-style">

      <div class="panel-group" id="accordion">
        <div class="accordion-container">
          <?php
          $sql9 = "SELECT * FROM faq";
          $res9 = mysqli_query($dbhandle, $sql9);
          foreach ($res9 as $category) {
          ?>
          <div class="set">
            <a href="#">
            <?= $category['f_ques']; ?>
              <i class="fa fa-plus"></i>
            </a>
            <div class="content">
              <p><?= $category['f_ans']; ?>
              </p>
            </div>
          </div>
          <?php } ?>
        </div>


      </div>
      <div class="col-md-2">

      </div>
    </div>
</section>

<!--START OF LOGIN SECTION-->

<!--END OF LOGIN SECTION-->
<script type="text/javascript">
  $(document).ready(function() {
    $(".set > a").on("click", function() {
      if ($(this).hasClass('active')) {
        $(this).removeClass("active");
        $(this).siblings('.content').slideUp(200);
        $(".set > a i").removeClass("fa-minus").addClass("fa-plus");
      } else {
        $(".set > a i").removeClass("fa-minus").addClass("fa-plus");
        $(this).find("i").removeClass("fa-plus").addClass("fa-minus");
        $(".set > a").removeClass("active");
        $(this).addClass("active");
        $('.content').slideUp(200);
        $(this).siblings('.content').slideDown(200);
      }

    });
  });
</script>


<?php include("footer.php"); ?> <script src="<?php echo base_url; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript"> </script> <?php include 'validation.php'; ?>

</body>

</html>