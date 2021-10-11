<?php 
        include "dbCon.php";
        $res = $_POST['id'];
        $res = trim($res);
        $records = mysqli_query($conn, "Select Round(AVG( hourly_counts)) as res1, time from greyspots.Pedisterian_count where sensor_name = '{$res}' group by time order by Round(AVG( hourly_counts)) desc limit 5"); 
                
        while($data = mysqli_fetch_array($records)) {
                $time = $data['time'];
?>
        <tr>
            <td>  <?php echo $data['res1']; ?> </td>   
            <td>  <?php echo date ("h A", strtotime("$time:00:00")); ?> </td> 
        </tr>
<?php
        }

    ?>