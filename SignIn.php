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
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $password_repeat = $_POST['psw-repeat'];
    $role = isset($_POST['admin']) ? 'admin' : 'user';


    if ($password !== $password_repeat) {
        die("Passwords do not match.");
    }


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
