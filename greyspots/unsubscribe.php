<?php
$user = "gsdb_cli";
$password = "DB@1q2w3e";
$servername = "localhost";
$dbname = "greyspots_clients";
$table = "GS_SUBSCRIBERS_CANCEL";
$email = '"'.$_POST['email'].'"';
$reason = '"'.$_POST['reason'].'"';
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
    // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO greyspots_clients.GS_SUBSCRIBERS_CANCEL VALUES ($email, $reason)";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Subscribe successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>