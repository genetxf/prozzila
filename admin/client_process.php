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
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    $contact_no = mysqli_real_escape_string($conn, $_POST["contact_no"]);
    $country = mysqli_real_escape_string($conn, $_POST["country"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    $website = mysqli_real_escape_string($conn, $_POST["website"]);
    // Company Information

    $about = mysqli_real_escape_string($conn, $_POST["about"]);
    $attachment = htmlspecialchars(basename($_FILES["attachment_file"]["name"]));


// Retrieve and sanitize other form fields as needed...
    $sql = "INSERT INTO `client`( `name`, `email_id`, `contact_no`, `country`, `address`, `status`, `website`, `about`, `image`)
            VALUES ('$name', '$email', '$contact_no', '$country', '$address', '$status', '$website', '$about', '$attachment')";

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