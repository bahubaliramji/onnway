<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

$id = $_GET['id'];

$data = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$id'"));

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Order for <?= $data['phone']; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Orders Management</li>
                        <li class="breadcrumb-item active">Add Data</li>
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


                    <div class="card">
                        <div class="card-header">
                            <?php
				if($error)
				{
				?>
                            <h3 class="card-title" style="color: red;"><?= $error; ?></h3>
                            <?php
				}
				else
				{
				?>
                            <h3 class="card-title">Add Data</h3>
                            <?php
				}
				?>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-4">

                                    <?php
					  
					  if(isset($_POST['submit']))
					  {
						  $product = $_POST['product'];
						  $quantity = $_POST['quantity'];
                          
                          $squery =  "SELECT * FROM products WHERE id = '$product'";
    $pdata = mysqli_fetch_array(mysqli_query($con , $squery));
                        
    $amount = $pdata['price'];

						//mysqli_query($con , "INSERT INTO temp_orders (user_id , product_id , quantity , amount) VALUES('$id' , '$product' , '$quantity' , '$amount')");
                        
                        
                        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => base_url2."api/addCart.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('user_id' => $id,'product_id' => $product,'quantity' => $quantity,'unit_price' => $amount,'version' => '1'),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

				
					header("Location: createorders.php?id=".$id);
                
						  
					  }
					  
					  ?>
                                    <form method="post">


                                        <div class="form-group">
                                            <label for="location_id">Location</label>
                                            <select class="form-control" style="width: 100%;" name="location_id"
                                                aria-hidden="true" required>
                                                <option value="">--- Select ---</option>
                                                <?php
					$query = "SELECT * FROM location ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id22 = $row['id'];
					  
					?>
                                                <option value="<?= $id22; ?>"><?= $row['city']; ?></option>
                                                <?php
				  }
					?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="cat">Category</label>
                                            <select class="form-control" style="width: 100%;" name="cat"
                                                aria-hidden="true" required>

                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="subcat1">Sub Category 1</label>
                                            <select class="form-control" style="width: 100%;" name="subcat1"
                                                aria-hidden="true" required>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="subcat2">Sub Category 2</label>
                                            <select class="form-control" style="width: 100%;" name="subcat2"
                                                aria-hidden="true">

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="product">Product</label>
                                            <select class="form-control" style="width: 100%;" name="product"
                                                aria-hidden="true">

                                            </select>
                                        </div>

                                        <label for="quantity">Quantity</label>
                                        <select type="text" id="quantity" class="form-control" name="quantity">

                                            <?php
							  for($i = 1 ; $i <= 100 ; $i++)
							  {
							  ?>

                                            <option><?= $i; ?></option>
                                            <?php
							  }
							  ?>

                                        </select>
                                        </br>
                                        <input type="submit" id="submit" name="submit" value="SUBMIT">
                                    </form>

                                    </br>
                                    </br>
                                    </br>
                                    </br>

                                    <?php
					  if(isset($_POST['submit2']))
					  {
						  $slot = $_POST['slot'];
						  $name = $_POST['name'];
						  $address = $_POST['address'];
						  $area = $_POST['area'];
						  $city = $_POST['city'];
						  $pin = $_POST['pin'];
						  $txn = strtotime("now");
                          
                          $add = $address.', '.$area.', '.$city.', '.$pin;


                          $all_questions33 = "SELECT * FROM cart WHERE user_id = '$id' AND status = 'pending'";
                  $run33 = mysqli_query($con , $all_questions33);
                  
					  $total = 0;
                    while ($row = mysqli_fetch_array($run33))
                     {
						 $sno++;
                        $quantity = $row['quantity'];
                        $amount = $row['amount'];
                     
                     $total = $total + $amount;
                     
                     }



						  $grand = "".$total;
						  
                          
                          
                          $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => base_url2."api/buyVouchers.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('user_id' => $id,'amount' => $grand,'txn' => $txn,'name' => $name,'address' => $add,'pay_mode' => 'Cash on Delivery','slot' => $slot,'isnew' => '0'),
));

$response = curl_exec($curl);
//print_r($response);
curl_close($curl);


						  
						header("Location: orders.php");  
						  
						  
						  
					  }
					  
					
	
	
					  
					  
					  ?>


                                    <form method="post">


                                        
                               


                                    <div class="form-group">
                                        <label for="name">Name</label></br>
                                        <input type="text" id="name" class="form-control" name="name" required>
                                        </div>

                                            <div class="form-group">
                                        <label for="address">House/ Apartment No.</label></br>
                                        <input type="text" id="address" class="form-control" name="address" required>
                                            </div>
                                        
                                            <div class="form-group">
                                        <label for="area">Locality/ Area/ District</label></br>
                                        <input type="text" id="area" class="form-control" name="area" required>
                                            </div>
                                        
                                            <div class="form-group">
                                        <label for="city">City</label></br>
                                        <input type="text" id="city" class="form-control" name="city" required>
                                            </div>
                                        
                                            <div class="form-group">
                                        <label for="pin">PIN Code</label></br>
                                        <input type="number" id="pin" class="form-control" name="pin" value="Kondhwa" required>
                                            </div>
                                        
                                            <div class="form-group">
                                            <label for="slot">Delivery Slot</label></br>
                                        <select type="product" id="slot" class="form-control" name="slot"
                                            style="height: 34px;">


                                            <option>8-9AM</option>
                                            <option>9-10AM</option>
                                            <option>10-11AM</option>
                                            <option>11-12AM</option>
                                            <option>12-1PM</option>
                                            <option>1-2PM</option>
                                            <option>3-4PM</option>
                                            <option>4-5PM</option>
                                            <option>5-6PM</option>
                                            <option>6-7PM</option>
                                            <option>7-8PM</option>
                                            <option>9-11PM</option>
                                            <option>Tomorrow</option>
                                            <option>Today 8-11AM</option>
                                            <option>Today 5-8PM</option>
                                            <option>Tomorrow 8-11AM</option>
                                            <option>Tomorrow 5-8PM</option>



                                        </select>
                                        </div>


                                        <input type="submit" id="submit2" name="submit2" value="CREATE ORDER">
                                    </form>


                                </div>


                                <div class="col-lg-8">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S. No.</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Amount</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                  $all_questions = "SELECT * FROM cart WHERE user_id = '$id' AND status = 'pending'";
                  $run = mysqli_query($con , $all_questions);
                  
					  $sno = 0;
					  $total = 0;
					  $pcp = 0;
                    while ($row = mysqli_fetch_array($run))
                     {
						 $sno++;
						 
                        $product_id = $row['product_id'];
                        $idd = $row['id'];
						
						$pdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM products WHERE id = '$product_id'"));
                        $quantity = $row['quantity'];
                        $amount = $row['amount'];
                     
					 $total = $total + $amount;
                  
                  ?>
                                            <tr>
                                                <td><?= $sno; ?></td>
                                                <td><?= $pdata['name']; ?></td>
                                                <td><?= $quantity; ?></td>
                                                <td>₹<?= $amount; ?></td>
                                                <td style="text-align-last: center;"><a href="#" onclick="MyFunction('<?= $idd; ?>');return false;"><i class="fas fa-trash-alt"></i></a></td>
                                                
                                            </tr>

                                            <?php
					 }
				  
				  ?>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>Total</td>
                                                <td><b>₹<?= $total; ?></b></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>





                            </div>

                            </br>
                            </br>


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