<?php 	
	session_start();
	error_reporting(0);
	include("../controls/define.php"); 
	include("../admin/inc/db.php");
	?>
<html>
    <head>
        <title>
            Transport form
        </title>
         <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta property="og:url" content="<?php echo $url_gm ; ?>"> 
<meta property="og:title" content="<?php echo $page_title ; ?>">
<meta property="og:description" content="<?php echo $seo_content ; ?>"> 
<meta name="keywords" content="<?php echo $seo_keyword ; ?>" />
<meta name="description" content="<?php echo $seo_content ; ?>"> 

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="css/style.css">

  <link rel="stylesheet" type="text/css" href="css/login-popup.css">

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    .container-contact100 {
  width: 100%;  
  min-height: 10vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  background: #e6e6e6;
  
}

.wrap-contact100 {
  width: 620px;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  padding: 62px 55px 90px 55px;
}
#loginv{

	z-index: 55;
    left:40%;
	opacity:2;

	position: relative;

    bottom: 34px;

    outline: none;
    position: absolute;

	top: 0px;
	height: 40%;

	width: 30%;	

	padding: 20px 5px 25px 5px;

	background: #ffffff;

	border: 1px solid rgba(147, 184, 189,0.8);

		 border-radius: 8px;

	
}
}

</style>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data" action="ongoingorderprovider.php">
                <input type="text" name="mobile_no">
            <input type="submit" value="Upload">
        </form>
    </body>
</html>
<?php
    $files=scandir("Uploads");
    $mobile_no="8770341360";
    $doc_type="driving_front";
    $c=count($files);
    echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png';
    
    
        ?>
        <a href='Uploads/<?php echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png'; ?>'>dl.front</a><?php
    
?>