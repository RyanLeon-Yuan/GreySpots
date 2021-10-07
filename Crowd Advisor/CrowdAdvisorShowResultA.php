<?php 
        include "dbCon.php";
        $res = $_POST['id'];
        $res = trim($res);
        $records = mysqli_query($conn, "Select Round(AVG( hourly_counts)) as result from greyspots.Pedisterian_count where sensor_name ='{$res}'"); 
        while($data = mysqli_fetch_array($records)) {
?>
        <tr>
            <td>  <?php echo $data['result']; ?> </td>        
        </tr>
<?php
        }

    ?>