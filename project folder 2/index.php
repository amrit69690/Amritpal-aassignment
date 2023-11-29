<?php
// Include the database connection file
include('config/db.php');

// Include the authentication file
include('auth/authentication.php');

// Include the header
include('includes/header.php');
?>

<div class="container">
    <h2>Product List</h2>

    <!-- Display a table or other structure to show product information -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch and display product information from the database
            $query = "SELECT * FROM products";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['description']}</td>";
                echo "<td>{$row['price']}</td>";
                echo "<td><img src='uploads/{$row['image_path']}' alt='Product Image' style='max-width: 100px; max-height: 100px;'></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
// Include the footer
include('includes/footer.php');
?>
