<!DOCTYPE html>
<html>
  <head>
    <title>www.W3docs.com</title>
    <style>
      input {
        height: 30px;
        padding-left: 10px;
        border-radius: 4px;
        border: 1px solid rgb(186, 178, 178);
        box-shadow: 0px 0px 12px #EFEFEF;
      }
    </style>
   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD5e-SJP_E8SDLOHYz79IR79pVy6YQOgg&libraries=places"></script>
  </head>
  <body>
   <form method="POST" action="apiapi.php"> 
   <input id="query-0" class="query" name="source" type="text"/>
<input id="query-1" class="query" type="text"/>
<input id="query-2" class="query" type="text"/>
   <input type="submit">
   </form>

    <script type="text/javascript">
var inputs = document.getElementsByClassName('query');

var options = {
  types: ['(cities)']
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
  </body>
</html>
