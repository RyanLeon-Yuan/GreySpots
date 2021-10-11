<?php

   $servername = "localhost";
   $username = "gsdb";
   $password = "A@1q2w3e";
   $dbname = "greyspots";

   $conn = new mysqli($servername, $username, $password, $dbname);

   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   } 

   // $sql = 'SELECT * from greyspots.Pedisterian_count where sensor_name = "Melbourne Central"';
   $sql = 'Select hourly_counts, day from greyspots.Ped_Count where sensor_name = "Melbourne Central"';

   $data = array();

   $result = $conn->query($sql);

   while($row = $result->fetch_assoc()){ 
      $data[] = $row;    
   }

 echo json_encode($data, JSON_NUMERIC_CHECK);

  $conn->close();

?>





