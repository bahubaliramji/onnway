<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    $edit_query = "SELECT * FROM orders WHERE id = '$edit_id'";
    $edit_run = mysqli_query($con, $edit_query);
    $edit_row = mysqli_fetch_array($edit_run);
    $source = $edit_row['source'];
    $destination = $edit_row['destination'];
    $truck_id = $edit_row['truck_type'];
    $schedule = $edit_row['schedule'];
    $weight = $edit_row['weight'];
    $material = $edit_row['material'];
    $pickup_address = $edit_row['pickup_address'];
    $pickup_city = $edit_row['pickup_city'];
    $pickup_pincode = $edit_row['pickup_pincode'];
    $pickup_phone = $edit_row['pickup_phone'];
    $drop_address = $edit_row['drop_address'];
    $drop_city = $edit_row['drop_city'];
    $drop_pincode = $edit_row['drop_pincode'];
    $drop_phone = $edit_row['drop_phone'];
    $remarks = $edit_row['remarks'];
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit booking</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
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


                        $source = $_POST['source'];
                        $destination = $_POST['destination'];
                        $type = $_POST['type'];
                        $schedule = $_POST['schedule'];
                        $weight = $_POST['weight'];
                        $material = $_POST['material'];
                        $pickup_address = $_POST['pickup_address'];
                        $pickup_city = $_POST['pickup_city'];
                        $pickup_pincode = $_POST['pickup_pincode'];
                        $pickup_phone = $_POST['pickup_phone'];
                        $drop_address = $_POST['drop_address'];
                        $drop_city = $_POST['drop_city'];
                        $drop_pincode = $_POST['drop_pincode'];
                        $drop_phone = $_POST['drop_phone'];

                        $question_insert = "UPDATE orders SET 
