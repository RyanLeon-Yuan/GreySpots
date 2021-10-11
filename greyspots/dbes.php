<?php

$servername = "localhost";
$username = "gsdb";
$password = "A@1q2w3e";
$dbname = "greyspots";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM EXPOSURE_SITE_TABLE order by exposure_date desc';

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    $v[] = $row;
}

echo json_encode($v);

$conn->close();

?>





