<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'material';
$innersidepage = 'materiallist';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
  <html>
<head>
  <title>Technobrix | City</title>
<?php include('include/head.php'); ?>
</head>
<body class="skin-blue sidebar-mini">
	  <div class="wrapper">
				<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>

<?php
   
	if(isset($_POST['submit'])){
       
	if (empty($_POST["material_name"])) {
        $material_error = "enter material";
    }
    else {
        $material_name = $_POST["material_name"];
    }
     
   

$query = mysqli_query($dbhandle, "Insert INTO tbl_material(material_name)VALUE('".$material_name."')");

		  $sms="<p style='text-align:center;color:green;'>Material Added Successfully.</p>";
        }

   ?>

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
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Add Material</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="#">Material Management</a></li>
							<li class="active" style="color:#f0193f">Add Material</li>
						 </ol>
						
						  <?php 
					  echo $sms;
				   ?>
                      </div>
										<div id="general_info">
											<form name="myForm" method="post" action="" enctype="multipart/form-data"  >
											<br><br>
											
											  <div class="row">
									     <div class="col-sm-5">
										    <label style="font-size: 157%;"><u>Add Material :</u></label>
										 </div>
										 							  
									  </div>
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Material Name<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="material_name" id="material_name" class="form-control" value="">
										   <span style="color:red"> <?php echo $city_error;?></span>
										 </div>								  
									  </div>
									  
									
									  
									  
									  
									   
									   
									  
									  
									  
						 <div class="col-sm-6">
										<button type="submit" class="btn btn-primary" name="submit" onclick="myFunction()" id="pro1">Save</button>
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
										 $(document).ready(function(){
											$("#selec-1").click(function () {
    $(".checkBoxClass").prop('checked', $(this).prop('checked'));
	
	
	
}); 
										 });



 </script>

<script type="text/javascript">
  
      
   
   
</script>
										



   		
			  
<style>
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
.breadcrumb>li+li:before{
	    content: ">";
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


