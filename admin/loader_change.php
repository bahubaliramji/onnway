<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $del_query = "DELETE FROM `trucks` WHERE `trucks`.`id` = '$del_id'";
    if (mysqli_query($con, $del_query)) {
        $msg = "Truck Has Been Deleted";
    } else {
        $error = "Truck Hasn't Been Deleted";
    }
}

$row33 = mysqli_query($con, "UPDATE count SET name = 'unread'");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Name Change Requests</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Name Change Requests</li>
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

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM loader_profile_request ORDER BY id DESC";
                                    $query_run = mysqli_query($con, $query);
                                    if (mysqli_num_rows($query_run) > 0) {

                                        $sno = 0;
                                        while ($row = mysqli_fetch_array($query_run)) {

                                            $sno++;

                                            $id = $row['id'];
                                            $user_id = $row['user_id'];
                                            $name = $row['name'];
                                            // $created = $row['created'];

                                            $query2 = mysqli_query($con, "SELECT * FROM loader_profile_tbl WHERE user_id = '$user_id'");
                                            $row2 = mysqli_fetch_array($query2);

                                    ?>
                                            <tr>
                                                <td><?= $sno; ?></td>

                                                <td><a href="loader_detail.php?id=<?= $user_id; ?>"><?php echo (!$row2['name']) ?  $row['name']: $row2['name'] ; ?></a></td>
                                                <td><?php echo (!$row2['email']) ?  $row['email']: $row2['email'] ; ?></td>
                                                <td style="text-align-last: center;"><a href="update_loader_request.php?edit=<?= $id; ?>"><i class="fas fa-pencil-alt"></i></a></td>
                                            </tr>
                                    <?php }
                                    } ?>
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
