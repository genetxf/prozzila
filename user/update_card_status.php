<?php
include 'database.php';
// Include your database connection code here

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the AJAX request
    $cardId = $_POST['cardId'];
    $newStatus = $_POST['newStatus'];

    // Update the card status in the database
    $updateSql = "UPDATE cards SET status = '$newStatus' WHERE id = $cardId";
    if ($conn->query($updateSql) === TRUE) {
        echo 'Card status updated successfully';
    } else {
        echo 'Error updating card status: ' . $conn->error;
    }
}
?>
