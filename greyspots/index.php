<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="description" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title>GreySpots - Your Guide in COVID’s New Normal</title>
    <link rel="shortcut icon" href="static/picture/favicon.ico"/>
    <!-- ***** All CSS Files ***** -->
    <!-- Style css -->
    <link rel="stylesheet" href="static/css/style.css"/>
    <!-- ***** Database Usage ***** -->
    <?php
    $activecases = "";
    $newcases = "";
    $totalcases = "";
    $numexpo = "";
    $nactivecases = "";
    $nnewcases = "";
    $ntotalcases = "";
    $nnumexpo = "";
    $datadate = "";
    include ("dbcs.php");
    ?>
</head>
<body>
<!--======Preloaded Area Start======-->
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
<!--======Preloader Area End======-->
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
                    <li class="nav-item"><a class="nav-link" href="https://greyspots.tech/CrowdAdvisor.php">Crowd Advisor</a></li>
                    <li class="nav-item dropdown"><a class="nav-link" href="#">Covid Informatics <i class="fas fa-angle-down ml-1"></i></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="https://greyspots.tech/ExposureSite.php">Exposure Site</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://greyspots.tech/Covid-19Testing.php">Covid-19 Testing</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://greyspots.tech/VaccinatePoint.php">Vaccinate Points</a></li>
                        </ul> </li>
                    <li class="nav-item"><a class="nav-link" href="https://greyspots.tech/ExposureAlert.php">Exposure Alert</a></li>
                    <li class="nav-item dropdown"><a class="nav-link" href="#">About <i class="fas fa-angle-down ml-1"></i></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="https://greyspots.tech/About.php">About Site</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://greyspots.tech/AboutData.php">About Data</a></li>
                        </ul> </li>
                </ul>

                <!-- Navbar menu -->
                <ul class="navbar-nav toggle">
                    <li class="nav-item"> <a href="#" class="nav-link" data-toggle="modal" data-target="#menu"> <i class="fas fa-bars toggle-icon m-0"></i> </a> </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ***** Header End ***** -->
    <!-- ***** Home Page Title Start ***** -->
    <section class="hero-section">
        <div class="text-center container">
            <div>
                <h3 class="mt-4">Afraid to leave the house after the outbreak ?</h3>
                <h3 class="mt-4">The supermarket downstairs has become an exposure site ?</h3>
                <h3 class="mt-4">Hurry to try our latest tool !</h3>
                <div class="button-group">
                    <a class=" btn btn-bordered-white" href="https://greyspots.tech/SafetyGuard.php"><h5>Safety Guard</h5></a>
                </div>
            </div>
        </div>
        <!-- Shape -->
        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1440 465" version="1.1">
                <defs>
                    <lineargradient x1="49.7965246%" y1="28.2355058%" x2="49.7778147%" y2="98.4657689%" id="linearGradient-1">
                        <stop stop-color="rgba(69,40,220, 0.15)" offset="0%"></stop>
                        <stop stop-color="rgba(87,4,138, 0.15)" offset="100%"></stop>
                    </lineargradient>
                </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="" fill="url(#linearGradient-1)">
                        <animate id="graph-animation" xmlns="http://www.w3.org/2000/svg" dur="2s" repeatcount="" attributename="points" values="0,464 0,464 111.6,464 282.5,464 457.4,464 613.4,464 762.3,464 912.3,464 1068.2,464 1191.2,464 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,323.3 282.5,373 457.4,423.8 613.4,464 762.3,464 912.3,464 1068.2,464 1191.2,464 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,336.6 457.4,363.5 613.4,414.4 762.3,464 912.3,464 1068.2,464 1191.2,464 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,323.3 613.4,340 762.3,425.6 912.3,464 1068.2,464 1191.2,464 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,290.4 762.3,368 912.3,446.4 1068.2,464 1191.2,464 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,329.6 912.3,420 1068.2,427.6 1191.2,464 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,272 912.3,402.4 1068.2,373 1191.2,412 1328.1,464 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,272 912.3,376 1068.2,336.6 1191.2,334 1328.1,404 1440.1,464 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,272 912.3,376 1068.2,282 1191.2,282 1328.1,314 1440.1,372.8 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,272 912.3,376 1068.2,282 1191.2,204 1328.1,254 1440.1,236 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,272 912.3,376 1068.2,282 1191.2,204 1328.1,164 1440.1,144.79999999999998 1440.1,464 0,464; 0,464 0,367 111.6,263 282.5,282 457.4,263 613.4,216 762.3,272 912.3,376 1068.2,282 1191.2,204 1328.1,164 1440.1,8 1440.1,464 0,464;" fill="freeze"></animate>
                    </polygon>
                </g>
            </svg>
        </div>
    </section>
    <!-- ***** Home Page Title End ***** -->
    <!-- ***** Work Area Start ***** -->
    <?php
    echo <<<EOT

            <section class="item-details-area" style="padding-top:20px;padding-bottom:2px;">
            <div class="container">
                <h2 class="text-center">Victoria Covid-19 Status</h2>
                <div class="row justify-content-between">
                    <div class="col-12 col-lg-5">
                        <h3>City of Melbourne</h3>
                        <h4 style="color: #B88BE4">
                            The number of exposure sites is <span style="color: red">$numexpo.</span><br>
                            The number of active cases is <span style="color: red">$activecases.</span><br>
                            The number of new cases is <span style="color: red">$newcases.</span><br>
                            The number of all cases is <span style="color: red">$totalcases.</span>
                        </h4>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h3>Rest of Victoria</h3>
                        <h4 style="color: #B88BE4">
                            The number of exposure sites is <span style="color: red">$nnumexpo.</span><br>
                            The number of active cases is <span style="color: red">$nactivecases.</span><br>
                            The number of new cases is <span style="color: red">$nnewcases.</span><br>
                            The number of all cases is <span style="color: red">$ntotalcases.</span>
                        </h4>
                    </div>
                </div>
                <blockquote>Data Update On $datadate Accroding to Department of Health Victoria</blockquote>
            </div>
        </section>
