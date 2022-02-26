<?php session_start();
include('include/config.php');
$type = $_SESSION['type'];
$sidepage = 'dashboard';
if ($_SESSION['user_id'] == '') {
  header('location:index.php');
}
?>
<html>

<head>
  <title>Technobrix | Dashboard</title>
  <?php include('include/head.php');


  //auto update expire 


  $allsql = mysqli_query($dbhandle, "select * from tbl_book_load where expire_status='0'");

  while ($rowss = mysqli_fetch_assoc($allsql)) {

    $dates = strtotime($rowss['booking_date']);

    $str7days = strtotime("+7 day", $dates);
    $current = strtotime("now");


    if ($current > $str7days) {
      mysqli_query($dbhandle, "update tbl_book_load  set expire_status='1' where id='" . $rowss['id'] . "' ");
    }
  }





  ?>

  <style>
    th,
    td {
      text-align: center;
    }

    .info-box small {
      font-size: 14px;
      color: red;
    }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include('include/header.php'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include('include/sidebar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 629px;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>


      <?php
      $newl = mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_loader where news=0"));

      $new = mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_vehicle_owner where news=0"));
      $newdriver = mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_vehicle_owner where news=0 and vehicle_owner_type='driver'"));
      $newowner = mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_vehicle_owner where news=0  and vehicle_owner_type='owner'"));
      $newtransporter = mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_vehicle_owner where news=0 and vehicle_owner_type='transporter'"));

      ?>


      <!-- Main content -->
      <section class="content">
        <!-- Info boxes -->
        <div class="row">
          <a href="loader.php?type=industry">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Loader User</span>
                  <span class="info-box-number"><?php echo mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_loader")); ?>

                    <small><?php echo $newl . ' New '; ?></small></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </a>

          <!-- /.col -->
          <a href="vehicle-owner.php">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Vehicle Owner</span>
                  <span class="info-box-number"><?php echo mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_vehicle_owner where vehicle_owner_type='owner'")); ?> <small><?php echo $newowner . ' New '; ?></small></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </a>
          <!-- /.col -->
          <?php
          $newb = mysqli_num_rows(mysqli_query($dbhandle, "select * from  tbl_book_load where news=0"));

          ?>

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>
          <a href="bookload.php">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Booking</span>
                  <span class="info-box-number"><?php echo mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_book_load ")); ?>

                    <small><?php echo $newb . ' New '; ?></small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </a>
          <!-- /.col -->

          <!-- /.col -->
          <a href="vehicle-driver.php">

            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Vehicle Driver</span>
                  <span class="info-box-number"><?php echo mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_vehicle_owner where vehicle_owner_type='driver'")); ?> <small><?php echo $newdriver . ' New '; ?></small></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

          </a>


          <!-- /.col -->
          <a href="vehicle-transporter.php">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Transporter</span>
                  <span class="info-box-number"><?php echo mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_vehicle_owner where vehicle_owner_type='transporter'")); ?> <small><?php echo $newtransporter . ' New '; ?></small></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </a>

          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- MAP & BOX PANE -->

            <!-- /.box -->
            <div class="row">
              <div class="col-md-6">
                <!-- DIRECT CHAT -->
              </div>
              <!-- /.col -->

              <div class="col-md-6">
                <!-- USERS LIST -->

                <!--/.box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Latest Booking</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                      <tr>
                        <th>Booking ID</th>
                        <th></th>
                        <th>Status</th>
                        <th>Popularity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                        <td></td>
                        <td><span class="label label-success">Shipped</span></td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                        <td></td>
                        <td><span class="label label-warning">Pending</span></td>
                        <td>
                          <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                        <td></td>
                        <td><span class="label label-danger">Delivered</span></td>
                        <td>
                          <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                        <td></td>
                        <td><span class="label label-info">Processing</span></td>
                        <td>
                          <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                        <td></td>
                        <td><span class="label label-warning">Pending</span></td>
                        <td>
                          <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                        <td></td>
                        <td><span class="label label-danger">Delivered</span></td>
                        <td>
                          <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                        <td></td>
                        <td><span class="label label-success">Shipped</span></td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
              <!--<div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>-->
              <!-- /.box-footer -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->


          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">

      </div>
      <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </footer>

    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 2.2.3 -->
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.6 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="plugins/morris/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/knob/jquery.knob.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/app.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>

</html>