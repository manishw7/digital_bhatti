<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Bhatti - Home</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

    <?php require 'partials/nav.php'; ?>

    <div class="container">
        <div class="welcome text-center">
            <h1>Welcome to Digital Bhatti</h1>
            <p>Your favorite online food ordering system.</p>
            <a href="menu/menu.php" class="btn btn-primary btn-lg">Browse Menu</a>
            <a href="/digital_bhatti/orders/order_history.php" class="btn btn-secondary btn-lg">View Order History</a>
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card shadow">
                    <img src="uploads/download.jpeg" class="card-img-top" alt="Food Image">
                    <div class="card-body">
                        <h5 class="card-title">Delicious Meals</h5>
                        <p class="card-text">Order freshly made meals delivered to your doorstep.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <img src="uploads/delivery.jpg" class="card-img-top" alt="Delivery Image">
                    <div class="card-body">
                        <h5 class="card-title">Fast Delivery</h5>
                        <p class="card-text">Get your food delivered quickly and hot.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <img src="uploads/chef.jpg" class="card-img-top" alt="Chef Image">
                    <div class="card-body">
                        <h5 class="card-title">Top Chefs</h5>
                        <p class="card-text">Our meals are prepared by professional chefs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-5">
        <p>© 2025 Digital Bhatti. All Rights Reserved.</p>
    </footer>

</body>
</html>
