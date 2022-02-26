<?php
if(isset($_GET['msg']))
{
    $message = "invalid username or password";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>
<html >
<head>
  <meta charset="UTF-8">
  <title>ADMIN | ONNWAY</title>
  
  
  
      <link rel="stylesheet" href="login-css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  

<style>
html,body {
  height: 100%;
}

body.my-login-page {
  background-color: #f7f9fb;
  font-size: 14px;
}

.my-login-page .brand {
  width: 100px;
  height: 100px;
  
  border-radius: 0%;
  margin: 0 auto;
  margin: 40px auto;
  box-shadow: 0 4px 8px rgba(0,0,0,.05);
  position: relative;
  z-index: 1;
}

.my-login-page .brand img {
  width: 100%;
}

.my-login-page .card-wrapper {
  width: 400px;
}

.my-login-page .card {
  border-color: transparent;
  box-shadow: 0 4px 8px rgba(0,0,0,.05);
}

.my-login-page .card.fat {
  padding: 10px;
}

.my-login-page .card .card-title {
  margin-bottom: 30px;
}

.my-login-page .form-control {
  border-width: 2.3px;
}

.my-login-page .form-group label {
  width: 100%;
}

.my-login-page .btn.btn-block {
  padding: 12px 10px;
}

.my-login-page .footer {
  margin: 40px 0;
  color: #888;
  text-align: center;
}

@media screen and (max-width: 425px) {
  .my-login-page .card-wrapper {
    width: 90%;
    margin: 0 auto;
  }
}

@media screen and (max-width: 320px) {
  .my-login-page .card.fat {
    padding: 0;
  }

  .my-login-page .card.fat .card-body {
      border-radius: 3%;
    padding: 15px;
  }
}
#logerror {
    text-align: center;
    border: 1px solid #5f9dec;
    background-color: #5f9dec;
    color: #ea1818;
}

</style>
</head>
<body class="my-login-page" style="background-image: url('background.jpg');  background-size:     cover;                      /* <------ */
    background-repeat:   no-repeat;
    background-position: center center; ">
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-md-center h-100">
        <div class="card-wrapper">
          <div class="brand">
            <img src="logo.png" alt="logo">
          </div>
          <div class="card fat">
            <div class="card-body">
              <h4 class="card-title">Login</h4>
              <form method="POST" class="my-login-validation" novalidate="" action="login.php">
                <div class="form-group">
                  <label for="email">USER ID</label>
                  <input id="email" class="form-control" type="email" name="email" required="" placeholder="Email"required autofocus>
                </div>

                <div class="form-group">
                  <label for="password">Password
                   
                  </label>
                  <input id="password" type="password" class="form-control" name="password" required data-eye>
                    
                </div>
                <div class="form-group m-0">
                  <button type="submit" class="btn btn-primary btn-block">
                    Login
                  </button>
                </div>
                
              </form>
            </div>
          </div>
          <div class="footer">
           
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/my-login.js"></script>
</body>
</html>
