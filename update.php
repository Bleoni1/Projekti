<?php
require_once 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $database = new Database();

    // Get form data
    $productId = $_POST["product_id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $soldSince = $_POST["sold_since"];
    $price = $_POST["price"];

    // Perform validation as needed

    // Prepare and execute the SQL query
    $query = "UPDATE products SET Name = ?, Description = ?, Sold_since = ?, Price = ? WHERE id = ?";
    $stmt = $database->prepare($query);
    $database->bind($stmt, "sssdi", $name, $description, $soldSince, $price, $productId);

    if ($database->execute($stmt)) {
        echo "Product updated successfully!";
    } else {
        echo "Error updating product.";
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
    <title>Update Product</title>
    <script src="https://cdn.tailwindcss.com" rel="stylesheet"></script>
</head>
<body>

    <h2 class="mt-64">Update Product</h2>
    <form action="update_product.php" method="post">
        Product ID: <input type="text" name="product_id"><br>
        Name: <input type="text" name="name"><br>
        Description: <input type="text" name="description"><br>
        Sold since: <input type="text" name="sold_since"><br>
        Price: <input type="text" name="price"><br>
        <input type="submit" name="update" value="Update Product">
    </form>

</body>
<?php 
include 'footer.php';
?>
</html>
