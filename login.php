<?php
session_start();
require_once 'Database.php';
require_once 'User.php';  // Make sure to include the User class

$database = new Database("localhost", "root", "", "web-project");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    require_once 'Database.php';
    require_once 'User.php';

    $database = new Database("localhost", "root", "", "web-project");
    
    
    $user = new User($database);
    
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    if ($user->login($email, $password)) {
        // Redirect to the dashboard or any other page after successful login
        header("Location: index.php");
        exit();
    } else {
        // Display login error
        echo "Invalid login credentials. Please try again.";
    }
}
$user = $_SESSION['id'];
include 'header.php';
?>
<script src="https://cdn.tailwindcss.com"></script>

<div class="flex justify-center items-center mt-20 mx-auto min-h-full font-onest">
  <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
    <div class="mx-auto w-full max-w-sm lg:w-96">
      <div>
        <h2 class="mt-8 text-5xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
        <p class="mt-2 text-xl leading-6 text-gray-500">
          Not a member?
          <a href="#" class="font-semibold text-yellow-400 hover:text-yellow-500">Create an account</a>
        </p>
      </div>

      <div class="mt-10 my-24">
        <div>
          <form method="POST" action="login.php" class="space-y-6">
            <div>
              <label for="email" class="block text-xl font-medium leading-6 text-gray-900">Email address</label>
              <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-400 sm:text-xl sm:leading-6">
              </div>
            </div>

            <div>
              <label for="password" class="block text-xl font-medium leading-6 text-gray-900">Password</label>
              <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-400 sm:text-xl sm:leading-6">
              </div>
           </div>

            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-yellow-400 focus:ring-yellow-400">
                <label for="remember-me" class="ml-3 block text-xl leading-6 text-gray-700">Remember me</label>
              </div>

              <div class="text-xl leading-6">
                <a href="#" class="font-semibold text-yellow-400 hover:text-yellow-500">Forgot password?</a>
              </div>
            </div>

            <div>
              <button type="submit" name="login" value="Login now" class="flex w-full justify-center rounded-md bg-yellow-400 px-3 py-1.5 text-xl font-semibold leading-6 text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-400">Sign in</button>
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include 'footer.php';
?>  