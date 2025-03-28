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
    <title>Menu</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <?php include '../partials/nav.php'; ?>
    
    <h2>Food Menu</h2>

    <!-- Reset Cart Button -->
    <form method="post" action="menu.php">
        <button type="submit" name="reset_cart">Reset Cart</button>
    </form>

    <!-- Add to Cart Form -->
    <form method="post" action="menu.php">
        <div class="menu">
            <?php foreach ($food_details as $food_id => $food) { ?>
                <div class="food-item">
                    <h3><?php echo htmlspecialchars($food['name']); ?></h3>
                    <p>Price: Rs. <?php echo number_format($food['price'], 2); ?></p>

                    <?php if (!empty($food['image_path'])) { ?>
                        <img src="../<?php echo htmlspecialchars($food['image_path']); ?>" alt="<?php echo htmlspecialchars($food['name']); ?>" style="width: 100px; height: 100px;">
                    <?php } else { ?>
                        <p>No image available</p>
                    <?php } ?>

                    <!-- Quantity Selector -->
                    <input type="number" name="quantity[<?php echo $food_id; ?>]" min="0" value="0">
                </div>
            <?php } ?>
        </div>

        <!-- Add to Cart Button (Redirects to cart.php) -->
        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>

</body>
</html>
