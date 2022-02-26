<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if(isset($_GET['del']))
 {
    $del_id = $_GET['del'];
    $del_query = "DELETE FROM `trucks` WHERE `trucks`.`id` = '$del_id'";
    if(mysqli_query($con,$del_query))
    {
      $msg = "Truck Has Been Deleted";
    }
    else
    {
      $error = "Truck Hasn't Been Deleted";
    }

 }

$employeedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM employee WHERE id = '$role'"));

$loaders = $employeedata['loaders'];

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
            
            $data = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM orders WHERE id = '$id'"));
            
            $user_id = $data['user_id'];
            
            $loadtype = $data['laod_type'];
            
             $freight = $data['freight'];
           $other_charges = $data['other_charges'];
           $cgst = $data['cgst'];
           $sgst = $data['sgst'];
           $insurance = $data['insurance'];
           $status = $data['status'];
           $truck_type = $data['truck_type'];
           $material = $data['material'];
           
           $destinationLAT = $data['destinationLAT'];
           $destinationLNG = $data['destinationLNG'];
           
           $query41 = mysqli_query($con,"SELECT * FROM delivery_logs WHERE order_id = '$id'");
           $row41 = mysqli_fetch_array($query41);
           
           $deliverylat = $row41['lat'];
           $deliverylng = $row41['lng'];
           
           $fr = $freight + $other_charges + $cgst + $sgst + $insurance;
           
           
           $query4 = mysqli_query($con,"SELECT * FROM trucks WHERE id = '$truck_type'");
           $row4 = mysqli_fetch_array($query4);
           
           $query5 = mysqli_query($con,"SELECT * FROM tbl_material WHERE id = '$material'");
           $row5 = mysqli_fetch_array($query5);
            
            
      $pdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM loader_profile_tbl WHERE user_id = '$user_id'"));
      
      $udata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$user_id'"));
            
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
<div class="col-lg-6">
    <div class="daily-feeds card">
        <div class="card-body no-padding">


            <!-- Item-->
            <div class="item clearfix">
                <div class="feed d-flex justify-content-between">
                    <div class="feed-body d-flex justify-content-between"
                        style="width: 100%;">
                        <div class="content" style="width: inherit;">

<?php

if(strpos($loaders, '2'))
{
?>
<a class="btn btn-primary"
                                href="edit_order.php?edit=<?= $id; ?>">EDIT</a>

<?php
}

?>

                            

                            <h4>Loader Name</h4>
                            <p class="form-control"><?= $pdata['name']; ?></p>

                            <h4>Loader Phone</h4>
                            <p class="form-control"><?= $udata['phone']; ?></p>

                            <h4>Source</h4>
                            <p class="form-control"><?= $data['source']; ?></p>

                            <h4>Destination</h4>
                            <p class="form-control"><?= $data['destination']; ?></p>

                            <h4>Truck Type</h4>
                            <p class="form-control">
                                <?= $row4['type'].' - '.$row4['title']; ?></p>
                            <h4>Schedule Date</h4>
                            <p class="form-control"><?= $data['schedule']; ?></p>
                            <h4>Weight</h4>
                            <p class="form-control"><?= $data['weight']; ?></p>
                            <h4>Material</h4>
                            <p class="form-control"><?= $row5['material_name']; ?></p>
                            <h4>Freight</h4>
                            <p class="form-control">₹<?= $data['freight']; ?></p>
                            <h4>Other Charges</h4>
                            <p class="form-control">₹<?= $data['other_charges']; ?></p>
                            <h4>CGST</h4>
                            <p class="form-control">₹<?= $data['cgst']; ?></p>
                            <h4>SGST</h4>
                            <p class="form-control">₹<?= $data['sgst']; ?></p>
                            <h4>Insurance</h4>
                            <p class="form-control">₹<?= $data['insurance']; ?></p>
                            <h4>Payable Freight</h4>
                            <p class="form-control">₹<?= $fr; ?></p>


                            <h4>Paid Percentage</h4>
                            <p class="form-control"><?= $data['paid_percent']; ?></p>
                            <h4>Paid Amount</h4>
                            <p class="form-control">₹<?= $data['paid_amount']; ?></p>
                            <h4>Balance Amount</h4>
                            <p class="form-control">₹<?= $fr - $data['paid_amount']; ?></p>
                            <h4>Pickup Address</h4>
                            <p class="form-control"><?= $data['pickup_address'].','.$data['pickup_pincode'].','.$data['pickup_phone'].','.$data['pickup_city']; ?></p>
                            <h4>Drop Address</h4>
                            <p class="form-control"><?= $data['drop_address'].','.$data['drop_pincode'].','.$data['drop_phone'].','.$data['drop_city']; ?></p>
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
                    <div class="feed-body d-flex justify-content-between"
                        style="width: 100%;">
                        <div class="content" style="width: inherit;">



                            <?php
