<?php
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve other form data

    $status = $_POST['status'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Assuming you have a table named 'cards' with columns 'title', 'due_date', 'tasks', and 'file_path'
    $sql = "UPDATE `cards` SET `status`=$status WHERE 1";

    if ($conn->query($sql) === TRUE) {
        echo "Card added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
