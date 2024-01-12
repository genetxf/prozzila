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
    $client_id = mysqli_real_escape_string($conn, $_POST["client_id"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $contact_no = mysqli_real_escape_string($conn, $_POST["contact_no"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $country = mysqli_real_escape_string($conn, $_POST["country"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);

    // Company Information
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    $company_name = mysqli_real_escape_string($conn, $_POST["company_name"]);
    $company_country = mysqli_real_escape_string($conn, $_POST["company_country"]);
    $company_address = mysqli_real_escape_string($conn, $_POST["company_address"]);
    $company_contact_no = mysqli_real_escape_string($conn, $_POST["company_contact_no"]);
    $company_website = mysqli_real_escape_string($conn, $_POST["company_website"]);
    $about = mysqli_real_escape_string($conn, $_POST["about"]);
    $attachment = htmlspecialchars(basename($_FILES["attachment_file"]["name"]));


// Retrieve and sanitize other form fields as needed...
    $sql = "INSERT INTO `client`(`client_id`, `email_id`, `contact_no`, `gender`, `country`, `address`, `status`, `company_name`, `company_country`, `company_address`, `company_contact_no`, `company_website`, `about`, `image`)
            VALUES ('$client_id','$email', '$contact_no', '$gender', '$country', '$address', '$status', '$company_name', '$company_country', '$company_address', '$company_contact_no', '$company_website', '$about', '$attachment')";

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