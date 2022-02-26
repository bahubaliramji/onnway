<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $squery =  "SELECT * FROM user_login WHERE id = '$id'";
    $data = mysqli_fetch_array(mysqli_query($con, $squery));
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Vendor Data</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Vendors Management</li>
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
                    if (isset($_POST['submit'])) {


                        $location_id = $_POST['location_id'];
                        $name = $_POST['name'];
                        $full_name = $_POST['full_name'];
                        $password = $_POST['password'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $GST = $_POST['GST'];
                        $account_number = $_POST['account_number'];
                        $account_name = $_POST['account_name'];
                        $IFSC = $_POST['IFSC'];
                        $Bank = $_POST['Bank'];
                        $status = $_POST['status'];

                        if (empty($location_id) or empty($name) or empty($full_name)  or empty($password)) {
                            $error = "Please fill all fields";
                        } else {

                            $question_insert = "UPDATE user_login SET 
                  location_id = '$location_id', 
                  name = '$name', 
                  full_name = '$full_name',
                  password = '$password',
                  phone = '$phone',
                  address = '$address',
                  GST = '$GST', 
                  account_number = '$account_number',
                  account_name = '$account_name',
                  IFSC = '$IFSC',
                  Bank = '$Bank',
                  status = '$status'
                  WHERE id = '$id'";
                            if (mysqli_query($con, $question_insert)) {
                                header('Location:vendors.php');
                            } else {
                                $error = "Some error occurred";
                            }
                        }
                    }
                    ?>

                    <div class="card">
                        <div class="card-header">
                            <?php
                            if (isset($error)) {
                            ?>
                                <h3 class="card-title" style="color: red;"><?= $error; ?></h3>
                            <?php
                            } else {
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
                                    <label for="location_id">Location</label>
                                    <select class="form-control" style="width: 100%;" name="location_id" aria-hidden="true">
                                        <?php
                                        $query = "SELECT * FROM location ORDER BY created DESC";
                                        $run_query = mysqli_query($con, $query);
                                        $sno = 0;
                                        while ($row = mysqli_fetch_array($run_query)) {
                                            $sno++;
                                            $id1 = $row['id'];
                                            $sid1 = $data['location_id'];

                                            if ($id1 == $sid1) {

                                        ?>
                                                <option value="<?= $id1; ?>" selected><?= $row['city']; ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?= $id1; ?>"><?= $row['city']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" value="<?= $data['name']; ?>" name="name" placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" class="form-control" value="<?= $data['full_name']; ?>" name="full_name" placeholder="Enter Full Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" value="<?= $data['password']; ?>" name="password" placeholder="Enter Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control" value="<?= $data['phone']; ?>" name="phone" placeholder="Enter Phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" value="<?= $data['address']; ?>" name="address" placeholder="Enter Address" required>
                                </div>
                                <div class="form-group">
                                    <label for="GST">GST</label>
                                    <input type="text" class="form-control" value="<?= $data['GST']; ?>" name="GST" placeholder="Enter GST" required>
                                </div>
                                <div class="form-group">
                                    <label for="account_number">Account Number</label>
                                    <input type="number" class="form-control" value="<?= $data['account_number']; ?>" name="account_number" placeholder="Enter Account Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="account_name">Account Name</label>
                                    <input type="text" class="form-control" value="<?= $data['account_name']; ?>" name="account_name" placeholder="Enter Account Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="IFSC">IFSC</label>
                                    <input type="text" class="form-control" value="<?= $data['IFSC']; ?>" name="IFSC" placeholder="Enter IFSC" required>
                                </div>
                                <div class="form-group">
                                    <label for="Bank">Bank</label>
                                    <input type="text" class="form-control" value="<?= $data['Bank']; ?>" name="Bank" placeholder="Enter Bank" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" style="width: 100%;" name="status" aria-hidden="true">
                                        <?php
                                        $s = $data['status'];
                                        if ($s == 'active') {
                                        ?>
                                            <option value="active" selected>Active</option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="active">Active</option>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($s == 'inactive') {
                                        ?>
                                            <option value="inactive" selected>Inactive</option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="inactive">Inactive</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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