EOT;
    ?>
    <!-- ***** Work Area End ***** -->
    <!-- ***** Home Page Start ***** -->
    <section class="wallet-connect-area" style="padding-top:0;">
        <div class="container" style="padding-top:0;">
            <div class="row justify-content-center items" >
                <div class="col-12 col-md-6 col-lg-4 item">
                    <!-- Single Wallet -->
                    <div class="card single-wallet">
                        <a class="d-block text-center" href="https://greyspots.tech/SafetyGuard.php"> <img class="avatar-lg" src="static/picture/logo3.png" alt="" /> <h4 class="mb-0">Safety Guard</h4> <p>An integrated map platform where you can search for the Covid risks, testing points and vaccine center related to your location.</p></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 item">
                    <!-- Single Wallet -->
                    <div class="card single-wallet">
                        <a class="d-block text-center" href="https://greyspots.tech/CrowdAdvisor.php"> <img class="avatar-lg" src="static/picture/CA.png" alt="" /> <h4 class="mb-0">Crowd Advisor</h4> <p>Crowd Advisor provides specific places in the Melbourne City area which can check all the relevant information and safely plan your visits.</p></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 item">
                    <!-- Single Wallet -->
                    <div class="card single-wallet">
                        <a class="d-block text-center" href="https://greyspots.tech/ExposureAlert.php"> <img class="avatar-lg" src="static/picture/alert.png" alt="" /> <h4 class="mb-0">Exposure Alert</h4> <p>With a simple and free subscription, you will receive an alert through e-mail once there are potential Covid risks around you.</p></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 item">
                    <!-- Single Wallet -->
                    <div class="card single-wallet">
                        <a class="d-block text-center" href="https://greyspots.tech/ExposureSite.php"> <img class="avatar-lg" src="static/picture/exposure.png" alt="" /> <h4 class="mb-0"> Exposure Site</h4> <p>This is the list of Covid19 exposure sites in Victoria region which is regularly updated based on Victorian government’s official website.</p></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 item">
                    <!-- Single Wallet -->
                    <div class="card single-wallet">
                        <a class="d-block text-center" href="https://greyspots.tech/Covid-19Testing.php"> <img class="avatar-lg" src="static/picture/test.png" alt="" /> <h4 class="mb-0">Covid-19 Testing</h4> <p>Here you can find the nearest Covid testing points to your location. If you have been to any exposure sites, it is necessary to get tested immediately.</p></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 item">
                    <!-- Single Wallet -->
                    <div class="card single-wallet">
                        <a class="d-block text-center" href="https://greyspots.tech/VaccinatePoint.php"> <img class="avatar-lg" src="static/picture/vaccine.png" alt="" /> <h4 class="mb-0"> Vaccinate Points</h4> <p>Here you can find the nearest Covid vaccine points to your location. Getting vaccinated is the best way of protecting yourself and others.</p></a>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- ***** Home Page End ***** -->
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
                                <li><a href="https://greyspots.tech/CrowdAdvisor.php">Crowd Advisor</a></li>
                                <li><a href="https://greyspots.tech/ExposureAlert.php">Exposure Alert</a></li>
                                <li><a href="https://greyspots.tech/AboutData.php">Open Data</a></li>
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
                <div class="modal-header" data-dismiss="modal" style="color:#09080d">
                    Menu <i class="far fa-times-circle icon-close" style="color:#09080d"></i>
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
    <!--======Scroll To Top Area Start======-->
    <div id="scroll-to-top" class="scroll-to-top">
        <a href="#header" class="smooth-anchor"> <i class="fas fa-arrow-up"></i> </a>
    </div>
    <!--======Scroll To Top Area End======-->
</div>
<!-- ***** All jQuery Plugins ***** -->
<!-- jQuery(necessary for all JavaScript plugins) -->
<script src="static/js/jquery.min.js"></script>
<!-- Bootstrap js -->
<script src="static/js/popper.min.js"></script>
<script src="static/js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="static/js/all.min.js"></script>
<script src="static/js/slider.min.js"></script>
<script src="static/js/countdown.min.js"></script>
<script src="static/js/shuffle.min.js"></script>
<!-- Active js -->
<script src="static/js/main.js"></script>
</body>
</html>