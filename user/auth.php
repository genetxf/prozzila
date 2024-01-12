<?php
// Check if the user is not logged in
session_start();
if (isset($_SESSION['user']) == "") {
    header("Location: userlogin.php");
}
?>