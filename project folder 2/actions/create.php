<?php
// Include the database connection file
include('../config/db.php');

// Include the authentication file to check if the user is logged in
include('../auth/authentication.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../auth/login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Handle image upload
    $image_path = ''; // Set a default value
    if ($_FILES['image']['error'] == 0) {
        $uploadsDirectory = '../uploads/';
        $uploadFile = $uploadsDirectory . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
        $image_path = $_FILES['image']['name'];
    }

    // Insert data into the database
    $query = "INSERT INTO products (name, description, price, image_path) VALUES ('$name', '$description', '$price', '$image_path')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to the product list page on successful creation
        header("Location: ../product.php");
        exit();
    } else {
        // Handle errors if the query fails
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!-- HTML Form for creating a new product -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary metadata here -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Create New Product</title>
</head>
<body>

<?php
// Include the header
include('../includes/header.php');
?>

<div class="container">
    <h2>Create New Product</h2>

    <!-- Form for creating a new product -->
    <form method="post" action="create.php" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" name="name" required>

        <label for="description">Product Description:</label>
        <textarea name="description" rows="4" required></textarea>

        <label for="price">Product Price:</label>
        <input type="number" name="price" step="0.01" required>

        <label for="image">Product Image:</label>
        <input type="file" name="image">

        <button type="submit">Create Product</button>
    </form>
</div>

<?php
// Include the footer
include('../includes/footer.php');
?>

</body>
</html>
