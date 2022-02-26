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
                    <h1 class="m-0 text-dark">Knowledge Center</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard2.php">Home</a></li>
                        <li class="breadcrumb-item active">Knowledge Center</li>
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
                        <div class="card-body box-profile">

                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                        aria-orientation="vertical">

                                        <?php

$query = "SELECT * FROM knowledge_center WHERE type = 'brand'";
$runq = mysqli_query($con , $query);
$sno = 0;
while($data = mysqli_fetch_array($runq))
{
    $sno++;

    if($sno  == 1)
    {

?>



                                        <a class="nav-link active" id="vert-tabs-<?= $data['id']; ?>-tab"
                                            data-toggle="pill" href="#vert-tabs-<?= $data['id']; ?>" role="tab"
                                            aria-controls="vert-tabs-<?= $data['id']; ?>"
                                            aria-selected="true"><?= $data['heading']; ?></a>

                                        <?php
    }
    else
    {
        ?>

                                        <a class="nav-link" id="vert-tabs-<?= $data['id']; ?>-tab" data-toggle="pill"
                                            href="#vert-tabs-<?= $data['id']; ?>" role="tab"
                                            aria-controls="vert-tabs-<?= $data['id']; ?>"
                                            aria-selected="false"><?= $data['heading']; ?></a>

                                        <?php
    }
}
                 ?>

                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">

                                        <?php

$query = "SELECT * FROM knowledge_center WHERE type = 'brand'";
$runq = mysqli_query($con , $query);
$sno = 0;
while($data = mysqli_fetch_array($runq))
{
    $sno++;

    if($sno  == 1)
    {
?>

                                        <div class="tab-pane fade active show" id="vert-tabs-<?= $data['id']; ?>" role="tabpanel"
                                            aria-labelledby="vert-tabs-<?= $data['id']; ?>-tab">
                                            <?= $data['content']; ?>
                                        </div>

                                        <?php
    }
    else
    {
                                            ?>

                                        <div class="tab-pane fade" id="vert-tabs-<?= $data['id']; ?>" role="tabpanel"
                                            aria-labelledby="vert-tabs-<?= $data['id']; ?>-tab">
                                            <?= $data['content']; ?>
                                        </div>

                                        <?php
    }
}
                 ?>

                                    </div>
                                </div>
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