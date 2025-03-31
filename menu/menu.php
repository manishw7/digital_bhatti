<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../auth/login.php");
    exit;
}

include '../partials/dbconnect.php';

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add selected items to cart and redirect to cart.php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    foreach ($_POST['quantity'] as $food_id => $quantity) {
        if ($quantity > 0) {
            $_SESSION['cart'][$food_id] = $quantity;
        }
    }
    header("Location: ../cart/cart.php"); // Redirect to cart.php
    exit;
}

// Reset the cart
if (isset($_POST['reset_cart'])) {
    $_SESSION['cart'] = [];
}

// Fetch food details from the database
$food_details = [];
$sql = "SELECT id, name, price, image_path FROM food_items";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $food_details[$row['id']] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <?php include '../partials/nav.php'; ?>
    
    <div class="container">
        <h2 class="text-center mt-5">Food Menu</h2>

        <!-- Reset Cart Button -->
        <div class="text-center mt-4">
            <form method="post" action="menu.php">
                <button type="submit" name="reset_cart" class="btn btn-danger btn-sm">Reset Cart</button>
            </form>
        </div>

        <!-- Add to Cart Form -->
        <form method="post" action="menu.php" class="mt-4">
            <div class="row menu">
                <?php foreach ($food_details as $food_id => $food) { ?>
                    <div class="col-md-4 food-item">
                        <div class="card shadow-sm">
                            <img src="../<?php echo htmlspecialchars($food['image_path']); ?>" alt="<?php echo htmlspecialchars($food['name']); ?>" class="card-img-top food-image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($food['name']); ?></h5>
                                <p class="card-text">Price: Rs. <?php echo number_format($food['price'], 2); ?></p>
                                
                                <!-- Quantity Selector -->
                                <input type="number" name="quantity[<?php echo $food_id; ?>]" class="form-control" min="0" value="0">
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Add to Cart Button -->
            <div class="text-center mt-4">
                <button type="submit" name="add_to_cart" class="btn btn-primary btn-lg">Add to Cart</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php require '../partials/footer.php';?>