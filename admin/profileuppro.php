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

    include 'header.php';
$id = $logid;

// Process form submission
    if  (isset($_POST['submit']))  {
// Retrieve and sanitize form data
        $name = $_POST["name"];
        $lname = $_POST["lname"];
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $contact_no = mysqli_real_escape_string($conn, $_POST["contact_no"]);
        $address = mysqli_real_escape_string($conn, $_POST["address"]);
        $about = mysqli_real_escape_string($conn, $_POST["about"]);
        $attachment = basename($_FILES["attachment_file"]["name"]);

        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $password = $_POST['password'];
        // Hash the password using SHA-256
        $upass = hash('sha256', $password);



// Retrieve and sanitize other form fields as needed...
        $sql = "UPDATE `profiles` 
        SET 
        `first_name` = '$name',
        `last_name` = '$lname',
        `email` = '$email',
        `phone_number` = '$contact_no',
        `picture` = '$attachment',
        `address` = '$address',
        `about` = '$about'
        WHERE id = '$id'";

//Upload Images
        $targetDirectory = "../images/profile/"; // Change this to your desired upload directory
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

            $error = "Sorry, your file is too large. Please Upload under 5MB !!!";
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
                $success1="The file " . htmlspecialchars(basename($_FILES["attachment_file"]["name"])) . " has been uploaded.";
            } else {

                $error = "Sorry, there was an error uploading your file";
                include 'alert.php';
            }
        }
//Success Check
        if ($conn->query($sql) === TRUE) {
// Your SQL update query
            $sql2= "UPDATE admins SET
            username = '$username',
            email = '$email',
            password = '$upass'
            WHERE id = '$id'";  // Replace 'id' with the actual column used in your condition
            // Execute the query
            if ($conn->query($sql2) === TRUE) {
                $success = "Record updated successfully";

            } else {
                $error = "Error: " . $sql2 . "<br>" . $conn->error;

            }
            $success ="'$name' Added Successfully!". "<br>" .$success1;
            include 'success.php';
// Additional actions after successful insertion, like redirecting or displaying a success message
        } else {
            include 'alert.php';
        }
    }

// Close the database connection
    $conn->close();
?>