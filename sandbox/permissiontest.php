<?php
    include 'head.php';
    include 'database.php';

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Permission Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Permission Form
                </div>
                <div class="card-body">
                    <?php

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Retrieve form data
                        $username = $_POST['username'];
                        $tablenames = $_POST['tablenames'];
                        $hasReadPermission = !empty($_POST['read']); // Assume this is true
                        $hasWritePermission = !empty($_POST['write']); // Assume this is false
                        $hasFullControlPermission = !empty($_POST['full_control']); // Assume this is true

                        if ($hasFullControlPermission) {
                            $permission = 3; // Full Control
                        } elseif ($hasWritePermission) {
                            $permission = 2; // Write
                        } elseif ($hasReadPermission) {
                            $permission = 1; // Read
                        } else {
                            $permission = 0; // None
                        }

                        // Insert or update permissions for the user
                        $sqlQuery = "SELECT id FROM employees WHERE username = '$username'";
                        $result2 = $conn->query($sqlQuery);
                        $userid = 0;
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                $userid = $row['id'];
                            }
                        }

                        $checkUserQuery = "SELECT * FROM permissions WHERE permissions.user_id = '$userid' AND permissions.resource_type = '$tablenames'";
                        $result = $conn->query($checkUserQuery);

                        if ($result->num_rows > 0) {
                            // If the user exists, update their permissions
                            $updateQuery = "UPDATE `permissions` SET `resource_type` = '$tablenames', `permission_level` = '$permission' WHERE `permissions`.`user_id` = '$userid' AND permissions.resource_type = '$tablenames'";
                            if ($conn->query($updateQuery) === TRUE) {
                                echo "<div class='alert alert-success'>Permission for user '$username' updated successfully!</div>";
                            } else {
                                echo "<div class='alert alert-danger'>Error updating permission: " . $conn->error . "</div>";
                            }
                        } else {
                            // If the user doesn't exist, insert new permission
                            $insertQuery = "INSERT INTO `permissions`(`user_id`, `resource_type`, `permission_level`) VALUES ('$userid','$tablenames','$permission')";
                            if ($conn->query($insertQuery) === TRUE) {
                                echo "<div class='alert alert-success'>Permission for user '$username' saved successfully!</div>";
                            } else {
                                echo "<div class='alert alert-danger'>Error inserting permission: " . $conn->error . "</div>";
                            }
                        }

                    }
                    ?>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <input placeholder="Type Username" type="text" class="form-control typeahead" id="username" name="username" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input placeholder="Type Table names" type="text" class="form-control typeahead" id="tablenames" name="tablenames" autocomplete="off">
                        </div>

                        <div class="form-group form-switch form-check-inline">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="read" name="read" id="read">
                                <label class="form-check-label" for="read">
                                    Read
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="write" name="write" id="write">
                                <label class="form-check-label" for="write">
                                    Write
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="full_control" name="full_control" id="full_control">
                                <label class="form-check-label" for="full_control">
                                    Full Control
                                </label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';

// Fetch usernames
$sql = "SELECT username FROM employees";
$result = $conn->query($sql);
$usernames = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usernames[] = $row['username'];
    }
}

// Fetch table names
$sql2 = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'prozzila'";
$result2 = $conn->query($sql2);
$tablenames = array();
if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $tablenames[] = $row['table_name'];
    }
}

// Close the database connection after fetching data
$conn->close();
?>



<!-- Bootstrap Typeahead JS -->
<script src="js/typeahead.js"></script>
<script>
    $(document).ready(function(){
        var usernames = <?php echo json_encode($usernames); ?>;
        var tablenames = <?php echo json_encode($tablenames); ?>;
        $('.typeahead[name="username"]').typeahead({
            source: usernames
        });
        $('.typeahead[name="tablenames"]').typeahead({
            source: tablenames
        });
    });
</script>
</body>
</html>
