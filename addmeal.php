<?php
    $servername = "localhost";
    $username = "id5743664_macmeals";
    $password = "seitb";
    $database = "id5743664_meals";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

        $meal = $_POST["meal"];
        $location = $_POST["location"];
        $rating = $_POST["rating"];
        $review = $_POST["review"];

        if (!isset($meal, $lcoation, $rating, $review) || empty($meal) || empty($location))
            exit("Fields not proper.");

        $query = $conn->prepare("INSERT INTO meals (meal, location, rating, review) VALUES (?, ?, ?, ?)");
        $query->bind_param("ssis", $meal, $location, $rating, $review);
        $query->execute();

        $query = null;
        $conn = null;

        echo "Success";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>