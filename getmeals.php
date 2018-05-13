<?php
    $servername = "localhost";
    $username = "id5743664_macmeals";
    $password = "seitb";
    $database = "id5743664_meals";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

        $query = $conn->prepare("SELECT * FROM meals");
        $query = $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>