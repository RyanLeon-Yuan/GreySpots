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
        border-radius: 25px;
        border: 2px solid dimgray;
    }
    #tspot:hover { 
        /* transform: scale(1.05); */
        border: 2px solid #a474cf;
        box-shadow: 0 0 10px dimgray;


    }
    /* .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
        background-color: #color;
    } */
    </style>

    <link rel="stylesheet" href="static/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="static/css/help.css">

    
    <script type="text/javascript" src="static/js/CrowdAdvisor.js"> </script>
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
    <!-- ***** Title Area Start ***** -->
    <section class="breadcrumb-area overlay-dark d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="m-0">Crowd Advisor</h2>
                        <p>Crowd Advisor provides you with detailed information about specific places in the Melbourne City area. 
                            All you need to do is select a prefered location from the drop-down list below. 
                            You can check all the relevant information and safely plan your visits.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Title Area End ***** -->
    <!-- ***** Contact Area Start ***** -->
    <section class="author-area" style="padding-top:2px;padding-bottom:2px;>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-7">
                    <div class="intro text-center">

                        <h3 class="mt-3 mb-0">Start by selecting a location in Melbourne:</h3>

                    </div>
            
                        <select id= "location" onchange="selectLocation()">
                        <option disabled selected>-- Select Location --</option>
                        <?php 
                            include "dbCon.php";
                            $records = mysqli_query($conn, "Select distinct(sensor_name) from greyspots.Pedisterian_count order by sensor_name"); 
                        ?>
                            
                        <?php while($data = mysqli_fetch_array($records)) { 
                        ?>
                                <option value=" <?php echo $data['sensor_name']; ?> "> <?php echo $data['sensor_name']; ?> </option>";
                        <?php
                            }
                            ?>	
                        
                    </select>

                    <div id = "tables" style = "visibility : hidden">
                    

                    

                    

                    <table id = "tspot">

                        
                        <Thead>
                            <div class="help-tip">
                            <p>Expected Pedestrian Count of the Street in a Day: 
                            This table shows the average expected pedestrian population in their selected street in a day.</p>
                            </div>
                            <th colspan="2" style="text-align:center;"  >
                            <strong><h4>Expected Daily Pedestrain Count</h4></strong>
                        </th>
                        </Thead>
                        <thead>
                        <th>Pedestrian Count</th>
                        </thead>

                        <tbody id = "resultA">

                        </tbody>
                    </table>

                    <table id = "tspot" name= "Extracting the Average population ( Pedestrian Count) in the selected place on a given day of the week">
                        <thead>
                        <div class="help-tip">
                            <p>Expected Pedestrian Count of the Street: This table shows the average expected pedestrian population in their selected street for each day of the week.
</p>
                            </div>
                            <tr>
                            <th colspan="2" style="text-align:center;" >
                            <strong><h4>Expected Weekly Pedestrain Count</h4></strong>
                        </th>
                        </tr>
                        <th>Pedestrian Count</th>
                        <th>Day of the Week </th>
                        </thead>

                        <tbody id = "resultB">

                        </tbody>
                    </table>

                    <table id = "tspot" name= "Extracting the top five  Rush hours in a day">
                        <thead>
                        <div class="help-tip">
                            <p>Expected Pedestrian Count: 
                                This table shows the average expected pedestrian population ordered by most rush hours (top 5) for their selected street for a day. </p>
                            </div>

                            </div>
                            <tr>
                            <th colspan="2" style="text-align:center;" >
                            <strong><h4>Top Rush Hours</h4></strong>
                        </th>
                        </tr>

                        <th>Pedestrian Count</th>
                        <th>Time of the Day</th>
                        </thead>

                        <tbody id = "resultC">

                        </tbody>
                    </table>

                    <table id = "tspot" name= "Extracting the top three best times of day to visit the selected place, excluding night hours">
                        <thead>
                        <div class="help-tip">
                            <p>Expected Pedestrian Count: 
                                This table shows the expected average pedestrian population ordered by least rush hours (top 3) 
                                for their selected street (From morning 8 AM till night 10 PM)</p>
                            </div>

                            </div>
                            <tr>
                                <th colspan="2" style="text-align:center;" >
                            <strong><h4>Top Safe Hours</h4></strong>
                        </th>
                        </tr>
                        <th>Pedestrian Count</th>
                        <th>Time of the Day</th>
                        </thead>

                        <tbody id = "resultD">

                        </tbody>
                    </table>


                    </div>

                    <?php mysqli_close($conn);?>

                   
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