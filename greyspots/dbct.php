<?php

$servername = "localhost";
$username = "gsdb";
$password = "A@1q2w3e";
$dbname = "greyspots";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM COVID_TESTING_CENTERS order by Site_Name';

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    $v[] = $row;
}

echo json_encode($v);

$conn->close();

?>





