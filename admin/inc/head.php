<?php
ob_start();
session_start();
include 'inc/admindb.php';
$name = $_SESSION['name'];
$role = $_SESSION['role'];

mysqli_set_charset($con,  'utf8');

define("base_url", "http://localhost:8080/onnway/admin/");
define("base_url2", "http://localhost:8080/onnway/");

if (!isset($_SESSION['username'])) {
  header('Location:index.php');
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
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-scroller/css/scroller.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-select/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXQZx4qVICTJWyKTXO0Ji28GZjD4Pvavg&callback=initMap&libraries=&v=weekly" defer></script>

  <style>
    .items {
      position: relative;
      width: 100%;
      overflow-x: scroll;
      overflow-y: hidden;
      white-space: nowrap;
      transition: all 0.2s;
      will-change: transform;
      user-select: none;
      cursor: pointer;
    }

    .items.active {
      background: rgba(255, 255, 255, 0.3);
      cursor: grabbing;
      cursor: -webkit-grabbing;
    }
  </style>

  <style>
    .align-center {
      text-align: center;
    }

    .align-right {
      text-align: right;
    }

    .align-left {
      text-align: left;
    }

    * {
      padding: 0px;
      margin: 0px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container2 {
      display: block;
      margin: auto;
      text-align: center;
      width: 100%;
    }

    nav2 {
      background-color: red;
      color: white;
      padding-top: 30px;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
      padding-bottom: 15px;
    }

    td,
    th {
      width: 50%;
      padding: 2px 10px;
    }

    table {
      text-align: center;
      margin: auto;
    }

    .container1 {
      background-color: #f3efe8;
      padding-bottom: 20px;
    }

    .in-row {
      display: flex;
      justify-content: center;
      margin-bottom: 5px;
    }

    .in-box {
      width: 20px;
      height: 20px;
      /* background-color: grey; */
      border-radius: 2px;
      margin: 0px 10px;
    }

    .bgcolor-white {
      background-color: rgba(0, 0, 0, 0.06);
    }

    .bgcolor-grey {
      background-color: #e11f26;
    }

    .box-selected {
      width: 40px;
      height: 40px;
      background-color: rgba(0, 0, 0, 0.06);
      margin: auto;
      margin: 2px;
      border-radius: 4px;
      cursor: pointer;
    }

    .box-select {
      display: flex;
      margin: auto;
      justify-content: center;
    }


    .area {
      display: flex;
      justify-content: center;
    }

    .total {
      padding: 80px 0px;
    }

    .boxes {
      margin-top: 30px;
    }
  </style>

  <style type="text/css">
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
    #map {
      height: 100%;
    }
  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- SEARCH FORM 
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->


        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-th-large"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <b><a href="inc/logout.php" class="dropdown-item dropdown-header">LOG OUT</a></b>
            <div class="dropdown-divider"></div>


          </div>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->
