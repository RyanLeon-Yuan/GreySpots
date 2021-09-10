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
        .legend {
            line-height: 18px;
            color: #555;
        }
        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
        .info.legend {
            background-color: white;
            opacity: 0.7;

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
        var gsmap = L.map('map').setView([-37.815026, 144.966874], 14);



		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 20,
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1,
			accessToken: 'pk.eyJ1IjoiamFsejAwMDEiLCJhIjoiY2tzeGVva3lpMGJxZDJzcDJ1dm1qZjg2eCJ9.SX_ldCklKFqp6D-JeeG05A'
		}).addTo(gsmap);

        L.control.scale().addTo(gsmap);


        gsmap.locate({setView: true, maxZoom: 18});

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

        var layerGroupV = L.layerGroup().addTo(gsmap);
        var layerGroupE = L.layerGroup().addTo(gsmap);
        var layerGroupT = L.layerGroup().addTo(gsmap);

        var purpleIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-violet.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
            });

        var greyIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-grey.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
            });



		var xhttp = new XMLHttpRequest();
		// function 
		xhttp.onload = function() { 
		// Parsing into JSON   
		var p = JSON.parse(this.responseText);

		//  to loop over  the JSON  objects


		for (let i= 0; p[i]; i++) {
			marker = L.marker([p[i].lat,p[i].lng]);
			marker.bindPopup(p[i].shortName);
            layerGroupV.addLayer(marker);

    		}

		}

		xhttp.open("get", "/getVacSitesJSON.php", true); 
		xhttp.send();

        var xhttpall = new XMLHttpRequest();
		// function 
		xhttpall.onload = function() { 
		// Parsing into JSON   
		var d = JSON.parse(this.responseText);


		//  to loop over  the JSON  objects


		for (let i= 0; d[i]; i++) {
	
            if (d[i].category == "Testing Centers") {

                var markerT = L.marker([d[i].latitude,d[i].longitude], {icon: greyIcon});
                markerT.bindPopup(d[i].site_name);

                layerGroupT.addLayer(markerT);
            } else {

                var markerE = L.marker([d[i].latitude,d[i].longitude], {icon: purpleIcon});
                markerE.bindPopup(d[i].site_name);
                

                layerGroupE.addLayer(markerE);

                }


            }
    	}


		xhttpall.open("get", "/getSitesJSON.php", true); 
		xhttpall.send();

        var overlay = {'Vaccination Sites': layerGroupV, 'Exposure Sites': layerGroupE, 'Testing Centers': layerGroupT};
        L.control.layers(null, overlay).addTo(gsmap);

        // This is from https://gis.stackexchange.com/questions/133630/adding-leaflet-legend

        function getColor(d) {
        return d === 'Vaccination Site'  ? "#2A81CB" :
               d === 'Exposure Site'  ? "#9C2BCB" :
               d === 'Testing Center' ? "#7B7B7B" :
                                        "#ffffff";
        }

        function style(feature) {
            return {
                weight: 1.5,
                opacity: 1,
                fillOpacity: 1,
                radius: 6,
                fillColor: getColor(feature.properties.TypeOfIssue),
                color: "grey"

            };
        }

        var legend = L.control({position: 'bottomright'});
        legend.onAdd = function (gsmap) {

        var div = L.DomUtil.create('div', 'info legend');
        labels = ['<strong>Categories</strong>'],
        categories = ['Vaccination Site','Exposure Site','Testing Center'];

        for (var i = 0; i < categories.length; i++) {

                div.innerHTML += 
                labels.push(
                    '<i class="circle" style="background:' + getColor(categories[i]) + '"></i> ' +
                (categories[i] ? categories[i] : '+'));

            }
            div.innerHTML = labels.join('<br>');
        return div;
        };
        legend.addTo(gsmap);



	</script>
    <!-- ***** GSMap Area End ***** -->
    
</body>
</html>