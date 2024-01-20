<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $user = $_POST['username'];
    // Retrieve the password from the POST request
    $password = $_POST['password'];

// Hash the password using SHA-256
    $hashedPassword = hash('sha256', $password);

// Use $hashedPassword in your code for storage or authentication

    // Validate the form data (you can add more validation if needed)

    // Establish a database connection (replace the placeholders with your actual database credentials)
    include 'database.php';

    // Prepare the SQL statement
    $sql = "SELECT * FROM admins WHERE username = '$user' AND password = '$hashedPassword'";

    // Execute the SQL statement
    $result = $conn->query($sql);

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['email'] = $row["email"];
            $email = $_SESSION['email'];
            $sql2 = "SELECT * FROM profiles WHERE email = '$email'";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    $_SESSION['picture'] = $row2["picture"];
                    $_SESSION['id'] = $row2["id"];
                }
            }
        // User authentication successful
        header("Location: index.php");
    }
    } else {
        // User authentication failed
        $error="Invalid username or password!";
        include 'alert.php';
        ?>
        <?php
    }

    // Close the database connection
    $conn->close();
}
?>