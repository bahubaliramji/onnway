<?php
ob_start();
session_start();
include '../inc/db.php';
// $name = $_SESSION['name'];
// $role = $_SESSION['role'];

mysqli_set_charset($con,  'utf8');

error_reporting(1);

// define("base_url", "http://localhost/onnway/admin/");
// define("base_url2", "http://localhost/onnway/");

// if (!isset($_SESSION['username'])) {
//     header('Location:index.php');
// }




?>

<?php



date_default_timezone_set("Asia/Kolkata");


$id = $_GET['id'];


$data = mysqli_fetch_array(mysqli_query($dbhandle, "SELECT * FROM order_invoice WHERE order_id = '$id'"));

$user_id = $data['bill_to_name'];

$loadtype = $data['laod_type'];

$freight = $data['freight'];
$other_charges = $data['other_charges'];
$cgst = $data['cgst'];
$sgst = $data['sgst'];
$insurance = $data['insurance'];
$status = $data['status'];
$truck_type = $data['truck_type'];
$material = $data['material'];
$created = $data['created'];
$source = $data['source'];
$destination = $data['destination'];
$schedule = $data['schedule'];
$paid_amount = $data['paid_amount'];

$destinationLAT = $data['destinationLAT'];
$destinationLNG = $data['destinationLNG'];
$sourceLAT = $data['sourceLAT'];
$sourceLNG = $data['sourceLNG'];

$query41 = mysqli_query($con, "SELECT * FROM delivery_logs WHERE order_id = '$id'");
$row41 = mysqli_fetch_array($query41);

$deliverylat = $row41['lat'];
$deliverylng = $row41['lng'];

$fr = $freight + $other_charges + $cgst + $sgst + $insurance;


$query4 = mysqli_query($con, "SELECT * FROM trucks WHERE id = '$truck_type'");
$row4 = mysqli_fetch_array($query4);

$query5 = mysqli_query($con, "SELECT * FROM tbl_material WHERE id = '$material'");
$row5 = mysqli_fetch_array($query5);


$pdata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM loader_profile_tbl WHERE user_id = '$user_id'"));

$udata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'"));
//echo "SELECT * FROM users WHERE id = '$user_id'";
$lphone = $udata['phone'];

$ltype = $pdata['type'];
$lname1 = $pdata['name'];
$lcity = $pdata['city'];

