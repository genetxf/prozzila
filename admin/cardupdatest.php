<?php
include 'auth.php';
include 'database.php';
// Query to fetch project details
    $clienttid = $_GET['data'];
    $sql = "UPDATE `cards` SET `status`='progress' WHERE id = '$clienttid'";

    if ($conn->query($sql) === TRUE) {
        // Update successful
        $success = "Card ID:$clienttid, Updated<br>";
        include 'success.php';
    } else {
        // Handle update error
        $error = "Error updating task $clienttid: " . $conn->error . "<br>";
        include 'alert.php';
    }
    $clienttid = $_GET['data2'];
    $sql = "UPDATE `cards` SET `status`='review' WHERE id = '$clienttid'";

    if ($conn->query($sql) === TRUE) {
        // Update successful
        $success = "Card ID:$clienttid, Updated<br>";
        include 'success.php';
    } else {
        // Handle update error
        $error = "Error updating task $clienttid: " . $conn->error . "<br>";
        include 'alert.php';
    }
    $clienttid = $_GET['data3'];

    $sql = "UPDATE `cards` SET `status`='approved' WHERE id = '$clienttid'";

    if ($conn->query($sql) === TRUE) {
        // Update successful
        $success = "Card ID:$clienttid, Updated<br>";
        include 'success.php';
    } else {
        // Handle update error
        $error = "Error updating task $clienttid: " . $conn->error . "<br>";
        include 'alert.php';
    }
    $clienttid = $_GET['data4'];

    $sql = "DELETE FROM cards WHERE `id` = '$clienttid'";

    if ($conn->query($sql) === TRUE) {
        // Update successful
        $success = "Card ID:$clienttid, Updated<br>";
        include 'success.php';
    } else {
        // Handle update error
        $error = "Error updating task $clienttid: " . $conn->error . "<br>";
        include 'alert.php';
    }
?>
