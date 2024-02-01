<?php
session_start();
require_once 'Database.php';
require_once 'User.php';

// Check if the user is logged in and has the required role
if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'product_manager') {
    // Include necessary files and classes
    $database = new Database("localhost", "root", "", "web-project");
    $user = new User($database);

    // CRUD operations for Product Manager
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create_productmanager"])) {
        // Handle Product Manager creation
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user->register($name, $email, $password, 'product_manager');
        // Handle success or failure
        header("Location: crud_productmanager.php");
        exit();
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["read_productmanager"])) {
        // Handle Product Manager reading
        $productmanagers = $user->getUsersByRole('product_manager');
        // Display the Product Manager data
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_productmanager"])) {
        // Handle Product Manager updating
        $userId = $_POST["user_id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // You may want to add validation and error handling here

        $user->updateUser($userId, $name, $email, $password);
        // Handle success or failure
        header("Location: crud_productmanager.php");
        exit();
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_productmanager"])) {
        // Handle Product Manager deletion
        $userId = $_POST["user_id"];

        // You may want to add validation and error handling here

        $user->deleteUser($userId);
        // Handle success or failure
        header("Location: crud_productmanager.php");
        exit();
    } else {
        // Display or redirect as needed
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content for Product Manager CRUD page -->
</head>
<body>
<h2>Product Manager CRUD Operations</h2>

<!-- Display Product Manager data (if any) -->
<?php
if (isset($productmanagers) && !empty($productmanagers)) {
    echo "<h3>Product Managers:</h3>";
    echo "<ul>";
    foreach ($productmanagers as $productmanager) {
        echo "<li>{$productmanager['name']} - {$productmanager['email']}</li>";
    }
    echo "</ul>";
}
?>

<!-- Form to create a new Product Manager -->
<form method="post" action="">
    <h3>Create Product Manager</h3>
    <label>Name:</label>
    <input type="text" name="name" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <button type="submit" name="create_productmanager">Create Product Manager</button>
</form>

<!-- Form to update Product Manager data -->
<form method="post" action="">
    <h3>Update Product Manager</h3>
    <label>User ID:</label>
    <input type="number" name="user_id" required>
    <label>Name:</label>
    <input type="text" name="name" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <button type="submit" name="update_productmanager">Update Product Manager</button>
</form>

<!-- Form to delete Product Manager -->
<form method="post" action="">
    <h3>Delete Product Manager</h3>
    <label>User ID:</label>
    <input type="number" name="user_id" required>
    <button type="submit" name="delete_productmanager">Delete Product Manager</button>
</form>

<!-- Form to manage products -->
<form method="post" action="">
    <h3>Manage Products</h3>
    <!-- Include the necessary input fields and buttons for product CRUD operations -->
    <!-- For example: Product ID, Name, Description, Price, etc. -->
    <label>Product ID:</label>
    <input type="number" name="product_id" required>
    <label>Name:</label>
    <input type="text" name="product_name" required>
    <label>Description:</label>
    <textarea name="product_description" required></textarea>
    <label>Price:</label>
    <input type="number" name="product_price" required>
    <button type="submit" name="create_product">Create Product</button>
    <button type="submit" name="update_product">Update Product</button>
    <button type="submit" name="delete_product">Delete Product</button>
</form>
</body>
</html>
