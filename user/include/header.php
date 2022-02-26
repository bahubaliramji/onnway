<?php
session_start();

if(isset($_SESSION['token'])){
  $token = $_SESSION['token'];
   //echo "$token";
}
else{
echo "<script>location.href = '../index.php';</script>";
}

function new_file_name($filename){
  $extention = pathinfo($filename,PATHINFO_EXTENSION);
  $randomno = rand(0,100000);
  $rename='upload'.date('Ymd').$randomno;
  return $rename.'.'.$extention;
}

include("../controls/define2.php");
include("../TBXadmin/include/config.php");
?>

<!DOCTYPE html>

<html>

<head>

  <title><?php echo $page_title; ?></title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:url" content="<?php echo $url_gm; ?>">
  <meta property="og:title" content="<?php echo $page_title; ?>">
  <meta property="og:description" content="<?php echo $seo_content; ?>">
  <meta name="keywords" content="<?php echo $seo_keyword; ?>" />
  <meta name="description" content="<?php echo $seo_content; ?>">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <link rel="stylesheet" type="text/css" href="../css/login-popup.css">



  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 

</head>

<body>

  <header>

    <div class="container">
      <div class="col-md-3 col-sm-3 col-xs-12 logo">
        <a href="../index.php"><img src="../images/logo.png"></a>
      </div>

      <div class="col-md-9 col-sm-9 col-xs-12 header-top-right">
        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-12 padding-mob">
            <a href="#"><span class="down-app"><img src="../images/mobile.png"> &nbsp; <span class="dwn-app-txt">Download App</span></span></a>

            <span class="phone-contact"><img src="../images/phone.png"> <span class="mobile-no-span">&nbsp;</span>+91 91111 92233</span>
          </div>
            <span class="login-part pull-right">
              <span class="login-section"><a href="index.php">My Account</a></span>
              <span>|</span>
              <span class="login-section"><a href="../logout.php">LOGOUT</a></span>
            </span>
  
        </div>
      </div>
    </div>

  </header>

  <header class="header-bottom">

	<div class="container">

		<div class="col-md-5 col-sm-6 col-xs-7 header-bottom-right-text padding-zero-mob">

			<h3><a href="index.php">SERVICES</a>&nbsp; <span class="nbsp">&nbsp; &nbsp; &nbsp;</span><?php if (isset($_SESSION['vehicle_id']) == "") { ?>|&nbsp; <span class="nbsp">&nbsp; &nbsp; &nbsp;</span><a <?php if (isset($_SESSION['user_id'])) {
																																																					echo "href='order-list.php'";
																																																				} else { ?> data-toggle="modal" data-target="#myModal" <?php } ?>>TRACK & TRACE</a><?php } ?></h3>

		</div>



		<!-- <div class="col-md-7 col-sm-6 col-xs-5  padding-zero-mob">

			<div class="header-bottom-right-section">

      <?php if ($_SESSION['token'] == '') { ?>

		<a data-toggle="modal" data-target="#myModalv">	<button type="button" class="tab-style">POST A TRUCK</button></a>

  <?php } else { ?>  <a href="vehicle-registration-4.php"  >  <button class="tab-style">POST A TRUCK</button></a>

       <?php  }  ?>

		</div>

		

		</div> -->

	</div>

</header>

 