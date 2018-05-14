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

        if (!isset($meal, $location, $rating, $review) || empty($meal) || empty($location))
            exit("Fields not proper.");

        $query = $conn->prepare("INSERT INTO meals (meal, location, rating, review) VALUES (:meal, :location, :rating, :review)");
        $query->bindParam(":meal", $meal, PDO::PARAM_STR, 255);
        $query->bindParam(":location", $location, PDO::PARAM_STR, 255);
        $query->bindParam(":rating", $rating, PDO::PARAM_INT);
        $query->bindParam(":review", $review, PDO::PARAM_STR, 65535);
        $query->execute();

        $query = null;
        $conn = null;

        echo "Success";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>