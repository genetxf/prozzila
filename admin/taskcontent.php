<?php
    include 'database.php';
    $project_name = $_GET['data'];
    echo $project_name;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $attachment = htmlspecialchars(basename($_FILES["attachment_file"]["name"]));
        $task = mysqli_real_escape_string($conn, $_POST['taskname']);

        if (empty($task) || empty($attachment)) {
            $error = "Error: Task and attachment cannot be empty.";
            include 'alert.php';
        } else {
            $sql = "INSERT INTO content(`task`, `attachment`, `date`) VALUES ('$task', '$attachment', NOW())";


            //Upload Images
            $targetDirectory = "../images/work/"; // Change this to your desired upload directory
            $targetFile = $targetDirectory . basename($_FILES["attachment_file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


                // If everything is ok, try to upload file
                if (move_uploaded_file($_FILES["attachment_file"]["tmp_name"], $targetFile)) {

                    $error = "The file " . htmlspecialchars(basename($_FILES["attachment_file"]["name"])) . " has been uploaded.";
                    include 'success.php';
                } else {

                    $error = "Sorry, there was an error uploading your file.";
                    include 'alert.php';
                }

            //Success Check
            if ($conn->query($sql) === TRUE) {

                $updateSql = "UPDATE projects SET work_status = 'Completed' WHERE project_title = '$project_name'";

                if ($conn->query($updateSql) === TRUE) {
                    // Work_status updated successfully
                    $success1 = " Project Status Update Successfully!";
                } else {
                    // Error updating work_status
                    $success1 = " Project Status Cant Updated!!!";
                }
                $success2 = " '$success1' and '$task' Added Successfully!";
                $success = " New Content Update successfully For Task: '$success2'" . "<br>";
                include 'success.php';
// Additional actions after successful insertion, like redirecting or displaying a success message
            } else {
                include 'alert.php';
            }
        }
    }
?>