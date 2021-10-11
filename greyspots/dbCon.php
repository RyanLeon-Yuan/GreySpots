<?php

$servername = "localhost";
$username = "gsdb";
$password = "A@1q2w3e";
$dbname = "greyspots";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 