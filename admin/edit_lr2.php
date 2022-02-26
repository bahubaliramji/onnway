<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];

    $already = "no";
    $id = "";

    $edit_query = "SELECT * FROM order_lr WHERE order_id = '$edit_id'";
    $edit_run = mysqli_query($con, $edit_query);
    $count = mysqli_num_rows($edit_run);
    if ($count > 0) {
        $data = mysqli_fetch_array($edit_run);
        $already = "yes";
    } else {
        $edit_query1 = "SELECT * FROM orders WHERE id = '$edit_id'";
        $edit_run1 = mysqli_query($con, $edit_query1);
        $data = mysqli_fetch_array($edit_run1);
        $already = "no";
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
                    <h1 class="m-0 text-dark">Edit LR</h1>
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
                        <form role="form" id="lrform2" method="POST">
                            <div class="card-body">

                                <input type="hidden" class="form-control" id="already" value="<?= $already; ?>" name="already" placeholder="Name" required>
                                <input type="hidden" class="form-control" id="order_id" value="<?= $edit_id; ?>" name="order_id" placeholder="Name" required>
                                <input type="hidden" class="form-control" id="id" value="<?= $data['id']; ?>" name="id" placeholder="Name" required>

                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Lorry Receipt Number</label>
                                            <input type="number" class="form-control" id="lr_number" value="<?= $data['lr_number']; ?>" name="lr_number" placeholder="Lorry Receipt Number" required>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Date</label>
                                            <input type="text" class="form-control" id="date" value="<?= $data['date']; ?>" name="date" placeholder="Date" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Ref. Invoice</label>
                                            <input type="number" class="form-control" id="ref_invoice" value="<?= $data['ref_invoice']; ?>" name="ref_invoice" placeholder="Ref. Invoice" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Load ID</label>
                                            <input type="number" class="form-control" id="load_id" value="<?= $data['load_id']; ?>" name="load_id" placeholder="Load ID" required>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Source</label>
                                            <input type="text" class="form-control" id="source" value="<?= $data['source']; ?>" name="source" placeholder="Source" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Destination</label>
                                            <input type="text" class="form-control" id="destination" value="<?= $data['destination']; ?>" name="destination" placeholder="Destination" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="name" class="col-sm-12 control-label">Consignor Name & Address</label>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Name</label>
                                            <input type="text" class="form-control" id="consignor_name" value="<?= $data['consignor_name']; ?>" name="consignor_name" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Telephone</label>
                                            <input type="number" class="form-control" id="consignor_tel" value="<?= $data['consignor_tel']; ?>" name="consignor_tel" placeholder="Telephone" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Address</label>
                                            <input type="text" class="form-control" id="consignor_address" value="<?= $data['consignor_address']; ?>" name="consignor_address" placeholder="Address" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">GST Number</label>
                                            <input type="text" class="form-control" id="consignor_gst" value="<?= $data['consignor_gst']; ?>" name="consignor_gst" placeholder="GST Number" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="name" class="col-sm-12 control-label">Consignee Name & Address</label>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Name</label>
                                            <input type="text" class="form-control" id="consignee_name" value="<?= $data['consignee_name']; ?>" name="consignee_name" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Telephone</label>
                                            <input type="number" class="form-control" id="consignee_tel" value="<?= $data['consignee_tel']; ?>" name="consignee_tel" placeholder="Telephone" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Address</label>
                                            <input type="text" class="form-control" id="consignee_address" value="<?= $data['consignee_address']; ?>" name="consignee_address" placeholder="Address" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">GST Number</label>
                                            <input type="text" class="form-control" id="consignee_gst" value="<?= $data['consignee_gst']; ?>" name="consignee_gst" placeholder="GST Number" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Vehicle Number</label>
                                            <input type="text" class="form-control" id="vehicle_number" value="<?= $data['vehicle_number']; ?>" name="vehicle_number" placeholder="Vehicle Number" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Vehicle Type</label>
                                            <input type="text" class="form-control" id="vehicle_type" value="<?= $data['vehicle_type']; ?>" name="vehicle_type" placeholder="Vehicle Type" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Mode</label>
                                            <input type="text" class="form-control" id="mode" value="<?= $data['mode']; ?>" name="mode" placeholder="Mode" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Insurance Co.</label>
                                            <input type="text" class="form-control" id="insurance_co" value="<?= $data['insurance_co']; ?>" name="insurance_co" placeholder="Insurance Co." required>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Insurance Amount</label>
                                            <input type="number" class="form-control" id="insurance_amount" value="<?= $data['insurance_amount']; ?>" name="insurance_amount" placeholder="Insurance Amount" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Policy Number</label>
                                            <input type="text" class="form-control" id="policy_number" value="<?= $data['policy_number']; ?>" name="policy_number" placeholder="Policy Number" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Insurance Date</label>
                                            <input type="text" class="form-control" id="insurance_date" value="<?= $data['insurance_date']; ?>" name="insurance_date" placeholder="Insurance Date" required>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description1" value="<?= $data['description1']; ?>" name="description1" placeholder="Description" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity1" value="<?= $data['quantity1']; ?>" name="quantity1" placeholder="Quantity" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Weight</label>
                                            <input type="text" class="form-control" id="unit_price1" value="<?= $data['unit_price1']; ?>" name="unit_price1" placeholder="Weight" required>
                                        </div>
                                    </div>



                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description2" value="<?= $data['description2']; ?>" name="description2" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity2" value="<?= $data['quantity2']; ?>" name="quantity2" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Weight</label>
                                            <input type="text" class="form-control" id="unit_price2" value="<?= $data['unit_price2']; ?>" name="unit_price2" placeholder="Weight">
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description3" value="<?= $data['description3']; ?>" name="description3" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity3" value="<?= $data['quantity3']; ?>" name="quantity3" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Weight</label>
                                            <input type="text" class="form-control" id="unit_price3" value="<?= $data['unit_price3']; ?>" name="unit_price3" placeholder="Weight">
                                        </div>
                                    </div>



                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description4" value="<?= $data['description4']; ?>" name="description4" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity4" value="<?= $data['quantity4']; ?>" name="quantity4" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Weight</label>
                                            <input type="text" class="form-control" id="unit_price4" value="<?= $data['unit_price4']; ?>" name="unit_price4" placeholder="Weight">
                                        </div>
                                    </div>



                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description5" value="<?= $data['description5']; ?>" name="description5" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity5" value="<?= $data['quantity5']; ?>" name="quantity5" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Weight</label>
                                            <input type="text" class="form-control" id="unit_price5" value="<?= $data['unit_price5']; ?>" name="unit_price5" placeholder="Weight">
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description6" value="<?= $data['description6']; ?>" name="description6" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity6" value="<?= $data['quantity6']; ?>" name="quantity6" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Weight</label>
                                            <input type="text" class="form-control" id="unit_price6" value="<?= $data['unit_price6']; ?>" name="unit_price6" placeholder="Weight">
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description7" value="<?= $data['description7']; ?>" name="description7" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity7" value="<?= $data['quantity7']; ?>" name="quantity7" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Weight</label>
                                            <input type="text" class="form-control" id="unit_price7" value="<?= $data['unit_price7']; ?>" name="unit_price7" placeholder="Weight">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description8" value="<?= $data['description8']; ?>" name="description8" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity8" value="<?= $data['quantity8']; ?>" name="quantity8" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Weight</label>
                                            <input type="text" class="form-control" id="unit_price8" value="<?= $data['unit_price8']; ?>" name="unit_price8" placeholder="Weight">
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description9" value="<?= $data['description9']; ?>" name="description9" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity9" value="<?= $data['quantity9']; ?>" name="quantity9" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Weight</label>
                                            <input type="text" class="form-control" id="unit_price9" value="<?= $data['unit_price9']; ?>" name="unit_price9" placeholder="Weight">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description10" value="<?= $data['description10']; ?>" name="description10" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity10" value="<?= $data['quantity10']; ?>" name="quantity10" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Weight</label>
                                            <input type="text" class="form-control" id="unit_price10" value="<?= $data['unit_price10']; ?>" name="unit_price10" placeholder="Weight">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Declared Value of Consignment</label>
                                            <input type="number" class="form-control" id="declared_value" value="<?= $data['declared_value']; ?>" name="declared_value" placeholder="Declared Value of Consignment" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Freight Charge</label>
                                            <input type="number" class="form-control" id="freight_charge" value="<?= $data['freight_charge']; ?>" name="freight_charge" placeholder="Freight Charge" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Freight Charge Note</label>
                                            <input type="text" class="form-control" id="freight_charge_note" value="<?= $data['freight_charge_note']; ?>" name="freight_charge_note" placeholder="Freight Charge Note" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Note</label>
                                            <input type="text" class="form-control" id="note" value="<?= $data['note']; ?>" name="note" placeholder="Note" required>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="invoicesubmit" class="btn btn-primary">Submit</button>
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