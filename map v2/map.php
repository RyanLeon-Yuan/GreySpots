<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
	<style>
		#mapid {
			Width: 1280px;
			height: 720px;
		}
	</style>
</head>

<body>
	<div id="mapid"></div>
	<script>
		var gsmap = L.map('mapid').setView([-37.81238039198305, 144.9638463625738], 8);

		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 18,
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1,
			accessToken: 'pk.eyJ1IjoiamFsejAwMDEiLCJhIjoiY2tzeGVva3lpMGJxZDJzcDJ1dm1qZjg2eCJ9.SX_ldCklKFqp6D-JeeG05A'
		}).addTo(gsmap);

		// var vacSite =  'East Grampians Health Service - Ararat'
		// var vacSiteLat = -37.27890105
		// var vacSiteLong = 142.9321884
		var vacIcon = L.icon({
			iconUrl: 'vac.png',
			iconSize: [50, 45],
			iconAnchor: [22, 94],
			popupAnchor: [-3, -76],

		});

		var xhttp = new XMLHttpRequest();
		// function 
		xhttp.onload = function() {
		// Parsing into JSON   
		var p = JSON.parse(this.responseText);
		//  to loop over  the JSON  objects
		for (let i= 0; p[i]; i++) {
			var marker = L.marker([p[i].lat,p[i].lng]).addTo(gsmap);
			marker.bindPopup(p[i].shortname).openPopup();
			//document.getElementById("demo").innerHTML = p[i].shortname + ", " + p[i].lat + ", " + p[i].lng;
    		}
		}

		xhttp.open("get", "getVacSitesJSON.php", true); 
		xhttp.send();
		// var circle = L.circle([vacSiteLat, vacSiteLong], {
		// 	color: 'red',
		// 	fillColor: '#f03',
		// 	fillOpacity: 0.5,
		// 	radius: 250
		// }).addTo(gsmap);

	</script>
</body>

</html>