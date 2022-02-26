<?php


$url_gm = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page_title = "OnnWay";
$seo_keyword = "OnnWay";
$seo_content = "OnnWay";

include("include/header.php");

$query2 = mysqli_query($dbhandle, "SELECT * FROM users WHERE token = '$token'");
$data2 = mysqli_fetch_assoc($query2);

$id = $data2['id'];

$query = mysqli_query($dbhandle, "SELECT * FROM provider_profile_tbl WHERE user_id = '$id'");
$data = mysqli_fetch_assoc($query);

$id = 0;
if ($data != null) {
    $id = $data['id'];
}

if($id==0){
    $_SESSION['swal_title'] = "Your Profile is under Review Please wait";
    $_SESSION['swal_icon'] = "error";
    $_SESSION['link'] = "index.php";
}



if (isset($_POST['update_kyc'])) {

        if($_FILES['front_pan']['name'] != ''){
            $newname = new_file_name($_FILES['front_pan']['name']);
            $ytmp_thumb = $_FILES['front_pan']['tmp_name'];
            $front_pan = "../android/Uploads/pkyc/".$newname;
            if (move_uploaded_file($ytmp_thumb, $front_pan)) {
                if($_POST['old_front_pan']!=null){
                    unlink('../android/Uploads/pkyc/'.$_POST['old_front_pan']);
                }
                $res1  = mysqli_query($dbhandle,"UPDATE `provider_profile_tbl` SET `front_pan` = '$newname' WHERE id = '$id'");
            }
        }

        if($_FILES['back_pan']['name'] != ''){
            $newname = new_file_name($_FILES['back_pan']['name']);
            $ytmp_thumb = $_FILES['back_pan']['tmp_name'];
            $back_pan = "../android/Uploads/pkyc/".$newname;
            if (move_uploaded_file($ytmp_thumb, $back_pan)) {
                if($_POST['old_back_pan']!=null){
                    unlink('../android/Uploads/pkyc/'.$_POST['old_back_pan']);
                }
                $res  = mysqli_query($dbhandle,"UPDATE `provider_profile_tbl` SET `back_pan` = '$newname' WHERE id = '$id'");
            }
        }

        if($_FILES['front_aadhar']['name'] != ''){
            $newname = new_file_name($_FILES['front_aadhar']['name']);
            $ytmp_thumb = $_FILES['front_aadhar']['tmp_name'];
            $front_aadhar = "../android/Uploads/pkyc/".$newname;
            if (move_uploaded_file($ytmp_thumb, $front_aadhar)) {
                if($_POST['old_front_aadhar']!=null){
                    unlink('../android/Uploads/pkyc/'.$_POST['old_front_aadhar']);
                }
                $res1  = mysqli_query($dbhandle,"UPDATE `provider_profile_tbl` SET `front_aadhar` = '$newname' WHERE id = '$id'");
            }
        }

        if($_FILES['back_aadhar']['name'] != ''){
            $newname = new_file_name($_FILES['back_aadhar']['name']);
            $ytmp_thumb = $_FILES['back_aadhar']['tmp_name'];
            $back_aadhar = "../android/Uploads/pkyc/".$newname;
            if (move_uploaded_file($ytmp_thumb, $back_aadhar)) {
                if($_POST['old_back_aadhar']!=null){
                    unlink('../android/Uploads/pkyc/'.$_POST['old_back_aadhar']);
                }
                $res  = mysqli_query($dbhandle,"UPDATE `provider_profile_tbl` SET `back_aadhar` = '$newname' WHERE id = '$id'");
            }
        }

        if($_FILES['front_passbook']['name'] != ''){
            $newname = new_file_name($_FILES['front_passbook']['name']);
            $ytmp_thumb = $_FILES['front_passbook']['tmp_name'];
            $front_passbook = "../android/Uploads/pkyc/".$newname;
            if (move_uploaded_file($ytmp_thumb, $front_passbook)) {
                if($_POST['old_front_passbook']!=null){
                    unlink('../android/Uploads/pkyc/'.$_POST['old_front_passbook']);
                }
                $res1  = mysqli_query($dbhandle,"UPDATE `provider_profile_tbl` SET `front_passbook` = '$newname' WHERE id = '$id'");
            }
        }

        if($_FILES['back_passbook']['name'] != ''){
            $newname = new_file_name($_FILES['back_passbook']['name']);
            $ytmp_thumb = $_FILES['back_passbook']['tmp_name'];
            $back_passbook = "../android/Uploads/pkyc/".$newname;
            if (move_uploaded_file($ytmp_thumb, $back_passbook)) {
                if($_POST['old_back_passbook']!=null){
                    unlink('../android/Uploads/pkyc/'.$_POST['old_back_passbook']);
                }
                $res  = mysqli_query($dbhandle,"UPDATE `provider_profile_tbl` SET `back_passbook` = '$newname' WHERE id = '$id'");
            }
        }

        if($_FILES['front_visiting']['name'] != ''){
            $newname = new_file_name($_FILES['front_visiting']['name']);
            $ytmp_thumb = $_FILES['front_visiting']['tmp_name'];
            $front_visiting = "../android/Uploads/pkyc/".$newname;
            if (move_uploaded_file($ytmp_thumb, $front_visiting)) {
                if($_POST['old_front_visiting']!=null){
                    unlink('../android/Uploads/pkyc/'.$_POST['old_front_visiting']);
                }
                $res1  = mysqli_query($dbhandle,"UPDATE `provider_profile_tbl` SET `front_visiting` = '$newname' WHERE id = '$id'");
            }
        }

        if($_FILES['back_visiting']['name'] != ''){
            $newname = new_file_name($_FILES['back_visiting']['name']);
            $ytmp_thumb = $_FILES['back_visiting']['tmp_name'];
            $back_visiting = "../android/Uploads/pkyc/".$newname;
            if (move_uploaded_file($ytmp_thumb, $back_visiting)) {
                if($_POST['old_back_visiting']!=null){
                    unlink('../android/Uploads/pkyc/'.$_POST['old_back_visiting']);
                }
                $res  = mysqli_query($dbhandle,"UPDATE `provider_profile_tbl` SET `back_visiting` = '$newname' WHERE id = '$id'");
            }
        }

        if($_FILES['front_other']['name'] != ''){
            $newname = new_file_name($_FILES['front_other']['name']);
            $ytmp_thumb = $_FILES['front_other']['tmp_name'];
            $front_other = "../android/Uploads/pkyc/".$newname;
            if (move_uploaded_file($ytmp_thumb, $front_other)) {
                if($_POST['old_front_other']!=null){
                    unlink('../android/Uploads/pkyc/'.$_POST['old_front_other']);
                }
                $res1  = mysqli_query($dbhandle,"UPDATE `provider_profile_tbl` SET `front_other` = '$newname' WHERE id = '$id'");
            }
        }

        if($_FILES['back_other']['name'] != ''){
            $newname = new_file_name($_FILES['back_other']['name']);
            $ytmp_thumb = $_FILES['back_other']['tmp_name'];
            $back_other = "../android/Uploads/pkyc/".$newname;
            if (move_uploaded_file($ytmp_thumb, $back_other)) {
                if($_POST['old_back_other']!=null){
                    unlink('../android/Uploads/pkyc/'.$_POST['old_back_other']);
                }
                $res  = mysqli_query($dbhandle,"UPDATE `provider_profile_tbl` SET `back_other` = '$newname' WHERE id = '$id'");
            }
        }

        //die();

            if ($res == TRUE) {
                $_SESSION['profile_update'] = true;
                $_SESSION['swal_title'] = "KYC Updated";
                $_SESSION['swal_icon'] = "success";
                $_SESSION['link'] = "user_kyc.php";
            } else {

                $_SESSION['swal_title'] = "error";
                $_SESSION['swal_icon'] = "error";
            }
    
}

