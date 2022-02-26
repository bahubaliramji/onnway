<?php
include('include/config.php');
session_start();

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  //print_r($email);
  $password = $_POST['password'];
  //echo "SELECT * FROM tbl_admin WHERE email = '".$email."' AND password = '".$password."' AND status = '1'";
  $data_login = mysqli_query($dbhandle, "SELECT * FROM tbl_admin WHERE email = '" . $email . "' AND password = '" . $password . "' AND status = '1'");
  $login_count = mysqli_num_rows($data_login);
  //print_r($login_count);
  if ($login_count == 1) {
    $data_fetch = mysqli_fetch_array($data_login);


    $_SESSION['user_id'] = $data_fetch['id'];
    $_SESSION['username'] = $data_fetch['username'];
    $_SESSION['email'] = $data_fetch['email'];
    $_SESSION['type'] = $data_fetch['type'];
    $_SESSION['user_log'] = TRUE;
    header('location:dashboard.php');
  } else {
    $message = 'Login Detail invalid';
  }
}


?>
<?php
/*include('include/config.php');
session_start();

if (isset($_POST['login'])){
        
  $email = stripslashes($_REQUEST['email']);
        
  $email = mysqli_real_escape_string($con,$email);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($con,$password);
  
        $query = "SELECT * FROM tbl_admin WHERE email='$email'
and password='$password'";
  $result = mysqli_query($con,$query) or die(mysqli_error());
  $rows = mysqli_num_rows($result);
        if($rows==1){
      $_SESSION['email'] = $email;
            // Redirect user to index.php
      header("Location: dashboard.php");
         }else{
  echo "
Username/password is incorrect
";
  }
    }*/
?>
<html>

<head>
  <meta charset="UTF-8">
  <title>Login|Technobrix</title>



  <link rel="stylesheet" href="login-css/style.css">


</head>
<style>
  #logerror {
    text-align: center;
    border: 1px solid #5f9dec;
    background-color: #5f9dec;
    color: #ea1818;
  }
</style>

<body>
  <div class="login">
    <?php if (!empty($message)) { ?>
      <p id="logerror"><?= $message; ?></p>
    <?php } ?>
    <div class="login-triangle"></div>

    <h2 class="login-header">Log in</h2>


    <form class="login-container" action="" method="POST">
      <p><input type="email" name="email" required="" placeholder="Email"></p>
      <p><input type="password" name="password" required="" placeholder="Password"></p>
      <p><input type="submit" name="login" value="Log in"></p>
    </form>
  </div>


</body>

</html>