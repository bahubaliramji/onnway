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
                <div class="col-lg-4">



                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Loading Details
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
                                <dd class="col-sm-8"><?= $row4['type'] . ' - ' . $row4['title']; ?></dd>

                                <dt class="col-sm-4">Source</dt>
                                <dd class="col-sm-8"><?= $data['source']; ?></dd>

                                <dt class="col-sm-4">Destination</dt>
                                <dd class="col-sm-8"><?= $data['destination']; ?></dd>

                                <dt class="col-sm-4">Material</dt>
                                <dd class="col-sm-8"><?= $row5['material_name']; ?></dd>

                                <dt class="col-sm-4">Weight</dt>
                                <dd class="col-sm-8"><?= $data['weight']; ?></dd>

                                <dt class="col-sm-4">Schedule Date</dt>
                                <dd class="col-sm-8"><?= $data['schedule']; ?></dd>

                                <dt class="col-sm-4">Length</dt>
                                <dd class="col-sm-8"><?= $data['length'] . ' ft.'; ?></dd>

                                <dt class="col-sm-4">Width</dt>
                                <dd class="col-sm-8"><?= $data['width'] . ' ft.'; ?></dd>

                                <dt class="col-sm-4">Height</dt>
                                <dd class="col-sm-8"><?= $data['height'] . ' ft.'; ?></dd>

                                <dt class="col-sm-4">Total Dimension
                                <dd class="col-sm-8"><?= ($data['length'] * $data['width'] * $data['height']) . ' cu.ft.'; ?></dd>

                                <dt class="col-sm-4">Quantity</dt>
                                <dd class="col-sm-8"><?= $data['quantity']; ?></dd>

                                <dt class="col-sm-4">Total</dt>
                                <dd class="col-sm-8"><?= ($data['length'] * $data['width'] * $data['height'] * $data['quantity']) . ' cu.ft.'; ?></dd>

                                <dt class="col-sm-4">Material Photo</dt>
                                <dd class="col-sm-8"><a href="http://localhost/onnway/android/Uploads/material/<?= $data['material_image']; ?>" target="blank"><img src="http://localhost/onnway/android/Uploads/material/<?= $data['material_image']; ?>" style="width: 100%;height: auto;"></a></dd>

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

                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl class="row">
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

                                <dt class="col-sm-4">Payable Freight</dt>
                                <dd class="col-sm-8">₹<?= $fr; ?></dd>

                                <dt class="col-sm-4">Paid Percentage</dt>
                                <dd class="col-sm-8"><?= $data['paid_percent']; ?> %</dd>

                                <dt class="col-sm-4">Paid Amount</dt>
                                <dd class="col-sm-8">₹<?= $data['paid_amount']; ?></dd>

                                <dt class="col-sm-4">Balance Amount</dt>
                                <dd class="col-sm-8">₹<?= $data['paid_amount']; ?></dd>

                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>


                <?php

                $bidquery = mysqli_query($con, "SELECT * FROM posted_trucks WHERE id = '$bid'");
                $brow = mysqli_fetch_array($bidquery);

                $source = $brow['source'];
                $laod_type = $brow['laod_type'];
                $destination = $brow['destination'];
                $truck_type = $brow['truck_type'];
                $load_passing = $brow['load_passing'];

                $schedule = $brow['schedule'];

                $query4 = mysqli_query($con, "SELECT * FROM trucks WHERE id = '$truck_type'");
                $row4 = mysqli_fetch_array($query4);

                $trucks = $row4['type'] . ' - ' . $row4['title'];

                $uuiidd = $brow['user_id'];
                $bamount = $brow['amount'];

                $query3 = mysqli_query($con, "SELECT * FROM users WHERE id = '$uuiidd'");
                $row3 = mysqli_fetch_array($query3);
                $type = $row3['type'];

                $bpdata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM loader_profile_tbl WHERE user_id = '$uuiidd'"));

                $budata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id = '$uuiidd'"));

                ?>

                <div class="col-lg-8">


                    <div class="row">

                        <div class="col-lg-6">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Truck Details
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">



                                    <dl class="row">
                                        <dt class="col-sm-4">Truck ID</dt>
                                        <dd class="col-sm-8">TRUCK #<?= $brow['id']; ?></dd>

                                        <dt class="col-sm-4">Name</dt>
                                        <dd class="col-sm-8"><?= $bpdata['name']; ?> (<?= $type; ?>)</dd>

                                        <dt class="col-sm-4">Phone</dt>
                                        <dd class="col-sm-8"><?= $budata['phone']; ?></dd>

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

                                        <dt class="col-sm-4">Weight</dt>
                                        <dd class="col-sm-8"><?= $brow['weight']; ?></dd>

                                        <dt class="col-sm-4">Length</dt>
                                        <dd class="col-sm-8"><?= $brow['length'] . ' ft.'; ?></dd>

                                        <dt class="col-sm-4">Width</dt>
                                        <dd class="col-sm-8"><?= $brow['width'] . ' ft.'; ?></dd>

                                        <dt class="col-sm-4">Height</dt>
                                        <dd class="col-sm-8"><?= $brow['height'] . ' ft.'; ?></dd>

                                        <dt class="col-sm-4">Total Dimension</dt>
                                        <dd class="col-sm-8"><?= ($brow['length'] * $brow['width'] * $brow['height']) . ' cu.ft.'; ?></dd>

                                        <dt class="col-sm-4">Special Notes</dt>
                                        <dd class="col-sm-8"><?= $brow['remarks']; ?></dd>


                                    </dl>
                                </div>
                                <!-- /.card-body -->
                            </div>


                            <div class="card">

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
                                                        <?= $brow['boxArea'] . " sq.ft."; ?>
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
                                            $str_arr = explode(",", $selected);

                                            ?>
                                            <div class="box-select">

                                                <?php
                                                if (in_array("1", $str_arr)) {
                                                ?>
                                                    <div class="box-selected" onclick="sum1(),selected1()" id="sel1" style="background: #e11f26;"></div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="box-selected" onclick="sum1(),selected1()" id="sel1" style="background: rgba(0, 0, 0,0.06);"></div>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (in_array("2", $str_arr)) {
                                                ?>
                                                    <div class="box-selected" onclick="sum2(),selected2()" id="sel2" style="background: #e11f26;"></div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="box-selected" onclick="sum2(),selected2()" id="sel2" style="background: rgba(0, 0, 0,0.06);"></div>
                                                <?php
                                                }
                                                ?>


                                            </div>
                                            <div class="box-select">


                                                <?php
                                                if (in_array("3", $str_arr)) {
                                                ?>
                                                    <div class="box-selected" onclick="sum3(),selected3()" id="sel3" style="background: #e11f26;"></div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="box-selected" onclick="sum3(),selected3()" id="sel3" style="background: rgba(0, 0, 0,0.06);"></div>
                                                <?php
                                                }
                                                ?>



                                                <?php
                                                if (in_array("4", $str_arr)) {
                                                ?>
                                                    <div class="box-selected" onclick="sum4(),selected4()" id="sel4" style="background: #e11f26;"></div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="box-selected" onclick="sum4(),selected4()" id="sel4" style="background: rgba(0, 0, 0,0.06);"></div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                            <div class="box-select">

                                                <?php
                                                if (in_array("5", $str_arr)) {
                                                ?>
                                                    <div class="box-selected" onclick="sum5(),selected5()" id="sel5" style="background: #e11f26;"></div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="box-selected" onclick="sum5(),selected5()" id="sel5" style="background: rgba(0, 0, 0,0.06);"></div>
                                                <?php
                                                }
                                                ?>


                                                <?php
                                                if (in_array("6", $str_arr)) {
                                                ?>
                                                    <div class="box-selected" onclick="sum6(),selected6()" id="sel6" style="background: #e11f26;"></div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="box-selected" onclick="sum6(),selected6()" id="sel6" style="background: rgba(0, 0, 0,0.06);"></div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                            <div class="box-select">

                                                <?php
                                                if (in_array("7", $str_arr)) {
                                                ?>
                                                    <div class="box-selected" onclick="sum7(),selected7()" id="sel7" style="background: grey;"></div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="box-selected" onclick="sum7(),selected7()" id="sel7" style="background: rgba(0, 0, 0,0.06);"></div>
                                                <?php
                                                }
                                                ?>


                                                <?php
                                                if (in_array("8", $str_arr)) {
                                                ?>
                                                    <div class="box-selected" onclick="sum8(),selected8()" id="sel8" style="background: grey;"></div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="box-selected" onclick="sum8(),selected8()" id="sel8" style="background: rgba(0, 0, 0,0.06);"></div>
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
                                                    <?= $brow['selectedArea'] . " sq.ft."; ?>
                                                </div>
                                            </div>

                                            <div class="area">
                                                <div class="text1">

                                                    Remaining Area:
                                                </div>
                                                <div class="selected-area-data" style="padding-left: 27px;">
                                                    <?= $brow['remainingArea'] . " sq.ft."; ?>

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

                                                        <!-- /.box-header -->
                                                        <!-- form start -->



                                                        <?php
                                                        if (isset($_POST['submit'])) {


                                                            $fare = $_POST['fare'];

                                                            $frieght = $_POST['frieght'];
                                                            $other = $_POST['other'];
                                                            $cgst = $_POST['cgst'];
                                                            $sgst = $_POST['sgst'];
                                                            $insurance = $_POST['insurance'];
                                                            $vehicle_number = $_POST['vehicle_number'];
                                                            $driver_number = $_POST['driver_number'];
                                                            $discount = $_POST['discount'];


                                                            $question_insert = "INSERT INTO assigned_orders (order_id , user_id , truck_id , fare, vehicle_number, driver_number) VALUES ('$id' , $uuiidd , '$bid' , '$fare' , '$vehicle_number' , '$driver_number')";
                                                            if (mysqli_query($con, $question_insert)) {

                                                                $bupdate1 = "UPDATE `orders` SET freight = '$frieght', other_charges = '$other', cgst = '$cgst', sgst = '$sgst', insurance = '$insurance', status = 'assigned to driver', discount = '$discount' WHERE id = '$id' ";
                                                                if (mysqli_query($con, $bupdate1)) {

                                                                    $row331 = mysqli_query($con, "INSERT INTO loader_count SET orders = 'read', user_id = '$user_id'");


                                                                    $bupdate2 = "UPDATE `posted_trucks` SET status = 'assigned' WHERE id = '$bid'";

                                                                    if (mysqli_query($con, $bupdate2)) {


                                                                        $row33 = mysqli_query($con, "INSERT INTO count SET confirmed = 'read'");


                                                                        $src = $data['source'];
                                                                        $dst = $data['destination'];
                                                                        $sch = $data['schedule'];
                                                                        $trc = $brow['id'];

                                                                        $nmess = "Hello Sir/Madam, Congratulation, Your Booking on onnway.com is Confirm for Order ID: $id from $src to $dst for $sch, you have assigned a truck with Truck ID: $trc. For more details Visit www.onnway.com";


                                                                        $phh = $udata['phone'];
                                                                        $token = $udata['token'];

                                                                        sendnoti($nmess, $token);

                                                                        sendotp($phh, $nmess);



                                                                        $nmess1 = "Dear Sir/Madam, Congratulation, Your Booking on onnway.com is Confirm for Truck ID: $trc, you have assigned a Load with Load ID: $id from $src To $dst for Dated $sch. For more details Visit www.onnway.com";

                                                                        $phh1 = $row3['phone'];
                                                                        $token1 = $row3['token'];

                                                                        sendnoti($nmess1, $token1);

                                                                        sendotp($phh1, $nmess1);






                                                                        header('Location:loader_full_load.php');
                                                                    }
                                                                }
                                                            } else {
                                                                $error = "Some error occurred";
                                                            }
                                                        }

                                                        function sendotp($phone, $message)
                                                        {

                                                            $curl = curl_init();



                                                            curl_setopt_array($curl, array(
                                                                CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
                                                                CURLOPT_RETURNTRANSFER => true,
                                                                CURLOPT_ENCODING => "",
                                                                CURLOPT_MAXREDIRS => 10,
                                                                CURLOPT_TIMEOUT => 30,
                                                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                CURLOPT_CUSTOMREQUEST => "POST",
                                                                CURLOPT_POSTFIELDS => "{ \"sender\": \"ONNWAY\", \"route\": \"4\", \"country\": \"91\", \"sms\": [ { \"message\": \"" . $message . "\", \"to\": [ " . $phone . "] } ] }",
                                                                CURLOPT_SSL_VERIFYHOST => 0,
                                                                CURLOPT_SSL_VERIFYPEER => 0,
                                                                CURLOPT_HTTPHEADER => array(
                                                                    "authkey: 266484AgCc3hEjSl5c824792",
                                                                    "content-type: application/json"
                                                                ),
                                                            ));

                                                            $response = curl_exec($curl);
                                                            $err = curl_error($curl);

                                                            curl_close($curl);
                                                        }


                                                        function sendnoti($m, $token)
                                                        {



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

                                                            define("GOOGLE_API_KEY", "AAAAHwzc0WE:APA91bGykghU3ZdD-49yW11vV9B0u4o5PIWXtXq9g7U8uJZwht1J9LSXZxL3asS_ytYpOLLSQsOmkUdUYF0SwAWxfj5EbZTKUAXVOfFaZsJ3CnDtVE9HjdBtFlaz82tbxwkfd8jHLss-");

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
                                                        }

                                                        ?>

                                                        <form role="form" method="post">
                                                            <div class="box-body">



                                                                <?php
                                                                $bid_id = $data['bid_id'];
                                                                if ($bid_id) {

                                                                    $biddata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM bids WHERE id = '$bid_id'"));

                                                                ?>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Bidded Amount</label>
                                                                        <input type="number" name="frieght" class="form-control" value="<?= $biddata['amount']; ?>" placeholder="Frieght" readonly>
                                                                    </div>

                                                                <?php
                                                                }
                                                                ?>


                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">New Freight</label>
                                                                    <input type="number" name="frieght" class="form-control" value="<?= $freight; ?>" placeholder="Frieght" required>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Other Charges</label>
                                                                    <input type="number" name="other" class="form-control" value="<?= $other_charges; ?>" placeholder="Other Charges">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">CGST</label>
                                                                    <input type="number" name="cgst" class="form-control" value="<?= $cgst; ?>" placeholder="CGST">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">SGST</label>
                                                                    <input type="number" name="sgst" class="form-control" value="<?= $sgst; ?>" placeholder="SGST">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Insurance</label>
                                                                    <input type="number" name="insurance" class="form-control" value="<?= $insurance; ?>" placeholder="Insurance">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Vehicle Number</label>
                                                                    <input type="text" name="vehicle_number" class="form-control" placeholder="Vehicle Number" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Driver Number</label>
                                                                    <input type="number" name="driver_number" class="form-control" placeholder="Driver Number" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Discount (%)</label>
                                                                    <input type="number" name="discount" class="form-control" placeholder="Discount" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">New Fare
                                                                        for transporter/ driver</label>
                                                                    <input type="number" name="fare" class="form-control" placeholder="Fare" required>
                                                                </div>



                                                            </div>
                                                            <!-- /.box-body -->

                                                            <div class="box-footer">
                                                                <button type="submit" name="submit" class="btn btn-block btn-success">ASSIGN
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