source = '$source',
destination = '$destination',
truck_type = '$type',
schedule = '$schedule',
weight = '$weight',
material = '$material',
pickup_address = '$pickup_address',
pickup_city = '$pickup_city',
pickup_pincode = '$pickup_pincode',
pickup_phone = '$pickup_phone',
drop_address = '$drop_address',
drop_city = '$drop_city',
drop_pincode = '$drop_pincode',
drop_phone = '$drop_phone'
WHERE id = '$edit_id'";

                        if (mysqli_query($con, $question_insert)) {
                            header('Location:loader_full_load_bid_order.php?id=' . $edit_id);
                        } else {
                            $error = "Some error occurred";
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
                        <form role="form" id="form" method="POST">
                            <div class="card-body">



                                <div class="form-group">
                                    <label for="inputEmail3">Source</label>

                                    <input type="text" class="form-control" id="source" value="<?= $source; ?>" name="source" placeholder="Source" required>

                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3">Destination</label>

                                    <input type="text" class="form-control" id="destination" value="<?= $destination; ?>" name="destination" placeholder="Destination" required>

                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3">Truck Type</label>

                                    <select class="form-control" data-placeholder="" name="type" style="width: 100%;">

                                        <?php
                                        $query = "SELECT * FROM trucks";
                                        $query_run = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($query_run)) {

                                            $rid = $row['id'];

                                            if ($rid == $truck_id) {

                                        ?>

                                                <option value="<?= $row['id']; ?>" selected><?= $row['type']; ?> -
                                                    <?= $row['title']; ?></option>


                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?= $row['id']; ?>"><?= $row['type']; ?> -
                                                    <?= $row['title']; ?></option>

                                        <?php



                                            }
                                        }
                                        ?>

                                    </select>

                                </div>



                                <div class="form-group">
                                    <label for="schedule">Schedule Date</label>

                                    <input type="text" class="form-control" id="schedule" value="<?= $schedule; ?>" name="schedule" placeholder="Schedule Date" required>

                                </div>

                                <div class="form-group">
                                    <label for="weight">Weight</label>

                                    <input type="text" class="form-control" id="weight" value="<?= $weight; ?>" name="weight" placeholder="Weight">

                                </div>

                                <div class="form-group">
                                    <label for="material">Material</label>

                                    <select class="form-control" data-placeholder="" name="material" style="width: 100%;">

                                        <?php
                                        $query = "SELECT * FROM tbl_material";
                                        $query_run = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($query_run)) {

                                            $rid = $row['id'];

                                            if ($rid == $material) {

                                        ?>

                                                <option value="<?= $row['id']; ?>" selected><?= $row['material_name']; ?>
                                                </option>


                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?= $row['id']; ?>"><?= $row['material_name']; ?></option>

                                        <?php



                                            }
                                        }
                                        ?>

                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="pickup_address">Pickup
                                        Address</label>

                                    <input type="text" class="form-control" id="pickup_address" value="<?= $pickup_address; ?>" name="pickup_address" placeholder="Pickup Address">

                                </div>

                                <div class="form-group">
                                    <label for="pickup_city">Pickup City</label>

                                    <input type="text" class="form-control" id="pickup_city" value="<?= $pickup_city; ?>" name="pickup_city" placeholder="Pickup City">

                                </div>

                                <div class="form-group">
                                    <label for="pickup_pincode">Pickup PIN
                                        Code</label>

                                    <input type="number" class="form-control" id="pickup_pincode" value="<?= $pickup_pincode; ?>" name="pickup_pincode" placeholder="Pickup PIN Code">

                                </div>

                                <div class="form-group">
                                    <label for="pickup_phone">Pickup Phone</label>

                                    <input type="number" class="form-control" id="pickup_phone" value="<?= $pickup_phone; ?>" name="pickup_phone" placeholder="Pick Up Phone">

                                </div>

                                <div class="form-group">
                                    <label for="drop_address">Drop Address</label>

                                    <input type="text" class="form-control" id="drop_address" value="<?= $drop_address; ?>" name="drop_address" placeholder="Drop Address">

                                </div>

                                <div class="form-group">
                                    <label for="drop_city">Drop City</label>

                                    <input type="text" class="form-control" id="drop_city" value="<?= $drop_city; ?>" name="drop_city" placeholder="Drop City">

                                </div>


                                <div class="form-group">
                                    <label for="drop_pincode">Drop PIN Code</label>

                                    <input type="number" class="form-control" id="drop_pincode" value="<?= $drop_pincode; ?>" name="drop_pincode" placeholder="Drop PIN Code">

                                </div>


                                <div class="form-group">
                                    <label for="drop_phone">Drop Phone</label>

                                    <input type="number" class="form-control" id="drop_phone" value="<?= $drop_phone; ?>" name="drop_phone" placeholder="Drop Phone">

                                </div>


                                <div class="form-group">
                                    <label for="remarks">Special Notes</label>

                                    <input type="text" class="form-control" id="remarks" value="<?= $remarks; ?>" name="remarks" placeholder="Special Notes" required>

                                </div>



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" onClick="MyFunction2(<?= $edit_id; ?>)" class="btn btn-primary">Submit</button>
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

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="plugins/datatables-fixedheader/js/fixedHeader.bootstrap4.min.js"></script>
<script src="plugins/datatables-scroller/js/dataTables.scroller.min.js"></script>
<script src="plugins/datatables-scroller/js/scroller.bootstrap4.min.js"></script>
<script src="plugins/datatables-select/js/dataTables.select.min.js"></script>
<script src="plugins/datatables-select/js/select.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.flash.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<!-- Filterizr-->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Ekko Lightbox -->
<script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>





<script>
    function MyFunction2(aid2) {

        var data = new FormData();
        data.append('id', aid2);
        var form_data = $('#form').serializeArray();
        $.each(form_data, function(key, input) {
            data.append(input.name, input.value);
        });

        //console.log(data);

        var settings = {
            "url": "data10.php",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "contentType": false,
            "data": data
        };

        $.ajax(settings).done(function(response) {
            console.log(response);
            window.history.back();
        });

        /*$.ajax({
            url: 'data5.php',
            method: 'post',
            data: 'id=' + aid2 + '&pay=' + pay
        }).done(function(dd) {

            console.log(dd);

            location.reload();

        })*/
    }
</script>


<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>








<script>
    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({
            gutterPixels: 3
        });
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
</script>
<script>
    $(function() {
        // Summernote
        $('.textarea').summernote()
    })
</script>

<script>
    $('#dates').daterangepicker({
        autoUpdateInput: false,
        locale: {
            format: 'YYYY-MM-DD'
        }
    })

    $('#dates').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
    });

    $('#dates').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
</script>


<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

</body>

</html>