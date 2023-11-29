<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary metadata here -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Your Product Information System</title>
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php
        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            // If logged in, display additional navigation links for CRUD operations
            echo '<li><a href="product.php">Product List</a></li>';
            echo '<li><a href="profile.php">Profile</a></li>';
            echo '<li><a href="auth/logout.php">Logout</a></li>';
        } else {
            // If not logged in, display a login link
            echo '<li><a href="auth/login.php">Login</a></li>';
        }
        ?>
    </ul>
</nav>

<div class="container">
    <!-- The main content of your page -->
    <h1>Welcome to Your Product Information System</h1>
    <p>This is the homepage content or any other relevant information.</p>

    <!-- Include specific content based on the page -->
    <?php
    // Check if the user is logged in and display appropriate content
    if (isset($_SESSION['user_id'])) {
        // Display content for logged-in users
        echo "<p>Hello, {$_SESSION['username']}! You can manage your products and profile.</p>";
    } else {
        // Display content for non-logged-in users
        echo "<p>Please log in to access additional features.</p>";
    }
    ?>
</div>

