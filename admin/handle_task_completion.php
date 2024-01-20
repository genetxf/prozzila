<?php

include 'database.php';
// Check if the required parameters are set
if (isset($_POST['user_id'], $_POST['card_id'], $_POST['task_id'])) {
    $employeeId = $_POST['user_id'];
    echo $employeeId. "<br>" ;
    $cardId = $_POST['card_id'];
    $taskId = $_POST['task_id'];

    $newStatus = "Complete";
    // Check if the status is 'Complete' in the completed_tasks table
    $checkif = "SELECT * FROM `assignment` WHERE `employee_id` = $employeeId";
    $checkifmatch = $conn->query($checkif);

    if ($checkifmatch->num_rows > 0) {
        $sql = "INSERT INTO `completed_tasks`(`user_id`, `card_id`, `task_id`, `completed_task`) VALUES ($employeeId, $cardId, $taskId, NOW())";
        $success ="Assignment status updated successfully.". "<br>";
        include 'success.php';
    }
    // Insert completed task into the "completed_tasks" table
    else
    {
        $error ="You are not assigned to this task.". "<br>";
        include 'alert.php';
    }

    // Assuming $conn is your database connection
    if ($conn->query($sql) === TRUE) {

        // Select count by task_id from assignment table
        $countQuery = "SELECT task_id, COUNT(*) AS total_count FROM assignment GROUP BY task_id";

        $result = $conn->query($countQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $task_id = $row['task_id'];
                $total_count = $row['total_count'];

                // Update the tasks table with the total count
                $updateQuery = "UPDATE tasks SET total_assigned = $total_count WHERE id = $task_id";

                if ($conn->query($updateQuery) === TRUE) {
                    // Update successful
                    $success = "Task $task_id updated with total_assigned = $total_count<br>";
                } else {
                    // Handle update error
                    $error = "Error updating task $task_id: " . $conn->error . "<br>";
                }
            }
        } else {
            // No records found in the assignment table
            echo "No records found in the assignment table.<br>";
        }


        echo "Task completed and inserted into completed_tasks table successfully";
        $updateAssignmentSql = "UPDATE `assignment` SET `status` = '$newStatus' WHERE `employee_id` = $employeeId AND `task_id` = $taskId";

        if ($conn->query($updateAssignmentSql) === TRUE) {
            echo "Assignment status updated successfully.";
            // Check if the status is 'Complete' in the completed_tasks table
            $checkCompleteStatusSql = "SELECT * FROM `assignment` WHERE `task_id` = $taskId AND `status` = 'Complete'";
            $resultCompleteStatus = $conn->query($checkCompleteStatusSql);

            if ($resultCompleteStatus->num_rows > 0) {
                // Copy data to old_complete table
                $copyToOldCompleteSql = "INSERT INTO `old_complete`(`user_id`, `card_id`, `task_id`, `completed_task`) 
                                 SELECT `user_id`, `card_id`, `task_id`, `completed_task` 
                                 FROM `completed_tasks` 
                                 WHERE `task_id` = $taskId AND `user_id` = '$employeeId'";

                if ($conn->query($copyToOldCompleteSql) === TRUE) {
                    echo "Data copied to old_complete table successfully." . "<br>";

                    // Delete data from completed_tasks table
                    $deleteFromCompletedTasksSql = "DELETE FROM `completed_tasks` WHERE `task_id` = $taskId AND `user_id` = '$employeeId'";

                    if ($conn->query($deleteFromCompletedTasksSql) === TRUE) {
                        echo "Data deleted from completed_tasks table successfully." . "<br>";
                    } else {
                        echo "Error deleting data from completed_tasks: " . $deleteFromCompletedTasksSql . "<br>" . $conn->error;
                    }

                    // Delete data from assignment table where status is 'Complete' and employee_id and task_id match
                    $deleteFromAssignmentSql = "DELETE FROM `assignment` WHERE `task_id` = $taskId AND `employee_id` = $employeeId AND `status` = 'Complete'";

                    if ($conn->query($deleteFromAssignmentSql) === TRUE) {
                        echo "Data deleted from assignment table successfully." . "<br>";
                    } else {
                        echo "Error deleting data from assignment: " . $deleteFromAssignmentSql . "<br>" . $conn->error;
                    }
                    // Delete data from assignment table where status is 'Complete' and employee_id and task_id match
                    $deleteFromAssignmentSql = "DELETE FROM `tasks` WHERE `task_id` = $taskId AND `card_id` = $cardId AND `status` = 'Complete'";

                    if ($conn->query($deleteFromAssignmentSql) === TRUE) {
                        echo "Data deleted from assignment table successfully." . "<br>";
                    } else {
                        echo "Error deleting data from assignment: " . $deleteFromAssignmentSql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error copying data to old_complete: " . $copyToOldCompleteSql . "<br>" . $conn->error;
                }
            } else {
                echo "No data with status 'Complete' found in completed_tasks table for task ID $taskId." . "<br>";
            }
        } else {
            echo "Error updating assignment status: " . $updateAssignmentSql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}


?>
