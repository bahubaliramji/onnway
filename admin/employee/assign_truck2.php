<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <?php
		  


      date_default_timezone_set("Asia/Kolkata");
      
            
            $id = $_GET['oid'];
            $bid = $_GET['aid2'];
            
            $data = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM orders WHERE id = '$id'"));
            
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
           
           
           $query4 = mysqli_query($con,"SELECT * FROM trucks WHERE id = '$truck_type'");
           $row4 = mysqli_fetch_array($query4);
           
           $query5 = mysqli_query($con,"SELECT * FROM tbl_material WHERE id = '$material'");
           $row5 = mysqli_fetch_array($query5);
            
            
      $pdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM loader_profile_tbl WHERE user_id = '$user_id'"));
      
      $udata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$user_id'"));
            
            ?>

                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Assign Truck for - ORDER #<?= $id; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Assign Truck for - ORDER #<?= $id; ?></li>
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


                                                            <div class="box box-primary">
                                                                <div class="box-header with-border">
                                                                    <h2 class="box-title">Truck Details</h2>
                                                                </div>
                                                                <!-- /.box-header -->
                                                                <!-- form start -->

                                                                <?php
            
            $bidquery = mysqli_query($con,"SELECT * FROM posted_trucks WHERE id = '$bid'");
            $brow = mysqli_fetch_array($bidquery);
            
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

$frieght = $_POST['frieght'];
              $other = $_POST['other'];
              $cgst = $_POST['cgst'];
              $sgst = $_POST['sgst'];
              $insurance = $_POST['insurance'];