?>



<section>
    <div class="container">
        <div class="col-md-12">
            <div class="breadcrumb-section">
                <ul>
                    <li><a href="#"> <img src="../images/home.png"> </a></li>
                    <li><a href="#" class="bred-active"> KYC Details </a></li>
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
                        <li style="color:white; background-color:#d11f26;"><a href="user_kyc.php" style="color:white;"> <img src="../images/account-detail.png"> KYC Detail </a></li>
                        
                        <li class="dropdown"><a href="trucks.php"> <img src="../images/my-order.png"> Truck Details </a></li>
                        
                        <li class="dropdown"><a href="truck_add.php"> <img src="../images/my-order.png"> Add Truck </a></li>
                        <li><a href="operated_routs.php"> <img src="../images/com-detail.png"> Operated Routs </a></li>
                        <li><a href="#"> <img src="../images/address-book.png"> Address Book </a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">

                <div class="box-style-of-view-order">
                    <div class="tab">
                        <button class="tablinks active" style="width: 100%;" onclick="openCity(event, 'London')">KYC Details</button>
                        <!-- <button class="tablinks change-pad" onclick="openCity(event, 'Paris')">CHANGE PASSWORD</button> -->
                    </div>

                    <div id="London" class="tabcontent" style="display: block;">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?= $data2['id']; ?>">
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-6" style="margin-left: 20px;">
                                    <label> Pan </label>
                                    <br>
                                    <img src="../android/Uploads/pkyc/<?= $data['front_pan'] ?>" height="200px" alt="pan front">
                                </div>
                                <div class="col-md-5">
                                    <label> Pan Front </label>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="old_front_pan" value="<?= $data['front_pan'] ?>">
                                            <input type="file" class="form-control" id="front_pan" name="front_pan" placeholder="Source">
                                        </div>
                                    </div>
                                    <br class="visible-xs">
                                    <br class="visible-xs">
                                </div>
                                <div class="col-md-6" style="margin-left: 20px; margin-top:10px;">
                                    
                                    <img src="../android/Uploads/pkyc/<?= $data['back_pan'] ?>" height="200px" alt="pan back">
                                </div>
                                <div class="col-md-5" style="margin-top:10px;">
                                    <label> Pan Back </label>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="old_back_pan" value="<?= $data['back_pan'] ?>">
                                            <input type="file" class="form-control" id="back_pan" name="back_pan" placeholder="Source">
                                        </div>
                                    </div>
                                    <br class="visible-xs">
                                    <br class="visible-xs">
                                </div>
                                
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-6" style="margin-left: 20px;">
                                    <label> Aadhar </label>
                                    <br>
                                    <img src="../android/Uploads/pkyc/<?= $data['front_aadhar'] ?>" height="200px" alt="aadhar front">
                                </div>
                                <div class="col-md-5">
                                    <label> Aadhar Front </label>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="old_front_aadhar" value="<?= $data['front_aadhar'] ?>">
                                            <input type="file" class="form-control" id="front_aadhar" name="front_aadhar" placeholder="Source">
                                        </div>
                                    </div>
                                    <br class="visible-xs">
                                    <br class="visible-xs">
                                </div>
                                <div class="col-md-6" style="margin-left: 20px; margin-top:10px;">
                                    
                                    <img src="../android/Uploads/pkyc/<?= $data['back_aadhar'] ?>" height="200px" alt="aadhar back">
                                </div>
                                <div class="col-md-5" style="margin-top:10px;">
                                    <label> Aadhar Back </label>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="old_back_aadhar" value="<?= $data['back_aadhar'] ?>">
                                            <input type="file" class="form-control" id="back_aadhar" name="back_aadhar" placeholder="Source">
                                        </div>
                                    </div>
                                    <br class="visible-xs">
                                    <br class="visible-xs">
                                </div>
                                
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-6" style="margin-left: 20px;">
                                    <label> Passbook </label>
                                    <br>
                                    <img src="../android/Uploads/pkyc/<?= $data['front_passbook'] ?>" height="200px" alt="passbook front">
                                </div>
                                <div class="col-md-5">
                                    <label> Passbook Front </label>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="old_front_passbook" value="<?= $data['front_passbook'] ?>">
                                            <input type="file" class="form-control" id="front_passbook" name="front_passbook" placeholder="Source">
                                        </div>
                                    </div>
                                    <br class="visible-xs">
                                    <br class="visible-xs">
                                </div>
                                <div class="col-md-6" style="margin-left: 20px; margin-top:10px;">
                                    
                                    <img src="../android/Uploads/pkyc/<?= $data['back_passbook'] ?>" height="200px" alt="passbook back">
                                </div>
                                <div class="col-md-5" style="margin-top:10px;">
                                    <label> Passbook Back </label>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="old_back_passbook" value="<?= $data['back_passbook'] ?>">
                                            <input type="file" class="form-control" id="back_passbook" name="back_passbook" placeholder="Source">
                                        </div>
                                    </div>
                                    <br class="visible-xs">
                                    <br class="visible-xs">
                                </div>
                                
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-6" style="margin-left: 20px;">
                                    <label> Visiting </label>
                                    <br>
                                    <img src="../android/Uploads/pkyc/<?= $data['front_visiting'] ?>" height="200px" alt="visiting front">
                                </div>
                                <div class="col-md-5">
                                    <label> Visiting Front </label>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="old_front_visiting" value="<?= $data['front_visiting'] ?>">
                                            <input type="file" class="form-control" id="front_visiting" name="front_visiting" placeholder="Source">
                                        </div>
                                    </div>
                                    <br class="visible-xs">
                                    <br class="visible-xs">
                                </div>
                                <div class="col-md-6" style="margin-left: 20px; margin-top:10px;">
                                    
                                    <img src="../android/Uploads/pkyc/<?= $data['back_visiting'] ?>" height="200px" alt="visiting back">
                                </div>
                                <div class="col-md-5" style="margin-top:10px;">
                                    <label> Visiting Back </label>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="old_back_visiting" value="<?= $data['back_visiting'] ?>">
                                            <input type="file" class="form-control" id="back_visiting" name="back_visiting" placeholder="Source">
                                        </div>
                                    </div>
                                    <br class="visible-xs">
                                    <br class="visible-xs">
                                </div>
                                
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-6" style="margin-left: 20px;">
                                    <label> Other Document </label>
                                    <br>
                                    <img src="../android/Uploads/pkyc/<?= $data['front_other'] ?>" height="200px" alt="other front">
                                </div>
                                <div class="col-md-5">
                                    <label> Other Front </label>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="old_front_other" value="<?= $data['front_other'] ?>">
                                            <input type="file" class="form-control" id="front_other" name="front_other" placeholder="Source">
                                        </div>
                                    </div>
                                    <br class="visible-xs">
                                    <br class="visible-xs">
                                </div>
                                <div class="col-md-6" style="margin-left: 20px; margin-top:10px;">
                                    
                                    <img src="../android/Uploads/pkyc/<?= $data['back_other'] ?>" height="200px" alt="other back">
                                </div>
                                <div class="col-md-5" style="margin-top:10px;">
                                    <label> Other Back </label>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="old_back_other" value="<?= $data['back_other'] ?>">
                                            <input type="file" class="form-control" id="back_other" name="back_other" placeholder="Source">
                                        </div>
                                    </div>
                                    <br class="visible-xs">
                                    <br class="visible-xs">
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-7">
                                        <button type="submit" name="update_kyc" class="update-password-btn "> Update KYC </button>
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

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }


    if (document.getElementById('radio_company').checked) {
        $('#company_tab').show();
        $('#gst_tab').show();

    }

    function selectType(type) {
        // alert(type);
        if (type == "Company") {
            $('#company_tab').show();
            $('#gst_tab').show();
        } else {
            $('#company_tab').hide();
            $('#gst_tab').hide();
        }

    }
</script>

<?php
include("include/footer.php");
?>