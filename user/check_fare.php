<?php

// if(!isset($_SESSION['check_fare'])){
//     header('Location: ../index.php');
// } else{

// }

$url_gm = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page_title = "Check fare";
$seo_keyword = "OnnWay";
$seo_content = "OnnWay";

include("include/header.php");

if(!isset($_SESSION['check_fare']) ){
    header('Location: ../index.php');
    // echo "1";
} 

$data = $_SESSION['check_fare'];
// unset($_SESSION['check_fare']);

// echo "<pre>";
// print_r($data);
// die();
$id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {
    // print_r($_POST);
    // die();

    $_SESSION['check_fare_add'] = $_POST;
    header('Location: address.php');
}

?>



<section>
    <div class="container">
        <div class="col-md-12">
            <div class="breadcrumb-section">
                <ul>
                    <li><a href="#"> <img src="../images/home.png"> </a></li>
                    <li><a href="#" class="bred-active"> User Dashboard </a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--END OF BREADCRUMB-->

<!--START OF ADDRESS BOOK-->
<section>
    <div class="main-dashboarsd-section">
        <div class="container">
            <div class="col-md-4">
                <div class="user-dashboard-section">
                    <h4>User Dashboard</h4>
                </div>
                <div class="dashboad-details">
                    <ul>
                        <li><a href="index.php"> <img src="../images/account-detail.png"> Account Detail </a></li>
                        <li><a href="user_kyc.php"> <img src="../images/account-detail.png"> KYC Detail </a></li>
                        <li style="color:white; background-color:#d11f26;"><a style="color:white;" href="#"> <img src="../images/my-order.png"> My order </a></li>
                        <li><a href="#"> <img src="../images/com-detail.png"> Company Details </a></li>
                        <li><a href="#"> <img src="../images/address-book.png"> Address Book </a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">

                <div class="box-style-of-view-order" style="text-align:center">
                    <div class="tab">
                        <button class="tablinks active" style="width: 100%;" onclick="openCity(event, 'London')">Check Fare</button>
                        <!-- <button class="tablinks change-pad" onclick="openCity(event, 'Paris')">CHANGE PASSWORD</button> -->
                    </div>

                    <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-4">
                            <?php
                            // $img = 0;
                            switch ($data['data']['truck_type']) {
                                case "open truck";
                                    $img = "../images/open.png";
                                    break;
                                case "container";
                                    $img = "../images/container.png";
                                    break;
                                case "trailer";
                                    $img = "../images/trailer.png";
                                    break;
                            }
                            ?>
                            <img src="<?= $img ?>" width="100px" height="60px">
                        </div>
                        <div class="col-md-6">
                            <?= $data['data']['truck_id'] ?>
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-3">
                            <?= $data['data']['source'] ?>
                        </div>
                        <div class="col-md-3">
                            to
                        </div>
                        <div class="col-md-3">
                            <?= $data['data']['destination'] ?>
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-3">
                            Load Type
                        </div>
                        <div class="col-md-3">
                            =
                        </div>
                        <div class="col-md-3">
                            FULL LOAD TRUCK
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-3">
                            Material Type
                        </div>
                        <div class="col-md-3">
                            =
                        </div>
                        <div class="col-md-3">
                            <?= $data['data']['material'] ?>
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-3">
                            Weight
                        </div>
                        <div class="col-md-3">
                            =
                        </div>
                        <div class="col-md-3">
                            <?= $data['data']['weight'] ?>
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>


                    <div class="row ">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-3">
                            Schedule Date
                        </div>
                        <div class="col-md-3">
                            =
                        </div>
                        <div class="col-md-3">
                            <?= $data['data']['schedule_date'] ?>
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>

                    <div id="London" class="tabcontent" style="display: block;">
                        <!-- <form id="promo_applyDSCSC"> -->

                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-3">
                                <p>Freight <span style="color:red;">*</span></p>
                            </div>
                            <div class="col-md-7">
                                <p style="color: #d11f26;">₹<?= $data['data']['freight'] ?></p> <small>(*Excluding loading and unloading charge)</small>
                                <input type="hidden" id="freight" name="freight" value="<?= $data['data']['freight'] ?>">
                                <input name="user_id" type="hidden" id="user_id" class="form-control" readonly value="<?= $id ?>">
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-3">
                                <p>Discount <span style="color:red;">*</span></p>
                            </div>
                            <div class="col-md-7">
                                <p id="promo_value" style="color: #d11f26;">₹ 0</p>

                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-3">
                                <p>Payable Freight <span style="color:red;">*</span></p>
                            </div>
                            <div class="col-md-7">
                                <p id="net_amount" style="color: #d11f26;">₹<?= $data['data']['freight'] ?></p>

                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>


                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <p>Offer Code <span style="color:red;">*</span></p>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="promo_code" class="form-control" name="promo_code" placeholder="CODE">
                                <small id="code_applied_text" style="color: green;display:none">(* code is applied)</small>
                            </div>
                            <div class="col-md-4">
                                <button id="promo_apply" class="update-password-btn " style="margin-top: 0;"> Apply </button>

                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>





                        <!-- </form> -->
                    </div>

                    <div>
                        <h3>Payments mode via</h3>
                        <p>ONLINE/ IMPS/ NEFT/ RTGS </p>
                        <h4>Select Payment Option</h4>
                        <div class="row">
                            <div class="col-md-2"></div>

                            <div class="col-md-3" style="padding:20px; background-color:#d0d5db">Pay 90% (After loading)</div>
                            <div class="col-md-1"></div>
                            <div class="col-md-4" style="padding:20px; background-color:#d0d5db">Pay 100% (After loading)</div>
                            <div class="col-md-2"></div>
                        </div>
                        <h4><a href="../privacy_policy.php" style="text-decoration: underline; color:red;">Cancellation policy</a></h4>
                        <!-- Button trigger modal -->
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-3"><button type="button" class="btn " data-toggle="modal" style="text-align:left" data-target="#exampleModalCenter">
                                    <p style="text-decoration: underline; color:red; ">READ PLEASE</p>
                                </button></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                        </div>



                    </div>

                    <div style="padding:10px">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="pid" name="pid" value="0">
                            <input type="hidden" id="pvalue" name="pvalue" value="0">




                            <!-- <input type="hidden" name="user_id" value="<?= $data2['id']; ?>"> -->

                            <div class="row">
                                <div class="col-md-1">

                                </div>

                                <div class="col-md-10">
                                    <!-- <input name="name" type="text" id="name"    placeholder="Name" value="<?php if (isset($data['name'])) {
                                                                                                                    echo $data['name'];
                                                                                                                } ?>"> -->
                                    <textarea name="name" id="name" class="form-control" placeholder="+ Add Description" rows="3"></textarea>
                                </div>
                                <div class="col-md-1">

                                </div>
                            </div>





                            <div class="row">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-7">
                                    <button type="submit" name="update_profile" class="update-password-btn "> Confirm Loading </button>
                                </div>
                                <div class="col-md-1">

                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>


        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>- Advance 90% Payment should be made at the time of loading and Balance 10% Payment before unloading at unloading point.
                    <br>
                    <br>
                    - Loading & Unloading charges will be in Customer's scope only.
                    <br>
                    <br>
                    - The freight rate does not include

                    GST, GST charges is payable

                    by Customer (Reverse Charge

                    Mechanism).
                    <br>
                    <br>
                    - Insurance charge is in Customer's scope only.
                    <br>
                    <br>
                    - Mandatory document such as E-waybill (Part A & B) is Customer's scope only.
                    <br>
                    <br>
                    - Any over height/over Load is not permitted. Govt. penalty extra If any.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!-- google map -->
