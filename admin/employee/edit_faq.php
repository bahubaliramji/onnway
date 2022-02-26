<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['edit']))
  {
    $id = $_GET['edit'];
    $squery =  "SELECT * FROM faq WHERE id = '$id'";
    $data = mysqli_fetch_array(mysqli_query($con , $squery));
	
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit FAQs Content</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="faq.php">FAQs</a></li>
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

              
              $question = $_POST['question'];
              $answer = $_POST['answer'];

              if(empty($question) || empty($answer))
              {
                $error = "Please fill all fields";
              }
              else
			  {
				  
				  $question_insert = "UPDATE faq SET question = '$question', answer = '$answer' WHERE id = '$id'";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:faq.php');
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
                    <label for="question">Question</label>
                    <input type="text" class="form-control" name="question" value="<?= $data['question']; ?>" placeholder="Question">
                  </div>

                  <div class="form-group">
                    <label for="content">Answer</label>
                    <div class="mb-3">
                <textarea class="textarea" placeholder="Place some text here" name="answer"
                          style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $data['answer']; ?></textarea>
              </div>
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
