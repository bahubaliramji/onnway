<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['del'])) {
  $del_id = $_GET['del'];
  $del_query = "DELETE FROM `trucks` WHERE `trucks`.`id` = '$del_id'";
  if (mysqli_query($con, $del_query)) {
    $msg = "Truck Has Been Deleted";
  } else {
    $error = "Truck Hasn't Been Deleted";
  }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <?php



        date_default_timezone_set("Asia/Kolkata");


        $id = $_GET['id'];

        $data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM orders WHERE id = '$id'"));

        $user_id = $data['user_id'];

        $loadtype = $data['laod_type'];

        $freight = (int)$data['freight'];
        $other_charges = (int)$data['other_charges'];
        $cgst = (int)$data['cgst'];
        $sgst = (int)$data['sgst'];
        $insurance = (int)$data['insurance'];
        $discount = (int)$data['discount'];
        $discvalue = ($discount / 100) * $freight;
        $insurance_used = $data['insurance_used'];
        $pvalue = (int)$data['pvalue'];
        $status = $data['status'];
        $truck_type = $data['truck_type'];
        $material = $data['material'];

        $destinationLAT = $data['destinationLAT'];
        $destinationLNG = $data['destinationLNG'];
        $sourceLAT = $data['sourceLAT'];
        $sourceLNG = $data['sourceLNG'];

        $query41 = mysqli_query($con, "SELECT * FROM delivery_logs WHERE order_id = '$id'");
        $row41 = mysqli_fetch_array($query41);

        if (isset($row41['lat'])) {
          $deliverylat = $row41['lat'];
          $deliverylng = $row41['lng'];
        }

        if ($insurance_used == 'yes') {
          $fr = $freight + $other_charges + $cgst + $sgst + $insurance - $pvalue - $discvalue;
        } else {
          $fr = $freight + $other_charges + $cgst + $sgst - $pvalue - $discvalue;
        }

        $query4 = mysqli_query($con, "SELECT * FROM trucks WHERE id = '$truck_type'");
        $row4 = mysqli_fetch_array($query4);

        $query5 = mysqli_query($con, "SELECT * FROM tbl_material WHERE id = '$material'");
        $row5 = mysqli_fetch_array($query5);


        $pdata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM loader_profile_tbl WHERE user_id = '$user_id'"));

        $udata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'"));

        ?>

        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Load Enquiry - Order #<?= $id; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Load Enquiry - Order #<?= $id; ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="row">



            <!-- Daily Feeds -->
            <div class="col-lg-4">


              <div class="card">

                <div class="card-header">
                  <h3 class="card-title">
                    Loading Details
                  </h3>
                </div>

                <div class="card-header">
                  <h3 class="card-title">
                    <a class="btn btn-primary" href="edit_order.php?edit=<?= $id; ?>">EDIT</a>
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <dl class="row">
                    <dt class="col-sm-4">Loader Name</dt>
                    <dd class="col-sm-8"><?= $pdata['name']; ?></dd>

                    <dt class="col-sm-4">Loader Phone</dt>
                    <dd class="col-sm-8"><?= $udata['phone']; ?></dd>

                    <dt class="col-sm-4">Truck Type</dt>


                    <dd class="col-sm-8"><?php
                                          if (isset($row4['type']) && isset($row4['title'])) {
                                            $trucks = $row4['type'] . ' - ' . $row4['title'];
                                            echo $trucks;
                                          } else {
                                            $trucks = '-';
                                            echo $trucks;
                                          } ?></dd>

                    <dt class="col-sm-4">Source</dt>
                    <dd class="col-sm-8"><?= $data['source']; ?></dd>

                    <dt class="col-sm-4">Source Location</dt>
                    <dd class="col-sm-8">

                      <iframe src="https://maps.google.com/maps?q=<?= $sourceLAT; ?>,<?= $sourceLNG; ?>&hl=en&z=14&amp;output=embed" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>

                    </dd>



                    <dt class="col-sm-4">Destination</dt>
                    <dd class="col-sm-8"><?= $data['destination']; ?></dd>

                    <dt class="col-sm-4">Destination Location</dt>
                    <dd class="col-sm-8">

                      <iframe src="https://maps.google.com/maps?q=<?= $destinationLAT; ?>,<?= $destinationLNG; ?>&hl=en&z=14&amp;output=embed" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>

                    </dd>

                    <dt class="col-sm-4">Material</dt>
                    <dd class="col-sm-8"><?= $row5['material_name']; ?></dd>

                    <dt class="col-sm-4">Weight</dt>
                    <dd class="col-sm-8"><?= $data['weight']; ?></dd>

                    <dt class="col-sm-4">Schedule Date</dt>
                    <dd class="col-sm-8"><?= $data['schedule']; ?></dd>



                    <dt class="col-sm-4">Special Notes</dt>
                    <dd class="col-sm-8"><?= $data['remarks']; ?></dd>

                    <dt class="col-sm-4">Pickup Address</dt>
                    <dd class="col-sm-8"><?= $data['pickup_address'] . ',' . $data['pickup_pincode'] . ',' . $data['pickup_phone'] . ',' . $data['pickup_city']; ?></dd>

                    <dt class="col-sm-4">Drop Address</dt>
                    <dd class="col-sm-8"><?= $data['drop_address'] . ',' . $data['drop_pincode'] . ',' . $data['drop_phone'] . ',' . $data['drop_city']; ?></dd>

                    <dt class="col-sm-4">Status</dt>
                    <dd class="col-sm-8"><?= $data['status']; ?></dd>

                    <dt class="col-sm-4">Booking Date</dt>
                    <dd class="col-sm-8"><?= $data['created']; ?></dd>


                  </dl>
                </div>
                <!-- /.card-body -->
              </div>


              <div class="card">

                <div class="card-header">
                  <h3 class="card-title">
                    Freight Details
                  </h3>
                </div>

                <div class="card-header">
                  <h3 class="card-title">
                    <a class="btn btn-primary" href="edit_frieght.php?edit=<?= $id; ?>">EDIT</a>
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <dl class="row">

                    <?php
                    if (isset($data['bid_id'])) {
                      $bid_id = $data['bid_id'];
                      if ($bid_id) {

                        $biddata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM bids WHERE id = '$bid_id'"));

                    ?>

                        <dt class="col-sm-4">Bidded Amount</dt>
                        <dd class="col-sm-8">₹<?= $biddata['amount']; ?></dd>
                    <?php
                      }
                    }
                    ?>



                    <dt class="col-sm-4">Freight</dt>
                    <dd class="col-sm-8">₹<?= $data['freight']; ?></dd>

                    <dt class="col-sm-4">Other Charges</dt>
                    <dd class="col-sm-8">₹<?= $data['other_charges']; ?></dd>

                    <dt class="col-sm-4">CGST</dt>
                    <dd class="col-sm-8">₹<?= $data['cgst']; ?></dd>

                    <dt class="col-sm-4">SGST</dt>
                    <dd class="col-sm-8">₹<?= $data['sgst']; ?>
                    </dd>

                    <dt class="col-sm-4">Insurance</dt>
                    <dd class="col-sm-8">₹<?= $data['insurance']; ?></dd>

                    <dt class="col-sm-4">Discount (<?= $data['discount']; ?>%)</dt>
                    <dd class="col-sm-8"><?= $discvalue; ?></dd>



                    <?php
                    $promo_code = $data['promo_code'];
                    if ($promo_code) {
                    ?>
                      <dt class="col-sm-4">Offer Code Discount</dt>
                      <dd class="col-sm-8">₹<?= $pvalue; ?></dd>
                    <?php
                    }
                    ?>

                    <dt class="col-sm-4">Payable Freight</dt>
                    <dd class="col-sm-8">₹<?= $fr; ?></dd>

                    <dt class="col-sm-4">Paid Percentage</dt>
                    <dd class="col-sm-8"><?= $data['paid_percent']; ?> %</dd>

                    <dt class="col-sm-4">Paid Amount</dt>
                    <dd class="col-sm-8">₹<?= $data['paid_amount']; ?></dd>

                    <dt class="col-sm-4">Balance Amount</dt>
                    <dd class="col-sm-8">₹<?= $fr - $data['paid_amount']; ?></dd>

                  </dl>
                </div>
                <!-- /.card-body -->
              </div>



            </div>


            <div class="col-lg-8">



              <?php
              if ($status == "placed") {
              ?>

                <div class="daily-feeds card">
                  <div class="card-body no-padding">


                    <!-- Item-->
                    <div class="item clearfix">
                      <div class="feed d-flex justify-content-between">
                        <div class="feed-body d-flex justify-content-between" style="width: 100%;">
                          <div class="content" style="width: inherit;">


                            <button type="button" id="cancel" class="btn btn-block btn-danger">CANCEL BOOKING</button>
                            <h2>Posted Trucks</h2>

                            <div class="box-body">
                              <table id="example2" class="table table-bordered table-striped nowrap">
                                <thead>
                                  <tr>

                                    <th>S. No.</th>
                                    <th>Name</th>
                                    <th>Truck ID</th>
                                    <th>Phone</th>
                                    <th>Source</th>
                                    <th>Destination</th>
                                    <th>Truck Type</th>
                                    <th>Load Passing</th>
                                    <th>Scheduled Date</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php

                                  $query = "SELECT * FROM posted_trucks WHERE laod_type = '$loadtype' AND status = 'posted' ORDER BY created DESC";
                                  $query_run = mysqli_query($con, $query);
                                  if (mysqli_num_rows($query_run) > 0) {

                                    $sno = 0;
                                    while ($row = mysqli_fetch_array($query_run)) {

                                      $sno++;

                                      //$id = $row['id'];
                                      $user_id = $row['user_id'];
                                      $source = $row['source'];
                                      $laod_type = $row['laod_type'];
                                      $destination = $row['destination'];
                                      $truck_type = $row['truck_type'];
                                      $load_passing = $row['load_passing'];
                                      $created = $row['created'];

                                      $query4 = mysqli_query($con, "SELECT * FROM trucks WHERE id = '$truck_type'");
                                      $row4 = mysqli_fetch_array($query4);

                                      $schedule = $row['schedule'];


                                      $query2 = mysqli_query($con, "SELECT * FROM provider_profile_tbl WHERE user_id = '$user_id'");
                                      $row2 = mysqli_fetch_array($query2);


                                      $query3 = mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'");
                                      $row3 = mysqli_fetch_array($query3);


                                      $name = $row2['name'];
                                      $type = $row3['type'];
                                      $phone = $row3['phone'];

                                      if (isset($row4['type']) && isset($row4['title'])) {
                                        $trucks = $row4['type'] . ' - ' . $row4['title'];
                                      } else {
                                        $trucks = '-';
                                      }
                                      //$trucks = $row4['type'] . ' - ' . $row4['title'];
                                      $mater = $row5['material_name'];

                                      if (empty($company)) {
                                        $company = '---';
                                      }

                                  ?>
                                      <tr>
                                        <td><?= $sno; ?></td>
                                        <td><?= $name; ?></br>(<?= $type; ?>)</td>
                                        <td><?= 'TRUCK #' . $row['id']; ?></td>
                                        <td><?= $phone; ?></td>
                                        <td><?= $source; ?></td>
                                        <td><?= $destination; ?></td>
                                        <td><?= $trucks; ?></td>
                                        <td><?= $load_passing; ?></td>
                                        <td><?= $schedule; ?></td>
                                        <td><button id="accept" onclick="accept(<?= $row['id']; ?>)" type="button" class="btn btn-block btn-success">ASSIGN</button>
                                        </td>
                                      </tr>
                                  <?php }
                                  } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              <?php
              } else if ($status == "assigned to driver" || $status == "started"  || $status == "completed") {
              ?>

                <div class="row">

                  <?php

                  $bidquery = mysqli_query($con, "SELECT * FROM assigned_orders WHERE order_id = '$id'");
                  $brow1 = mysqli_fetch_array($bidquery);

                  $truck_id = $brow1['truck_id'];
                  $assign_id = $brow1['id'];


                  $bidquery1 = mysqli_query($con, "SELECT * FROM posted_trucks WHERE id = '$truck_id'");
                  $brow = mysqli_fetch_array($bidquery1);

                  $source = $brow['source'];
                  $laod_type = $brow['laod_type'];
                  $destination = $brow['destination'];
                  $truck_type = $brow['truck_type'];
                  $load_passing = $brow['load_passing'];

                  $schedule = $brow['schedule'];

                  $query4 = mysqli_query($con, "SELECT * FROM trucks WHERE id = '$truck_type'");
                  $row4 = mysqli_fetch_array($query4);

                  if (isset($row4['type']) && isset($row4['title'])) {
                    $trucks = $row4['type'] . ' - ' . $row4['title'];
                  } else {
                    $trucks = '-';
                  }
                  //$trucks = $row4['type'] . ' - ' . $row4['title'];

                  $uuiidd = $brow['user_id'];
                  //$bamount = $brow['amount'];

                  $query3 = mysqli_query($con, "SELECT * FROM users WHERE id = '$uuiidd'");
                  $row3 = mysqli_fetch_array($query3);
                  $type = $row3['type'];

                  $bpdata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM loader_profile_tbl WHERE user_id = '$uuiidd'"));

                  $budata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id = '$uuiidd'"));

                  ?>


                  <div class="col-lg-6">

                    <?php
                    if ($status == "started") {
                    ?>
                      <button type="button" id="finishbooking" class="btn btn-block btn-primary">FINISH BOOKING</button>

                    <?php
                    } else if ($status == "assigned to driver") {
                    ?>
                      <button type="button" id="startbooking" class="btn btn-block btn-success">START BOOKING</button>
                    <?php
                    }
                    ?>

                    <button type="button" id="cancel" class="btn btn-block btn-danger">CANCEL BOOKING</button>

                    </br>
                    <div class="card">

                      <div class="card-header">
                        <h3 class="card-title">
                          Truck Details
                        </h3>
                      </div>

                      <div class="card-header">
                        <h3 class="card-title">
                          <a class="btn btn-primary" href="edit_full_load_posted.php?edit=<?= $brow['id']; ?>&id=<?= $id; ?>">EDIT</a>
                        </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">



                        <dl class="row">
                          <dt class="col-sm-4">Truck ID</dt>
                          <dd class="col-sm-8">TRUCK #<?= $brow['id']; ?></dd>

                          <dt class="col-sm-4">Name</dt>
                          <dd class="col-sm-8"><?php if (isset($bpdata['name'])) {
                                                  echo $bpdata['name'];
                                                } ?> (<?= $type; ?>)</dd>

                          <dt class="col-sm-4">Phone</dt>
                          <dd class="col-sm-8"><?= $budata['phone']; ?></dd>

                          <dt class="col-sm-4">Vehicle Number</dt>
                          <dd class="col-sm-8"><?= $brow1['vehicle_number']; ?></dd>

                          <dt class="col-sm-4">Driver Number</dt>
                          <dd class="col-sm-8"><?= $brow1['driver_number']; ?></dd>

                          <dt class="col-sm-4">Source</dt>
                          <dd class="col-sm-8"><?= $source; ?>
                          </dd>

                          <dt class="col-sm-4">Destination</dt>
                          <dd class="col-sm-8"><?= $destination; ?></dd>

                          <dt class="col-sm-4">Truck Type</dt>
                          <dd class="col-sm-8"><?= $trucks; ?></dd>

                          <dt class="col-sm-4">Load Passing</dt>
                          <dd class="col-sm-8"><?= $load_passing; ?></dd>

                          <dt class="col-sm-4">Schedule Date</dt>
                          <dd class="col-sm-8"><?= $schedule; ?></dd>

                          <dt class="col-sm-4">Special Notes</dt>
                          <dd class="col-sm-8"><?= $brow['remarks']; ?></dd>


                        </dl>
                      </div>
                      <!-- /.card-body -->
                    </div>

                    <div class="card">

                      <div class="card-header">
                        <h3 class="card-title">
                          Transporter/ Driver Fare Details
                        </h3>
                      </div>

                      <div class="card-header">
                        <h3 class="card-title">
                          <a class="btn btn-primary" href="edit_provider_fare.php?edit=<?= $brow1['id']; ?>">EDIT</a>
                        </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">



                        <dl class="row">


                          <dt class="col-sm-4">New Fare for Provider/ Driver</dt>
                          <dd class="col-sm-8">₹<?= $brow1['fare']; ?></dd>

                          <dt class="col-sm-4">Other Charges</dt>
                          <dd class="col-sm-8">₹<?= $brow1['other']; ?></dd>

                          <dt class="col-sm-4">Total</dt>
                          <dd class="col-sm-8">₹<?= $brow1['fare'] + $brow1['other']; ?></dd>

                          <dt class="col-sm-4">Paid Amount to Provider/ Driver</dt>
                          <dd class="col-sm-8">₹<?= $brow1['paid']; ?></dd>

                          <dt class="col-sm-4">Balance Amount</dt>
                          <dd class="col-sm-8">₹<?= (($brow1['fare'] + $brow1['other']) - $brow1['paid']); ?></dd>

                        </dl>
                      </div>
                      <!-- /.card-body -->
                    </div>

                  </div>

                  <div class="col-lg-6">

                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h2 class="box-title">Truck Details</h2>




                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->



                      <?php
                      if (isset($_POST['submit'])) {


                        $fare = $_POST['fare'];



                        $question_insert = "INSERT INTO assigned_orders (order_id , truck_id , fare) VALUES ('$id' , '$bid' , '$fare')";
                        if (mysqli_query($con, $question_insert)) {

                          $bupdate1 = "UPDATE `orders` SET status = 'assigned to driver' WHERE id = '$id' ";
                          if (mysqli_query($con, $bupdate1)) {

                            $bupdate2 = "UPDATE `posted_trucks` SET status = 'assigned' WHERE id = '$bid'";

                            if (mysqli_query($con, $bupdate2)) {


                              header('Location:loader_full_load.php');
                            }
                          }
                        } else {
                          $error = "Some error occurred";
                        }
                      }
                      ?>




                      <form role="form" method="post">
                        <div class="box-body">




                          <div class="form-group">
                            <label for="exampleInputPassword1">Update Payment</label>

                            <div class="input-group">
                              <div class="custom-file">
                                <input type="number" class="form-control" name="pay" id="pay">
                              </div>
                              <div class="input-group-append">
                                <a onClick="updatePayment(<?= $brow1['id']; ?>)"><span class="input-group-text">Update</span></a>
                              </div>
                            </div>

                          </div>

                        </div>
                        <!-- /.box-body -->

                      </form>
                    </div>

                    </br>
                    </br>

                    <div class="box box-primary">
                      <div class="box-header with-border">

                        <a class="btn btn-warning" href="material_invoice.php?assign_id=<?= $assign_id; ?>">View Material Invoice</a>

                        <a class="btn btn-warning" href="pod.php?assign_id=<?= $assign_id; ?>">View POD</a>

                        <a class="btn btn-warning" href="vdoc.php?assign_id=<?= $assign_id; ?>">View Vehicle Documents</a>


                        <a class="btn btn-info" href="track.php?slat=<?= $deliverylat; ?>&slng=<?= $deliverylng; ?>&dlat=<?= $destinationLAT; ?>&dlng=<?= $destinationLNG; ?>">Track Order</a>

                        <a class="btn btn-info" href="edit_invoice.php?id=<?= $id; ?>">Order Invoice</a>

                        <a class="btn btn-info" href="edit_lr.php?id=<?= $id; ?>">Consignor LR Download</a>
                        <a class="btn btn-info" href="edit_lr2.php?id=<?= $id; ?>">Consignee LR Download</a>
                        <a class="btn btn-info" href="edit_lr3.php?id=<?= $id; ?>">Driver LR Download</a>
                        <a class="btn btn-info" href="edit_lr4.php?id=<?= $id; ?>">Office LR Download</a>

                        </br>
                        </br>




                      </div>
                    </div>

                  </div>

                </div>






              <?php
              } else {
              ?>
                <button type="button" class="btn btn-block btn-warning">CANCELLED</button>

              <?php

              }
              ?>











            </div>

          </div>

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('inc/footer.php');
?>