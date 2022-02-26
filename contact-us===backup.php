<?php session_start();		//error_reporting(0);		ob_start(); include("controls/define.php");  include("TBXadmin/include/config.php");   $url_gm='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(isset($_POST['submit'])){
    $name = $_POST["name"];
     $phone = $_POST["phone"];
    $email = $_POST["email"];
    $comments = $_POST["comments"];
   $query = mysql_query("Insert INTO tbl_contact_us(name,email,phone,comments)VALUE('".$name."','".$email."','".$phone."','".$comments."')");
  
 

 
 }
 include("header.php");

 ?>
<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
<div class="container">
<div class="col-md-12">
  <div class="breadcrumb-section register">
    <ul>
       <li class="login-style"><a href="<?php echo base_url ; ?>"> Home </a></li>
       <li><a  class="bred-active"> Contract us </a></li>
    </ul>
  </div>
  </div>
</div>
</section>
<!--END OF BREADCRUMB-->
<section class="contact-us-style">
   <div class="container">
      <div class="col-md-4 ">
<div class="col-md-12 contact-us-section">
          <h4> Contact Us </h4>
          <div class="contact-address">
             <h5> Address </h5>
             <p>XXX, XXX, XXXXX,</p>
             <p>XXXXXX, XXXXXXXXX, XXXXXX</p>
             <p>XXXXXXXXXXXXXXXXXXXXXXXXX</p>
          </div>

          <div class="contact-address">
             <h5> Phone No. </h5>
             <p>XXX, XXX, XXXXX,</p>
          </div>

          <div class="contact-address">
             <h5> Email Address </h5>
             <p>XXX, XXX, XXXXX,</p>
          </div>
           </div>
      </div>

      <div class="col-md-8">
          <div class="col-md-12 drop-us-query-style">
            <h3>Drop Us Your Querry</h3>
            <form >
            <div class="form-of-your-querry">
                <div class="row">
                   <div class="col-md-12">
                       <label>Full Name <span class="star-color"> * </span> </label>
                       <input type="text" name="name" class="form-control" placeholder="Amit Soni">
                   </div>
                </div>

                <div class="row">
                   <div class="col-md-12">
                       <label>Email ID <span class="star-color"> * </span> </label>
                       <input type="email" name="email" class="form-control" placeholder="test@technorbrix.com">
                   </div>
                </div>

                <div class="row">
                   <div class="col-md-12">
                       <label> Phone <span class="star-color"> * </span> </label>
                       <input type="text" name="phone" class="form-control" placeholder="+91 989 877 7777">
                   </div>
                </div>

                  <div class="row">
                   <div class="col-md-12">
                       <label> Comments <span class="star-color"> * </span> </label>
                       <textarea class="comments" id="exampleTextarea" rows="4"></textarea>
                   </div>
                </div>

                  <div class="row">
                   <div class="col-md-12">
                       <button type="button" name="submit" class="edit-btn-of-contact-us">EDIT</button>
                   </div>
                </div>

            </div>
          </form>
          </div>
      </div>

   </div>
</section>

<!--START OF LOGIN SECTION-->

<!--END OF LOGIN SECTION-->




<?php include("footer.php"); ?>
</body>
</html>