<?php

$servername = "localhost";
$username = "root"; // database username
$password = "root"; // database password
$dbname = "prozzila"; // database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the cardId from the AJAX request
$cardId = $_GET['cardId'];

// Update the database based on the cardId
$sql = "UPDATE your_table SET value = 'new_value' WHERE id = '$cardId'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