$question_insert = "INSERT INTO assigned_orders (order_id , user_id , truck_id , fare) VALUES ('$id' , $uuiidd , '$bid' , '$fare')";
                if(mysqli_query($con,$question_insert))
                {
                  
                  $bupdate1 = "UPDATE `orders` SET freight = '$frieght', other_charges = '$other', cgst = '$cgst', sgst = '$sgst', insurance = '$insurance', status = 'assigned to driver' WHERE id = '$id' ";
                  if(mysqli_query($con,$bupdate1))
                  {
                      
                      $row331 = mysqli_query($con,"INSERT INTO loader_count SET orders = 'read', user_id = '$user_id'");
                      
                      
                      $bupdate2 = "UPDATE `posted_trucks` SET status = 'assigned' WHERE id = '$bid'";
                      
                      if(mysqli_query($con,$bupdate2))
                  {


$m = "Truck has been assigned for Order #".$id;

$token = array();

$token[] = $udata['token'];
$token[] = $row3['token'];

$Eresult = array(
	 "message" => $m,
	 "image" => "",
	) ;
    
   
   
   
   $url = 'https://fcm.googleapis.com/fcm/send';
			
$fields = array();
$fields['data'] = $Eresult;

//if(is_array($token)){
	$fields['registration_ids'] = $token;
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
                                                                            <label for="exampleInputPassword1">Weight</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Amount"
                                                                                value="<?= $brow['weight']; ?>" disabled>
                                                                        </div>
                                                                        
                                                                         <div class="form-group">
                                                                            <label for="exampleInputPassword1">Material</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Amount"
                                                                                value="<?= $row5['material_name']; ?>" disabled>
                                                                        </div>
                                                                         <div class="form-group">
                                                                            <label for="exampleInputPassword1">Length</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Amount"
                                                                                value="<?= $brow['length'].' ft.'; ?>" disabled>
                                                                        </div>
                                                                         <div class="form-group">
                                                                            <label for="exampleInputPassword1">Width</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Amount"
                                                                                value="<?= $brow['width'].' ft.'; ?>" disabled>
                                                                        </div>
                                                                         <div class="form-group">
                                                                            <label for="exampleInputPassword1">Height</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Amount"
                                                                                value="<?= $brow['height'].' ft.'; ?>" disabled>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Total Dimension</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Amount"
                                                                                value="<?= ($brow['length'] * $brow['width'] * $brow['height']).' cu.ft.'; ?>" disabled>
                                                                        </div>
                                                                        
                                                                        
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Special Notes</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder=""
                                                                                value="<?= $brow['remarks']; ?>" disabled>
                                                                        </div>


<div class="container">
        <nav>


            <h3 class="align-center">Truck details</h3>

            <div class="nav-box">
                <table>
                    <tr>
                        <td class="align-left">
                            Truck Type:
                        </td>

                        <td class="align-right">
                            <?= $row4['title']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-left">
                            Total Capacity:
                        </td>

                        <td class="align-right">
                            <?= $brow['truckCapacity']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-left">
                            Box Length:
                        </td>

                        <td class="align-right">
                            <?= $brow['boxLength']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-left">
                            Box Width:
                        </td>

                        <td class="align-right">
                            <?= $brow['boxWidth']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-left">
                            Box Area:
                        </td>

                        <td class="align-right">
                            <?= $brow['boxArea']. " sq.ft."; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </nav>

</br>
</br>

        <div class="container1">
            <h3 class="align-center" style="padding-top: 10px;padding-bottom: 10px;"><?= $brow['weight']; ?></h3>
            <div class="in-row">
                <div class="small-box-white in-box bgcolor-white"></div>
                <div> <strong>Unselected</strong> </div>
                <div class="small-box-grey in-box bgcolor-grey"></div>
                <div><strong>Selected</strong> </div>
            </div>
            <div class="boxes">
                <?php
                
                $selected = $brow['selected'];
                $str_arr = explode (",", $selected);
                
                ?>
                <div class="box-select">
                    
                    <?php
                    if(in_array("1", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum1(),selected1()"id="sel1" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum1(),selected1()"id="sel1" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                    
                    <?php
                    if(in_array("2", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum2(),selected2()"id="sel2" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum2(),selected2()"id="sel2" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                    
                   
                </div>
                <div class="box-select">
                    
                    
                    <?php
                    if(in_array("3", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum3(),selected3()"id="sel3" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum3(),selected3()"id="sel3" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                    
                    
                    
                    <?php
                    if(in_array("4", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum4(),selected4()"id="sel4" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum4(),selected4()"id="sel4" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                   
                </div>
                <div class="box-select">
                   
                   <?php
                    if(in_array("5", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum5(),selected5()"id="sel5" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum5(),selected5()"id="sel5" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                    
                    
                    <?php
                    if(in_array("6", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum6(),selected6()"id="sel6" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum6(),selected6()"id="sel6" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                    
                </div>
                <div class="box-select">
                   
                   <?php
                    if(in_array("7", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum7(),selected7()"id="sel7" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum7(),selected7()"id="sel7" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                    
                    
                    <?php
                    if(in_array("8", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum8(),selected8()"id="sel8" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum8(),selected8()"id="sel8" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                  
                </div>
            </div>

            <div class="total">
                <div class="area">
                    <div class="text1">
                        Selected Area:

                    </div>
                    <div class="selected-area-data" style="padding-left: 40px;">
                        <?= $brow['selectedArea']. " sq.ft."; ?>
                    </div>
                </div>

                <div class="area">
                    <div class="text1">

                        Remaining Area:
                    </div>
                    <div class="selected-area-data" style="padding-left: 27px;">
                        <?= $brow['remainingArea']. " sq.ft."; ?>

                    </div>

                </div>
            </div>



        </div>





    </div>

<div class="form-group">
                  <label for="exampleInputPassword1">New Freight</label>
                  <input type="number" name="frieght" class="form-control" value="<?= $freight; ?>" placeholder="Frieght" required>
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Other Charges</label>
                  <input type="number" name="other" class="form-control" value="<?= $other_charges; ?>" placeholder="Other Charges" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">CGST</label>
                  <input type="number" name="cgst" class="form-control" value="<?= $cgst; ?>" placeholder="CGST" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">SGST</label>
                  <input type="number" name="sgst" class="form-control" value="<?= $sgst; ?>" placeholder="SGST" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Insurance</label>
                  <input type="number" name="insurance" class="form-control" value="<?= $insurance; ?>" placeholder="Insurance" required>
                </div>

                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">New Fare
                                                                                for transporter/ driver</label>
                                                                            <input type="number" name="fare"
                                                                                class="form-control" placeholder="Fare"
                                                                                required>
                                                                        </div>



                                                                    </div>
                                                                    <!-- /.box-body -->

                                                                    <div class="box-footer">
                                                                        <button type="submit" name="submit"
                                                                            class="btn btn-block btn-success">ASSIGN
                                                                            TRUCK</button>
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