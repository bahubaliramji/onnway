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
	  $query1 = "SELECT * FROM contractors WHERE status = 'approved' ORDER BY id DESC";
  }

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Verified Contractors</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Verified Contractors</li>
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
					<th><input id="registration_no" class="form-control form-control-sm" type="number" placeholder="registration number"></th>
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
          
          <th><input id="phone" class="form-control form-control-sm" type="number" placeholder="phone"></th>

          <th><input id="person" class="form-control form-control-sm" type="text" placeholder="contact person"></th>
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
                    <th><input id="name" class="form-control form-control-sm" type="text" placeholder="name"></th>
                    
                    <th><input id="district" class="form-control form-control-sm" type="text" placeholder="district"></th>
                    <th><input id="state" class="form-control form-control-sm" type="text" placeholder="state"></th>
                    <th><select id="work_type" class="select2 form-control-sm" multiple="multiple" data-placeholder="Select a Work Type" style="width: auto;">
                    
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
                    </select></th>
                    <th>
					<select id="availability" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
					<?php
					$query = "SELECT * FROM availability WHERE status = 'active' ORDER BY created DESC";
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
                    <th><input id="experience" class="form-control form-control-sm" type="number" placeholder="experience"></th>
                    <th><input id="home_units" class="form-control form-control-sm" type="number" placeholder="home units"></th>
                    <th><input id="workers" class="form-control form-control-sm" type="number" placeholder="workers"></th>
                    <th><input id="bank" class="form-control form-control-sm" type="number" placeholder="without bank account"></th>
                    <th><input id="school" class="form-control form-control-sm" type="number" placeholder="going to school"></th>
                    <th><input id="nonschool" class="form-control form-control-sm" type="number" placeholder="not going to school"></th>
                    
                    <th>
					<select id="gender" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
					<?php
					$query = "SELECT * FROM gender";
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
                    <th><input id="migrant" class="form-control form-control-sm" type="number" placeholder="migrant"></th>
                    <th><input id="local" class="form-control form-control-sm" type="number" placeholder="local"></th>
                    
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
				    <th>S. No.</th>
					<th>Reg. Code/ No.</th>
					<th>Profile Status</th>
          <th>Approved on</th>
          <th>Contact Number</th>
          <th>Contact Person</th>
                    <th>Sector</th>
                    <th>Name of Business/ Contractor</th>
                    <th>District</th>
                    <th>State</th>
                    <th>Type of work/ Processes</th>
                    <th>Availability</th>
                    <th>Experience in Yr.</th>
                    <th>Home-based units</th>
                    <th>Total Workers</th>
                    <th>Without Bank account</th>
                    <th>Children School going</th>
                    <th>Non school going</th>
                    
                    <th>Gender</th>
                    <th>Migrant Workers</th>
                    <th>Local Workers </th>
                    
                    <th>Email</th>
                    <th>Verified By</th>
                    
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  //$query = "SELECT * FROM contractors WHERE status = 'approved' ORDER BY id DESC";
				  $run_query = mysqli_query($con , $query1);
				  $sno = 0;
				  while($data = mysqli_fetch_array($run_query))
				  {
					  $sno++;
					  $image = $data['photo'];
					  $user_id = $data['user_id'];
					  
					  $sodata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM assigned_surveys WHERE profile_id = '$user_id'"));
					  
					  $oid = $sodata['officer_id'];
					  
					  $odata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM survey_officer WHERE id = '$oid'"));
					  
					  
					  $udata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$user_id'"));
					  
					  //$image = base_url.'upload/users/'.
					   $sector = $data['sector'];
				 $religiondata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM sectors WHERE id = '$sector'"));
				 
				 $experience = $data['experience'];
				 $experiencedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM experience WHERE id = '$experience'"));
				 $ski = $data['work_type'];
		
		$ski_arr = explode (",", $ski);
		
		$sktitle = array();
		
		foreach ($ski_arr as $value) {
    $ddd = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM skills WHERE id = '$value'"));
	
	if($lang == 'hi')
{
	$sktitle[] = $ddd['title_hi'];
}	
else
{
	$sktitle[] = $ddd['title'];
}
	
	
}
		$sist = implode(', ', $sktitle); 
		 $marital = $data['availability'];
				 $maritaldata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM availability WHERE id = '$marital'"));
				 $gender = $data['gender'];
				 $genderdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM gender WHERE id = '$gender'"));
				 
				 
					  
				  ?>
				  
                  <tr>
				  <td><?= $sno; ?></td>
				  <td><a href="contractor_profile.php?id=<?= $user_id; ?>"><?= 'C00'.$user_id; ?></a></td>
				  <td><?= $udata['status']; ?></td>
          <td><?= $udata['created']; ?></td>
          <td><?= $data['phone']; ?></td>
          <td><?= $data['name']?></td>
				  <td><?= $religiondata['title']; ?></td>
                    <td><?= $data['business_name']; ?></td>
                    
                    <td><?= $data['cdistrict']; ?></td>
                    <td><?= $data['cstate']; ?></td>
                    <td><?= $sist; ?></td>
					<td><?= $maritaldata['title']; ?></td>
					<td><?= $data['experience']; ?></td>
					<td><?= $data['home_units']; ?></td>
					<td><?= $data['workers_male'] + $data['workers_female'] ?></td>
					<td><?= $data['without_bank']; ?></td>
					<td><?= $data['school']; ?></td>
					<td><?= $data['non_school']; ?></td>
					
                    <td><?= $genderdata['title']; ?></td>
                    <td><?= $data['migrant']; ?></td>
                    <td><?= $data['local']; ?></td>
                    
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
  
  var name = $("#name").val();
  var registration_no = $("#registration_no").val();
  var district = $("#district").val();
  var state = $("#state").val();
  var work_type = $("#work_type").val();
  var availability = $("#availability").val();
  var experience = $("#experience").val();
  var home_units = $("#home_units").val();
  
  var workers = $("#workers").val();
  var gender = $("#gender").val();
  var migrant = $("#migrant").val();
  var local = $("#local").val();
  var phone = $("#phone").val();
  var officer = $("#officer").val();
  var dates = $("#dates").val();
  var sector = $("#sector").val();
  var person = $("#person").val();
  var status = $("#status").val();
  
  var sql = "SELECT * FROM ((contractors INNER JOIN assigned_surveys ON contractors.user_id = assigned_surveys.profile_id) INNER JOIN users ON contractors.user_id = users.id) WHERE contractors.status = 'approved' ";
  //var sql = "SELECT * FROM workers WHERE status = 'approved' ORDER BY id DESC";
  
  if(person)
  {
	  sql = sql + "AND contractors.name LIKE '%25" + person + "%25' ";
  }
  if(name)
  {
	  sql = sql + "AND contractors.business_name LIKE '%25" + name + "%25' ";
  }
  if(registration_no)
  {
	  sql = sql + "AND contractors.user_id LIKE '%25" + registration_no + "%25' ";
  }
  if(district)
  {
	  sql = sql + "AND contractors.cdistrict LIKE '%25" + district + "%25' ";
  }
  if(state)
  {
	  sql = sql + "AND contractors.cstate LIKE '%25" + state + "%25' ";
  }
  if(work_type.length > 0)
  {
	  
	  sql = sql + "AND (";
	  var i;
for (i = 0; i < work_type.length; i++) {
  
  sql = sql + "contractors.work_type LIKE '%25" + work_type[i] + "%25' ";
  
  if(i != (work_type.length - 1))
  {
	  sql = sql + 'OR ';
  }
  
}
	  sql = sql + ") ";
	  
	  
  }
  
 
 
  if(availability)
  {
	  if(availability != 'All')
	  {
	  sql = sql + "AND contractors.availability = '" + availability + "' ";
	  }
  }
  if(experience)
  {
	  if(experience != 'All')
	  {
	  sql = sql + "AND contractors.experience = '" + experience + "' ";
	  }
  }
  if(home_units)
  {
	  sql = sql + "AND contractors.home_units LIKE '%25" + home_units + "%25' ";
  }
  if(workers)
  {
	  sql = sql + "AND contractors.workers_male LIKE '%25" + workers + "%25' ";
  }
  if(gender)
  {
	  if(gender != 'All')
	  {
	  sql = sql + "AND contractors.gender = '" + gender + "' ";
	  }
  }
  if(migrant)
  {
	  sql = sql + "AND contractors.migrant LIKE '%25" + migrant + "%25' ";
  }
  if(local)
  {
	  sql = sql + "AND contractors.local LIKE '%25" + local + "%25' ";
  }
  if(phone)
  {
	  sql = sql + "AND contractors.phone LIKE '%25" + phone + "%25' ";
  }
  if(sector.length > 0)
  {
	  var sec = sector.join();
	  sql = sql + "AND contractors.sector IN (" + sec + ") ";
	  
  }
  
  if(officer)
  {
	  if(officer != 'All')
	  {
	  sql = sql + "AND assigned_surveys.officer_id = '" + officer + "' ";
	  }
  }
  if(status)
  {
	  if(status != 'All')
	  {
	  sql = sql + "AND users.status = '" + status + "' ";
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
  
  
  sql = sql + "ORDER BY contractors.id DESC";
  
  console.log(sql);
  window.location.replace('verified_contractors.php?aid=' + sql);
}

</script>
 <script>
function cancel() {
  console.log('clear clicked');
  var sql = "SELECT * FROM contractors WHERE status = 'approved' ORDER BY id DESC";
  window.location.replace('verified_contractors.php');
}

</script>
  
  
  <?php
  include('inc/footer.php');
  ?>
