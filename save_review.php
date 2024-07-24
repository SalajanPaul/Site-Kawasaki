<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kawasaki";

// Creare conexiune
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificare conexiune
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // SQL pentru inserarea recenziei în baza de date
    $sql = "INSERT INTO reviews (user_id, rating, comment) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $rating, $comment);

    if ($stmt->execute()) {
        // Redirect către pagina principală după salvarea recenziei
        header("Location: site.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


