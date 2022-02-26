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
	  $query1 = "SELECT * FROM workers WHERE status = 'approved' ORDER BY id DESC";
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Verified Workers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Verified Workers</li>
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
					<a onclick="cancel()" id="cancel"><i class="fas fa-times"></i></a>
					</div>
					<div class="col-6">
					<a onclick="filter()" id="filter"><i class="fas fa-filter"></i></a>
					</div>
					</div></th>
                    <th><input id="number" class="form-control form-control-sm" type="number" placeholder="regis. number" style="width: 100%;"></th>
					<th>
					<select id="status" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
                    <option value="active">active</option>
                    <option value="inactive">inactive</option>
                    <option value="unsubscribed">unsubscribed</option>
                    </select>
					</th>
					<th><input type="text" style="width: auto;" class="form-control form-control-sm float-right" id="dates"></th>
                    <th><input id="phone" class="form-control form-control-sm" type="number" placeholder="phone" style="width: 100%;"></th>
                    <th><input id="name" class="form-control form-control-sm" type="text" placeholder="name" style="width: 100%;"></th>
                    <th><input id="age" class="form-control form-control-sm" type="number" placeholder="age" style="width: 100px;"></th>
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
                    <th><input id="district" class="form-control form-control-sm" type="text" placeholder="disctrict"></th>
                    <th><input id="state" class="form-control form-control-sm" type="text" placeholder="state"></th>
                    <th>
					<select id="category" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
					<?php
					$query = "SELECT * FROM category";
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
					<select id="religion" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
					<?php
					$query = "SELECT * FROM religion";
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
					<select id="education" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
					<?php
					$query = "SELECT * FROM education";
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
					<select id="marital" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
					<?php
					$query = "SELECT * FROM marital";
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
					<select id="gender" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
                    <option value="All">Between 0-6 yr.</option>
                    <option value="All">Between 6-14 yr.</option>
                    <option value="All">Between 15-18 yr.</option>
                    </select>
					</th>
                    <th>
					<select id="school" class="form-control form-control-sm" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
                    <option value="All">Between 6-14 yr.</option>
                    <option value="All">Between 15-18 yr.</option>
                    </select>
					</th>
					
					<th>
					  <select id="annual" class="form-control form-control-sm" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
                    <option value="0-100000">0-100000</option>
                    <option value="100001-150000">100001-150000</option>
                    <option value="150001-200000">150001-200000</option>
                    <option value="More than 200000">More than 200000</option>
                    </select>
					</th>
					
                    <th><select id="sector" class="select2 form-control-sm" multiple="multiple" data-placeholder="Select a Sector" style="width: auto;">
                    
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
                    </select></th>
                    <th>
					<select id="skills" class="select2 form-control form-control-sm" multiple="multiple" data-placeholder="Select a Skill" style="width: auto;">
                   
					<?php
					$query = "SELECT * FROM skills";
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
					  <input id="experience" class="form-control form-control-sm" type="number" placeholder="years of experience">
					</th>
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
					<th>
					<select id="home" class="form-control form-control-sm" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
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
					<th><input id="workers" class="form-control form-control-sm" type="number" placeholder="workers"></th>
					<th>
					<select id="certified" class="form-control form-control-sm" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
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
					<th><input id="certification_number" class="form-control form-control-sm" type="text" placeholder="certification number"></th>
					<th>
					<select id="bank" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
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
					<th>
					<select id="govt" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">None</option>
                    <option value="All">PF</option>
                    <option value="All">ESI</option>
                    <option value="All">Both</option>
                    <option value="All">Others</option>
                    </select>
					</th>
					
					
					<th>
					<select id="skill_level" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="All">All</option>
					<?php
					$query = "SELECT * FROM skill_level";
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
					<th><select id="officer" class="form-control form-control-sm" style="width: auto;" data-select2-id="1" tabindex="-1" aria-hidden="true">
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
                    </select></th>
					
                  </tr>
				  
                  <tr>
                    <th>S. No.</th>
                    <th>Worker Registration No.</th>
                    <th>Profile Status</th>
					<th>Approved on</th>
                    <th>Contact Number</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>District</th>
                    <th>State</th>
                    <th>Category</th>
                    <th>Religion</th>
                    <th>Education Status</th>
                    <th>Marital Status</th>
                    <th>No. of Children</th>
                    <th>Children school going</th>
                    <th>Annual Income</th>
                    <th>Sector</th>
                    <th>Skills</th>
                    <th>Yr. of Experience</th>
                    <th>Availabilty</th>
                    <th>Home based unit</th>
                    <th>Number of Workers</th>
                    <th>GoodWeave Certified</th>
                    <th>Certificate number</th>
                    <th>Bank Account</th>
                    <th>Social security benefits?</th>
                    <th>Skill Level</th>
                    <th>Verified By</th>
                    
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  //$query1 = "SELECT * FROM workers WHERE status = 'approved' ORDER BY id DESC";
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
					  
					  $gender = $data['gender'];
				 $genderdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM gender WHERE id = '$gender'"));
					  
					  $category = $data['category'];
				 $catdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM category WHERE id = '$category'"));
					  
					  $religion = $data['religion'];
				 $religiondata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM religion WHERE id = '$religion'"));
				 
				 $educational = $data['educational'];
				 $educationaldata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM education WHERE id = '$educational'"));
				 
				 $marital = $data['marital'];
				 $maritaldata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM marital WHERE id = '$marital'"));
				 
				 $ski1 = $data['sector'];
		
		$ddd2 = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM sectors WHERE id = '$ski1'"));
				   
				   $ski = $data['skills'];
		
		$ski_arr = explode (",", $ski);
		
		$sktitle = array();
		
		foreach ($ski_arr as $value) {
    $ddd = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM skills WHERE id = '$value'"));
	$sktitle[] = $ddd['title'];
}
		$sist = implode(', ', $sktitle);
		
		$home = $data['home'];
				 $homedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM certification WHERE id = '$home'"));
				 
				 $certified = $data['certified'];
				 $certifieddata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM certification WHERE id = '$certified'"));
				 
					  $skill_level = $data['skill_level'];
				 $skill_leveldata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM skill_level WHERE id = '$skill_level'"));
				 
				 	  $skill_level1 = $data['bank'];
				 $skill_leveldata1 = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM certification WHERE id = '$skill_level1'"));
				 
				 	  $skill_level2 = $data['govt'];
				 $skill_leveldata2 = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM certification WHERE id = '$skill_level2'"));
				 
				 
				 
				  ?>
				  
                  <tr>
				    <td><?= $sno; ?></td>
				    <td><a href="worker_profile.php?id=<?= $user_id; ?>"><?= 'W00'.$data['user_id']; ?></a></td>
                    <td><?= $udata['status']; ?></td>
					<td><?= $udata['created']; ?></td>
                    <td><?= $udata['phone']; ?></td>
                    <td><?= $data['name']; ?></td>
                    <td><?= $data['age']; ?></td>
                    <td><?= $genderdata['title']; ?></td>
                    <td><?= $data['cdistrict']; ?></td>
                    <td><?= $data['cstate']; ?></td>
                    <td><?= $catdata['title']; ?></td>
                    <td><?= $religiondata['title']; ?></td>
                    <td><?= $educationaldata['title']; ?></td>
                    <td><?= $maritaldata['title']; ?></td>
                    <td><?= $data['children']; ?></td>
                    <td><?= $data['goingtoschool']; ?></td>
                    <td><?= $data['annual_income']; ?></td>
                    <td><?= $ddd2['title']; ?></td>
                    <td><?= $sist; ?></td>
                    <td><?= $data['experience']; ?></td>
                    <td></td>
                    <td><?= $homedata['title'];  ?></td>
                    <td><?= $data['workers']; ?></td>
                    <td><?= $certifieddata['title']; ?></td>
                    <td><?= $data['certification_number']; ?></td>
                    <td><?= $skill_leveldata1['title']; ?></td>
                    <td><?= $skill_leveldata2['title']; ?></td>
                    <td><?= $skill_leveldata['title']; ?></td>
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
  
  var number = $("#number").val();
  var phone = $("#phone").val();
  var name = $("#name").val();
  var age = $("#age").val();
  var gender = $("#gender").val();
  var annual = $("#annual").val();
  var district = $("#district").val();
  var state = $("#state").val();
  var category = $("#category").val();
  var religion = $("#religion").val();
  var education = $("#education").val();
  var marital = $("#marital").val();
  
  var children = $("#children").val();
  var belowsix = $("#belowsix").val();
  var sixtofourteen = $("#sixtofourteen").val();
  var fifteentoeighteen = $("#fifteentoeighteen").val();
  var goingtoschool = $("#goingtoschool").val();
  var sector = $("#sector").val();
  var skills = $("#skills").val();
  var experience = $("#experience").val();
  var home = $("#home").val();
  var workers = $("#workers").val();
  var certified = $("#certified").val();
  var certification_number = $("#certification_number").val();
  var skill_level = $("#skill_level").val();
  var officer = $("#officer").val();
  var dates = $("#dates").val();
  var status = $("#status").val();
  
  
  var sql = "SELECT * FROM ((workers INNER JOIN assigned_surveys ON workers.user_id = assigned_surveys.profile_id) INNER JOIN users ON workers.user_id = users.id) WHERE workers.status = 'approved' ";
  //var sql = "SELECT * FROM workers WHERE status = 'approved' ORDER BY id DESC";
  
  if(annual)
  {
	  if(annual != 'All')
	  {
	  sql = sql + "AND workers.annual_income = '" + annual + "' ";
	  }
  }
  if(number)
  {
	  sql = sql + "AND workers.user_id LIKE '%25" + number + "%25' ";
  }
  
  if(phone)
  {
	  sql = sql + "AND workers.phone LIKE '%25" + phone + "%25' ";
  }
  if(name)
  {
	  sql = sql + "AND workers.name LIKE '%25" + name + "%25' ";
  }
  if(age)
  {
	  sql = sql + "AND workers.age LIKE '%25" + age + "%25' ";
  }
  if(gender)
  {
	  if(gender != 'All')
	  {
	  sql = sql + "AND workers.gender = '" + gender + "' ";
	  }
  }
  if(district)
  {
	  sql = sql + "AND workers.cdistrict LIKE '%25" + district + "%25' ";
  }
  if(state)
  {
	  sql = sql + "AND workers.cstate LIKE '%25" + state + "%25' ";
  }
  if(category)
  {
	  if(category != 'All')
	  {
	  sql = sql + "AND workers.category = '" + category + "' ";
	  }
  }
  if(religion)
  {
	  if(religion != 'All')
	  {
	  sql = sql + "AND workers.religion = '" + religion + "' ";
	  }
  }
  if(education)
  {
	  if(education != 'All')
	  {
	  sql = sql + "AND workers.educational = '" + education + "' ";
	  }
  }
  if(children)
  {
	  sql = sql + "AND workers.children LIKE '%25" + children + "%25' ";
  }
  if(belowsix)
  {
	  sql = sql + "AND workers.belowsix LIKE '%25" + belowsix + "%25' ";
  }
  if(sixtofourteen)
  {
	  sql = sql + "AND workers.sixtofourteen LIKE '%25" + sixtofourteen + "%25' ";
  }
  if(fifteentoeighteen)
  {
	  sql = sql + "AND workers.fifteentoeighteen LIKE '%25" + fifteentoeighteen + "%25' ";
  }
  if(goingtoschool)
  {
	  sql = sql + "AND workers.goingtoschool LIKE '%25" + goingtoschool + "%25' ";
  }
  if(sector.length > 0)
  {
	  var sec = sector.join();
	  sql = sql + "AND workers.sector IN (" + sec + ") ";
  }
  if(skills.length > 0)
  {
	  //var skl = skills.split(' - ');
	  sql = sql + "AND (";
	  var i;
for (i = 0; i < skills.length; i++) {
  
  sql = sql + "workers.skills LIKE '%25" + skills[i] + "%25' ";
  
  if(i != (skills.length - 1))
  {
	  sql = sql + 'OR ';
  }
  
}
	  sql = sql + ") ";
	  
  }
  if(experience)
  {
	  if(experience != 'All')
	  {
	  sql = sql + "AND workers.experience = '" + experience + "' ";
	  }
  }
  if(home)
  {
	  if(home != 'All')
	  {
	  sql = sql + "AND workers.home = '" + home + "' ";
	  }
  }
  if(workers)
  {
	  sql = sql + "AND workers.workers LIKE '%25" + workers + "%25' ";
  }
  if(certified)
  {
	  if(certified != 'All')
	  {
	  sql = sql + "AND workers.certified = '" + certified + "' ";
	  }
  }
  if(certification_number)
  {
	  sql = sql + "AND workers.certification_number LIKE '%25" + certification_number + "%25' ";
  }
  if(skill_level)
  {
	  if(skill_level != 'All')
	  {
	  sql = sql + "AND workers.skill_level = '" + skill_level + "' ";
	  }
  }
  if(status)
  {
	  if(status != 'All')
	  {
	  sql = sql + "AND users.status = '" + status + "' ";
	  }
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
  
  
  sql = sql + "ORDER BY workers.id DESC";
  
  
  console.log(sql);
  
  window.location.replace('verified_workers.php?aid=' + sql);
}

</script>
 <script>
function cancel() {
  console.log('clear clicked');
  var sql = "SELECT * FROM workers WHERE status = 'approved' ORDER BY id DESC";
  window.location.replace('verified_workers.php');
}

</script>

  
  <?php
  include('inc/footer.php');
  ?>
