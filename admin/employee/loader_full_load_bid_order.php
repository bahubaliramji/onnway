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
           
           $fr = $freight + $other_charges + $cgst + $sgst + $insurance;
           
           
           $query4 = mysqli_query($con,"SELECT * FROM trucks WHERE id = '$truck_type'");
           $row4 = mysqli_fetch_array($query4);
           
           $query5 = mysqli_query($con,"SELECT * FROM tbl_material WHERE id = '$material'");
           $row5 = mysqli_fetch_array($query5);
            
            
      $pdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM loader_profile_tbl WHERE user_id = '$user_id'"));
      
      $udata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$user_id'"));
            
            ?>

                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Full Load Bidding Enquiry - ORDER #<?= $id; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Full Load Bidding Enquiry - ORDER #<?= $id; ?></li>
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
                                            <div class="feed-body d-flex justify-content-between" style="width: 100%;">
                                                <div class="content" style="width: inherit;">

<?php

if(strpos($loaders, '2'))
{
?>
<a class="btn btn-primary"
                                                        href="edit_full_load_bid.php?edit=<?= $id; ?>">EDIT</a>

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
                                            <div class="feed-body d-flex justify-content-between" style="width: 100%;">
                                                <div class="content" style="width: inherit;">


<?php

if(strpos($loaders, '3'))
{
?>
<button type="button" id="cancel"
                                                        class="btn btn-block btn-danger">CANCEL BOOKING</button>


<?php
}

?>

                                                    

                                                    <?php

if($status == 'requsted for quote')
{
?>
                                                    <button type="button" id="assign"
                                                        class="btn btn-block btn-primary">ASSIGN FOR
                                                        BIDDING</button>
                                                    <?php
}
else if($status == 'assigned for quote')
{
?>



                                                    <!--<button type="button" id="accept" class="btn btn-block btn-success">ACCEPT BID</button>-->
                                                    <h2>Total Bids</h2>




                                                    <div class="box-body">
                                                        <table id="example2" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Transporter Name</th>
                                                                    <th>Phone</th>
                                                                    <th>Bid Amount</th>
                                                                    <th>Time</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
$bidquery = mysqli_query($con,"SELECT * FROM bids WHERE order_id = '$id'");
if(mysqli_num_rows($bidquery) > 0)
{   

$sno = 0;							   
while ($brow = mysqli_fetch_array($bidquery))
{

$sno++;         

$uuiidd = $brow['user_id'];
$bamount = $brow['amount'];

$bpdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM provider_profile_tbl WHERE user_id = '$uuiidd'"));

$budata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$uuiidd'"));

?>
                                                                <tr>
                                                                    <td><?= $sno;?></td>
                                                                    <td><?= $bpdata['name']; ?></td>
                                                                    <td><?= $budata['phone'];?></td>
                                                                    <td><?= $bamount;?></td>
                                                                    <td><?= $brow['created'];?></td>
                                                                    <td><a id="accept"
                                                                            onclick="accept2(<?= $brow['id']; ?>)"
                                                                            type="button"
                                                                            class="btn btn-block btn-success">ACCEPT
                                                                            BID</a></td>

                                                                </tr>
                                                                <?php }}?>
                                                            </tbody>
                                                        </table>
                                                    </div>






                                                    <?php

/*$bidquery = mysqli_query($con,"SELECT * FROM bids WHERE order_id = '$id'");
while($brow = mysqli_fetch_array($bidquery))
{

$uuiidd = $brow['user_id'];
$bamount = $brow['amount'];

$bpdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM loader_profile_tbl WHERE user_id = '$uuiidd'"));

$budata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$uuiidd'"));

?>

                                                    <div class="box box-primary">
                                                        <div class="box-body box-profile">



                                                            <ul class="list-group list-group-unbordered">
                                                                <li class="list-group-item">
                                                                    <b>Transporter Name</b>
                                                                    <p class="pull-right">
                                                                        <?= $bpdata['name']; ?></p>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Phone</b>
                                                                    <p class="pull-right">
                                                                        <?= $budata['phone']; ?></p>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Bid Amount</b>
                                                                    <p class="pull-right"><?= $bamount; ?></p>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Bid Time</b>
                                                                    <p class="pull-right">
                                                                        <?= $brow['created']; ?></p>
                                                                </li>
                                                            </ul>

                                                            <a id="accept" onclick="accept(<?= $brow['id']; ?>)"
                                                                class="btn btn-success btn-block"><b>ACCEPT
                                                                    BID</b></a>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>

                                                    <?php

}*/
?>

                                                    <?php
}
else if($status == 'accepted quote')
{
?>
                                                    <button type="button" class="btn btn-block btn-warning">BID
                                                        ACCEPTED</button>

                                                    </br>

                                                    <div class="box box-primary">
                                                        <div class="box-header with-border">
                                                            <h2 class="box-title">Bid Details</h2>
                                                        </div>
                                                        <!-- /.box-header -->
                                                        <!-- form start -->

                                                        <?php

$bidquery = mysqli_query($con,"SELECT * FROM bids WHERE order_id = '$id' AND status = 'accepted'");
$brow = mysqli_fetch_array($bidquery);

$uuiidd = $brow['user_id'];
$bamount = $brow['amount'];


$bpdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM provider_profile_tbl WHERE user_id = '$uuiidd'"));

$budata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$uuiidd'"));

?>



                                                        <form role="form" method="post">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Transporter
                                                                        Name</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Name"
                                                                        value="<?= $bpdata['name']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Phone</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Phone"
                                                                        value="<?= $budata['phone']; ?>" disabled>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Bid
                                                                        Amount</label>
                                                                    <input type="number" class="form-control"
                                                                        placeholder="Amount" value="<?= $bamount; ?>"
                                                                        disabled>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">New
                                                                        Freight</label>
                                                                    <input type="number" name="frieght"
                                                                        class="form-control" value="<?= $freight; ?>"
                                                                        disabled>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Other
                                                                        Charges</label>
                                                                    <input type="number" name="other"
                                                                        class="form-control"
                                                                        value="<?= $other_charges; ?>" disabled>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">CGST</label>
                                                                    <input type="number" name="cgst"
                                                                        class="form-control" value="<?= $cgst; ?>"
                                                                        disabled>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">SGST</label>
                                                                    <input type="number" name="sgst"
                                                                        class="form-control" value="<?= $sgst; ?>"
                                                                        disabled>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Insurance</label>
                                                                    <input type="number" name="insurance"
                                                                        class="form-control" value="<?= $insurance; ?>"
                                                                        disabled>
                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>


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