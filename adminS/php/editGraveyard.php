<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "htdb";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from both tables and calculate Available Graves
$sql = "SELECT c.CemeteryName, c.Region, c.Town, c.NumberOfSections, c.TotalGraves,
               SUM(s.TotalGraves) AS TotalSectionGraves
        FROM cemeteries c
        LEFT JOIN sections s ON c.CemeteryID = s.CemeteryID
        GROUP BY c.CemeteryID, c.CemeteryName, c.Region, c.Town, c.NumberOfSections, c.TotalGraves";

$result = $conn->query($sql);

$cemeteries = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['AvailableGraves'] = $row['TotalGraves'] - $row['TotalSectionGraves'];
        $cemeteries[] = $row;
    }
}

// Close the database connection
$conn->close();

// JSON encode the data for JavaScript consumption
echo json_encode($cemeteries);
?>
