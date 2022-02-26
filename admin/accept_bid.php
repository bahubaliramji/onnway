<?php
include 'inc/head.php';


?>









<body class="hold-transition skin-red-light sidebar-mini">
  <div class="wrapper">

    <?php include 'inc/header.php'; ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <?php include 'inc/sidebar.php'; ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">

      </section>












      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->

        <div class="content-inner">
          <!-- Page Header-->

          <?php



          date_default_timezone_set("Asia/Kolkata");


          $id = $_GET['oid'];
          $bid = $_GET['aid2'];

          $data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM orders WHERE id = '$id'"));

          $user_id = $data['user_id'];


          $freight = $data['freight'];
          $other_charges = $data['other_charges'];
          $cgst = $data['cgst'];
          $sgst = $data['sgst'];
          $insurance = $data['insurance'];
          $status = $data['status'];
          $truck_type = $data['truck_type'];
          $material = $data['material'];

          $fr = $freight + $other_charges + $cgst + $sgst + $insurance;


          $query4 = mysqli_query($con, "SELECT * FROM trucks WHERE id = '$truck_type'");
          $row4 = mysqli_fetch_array($query4);

          $query5 = mysqli_query($con, "SELECT * FROM tbl_material WHERE id = '$material'");
          $row5 = mysqli_fetch_array($query5);


          $pdata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM loader_profile_tbl WHERE user_id = '$user_id'"));

          $udata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'"));

          ?>
          </br>
          <header class="page-header" style="padding-left: 16px;padding-right: 16px;">
            <div>
              <h2 class="no-margin-bottom">Accept Bid for - ORDER #<?= $id; ?></h2>
            </div>
          </header>






          <!-- Updates Section                                                -->
          <section class="updates no-padding-top">
            <div>
              <div class="row">



                <!-- Daily Feeds -->
                <div class="col-lg-6">
                  <div class="daily-feeds card">
                    <div class="card-body no-padding">


                      <!-- Item-->
                      <div class="item clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between" style="width: 100%;">
                            <div class="content" style="width: inherit;">

                              <h4>Loader Name</h4>
                              <p class="form-control"><?= $pdata['name']; ?></p>

                              <h4>Loader Phone</h4>
                              <p class="form-control"><?= $udata['phone']; ?></p>

                              <h4>Source</h4>
                              <p class="form-control"><?= $data['source']; ?></p>

                              <h4>Destination</h4>
                              <p class="form-control"><?= $data['destination']; ?></p>

                              <h4>Truck Type</h4>
                              <p class="form-control"><?= $row4['type'] . ' - ' . $row4['title']; ?></p>
                              <h4>Schedule Date</h4>
                              <p class="form-control"><?= $data['schedule']; ?></p>
                              <h4>Weight</h4>
                              <p class="form-control"><?= $data['weight']; ?></p>
                              <h4>Material</h4>
                              <p class="form-control"><?= $row5['material_name']; ?></p>


                              <h4>Pickup Address</h4>
                              <p class="form-control"><?= $data['pickup_address'] . ',' . $data['pickup_pincode'] . ',' . $data['pickup_phone'] . ',' . $data['pickup_city']; ?></p>
                              <h4>Drop Address</h4>
                              <p class="form-control"><?= $data['drop_address'] . ',' . $data['drop_pincode'] . ',' . $data['drop_phone'] . ',' . $data['drop_city']; ?></p>
                              <h4>Special Notes</h4>
                              <p class="form-control"><?= $data['remarks']; ?></p>
                              <h4>Status</h4>
                              <p class="form-control"><?= $data['status']; ?></p>
                              <h4>Booking Date</h4>
                              <p class="form-control"><?= $data['created']; ?></p>



                            </div>

                          </div>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-lg-6">
                  <div class="daily-feeds card">
                    <div class="card-body no-padding">


                      <!-- Item-->
                      <div class="item clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between" style="width: 100%;">
                            <div class="content" style="width: inherit;">


                              <div class="box box-primary">
                                <div class="box-header with-border">
                                  <h2 class="box-title">Bid Details</h2>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->

                                <?php

                                $bidquery = mysqli_query($con, "SELECT * FROM bids WHERE id = '$bid'");
                                $brow = mysqli_fetch_array($bidquery);

                                $uuiidd = $brow['user_id'];
                                $bamount = $brow['amount'];
                                $truck_t = $brow['truck_type'];
                                $query41 = mysqli_query($con, "SELECT * FROM trucks WHERE id = '$truck_t'");
                                $row41 = mysqli_fetch_array($query41);

                                $bpdata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM provider_profile_tbl WHERE user_id = '$uuiidd'"));

                                $budata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id = '$uuiidd'"));

                                ?>

                                <?php
                                if (isset($_POST['submit'])) {


                                  $frieght = $_POST['frieght'];
                                  $other = $_POST['other'];
                                  $cgst = $_POST['cgst'];
                                  $sgst = $_POST['sgst'];
                                  $insurance = $_POST['insurance'];


                                  $question_insert = "UPDATE `orders` SET freight = '$frieght', other_charges = '$other', cgst = '$cgst', sgst = '$sgst', insurance = '$insurance', status = 'accepted quote' WHERE id = '$id' ";
                                  if (mysqli_query($con, $question_insert)) {

                                    $bupdate1 = "UPDATE `bids` SET status = 'accepted' WHERE id = '$bid' ";
                                    if (mysqli_query($con, $bupdate1)) {


                                      $row331 = mysqli_query($con, "INSERT INTO loader_count SET quotes = 'read', user_id = '$user_id'");

                                      $bupdate2 = "UPDATE `bids` SET status = 'rejected' WHERE order_id = '$id' AND id != '$bid' ";

                                      if (mysqli_query($con, $bupdate2)) {

                                        $m = "Your bid for Order #" . $id . " has been accepted";

                                        $token = array();

                                        $token = $udata['token'];
                                        //$token = $budata['token'];


                                        $Eresult = array(
                                          "message" => $m,
                                          "image" => "",
                                        );




                                        $url = 'https://fcm.googleapis.com/fcm/send';

                                        $fields = array();
                                        $fields['data'] = $Eresult;

                                        //if(is_array($token)){
                                        $fields['to'] = $token;
                                        $fields['priority'] = 'high';
                                        //}else{
                                        //	$fields['to'] = $token;
                                        //	$fields['priority'] = 'high';
                                        //}

                                        define("GOOGLE_API_KEY", "AAAAqGvFmJM:APA91bGPphPrqejFtYtN5pB21B1aMMFOqBIbb8K5ttTCffiRBYjI0Ifpnf6bDaPYSGwaJ2usTZ805I9OkvNVPy8Bn3BSvC6dK4ZfV3jCgXXNKqbgItemMKgeqtVVCs2QHVi5SCMNwv6X");

                                        $headers = array(
                                          'Content-Type:application/json',
                                          'Authorization: key=' . GOOGLE_API_KEY
                                        );
                                        //print_r($fields);	

                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_URL, $url);
                                        curl_setopt($ch, CURLOPT_POST, true);
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                                        $result = curl_exec($ch);

                                        //echo $result;

                                        if ($result === FALSE) {
                                          die('FCM Send Error: ' . curl_error($ch));
                                        }
                                        curl_close($ch);





                                        header('Location:loader_full_load_bid.php');
                                      }
                                    }
                                  } else {
                                    $error = "Question Hasn't Been Added...";
                                  }
                                }
                                ?>

                                <form role="form" method="post">
                                  <div class="box-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Transporter Name</label>
                                      <input type="text" class="form-control" placeholder="Name" value="<?= $bpdata['name']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Phone</label>
                                      <input type="text" class="form-control" placeholder="Phone" value="<?= $budata['phone']; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Truck Type</label>
                                      <input type="text" class="form-control" placeholder="Phone" value="<?= $row41['type'] . ' - ' . $row41['title']; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Load Passing</label>
                                      <input type="text" class="form-control" placeholder="Phone" value="<?= $brow['load_passing']; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Bid Amount</label>
                                      <input type="number" class="form-control" placeholder="Amount" value="<?= $bamount; ?>" disabled>
                                    </div>


                                    <div class="form-group">
                                      <label for="exampleInputPassword1">New Freight</label>
                                      <input type="number" name="frieght" class="form-control" placeholder="Frieght" required>
                                    </div>


                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Other Charges</label>
                                      <input type="number" name="other" class="form-control" placeholder="Other Charges">
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">CGST</label>
                                      <input type="number" name="cgst" class="form-control" placeholder="CGST">
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">SGST</label>
                                      <input type="number" name="sgst" class="form-control" placeholder="SGST">
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Insurance</label>
                                      <input type="number" name="insurance" class="form-control" placeholder="Insurance">
                                    </div>

                                  </div>
                                  <!-- /.box-body -->

                                  <div class="box-footer">
                                    <button type="submit" name="submit" class="btn btn-block btn-success">ACCEPT BID</button>
                                  </div>
                                </form>
                              </div>






                            </div>

                          </div>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </section>
          <!-- Page Footer-->

        </div>

        <!-- ./col -->

        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->



      </section>
      <!-- /.content -->



    </div>
















    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging': true,
          'lengthChange': false,
          'searching': false,
          'ordering': true,
          'info': true,
          'autoWidth': false
        })
      });

      $("#cancel").click(function() {

        var aid = <?= $id; ?>;
        var aid2 = 'cancelled';

        console.log(aid);

        $.ajax({
          url: 'data.php',
          method: 'post',
          data: 'aid=' + aid + '&aid2=' + aid2
        }).done(function(dd) {

          console.log(dd);

          if (dd == 'success') {
            window.location.replace('loader_full_load_bid.php');
          }


        })


      });

      $("#assign").click(function() {

        var aid = <?= $id; ?>;
        var aid2 = 'assigned for quote';

        //console.log(aid);

        $.ajax({
          url: 'data.php',
          method: 'post',
          data: 'aid=' + aid + '&aid2=' + aid2
        }).done(function(dd) {

          console.log(dd);

          if (dd == 'success') {
            window.location.replace('loader_full_load_bid_order.php?id=' + aid);
          }

          //window.location.replace('loader_full_load_bid_order.php);
          //console.log(sql);


        })


      });
    </script>
  </div>
</body>

</html>