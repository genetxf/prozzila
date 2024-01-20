<?php

    include 'database.php';

// Process form submission
    if (isset($_POST['submit'])) {
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


        $checkExistingSql = "SELECT * FROM projects WHERE project_id = '$projectID' AND project_title = '$projectTitle'";
        $existingResult = mysqli_query($conn, $checkExistingSql);

        if (!$existingResult) {
            // Handle the query error, e.g., die(mysqli_error($conn));
            die("Error checking existing project: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($existingResult) > 0) {
            // Project already exists, handle accordingly (e.g., show an error message)
            $error = "Error: Project with project_id '$projectID' and project_title '$projectTitle' already exists.";
            include 'alert.php';
        } else {
            // File Upload Section
            $targetDirectory = "images/profile/"; // Change this to your desired upload directory
            $targetFile = $targetDirectory . basename($_FILES["attachment_file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Your existing file validation code here...

            if ($uploadOk == 0) {
                // File validation failed, show an error message
                $error = "Sorry, your file was not uploaded.";
                include 'alert.php';
            } else {
                // If everything is ok, try to upload file
                if (move_uploaded_file($_FILES["attachment_file"]["tmp_name"], $targetFile)) {
                    // Database Insertion Section
                    $sql = "INSERT INTO projects (project_id, project_title, department, priority, client, start_date, end_date, description, attachment, work_status)
                    VALUES ('$projectID', '$projectTitle', '$department', '$priority', '$client', '$startDate', '$endDate', '$description', '$attachment', '$workStatus')";

                    if (mysqli_query($conn, $sql)) {
                        // Insert successful, show success message or perform additional actions
                        $success = "'$projectTitle' New project created successfully" . "<br>";
                        include 'success.php';
                    } else {
                        // Insert failed, handle accordingly (e.g., show an error message)
                        $error = "Error inserting into projects table: " . mysqli_error($conn);
                        include 'alert.php';
                    }
                } else {
                    // File upload failed, show an error message
                    $error = "Sorry, there was an error uploading your file.";
                    include 'alert.php';
                }
            }
        }
    }

// Close the database connection
    $conn->close();
?>