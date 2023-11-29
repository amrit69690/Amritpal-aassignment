<?php
// Include the database connection file
include('config/db.php');

// Include the authentication file to check if the user is logged in
include('auth/authentication.php');

// Check if the user is logged in
if (!isUserLoggedIn()) {
    // Redirect to the login page if not logged in
    header("Location: auth/login.php");
    exit();
}

// Get user details from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);

// Check if the user exists
if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    // Redirect to the login page if user not found
    header("Location: auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary metadata here -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>User Profile</title>
</head>
<body>

<?php
// Include the header
include('includes/header.php');
?>

<div class="container">
    <h2>User Profile</h2>

    <p>Welcome, <?php echo $user['username']; ?>!</p>

    <ul>
        <li>User ID: <?php echo $user['id']; ?></li>
        <li>Email: <?php echo $user['email']; ?></li>
        <!-- Add more user details as needed -->
    </ul>
</div>

<?php
// Include the footer
include('includes/footer.php');
?>

</body>
</html>
