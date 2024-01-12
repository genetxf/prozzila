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
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $assignTeam = mysqli_real_escape_string($conn, $_POST['assign_team']);
    $startDate = mysqli_real_escape_string($conn, $_POST['start_date']);
    $endDate = mysqli_real_escape_string($conn, $_POST['end_date']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $attachment = htmlspecialchars(basename($_FILES["attachment_file"]["name"]));
    $workStatus = mysqli_real_escape_string($conn, $_POST['work_status']);


// Retrieve and sanitize other form fields as needed...

    $sql = "INSERT INTO `projects`(`project_id`, `project_title`, `department`, `assign_team`, `priority`, `client`, `price`, `start_date`, `end_date`, `description`, `attachment`, `work_status`)
                           VALUES ('$projectID', '$projectTitle', '$department', '$assignTeam', '$priority', '$client', '$price', '$startDate', '$endDate', '$description', '$attachment', '$workStatus')";
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
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (adjust the size limit if needed)
    if ($_FILES["attachment_file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats (you can adjust/add formats as needed)
    $allowedFormats = array("jpg", "png", "jpeg", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["attachment_file"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["attachment_file"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
//Success Check
if ($conn->query($sql) === TRUE) {
echo "New project created successfully";
// Additional actions after successful insertion, like redirecting or displaying a success message
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}

// Close the database connection
$conn->close();
?>