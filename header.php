<?php
session_start();
require_once 'Database.php';
require_once 'User.php';

$database = new Database("localhost", "root", "", "web-project");

$welcomeMessage = "Mireseerdhet ne Qerdhen Yjet!";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = new User($database);

        if ($user->login($email, $password)) {
            // Successfully logged in, fetch name and store it in the session
            $userData = $user->getUserByEmail($email);
            $_SESSION['user_id'] = $userData['user_id'];
            $_SESSION['user_name'] = $userData['name'];
            $_SESSION['user_role'] = $userData['role'];

            // Redirect to the dashboard or any other page after successful login
            header("Location: index.php");
            exit();
        } else {
            // Display login error
            echo "Invalid login credentials. Please try again.";
        }
    }
}
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="stili.css">
</head>

<header class="header">
    <a href="index.php" class="logo"> <i class="fas fa-school"></i> Qerdhja Yjet</a>
    <nav class="navbar text-3xl">
        <a href="#home">Faqja Kryesore</a>
        <a href="#about">Rreth Nesh</a>
        <a href="#education">Edukimi</a>
        <a href="#teacher">Mësuesit</a>
        <a href="#gallery">Galeria</a>
        <a href="#contact">Kontakto</a>
    </nav>
    <div class="icons text-xl">
        <?php if (isset($_SESSION['id'])) : ?>
            <div class="buttons-container">
                <?php if ($_SESSION['user_role'] == 'super_admin') : ?>
                    <a href="create.php" class="rounded-md bg-yellow-200 text-black ring-1 ring-black mx-16 my-2">Add Product</a>
                <?php endif; ?>
                <!-- <a href="read.php">Edi</a>
                <a href="update.php">Update</a>
                <a href="delete.php">Delete</a> -->
            </div>
            <div class="user-info absolute right-0"><?php echo $_SESSION['user_name']; ?>
                <div class="fas fa-user" id="login-btn"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
                <form action="logout.php" class="" method="POST">
                    <input type="submit" value="logout" class="btn">
                </form>

            <?php else : ?>
                <div class="fas fa-user" id="login-btn"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
                <form action="login.php" class="login-form" method="POST">
                    <h3>Regjistrohu</h3>
                    <input type="email" name="email" placeholder="your email" class="box">
                    <input type="password" name="password" placeholder="your password" class="box">
                    <p>Keni harruar fjalëkalimin? <a href="#">Kliko këtu?</a> </p>
                    <input type="submit" value="login now" class="btn">
                </form>
            <?php endif; ?>
        </div>
    </header>
