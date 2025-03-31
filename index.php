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
                    <span class="price">Rs. 650</span>
                </div>
                <div class="menu-item">
                    <img src="uploads/burger.jpeg" alt="Burger">
                    <h3>Burger</h3>
                    <p>Juicy patty with fresh vegetables and sauce.</p>
                    <span class="price">Rs. 700</span>
                </div>
                <div class="menu-item">
                    <img src="uploads/corndog.jpeg" alt="Corn Dog">
                    <h3>Corn Dog</h3>
                    <p>Cheesy Corndog with wagyu sausage.</p>
                    <span class="price">Rs. 400</span>
                </div>
                <div class="menu-item">
                    <img src="uploads/potato.jpeg" alt="Potato">
                    <h3>Potato</h3>
                    <p>Cheesy Corndog with wagyu sausage.</p>
                    <span class="price">Rs. 300</span>
                </div>
                <div class="menu-item">
                    <img src="uploads/sausage.jpeg" alt="Sausage">
                    <h3>Sausage</h3>
                    <p>Cheesy Corndog with wagyu sausage.</p>
                    <span class="price">Rs. 70</span>
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
                <p class="review-text">"The momos here are so juicy that I thought I reached Nirvana with the first bite. I ordered a plate of chicken momos, and by the time I finished, I was emotionally attached to them. Staff so friendly, I think they might be my long-lost cousins. Highly recommended—will sell my friend’s kidney to eat here again."</p>
                <h3>- Manish Wagle</h3>
                <p class="review-location">Syangja,Nepal</p>
            </div>
            <div class="review-item">
                <p class="review-text">"From the moment I entered, I felt like I had walked into my mama ghar. The service? Faster than Nepali aunties spreading news. The food? Better than my own mom’s cooking (but don’t tell her). I ordered one plate of choila, and my soul demanded another. If Digital Bhatti doesn’t win an award soon, I’m calling the police."</p>
                <h3>- Anusha Sharma</h3>
                <p class="review-location">Parbat, Nepal</p>
            </div>
            <div class="review-item">
                <p class="review-text">"I came here as a simple man, but after tasting the buff sukuti, I feel like I should be writing poetry about it. Spices hit my soul like an earthquake, and the chatni? Spicier than my neighbor’s gossip. If I could legally marry food, Digital Bhatti’s sukuti would be my bride."</p>
                <h3>- Prazzwol Shrestha</h3>
                <p class="review-location">Bhaktapur, Nepal</p>
            </div>
            <div class="review-item">
                <p class="review-text">"Ordered the Thakali set and almost cried. The dal was smoother than my love life, the gundruk made me emotional, and the masu? Cooked so perfectly, even my grandma gave a nod of approval. Felt like I was sitting in a village home but with WiFi. If you haven’t eaten here yet, are you even Nepali?"</p>
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
