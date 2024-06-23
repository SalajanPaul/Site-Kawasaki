<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kawasaki";

$id = $_POST['id'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM motorbikes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

$response = [];
if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['message'] = "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>