if ($ltype == 'Company') {
    $lname = $pdata['company'];
} else {
    $lname = $pdata['name'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta cha&#8377;et="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freight Invoice</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
        }

        .border-left {
            border-left: 2px solid black;
        }

        .border-right {
            border-right: 2px solid black;
        }

        .border-top {
            border-top: 2px solid black;
        }

        .border-bottom-none {
            border-bottom: none;
        }

        .border-bottom {
            border-bottom: 2px solid black;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        body {
            margin: 20px;
            border: 2px solid black;
        }

        .width-4-column td,
        th {
            width: 25%;
        }

        table,
        tr {
            width: 100%;
        }

        .nav {
            display: flex;
            width: 100%;
            padding-bottom: 20px;
        }

        #float-right {
            position: absolute;
            right: 50px;
        }

        .box-addr {
            display: flex;
            margin-left: 140px;
        }

        .addr2-box p {
            font-size: 12px;
        }

        .addr2-box {
            margin-left: 75px;
        }

        .box-logo2 {
            margin-left: 80px;
        }

        .box-addr h4 {
            width: 90px;
            margin-top: 20px;
        }

        .heading-red h4 {
            color: darkred;
            padding-top: 4px;
        }

        .box-1 td,
        th,
        p {
            font-size: 15px;
        }

        .font-itelic {
            font-style: italic;
        }

        table,
        td,
        th,
        tr {
            padding: 2px;
            border-collapse: collapse;
        }

        .font-15 {
            font-size: 12px;
        }

        .font-red {
            color: red;
        }

        .border {
            border: 2px solid black;
        }

        .box-2 .width-2-column td,
        .box-2 .width-2-column th {
            width: 50%;
        }

        .box-2 .width-2-column tr {
            width: 100%;
        }

        .width100 {
            width: 100% !important;
        }
    </style>
</head>

<body>
    <div class="nav border-bottom">
        <div class="box-logo1">
            <img src="logo1.JPG" alt="">
        </div>
        <div class="box-addr-logo2" id="float-right">
            <div class="box-addr">
                <h4 class="text-center">Powered By:</h4>
                <div class="box-logo2">
                    <img src="logo2.JPG" alt="">
                </div>
            </div>
            <div class="addr2-box">
                <p class="text-right">25,C Sector,Indrapuri BHEL, Bhopal, MP 462021, India</p>
                <p class="text-right">Tel : +91 91111 92233, +91 91111 92244, Email : support@onnway.com</p>

                <p class="text-right">Visit us at : www.onnway.com, PAN Number : AARFK6361M</p>
            </div>


        </div>
    </div>

    <div class="heading-red text-center border-bottom">

        <h4>FREIGHT INVOICE</h4>
    </div>

    <div class="box-1">
        <table class="width-4-column">
            <tr>
                <td>
                    <p class="font-itelic">Bill To</p>
                </td>

                <td>
                    Invoice NO#

                </td>
                <td class="text-left">
                    <strong> <?= $data['invoice_number']; ?></strong>
                </td>
            </tr>
            <tr>
                <td class="address-line-one width-50">
                    <strong>
                        <?= $data['bill_to_name']; ?>
                    </strong>
                </td>
                <td>
                    Date
                </td>
                <td class="text-left">
                    <?= $data['date']; ?>
                </td>
            </tr>
            <tr>
                <td class="address-line-two">
                    <?= $data['bill_to_address']; ?>
                </td>
                <td>
                    Your Ref Invoice#
                </td>
                <td class="text-left"><?= $data['ref_invoice']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    Lorry Receipt Ref#
                </td>
                <td class="text-left"><?= $data['lr_number']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Credit Trems</td>
                <td class="text-left"></td>
            </tr>
            <tr>
                <td><strong>Tel :</strong> <?= $data['bill_to_tel']; ?></td>

                <th class="text-left">Shipping Details</th>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td class="text-left">
                    <strong>Attention To :</strong> Mr. <?= $data['attention_to']; ?>
                </td>
                <td>
                    Scheduled Date
                </td>
                <td><?= $data['scheduled_date']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>From</td>
                <td><?= $data['source']; ?></td>

            </tr>
            <tr>
                <td></td>
                <td>To</td>
                <td><?= $data['destination']; ?></td>

            </tr>
            <?php
            $subtotal = $data['amount1'];
            ?>
            <tr>
                <th class="text-left border-top border-bottom">Description</th>
                <th class="border-top border-bottom border-left border-right">Quantity</th>
                <th class="border-top border-bottom border-left border-right">Unit Price</th>
                <th class="border-top border-bottom border-left border-right">Amount</th>
            </tr>
            <tr>
                <td class="border-right"><?= $data['description1']; ?></td>
                <td class="border-right text-center"><?= $data['quantity1']; ?></td>
                <td class="border-right text-center">&#8377; <?= $data['unit_price1']; ?></td>
                <td class="text-right">&#8377; <?= $data['amount1']; ?></td>
            </tr>
            <?php
            if ($data['description2']) {
                $subtotal = $subtotal + $data['amount2'];
            ?>
                <tr>
                    <td class="border-right"><?= $data['description2']; ?></td>
                    <td class="border-right text-center"><?= $data['quantity2']; ?></td>
                    <td class="border-right text-center">&#8377; <?= $data['unit_price2']; ?></td>
                    <td class="text-right">&#8377; <?= $data['amount2']; ?></td>
                </tr>
            <?php
            }
            ?>


            <?php
            if ($data['description3']) {
                $subtotal = $subtotal + $data['amount3'];

            ?>
                <tr>
                    <td class="border-right"><?= $data['description3']; ?></td>
                    <td class="border-right text-center"><?= $data['quantity3']; ?></td>
                    <td class="border-right text-center">&#8377; <?= $data['unit_price3']; ?></td>
                    <td class="text-right">&#8377; <?= $data['amount3']; ?></td>
                </tr>
            <?php
            }
            ?>


            <?php
            if ($data['description4']) {
                $subtotal = $subtotal + $data['amount4'];
            ?>
                <tr>
                    <td class="border-right"><?= $data['description4']; ?></td>
                    <td class="border-right text-center"><?= $data['quantity4']; ?></td>
                    <td class="border-right text-center">&#8377; <?= $data['unit_price4']; ?></td>
                    <td class="text-right">&#8377; <?= $data['amount4']; ?></td>
                </tr>
            <?php
            }
            ?>

            <?php
            if ($data['description5']) {
                $subtotal = $subtotal + $data['amount5'];
            ?>
                <tr>
                    <td class="border-right"><?= $data['description5']; ?></td>
                    <td class="border-right text-center"><?= $data['quantity5']; ?></td>
                    <td class="border-right text-center">&#8377; <?= $data['unit_price5']; ?></td>
                    <td class="text-right">&#8377; <?= $data['amount5']; ?></td>
                </tr>
            <?php
            }
            ?>

            <?php
            if ($data['description6']) {
                $subtotal = $subtotal + $data['amount6'];
            ?>
                <tr>
                    <td class="border-right"><?= $data['description6']; ?></td>
                    <td class="border-right text-center"><?= $data['quantity6']; ?></td>
                    <td class="border-right text-center">&#8377; <?= $data['unit_price6']; ?></td>
                    <td class="text-right">&#8377; <?= $data['amount6']; ?></td>
                </tr>
            <?php
            }
            ?>


            <?php
            if ($data['description7']) {
                $subtotal = $subtotal + $data['amount7'];
            ?>
                <tr>
                    <td class="border-right"><?= $data['description7']; ?></td>
                    <td class="border-right text-center"><?= $data['quantity7']; ?></td>
                    <td class="border-right text-center">&#8377; <?= $data['unit_price7']; ?></td>
                    <td class="text-right">&#8377; <?= $data['amount7']; ?></td>
                </tr>
            <?php
            }
            ?>


            <?php
            if ($data['description8']) {
                $subtotal = $subtotal + $data['amount8'];
            ?>
                <tr>
                    <td class="border-right"><?= $data['description8']; ?></td>
                    <td class="border-right text-center"><?= $data['quantity8']; ?></td>
                    <td class="border-right text-center">&#8377; <?= $data['unit_price8']; ?></td>
                    <td class="text-right">&#8377; <?= $data['amount8']; ?></td>
                </tr>
            <?php
            }
            ?>


            <?php
            if ($data['description9']) {
                $subtotal = $subtotal + $data['amount9'];
            ?>
                <tr>
                    <td class="border-right"><?= $data['description9']; ?></td>
                    <td class="border-right text-center"><?= $data['quantity9']; ?></td>
                    <td class="border-right text-center">&#8377; <?= $data['unit_price9']; ?></td>
                    <td class="text-right">&#8377; <?= $data['amount9']; ?></td>
                </tr>
            <?php
            }
            ?>


            <?php
            if ($data['description10']) {
                $subtotal = $subtotal + $data['amount10'];
            ?>
                <tr>
                    <td class="border-right"><?= $data['description10']; ?></td>
                    <td class="border-right text-center"><?= $data['quantity10']; ?></td>
                    <td class="border-right text-center">&#8377; <?= $data['unit_price10']; ?></td>
                    <td class="text-right">&#8377; <?= $data['amount10']; ?></td>
                </tr>
            <?php
            }
            ?>
            <!-- space in table -->


            <!-- comment section -->
            <tr>
                <th class="text-left border-top">
                    Comments
                </th>
                <td class="border-top"></td>
                <th class="text-right border"> Sub Total</th>
                <td class="text-right border"> <strong>
                        &#8377; <?= $subtotal; ?>
                    </strong>
                </td>
            </tr>
            <tr>
                <td class="text-center width-50">
                    Amount Paid Details:(Through IMPS/NEFT)
                </td>
                <td></td>
                <th class="text-right border">Adjustments</th>
                <td class="text-right border"> <strong>
                        &#8377; <?= $data['price_adjustments']; ?>
                    </strong>
                </td>
            </tr>
            <tr>
                <td>
                    Amount &nbsp;&nbsp;&nbsp;: &#8377; <?= $data['comments_amount']; ?></p>
                </td>
                <td></td>
                <th class="text-right border">Invoice Total</th>
                <td class="text-right border"> <strong>
                        &#8377; <?= $subtotal + $data['price_adjustments']; ?>
                    </strong>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="font-15">Transaction ID : <?= $data['comments_tid']; ?></p>
                </td>
                <td></td>
                <th class="text-right border"></th>
                <th class="text-right border"></th>
            </tr>
            <tr>
                <td>
                    <p class="font-15">Transaction Date: <?= $data['comments_t_date']; ?></p>
                    </p>
                </td>
                <td></td>
                <th class="text-right border">Delivery</th>
                <th class="text-right border"> &#8377; <?= $data['price_delivery']; ?></th>
            </tr>
            <tr>
                <td class="width-50 border-top">
                    NOTE- <?= $data['note']; ?>
                </td>
                <td class="border-top"></td>
                <th class="text-right border">Amount Paid</th>
                <th class="text-right border"> &#8377; <?= $data['price_paid_amount']; ?></th>
            </tr>
            <tr>
                <td class="border-bottom">
                    <p class="font-15 "></p>
                </td>
                <td class="border-bottom"></td>
                <th class="text-right border"> Balance Due</th>
                <th class="text-right font-red border">&#8377; <?= ($subtotal + $data['price_adjustments'] + $data['price_delivery']) - $data['price_paid_amount']; ?></th>
            </tr>

            <tr>
                <td>
                    <strong>Remark :</strong>
                </td>
            </tr>

            <tr>
                <td class="width100"> Payment should be made only Through <strong>IMPS /NEFT /RTGS /CHEQUE</strong> in favour of KEDSONS TECHNOLOGIES.
                </td>


            </tr>

            <tr>


            <tr>
                <td class="border">Currant Account Name</td>
                <td class="border">KEDSONS TECHNOLOGIES</td>
                <td class="border">Bank </td>
                <td class="border">ICICI BANK</td>
            </tr>
            <tr>
                <td class="border">Account Number </td>
                <td class="border">118805000747</td>
                <td class="border">Branch </td>
                <td class="border">BHEL, BHOPAL</td>
            </tr>
            <tr>
                <td class="border">IFSC Code </td>
                <td class="border-bottom">ICIC0001188</td>
                <td class="border-bottom"></td>
                <td class="border-bottom"></td>
            </tr>


        </table>
    </div>

    <div class="box-2">
        <table>
            <tr>
                <td>This invoice is subjected to onnway terms and conditions.</td>
                <td class="text-center">
                    <strong>Authorized Signatory</strong>

                </td>
            </tr>
            <tr>
                <td></td>
                <td class="text-center">

                    <img src="sign.JPG" alt="">
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="text-center">
                    For Onnway.com : Transport & Logistics
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="text-center">
                    Kedsons Technologies
                </td>
            </tr>

        </table>
    </div>





</body>

</html>