<?php 
session_start(); // Ensure session is started
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin = true;
} else {
  $loggedin = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Bhatti</title>
    <style>
        /* Navbar Styles */
        .navbar {
            background-color: #333;
            padding: 10px 0;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%; /* Full width navbar */
            z-index: 1000; /* Keep navbar on top */
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        .logo {
            display: flex;
            align-items: center;
            flex-grow: 1; /* Ensures logo pushes links to the right */
        }

        .logo h1 {
            margin: 0;
            font-size: 24px;
            color: white;
        }

        .navbar-links {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        .navbar-links li {
            display: inline;
        }

        .navbar-links a {
            color: white;
            text-decoration: none;
            font-size: 18px; /* Larger font size */
            font-weight: bold;
        }

        .navbar-links a:hover {
            color: #f39c12;
        }

        body {
            padding-top: 60px; /* Adjust for fixed navbar */
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="logo">
                <h1>Digital Bhatti</h1>
            </div>
            <ul class="navbar-links">
                <li><a href="/digital_bhatti/about/about.php">About</a></li>
                <li><a href="/digital_bhatti/about/contact.php">Contact</a></li>

                <?php
                if(!$loggedin) {
                    // Show login, signup, and admin login links if not logged in
                    echo '<li><a href="/digital_bhatti/index.php">Welcome</a></li>';
                    echo '<li><a href="/digital_bhatti/auth/login.php">Login</a></li>';
                    echo '<li><a href="/digital_bhatti/auth/signup.php">Signup</a></li>';
                    echo '<li><a href="/digital_bhatti/admin/admin_login.php">Admin Login</a></li>';
                } else {
                    // Show logout, cart, and current orders if logged in
                    echo '<li><a href="/digital_bhatti/home.php">Home</a></li>';
                    echo'<li><a href="/digital_bhatti/menu/menu.php">Menu</a></li>';
                    echo '<li><a href="/digital_bhatti/auth/logout.php">Logout</a></li>';
                    echo '<li><a href="/digital_bhatti/cart/cart.php">Cart</a></li>';
                    echo '<li><a href="/digital_bhatti/orders/order_status.php">Current Orders</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</header>

</body>
</html>
