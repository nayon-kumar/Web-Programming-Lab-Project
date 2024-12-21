<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Spicy Restaurant</title>
</head>
<body>
    <div class="totalContainer">
        <div class="headerArea">
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo.png" alt="Logo">
                </a>
                <a href="index.php" id="spicy">Spicy</a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#home" id="hh">HOME</a></li>
                    <li><a href="#aboutUs" id="aa">ABOUT</a></li>
                    <li><a href="#gallery" id="gg">GALLERY</a></li>         
                    <li><a href="#contact" id="cc">CONTACT</a></li>
                    <li><a href="login.php">LOGIN</a></li>
                </ul>
            </div>
        </div>
        <div class="bannerArea" id="home">
            <h1 id="hd">We Serve Healthy</h1>
            <h1>Tasty Food</h1>
            <h3>Hot, Tasty and Spicy</h3>
            <a href="index.php"><img src="images/fork.png" alt=""></a>
        </div>
        


        <div class="food" id="gallery">
            <div class="foodHeader">
                <h1>Food Gallery</h1>
            </div>
            <div class="breakfast">
                <img src="images/breakfast.jpg" alt="Breakfast Food">
                <div class="wraper">
                    <h3>Breakfast</h3>
                    <p>6.00am - 10.00am</p>
                    <a href="#">Order Now</a>
                </div>
            </div>
            <div class="lunch">
                <img src="images/lunch.jpg" alt="Lunch Food">
                <div class="wraper">
                    <h3>Lunch</h3>
                    <p>1.00 pm - 4.00 pm</p>
                    <a href="#">Order Now</a>
                </div>
            </div>
            <div class="dinner">
                <img src="images/dinner.jpg" alt="Dinner Food">
                <div class="wraper">
                    <h3>Dinner</h3>
                    <p>8.00 pm - 11.00 pm</p>
                    <a href="#">Order Now</a>
                </div>
            </div>
        </div>
        <div class="dish">
            <div class="dishHead">
                <h1>Today’s Speical Dish</h1>
            </div>
            <div class="item1">
                <img src="images/dish-1.png" alt="Dish 1 Picture">
                <a href="#">Order Now</a>
            </div>
            <div class="item2">
                <img src="images/dish-2.png" alt="Dish 2 Picture">
                <a href="#">Order Now</a>
            </div>
            <div class="item3">
                <img src="images/dish-3.png" alt="Dish 3 Picture">
                <a href="#">Order Now</a>
            </div>
        </div>

        <div class="aboutUs" id="aboutUs">
            <h1>About Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni dolor, possimus omnis ea numquam deleniti, tempora debitis saepe commodi explicabo eum laudantium! Veniam blanditiis corrupti iusto nesciunt dolorem eligendi quia, quibusdam repellat repellendus nemo delectus velit ipsam fugiat maxime! Vero eius, accusamus incidunt unde error dolor expedita sint. Ea, provident! Quas illum harum ipsam fuga hic doloribus fugiat quasi reprehenderit. Facilis eum delectus quas ad vitae, laudantium magni eveniet assumenda minima necessitatibus illum praesentium error ducimus recusandae? Vel blanditiis esse harum, dolor in tenetur assumenda quam reiciendis sequi, quod at. Reiciendis cumque ut architecto ad iste ex eos ullam, animi ipsam. Cupiditate accusantium commodi dolore eum iure, minima ab vitae iste! Aut nostrum sed eaque voluptatum, necessitatibus velit facere magni incidunt reprehenderit quos suscipit odio natus. Quam est illo maxime fugiat accusamus neque cum facere esse dignissimos ab molestias sunt aliquam, fuga odit beatae quasi ducimus eius, voluptate sequi quaerat suscipit? Laboriosam numquam, fugit deleniti ex sapiente ab temporibus natus magni rerum cumque sequi commodi. Inventore cumque officiis, quaerat quas perspiciatis vitae ullam! Pariatur necessitatibus odio deleniti voluptatem laborum hic commodi mollitia vel magnam dolorem praesentium, laboriosam nam? Neque voluptatem alias nostrum, asperiores consectetur labore tenetur exercitationem. Minima, labore tempora!</p>
        </div>
        <div class="aboutImg">
            <img src="images/about_img.png" alt="About Us Image">
        </div>

        <div class="footer1">
            <div class="leftSide">

                <form method="POST" action="">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" required>

                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" required></textarea>

                    <input type="submit" value="Submit">
                    <?php if (!empty($error)): ?>
                        <p class="error"><?= $error ?></p>
                    <?php endif; ?>
                </form>

<?php
    $host = 'localhost';
    $dbname = 'spicy_restaurant';
    $username = 'root'; 
    $password = '';     
    $error = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $message = trim($_POST['message']);

            if (empty($name) || empty($email) || empty($phone) || empty($message)) {
                $error = "All fields are required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Please enter a valid email address.";
            } else {
                $sql = "INSERT INTO contacts (name, email, phone, message) VALUES (:name, :email, :phone, :message)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':name'    => htmlspecialchars($name),
                    ':email'   => htmlspecialchars($email),
                    ':phone'   => htmlspecialchars($phone),
                    ':message' => htmlspecialchars($message)
                ]);

                echo "<script>alert('Thank you for your message!');</script>";
            }
        }
    } catch (PDOException $e) {
        $error = "Database connection failed: " . $e->getMessage();
    }
?>

            </div>
            <div class="rightSide">
                <h3>Call for Book</h3>
                <p>01317328409</p>
                <p id="last">nayon1512628148@gmail.com</p>
                <h3>Location</h3>
                <p>Mirpur</p>
                <p>Dhaka, Bangladesh</p>
            </div>
        </div>
        <div class="footer2" id="contact">
            <div class="left">
                <p>Copyright © Spicy - 2024. All Rights Reserved By Sree Nayon Kumar Pal.</p>
            </div>
            <div class="right">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('cc').addEventListener('click', function(e) {
            e.preventDefault(); 
            document.querySelector('#contact').scrollIntoView({
                behavior: 'smooth'
            });
        });
        document.getElementById('aa').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('#aboutUs').scrollIntoView({
                behavior: 'smooth'
            });
        });
        document.getElementById('gg').addEventListener('click', function(e) {
            e.preventDefault(); 
            document.querySelector('#gallery').scrollIntoView({
                behavior: 'smooth'
            });
        });
        document.getElementById('hh').addEventListener('click', function(e) {
            e.preventDefault(); 
            document.querySelector('#home').scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>

</body>
</html>
