<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if(isset($_GET['edit']))
  {
    $id = $_GET['edit'];
    $squery =  "SELECT * FROM fares WHERE id = '$id'";
    $data = mysqli_fetch_array(mysqli_query($con , $squery));
    $source = $data['source'];
    $destination = $data['destination'];
    $truck_id = $data['truck_id'];
    $freight = $data['freight'];
    $other_charges = $data['other_charges'];
    $cgst = $data['cgst'];
    $sgst = $data['sgst'];
    $insurance = $data['insurance'];
  }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Fare</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
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

                    <?php
             if(isset($_POST['submit']))
             {

              
              $source = $_POST['source'];
              $destination = $_POST['destination'];
              $freight = $_POST['freight'];
              $other_charges = $_POST['other_charges'];
              $cgst = $_POST['cgst'];
              $sgst = $_POST['sgst'];
              $insurance = $_POST['insurance'];
              $type = $_POST['type'];

$question_insert = "UPDATE fares SET source = '$source', destination = '$destination', truck_id = '$type', freight = '$freight', other_charges = '$other_charges', cgst = '$cgst', sgst = '$sgst', insurance = '$insurance' WHERE id = '$id'";

                if(mysqli_query($con,$question_insert))
                {
                  header('Location:fares.php');
                }
                else
                {
                  $error = "Some error occurred";
                }

              
            } 
            ?>

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
                            <h3 class="card-title">Edit Data</h3>
                            <?php
				}
				?>
                        </div>



                        <!-- /.card-header -->
                        <form role="form" method="POST">
                            <div class="card-body">



                                <div class="form-group">
                                    <label for="inputEmail3">Source</label>
                                    
                                        <input type="text" class="form-control" id="source" value="<?= $source; ?>"
                                            name="source" placeholder="Source" required>
                                    
                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3">Destination</label>
                                    
                                        <input type="text" class="form-control" id="destination"
                                            value="<?= $destination; ?>" name="destination" placeholder="Destination"
                                            required>
                                    
                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3">Truck Type</label>

                                        <select class="form-control" data-placeholder="" name="type"
                                            style="width: 100%;">

                                            <?php
                    $query = "SELECT * FROM trucks";
                    $query_run = mysqli_query($con,$query);           
                      while ($row = mysqli_fetch_array($query_run))
                        {

$rid = $row['id'];

if($rid == $truck_id)
{
		 
                    ?>

                                            <option value="<?= $row['id']; ?>" selected><?= $row['type'];?> -
                                                <?= $row['title'];?></option>


                                            <?php
}
else
{
    ?>
                                            <option value="<?= $row['id']; ?>"><?= $row['type'];?> -
                                                <?= $row['title'];?></option>

                                            <?php
    
    
    
}
}
                      ?>

                                        </select>
                                    
                                </div>



                                <div class="form-group">
                                    <label for="inputEmail3">Freight</label>
                                    
                                        <input type="number" class="form-control" id="freight" value="<?= $freight; ?>"
                                            name="freight" placeholder="Freight" required>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">Other Charges</label>
                                    
                                        <input type="number" class="form-control" id="other_charges"
                                            value="<?= $other_charges; ?>" name="other_charges"
                                            placeholder="Other Charges">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">CGST</label>
                                    
                                        <input type="number" class="form-control" id="cgst" name="cgst"
                                            value="<?= $cgst; ?>" placeholder="CGST">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">SGST</label>
                                    
                                        <input type="number" class="form-control" id="sgst" value="<?= $sgst; ?>"
                                            name="sgst" placeholder="SGST">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">Insurance</label>
                                    
                                        <input type="number" class="form-control" id="insurance"
                                            value="<?= $insurance; ?>" name="insurance" placeholder="Insurance">
                                    
                                </div>




                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
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