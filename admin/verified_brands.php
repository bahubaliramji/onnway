<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['aid']))
  {
    $query1 = $_GET['aid'];
  }
  else
  {
	  $query1 = "SELECT * FROM brands WHERE status = 'approved' ORDER BY id DESC";
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Verified Brands</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Verified Brands</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="background: white;">
                  <thead>
				  
				  <tr>
					<th><div class="row">
					<div class="col-6">
					<a onclick="cancel()"><i class="fas fa-times"></i></a>
					</div>
					<div class="col-6">
					<a onclick="filter()"><i class="fas fa-filter"></i></a>
					</div>
					</div></th>
					<th><input id="registration_number" class="form-control form-control-sm" type="number" placeholder="registration number"></th>
					<th>
					<select id="status" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
                    <option value="active">active</option>
                    <option value="inactive">inactive</option>
                    <option value="unsubscribed">unsubscribed</option>
                    </select>
					</th>
					 <th>
					  <input type="text" style="width: auto;" class="form-control form-control-sm float-right" id="dates">
                  
          </th>
          <th><input id="contact_details" class="form-control form-control-sm" type="number" placeholder="contact details"></th>
          <th><input id="contact_person" class="form-control form-control-sm" type="text" placeholder="contact person"></th>
                   

                    <th>
					<select id="sector" class="select2 form-control-sm" multiple="multiple" data-placeholder="Select a Sector" style="width: auto;">
                   
					<?php
					$query = "SELECT * FROM sectors WHERE status = 'active' ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					  
					?>
					<option value="<?= $id; ?>"><?= $row['title']; ?></option>
					<?php
				  }
					?>
                    </select>
					
				    </th>
                    <th><input id="business_name" class="form-control form-control-sm" type="text" placeholder="business"></th>
                    
                    <th><input id="district" class="form-control form-control-sm" type="text" placeholder="district"></th>
                    <th><input id="state" class="form-control form-control-sm" type="text" placeholder="state"></th>
                    <th><input id="products" class="form-control form-control-sm" type="text" placeholder="products"></th>
                    <th>
					<select id="process" class="select2 form-control-sm" multiple="multiple" data-placeholder="Select a Process" style="width: auto;">
                   
					<?php
					$query = "SELECT * FROM skills WHERE status = 'active' ORDER BY created DESC";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					  
					?>
					<option value="<?= $id; ?>"><?= $row['title']; ?></option>
					<?php
				  }
					?>
                    </select>
					</th>
                
				<th>
					<select id="market" class="form-control form-control-sm" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
                    <option value="Domestic">Domestic</option>
                    <option value="Export">Export</option>
                    </select>
					</th>
				
                    <th><input id="country" class="form-control form-control-sm" type="text" placeholder="countries"></th>
                    <th><input id="workers" class="form-control form-control-sm" type="number" placeholder="workers"></th>
                    <th>
					<select id="certification" class="form-control form-control-sm" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
					<?php
					$query = "SELECT * FROM certification";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					  
					?>
					<option value="<?= $id; ?>"><?= $row['title']; ?></option>
					<?php
				  }
					?>
                    </select>
					</th>
                    <th><input class="form-control form-control-sm" type="text" placeholder="number"></th>
                    <th>
					<select id="outsource" class="form-control form-control-sm" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
					<?php
					$query = "SELECT * FROM certification";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					  
					?>
					<option value="<?= $id; ?>"><?= $row['title']; ?></option>
					<?php
				  }
					?>
                    </select>
					</th>
                    
                    <th><input id="website" class="form-control form-control-sm" type="text" placeholder="website"></th>
                    <th><input id="email" class="form-control form-control-sm" type="text" placeholder="email"></th>
                    <th>
					<select id="officer" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
					<?php
					$query = "SELECT * FROM survey_officer";
				  $run_query = mysqli_query($con , $query);
				  $sno = 0;
				  while($row = mysqli_fetch_array($run_query))
				  {
					 $sno++;
					 $id = $row['id'];
					  
					?>
					<option value="<?= $id; ?>"><?= $row['name']; ?></option>
					<?php
				  }
					?>
                    </select>
					</th>
                    
                  </tr>
				  
                  <tr>
					<th>S.No.</th>
					<th>Reg. Code/ No.</th>
					<th>Profile Status</th>
          <th>Approved on</th>
          <th>Contact Details</th>
          <th>Contact person</th>
                    <th>Sector</th>
                    <th>Business</th>
                    <th>District</th>
                    <th>State</th>
                    <th>Type of products</th>
                    <th>Type of Unit / Processes</th>
                    <th>Type of market</th>
                    <th>Exporting Countries</th>
                    <th>Total Workers</th>
                    <th>GoodWeave Certified/ Verified </th>
                    <th>Certificate Number</th>
                    <th>Outsourcing</th>
                    
                    <th>Website address</th>
                    <th>Email address</th>
                    <th>Verified By</th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  //$query = "SELECT * FROM brands WHERE status = 'approved' ORDER BY id DESC";
				  $run_query = mysqli_query($con , $query1);
				  $sno = 0;
				  while($data = mysqli_fetch_array($run_query))
				  {
					  $sno++;
					  $image = $data['logo'];
					  $user_id = $data['user_id'];
					  
					  $sodata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM assigned_surveys WHERE profile_id = '$user_id'"));
					  
					  $oid = $sodata['officer_id'];
					  
					  $odata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM survey_officer WHERE id = '$oid'"));
					  
					  $udata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$user_id'"));
					  
					  //$image = base_url.'upload/users/'.
					  $sector = $data['sector'];
				 $religiondata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM sectors WHERE id = '$sector'"));
				 $sec = $religiondata['title'];
					  
					  $certified = $data['certification'];
				 $certifieddata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM certification WHERE id = '$certified'"));
					  
				  ?>
				  
                  <tr>
				  <td><?= $sno; ?></td>
                    <!--<td style="width: 100px;">
					<div class="filtr-item col-sm-12" data-category="1" data-sort="white sample">
                      <a 
<?php
if(!empty($image))
{
?>
					  href="<?= base_url.'upload/logo/'.$image; ?>"
<?php
}
?>
					  data-toggle="lightbox">
                        <img src="<?= base_url.'upload/logo/'.$image; ?>" class="img-fluid mb-2" alt="Photo"/>
                      </a>
                    </div>
					</td>-->
					<td><a href="brand_profile.php?id=<?= $user_id; ?>"><?= 'B00'.$user_id; ?></a></td>
					<td><?= $udata['status']; ?></td>
          <td><?= $udata['created']; ?></td>
          <td><?= $data['phone']; ?></td>
          <td><?= $data['contact_person']; ?></td>
                    
					<td><?= $sec; ?></td>
                    <td><?= $data['business_name']; ?></td>
                    <td><?= $data['cdistrict']; ?></td>
                    <td><?= $data['cstate']; ?></td>
                    <td><?= $data['products']; ?></td>
                    <td></td>
                    <td></td>
                    <td><?= $data['country']; ?></td>
                    <td><?= $data['workers']; ?></td>
                    <td><?= $certifieddata['title']; ?></td>
                    <td></td>
                    <td></td>
                    
                    <td><?= $data['website']; ?></td>
                    <td><?= $data['email']; ?></td>
                    <td><?= $odata['name']; ?></td>
                  </tr>
                  <?php
				  }
				  ?>
                 
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
function filter() {
  console.log('filter clicked');
  
  var business_name = $("#business_name").val();
  var registration_number = $("#registration_number").val();
  var district = $("#district").val();
  var state = $("#state").val();
  var products = $("#products").val();
  var country = $("#country").val();
  var workers = $("#workers").val();
  var certification = $("#certification").val();
  
  var contact_person = $("#contact_person").val();
  var contact_details = $("#contact_details").val();
  var website = $("#website").val();
  var email = $("#email").val();
  var sector = $("#sector").val();
  var officer = $("#officer").val();
  var dates = $("#dates").val();
  
  
  var sql = "SELECT * FROM ((brands INNER JOIN assigned_surveys ON brands.user_id = assigned_surveys.profile_id) INNER JOIN users ON brands.user_id = users.id) WHERE brands.status = 'approved' ";
  //var sql = "SELECT * FROM workers WHERE status = 'approved' ORDER BY id DESC";
  
  if(business_name)
  {
	  sql = sql + "AND brands.business_name LIKE '%25" + business_name + "%25' ";
  }
  if(registration_number)
  {
	  sql = sql + "AND brands.user_id LIKE '%25" + registration_number + "%25' ";
  }
  if(district)
  {
	  sql = sql + "AND brands.cdistrict LIKE '%25" + district + "%25' ";
  }
  if(state)
  {
	  sql = sql + "AND brands.cstate LIKE '%25" + state + "%25' ";
  }
  if(products)
  {
	  sql = sql + "AND brands.products LIKE '%25" + products + "%25' ";
  }
  if(country)
  {
	  sql = sql + "AND brands.country LIKE '%25" + country + "%25' ";
  }
  if(workers)
  {
	  sql = sql + "AND brands.workers LIKE '%25" + workers + "%25' ";
  }
 
 
  if(certification)
  {
	  if(certification != 'All')
	  {
	  sql = sql + "AND brands.certification = '" + certification + "' ";
	  }
  }
  if(contact_person)
  {
	  sql = sql + "AND brands.contact_person LIKE '%25" + contact_person + "%25' ";
  }
  if(contact_details)
  {
	  sql = sql + "AND brands.contact_details LIKE '%25" + contact_details + "%25' ";
  }
  if(website)
  {
	  sql = sql + "AND brands.website LIKE '%25" + website + "%25' ";
  }
  if(email)
  {
	  sql = sql + "AND brands.email LIKE '%25" + email + "%25' ";
  }
  if(sector.length > 0)
  {
	  
	  var sec = sector.join();
	  sql = sql + "AND brands.sector IN (" + sec + ") ";
	  
  }
  
  if(officer)
  {
	  if(officer != 'All')
	  {
	  sql = sql + "AND assigned_surveys.officer_id = '" + officer + "' ";
	  }
  }
  if(dates)
  {
	  var spl = dates.split(' - ');
	  //console.log(spl[0]);
	  var d1 = spl[0];
	  var d2 = spl[1];
	  sql = sql + "AND (users.created BETWEEN '" + d1 + "' AND '" + d2 + "') ";
  }
  
  
  sql = sql + "ORDER BY brands.id DESC";
  
  console.log(sql);
  window.location.replace('verified_brands.php?aid=' + sql);
}

</script>
 <script>
function cancel() {
  console.log('clear clicked');
  var sql = "SELECT * FROM brands WHERE status = 'approved' ORDER BY id DESC";
  window.location.replace('verified_brands.php');
}

</script>
  
  <?php
  include('inc/footer.php');
  ?>