if($status == "placed")
{
    ?>
    
    
        <?php

if(strpos($loaders, '3'))
{
?>
<button type="button"
                                class="btn btn-block btn-danger">CANCEL BOOKING</button>


<?php
}

?>
    
                            
                            <h2>Posted Trucks</h2>

                            <div class="box-body">
                                <table id="example2"
                                    class="table table-bordered table-striped nowrap">
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
$query_run = mysqli_query($con,$query);
if(mysqli_num_rows($query_run) > 0)
{   

$sno = 0;							   
while ($row = mysqli_fetch_array($query_run))
{

$sno++;         

//$id = $row['id'];
$user_id = $row['user_id'];
$source = $row['source'];
$laod_type = $row['laod_type'];
$destination = $row['destination'];
$truck_type = $row['truck_type'];
$load_passing = $row['load_passing'];
$created = $row['created'];

$query4 = mysqli_query($con,"SELECT * FROM trucks WHERE id = '$truck_type'");
$row4 = mysqli_fetch_array($query4);

$schedule = $row['schedule'];


$query2 = mysqli_query($con,"SELECT * FROM provider_profile_tbl WHERE user_id = '$user_id'");
$row2 = mysqli_fetch_array($query2);


$query3 = mysqli_query($con,"SELECT * FROM users WHERE id = '$user_id'");
$row3 = mysqli_fetch_array($query3);


$name = $row2['name'];
$type = $row3['type'];
$phone = $row3['phone'];

$trucks = $row4['type'].' - '.$row4['title'];
$mater = $row5['material_name'];

if(empty($company))
{
$company = '---';
}

?>
                                        <tr>
                                            <td><?= $sno;?></td>
                                            <td><?= $name;?></br>(<?= $type;?>)</td>
                                            <td><?= 'TRUCK #'.$row['id'];?></td>
                                            <td><?= $phone;?></td>
                                            <td><?= $source;?></td>
                                            <td><?= $destination;?></td>
                                            <td><?= $trucks;?></td>
                                            <td><?= $load_passing;?></td>
                                            <td><?= $schedule;?></td>
                                            <td><button id="accept"
                                                    onclick="accept(<?= $row['id']; ?>)"
                                                    type="button"
                                                    class="btn btn-block btn-success">ASSIGN</button>
                                            </td>
                                        </tr>
                                        <?php }}?>
                                    </tbody>
                                </table>
                            </div>

                            <?php
}
else if($status == "assigned to driver" || $status == "started"  || $status == "completed" )
{
    ?>
    
    
    
    <?php

if(strpos($loaders, '3'))
{
?>
<button type="button"
                                class="btn btn-block btn-danger">CANCEL BOOKING</button>


<?php
}

?>
    
                            

                            </br>
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h2 class="box-title">Truck Details</h2>




                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->

                                <?php

$bidquery = mysqli_query($con,"SELECT * FROM assigned_orders WHERE order_id = '$id'");
$brow1 = mysqli_fetch_array($bidquery);

$truck_id = $brow1['truck_id'];
$assign_id = $brow1['id'];


$bidquery1 = mysqli_query($con,"SELECT * FROM posted_trucks WHERE id = '$truck_id'");
$brow = mysqli_fetch_array($bidquery1);

$source = $brow['source'];
$laod_type = $brow['laod_type'];
$destination = $brow['destination'];
$truck_type = $brow['truck_type'];
$load_passing = $brow['load_passing'];

$schedule = $brow['schedule'];

$query4 = mysqli_query($con,"SELECT * FROM trucks WHERE id = '$truck_type'");
$row4 = mysqli_fetch_array($query4);

$trucks = $row4['type'].' - '.$row4['title'];

$uuiidd = $brow['user_id'];
$bamount = $brow['amount'];

$query3 = mysqli_query($con,"SELECT * FROM users WHERE id = '$uuiidd'");
$row3 = mysqli_fetch_array($query3);
$type = $row3['type'];

$bpdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM loader_profile_tbl WHERE user_id = '$uuiidd'"));

$budata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$uuiidd'"));

?>

                                <?php
if(isset($_POST['submit']))
{


$fare = $_POST['fare'];



$question_insert = "INSERT INTO assigned_orders (order_id , truck_id , fare) VALUES ('$id' , '$bid' , '$fare')";
if(mysqli_query($con,$question_insert))
{

$bupdate1 = "UPDATE `orders` SET status = 'assigned to driver' WHERE id = '$id' ";
if(mysqli_query($con,$bupdate1))
{

$bupdate2 = "UPDATE `posted_trucks` SET status = 'assigned' WHERE id = '$bid'";

if(mysqli_query($con,$bupdate2))
{


header('Location:loader_full_load.php');

}

}

}
else
{
$error = "Some error occurred";
}


} 
?>




                                <form role="form" method="post">
                                    <div class="box-body">


<?php

if(strpos($loaders, '2'))
{
?>
<a class="btn btn-primary"
                                            href="edit_full_load_posted.php?edit=<?=$brow['id'];?>">EDIT</a>
                                        </br>
                                        </br>


<?php
}

?>

                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Truck
                                                ID</label>
                                            <input type="text" class="form-control"
                                                placeholder="Name"
                                                value="TRUCK #<?= $brow['id']; ?>"
                                                disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control"
                                                placeholder="Name"
                                                value="<?= $bpdata['name']; ?> (<?= $type;?>)"
                                                disabled>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="exampleInputPassword1">Phone</label>
                                            <input type="text" class="form-control"
                                                placeholder="Phone"
                                                value="<?= $budata['phone']; ?>"
                                                disabled>
                                        </div>

                                        <div class="form-group">
                                            <label
                                                for="exampleInputPassword1">Source</label>
                                            <input type="text" class="form-control"
                                                placeholder="Amount"
                                                value="<?= $source; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label
                                                for="exampleInputPassword1">Destination</label>
                                            <input type="text" class="form-control"
                                                placeholder="Amount"
                                                value="<?= $destination; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Truck
                                                Type</label>
                                            <input type="text" class="form-control"
                                                placeholder="Amount"
                                                value="<?= $trucks; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Load
                                                Passing</label>
                                            <input type="text" class="form-control"
                                                placeholder="Amount"
                                                value="<?= $load_passing; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Schedule
                                                Date</label>
                                            <input type="text" class="form-control"
                                                placeholder="Amount"
                                                value="<?= $schedule; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">New Fare
                                                for transporter/ driver</label>
                                            <input type="text" name="fare"
                                                class="form-control"
                                                value="₹<?= $brow1['fare']; ?>"
                                                disabled>
                                        </div>

<div class="form-group">
                                            <label for="exampleInputPassword1">Paid Amount to Provider/ Driver</label>
                                            <input type="text" name="paid"
                                                class="form-control"
                                                value="₹<?= $brow1['paid']; ?>"
                                                disabled>
                                        </div>

<div class="form-group">
                                            <label for="exampleInputPassword1">Update Payment</label>
                                            
                                            <div class="input-group">
                      <div class="custom-file">
                        <input type="number" class="form-control" name="pay" id="pay">
                      </div>
                      <div class="input-group-append">
                        <a href="" onClick="updatePayment(<?= $brow1['id']; ?>)"><span class="input-group-text">Update</span></a>
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
        
        <a class="btn btn-warning"
                                            href="material_invoice.php?assign_id=<?=$assign_id;?>">View Material Invoice</a>
        
         <a class="btn btn-warning"
                                            href="pod.php?assign_id=<?=$assign_id;?>">View POD</a>
        
         <a class="btn btn-warning"
                                            href="vdoc.php?assign_id=<?=$assign_id;?>">View Vehicle Documents</a>
        
        
        <a class="btn btn-info"
                                            href="track.php?slat=<?=$deliverylat;?>&slng=<?= $deliverylng; ?>&dlat=<?= $destinationLAT; ?>&dlng=<?= $destinationLNG; ?>">Track Order</a>
                                            
                                            <a class="btn btn-info"
                                            href="">Order Invoice</a>
        
        <a class="btn btn-info"
                                            href="">LR Download</a>
        
        </br>
        </br>
        



                                </div>
    </div>


                            <?php
}
else
{
?>
                            <button type="button"
                                class="btn btn-block btn-warning">CANCELLED</button>

                            <?php

}
?>










                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
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