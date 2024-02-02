<?php
require_once 'Database.php';
require_once 'User.php';

$database = new Database("localhost", "root", "", "web-project");

include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate inputs (you can add more validation)
    if (empty($name) || empty($email) || empty($password)) {
        // Handle validation errors
        echo "<div class='text-red-500'>All fields are required.</div>";
    } else {
        // Register the user
        $user = new User($database);
        $registrationResult = $user->register($name, $email, $password);

        if ($registrationResult) {
            // Log in the user after successful registration
            $loginResult = $user->login($email, $password);

            if ($loginResult) {
                // Redirect to index.php after successful login
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='text-red-500'>Login after registration failed.</div>";
            }
        } else {
            echo "<div class='text-red-500'>Registration failed. Please try again.</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

<div class="flex justify-center items-center mt-20 mx-auto min-h-full font-onest">
    <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="mx-auto w-full max-w-sm lg:w-96">
            <div>
                <h2 class="mt-8 text-5xl font-bold leading-9 tracking-tight text-gray-900">Create an account</h2>
                <p class="mt-2 text-xl leading-6 text-gray-500">
                    Already a member?
                    <a href="#" class="font-semibold text-yellow-400 hover:text-yellow-500">Sign in</a>
                </p>
            </div>

            <div class="mt-10 my-24">
                <div>
                    <form method="POST" action="" class="space-y-6">
                        <div>
                            <label for="name" class="block text-xl font-medium leading-6 text-gray-900">Your Name</label>
                            <div class="mt-2">
                                <input id="name" name="name" type="text" required
                                       class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-400 sm:text-xl sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-xl font-medium leading-6 text-gray-900">Email address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" required
                                       class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-400 sm:text-xl sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-xl font-medium leading-6 text-gray-900">Password</label>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" required
                                       class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-400 sm:text-xl sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <button type="submit" name="register" value="Register now"
                                    class="flex w-full justify-center rounded-md bg-yellow-400 px-3 py-1.5 text-xl font-semibold leading-6 text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-400">Create
                                Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<?php
include 'footer.php';
?>

</html>
