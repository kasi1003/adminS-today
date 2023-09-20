<?php
// Database connection details for fetching region names
$servername = "localhost";
$username = "root";
$password = "";
$database = "htdb";

// Create a connection for fetching region names
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection for fetching region names
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch region names from the database
$sql = "SELECT region_name FROM regions";
$result = $conn->query($sql);

// Initialize an array to store region names
$regionNames = [];

// Loop through the results and add region names to the array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $regionName = $row["region_name"];
        $regionNames[] = $regionName;
    }
}

// Close the database connection for fetching region names
$conn->close();

// Output the region names as JSON
header('Content-Type: application/json');
echo json_encode($regionNames);
?>
