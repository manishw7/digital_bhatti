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
    <!-- <header>
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
    </header> -->
    <?php require 'partials/nav.php'?>

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
                    <span class="price">Rs. 850</span>
                </div>
                <div class="menu-item">
                    <img src="uploads/burger.jpeg" alt="Burger">
                    <h3>Burger</h3>
                    <p>Juicy patty with fresh vegetables and sauce.</p>
                    <span class="price">Rs. 500</span>
                </div>
                <div class="menu-item">
                    <img src="uploads/momo.jpg" alt="Momo">
                    <h3>Momo</h3>
                    <p>A popular Nepali dumpling filled with meat or vegetables, served with spicy chutney</p>
                    <span class="price">Rs. 200</span>
                </div>
                <div class="menu-item">
                    <img src="uploads/fries.webp" alt="Fries">
                    <h3>Fries</h3>
                    <p>Crispy, golden potato, perfect as a snack or side dish.</p>
                    <span class="price">Rs. 300</span>
                </div>
                <div class="menu-item">
                    <img src="uploads/thakali_set.jpg" alt="Thakali">
                    <h3>Thakali Khana Set</h3>
                    <p>A traditional Nepali meal with rice, dal, meat, vegetables, pickles, and ghee for a wholesome experience.</p>
                    <span class="price">Rs. 700</span>
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
                <h3>10M+</h3>
                <p>Happy Customers</p>
            </div>
            <div class="fact-item">
                <h3>5M+</h3>
                <p>Dishes Served</p>
            </div>
            <div class="fact-item">
                <h3>1000+</h3>
                <p>Chef Specialties</p>
            </div>
            <div class="fact-item">
                <h3>1M+</h3>
                <p>5-Star Reviews</p>
            </div>
            <div class="fact-item">
                <h3>50+</h3>
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
                    <img src="uploads/gordon.jpg" alt="Gordon">
                    <h3>Gordon Ramsay</h3>
                    <p>A Michelin-starred British chef known for his fiery personality and shows like Hell’s Kitchen and MasterChef.</p>
                </div>
                <div class="chef-item">
                    <img src="uploads/vikas.jpg" alt="Vikas">
                    <h3>Vikas Khanna</h3>
                    <p>An Indian Michelin-starred chef, author, and humanitarian known for his New York restaurant Junoon and MasterChef India.</p>
                </div>
                <div class="chef-item">
                    <img src="uploads/santosh.jpg" alt="Santosh">
                    <h3>Santosh Shah</h3>
                    <p>A Nepalese chef who gained fame as a finalist on MasterChef: The Professionals UK, promoting Nepalese cuisine globally.</p>
                </div>
                <div class="chef-item">
                    <img src="uploads/sanjeev.jpeg" alt="Sanjeev">
                    <h3>Sanjeev Kapoor</h3>
                    <p>One of India’s most famous chefs, known for hosting Khana Khazana and revolutionizing home cooking in India.</p>
                </div>
                <div class="chef-item">
                    <img src="uploads/nick.jpg" alt="Nick">
                    <h3>Nick DiGiovanni</h3>
                    <p>An American chef, YouTuber, and MasterChef finalist known for his viral cooking videos and creative recipes.</p>
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
                <p class="review-text">"This app is so efficient that my food arrived before I even got hungry. Either they have time-traveling delivery guys or my neighbor is secretly a Digital Bhatti employee. 10/10 will order again—probably before I even finish this review."</p>
                <h3>- Manish Wagle</h3>
                <p class="review-location">Syangja,Nepal</p>
            </div>
            <div class="review-item">
                <p class="review-text">"The only thing faster than my online food order is my mom switching TV channels during ad breaks. The Thakali set arrived so fresh that I almost believed it was cooked in my own kitchen. If you haven’t ordered from here yet, are you even living?"</p>
                <h3>- Anusha Sharma</h3>
                <p class="review-location">Parbat, Nepal</p>
            </div>
            <div class="review-item">
                <p class="review-text">"Ordered fries, expected good food. Got fries so crispy that even my life decisions feel soft in comparison. The delivery guy arrived faster than my relatives when they hear free food. If this app had a 'marry' button, I’d click it instantly."</p>
                <h3>- Prazzwol Shrestha</h3>
                <p class="review-location">Bhaktapur, Nepal</p>
            </div>
            <div class="review-item">
                <p class="review-text">"I swear, ordering from this app is smoother than my attempts at flirting. The UI is cleaner than my room, and the food? Let’s just say I may or may not have proposed to the momo delivery guy. If this service doesn’t get a national award, I’m rioting."</p>
                <h3>- Nineyitika Shrestha</h3>
                <p class="review-location">Kritipur, Nepal</p>
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
