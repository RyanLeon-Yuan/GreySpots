<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head;
any other head content must come *after* these tags -->
    <!-- Title  -->
    <title>GreySpot - Your Guide in COVID’s New Normal</title>
    <link rel="shortcut icon" href="/static/picture/favicon.ico" />
    <!-- ***** All CSS Files ***** -->
    <!-- Style css -->
    <link rel="stylesheet" href="/static/css/style.css">
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
		#mapid {
			Width: 90%;
			height: 720px;
		}
        .center {
            margin: auto;
            width: 60%;
            border: 5px solid #808080	;
            padding: 50px;
        }
        input {
            color: black;
        }

        .leaflet-control-geocoder-form input {
            font-size: 120%;
            border: 0;
            background-color: transparent;
            width: 246px;
            color: black;
        }

        .leaflet-control-geocoder-form input:focus {
            color: black;
        }

        }
        /* body {
            padding: 0;
            margin: 0;
        } */
        /* html, body, #map {
            height: 100%;
            width: 100vw;
        } */
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
	</style>
    
</head>
<body>
<!--====== Preloader Area Start ======-->
<div id="netstorm-preloader" class="netstorm-preloader">
    <!-- Preloader Animation -->
    <div class="preloader-animation">
        <!-- Spinner -->
        <div class="spinner"></div>
        <p class="fw-5 text-center text-uppercase">Loading</p>
    </div>
    <!-- Loader Animation -->
    <div class="loader-animation">
        <div class="row h-100">
            <!-- Single Loader -->
            <div class="col-3 single-loader p-0">
                <div class="loader-bg"></div>
            </div>
            <!-- Single Loader -->
            <div class="col-3 single-loader p-0">
                <div class="loader-bg"></div>
            </div>
            <!-- Single Loader -->
            <div class="col-3 single-loader p-0">
                <div class="loader-bg"></div>
            </div>
            <!-- Single Loader -->
            <div class="col-3 single-loader p-0">
                <div class="loader-bg"></div>
            </div>
        </div>
    </div>
</div>
<!--====== Preloader Area End ======-->
<div class="main">
    <!-- ***** Header Start ***** -->
    <header id="header">
        <!-- Navbar -->
        <nav data-aos="zoom-out" data-aos-delay="800" class="navbar navbar-expand">
            <div class="container header">
                <!-- Navbar Brand-->
                <a class="navbar-brand" href="https://greyspots.tech"> <img class="navbar-brand-sticky" src="static/picture/logowithword.png" alt="sticky brand-logo" /></a>
                <div class="ml-auto"></div>
                <!-- Navbar -->
                <ul class="navbar-nav items mx-auto">
                    <li class="nav-item"><a class="nav-link" href="https://greyspots.tech">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://greyspots.tech/SafetyGuard.php">Safety Guard</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://greyspots.tech/ExposureAlert.php">Exposure Alert</a></li>
                    <li class="nav-item dropdown"><a class="nav-link" href="#">Covid Informatics <i class="fas fa-angle-down ml-1"></i></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="https://greyspots.tech/ExposureSite.php">Exposure Site</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://greyspots.tech/Covid-19Testing.php">Covid-19 Testing</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://greyspots.tech/VaccinatePoint.php">Vaccinate Points</a></li>
                        </ul> </li>
                    <li class="nav-item"><a class="nav-link" href="https://greyspots.tech/About.php">About</a></li>
                </ul>

                <!-- Navbar menu -->
                <ul class="navbar-nav toggle">
                    <li class="nav-item"> <a href="#" class="nav-link" data-toggle="modal" data-target="#menu"> <i class="fas fa-bars toggle-icon m-0"></i> </a> </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ***** Header End ***** -->
    <!-- ***** Title Area Start ***** -->
    <section class="breadcrumb-area overlay-dark d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Breamcrumb Content -->
                    <div class="breadcrumb-content text-center">
                        <h2 class="m-0">Safety Guard</h2>
                        <p>An integrated map platform where you can search for the Covid risks, testing points and vaccine center related to your location.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Title Area End ***** -->
    <!-- ***** GSMap Area Start ***** -->
    <section class="activity-area load-more">
    <div id="mapid" class="center"></div>
    </section>


	<script>
		// var gsmap = L.map('map').setView([-37.81238039198305, 144.9638463625738], 8);
        var gsmap = L.map('mapid').setView([-37.815026, 144.966874], 14);



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
    <!--======Footer Area Start======-->
    <footer class="footer-area">
        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3 res-margin">
                        <!-- Footer Items -->
                        <div class="footer-items">
                            <!-- Footer Title -->
                            <h4 class="footer-title">Useful Links</h4>
                            <ul>
                                <li><a href="https://greyspots.tech">Home</a></li>
                                <li><a href="https://greyspots.tech/SafetyGuard.php">Safety Guard</a></li>
                                <li><a href="https://greyspots.tech/ExposureAlert.php">Exposure Alert</a></li>
                                <li><a href="https://greyspots.tech/About.php">About</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 res-margin">
                        <!-- Footer Items -->
                        <div class="footer-items">
                            <!-- Footer Title -->
                            <h4 class="footer-title">Covid Informatics</h4>
                            <ul>
                                <li><a href="https://greyspots.tech/ExposureSite.php">Exposure Site</a></li>
                                <li><a href="https://greyspots.tech/Covid-19Testing.php">Covid-19 Testing</a></li>
                                <li><a href="https://greyspots.tech/VaccinatePoints.php">Vaccinate Points</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 res-margin">

                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 res-margin">
                        <!-- Footer Items -->
                        <div class="footer-items">
                            <!-- Logo -->
                            <a class="navbar-brand" href=""> <img width="250" src="static/picture/Team logo.png" alt="" /></a>
                            <p>A group of people who have a tech background and work on social good.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Copyright Area -->
                        <div class="copyright-area d-flex flex-wrap justify-content-center justify-content-sm-between text-center py-4">
                            <!-- Copyright -->
                            <div class="copyright-left">
                                Made By TechHumans For TechHumans.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--======Footer Area End======-->
    <!--====== Modal Responsive Menu Area Start ======-->
    <div id="menu" class="modal fade p-0">
        <div class="modal-dialog dialog-animated">
            <div class="modal-content h-100">
                <div class="modal-header" data-dismiss="modal">
                    Menu <i class="far fa-times-circle icon-close"></i>
                </div>
                <div class="menu modal-body">
                    <div class="row w-100">
                        <div class="items p-0 col-12 text-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== Modal Responsive Menu Area End ======-->
    <!--====== Scroll To Top Area Start ======-->
    <div id="scroll-to-top" class="scroll-to-top">
        <a href="#header" class="smooth-anchor">
            <i class="fas fa-arrow-up"></i>
        </a>
    </div>
    <!--====== Scroll To Top Area End ======-->
</div>
<!-- ***** All jQuery Plugins ***** -->
<!-- jQuery(necessary for all JavaScript plugins) -->
<script src="/static/js/jquery.min.js"></script>
<!-- Bootstrap js -->
<script src="/static/js/popper.min.js"></script>
<script src="/static/js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="/static/js/all.min.js"></script>
<script src="/static/js/slider.min.js"></script>
<script src="/static/js/countdown.min.js"></script>
<script src="/static/js/shuffle.min.js"></script>
<!-- Active js -->
<script src="/static/js/main.js"></script>
</body>
</html>