<?php
ob_start();
session_start();
include '../inc/db.php';

mysqli_set_charset($con,  'utf8');

error_reporting(0);

define("base_url", "http://localhost/onnway/newadmin/");
define("base_url2", "http://localhost/onnway/");





?>

<?php



date_default_timezone_set("Asia/Kolkata");


$id = $_GET['id'];

$data = mysqli_fetch_array(mysqli_query($dbhandle, "SELECT * FROM order_lr WHERE order_id = '$id'"));

$truck_type = $data['vehicle_type'];


$query4 = mysqli_query($dbhandle, "SELECT * FROM trucks WHERE id = '$truck_type'");
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
$gst = $pdata['gst'];

if ($ltype == 'Company') {
    $lname = $pdata['company'];
} else {
    $lname = $pdata['name'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONNWAY.com LR</title>

    <script type="text/javascript" src="html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <style>
        * {
            padding: 0px;
            margin: 0px;
            border-collapse: collapse;
            padding-left: 1px;
        }

        body {

            /* to centre page on screen*/
            width: 21cm;
            height: 29.7cm;
            padding: 0px;
        }

        .nav {
            display: block;
            padding-top: 10px;
            border: 2px solid black;
            border-bottom: none;
        }

        .boxes {
            display: flex;
        }

        .box {
            text-align: center;
            width: 33.33%;
        }

        .title {
            color: white;
            background-color: grey;
            text-align: center;
        }

        .title h1 {
            font-size: 15px;
            /* background-color: grey; */
            padding: 0px;
        }

        .box3 {
            padding: 0px;
            margin: 0px;
            margin-left: -40px;
            width: 40% !important;
        }

        .box3 h2 {
            font-size: 14px;
            color: red;
        }

        .box3 p {
            font-size: 12px;
        }

        table,
        tr {
            width: 100%;
        }

        .nav table,
        .nav td,
        .nav th {
            border: none;
        }

        table,
        th,
        td {
            border: 2px solid black;
            border-collapse: collapse;
            padding: 0px;
            margin: 0px;
            text-align: left;
            /* padding-left: 5px; */
        }

        .nav th {
            width: 50%;
        }

        .grey {
            color: white;
            background-color: grey;
            border-right: none;
        }

        .grey p {
            font-size: 22px;
        }

        table p {
            font-size: 20px;
        }

        tr {
            width: 100%;
        }

        .border-none,
        .border-none tr,
        .border-none td {
            border-top: none;
            border-bottom: none;
        }

        .width-4-column td,
        .width-4-column th {
            width: 25%;
        }

        .width-2-column td,
        .width-2-column th {
            width: 50%;
        }

        .grey-col td {
            border-left: none;
        }

        .no-border,
        .no-border td,
        .no-border tr,
        .no-border table,
        .no-border th {
            border: none;
        }

        .border-bottom-none {
            border-bottom: none;
        }

        .border-top-none {
            border-top: none;
        }

        .border-left-none {
            border-left: none;
        }

        .border-right-none {
            border-right: none;
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

        #newform table,
        tr,
        td,
        th {
            border: none;
        }

        .padding-2px {
            padding: 2px;
        }

        .text-center {
            text-align: center;
        }

        .padding-left-5px {
            padding-left: 5px;
        }

        .font-small {
            /* font-size: 12px; */
        }

        .font-small p {
            font-size: 11px;
        }

        .width-8-column td,
        th {
            width: 12.50%;
        }

        .padding-large {
            padding: 50px 5px;
        }

        .head-width {
            width: 60%;
        }

        .head-width2 {
            width: 20%;
        }

        .text-left {
            text-align: left;
        }

        tr span {
            font-size: 10px;
        }

        .width-70 {
            width: 60%;
        }

        .width-30 {
            width: 40%;
        }

        .last-box {
            display: flex;
            width: 100%;
            height: 100%;
            /* border: 2px solid red; */
        }

        #table1 {
            width: 70%;
            border: 2px solid black;
            margin: 0px;
        }

        #table1 li {
            font-size: 9px;
        }

        #table2 {
            width: 30%;
            /* padding-top: 40px; */
            padding-left: 5px;
            margin: 0px;
        }

        #table2 h2 {
            font-size: 25px;
            margin: 0px;
            /* padding:20px 0px!important; */
        }

        .footer {
            display: flex;
            width: 100%;
            text-align: center;
        }

        .footer h4 {
            width: 80%;
        }
    </style>
</head>

