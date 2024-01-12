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
?>