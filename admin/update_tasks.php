<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve other form data
    $cardId = $_POST['card_id']; // Assuming you are passing the card ID as a hidden field

    // Retrieve tasks and completed tasks from the form
    $tasksString = isset($_POST['tasks']) ? $_POST['tasks'] : '';
    $completedTasks = isset($_POST['completed_tasks']) ? $_POST['completed_tasks'] : [];

    // Split the existing tasks into an array
    $tasks = explode(", ", $tasksString);

    // Update data in 'cards' table
    $sql = "UPDATE cards SET tasks = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("si", $updatedTasksString, $cardId);

        // Remove completed tasks from the list
        $updatedTasks = array_diff($tasks, $completedTasks);

        // Serialize tasks before updating
        $updatedTasksString = implode(", ", $updatedTasks);

        // Execute the update query
        if ($stmt->execute()) {
            // Insert checked tasks into 'completed_tasks' table
            if (!empty($completedTasks)) {
                $insertCompletedTaskSql = "INSERT INTO completed_tasks (user_id, card_id, completed_task) VALUES (?, ?, ?)";
                $stmtCompleted = $conn->prepare($insertCompletedTaskSql);

                if ($stmtCompleted) {
                    foreach ($completedTasks as $completedTask) {
                        // Assuming you have user ID available, replace 'your_user_id' with the actual user ID
                        $userId = $logid;

                        // Bind parameters
                        $stmtCompleted->bind_param("iis", $userId, $cardId, $completedTask);

                        // Execute the insert query
                        $stmtCompleted->execute();
                    }

                    $stmtCompleted->close();
                } else {
                    echo "Error preparing completed tasks statement: " . $conn->error;
                }
            }

            echo "Tasks updated successfully";
        } else {
            echo "Error updating tasks: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
?>
