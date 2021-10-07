<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="description" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- The above 4 meta tags *must* come first in the head;
  any other head content must come *after* these tags -->
    <!-- Title  -->
    <title>GreySpots - Your Guide in COVIDâ€™s New Normal</title>
    <link rel="shortcut icon" href="static/picture/favicon.ico"/>
    <!-- ***** All CSS Files ***** -->
    <!-- Style css -->

    <style rel="stylesheet">
    #location {
    appearance: auto;
    border-color: dimgray;
    }

    #tspot {
        border: 1px solid dimgray;
    }
    </style>

    <link rel="stylesheet" href="static/css/style.css"/>
    
    <script type="text/javascript" src="CrowdAdvisor.js"> </script>
    <script type="text/javascript" src="static/js/jquery.min.js"> </script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

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
                    <div class="breadcrumb-content text-center">
                        <h2 class="m-0">Crowd Advisor</h2>
                        <p>With a simple and free subscription, you will receive an alert e-mail once there are
                            potential Covid risks around you. This e-mail will inform you about the complete information
                            you need to know and guide you to get tested as soon as possible.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Title Area End ***** -->
    <!-- ***** Contact Area Start ***** -->
    <section class="author-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-7">
                    <div class="intro text-center">

                        <h3 class="mt-3 mb-0">Search for Location</h3>
                        <p>We will send you Email notification daily</p>
                    </div>
                    <!-- Item Form -->
                    
                    Location:
                    <select id= "location" onchange="selectLocation()">
                        <option disabled selected>-- Select Location --</option>
                        <?php 
                            include "dbCon.php";
                            $records = mysqli_query($conn, "Select distinct(sensor_name) from greyspots.Pedisterian_count"); 
                        ?>
                            
                        <?php while($data = mysqli_fetch_array($records)) { 
                        ?>
                                <option value=" <?php echo $data['sensor_name']; ?> "> <?php echo $data['sensor_name']; ?> </option>";
                        <?php
                            }
                            ?>	
                        
                    </select>

                    <table id = "tspot" name = "Extracting the Average population ( Pedestrian Count) in the selected place">
                        <thead>
                        <th>Expected Pedestrian Count <br> of the Street in a Day</th>
                        </thead>

                        <tbody id = "resultA">

                        </tbody>
                    </table>

                    <table id = "tspot" name= "Extracting the Average population ( Pedestrian Count) in the selected place on a given day of the week">
                        <thead>
                        <th>Expected Pedestrian Count <br> of the Street</th>
                        <th>Day of the Week </th>
                        </thead>

                        <tbody id = "resultB">

                        </tbody>
                    </table>

                    <table id = "tspot" name= "Extracting the top five  Rush hours in a day">
                        <thead>
                        <th>Expected Pedestrian Count </th>
                        <th>Time of the Day <br> (Top 5) </th>
                        </thead>

                        <tbody id = "resultC">

                        </tbody>
                    </table>

                    <table id = "tspot" name= "Extracting the top three best times of day to visit the selected place, excluding night hours">
                        <thead>
                        <th>Actual Pedestrian Count </th>
                        <th>Time of Day</th>
                        </thead>

                        <tbody id = "resultD">

                        </tbody>
                    </table>

                    <?php mysqli_close($conn);?>

                    <p class="form-message"></p>
                    <div class="intro text-center">
                        <span>Please enter your name, email address, and the postcode in the following subscribe table, and click the Subscribe button. You will receive an daily email from us with the latest Covid-19 information associated with your postcode area.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Area End ***** -->
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
        <a href="#header" class="smooth-anchor"> <i class="fas fa-arrow-up"></i> </a>
    </div>
    <!--====== Scroll To Top Area End ======-->
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