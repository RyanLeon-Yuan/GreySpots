<?php 
        include "dbCon.php";
        $res = $_POST['id'];
        $res = trim($res);
        $records = mysqli_query($conn, "Select distinct hourly_counts as res1, time from greyspots.Pedisterian_count where sensor_name = '{$res}' and time >= 8 and time <= 22 order by hourly_counts asc limit 3"); 
        
        while($data = mysqli_fetch_array($records)) {
?>
        <tr>
            <td>  <?php echo $data['res1']; ?> </td>   
            <td>  <?php echo $data['time']; ?> </td>      
        </tr>
<?php
        }

    ?>