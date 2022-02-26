<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
?>
<section id="main-content">
    <section class="wrapper" style="padding-left:40px;"> 
          <div class="row" style="font-size:30px;">
             <b>ADD ROUTE</b> 
          </div>
    	<form method="POST" action="add-route-php.php">
        
         <div class="row" style="padding-top:10px; font-size:18px;">
           <div class="col-sm-2"> </div><div class="row" style="padding-top:10px; font-size:18px;"></div></div>
            <div class="row" style="padding-top:10px; font-size:18px;"> 
            <div class="col-sm-2"> FROM :  </div><div class="col-sm-3"><input id="query-0" class="query" name="source" type="text" placeholder="source" style=" padding: 14px 10px;
    border-radius: 2px;
    width: 261px;
    color: #5e5e5e;
    font-size: 14px;" required /> </div>
</div></div>
<div class="row" style="padding-top:10px; font-size:18px;"> 
            <div class="col-sm-2"> TO :  </div><div class="col-sm-3"><input id="query-1" class="query" name="destination" type="text" placeholder="destination" style="padding: 14px 10px;
    border-radius: 2px;
    width: 261px;
    color: #5e5e5e;
    font-size: 14px;" required /> </div>
</div></div>
<div class="row" style="padding-top:10px; font-size:18px;"> 
            <div class="col-sm-2"> TRUCK TYPE :  </div><div class="col-sm-3">
                <select name="vehicle" style="padding: 14px 10px;
    border-radius: 2px;
    width: 261px;
    color: #5e5e5e;
    font-size: 14px;">
                   <?php $rowtruck = mysqli_query($dbhandle,"SELECT * FROM `vehicle_list` ");
									while($fetch = mysqli_fetch_array($rowtruck)){ ?>
      <option value="<?php echo $fetch['id'];?>"> <?php if($fetch['vehicle_type']==1){echo "Truck |";} if($fetch['vehicle_type']==2){echo "Trailer |";} if($fetch['vehicle_type']==3){echo "Container |";} echo $fetch['length']; echo"MT/";echo $fetch['dimension']; ?></option>
    <?php } ?></select>
            </div>
</div></div>
<div class="row" style="padding-top:10px; font-size:18px;"> 
            <div class="col-sm-2"> PRICE :  </div><div class="col-sm-3"><input type="text" style="padding: 14px 10px;
    border-radius: 2px;
    width: 261px;
    color: #5e5e5e;
    font-size: 14px;" name="price" aria-describedby="emailHelp" placeholder="price"  required> </div>
</div></div>
    <div class="row" style="padding-top:10px;">
     <div class="col-sm-4"><input value="SUBMIT" class="btn btn-primary btn-lg" id="submit" type="submit" name="submit"></div>
     </div>
    </section>
</section>
 <script type="text/javascript">

var inputs = document.getElementsByClassName('query');

var options = {
  types: ['(cities)'],
  componentRestrictions: {country: "in"}
};

var autocompletes = [];

for (var i = 0; i < inputs.length; i++) {
  var autocomplete = new google.maps.places.Autocomplete(inputs[i], options);
  autocomplete.inputId = inputs[i].id;
  autocomplete.addListener('place_changed', fillIn);
  autocompletes.push(autocomplete);
}

function fillIn() {
  console.log(this.inputId);
  var place = this.getPlace();
  console.log(place. address_components[0].long_name);
}
</script>
<?php
include("footer.php");
?>