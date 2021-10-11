<?php 
        include "dbCon.php";
        $res = $_POST['id'];
        $res = trim($res);
        $records = mysqli_query($conn, "Select Round(AVG( hourly_counts)) as res1, day from greyspots.Pedisterian_count where sensor_name = '{$res}' group by day"); 
        
        while($data = mysqli_fetch_array($records)) {
?>
        <tr>
            <td>  <?php echo $data['res1']; ?> </td>   
            <td>  <?php echo $data['day']; ?> </td>      
        </tr>
<?php
        }

    ?>