<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "htdb";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected region from the URL parameter
$selectedRegion = $_GET['region'];

// Fetch towns based on the selected region
$sql = "SELECT town_name FROM towns WHERE region_id = (
    SELECT id FROM regions WHERE region_name = '$selectedRegion'
)";
$result = $conn->query($sql);

// Initialize an array to store town names
$townNames = [];

// Loop through the results and add town names to the array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $townName = $row["town_name"];
        $townNames[] = $townName;
    }
}

// Close the database connection
$conn->close();

// Output the town names as JSON
header('Content-Type: application/json');
echo json_encode($townNames);
?>
