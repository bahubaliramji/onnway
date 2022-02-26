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
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item">Products</li>
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

                    <?php
                    if (isset($_POST['submit'])) {


                        $location_id = $_POST['location_id'];
                        $cat = $_POST['cat'];
                        $subcat1 = $_POST['subcat1'];
                        $subcat2 = $_POST['subcat2'];
                        $name = $_POST['name'];
                        $brand = $_POST['brand'];
                        $price = $_POST['price'];
                        $discount = $_POST['discount'];
                        $size = $_POST['size'];
                        $description = $_POST['description'];
                        $key_features = $_POST['key_features'];
                        $stock = $_POST['stock'];
                        $packaging_type = $_POST['packaging_type'];
                        $shelf_life = $_POST['shelf_life'];
                        $seller = $_POST['seller'];
                        $status = $_POST['status'];

                        if (empty($location_id) or empty($name)) {
                            $error = "Please fill all fields";
                        } else {

                            $ythumb1 = $_FILES['image']['name'];
                            $ytmp_thumb1 = $_FILES['image']['tmp_name'];
                            $ypath1 = "upload/prod/" . $ythumb1;
                            if (move_uploaded_file($ytmp_thumb1, $ypath1)) {
                                $imm1 = $ythumb1;



                                $question_insert = "INSERT INTO `products` (
                        `location_id`,
                        `cat`,
                        `subcat1`,
                        `subcat2`,
                        `name`,
                        `brand`,
                        `price`,
                        `discount`,
                        `size`,
                        `description`,
                        `image`,
                        `key_features`,
                        `stock`,
                        `packaging_type`,
                        `shelf_life`,
                        `seller`,
                        `status`
                        ) 
                  VALUES (
                      '$location_id',
                      '$cat',
                      '$subcat1',
                      '$subcat2',
                      '$name',
                      '$brand',
                      '$price',
                      '$discount',
                      '$size',
                      '$description',
                      '$imm1',
                      '$key_features',
                      '$stock',
                      '$packaging_type',
                      '$shelf_life',
                      '$seller',
                      '$status'
                      )";
                                if (mysqli_query($con, $question_insert)) {
                                    header('Location:products.php');
                                } else {
                                    $error = "Some error occurred";
                                }
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
                                <h3 class="card-title">Add Data</h3>
                            <?php
                            }
                            ?>
                        </div>



                        <!-- /.card-header -->
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="location_id">Location</label>
                                    <select class="form-control" style="width: 100%;" name="location_id" aria-hidden="true" required>
                                        <option value="">--- Select ---</option>
                                        <?php
                                        $query = "SELECT * FROM location ORDER BY created DESC";
                                        $run_query = mysqli_query($con, $query);
                                        $sno = 0;
                                        while ($row = mysqli_fetch_array($run_query)) {
                                            $sno++;
                                            $id = $row['id'];

                                        ?>
                                            <option value="<?= $id; ?>"><?= $row['city']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cat">Category</label>
                                    <select class="form-control" style="width: 100%;" name="cat" aria-hidden="true" required>

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="subcat1">Sub Category 1</label>
                                    <select class="form-control" style="width: 100%;" name="subcat1" aria-hidden="true" required>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="subcat2">Sub Category 2</label>
                                    <select class="form-control" style="width: 100%;" name="subcat2" aria-hidden="true">

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                                </div>

                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input type="text" class="form-control" name="brand" placeholder="Enter Brand" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" name="price" placeholder="Enter Price" required>
                                </div>
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <input type="number" class="form-control" name="discount" placeholder="Enter Discount" required>
                                </div>
                                <div class="form-group">
                                    <label for="size">Size</label>
                                    <input type="text" class="form-control" name="size" placeholder="Enter Size" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="Enter Description" required>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image" required>
                                            <label class="custom-file-label" for="image">Choose Image</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="key_features">Key Features</label>
                                    <input type="text" class="form-control" name="key_features" placeholder="Enter Key Features" required>
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <select class="form-control" style="width: 100%;" name="stock" aria-hidden="true" required>
                                        <option value="In stock">In stock</option>
                                        <option value="Out of stock">Out of stock</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="packaging_type">Packaging Type</label>
                                    <input type="text" class="form-control" name="packaging_type" placeholder="Enter Packaging Type" required>
                                </div>
                                <div class="form-group">
                                    <label for="shelf_life">Shelf Life</label>
                                    <input type="text" class="form-control" name="shelf_life" placeholder="Enter Shelf Life" required>
                                </div>
                                <div class="form-group">
                                    <label for="seller">Seller</label>
                                    <select class="form-control" style="width: 100%;" name="seller" aria-hidden="true" required>
                                        <?php
                                        $query = "SELECT * FROM user_login WHERE typ = 'vendor' ORDER BY created DESC";
                                        $run_query = mysqli_query($con, $query);
                                        $sno = 0;
                                        while ($row = mysqli_fetch_array($run_query)) {
                                            $sno++;
                                            $id = $row['id'];

                                        ?>
                                            <option value="<?= $id; ?>"><?= $row['full_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" style="width: 100%;" name="status" aria-hidden="true" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
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