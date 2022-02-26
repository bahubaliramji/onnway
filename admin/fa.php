<?php

include('inc/head2.php');

?>

<?php

include('inc/sidebar2.php');
	  
	  $GLOBALS['base_url'] = base_url ;
	  
    $id = $bid;
    $squery =  "SELECT * FROM brands WHERE user_id = '$id'";
    $data = mysqli_fetch_array(mysqli_query($con , $squery));
    $udata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$id'"));
	
  

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">FAQs</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard2.php">Home</a></li>
                        <li class="breadcrumb-item active">FAQs</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div id="accordion">
                                <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->

                                <?php

$query = "SELECT * FROM faq";
$runq = mysqli_query($con , $query);
while($data = mysqli_fetch_array($runq))
{

?>

                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4 class="card-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $data['id']; ?>">
                                                <?= $data['question']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?= $data['id']; ?>" class="panel-collapse collapse in">
                                        <div class="card-body">
                                        <?= $data['answer']; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
}
                 ?>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
  include('inc/footer.php');
  ?>