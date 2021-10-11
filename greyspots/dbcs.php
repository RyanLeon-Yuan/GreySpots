<?php
$user = "gsdb";
$password = "A@1q2w3e";
$database = "greyspots";
$db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);

$acD = "Select ifnull( (sum(active)),0) as result  from COVID_POSTCODE_TABLE where postcode IN (3000,3002,3003,3004,3006,3008,3010,3031,3032,3050,3051,3052,3053,3054,3141,3207)";
$ac = $db->prepare($acD);
$ac -> execute();
$acR = $ac->fetch(PDO::FETCH_OBJ);
$activecases = $acR->result;

$ncD = "Select ifnull( (sum(new)),0) as result from COVID_POSTCODE_TABLE where postcode IN (3000,3002,3003,3004,3006,3008,3010,3031,3032,3050,3051,3052,3053,3054,3141,3207)";
$nc = $db->prepare($ncD);
$nc -> execute();
$ncR = $nc->fetch(PDO::FETCH_OBJ);
$newcases = $ncR->result;
//echo $newcases;

$tcD = "Select ifnull( (sum(cases)),0) as result  from COVID_POSTCODE_TABLE where postcode IN (3000,3002,3003,3004,3006,3008,3010,3031,3032,3050,3051,3052,3053,3054,3141,3207)";
$tc = $db->prepare($tcD);
$tc -> execute();
$tcR = $tc->fetch(PDO::FETCH_OBJ);
$totalcases= $tcR->result;
//echo $totalcases;

$neD = "Select ifnull( (count(*)),0) as result  from EXPOSURE_SITE_TABLE where Site_postcode IN (3000,3002,3003,3004,3006,3008,3010,3031,3032,3050,3051,3052,3053,3054,3141,3207)";
$ne = $db->prepare($neD);
$ne -> execute();
$neR = $ne->fetch(PDO::FETCH_OBJ);
$numexpo= $neR->result;
//echo $numexpo;

$nacD = "Select ifnull( (sum(active)),0) as result  from COVID_POSTCODE_TABLE where postcode Not IN (3000,3002,3003,3004,3006,3008,3010,3031,3032,3050,3051,3052,3053,3054,3141,3207)";
$nac = $db->prepare($nacD);
$nac -> execute();
$nacR = $nac->fetch(PDO::FETCH_OBJ);
$nactivecases = $nacR->result;

$nncD = "Select ifnull( (sum(new)),0) as result from COVID_POSTCODE_TABLE where postcode Not IN (3000,3002,3003,3004,3006,3008,3010,3031,3032,3050,3051,3052,3053,3054,3141,3207)";
$nnc = $db->prepare($nncD);
$nnc -> execute();
$nncR = $nnc->fetch(PDO::FETCH_OBJ);
$nnewcases = $nncR->result;
//echo $newcases;

$ntcD = "Select ifnull( (sum(cases)),0) as result  from COVID_POSTCODE_TABLE where postcode Not IN (3000,3002,3003,3004,3006,3008,3010,3031,3032,3050,3051,3052,3053,3054,3141,3207)";
$ntc = $db->prepare($ntcD);
$ntc -> execute();
$ntcR = $ntc->fetch(PDO::FETCH_OBJ);
$ntotalcases= $ntcR->result;
//echo $totalcases;

$nneD = "Select ifnull( (count(*)),0) as result  from EXPOSURE_SITE_TABLE where Site_postcode Not IN (3000,3002,3003,3004,3006,3008,3010,3031,3032,3050,3051,3052,3053,3054,3141,3207)";
$nne = $db->prepare($nneD);
$nne -> execute();
$nneR = $nne->fetch(PDO::FETCH_OBJ);
$nnumexpo= $nneR->result;
//echo $numexpo;


$ddD = "Select distinct(DATE_FORMAT(data_date, '%d/%m/%Y')) as result  from COVID_POSTCODE_TABLE limit 1 ";
$dd = $db->prepare($ddD);
$dd -> execute();
$ddR = $dd->fetch(PDO::FETCH_OBJ);
$datadate = $ddR->result;
//echo $datadate;