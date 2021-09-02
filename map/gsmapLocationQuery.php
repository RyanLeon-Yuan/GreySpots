<?php
Class DbCon {
    private $user = "gsdb";
    private $password = "A@1q2w3e";
    private $database = "greyspots";
}

protected function connect() {

    /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try {
    $pdo = new PDO("mysql:host=localhost;dbname=$this->$database", $this->$user, $this->$password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo
} catch (PDOException $e) {

    die("ERROR: Could not connect. " . $e->getMessage());
}

}


?>