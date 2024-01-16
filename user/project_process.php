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

// Process form submission
if  (isset($_POST['submit']))  {
// Retrieve and sanitize form data
    $projectID = mysqli_real_escape_string($conn, $_POST['project_id']);
    $projectTitle = mysqli_real_escape_string($conn, $_POST['project_title']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $priority = mysqli_real_escape_string($conn, $_POST['priority']);
    $client = mysqli_real_escape_string($conn, $_POST['client']);
    $assignTeam = mysqli_real_escape_string($conn, $_POST['assign_team']);
    $startDate = mysqli_real_escape_string($conn, $_POST['start_date']);
    $endDate = mysqli_real_escape_string($conn, $_POST['end_date']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $attachment = htmlspecialchars(basename($_FILES["attachment_file"]["name"]));
    $workStatus = mysqli_real_escape_string($conn, $_POST['work_status']);


// Retrieve and sanitize other form fields as needed...

    $sql = "INSERT INTO `projects`(`project_id`, `project_title`, `department`, `assign_team`, `priority`, `client`, `start_date`, `end_date`, `description`, `attachment`, `work_status`)
                           VALUES ('$projectID', '$projectTitle', '$department', '$assignTeam', '$priority', '$client', '$startDate', '$endDate', '$description', '$attachment', '$workStatus')";
//Upload Images
    $targetDirectory = "images/profile/"; // Change this to your desired upload directory
    $targetFile = $targetDirectory . basename($_FILES["attachment_file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image or fake image
    $check = getimagesize($_FILES["attachment_file"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $error = "File is not an image.";
        include 'alert.php';
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {

        $error = "Sorry, file already exists.";
        include 'alert.php';
        $uploadOk = 0;
    }

    // Check file size (adjust the size limit if needed)
    if ($_FILES["attachment_file"]["size"] > 500000) {
        $error = "Sorry, your file is too large. Upload Under 5MB please.";
        include 'alert.php';
        $uploadOk = 0;
    }

    // Allow only certain file formats (you can adjust/add formats as needed)
    $allowedFormats = array("jpg", "png", "jpeg", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {

        $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        include 'alert.php';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {

        $error = "Sorry, your file was not uploaded.";
        include 'alert.php';
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["attachment_file"]["tmp_name"], $targetFile)) {

            $error =  "The file " . htmlspecialchars(basename($_FILES["attachment_file"]["name"])) . " has been uploaded.";
            include 'alert.php';
        } else {

            $error = "Sorry, there was an error uploading your file.";
            include 'alert.php';
        }
    }
//Success Check
if ($conn->query($sql) === TRUE) {

    $success ="'$projectTitle' New project created successfully". "<br>";
    include 'success.php';
// Additional actions after successful insertion, like redirecting or displaying a success message
} else {
    include 'alert.php';
}
}

// Close the database connection
$conn->close();
?>