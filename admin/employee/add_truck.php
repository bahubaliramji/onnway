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
            <h1 class="m-0 text-dark">Add Truck</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Truck</li>
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

              
              $title = $_POST['title'];
              $type = $_POST['type'];
              $max_load = $_POST['max_load'];
              $capcacity = $_POST['capcacity'];
              $box_length = $_POST['box_length'];
              $box_width = $_POST['box_width'];

$question_insert = "INSERT INTO `trucks` (
`type`, 
`title`,
`max_load`,
`capcacity`,
`box_length`,
`box_width`
) 
                VALUES (
                    '$type',
                    '$title',
                    '$max_load',
                    '$capcacity',
                    '$box_length',
                    '$box_width'
                    )";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:trucks.php');
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
				<h3 class="card-title">Add Data</h3>
				<?php
				}
				?>
              </div>
			  
			  
			  
              <!-- /.card-header -->
               <form role="form" method="POST">
                <div class="card-body">
				
				
				
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Truck Type</label>
                  <div class="col-sm-10">
                    <select class="form-control" data-placeholder="" name="type" 
                        style="width: 100%;">

                      <option>open truck</option>
                      <option>container</option>
                      <option>trailer</option>
                    </select>
                  </div>
                </div>            

                

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Truck Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                  </div>
                </div> 
                 
                 
                 <div class="form-group">
    <label for="max_load" class="col-sm-2 control-label">Max. Load</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="max_load" name="max_load" placeholder="Max. Load" required>
                  </div>
                </div> 
                
                <div class="form-group">
    <label for="capcacity" class="col-sm-2 control-label">Capcacity</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="capcacity" name="capcacity" placeholder="Capcacity" required>
                  </div>
                </div> 
                
                <div class="form-group">
    <label for="box_length" class="col-sm-2 control-label">Box Length</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="box_length" name="box_length" placeholder="Box Length" required>
                  </div>
                </div> 
                
                <div class="form-group">
    <label for="box_width" class="col-sm-2 control-label">Box Width</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="box_width" name="box_width" placeholder="Box Width" required>
                  </div>
                </div> 
                 
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="submit" class="btn btn-success" value="Add Truck">
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
