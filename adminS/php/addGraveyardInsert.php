<?php
// Database connection details for inserting data
$servername = "localhost";
$username = "root";
$password = "";
$database = "htdb";

// Create a connection for inserting data
$conn = new mysqli($servername, $username, $password, $database);

// Check connection for inserting data
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Extract data from the form
$cemeteryName = $_POST['graveyardName'];
$region = $_POST['graveyardLocation'];
$town = $_POST['townLocation'];
$sectionCount = $_POST['graveyardNumber']; // Updated to match the form field name
$numberOfGraves = $_POST['numberOfGraves'];

// Insert data into the cemeteries table
$sql = "INSERT INTO cemeteries (Region, CemeteryName, Town, NumberOfSections, TotalGraves) VALUES ('$region', '$cemeteryName', '$town', $sectionCount, $numberOfGraves)";
if ($conn->query($sql) === TRUE) {
    // Get the ID of the newly inserted cemetery
    $cemeteryID = $conn->insert_id;

    // Insert data into the sections table for each section
    for ($i = 1; $i <= $sectionCount; $i++) {
        // Assuming you have a method to generate or retrieve the section code.
        $sectionCode = "Section " . $i;

        // Set the totalGraves and availableGraves as $numberOfGraves
        $totalGraves = $numberOfGraves;
        $availableGraves = $numberOfGraves;

        $sql = "INSERT INTO sections (CemeteryID, SectionCode, TotalGraves, AvailableGraves) 
                VALUES ($cemeteryID, '$sectionCode', $totalGraves, $availableGraves)";
        $conn->query($sql);
    }

    // Redirect to a success page or perform other actions as needed
    header("Location: ../html/editGraveyard.html");
    exit();
} else {
    // Handle the case where the cemetery insertion fails
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection for inserting data
$conn->close();
?>
