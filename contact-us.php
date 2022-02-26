<?php session_start();
//error_reporting(0);
ob_start();
include("controls/define2.php");
include("TBXadmin/include/config.php");
$page_title = "Contact Us";
$seo_keyword = "Contact Us";
$seo_content = "Contact Us";

include("header.php");
include("header-bottom.php");

if (isset($_POST['submit'])) {
    $c_mobile = $_POST['c_mobile'];
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_message = $_POST['c_message'];

    $insertquery = "INSERT INTO contact(c_mobile,c_name,c_email,c_message) VALUES('$c_mobile','$c_name', '$c_email', '$c_message')";


    $res = mysqli_query($dbhandle, $insertquery);


    if ($res == true) {
        $_SESSION['title'] = "Request Send";
        $_SESSION['icon'] = "success";
        $_SESSION['link'] = "contact.php";
    } else {
        $_SESSION['title'] = "Request Not Send!";
        $_SESSION['icon'] = "error";
    }
}






?>
<!--'".$name."','".$email."','".$phone."','".$comments."'end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
    <div class="container">
        <div class="col-md-12 mobile-zero-padding">
            <div class="breadcrumb-section register">
                <ul>
                <li class="login-style"><a href="#"> <img src="<?php echo base_url; ?>images/home.png"></a></li>
                    <li><a href="#" class="bred-active"> Contact us </a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--END OF BREADCRUMB-->
<section class="contact-us-style">
    <div class="container mobile-zero-padding">
        <div class="col-md-4 col-sm-6 col-xs-12 ">
            <div class="col-md-12 contact-us-section">
                <h4> Contact Us </h4>
                <div class="contact-address">
                    <h5> Address </h5>
                    <p><?php if (isset($results[6][2])) {
                            echo $results[6][2];
                        } ?></p>
                </div>

                <div class="contact-address">
                    <h5> Phone No. </h5>
                    <p>+<?php if (isset($results[0][2])) {
                            echo $results[0][2];
                        } ?></p>
                    <p>+<?php if (isset($results[3][2])) {
                            echo $results[3][2];
                        } ?> </p>
                </div>

                <div class="contact-address">
                    <h5> Email Address </h5>
                    <p><?php if (isset($results[4][2])) {
                            echo $results[4][2];
                        } ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="col-md-12 drop-us-query-style">
                <h3>Drop Us Your Query</h3>
                <form action="" method="post">
                    <div class="form-of-your-querry">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Full Name <span class="star-color"> * </span> </label>
                                <input type="text" name="c_name" class="form-control" id="c_name" placeholder="Enter Your Fullname">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Email ID <span class="star-color"> * </span> </label>
                                <input type="email" name="c_email" class="form-control" id="c_email" placeholder="Enter Your Email ID ">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label> Phone <span class="star-color"> * </span> </label>
                                <input type="text" name="c_mobile" id="c_mobile" class="form-control" maxlength="10" placeholder="Enter Your Phone Number">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label> Comments <span class="star-color"> * </span> </label>
                                <textarea class="c_message" id="contact_c_message" rows="4" name="c_message"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="edit-btn-of-contact-us">SUBMIT</button>
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
<script src="<?php echo base_url; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript"> </script>
<script type="text/javascript">
    /* <![CDATA[ */
    jQuery(function() {
        jQuery("#contact_name").validate({
            expression: "if (VAL) return true; else return false;",
            message: "Please enter Your Name"
        });



        jQuery("#contact_phone").validate({
            expression: "if (VAL.length > 9 && VAL.match(/^[0-9]*$/)) return true; else return false;",
            message: "Please enter valid 10 digit mobile no"
        });
        jQuery("#contact_comments").validate({
            expression: "if (VAL) return true; else return false;",
            message: "Please enter Comments"
        });

        jQuery("#contact_email").validate({

            expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",

            message: "Please enter a valid Email ID"

        });





    });
    /* ]]> */
</script>
<?php include 'validation.php'; ?>
</body>

</html>