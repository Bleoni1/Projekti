<?php
require_once 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
    $database = new Database();

    // Get form data
    $name = $_POST["name"];
    $description = $_POST["description"];
    $soldSince = $_POST["sold_since"];
    $price = $_POST["price"];

    // Prepare and execute the SQL query
    $query = "INSERT INTO products (Name, Description, Sold_since, Price) VALUES (?, ?, ?, ?)";
    $stmt = $database->prepare($query);
    $database->bind($stmt, "sssd", $name, $description, $soldSince, $price);

    if ($database->execute($stmt)) {
        echo "Product created successfully!";
    } else {
        echo "Error creating product.";
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
    <title>Create Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <!-- Add Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-64">
        <h2 class="text-4xl mb-4">Create Product</h2>
        <form action="create.php" method="post" class="space-y-4">
            <div>
                <label for="name" class="block text-xl font-medium text-gray-700">Name:</label>
                <input type="text" name="name" id="name" class="border border-gray-300 rounded-md p-2 w-full">
            </div>
            <div>
                <label for="description" class="block text-xl font-medium text-gray-700">Description:</label>
                <input type="text" name="description" id="description" class="border border-gray-300 rounded-md p-2 w-full">
            </div>
            <div>
                <label for="sold_since" class="block text-xl font-medium text-gray-700">Sold since:</label>
                <input type="date" name="sold_since" id="sold_since" class="border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="price" class="block text-xl font-medium text-gray-700">Price:</label>
                <input type="text" name="price" id="price" class="border border-gray-300 rounded-md p-2">
            </div>
            <button type="submit" name="create" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Product</button>
            <a href="read.php" class="text-5xl rounded-md bg-yellow-500 ring-1 ring-black">Show</a>
        </form>
    </div>
</body>

<?php
include 'footer.php';
?>
</html>
