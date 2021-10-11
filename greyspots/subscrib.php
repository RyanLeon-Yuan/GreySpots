<?php
$user = "gsdb_cli";
$password = "DB@1q2w3e";
$servername = "localhost";
$dbname = "greyspots_clients";
$table = "GS_SUBSCRIBERS";
$name = '"'.$_POST['name'].'"';
$email = '"'.$_POST['email'].'"';
$postcode = '"'.$_POST['postcode'].'"';
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
    // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO $table (name,postcode,email_id)
VALUES ($name,$postcode,$email)";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Subscribe successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>