<?php
include("include/footer.php");
?>

<script>
    $('#promo_code').keyup(function() {

        this.value = this.value.toLocaleUpperCase();
    });
    $("#promo_apply").click(function() {
        if ($("#promo_code").val() == "") {
            swal({
                            title: "Code field is required",

                            icon: "error",
                            button: "Ok, Got it..",

                        });
        } else {

            $.ajax({
                type: "POST",
                url: "../android/checkPromo.php",
                data: {
                    user_id: $("#user_id").val(),
                    promo: $("#promo_code").val(),
                },
                dataType: "JSON",
                success: function(result) {

                    if (result.status == 1) {
                        $("#promo_value").html("₹" + result.data.discount);
                        var net_amount = $("#freight").val() - result.data.discount;
                        $("#net_amount").html("₹" + net_amount);
                        $("#pid").val(result.data.pid);
                        $("#pvalue").val(result.data.discount);
                        $("#code_applied_text").show();
                        $('#promo_apply').attr('disabled', 'disabled');
                        $('#promo_code').attr('readonly', true);

                        swal({
                            title: result.message,

                            icon: "success",
                            button: "Ok, Got it..",

                        });


                    } else {
                        // alert(result.message);
                        swal({
                            title: result.message,

                            icon: "error",
                            button: "Ok, Got it..",

                        });
                    }
                },
            });
        }
    });
</script>