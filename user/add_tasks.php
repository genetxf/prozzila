<?php
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve other form data
    $cardTitle = $_POST['cardTitle'];
    $cardDescription = $_POST['cardDescription'];
    $tasks = $_POST['tasks'];

    // Insert data into 'cards' table
    $sql = "INSERT INTO cards (title, description, tasks) VALUES ('$cardTitle', '$cardDescription', '" . implode(",", $tasks) . "')";

    if ($conn->query($sql) === TRUE) {
        // Retrieve the ID of the newly inserted card
        $cardId = $conn->insert_id;

        // Assuming you have user ID available, replace 'your_user_id' with the actual user ID
        $userId = $logid;

        // Insert completed tasks into 'completed_tasks' table
        if (isset($_POST['completed_tasks']) && is_array($_POST['completed_tasks'])) {
            foreach ($_POST['completed_tasks'] as $completedTask) {
                $completedTaskSql = "INSERT INTO completed_tasks (user_id, card_id, completed_task) VALUES ('$userId', '$cardId', '$completedTask')";
                $conn->query($completedTaskSql);
            }
        }

        echo "Card added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}
?>
