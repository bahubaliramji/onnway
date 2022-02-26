<?php
include("header.php");

include("sidebar.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<section id="main-content">
    <section class="wrapper"> 
          <div class="container">
	<div class="row" style="padding-top: 40px;">
	    <div class="col-sm-4"></div>
		<div class="col-sm-4">
		    <h2>RESET PASSWORD</h2></br></br>
		    <form action="resetpasswordphp.php" method="POST">
		       <label>New Password</label>
            <div class="form-group pass_show"> 
                <input name="password" class="form-control" id="password" type="password" onkeyup='check();' /> 
            </div> 
		       <label>Confirm Password</label>
            <div class="form-group pass_show"> 
               <input type="password" class="form-control" name="confirm_password" id="confirm_password"  onkeyup='check();' /> 
  <span id='message'></span>
            </div> 
            <div class="form-group pass_show"> 
                <input value="SUBMIT" class="btn btn-primary btn-lg" id="submit" type="submit" name="submit"> 
            </div> 
            </form>
		</div>  
	</div>
</div>
    </section>
</section>
<script>
  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>
<?php
include("footer.php");
?>