<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="css/chef.css">
    <link rel="stylesheet" href="css/facts.css">
    <link rel="stylesheet" href="css/reviews.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/menu_index.css">
</head>
<body>
    <!-- Navbar Section -->
    <header>
        <nav class="navbar">
            <div class="navbar-container">
                <div class="logo">
                    <h1>Digital Bhatti</h1>
                </div>
                <ul class="navbar-links">
                    <li><a href="/digital_bhatti/home.php">Home</a></li>
                    <li><a href="menu/menu.php">Menu</a></li>
                    <li><a href="about/about.php">About</a></li>
                    <li><a href="about/contact.php">Contact</a></li>
                    <li><a href="auth/login.php">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Delicious Food, Delivered to Your Door</h2>
            <p>Explore a variety of mouth-watering dishes and order your favorite meals online!</p>
            <a href="/digital_bhatti/auth/login.php" class="btn">Order Now</a>
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="menu">
    <div class="menu-container">
        <h2>Our Menu</h2>
        <div class="menu-slider">
            <div class="menu-items">
                <div class="menu-item">
                    <img src="uploads/pizza.jpeg" alt="Pizza">
                    <h3>Pizza</h3>
                    <p>Cheese, tomatoes, and a variety of toppings.</p>
                    <span class="price">$10.99</span>
                </div>
                <div class="menu-item">
                    <img src="uploads/burger.jpeg" alt="Burger">
                    <h3>Burger</h3>
                    <p>Juicy patty with fresh vegetables and sauce.</p>
                    <span class="price">$5.99</span>
                </div>
                <div class="menu-item">
                    <img src="uploads/corndog.jpeg" alt="Corn Dog">
                    <h3>Corn Dog</h3>
                    <p>Cheesy Corndog with wagyu sausage.</p>
                    <span class="price">$8.99</span>
                </div>
                <div class="menu-item">
                    <img src="uploads/potato.jpeg" alt="Potato">
                    <h3>Potato</h3>
                    <p>Cheesy Corndog with wagyu sausage.</p>
                    <span class="price">$8.99</span>
                </div>
                <div class="menu-item">
                    <img src="uploads/sausage.jpeg" alt="Sausage">
                    <h3>Sausage</h3>
                    <p>Cheesy Corndog with wagyu sausage.</p>
                    <span class="price">$8.99</span>
                </div>
            </div>
        </div>
    </div>
</section>
 
    <!-- Facts Section -->
<section id="facts" class="facts">
    <div class="facts-container">
        <h2>Our Impact in Numbers</h2>
        <div class="fact-items">
            <div class="fact-item">
                <h3>1000+</h3>
                <p>Happy Customers</p>
            </div>
            <div class="fact-item">
                <h3>5000+</h3>
                <p>Dishes Served</p>
            </div>
            <div class="fact-item">
                <h3>50+</h3>
                <p>Chef Specialties</p>
            </div>
            <div class="fact-item">
                <h3>300+</h3>
                <p>5-Star Reviews</p>
            </div>
            <div class="fact-item">
                <h3>10+</h3>
                <p>Years of Expertise</p>
            </div>
        </div>
    </div>
</section>

    <!-- Chef section -->
    <section id="chefs" class="chefs">
    <div class="chefs-container">
        <h2>Meet Our Chefs</h2>
        <div class="chefs-slider">
            <div class="chefs-items">
                <div class="chef-item">
                    <img src="uploads/chef1.jpg" alt="Chef 1">
                    <h3>Chef John Doe</h3>
                    <p>Expert in Italian cuisine with over 15 years of experience.</p>
                </div>
                <div class="chef-item">
                    <img src="uploads/chef2.jpg" alt="Chef 2">
                    <h3>Chef Jane Smith</h3>
                    <p>Specializes in modern Asian fusion and innovative dishes.</p>
                </div>
                <div class="chef-item">
                    <img src="uploads/chef3.jpg" alt="Chef 3">
                    <h3>Chef Michael Lee</h3>
                    <p>Passionate about French cuisine and classic culinary techniques.</p>
                </div>
                <div class="chef-item">
                    <img src="uploads/chef4.jpg" alt="Chef 4">
                    <h3>Chef Sarah Williams</h3>
                    <p>Renowned for her expertise in vegan and plant-based cooking.</p>
                </div>
                <div class="chef-item">
                    <img src="uploads/chef5.jpg" alt="Chef 5">
                    <h3>Chef David Green</h3>
                    <p>Known for his creativity in crafting unique desserts.</p>
                </div>
            </div>
        </div>
    </div>  
</section>

 <!-- Customer review section -->
 <section id="reviews" class="reviews">
    <div class="reviews-container">
        <h2>What Our Happy Customers Say</h2>
        <div class="reviews-slider">
            <div class="review-item">
                <p class="review-text">"The food was absolutely delicious! I’ve never had such amazing pizza before. Will definitely order again!"</p>
                <h3>- John Doe</h3>
                <p class="review-location">New York, USA</p>
            </div>
            <div class="review-item">
                <p class="review-text">"A great experience! The delivery was fast, and the food was still hot when it arrived. 5 stars!"</p>
                <h3>- Emily Smith</h3>
                <p class="review-location">Los Angeles, USA</p>
            </div>
            <div class="review-item">
                <p class="review-text">"Amazing variety and quality. I loved the vegan options, and the chefs are top-notch!"</p>
                <h3>- Michael Brown</h3>
                <p class="review-location">London, UK</p>
            </div>
            <div class="review-item">
                <p class="review-text">"Hands down the best food I’ve had in ages! The corndog was out of this world!"</p>
                <h3>- Sarah Williams</h3>
                <p class="review-location">Toronto, Canada</p>
            </div>
        </div>
        <div class="review-nav">
            <button class="prev-btn">&#10094;</button>
            <button class="next-btn">&#10095;</button>
        </div>
    </div>
</section>


<script src="js/chef.js"></script>
<script src="js/menu_index.js"></script>
<script src="js/reviews.js"></script>

    <!-- Footer Section -->
    <?php require 'partials/footer.php';?>
</body>
</html>
