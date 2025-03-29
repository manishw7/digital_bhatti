<?php
// Staff Members data
$staffs = [
    [
        'name' => 'Gordon Ramsay',
        'position' => 'CEO & Founder',
        'bio' => 'A Michelin-starred British chef known for his fiery personality and shows like Hell’s Kitchen and MasterChef.',
        'image' => '../uploads/gordon.jpg'
    ],
    [
        'name' => 'Santosh Shah',
        'position' => 'Head Chef',
        'bio' => 'A Nepalese chef who gained fame as a finalist on MasterChef: The Professionals UK, promoting Nepalese cuisine globally.',
        'image' => '../uploads/santosh.jpg'
    ],
    [
        'name' => 'Vikas Khanna',
        'position' => 'Sous Chef',
        'bio' => 'An Indian Michelin-starred chef, author, and humanitarian known for his New York restaurant Junoon and MasterChef India.',
        'image' => '../uploads/vikas.jpg'
    ],
    [
        'name' => 'Nick DiGiovanni',
        'position' => 'Customer Relations Manager',
        'bio' => 'An American chef, YouTuber, and MasterChef finalist known for his viral cooking videos and creative recipes.',
        'image' => '../uploads/nick.jpg'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Our Staff and History</title>
    <link rel="stylesheet" href="../css/about.css">
    <style>.navbar {
    background-color: #333;
    padding: 10px 0;
    color: white;
}

.navbar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.navbar-links {
    list-style: none;
    display: flex;
    gap: 20px;
}

.navbar-links li {
    display: inline;
}

.navbar-links a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
}

.navbar-links a:hover {
    color: #f39c12;
}</style>
</head>
<body>
<header>
        <nav class="navbar">
            <div class="navbar-container">
                <div class="logo">
                    <h1>Digital Bhatti</h1>
                </div>
                <ul class="navbar-links">
                    <li><a href="/digital_bhatti/home.php">Home</a></li>
                    <li><a href="/digital_bhatti/menu/menu.php">Menu</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="/digital_bhatti/auth/login.php">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <section id="about-us">
        <div class="about-container">
            <h2>About Us</h2>
            <p>Welcome to our restaurant, where passion for food meets exceptional service. We are proud to introduce our talented team who work tirelessly to create the finest dining experience for you. Below, you can learn more about the story of our restaurant and the amazing staff behind the scenes.</p>
            
            <!-- Our History -->
            <div class="history">
                <h3>Our History</h3>
                <p>Our journey began over a decade ago with a single mission: to provide delicious, high-quality dishes that bring people together. What started as a small family-owned restaurant has now grown into one of the best-loved establishments in the city. Over the years, we've worked hard to stay true to our roots, constantly innovating and offering an exceptional dining experience to our customers.</p>
            </div>

            <!-- Our Staff -->
            <div class="staff">
                <h3>Meet Our Staff</h3>
                <div class="staff-members">
                    <?php foreach ($staffs as $staff): ?>
                        <div class="staff-member">
                            <img src="<?php echo $staff['image']; ?>" alt="<?php echo $staff['name']; ?>" class="staff-image">
                            <h4><?php echo $staff['name']; ?></h4>
                            <p><strong><?php echo $staff['position']; ?></strong></p>
                            <p><?php echo $staff['bio']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php require '../partials/footer.php';?>