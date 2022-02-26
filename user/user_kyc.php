<?php


$url_gm = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page_title = "OnnWay";
$seo_keyword = "OnnWay";
$seo_content = "OnnWay";

include("include/header.php");

$query2 = mysqli_query($dbhandle, "SELECT * FROM users WHERE token = '$token'");
$data2 = mysqli_fetch_assoc($query2);

$id = $data2['id'];

$query = mysqli_query($dbhandle, "SELECT * FROM loader_profile_tbl WHERE user_id = '$id'");
$data = mysqli_fetch_assoc($query);

$id = 0;
if ($data != null) {
    $id = $data['id'];
}
// echo $id;
// die();
if($id==0){
    $_SESSION['swal_title'] = "Your Profile is under Review Please wait";
    $_SESSION['swal_icon'] = "error";
    $_SESSION['link'] = "index.php";
}



if (isset($_POST['update_kyc'])) {
        if($_FILES['pan']['name'] != ''){
             $newname = new_file_name($_FILES['pan']['name']);
            $ytmp_thumb = $_FILES['pan']['tmp_name'];
            $pan = "../android/Uploads/lkyc/".$newname;
            if (move_uploaded_file($ytmp_thumb, $pan)) {
                if($_POST['old_pan']!=null){
                    unlink('../android/Uploads/lkyc/'.$_POST['old_pan']);
                }
                $res  = mysqli_query($dbhandle,"UPDATE `loader_profile_tbl` SET `pan` = '$newname' WHERE id = '$id'");
            }
        }

        if($_FILES['af']['name'] != ''){
            $newname = new_file_name($_FILES['af']['name']);
            $ytmp_thumb = $_FILES['af']['tmp_name'];
            $af = "../android/Uploads/lkyc/".$newname;
            if (move_uploaded_file($ytmp_thumb, $af)) {
                if($_POST['old_af']!=null){
                    unlink('../android/Uploads/lkyc/'.$_POST['old_af']);
                }
                $res  = mysqli_query($dbhandle,"UPDATE `loader_profile_tbl` SET `af` = '$newname' WHERE id = '$id'");
            }
        }

        if($_FILES['ab']['name'] != ''){
            $newname = new_file_name($_FILES['ab']['name']);
            $ytmp_thumb = $_FILES['ab']['tmp_name'];
            $ab = "../android/Uploads/lkyc/".$newname;
            if (move_uploaded_file($ytmp_thumb, $ab)) {
                if($_POST['old_ab']!=null){
                    unlink('../android/Uploads/lkyc/'.$_POST['old_ab']);
                }
                $res  = mysqli_query($dbhandle,"UPDATE `loader_profile_tbl` SET `ab` = '$newname' WHERE id = '$id'");
            }
        }
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
                        <li ><a href="index.php"> <img src="../images/account-detail.png"> Account Detail </a></li>
                        <li style="color:white; background-color:#d11f26;"><a style="color:white;" href="user_kyc.php"> <img src="../images/account-detail.png"> KYC Detail </a></li>
                        <li class="dropdown"><a href="#"> <img src="../images/my-order.png"> My order </a></li>
                        <li><a href="#"> <img src="../images/com-detail.png"> Company Details </a></li>
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
                            <div class="row">
                                <div class="col-md-6" style="margin-left: 20px;">
                                    <label> PAN </label>
                                    <br>
                                    <img src="../android/Uploads/lkyc/<?= $data['pan'] ?>" height="200px" alt="pan">
                                </div>
                                <div class="col-md-5">
                                    <label> PAN File. (Attach File) </label>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="old_pan" value="<?= $data['pan'] ?>">
                                            <input type="file" class="form-control" id="pan" name="pan" placeholder="Source">
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
                                    <img src="../android/Uploads/lkyc/<?= $data['af'] ?>" height="200px" alt="aadhar front">
                                </div>
                                <div class="col-md-5">
                                    <label> Aadhar Front </label>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="old_af" value="<?= $data['af'] ?>">
                                            <input type="file" class="form-control" id="af" name="af" placeholder="Source">
                                        </div>
                                    </div>
                                    <br class="visible-xs">
                                    <br class="visible-xs">
                                </div>
                                <div class="col-md-6" style="margin-left: 20px; margin-top:10px;">
                                    
                                    <img src="../android/Uploads/lkyc/<?= $data['ab'] ?>" height="200px" alt="aadhar back">
                                </div>
                                <div class="col-md-5" style="margin-top:10px;">
                                    <label> Aadhar Back </label>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="old_ab" value="<?= $data['ab'] ?>">
                                            <input type="file" class="form-control" id="ab" name="ab" placeholder="Source">
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