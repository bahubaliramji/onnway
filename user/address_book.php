<?php

session_start();
$url_gm = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page_title = "OnnWay";
$seo_keyword = "OnnWay";
$seo_content = "OnnWay";

include("include/header.php");

?>



<section>
<div class="container">
<div class="col-md-12">
  <div class="breadcrumb-section">
    <ul>
       <li><a href="#"> <img src="../images/home.png"> </a></li>
       <li><a href="#" class="bred-active"> Loader Dashboard </a></li>
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
              <li><a href="#"> <img src="../images/account-detail.png"> Account Detail </a></li>
               <li class="dropdown"><a href="#"> <img src="../images/my-order.png"> My order </a></li>
               <li><a href="#"> <img src="../images/com-detail.png"> Company Details </a></li>
               <li><a href="#"> <img src="../images/address-book.png"> Address Book </a></li>
            </ul>
          </div>
       </div>

       <div class="col-md-8">
         <div class="my-address-book">
           <h4>My Address Book</h4>
         </div>
         <div class="col-md-12 my-address-book-box">
              <div class="col-md-4">
              <div class="box-style">
                   <h5>Amit Soni</h5>
                   <ul>
                     <li>Mr. Sandeep Kumar</li>
                     <li>Address: New friends colony <br> Delhi, India</li>
                     <li>E-mail: sandeep@technobrix.com</li>
                   </ul>
                   <div class="col-md-6 del-style">
                     <h6> <a href=""> DELETE </a> </h6>
                   </div>
                   <div class="col-md-6 edit-btn-style">
                     <button type="button" class="edit-info-style">EDIT INFO</button>
                   </div>
                   </div>
              </div>

               <div class="col-md-4">
               <div class="box-style">
                   <h5>Amit Soni</h5>
                   <ul>
                     <li>Mr. Sandeep Kumar</li>
                     <li>Address: New friends colony <br> Delhi, India</li>
                     <li>E-mail: sandeep@technobrix.com</li>
                   </ul>
                   <div class="col-md-6 del-style">
                     <h6> <a href=""> DELETE </a> </h6>
                   </div>
                   <div class="col-md-6">
                     <button type="button" class="edit-info-style">EDIT INFO</button>
                   </div>
                   </div>
              </div>

                  <div class="col-md-4">
                 <div class="box-style">
                   <h5>Amit Soni</h5>
                   <ul>
                     <li>Mr. Sandeep Kumar</li>
                     <li>Address: New friends colony <br> Delhi, India</li>
                     <li>E-mail: sandeep@technobrix.com</li>
                   </ul>
                   <div class="col-md-6 del-style">
                     <h6> <a href=""> DELETE </a> </h6>
                   </div>
                   <div class="col-md-6">
                     <button type="button" class="edit-info-style">EDIT INFO</button>
                   </div>
               </div>
              </div>

         </div>
       </div>

    </div>
  </div>
</section>


<?php
include("include/footer.php");
?>