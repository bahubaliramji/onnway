<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'estimates';
$innersidepage = 'all_estimate';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
  <html>
<head>
  <title>Technobrix | Estimate</title>
<?php include('include/head.php'); ?>
</head>
<body class="skin-blue sidebar-mini">
	  <div class="wrapper">
				<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>

<?php
   
	if(isset($_POST['submit'])){

    extract($_POST);

$query = mysqli_query($dbhandle, "update   tbl_estimate  set   from_id='$from_id',to_id='$to_id',truck_type='$truck_type',price='$price' where id='".$_GET['edit_id']."' ");

		  $sms="<p style='success-msg'>Estimate Updated Successfully.</p>";
		  
		  header("refresh:1;url=estimates.php");


        }  


        $edit = mysqli_fetch_array(mysqli_query($dbhandle, "select * from tbl_estimate where id='".$_GET['edit_id']."'"));

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
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title">Edit Fare</h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                        <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
							<li class="active" style="color:#f0193f">Edit Fare</li>
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
										    <label style="font-size: 157%;"><u>Edit Fare :</u></label>
										 </div>
										 							  
									  </div>
									   <div class="row">
									     <div class="col-sm-3">
										    <label>From City<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">

                        <select name="from_id" required="">
                        	<?php  $sell = mysqli_query($dbhandle, "select * from tbl_city");

                        	while($row = mysqli_fetch_assoc($sell)){

                        if($row['id']==$edit['from_id']){
                        	$sel='selected';
                        }else{
                        	$sel='';
                        }

                             echo '<option value="'.$row['id'].'" '.$sel.'>'.$row['city_name'].'</option>';
                        	}
                        	?>
                        </select>


										  
										   <span style="color:red"> <?php echo $city_error;?></span>
										 </div>								  
									  </div>
									  <div class="row">
									     <div class="col-sm-3">
										    <label>To City<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										     <select name="to_id" required="">
                        	<?php  $sell = mysqli_query($dbhandle, "select * from tbl_city");

                        	while($row = mysqli_fetch_assoc($sell)){

                        		  if($row['id']==$edit['to_id']){
                        	$sel='selected';
                        }else{
                        	$sel='';
                        }
                             echo '<option value="'.$row['id'].'"  '.$sel.'>'.$row['city_name'].'</option>';
                        	}
                        	?>
                        </select>
										   <span style="color:red"> <?php echo $state_error;?></span>
										 </div>								  
									  </div>
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Truck Type <span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										  <select name="truck_type" required="">
                        	<?php  $sell = mysqli_query($dbhandle, "select * from vehicle_list");

                        	while($row = mysqli_fetch_assoc($sell)){
                  if($row['id']==$edit['truck_type']){
                        	$sel='selected';
                        }else{
                        	$sel='';
                        }

                             echo '<option value="'.$row['id'].'" '.$sel.'>'.$row['length'].' MT '.$row['dimension'].'</option>';
                        	}
                        	?>
                        </select>
										   <!-- <span style="color:red"> <?php echo $truck_type;?></span> -->
										 </div>								  
									  </div>
									   <div class="row">
									     <div class="col-sm-3">
										    <label>Price<span style="color:red">*</span> :</label>
										 </div>
										 
										 <div class="col-sm-4">
										   <input type="text" name="price" id="price" class="form-control" value="<?php echo $edit['price'];?>" required>
										<!--   <span style="color:red"> <?php echo $price;?></span> -->
										 </div>								  
									  </div>

									 
									  
									   
									   
									  
									  
									  
						 <div class="col-sm-6">
										<button type="submit" class="btn btn-primary" name="submit" onclick="myFunction()" id="pro1">Edit</button>
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


