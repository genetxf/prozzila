<?php
    include 'header.php';
    if  (isset($_POST['submit'])) {
// Retrieve and sanitize form data
        // Assuming you have an ID for the condition
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);
        $adpass = mysqli_real_escape_string($conn, $_POST["adpass"]);
        $uadpass = hash('sha256', $adpass);


        $sql = "SELECT * FROM admins WHERE username = '$loguser' AND password = '$uadpass'";

        // Execute the SQL statement
        $result = $conn->query($sql);

        // Check if the query returned any rows
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if($password == $password2)
                {
                    $password = $_POST['password'];
                    // Hash the password using SHA-256
                    $upass = hash('sha256', $password);
                    $sql2 = "UPDATE admins SET
            username = '$username',
            email = '$email',
            password = '$upass'
            WHERE username = '$username'";  // Replace 'id' with the actual column used in your condition
                    // Execute the query
                    if ($conn->query($sql2) === TRUE) {
                        $success = "Record updated successfully";
                        include 'success.php';
                    } else {
                        $error = "Error: " . $sql2 . "<br>" . $conn->error;

                    }
                }
                else {
                    $error = "Password Not Matched";
                    include 'alert.php';

                }
            }
        }
        else {
            $error = "Password Not Matched";
            include 'alert.php';

        }

    }
    include 'footer.php';
    ?>