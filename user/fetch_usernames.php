<?php
include 'database.php';

if(isset($_POST["query"])){
    $search = $_POST["query"];
    $sql = "SELECT username FROM employees WHERE username LIKE '%$search%'"; // Query to search for usernames
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output .= '<li>'.$row["username"].'</li>'; // Create list items for suggestions
        }
    } else {
        $output .= '<li>No username found</li>';
    }
    echo $output;
}


?>