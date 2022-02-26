<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['edit']))
  {
    $id = $_GET['edit'];
    $squery =  "SELECT * FROM complaint WHERE id = '$id'";
    $data = mysqli_fetch_array(mysqli_query($con , $squery));
	
	$user_id = $data['user_id'];
	
	$sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$user_id'"));
	
	$type = $sdata['type'];
	
	
	if($type == 'worker')
	{
		
		$iidd = 'W00'.$sdata['id'];
		
		
	}
	else if($type == 'brand')
	{
		
		$iidd = 'B00'.$sdata['id'];
	}
	else
	{
		
		$iidd = 'C00'.$sdata['id'];
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
            <h1 class="m-0 text-dark">Edit Complaint</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item">Complaints Section</li>
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

              $reply = $_POST['reply'];
              $text_status = $_POST['text_status'];
              $status = $_POST['status'];


              if(empty($reply) or empty($text_status) or empty($status))
              {
                $error = "Please fill all fields";
              }
              else
			  {
				  
				  $question_insert = "UPDATE complaint SET reply = '$reply', text_status = '$text_status', status = '$status' WHERE id = '$id'";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:complaints.php');
                }
                else
                {
                  $error = "Some error occurred";
                }
				
				
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
                    <label for="name">ID</label>
                    <a type="text" class="form-control" value="<?= $data['name']; ?>" name="name" placeholder="Enter Name" disabled><?= $iidd; ?></a>
                  </div>
				  
				  <div class="form-group">
                    <label for="username">Name</label>
                    <a type="text" class="form-control" name="username" placeholder="Enter Username" disabled><?= $sdata['name']; ?></a>
                  </div>
				
                  <div class="form-group">
                    <label for="password">Phone</label>
                    <a type="password" class="form-control" name="password" placeholder="Enter Password" disabled><?= $sdata['phone']; ?></a>
                  </div>
				  
				  <div class="form-group">
                    <label for="password">Subject</label>
                    <a type="password" class="form-control" name="password" placeholder="Enter Password" disabled><?= $data['subject']; ?></a>
                  </div>
				  
				  <div class="form-group">
                    <label for="password">Body</label>
                    <a type="password" class="form-control" name="password" placeholder="Enter Password" disabled><?= $data['body']; ?></a>
                  </div>
				  
				  <div class="form-group">
                    <label for="reply">Reply</label>
                    <div class="mb-3">
                <textarea class="textarea" placeholder="Place some text here" name="reply"><?= $data['reply']; ?></textarea>
              </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="text_status">Text Status</label>
                    <input type="text" class="form-control" value="<?= $data['text_status']; ?>" name="text_status" placeholder="Enter Status">
                  </div>
				  
                  
                 <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" style="width: 100%;" name="status" aria-hidden="true">
                    <?php
					$s = $data['status'];
					if($s == 'pending')
					{
					?>
                    <option value="pending" selected>Pending</option>
					<?php
					}
					else
					{
					?>
					<option value="pending">Pending</option>
					<?php
					}
					?>
					<?php
					if($s == 'in progress')
					{
					?>
                    <option value="in progress" selected>In progress</option>
					<?php
					}
					else
					{
					?>
					<option value="in progress">In progress</option>
					<?php
					}
					?>
					<?php
					if($s == 'forwarded for action')
					{
					?>
                    <option value="forwarded for action" selected>forwarded for action</option>
					<?php
					}
					else
					{
					?>
					<option value="forwarded for action">Forwarded for action</option>
					<?php
					}
          ?>
          <?php
					if($s == 'closed')
					{
					?>
                    <option value="closed" selected>Closed</option>
					<?php
					}
					else
					{
					?>
					<option value="closed">Closed</option>
					<?php
					}
					?>
					<?php
					if($s == 'no action required')
					{
					?>
                    <option value="no action required" selected>No action required</option>
					<?php
					}
					else
					{
					?>
					<option value="no action required">No action required</option>
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
