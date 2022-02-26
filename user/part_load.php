<?php

// if(!isset($_SESSION['check_fare'])){
//     header('Location: ../index.php');
// } else{

// }

$url_gm = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page_title = "Part load";
$seo_keyword = "OnnWay";
$seo_content = "OnnWay";

include("include/header.php");

if (!isset($_SESSION['part_load_data'])) {
    header('Location: ../index.php');
    // echo "1";
}

$data = $_SESSION['part_load_data'];
// unset($_SESSION['check_fare']);

// echo "<pre>";
// print_r($data);
// die();
$id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {
    // print_r($_POST);
    // die();

    $_SESSION['part_add'] = $_POST;
    header('Location: part_address.php');
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
                        <button class="tablinks active" style="width: 100%;" onclick="openCity(event, 'London')">Part Load</button>
                        <!-- <button class="tablinks change-pad" onclick="openCity(event, 'Paris')">CHANGE PASSWORD</button> -->
                    </div>


                    <div style="padding:10px">
                        <form action="" method="post" enctype="multipart/form-data">
                           
                            <h4>Dimentions in Feet</h4>
                            <div class="row">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-3">
                                    <input name="lenght" required type="text" id="lenght" class="form-control" placeholder="Lenght">

                                </div>
                                <div class="col-md-3">
                                    <input name="width" required type="text" id="width" class="form-control" placeholder="Width">
                                </div>
                                <div class="col-md-3">
                                    <input name="height" required type="text" id="height" class="form-control" placeholder="Height">

                                </div>

                                <div class="col-md-1">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-3">
                                   
                                </div>
                                <div class="col-md-3">
                                    <input name="area" required type="text" readonly id="area" class="form-control" placeholder="Area">
                                    <input type="hidden" name="cu" id="cu">
                                </div>
                                <div class="col-md-3">
                                   
                                </div>

                                <div class="col-md-1">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-3">
                                    <input name="quantity" required type="text" id="quantity" class="form-control" placeholder="Quantity">

                                </div>
                                <div class="col-md-3">
                                    =
                                </div>
                                <div class="col-md-3">
                                    <input name="total" required type="text" id="total" readonly class="form-control" placeholder="Total">

                                </div>

                                <div class="col-md-1">

                                </div>
                            </div>

                            <h4 style="margin-top: 20px;"> Upload material Image</h4>
                            <div class="row">
                                <div class="col-md-3">

                                </div>
                                
                                <div class="col-md-6">
                                    <input name="image" type="file" required id="image" class="form-control" >
                                    
                                </div>
                                <div class="col-md-3">
                                   
                                </div>

                                
                            </div>

                            <h4 style="margin-top: 20px;">Add Special Note</h4>
                            <div class="row">
                                <div class="col-md-1">

                                </div>
                               
                                <div class="col-md-10">
                                <textarea name="note" id="note" class="form-control" placeholder="tap to enter" rows="3"></textarea>

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



<!-- google map -->
<?php
include("include/footer.php");
?>

<script>
    $('#lenght , #width, #height').keyup(function() {
        var lenght = $("#lenght").val();
        var width = $("#width").val();
        var height = $("#height").val();
        var cu = lenght*width*height;
        if(cu!=0){
            
            $("#cu").val(cu);
            cu = cu.toString(10);
            cu = cu+" cu. ft."
            $("#area").val(cu);
        }
    });

    $('#quantity').keyup(function() {
        var area = $("#cu").val();
        var quantity = $("#quantity").val();
       
        var total = area*quantity;
        if(total!=0){
           
            
            $("#total").val(total);
        }
    });

    
</script>