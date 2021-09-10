<!doctype html>
<html class="no-js" lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Geosearch function CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    

	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <!-- Make sure you put this AFtER leaflet.js, when using with leaflet -->
    <script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script>
    
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    
    <!-- Disabling unwanted scaling of the page and set it to its actual size-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<style>
        body {
            padding: 0;
            margin: 0;
        }
        html, body, #map {
            height: 100%;
            width: 100vw;
        }
		/* #mapid {
			Width: 1280px;
			height: 720px; */
		}
        /* .center {
            margin: auto;
            width: 60%;
            border: 5px solid #808080	;
            padding: 10px;
        } */
	</style>
    
</head>
<body>
    <!-- ***** GSMap Area Start ***** -->
    <div id="map" class="center"></div>
	<script>
		// var gsmap = L.map('map').setView([-37.81238039198305, 144.9638463625738], 8);
        var gsmap = L.map('map').fitWorld();



		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 18,
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1,
			accessToken: 'pk.eyJ1IjoiamFsejAwMDEiLCJhIjoiY2tzeGVva3lpMGJxZDJzcDJ1dm1qZjg2eCJ9.SX_ldCklKFqp6D-JeeG05A'
		}).addTo(gsmap);

        gsmap.locate({setView: true, maxZoom: 16});

		function onLocationFound(e) {
        var radius = e.accuracy;

        L.marker(e.latlng).addTo(gsmap)
            .bindPopup("You are within " + Math.round(radius) + " meters from this point").openPopup();

        L.circle(e.latlng, radius).addTo(gsmap);
        }

        gsmap.on('locationfound', onLocationFound);

        // const search = new GeoSearch.GeoSearchControl({
        // provider: new GeoSearch.OpenStreetMapProvider(),
        // style: 'bar',
        // showMarker: true,
        // retainZoomLevel: false,
        // animateZoom: true,
        // updateMap: true,
        // autoClose: true,
        // }).addTo(gsmap);

        // L.Control.geocoder().addTo(gsmap);
        // Possible values are 'topleft', 'topright', 'bottomleft' or 'bottomright'
        var geocoder = L.Control.geocoder({
            collapsed: false,
        }).addTo(gsmap);


        // gsmap.addControl(search);


		var xhttp = new XMLHttpRequest();
		// function 
		xhttp.onload = function() { 
		// Parsing into JSON   
		var p = JSON.parse(this.responseText);

		//  to loop over  the JSON  objects
        var layerGroup = L.layerGroup().addTo(gsmap);

		for (let i= 0; p[i]; i++) {
			marker = L.marker([p[i].lat,p[i].lng]);
			marker.bindPopup(p[i].shortName);
            layerGroup.addLayer(marker);
    		}

        var overlay = {'Vaccination Sites': layerGroup};
        L.control.layers(null, overlay).addTo(gsmap);

		}

		xhttp.open("get", "/getVacSitesJSON.php", true); 
		xhttp.send();



	</script>
    <!-- ***** GSMap Area End ***** -->
    
</body>
</html>