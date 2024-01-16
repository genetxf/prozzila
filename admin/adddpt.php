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
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $managerName = $_POST['username'];
    $deptCode = $_POST['deptCode'];
    $deptName = $_POST['deptName'];
    $description = $_POST['description'];
    $location = $_POST['location'];

    // Retrieve manager_id based on username from employees table
    $sql23 = "SELECT id FROM employees WHERE username = '$managerName'";
    $result23 = $conn->query($sql23);

    // Check if a row is found
    if ($result23->num_rows > 0) {
        // Fetch the first row and get the 'id' value
        $row = $result23->fetch_assoc();
        $manager_id = $row['id'];

        // Perform the database insertion (modify the query based on your database structure)
        $sql = "INSERT INTO departments (manager_id, department_code, department_name, location, description, created_at) 
                VALUES ('$manager_id', '$deptCode', '$deptName','$location', '$description', NOW())";

        if ($conn->query($sql) === TRUE) {
            $success ="'$deptName' Added Successfully!". "<br>";
            include 'success.php';
        } else {
            include 'alert.php';
        }
    } else {
        $error = "Error: Manager not found for username '$managerName'";
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

