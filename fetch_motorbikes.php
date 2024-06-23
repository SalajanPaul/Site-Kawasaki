<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kawasaki";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM motorbikes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="div-kw-'.strtolower(str_replace(' ', '-', $row["model"])).'">';
        echo '<img class="moto" src="photos/'.strtolower(str_replace(' ', '', $row["model"])).'.jpg">';
        echo '<div>';
        echo '<p class="horizontal">' . $row["model"] . '</p>';
        echo '</div>';
        echo '<p><strong>Engine:</strong> ' . $row["engine"] . '</p>';
        echo '<p><strong>Year:</strong> ' . $row["year"] . '</p>';
        echo '<p><strong>Capacity:</strong> ' . $row["capacity"] . '</p>';
        echo '<p><strong>Horse Power:</strong> ' . $row["horse_power"] . '</p>';
        echo '<p><strong>Cooling System:</strong> ' . $row["cooling_system"] . '</p>';
        echo '<p><strong>Front Tyre:</strong> ' . $row["front_tyre"] . '</p>';
        echo '<p><strong>Rear Tyre:</strong> ' . $row["rear_tyre"] . '</p>';
        echo '<p><strong>Fuel Capacity:</strong> ' . $row["fuel_capacity"] . '</p>';
        echo '<a href="' . $row["more_specs_link"] . '"><button class="show-more-specs" id="kw-'.strtolower(str_replace(' ', '-', $row["model"])).'">Show more specs</button></a>';
        echo '</div>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>
