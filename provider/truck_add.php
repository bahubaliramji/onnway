<?php


$url_gm = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page_title = "OnnWay";
$seo_keyword = "OnnWay";
$seo_content = "OnnWay";

include("include/header.php");




if (isset($_POST['add_truck'])) {
        if($_POST['name'] != ''  && $_POST['mobile'] != '' && $_POST['trn'] !='' && $_POST['trucks'] !='' && $_FILES['r_front']['name'] != '' && $_FILES['r_back']['name'] != ''){
        
            $name = $_POST['name'];
            $mobile = $_POST['mobile'];
            $truck = $_POST['trucks'];
            $trn = $_POST['trn'];
           
            
                $newname1 = new_file_name($_FILES['r_front']['name']);
                $ytmp_thumb = $_FILES['r_front']['tmp_name'];
                $r_front = "../android/Uploads/trucks/".$newname1;
                move_uploaded_file($ytmp_thumb, $r_front);

                $newname2 = new_file_name($_FILES['r_back']['name']);
                $ytmp_thumb = $_FILES['r_back']['tmp_name'];
                $r_back = "../android/Uploads/trucks/".$newname2;
                move_uploaded_file($ytmp_thumb, $r_back);

                $query = mysqli_query($dbhandle, "INSERT INTO `mytrucksprovider`
                    (`provider_mobile_no`, `truck_reg_no`, `driver_name`, `driver_mobile_no`, `vehicle_type`,`front`,`back`) VALUES 
                    ('$id','$trn','$name','$mobile','$truck','$newname1' , '$newname2')");


                if ($query) {
            
                // if($res1 == TRUE || $res2 == TRUE){
                    
                    $_SESSION['swal_title'] = "Truck Added";
                    $_SESSION['swal_icon'] = "success";
                    $_SESSION['link'] = "trucks.php";
                
                }
                else {
                    $_SESSION['swal_title'] = "Something Went Wrong";
                    $_SESSION['swal_icon'] = "error";
                    $_SESSION['link'] = "trucks.php";
                }
        } else {
            $_SESSION['swal_title'] = "All details are required!";
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
                    <li><a href="#" class="bred-active"> Add </a></li>
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
                        <li><a href="user_kyc.php"> <img src="../images/account-detail.png"> KYC Detail </a></li>
                        <li class="dropdown"><a href="trucks.php"> <img src="../images/my-order.png"> Truck Details </a></li>
                        
                        <li style="color:white; background-color:#d11f26;"><a style="color:white;" href="truck_add.php"> <img src="../images/my-order.png"> Add Truck </a></li>
                        <li><a href="operated_routs.php"> <img src="../images/com-detail.png"> Operated Routs </a></li>
                        <li><a href="#"> <img src="../images/address-book.png"> Address Book </a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">

                <div class="box-style-of-view-order">
                    <div class="tab">
                        <button class="tablinks active" style="width: 100%;" onclick="openCity(event, 'London')">PERSONAL INFORMATION</button>
                        <!-- <button class="tablinks change-pad" onclick="openCity(event, 'Paris')">CHANGE PASSWORD</button> -->
                    </div>

                    <div id="London" class="tabcontent" style="display: block;">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?= $data2['id']; ?>">
                            <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Truck Type <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8 paddinng">
                                    <span class="radio-tab " style="float: left; font-size: 1em; margin-top:10px">
    
    
                                        <!-- <input type="text" id="type" name="type" class="form-control" placeholder="Type" value="<?php echo $data['type']; ?>"> -->
                                        <label class="radio-inline" >
                                            <input type="radio" name="truck_type"  onchange="selectType('open truck')"   value="open" class="loader_type_select" > Open <img src="../images/open.png" width="70px" height="40px">
                                            </label> &nbsp; &nbsp; &nbsp;
                                        <label class="radio-inline" >
                                            <input type="radio" name="truck_type"  onchange="selectType('container')"   value="container" class="loader_type_select" > Container <img src="../images/container.png" width="70px" height="40px">
                                            </label> &nbsp; &nbsp; &nbsp;
                                        <label class="radio-inline">
                                            <input type="radio" name="truck_type" id="radio_company" value="trailer" onchange="selectType('trailer')"  class="loader_type_select"> Trailer <img src="../images/trailer.png" width="70px" height="40px">
                                            </label>
                                            </span>
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                                <br>
                                <div class="row" >
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Truck Name <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8">
                                    <select name="trucks" style="margin-top: 20px;" class="form-control" id="trucks" >
                                        <option value="">Select Truck</option>
                                       
                                    </select>
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                                <div class="row" >
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Registration Card Front <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="r_front" type="file" id="r_front" style="margin-top: 20px;" class="form-control"  placeholder="registration">
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                                <div class="row" >
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Registration Card Back <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="r_back" type="file" id="r_back" style="margin-top: 20px;" class="form-control"  placeholder="registration">
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Truck Registration No.<span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="trn" type="text" id="trn"  class="form-control"  placeholder="XXXXXXXXXXXX" >
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Driver Name <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="name" class="form-control" name="name"  placeholder="Name" >
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>


                    

                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Mobile No. <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="mobile" class="form-control" name="mobile"  placeholder="Mobile No." >
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
                                        <button type="submit" name="add_truck" class="update-password-btn "> Add Truck </button>
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
        function selectType(type){
        //  alert(type);
        
         $.ajax({
					type: "POST",
					url: "../ajax/select_truck_type.php",
					data: {
						type: type,
					},
					success: function(result) {
								 $("#trucks").html(result);
					},
				
					
				});
            
        }
</script>

<?php
include("include/footer.php");
?>