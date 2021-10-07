<!DOCTYPE html>
<html>
<head>
  
  <title>Crowd Advisor</title>
  <script type="text/javascript" src="CrowdAdvisor.js"> </script>
  <script type="text/javascript" src="static/js/jquery.min.js"> </script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  

</head>
<body>

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

  <table name = "Extracting the Average population ( Pedestrian Count) in the selected place">
    <thead>
      <th>Average Pedestrian Count in a day </th>
    </thead>

    <tbody id = "resultA">

    </tbody>
  </table>

  <table  name= "Extracting the Average population ( Pedestrian Count) in the selected place on a given day of the week">
    <thead>
      <th>Average Pedestrian Count of day in a week </th>
      <th>Day of the Week </th>
    </thead>

    <tbody id = "resultB">

    </tbody>
  </table>

  <table name= "Extracting the top five  Rush hours in a day">
    <thead>
      <th>Average Pedestrian Count </th>
      <th>Time of the Day having maximum Rush </th>
    </thead>

    <tbody id = "resultC">

    </tbody>
  </table>

  <table name= "Extracting the top three best times of day to visit the selected place, excluding night hours">
    <thead>
      <th>Crowd Count </th>
      <th>Time of Day</th>
    </thead>

    <tbody id = "resultD">

    </tbody>
  </table>

<?php mysqli_close($conn);?>

</body>
</html>