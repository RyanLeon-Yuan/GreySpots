<?php
$user = "gsdb";
$password = "A@1q2w3e";
$database = "greyspots";

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try {
    $pdo = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
$sql = 'SELECT shortname, lat, lng from COVID_VACCINATION_CENTER_DATA ORDER BY shortname';
foreach ($pdo->query($sql) as $row) {
    print $row['shortname'] . "\t";
    print $row['lat'] . "\t";
    print $row['lng'] . "\n";
}
?>