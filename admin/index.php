<?php
session_start();
include 'inc/admindb.php';


mysqli_set_charset($con,  'utf8');

define("base_url", "http://localhost:8080/onnway/admin");

if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == 'admin') {
        header('Location:dashboard.php');
    } else if ($_SESSION['role'] == 'brand') {
        header('Location:dashboard2.php');
    } else if ($_SESSION['role'] == 'officer') {
        header('Location:dashboard3.php');
    }
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_username = "SELECT * FROM tbl_admin WHERE email = '$username' AND password='$password'";
    $check_username_run = mysqli_query($con, $check_username);
    if (mysqli_num_rows($check_username_run) > 0) {
        $row = mysqli_fetch_array($check_username_run);




        $db_name = $row['username'];
        $db_username = $row['email'];
        $db_password = $row['password'];


        if ($username == $db_username && $password == $db_password) {
            header('Location:dashboard.php');
            $_SESSION['name'] = $db_name;
            $_SESSION['username'] = $db_username;
            $_SESSION['role'] = $db_role;
        } else {
            $error = '<label>Invalid username or password</label>';
        }
    } else {
        $error = "<label>Invalid username or password</label>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Onnway Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url; ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url; ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url; ?>/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="<?= base_url . '/upload/logo.png'; ?>" style="width: 100%;"></img>
        </div>
        <!-- /.login-logo -->
        <div class="card">


            <?php
            if (isset($error)) {
            ?>
                <div class="card-header">
                    <h3 class="card-title" style="color: red;">
                        <?= $error; ?>
                    </h3>
                </div><!-- /.card-header -->

            <?php
            }
            ?>


            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
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
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-danger btn-block">Sign In</button>
                        </div>
                        </br>
                        </br>
                        <div class="col-12">
                            <a href="index2.php" class="btn btn-block btn-primary">
                                Employee Login
                            </a>
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
    <script src="<?= base_url; ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url; ?>/dist/js/adminlte.min.js"></script>

</body>

</html>
