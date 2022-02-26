<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'payment';
$innersidepage = 'ordermanaedit';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
  <html>
<head>
  <title>Technobrix | Order Management Edit</title>
<?php include('include/head.php'); ?>
</head>
<body class="skin-blue sidebar-mini">
	  <div class="wrapper">
				<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>
<?php
   
	if(isset($_POST['submit'])){
		 if (empty($_POST["payment_method"])) {
        $payment_method_error = "please enter payment method";
    }
    else {
        $payment_method = $_POST["payment_method"];
    }
		//$payment_method = $_POST['payment_method'];
		
		$status= "active";
		
		
		$query = mysqli_query($dbhandle, "Insert INTO tbl_payment_method(payment_method,status)VALUE('".$payment_method."','".$status."')");
		/*if($query){
			$message = $obj->msg('success','Employee Added Successfully');
		}
		else{
			$message = $obj->msg('error','Please Try Again');
		} */
	}?>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

			<!-- Content Wrapper. Contains page content -->

			<div class="content-wrapper">

				<!-- Content Header (Page header) -->

             
				<!-- Main content -->

				<section class="content">
					<div class="row">
						<div class="col-xs-12">           
								<div class="box">
									<div class="box-header with-border">
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Add Payment Method</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="payment_method_management.php">Payment Method Management</a></li>
							<li class="active" style="color:#f0193f">Add Payment Method</li>
						 </ol>
						
						  
                      </div>
										<div id="general_info">
											<form method="post" action="#" enctype="multipart/form-data">
											<br><br>
											
											  
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Payment Method<span style="color:red">*</span> :</label>

										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="payment_method" class="form-control" placeholder="Cash on Load">
										    <span style="color:red"> <?php echo $payment_method_error;?></span>
										 </div>								  
									  </div>
									  
									  
							    <div class="row">
									     <div class="col-sm-6">
										     <button type="submit" class="btn btn-success" name="submit" id="save23">Save</button>
										 </div>
										 </div>
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									  
									 
									  
									 
									  
									   
									  
									  
                                      

             			                    </div>






              <!--end student photo -->





									 </div>


								



										 
										</div>
									  </div>
									  
									  
									  
										</div><!--end of general info-->	

									</div>

								</div>

							

						</div>

					</div>

				</section>

			</div>
            <?php include("web_files/footer.php");?>
			<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
			<!-- Bootstrap 3.3.2 JS -->
			<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <!-- AdminLTE App -->
			<script src="dist/js/app.min.js"></script>
			<script src="dist/js/demo.js"></script>
			<script>
  $( function() {
				 $("#datepicker1").datepicker({
                  changeMonth: true,
                  changeYear: true
                });
              } );
</script>


<script>
										 $(document).ready(function(){
											$("#selec-1").click(function () {
    $(".checkBoxClass").prop('checked', $(this).prop('checked'));
	
	
	
}); 
										 });
										 </script>



   		
			  
<style>
i.fa.fa-calendar.cal-style {
    margin-top: 9px;
}
button#pro1 {
    margin-left: 178px;
}
.col-sm-1.cmstyle p {
    margin-left: -18px;
    margin-top: 7px;
}
.multiselect1 ul li {
    list-style: none;
    background: #4F6877;
    padding: 0 6px;
    margin-left: -40px;
    width: 220px;
    color: #fff;
    font-size: 17px;
}
.form-group {
    margin-bottom: 0px; 
}
.star{
	color: red;
}

.multiselect1 ul li {
    list-style: none;
    background: #4F6877;
    padding: 0 6px;
    margin-left: -40px;
    width: 220px;
    color: #fff;
    font-size: 17px;
}
div#general_info .row {
    margin: 10px 0 10px 0;
}
.checkbox-inline{
	font-weight: 700;
}
.more-stop-style{
margin-left: 178px;
}
.button-route{
margin-top: 10px;
}
.form-control[readonly]{
	background-color:#fff !important;
}
#res1{
	margin-left: 10px;
}
.area-drop .from-control {
    width: 100%;
    height: 34px;
    border-radius: 4px;
    outline: none;
    border: none;
    border: 1px solid #d2d6de;
    padding-left: 18px;
}
#general_info{
	margin-top: -38px ;
}
span.cal1 {
    position: absolute;
    right: 15px;
    top: 0px;
    border: 1px solid #d2ded6;
    width: 38px;
    height: 34px;
    text-align: center;
    border-radius: 0 4px 4px 0;
    line-height: 34px;
}


button#s1 {
    width: 110px;
    margin-left: -14px;
}
.radiostyle {
    margin-left: 177px;
}

</style>


