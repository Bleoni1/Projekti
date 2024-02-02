<?php
require_once 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $database = new Database();

    // Get form data
    $productId = $_POST["product_id"];

    // Prepare and execute the SQL query
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = $database->prepare($query);
    $database->bind($stmt, "i", $productId);

    if ($database->execute($stmt)) {
        echo "Product deleted successfully!";
    } else {
        echo "Error deleting product.";
    }

    $database->close();
}
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto my-8 p-8 bg-white rounded shadow-md">
        <h2 class="text-3xl font-bold mt-96">Delete Product</h2>
        <form action="delete.php" method="post">
            <div class="mb-4">
                <label for="product_id" class="block text-xl font-medium text-gray-600">Product ID:</label>
                <input type="text" id="product_id" name="product_id" class="mt-1 p-2 border rounded w-full">
            </div>
            <input type="submit" name="delete" value="Delete Product" class="bg-red-500 text-white p-2 rounded cursor-pointer">
        </form>
    </div>

</body>

<?php
include 'footer.php';
?>

</html>
