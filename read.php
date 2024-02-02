<?php
include 'header.php';
require_once 'Database.php';

$database = new Database();

// Perform the SQL query to retrieve products
$query = "SELECT * FROM products";
$stmt = $database->query($query);

// Fetch and display products
$products = $database->resultSet($stmt);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Products</title>
    <!-- Include Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <h2 class="text-4xl mb-4">Products List</h2>
        <div class="space-y-4">
            <?php if (count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <div class="border border-gray-300 rounded-md p-4">
                        <p class="text-xl font-medium text-gray-700">Name: <?= $product['Name'] ?></p>
                        <p class="text-xl font-medium text-gray-700">Description: <?= $product['Description'] ?></p>
                        <p class="text-xl font-medium text-gray-700">Sold since: <?= $product['Sold_since'] ?></p>
                        <p class="text-xl font-medium text-gray-700">Price: <?= $product['Price'] ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-xl text-gray-700">No products found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

<?php
include 'footer.php';
?>
</html>
