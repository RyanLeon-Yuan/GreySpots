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
    <title>GreySpots - Your Guide in COVID’s New Normal</title>
    <link rel="shortcut icon" href="/static/picture/favicon.ico" />
    <!-- ***** All CSS Files ***** -->
    <!-- Style css -->
    <link rel="stylesheet" href="/static/css/style.css">
    <!-- LeafLet JS Library CSS (CDN) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Control Geocoder Leaflet plugin CSS (CDN) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <!-- Control Locate Leaflet plugin CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.css" />
    <!-- Gesture Handling Leaflet plugin CSS (CDN) -->
    <link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">
    
    <!-- Font Awesome CDN embed code! -->
    <script src="https://use.fontawesome.com/2af4fcd2f7.js"></script>

    <!-- LeafLet JS Library JS File (CDN) -->
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Make sure you put below plugins AFTER leaflet.js, when using with leaflet -->

    <!-- Control Geocoder Leaflet plugin JS (CDN) -->
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <!-- Control Locate Leaflet plugin JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
    <!-- Gesture Handling Leaflet plugin JS (CDN) -->
    <script src="//unpkg.com/leaflet-gesture-handling"></script>

    <!-- Disabling unwanted scaling of the page and set it to its actual size-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<style>
		#mapid {
			Width: 90%;
			height: 90vh;
		}
        .center {
            margin: auto;
            border: 5px solid #808080	;
        }
        input {
            color: black;
            width: auto;
        }

        .leaflet-control-geocoder-form input {
            font-size: 100%;
            border: 0;
            background-color: transparent;
            width: 246px; /* for iPhone and mobile compatibility */ 
            color: black;
        }

        .leaflet-control-geocoder-form input:focus {
            color: black;
        }

        .popup .leaflet-popup-content {
            --primary-t-color: rgb(91 91 91);
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.9;
        } 
        .info.legend {
            background-color: white;
            opacity: 0.9;
            border: 2px solid #808080;
            padding-inline: 3px;
            padding-block: 2px;
        }
        .leaflet-control-layers-expanded .leaflet-control-layers-list {
            display: block;
            position: relative;
            padding: unset;
        }
        .leaflet-touch .leaflet-bar a {
            width: 30px;
            height: 30px;
            line-height: 30px;
            color: black;
            font-size: large;
        }

        a:not(.btn), a:link:not(.btn) {
            font-size: unset;
        }

        .leaflet-touch .leaflet-bar a:first-child {
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
            font-size: initial;
        }

        .leaflet-touch .leaflet-bar a:last-child {
            border-bottom-left-radius: 2px;
            border-bottom-right-radius: 2px;
            font-size: initial;
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
                        <p>An integrated map platform where you can: <br>
                        Check exposure sites, testing points, and vaccination centres across Victoria and around your current location. <br>
                        Search specific addresses in the search bar, or focus on your current location by clicking on the ‘find my location’ arrow icon. <br>
                        Use the filters (right below the search bar) to select different map modes and show different markers separately. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Title Area End ***** -->
    <!-- ***** GSMap Area Start ***** -->
    <!-- <section class="activity-area load-more">
    
    </section> -->

    <div id="mapid" class="center"></div>

	<script>

		var streetMap = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 20,
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1,
			accessToken: 'pk.eyJ1IjoiamFsejAwMDEiLCJhIjoiY2tzeGVva3lpMGJxZDJzcDJ1dm1qZjg2eCJ9.SX_ldCklKFqp6D-JeeG05A'
		});

        var darkMap = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 20,
			id: 'mapbox/dark-v10',
			tileSize: 512,
			zoomOffset: -1,
			accessToken: 'pk.eyJ1IjoiamFsejAwMDEiLCJhIjoiY2tzeGVva3lpMGJxZDJzcDJ1dm1qZjg2eCJ9.SX_ldCklKFqp6D-JeeG05A'
		});

        var satelliteMap = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 20,
			id: 'mapbox/satellite-v9',
			tileSize: 512,
			zoomOffset: -1,
			accessToken: 'pk.eyJ1IjoiamFsejAwMDEiLCJhIjoiY2tzeGVva3lpMGJxZDJzcDJ1dm1qZjg2eCJ9.SX_ldCklKFqp6D-JeeG05A'
		});

        var satelliteStretMap = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 20,
			id: 'mapbox/satellite-streets-v11',
			tileSize: 512,
			zoomOffset: -1,
			accessToken: 'pk.eyJ1IjoiamFsejAwMDEiLCJhIjoiY2tzeGVva3lpMGJxZDJzcDJ1dm1qZjg2eCJ9.SX_ldCklKFqp6D-JeeG05A'
		});

        var lightMap = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 20,
			id: 'mapbox/light-v10',
			tileSize: 512,
			zoomOffset: -1,
			accessToken: 'pk.eyJ1IjoiamFsejAwMDEiLCJhIjoiY2tzeGVva3lpMGJxZDJzcDJ1dm1qZjg2eCJ9.SX_ldCklKFqp6D-JeeG05A'
		});

        var gsmap = L.map('mapid', {
            center: [-37.815026, 144.966874],
            zoom: 13,
            layers: [streetMap],
            gestureHandling: true, //Enable two finger movement and ctr + scroll for zooming for better UI
            "tap": false // quick fix for iOS issues. Please see https://github.com/Leaflet/Leaflet/issues/7255.
        });
        
        var baseMaps = {
            "Streets View": streetMap,
            "Dark Mode": darkMap,
            "Light Mode": lightMap,
            "Satellite View": satelliteMap,
            "Satellite/Street View": satelliteStretMap
            
        };

        


        // Adding the GreySpots logo at the bottom of the page. From LeafLet Documentation
        L.Control.Watermark = L.Control.extend({
            onAdd: function(map) {
                var img = L.DomUtil.create('img');

                img.src = '/static/picture/logowithword.png';
                img.style.width = '100px';

                return img;
            }
        });

        L.control.watermark = function(opts) {
            return new L.Control.Watermark(opts);
        }

        L.control.watermark({ position: 'bottomleft' }).addTo(gsmap);

        L.control.scale().addTo(gsmap);


        // Creating a leaflet Locate Control button to show user location. Control will use native 'locate' function
        // Please see https://github.com/domoritz/leaflet-locatecontrol for more details
        var userLocation = L.control.locate({
            position: 'topleft',
            icon: 'fas fa-location-arrow',
            locateOptions: {
                    enableHighAccuracy: true // Enabling GPS High Accuracy by default
            },
            strings: {
                title: "Show my location"
            }
        }).addTo(gsmap);



        // L.Control.geocoder().addTo(gsmap);
        // Possible values are 'topleft', 'topright', 'bottomleft' or 'bottomright'
        var geocoder = L.Control.geocoder({
            collapsed: false,
            placeholder: "Enter an Address",
            geocoder: L.Control.Geocoder.nominatim({
                geocodingQueryParams: {countrycodes: 'au', acceptlanguage: 'en'}
            })
        }).addTo(gsmap);



        var layerGroupV = L.layerGroup().addTo(gsmap);
        var layerGroupT = L.layerGroup().addTo(gsmap);
        var layerGroupET1 = L.layerGroup().addTo(gsmap);
        var layerGroupET2 = L.layerGroup().addTo(gsmap);
        var layerGroupET3 = L.layerGroup().addTo(gsmap);

        
        var t1expIcon = new L.Icon({
            iconUrl: '/t1exp.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
            });
            
        var t2expIcon = new L.Icon({
            iconUrl: '/t2exp.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
            });

        var t3expIcon = new L.Icon({
            iconUrl: '/t3exp.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
            });

        var testIcon = new L.Icon({
            iconUrl: '/test.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
            });

        var vaccIcon = new L.Icon({
            iconUrl: '/vacc.png',
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
            // inspired from https://stackoverflow.com/questions/50259942/leaflet-popup-with-multiple-fields
            var popup = L.popup({className: 'popup'})
                .setContent('<div class="popup">'+
                '<h4><b>' + p[i].shortNameClean + '</\h4></b>'+
                '<p><b>' + p[i].addressFull + '</b><br>'+
                '<b>' + p[i].clinicStatus + '</b><br>'+
                '<b>' + p[i].opening_hours + '</b><br>'+
                '<b>' + p[i].walkinsTable + '</b><br>'+ 
                '</\p>'+
                '</\div>');

			marker = L.marker([p[i].lat,p[i].lng], {icon: vaccIcon});
			marker.bindPopup(popup);
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

            var popup = L.popup({className: 'popup'})
                .setContent('<div class="popup">'+
                '<h4><b>' + d[i].site_name + '</\h4></b>'+
                '<p><b>' + d[i].address + '</b>'+ ', ' +
                '<b>' + d[i].postcode + '</b><br>'+
                        d[i].instructions + '<br>'+
                '</\p>'+
                '</\div>');
	
            if (d[i].category == "Testing Centers") {

            // inspired from https://stackoverflow.com/questions/50259942/leaflet-popup-with-multiple-fields


                var markerT = L.marker([d[i].latitude,d[i].longitude], {icon: testIcon});
                markerT.bindPopup(popup);

                layerGroupT.addLayer(markerT);
            }

            }
    	}


		xhttpall.open("get", "/getSitesJSON.php", true); 
		xhttpall.send();

        
        // Create a new AJAX request to read data
        var xhttpExp = new XMLHttpRequest();
		// function 
		xhttpExp.onload = function() { 
		// Parsing into JSON   
		var e = JSON.parse(this.responseText);


		//  to loop over  the JSON  objects

		for (let i= 0; e[i]; i++) {

            // inspired from https://stackoverflow.com/questions/50259942/leaflet-popup-with-multiple-fields
            var popup = L.popup({className: 'popup'})
                .setContent('<div class="popup">'+
                '<h4><b>' + e[i].Site_title + '</\h4></b>'+
                '<p><b>' + e[i].Site_streetaddress + '</b>'+ ', ' +
                '<b>' + e[i].Suburb + ' ' + e[i].Site_postcode +'</b><br>'+
                '<b>' + e[i].Exposure_date + '</b><br>'+
                        e[i].Advice_instruction + '<br>'+
                '</\p>'+
                '</\div>');
	
            if (e[i].Advice_title.includes("Tier 1")) {
           
                var markert1E = L.marker([e[i].lat,e[i].lon], {icon: t1expIcon});
                markert1E.bindPopup(popup);

                layerGroupET1.addLayer(markert1E);

            } else if (e[i].Advice_title.includes("Tier 2")) {

                var markert2E = L.marker([e[i].lat,e[i].lon], {icon: t2expIcon});
                markert2E.bindPopup(popup);
                

                layerGroupET2.addLayer(markert2E);

                
            } else { // if Tier 3

                var markert3E = L.marker([e[i].lat,e[i].lon], {icon: t3expIcon});
                markert3E.bindPopup(popup);

                layerGroupET3.addLayer(markert3E);

                }
        }
           
        }


		xhttpExp.open("get", "https://raw.githubusercontent.com/benkaiser/covid-vic-exposure-map/master/data.json", true); 
		xhttpExp.send();

        // fetch('https://raw.githubusercontent.com/benkaiser/covid-vic-exposure-map/master/data.json')
        //     .then(res => res.json())
        //     .then(json => {
        //         //json vaiable contains object with data
        //         console.log(json)
        //     })


        var overlay = {'Tier 1 Exposure Site': layerGroupET1, 'Tier 2 Exposure Site': layerGroupET2, 'Tier 3 Exposure Site': layerGroupET3,
                        'Vaccination Centers': layerGroupV, 'Testing Centers': layerGroupT };

        

        L.control.layers(baseMaps, overlay).addTo(gsmap);


        // Inspired from  https://gis.stackexchange.com/questions/133630/adding-leaflet-legend
        // Adding LEgend at the bottom right

        var legend = L.control({position: 'bottomright'});

        legend.onAdd = function (gsmap) {

            var div = L.DomUtil.create('div', 'info legend'),
                grades = ["Tier 1 Exposure Site", "Tier 2 Exposure Site", "Tier 3 Exposure Site", "Vaccination Center", "Testing Center"],
                labels = ["/t1exp.png", "/t2exp.png","/t3exp.png", "/vacc.png", "/test.png"];

            for (var i = 0; i < grades.length; i++) {
                div.innerHTML +=
                ("  " + " <img src="+ labels[i] +" height='15' width='15'>") + "  " + grades[i] + "  " + '<br>';
            }

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