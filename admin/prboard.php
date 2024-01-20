<?php
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve other form data
    $cardTitle = $_POST['cardTitle'];
    $description = $_POST['description'];
    $start = $_POST['start'];
    $dueDate = $_POST['dueDate'];
    $status = $_POST['status'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Assuming you have a table named 'cards' with columns 'title', 'due_date', 'tasks', and 'file_path'
    $sql = "INSERT INTO `cards`(`title`, `due_date`,`start`, `description`, `status`) VALUES ('$cardTitle', '$dueDate', '$start', '$description', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Card added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
