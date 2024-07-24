<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kawasaki";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Pagination variables
$perPage = 6; // Number of items per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page, default to 1
$offset = ($page - 1) * $perPage; // Offset for SQL query

// Category filter
$category = isset($_GET['category']) ? $_GET['category'] : '';

// SQL query with pagination and category filter
$sql = "SELECT * FROM motorbikes";
if ($category) {
    $sql .= " WHERE category = '" . $conn->real_escape_string($category) . "'";
}
$sql .= " LIMIT $offset, $perPage";
$result = $conn->query($sql);


// if ($_SESSION['role'] == 'admin') {
//     echo '<div class="add">';
//     echo '<button type="button" id="add" class="btn btn-primary add">Add motorcycle</button>';
//     echo '</div>';
// }

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        echo '<div class="div-kw-'.strtolower(str_replace(' ', '-', $row["model"])).'">';
        echo '<img class="photos" src="' . $row["image_url"] . '" alt="' . $row["model"] . ' image">';
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

        // Form for deleting motorbike
        if ($_SESSION['role'] == 'admin') {
            echo '<form method="post" action="delete_motorcycle.php" style="display:inline; padding-left: 10px;">';
            echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
            echo '<button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</button>';
            echo '</form>';
        }




        echo '</div>';
    }

    // Pagination links
    $sqlCount = "SELECT COUNT(*) AS total FROM motorbikes";
    if ($category) {
        $sqlCount .= " WHERE category = '" . $conn->real_escape_string($category) . "'";
    }
    $resultCount = $conn->query($sqlCount);
    $rowCount = $resultCount->fetch_assoc();
    $totalPages = ceil($rowCount['total'] / $perPage);

} else {
    echo "0 results";
}



$conn->close();
?>

