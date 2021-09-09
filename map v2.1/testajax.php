<script type = "text/javascript">

var xhttp = new XMLHttpRequest();
// function 
xhttp.onload = function() {
// Parsing into JSON   
var p = JSON.parse(this.responseText);
//  to loop over  the JSON  objects
for (let i= 0; p[i]; i++) {
    //document.getElementById("demo").innerHTML = p[i].shortname + ", " + p[i].lat + ", " + p[i].lng;
    }
}

xhttp.open("get", "getVacSitesJSON.php", true); 
xhttp.send();
</script>
