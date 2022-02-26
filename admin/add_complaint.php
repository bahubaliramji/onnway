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
            <h1 class="m-0 text-dark">Add Complaint</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item">Complaints Section</li>
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
            if(isset($_POST['submit']))
            {

              $user_id = $_POST['user_id'];
              $subject = $_POST['subject'];
              $body = $_POST['body'];
              $reply = $_POST['reply'];
              $text_status = $_POST['text_status'];
              $status = $_POST['status'];


              if(empty($subject) or empty($body) or empty($reply) or empty($text_status) or empty($status))
              {
                $error = "Please fill all fields";
              }
              else
			  {
				  
				  $question_insert = "INSERT INTO complaint SET user_id = '$user_id',subject = '$subject',body = '$body',reply = '$reply', text_status = '$text_status', status = '$status'";
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
				if(isset($error))
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
                    <label for="user_id">Select User</label>
                    <select class="form-control" style="width: 100%;" name="user_id" aria-hidden="true">
					<?php
					
					$uquery = "SELECT * FROM users WHERE name != ''";
					$runq = mysqli_query($con , $uquery);
					while($row = mysqli_fetch_array($runq))
					{
					?>
                    <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
					<?php
					}
					?>
                  </select>
                  </div>
				
				  
				  <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
                  </div>
				  
				  <div class="form-group">
                    <label for="body">Body</label>
                    <input type="text" class="form-control" name="body" placeholder="Enter Body">
                  </div>
				  
				  <div class="form-group">
                    <label for="reply">Reply</label>
                    <div class="mb-3">
                <textarea class="textarea" placeholder="Place some text here" name="reply"></textarea>
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
