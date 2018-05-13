<?php
    $servername = "localhost";
    $username = "";
    $password = "";
    $database = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>