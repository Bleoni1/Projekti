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
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <link rel="stylesheet" href="stili.css">
    <script src="https://cdn.tailwindcss.com"></script>
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

    <section class="home" id="home">
        <div class="content">
            <h3><?php echo $welcomeMessage; ?></h3>
            <a href="#" class="btn">Mëso më shumë</a>
        </div>

        <div class="image">
            <img src="images/home.png" alt="">
        </div>

        <!-- Rest of your home section -->

    </section>

    <!-- <section class="products" id="products">
        <h2>Our Products</h2>
        <ul>
            <?php foreach ($productList as $product) : ?>
                <li><?php echo $product; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="news" id="news">
        <h2>Latest News</h2>
        <?php foreach ($newsList as $newsItem) : ?>
            <div>
                <h3><?php echo $newsItem['title']; ?></h3>
                <p>Published on: <?php echo $newsItem['date']; ?></p>
                <p><?php echo $newsItem['summary']; ?></p>
            </div>
        <?php endforeach; ?>
    </section> -->


    <section class="about" id="about">

        <h1 class="heading"> <span>Rreth</span> Nesh</h1>

        <div class="row">

            <div class="image">
                <img src="images/about us.png" alt="">
            </div>

            <div class="content">
                <h3>Mësimi, Argëtimi, dhe Lojërat së bashku</h3>
                <p>Në qerdhen tonë prioriteti yne më i madhë është argëtimi i fëmijeve dhe zhvillimi kreativitetit të tyre, prandaj mos hezitoni të na besoni me fëmijën tuaj.</p>
                <p>Fëmija juaj do të ndihet si në shtëpine e tyre, dhe mirëqenia e tyre është detyra jonë parësore.</p>
                <a href="#" class="btn">Më shumë rreth nesh</a>
            </div>

        </div>

    </section>


    <section class="education" id="education">

        <h1 class="heading">Edukimi <span> ynë</span></h1>

        <div class="box-container">

            <div class="box">
                <h3> Mësimët e Muzikës</h3>
                <p>Fëmija juaj me një mori instrumentesh do te mësojë si të punoje me instrumente muzikore.</p>
                <img src="images/education1.png" alt="">
            </div>

            <div class="box">
                <h3>Mësimet e Sportit</h3>
                <p>Fëmija juaj do të ketë shumë perzgjedhje sportesh sikur: futboll, volejboll e shumë sporte tjera.</p>
                <img src="images/education2.png" alt="">
            </div>

            <div class="box">
                <h3>Mësimet e Artit</h3>
                <p>Me një mori pajisjesh për vizatim, kreativiteti fëmijes tuaj ne art do të mbërrijë kulmin.</p>
                <img src="images/education3.png" alt="">
            </div>

        </div>

    </section>


    <section class="teacher" id="teacher">

        <h1 class="heading">Edukatorët <span> Tanë</span></h1>

        <div class="box-container">

            <div class="box">
                <img src="images/teacher1.png" alt="">
                <h3>Alma Shala</h3>
                <p>Edukatore</p>
                <div class="share">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>

            <div class="box">
                <img src="images/teacher2.png" alt="">
                <h3>Erblina Hoxha</h3>
                <p>Edukatore</p>
                <div class="share">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>

            <div class="box">
                <img src="images/teacher3.png" alt="">
                <h3>Artiola Berisha</h3>
                <p>Edukatore</p>
                <div class="share">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>

        </div>

    </section>


    <section class="activities">

        <h1 class="heading">Aktivitetet <span>tona</span></h1>

        <div class="box-container">

            <div class="box">
                <img src="images/activities1.png" alt="">
                <h3>Shkronjat</h3>
            </div>

            <div class="box">
                <img src="images/activities2.png" alt="">
                <h3>Lodra të ndryshme</h3>
            </div>

            <div class="box">
                <img src="images/activities3.png" alt="">
                <h3>Lexim</h3>
            </div>

            <div class="box">
                <img src="images/activities4.png" alt="">
                <h3>Sport</h3>
            </div>

            <div class="box">
                <img src="images/activities5.png" alt="">
                <h3>Matematikë</h3>
            </div>

            <div class="box">
                <img src="images/activities6.png" alt="">
                <h3>Vetura</h3>
            </div>

            <div class="box">
                <img src="images/activities7.png" alt="">
                <h3>Vizatim</h3>
            </div>

            <div class="box">
                <img src="images/activities8.png" alt="">
                <h3>Muzikë</h3>
            </div>

        </div>

    </section>


    <section class="gallery" id="gallery">

        <h1 class="heading">Galeria <span>jonë</span></h1>

        <div class="gallery-container">

            <a href="images/gallery-1.jpg" class="box">
                <img src="images/gallery-1.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery-2.jpg" class="box">
                <img src="images/gallery-2.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery-3.jpg" class="box">
                <img src="images/gallery-3.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery-4.jpg" class="box">
                <img src="images/gallery-4.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery-5.jpg" class="box">
                <img src="images/gallery-5.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery-6.jpg" class="box">
                <img src="images/gallery-6.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

        </div>

    </section>


    <section class="contact" id="contact">

        <h1 class="heading"> <span>Na</span> Kontaktoni</h1>

        <div class="icons-container">

            <div class="icons">
                <i class="fas fa-clock"></i>
                <h3>Oraret tona :</h3>
                <p>Hëne - Enjte: 08:00 deri 12:30 </p>
                <p>Premte: 09:00 deri 12:00 </p>
            </div>

            <div class="icons">
                <i class="fas fa-envelope"></i>
                <h3>Email</h3>
                <p>es67840@ubt-uni.net</p>
                <p>bm67290@ubt-uni.net</p>
            </div>

            <div class="icons">
                <i class="fas fa-phone"></i>
                <h3>Numrat e telefonit</h3>
                <p>+383 48 200 951</p>
                <p>+383 43 510 938</p>
            </div>

        </div>

        <div class="row">

            <div class="image">
                <img src="images/contact.gif" alt="">
            </div>

            <form action="">
                <h3>Kontaktoni me ne</h3>
                <div class="inputBox">
                    <input type="text" placeholder="your name">
                    <input type="email" placeholder="your email">
                </div>
                <div class="inputBox">
                    <input type="number" placeholder="your number">
                    <input type="text" placeholder="your subject">
                </div>
                <textarea placeholder="your message" cols="30" rows="10"></textarea>
                <input type="submit" value="send message" class="btn">
            </form>

        </div>

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
    <script src="script.js"></script>

    <script>
        lightGallery(document.querySelector('.gallery .gallery-container'));
    </script>

</body>
<?php 
include 'footer.php';
?>
</html>