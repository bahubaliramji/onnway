<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];

    $already = "no";
    $id = "";

    $edit_query = "SELECT * FROM order_invoice WHERE order_id = '$edit_id'";
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
                    <h1 class="m-0 text-dark">Edit Invoice</h1>
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
                        <form role="form" id="invoiceform" method="POST">
                            <div class="card-body">

                                <input type="hidden" class="form-control" id="already" value="<?= $already; ?>" name="already" placeholder="Name" required>
                                <input type="hidden" class="form-control" id="order_id" value="<?= $edit_id; ?>" name="order_id" placeholder="Name" required>
                                <input type="hidden" class="form-control" id="id" value="<?= $data['id']; ?>" name="id" placeholder="Name" required>

                                <div class="row">
                                    <div class="col-12">
                                        <label for="name" class="col-sm-2 control-label">Bill To</label>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Name</label>
                                            <input type="text" class="form-control" id="bill_to_name" value="<?= $data['bill_to_name']; ?>" name="bill_to_name" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Telephone</label>
                                            <input type="number" class="form-control" id="bill_to_tel" value="<?= $data['bill_to_tel']; ?>" name="bill_to_tel" placeholder="Telephone" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Address</label>
                                            <input type="text" class="form-control" id="bill_to_address" value="<?= $data['bill_to_address']; ?>" name="bill_to_address" placeholder="Address" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Attention To</label>
                                            <input type="text" class="form-control" id="attention_to" value="<?= $data['attention_to']; ?>" name="attention_to" placeholder="Attention To" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Shipped To</label>
                                            <input type="text" class="form-control" id="shipped_to" value="<?= $data['shipped_to']; ?>" name="shipped_to" placeholder="Shipped To" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Invoice Number</label>
                                            <input type="number" class="form-control" id="invoice_number" value="<?= $data['invoice_number']; ?>" name="invoice_number" placeholder="Invoice Number" required>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Date</label>
                                            <input type="text" class="form-control" id="date" value="<?= $data['date']; ?>" name="date" placeholder="Date" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Ref. Invoice</label>
                                            <input type="number" class="form-control" id="ref_invoice" value="<?= $data['ref_invoice']; ?>" name="ref_invoice" placeholder="Ref. Invoice" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">LR Number</label>
                                            <input type="number" class="form-control" id="lr_number" value="<?= $data['lr_number']; ?>" name="lr_number" placeholder="LR Number" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Schedule Date</label>
                                            <input type="text" class="form-control" id="scheduled_date" value="<?= $data['scheduled_date']; ?>" name="scheduled_date" placeholder="Schedule Date" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Source</label>
                                            <input type="text" class="form-control" id="source" value="<?= $data['source']; ?>" name="source" placeholder="Source" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Destination</label>
                                            <input type="text" class="form-control" id="destination" value="<?= $data['destination']; ?>" name="destination" placeholder="Destination" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description1" value="<?= $data['description1']; ?>" name="description1" placeholder="Description" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity1" value="<?= $data['quantity1']; ?>" name="quantity1" placeholder="Quantity" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Unit Price</label>
                                            <input type="number" class="form-control" id="unit_price1" value="<?= $data['unit_price1']; ?>" name="unit_price1" placeholder="Unit Price" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Amount</label>
                                            <input type="number" class="form-control" id="amount1" value="<?= $data['amount1']; ?>" name="amount1" placeholder="Amount" required>
                                        </div>
                                    </div>



                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description2" value="<?= $data['description2']; ?>" name="description2" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity2" value="<?= $data['quantity2']; ?>" name="quantity2" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Unit Price</label>
                                            <input type="number" class="form-control" id="unit_price2" value="<?= $data['unit_price2']; ?>" name="unit_price2" placeholder="Unit Price">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Amount</label>
                                            <input type="number" class="form-control" id="amount2" value="<?= $data['amount2']; ?>" name="amount2" placeholder="Amount">
                                        </div>
                                    </div>


                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description3" value="<?= $data['description3']; ?>" name="description3" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity3" value="<?= $data['quantity3']; ?>" name="quantity3" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Unit Price</label>
                                            <input type="number" class="form-control" id="unit_price3" value="<?= $data['unit_price3']; ?>" name="unit_price3" placeholder="Unit Price">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Amount</label>
                                            <input type="number" class="form-control" id="amount3" value="<?= $data['amount3']; ?>" name="amount3" placeholder="Amount">
                                        </div>
                                    </div>



                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description4" value="<?= $data['description4']; ?>" name="description4" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity4" value="<?= $data['quantity4']; ?>" name="quantity4" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Unit Price</label>
                                            <input type="number" class="form-control" id="unit_price4" value="<?= $data['unit_price4']; ?>" name="unit_price4" placeholder="Unit Price">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Amount</label>
                                            <input type="number" class="form-control" id="amount4" value="<?= $data['amount4']; ?>" name="amount4" placeholder="Amount">
                                        </div>
                                    </div>



                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description5" value="<?= $data['description5']; ?>" name="description5" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity5" value="<?= $data['quantity5']; ?>" name="quantity5" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Unit Price</label>
                                            <input type="number" class="form-control" id="unit_price5" value="<?= $data['unit_price5']; ?>" name="unit_price5" placeholder="Unit Price">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Amount</label>
                                            <input type="number" class="form-control" id="amount5" value="<?= $data['amount5']; ?>" name="amount5" placeholder="Amount">
                                        </div>
                                    </div>


                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description6" value="<?= $data['description6']; ?>" name="description6" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity6" value="<?= $data['quantity6']; ?>" name="quantity6" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Unit Price</label>
                                            <input type="number" class="form-control" id="unit_price6" value="<?= $data['unit_price6']; ?>" name="unit_price6" placeholder="Unit Price">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Amount</label>
                                            <input type="number" class="form-control" id="amount6" value="<?= $data['amount6']; ?>" name="amount6" placeholder="Amount">
                                        </div>
                                    </div>


                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description7" value="<?= $data['description7']; ?>" name="description7" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity7" value="<?= $data['quantity7']; ?>" name="quantity7" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Unit Price</label>
                                            <input type="number" class="form-control" id="unit_price7" value="<?= $data['unit_price7']; ?>" name="unit_price7" placeholder="Unit Price">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Amount</label>
                                            <input type="number" class="form-control" id="amount7" value="<?= $data['amount7']; ?>" name="amount7" placeholder="Amount">
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description8" value="<?= $data['description8']; ?>" name="description8" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity8" value="<?= $data['quantity8']; ?>" name="quantity8" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Unit Price</label>
                                            <input type="number" class="form-control" id="unit_price8" value="<?= $data['unit_price8']; ?>" name="unit_price8" placeholder="Unit Price">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Amount</label>
                                            <input type="number" class="form-control" id="amount8" value="<?= $data['amount8']; ?>" name="amount8" placeholder="Amount">
                                        </div>
                                    </div>


                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description9" value="<?= $data['description9']; ?>" name="description9" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity9" value="<?= $data['quantity9']; ?>" name="quantity9" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Unit Price</label>
                                            <input type="number" class="form-control" id="unit_price9" value="<?= $data['unit_price9']; ?>" name="unit_price9" placeholder="Unit Price">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Amount</label>
                                            <input type="number" class="form-control" id="amount9" value="<?= $data['amount9']; ?>" name="amount9" placeholder="Amount">
                                        </div>
                                    </div>


                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Description</label>
                                            <input type="text" class="form-control" id="description10" value="<?= $data['description10']; ?>" name="description10" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity10" value="<?= $data['quantity10']; ?>" name="quantity10" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Unit Price</label>
                                            <input type="number" class="form-control" id="unit_price10" value="<?= $data['unit_price10']; ?>" name="unit_price10" placeholder="Unit Price">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Amount</label>
                                            <input type="number" class="form-control" id="amount10" value="<?= $data['amount10']; ?>" name="amount10" placeholder="Amount">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="name" class="col-sm-2 control-label">Comments Section</label>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Amount</label>
                                            <input type="number" class="form-control" id="comments_amount" value="<?= $data['comments_amount']; ?>" name="comments_amount" placeholder="Amount" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Transaction ID</label>
                                            <input type="text" class="form-control" id="comments_tid" value="<?= $data['comments_tid']; ?>" name="comments_tid" placeholder="Transaction ID" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Transaction Date</label>
                                            <input type="text" class="form-control" id="comments_t_date" value="<?= $data['comments_t_date']; ?>" name="comments_t_date" placeholder="Transaction Date" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Note</label>
                                            <input type="text" class="form-control" id="note" value="<?= $data['note']; ?>" name="note" placeholder="Note" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="name" class="col-sm-2 control-label">Price Section</label>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Adjustments</label>
                                            <input type="number" class="form-control" id="price_adjustments" value="<?= $data['price_adjustments']; ?>" name="price_adjustments" placeholder="Adjustments" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Delivery</label>
                                            <input type="number" class="form-control" id="price_delivery" value="<?= $data['price_delivery']; ?>" name="price_delivery" placeholder="Delivery" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-12 control-label">Paid Amount</label>
                                            <input type="number" class="form-control" id="price_paid_amount" value="<?= $data['price_paid_amount']; ?>" name="price_paid_amount" placeholder="Paid Amount" required>
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