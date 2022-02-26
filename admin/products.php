<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['del']))
  {
    $del_id = $_GET['del'];
    $del_query =  "DELETE FROM `products` WHERE `products`.`id` = '$del_id'";
    if(mysqli_query($con,$del_query))
    {
      echo "<script>alert('Deleted successfully'); </script> ";
    }
    else
    {
      echo "<script>alert('Error occurred'); </script> ";
    }
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
                
				<a href="add_product.php" class="btn btn-outline-success">ADD DATA</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                  <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>Location</th>
                    <th>category</th>
                    <th>Sub category1</th>
                    <th>Sub category2</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Size</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Key Features</th>
                    <th>Stock</th>
                    <th>Packaging Type</th>
                    <th>Shelf Life</th>
                    <th>Seller</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  $query = "SELECT * FROM products ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					 $location_id = $row['location_id'];
					 
					 $sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM location WHERE id = '$location_id'"));
                      
                     $cat = $row['cat'];
					 
					 $cdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM category WHERE id = '$cat'"));

                     $subcat1 = $row['subcat1'];
					 
					 $scdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM sub_cat1 WHERE id = '$subcat1'"));

                     $subcat2 = $row['subcat2'];
					 
					 $scdata2 = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM sub_cat2 WHERE id = '$subcat2'"));

                     $seller = $row['seller'];
					 
					 $sedata2 = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM user_login WHERE id = '$seller'"));

				  ?>
				  
                  <tr>
                    
                    <td><?= $sno; ?></td>
                    <td><?= $sdata['city']; ?></td>
                    <td><?= $cdata['name']; ?></td>
                    <td><?= $scdata['name']; ?></td>
                    <td><?= $scdata2['name']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['brand']; ?></td>
                    <td><?= $row['price']; ?></td>
                    <td><?= $row['discount']; ?></td>
                    <td><?= $row['size']; ?></td>
                    <td><?= $row['description']; ?></td>
                    <td>
                    
                    <a href="<?= base_url.'upload/prod/'.$row['image']; ?>" data-toggle="lightbox" data-title="category image">
                        <img src="<?= base_url.'upload/prod/'.$row['image']; ?>" class="img-fluid mb-2" alt="category image" style="height: 50px;">
                      </a>
                    
                    </td>
                    <td><?= $row['key_features']; ?></td>
                    <td><?= $row['stock']; ?></td>
                    <td><?= $row['packaging_type']; ?></td>
                    <td><?= $row['shelf_life']; ?></td>
                    <td><?= $sedata2['full_name']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['created']; ?></td>
                    <td style="text-align-last: center;"><a href="edit_product.php?edit=<?= $id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                    <td style="text-align-last: center;"><a href="products.php?del=<?= $id; ?>"><i class="fas fa-trash-alt"></i></a></td>
                  </tr>
                  <?php
				  }
				  ?>
                 
                  </tbody>
                  
                </table>
              </div>
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
