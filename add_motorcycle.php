<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kawasaki";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model = $_POST['model'];
    $engine = $_POST['engine'];
    $year = $_POST['year'];
    $capacity = $_POST['capacity'];
    $horse_power = $_POST['horse_power'];
    $cooling_system = $_POST['cooling_system'];
    $front_tyre = $_POST['front_tyre'];
    $rear_tyre = $_POST['rear_tyre'];
    $fuel_capacity = $_POST['fuel_capacity'];
    $more_specs_link = $_POST['more_specs_link'];
    $image_url = $_POST['image_url'];
    $category = $_POST['category'];

  
    $sql = "INSERT INTO motorbikes (model, engine, year, capacity, horse_power, cooling_system, front_tyre, rear_tyre, fuel_capacity, more_specs_link, image_url, category)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssss", $model, $engine, $year, $capacity, $horse_power, $cooling_system, $front_tyre, $rear_tyre, $fuel_capacity, $more_specs_link, $image_url, $category);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
