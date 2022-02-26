<?php
session_start();
  include'inc/db.php';
  if(isset($_SESSION['username']))
  {
    if($_SESSION['role'] == 'admin')
	  {
		 header('Location:dashboard.php'); 
	  }
	  else if($_SESSION['role'] == 'brand')
	  {
		  header('Location:dashboard2.php');
	  }
	  else if($_SESSION['role'] == 'officer')
	  {
		  header('Location:dashboard3.php');
	  }
  }

  if(isset($_POST['submit']))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_username = "SELECT * FROM survey_officer WHERE username = '$username' AND password='$password'"; 
    $check_username_run = mysqli_query($con,$check_username);
    if(mysqli_num_rows($check_username_run) > 0)
    {
      $row = mysqli_fetch_array($check_username_run);


      $id = $row['id'];
      $db_username = $row['username'];
      $name = $row['name'];
      $pin = $row['password'];


	if($username == $db_username && $password == $pin)
      {
        header('Location:dashboard3.php');
        $_SESSION['name'] = $name;
        $_SESSION['username'] = $db_username;
        $_SESSION['id'] = $id;
		$_SESSION['role'] = 'officer';
      }
      else
      {
        $error = '<label>Invalid phone or PIN</label>';
      }


      
    }
    else
    {
      $error = "<label>Invalid phone or PIN</label>";
    }  
	
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Workers Joint</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>Workers Joint</b> Verifying Officer</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
