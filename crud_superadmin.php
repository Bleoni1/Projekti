<?php
session_start();
require_once 'Database.php';
require_once 'User.php';

// Check if the user is logged in and has the required role
if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'super_admin') {
    // Include necessary files and classes
    $database = new Database("localhost", "root", "", "web-project");
    $user = new User($database);

    include 'header.php';
} else {
    header('index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head content for Super Admin CRUD page -->

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <?php
    if (isset($superadmins) && !empty($superadmins)) {
        echo "<h3 class='text-2xl font-bold mb-4'>Super Admins:</h3>";
        echo "<ul class='list-disc pl-8'>";
        foreach ($superadmins as $superadmin) {
            echo "<li>{$superadmin['name']} - {$superadmin['email']}</li>";
        }
        echo "</ul>";
    }
    ?>

    <!-- Form to create a new Super Admin -->
    <form method="post" action="" class="mb-8">
        <h3 class="text-2xl font-bold mb-2">Create Super Admin</h3>
        <label class="block mb-2">Name:</label>
        <input type="text" name="name" required class="p-2 border rounded w-full mb-2">
        <label class="block mb-2">Email:</label>
        <input type="email" name="email" required class="p-2 border rounded w-full mb-2">
        <label class="block mb-2">Password:</label>
        <input type="password" name="password" required class="p-2 border rounded w-full mb-2">
        <button type="submit" name="create_superadmin" class="bg-blue-500 text-white p-2 rounded cursor-pointer">Create Super Admin</button>
    </form>

    <!-- Form to update Super Admin data -->
    <form method="post" action="" class="mb-8">
        <h3 class="text-2xl font-bold mb-2">Update Super Admin</h3>
        <label class="block mb-2">User ID:</label>
        <input type="number" name="user_id" required class="p-2 border rounded w-full mb-2">
        <label class="block mb-2">Name:</label>
        <input type="text" name="name" required class="p-2 border rounded w-full mb-2">
        <label class="block mb-2">Email:</label>
        <input type="email" name="email" required class="p-2 border rounded w-full mb-2">
        <label class="block mb-2">Password:</label>
        <input type="password" name="password" required class="p-2 border rounded w-full mb-2">
        <button type="submit" name="update_superadmin" class="bg-green-500 text-white p-2 rounded cursor-pointer">Update Super Admin</button>
    </form>

    <!-- Form to delete Super Admin -->
    <form method="post" action="">
        <h3 class="text-2xl font-bold mb-2">Delete Super Admin</h3>
        <label class="block mb-2">User ID:</label>
        <input type="number" name="user_id" required class="p-2 border rounded w-full mb-2">
        <button type="submit" name="delete_superadmin" class="bg-red-500 text-white p-2 rounded cursor-pointer">Delete Super Admin</button>
    </form>

</body>

<?php
include 'footer.php';
?>

</html>
