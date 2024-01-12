<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["attachment_file"])) {
    $targetDirectory = "root/images/"; // Change this to your desired upload directory
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
} else {
    echo "Please select a file to upload.";
}
?>
