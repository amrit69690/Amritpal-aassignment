<?php
// Include the database connection file
include('../config/db.php');

// Start a session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Optionally, you can perform additional actions for logged-in users if needed
    // For example, you might fetch user details from the database based on the user_id
    // and store them in a variable for later use
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    }
}

// Function to check if a user is logged in
function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to log out a user
function logoutUser() {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: login.php");
    exit();
}
?>
