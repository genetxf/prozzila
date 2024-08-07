<?php
include 'auth.php';
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        prozzila - Project Management System
    </title>
    <link rel="shortcut icon" href="./images/favicon.svg" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/icons.min.css">

    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>
<?php
$pagetitle = "Board";
include 'header.php';

?>
<!-- MAIN CONTENT -->
<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $employeeName = $_POST['username'];
    $sql23 = "SELECT id FROM employees where username = '$employeeName'";
    $result23 = $conn->query($sql23);

    // Check if a row is found
    if ($result23->num_rows > 0) {
        // Fetch the first row and get the 'id' value
        $row = $result23->fetch_assoc();
        $employee_id = $row['id'];

        // Fetch taskname
        $taskName = $_POST['taskname'];
        $sql24 = "SELECT id FROM tasks where task_name = '$taskName'";
        $result24 = $conn->query($sql24);

        // Check if a row is found
        if ($result24->num_rows > 0) {
            // Fetch the first row and get the 'id' value
            $row = $result24->fetch_assoc();
            $task_id = $row['id'];

            // You should perform proper validation and sanitation of user input to prevent SQL injection

            // Directly insert data into the assignment table
            $insertQuery = "INSERT INTO assignment (task_id, employee_id) VALUES ('$task_id', '$employee_id')";

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

            if ($conn->query($insertQuery) === TRUE) {
                $success = "'$taskName' Assigned to '$employeeName' Successfully!";
                include 'success.php';
            } else {
                $error = $conn->error;
                include 'alert.php';
            }
        } else {
            // Handle the case where no task is found
            $error = "Task not found";
            include 'alert.php';
        }
    } else {
        // Handle the case where no employee is found
        $error = "Employee not found";
        include 'alert.php';
    }
}


?>
<!-- END MAIN CONTENT -->

<div class="overlay"></div>

<!-- SCRIPT -->
<!-- APEX CHART -->

<script src="./libs/jquery/jquery.min.js"></script>
<script src="./libs/jquery/jquery-ui.min.js"></script>
<script src="./libs/moment/min/moment.min.js"></script>
<script src="./libs/apexcharts/apexcharts.js"></script>
<script src="./libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./libs/peity/jquery.peity.min.js"></script>
<script src="./libs/chart.js/Chart.bundle.min.js"></script>
<script src="./libs/owl.carousel/owl.carousel.min.js"></script>
<script src="./libs/bootstrap/js/bootstrap.min.js"></script>
<script src="./libs/simplebar/simplebar.min.js"></script>

<!-- APP JS -->
<script src="./js/main.js"></script>
<script src="./js/shortcode.js"></script>
<script src="./js/script.js"></script>
</body>

</html>