<body>

    <div id="content">
        <div class="nav">
            <div class="boxes">
                <div class="box">
                    <img src="logo-1.JPG" alt="" class="logo">
                </div>
                <div class="box">
                    <img src="logo-2.JPG" alt="" class="bar-code">
                    <div class="title">
                        <h1>LORRY RECEIPT</h1>
                    </div>
                </div>
                <div class="box box3">
                    <h2>ONNWAY SOLUTIONS PRIVATE LIMITED</h2>
                    <p>

                        M/s KEDSONS TECHNOLOGIES
                    </p>

                    <p>

                        25, I Floor,Sector c,Indrpuri BHEL,
                    </p>

                    <p>

                        Raisen Road Bhopal, MP 462021, India.
                    </p>


                    <p>
                        support@onways.com, www.onway.com

                    </p>

                    <p>
                        PAN No.: AADCO3845R, Eway Id:23AADCO3845R1ZZ
                    </p>


                    <h2>Tel.:9111192233-44</h2>

                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>
                            <div class="inline">
                                <p>Lorry Receipt No.# <?= $data['lr_number']; ?></p>

                            </div>

                        </th>
                        <th>
                            <div class="inline">
                                <p>Date: <?= $data['date']; ?></p>

                            </div>

                        </th>

                    </tr>
                    <tr>
                        <th>
                            <div class="inline">
                                <p>Ref Invoice No.# <?= $data['ref_invoice']; ?></p>

                            </div>

                        </th>
                        <th>
                            <div class="inline">
                                <p>For load Id.# <?= $data['load_id']; ?></p>

                            </div>

                        </th>

                    </tr>
                </thead>
            </table>



        </div>

        <!-- end of nav bar -->

        <table class="width-4-column grey-col">
            <tr>
                <th class="grey">
                    <p>
                        From: <?= $data['source']; ?>
                    </p>
                </th>
                <td>

                </td>
                <th class="grey">
                    <p>
                        To: <?= $data['destination']; ?>
                    </p>
                </th>
                <td>

                </td>
            </tr>
        </table>


        <table class="width-2-column border-top-none border-bottom-none">
            <tr class="border-top-none">
                <td class="border-top-none border-right">
                    <p>CONSIGNOR NAME & ADDRESS</p>
                    <p class="blod"><?= $data['consignor_name']; ?></p>
                    <p>
                    <h5><?= $data['consignor_address']; ?></h5>
                    </p>
                </td>
                <td class="border-top-none border-bottom-none">
                    <p>CONSIGNEE NAME & ADDRESS</p>
                    <p class="blod"><?= $data['consignee_name']; ?></p>
                    <p>
                    <h5><?= $data['consignee_address']; ?></h5>
                    </p>
                </td>

            </tr>




        </table>


        <section id="newforms">
            <table class="border-top-none width-4-column padding-left-5px">
                <tr>
                    <th class="padding-left-5px">GST No.:</th>
                    <td><?= $data['consignor_gst']; ?></td>

                    <th class="border-left padding-left-5px">GST No.:</th>
                    <td><?= $data['consignee_gst']; ?></td>

                </tr>
                <tr>
                    <th class="padding-left-5px">Contact No.:</th>
                    <td><?= $data['consignor_tel']; ?></td>
                    <th class="border-left padding-left-5px">Contact No.:</th>
                    <td><?= $data['consignee_tel']; ?></td>

                </tr>

            </table>

            <table class="border-top-none width-4-column">
                <tr>
                    <th>Vehicle No.:</th>
                    <td><?= $data['vehicle_number']; ?></td>

                    <th>Vehicle Type</th>
                    <td><?= $row4['type'] . ' - ' . $row4['title']; ?></td>

                </tr>
                <tr>
                    <th>Mode </th>
                    <td><?= $data['mode']; ?></td>
                    <th></th>
                    <td></td>

                </tr>

            </table>

            <table class="width-2-column font-small text-center border-top-none">
                <tr>
                    <th class="text-center border-right">

                        <p>
                        <h4>AT OWNER'S RISK</h4>
                        </p>
                        <p>
                        <h4>INSURANCE</h4>
                        </p>
                        <p>The Consignor has stated that he has not insured the consignment Orhe has insured the consignment</p>
                        <table class="width-8-column  font-small border-bottom-none border-top-none border-left-none border-right-none">
                            <tr>
                                <td class="padding-left-5px" style="width: auto;">
                                    <h6>Insurance Co.</h6>

                                </td>
                                <td style="width: auto;">
                                    <h6><?= $data['insurance_co']; ?></h6>
                                </td>
                                <td>
                                    <h6>Amount.</h6>
                                </td>
                                <td style="width: auto;">
                                    <h6><?= $data['insurance_amount']; ?></h6>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <td class="padding-left-5px">
                                    <h6>Policy No.</h6>
                                </td>
                                <td>
                                    <h6><?= $data['policy_number']; ?></h6>
                                </td>
                                <td>
                                    <h6>Date.</h6>
                                </td>
                                <td>
                                    <h6><?= $data['insurance_date']; ?></h6>
                                </td>
                            </tr>
                        </table>
                    </th>
                    <th class="text-center">
                        <h5>NOTICE</h5>
                        <p>The Consignment covered by this Lorry Receipt shall be stored at the destination under the control of the Transport Operator & shall be delivered to the order of consignee Bank whose name is mentioned in the Lorry Receipt.It will under
                            no circumtances be delivered to anyone without the written authority form consignee Bank or its order endorsed on the Consignee Copy.
                        </p>
                        <h5>CAUTION</h5>
                        <p>This Consignment will not be detained, diverted, re-routed or re-booked without Consignee Bank written permission will be delivered at the destination. </p>
                    </th>
                </tr>
            </table>

            <table class="width-new-column text-left border-top-none">
                <tr>
                    <th class="grey head-width text-left border-right padding-left-5px">
                        DESCRIPTION(SAID TO CONTAIN)
                    </th>
                    <th class="grey head-width2 text-left border-right">
                        QUANTITY
                    </th>
                    <th class="grey head-width2 text-left">
                        WEIGHT
                    </th>
                </tr>
                <tr>
                    <td class="border-right"><?= $data['description1']; ?></td>
                    <td class="border-right"><?= $data['quantity1']; ?></td>
                    <td class="border-right"><?= $data['unit_price1']; ?></td>
                </tr>

                <?php
                if ($data['description2']) {
                    $subtotal = $subtotal + $data['amount2'];
                ?>
                    <tr>
                        <td class="border-right"><?= $data['description2']; ?></td>
                        <td class="border-right"><?= $data['quantity2']; ?></td>
                        <td class="border-right"><?= $data['unit_price2']; ?></td>
                    </tr>
                <?php
                }
                ?>

                <?php
                if ($data['description3']) {
                    $subtotal = $subtotal + $data['amount2'];
                ?>
                    <tr>
                        <td class="border-right"><?= $data['description3']; ?></td>
                        <td class="border-right"><?= $data['quantity3']; ?></td>
                        <td class="border-right"><?= $data['unit_price3']; ?></td>
                    </tr>
                <?php
                }
                ?>

                <?php
                if ($data['description4']) {
                    $subtotal = $subtotal + $data['amount2'];
                ?>
                    <tr>
                        <td class="border-right"><?= $data['description4']; ?></td>
                        <td class="border-right"><?= $data['quantity4']; ?></td>
                        <td class="border-right"><?= $data['unit_price4']; ?></td>
                    </tr>
                <?php
                }
                ?>

                <?php
                if ($data['description5']) {
                    $subtotal = $subtotal + $data['amount2'];
                ?>
                    <tr>
                        <td class="border-right"><?= $data['description5']; ?></td>
                        <td class="border-right"><?= $data['quantity5']; ?></td>
                        <td class="border-right"><?= $data['unit_price5']; ?></td>
                    </tr>
                <?php
                }
                ?>

                <?php
                if ($data['description6']) {
                    $subtotal = $subtotal + $data['amount2'];
                ?>
                    <tr>
                        <td class="border-right"><?= $data['description6']; ?></td>
                        <td class="border-right"><?= $data['quantity6']; ?></td>
                        <td class="border-right"><?= $data['unit_price6']; ?></td>
                    </tr>
                <?php
                }
                ?>

                <?php
                if ($data['description7']) {
                    $subtotal = $subtotal + $data['amount2'];
                ?>
                    <tr>
                        <td class="border-right"><?= $data['description7']; ?></td>
                        <td class="border-right"><?= $data['quantity7']; ?></td>
                        <td class="border-right"><?= $data['unit_price7']; ?></td>
                    </tr>
                <?php
                }
                ?>

                <?php
                if ($data['description8']) {
                    $subtotal = $subtotal + $data['amount2'];
                ?>
                    <tr>
                        <td class="border-right"><?= $data['description8']; ?></td>
                        <td class="border-right"><?= $data['quantity8']; ?></td>
                        <td class="border-right"><?= $data['unit_price8']; ?></td>
                    </tr>
                <?php
                }
                ?>


                <?php
                if ($data['description9']) {
                    $subtotal = $subtotal + $data['amount2'];
                ?>
                    <tr>
                        <td class="border-right"><?= $data['description9']; ?></td>
                        <td class="border-right"><?= $data['quantity9']; ?></td>
                        <td class="border-right"><?= $data['unit_price9']; ?></td>
                    </tr>
                <?php
                }
                ?>

                <?php
                if ($data['description10']) {
                    $subtotal = $subtotal + $data['amount2'];
                ?>
                    <tr>
                        <td class="border-right"><?= $data['description10']; ?></td>
                        <td class="border-right"><?= $data['quantity10']; ?></td>
                        <td class="border-right"><?= $data['unit_price10']; ?></td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td class="padding-left-5px border-right">
                        <p>
                        <h5>Comments:(CONTAIN NOT CHECKED)</h5>
                        </p>
                        </th>
                    <td class="border-right">
                        <p>
                        <h5><strong></strong></h5>
                        </p>

                    </td>
                    <td class="border-right">
                        <p>
                        <h5><strong></strong></h5>
                        </p>

                    </td>
                </tr>
                <tr class="border-top border-bottom-none">
                    <td class="padding-left-5px border-right border-bottom-none">
                        <p>
                        <h5>Declared value of consignment Rs : <?= $data['declared_value']; ?></h5>
                        </p>
                        </th>
                    <td class="border-bottom-none">
                        <p>
                        <h6><strong>NOTE : <?= $data['note']; ?></strong></h6>
                        </p>

                    </td>
                    <td class="border-bottom-none">
                        <p>
                        <h5><strong></strong></h5>
                        </p>

                    </td>
                </tr>
                <tr class="border-top border-bottom-none ">
                    <td class="padding-left-5px border-bottom-none">
                        <p><strong>
                                <h4>Freight Amount : ₹<?= $data['freight_charge']; ?></h4><span>
                                    <?= $data['freight_charge_note']; ?></span>
                            </strong></p>
                    </td>
                    <td class="border-bottom-none">


                    </td>
                    <td class="border-bottom-none">


                    </td>
                </tr>
            </table>





        </section>

        <section id="last-box" class="last-box inline">


            <table class="border-top-none" id="table1">
                <tr class="border-top-none">
                    <td class="border-top-none">
                        <ul class="" type="none">
                            <strong>Terms and Conditions: </strong>
                            <li>1.Check Vehicle Documents, Chasis No., Engine No. And Driving License before Loading.</li>
                            <li>2. Issue necessary documents, invoice, relevant documents of material to Vehicle Driver after proper loading. Consignor is liable for all consequences arising out of incorrect declaration of the contents of consignment.</li>
                            <li>3.Detention/ Delay in Loading & Unloading are chargeable after 24 hour and Detention charges also applied when truck is detained at checkpost by Govenment Depart.</li>
                            <li>4.Over Weight And Over Dimension are Chargeable and Inform at the time of booking/Loading.
                            </li>

                            <li>5.Government Fines are extra and payable by Loader/Consignor.</li>
                            <li>6.Company is not responsible for Leakage, Accident, Breakage and damages of any kind in Transit.
                            </li>
                            <li>7.Material Transit is at Owner's Risk. Consignor should take out their own insurance to protect themselves against loss of any.</li>
                            <li>8.The Company priority is to provide a hassle free and secure transit of consignment but the company not physically handles the shipment, and the Company is not responsible for any loss,damage, theft,expense or delay to the goods
                                for any reason whatsoever when said goods are in custody, possession or control of third parties selected by Company to transport or render other services with respect to such goods.The Company shall only be liable for any
                                loss,damage expense or delay to the goods resulting from the negligence or other fault of the Company; such liability shall be limited to an amount equal to the lesser of five thousand per shipment, provided that,in the case
                                of partial loss, such amount will be adjusted. The Company shall in no event be liable for consequential,punitive,statutory or special damages in excess of the monetory limit declared.
                            </li>




                        </ul>
                    </td>
                </tr>

            </table>

            <div id="table2" class="border-right border-bottom">
                <tr>
                    <th class="border-top-none border-bottom border-right">
                        <p>For <strong>ONNWAY SOLUTIONS PRIVATE LIMITED</strong></p>
                        <br>
                        <br>
                        <br>
                        <p class="text-center">Authorized Signatory</p>
                    </th>


                </tr>
                <tr>
                    <th class="border-top-none border-bottom border-right">

                        <h2 class="grey text-center ">OFFICE COPY</h2>
                    </th>
                </tr>


            </div>

        </section>
        <div class="footer">
            <div class="img">
                <img src="logo-3.JPG" alt="">
            </div>

            <h4 class="text-center">This is a system generated Lorry Receipt</h4>

        </div>
    </div>
    <div id="editor"></div>

    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>

    <!-- <script type="text/javascript"> 


var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

  window.addEventListener("load", function () {
      
      html2canvas(document.body,{
   onrendered:function(canvas){

   var img=canvas.toDataURL("image/png");
   var doc = new jsPDF();
   doc.addImage(img,'JPEG',20,20);
   doc.save('test.pdf');
   }

   });
   
    });
</script>

<script>
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });

</script> -->

</body>

</html>