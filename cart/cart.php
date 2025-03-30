<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../auth/login.php");
    exit;
}

include '../partials/dbconnect.php'; // Include the database connection

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item to cart if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $food_id => $quantity) {
        $_SESSION['cart'][$food_id] = $quantity;
    }
    header("Location: cart.php"); // Refresh the page to reflect changes
    exit;
}

// Store phone number and delivery address if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    $_SESSION['phone_number'] = $_POST['phone_number'];
    $_SESSION['delivery_address'] = $_POST['delivery_address'];
    header("Location: checkout.php"); // Redirect to checkout after storing delivery info
    exit;
}

// Fetch food details from the database
$food_details = [];
if (!empty($_SESSION['cart'])) {
    $food_ids = implode(",", array_keys($_SESSION['cart']));
    $sql = "SELECT id, name, price FROM food_items WHERE id IN ($food_ids)";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $food_details[$row['id']] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Bhatti - Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>

<?php require '../partials/nav.php'; ?>

<div class="container mt-5">
    <h2>Your Cart</h2>

    <?php if (empty($_SESSION['cart'])) { ?>
        <p>Your cart is empty. <a href="../menu/menu.php">Order from here</a></p>
    <?php } else { ?>
        <form action="cart.php" method="post">
            <div class="cart-items">
                <?php foreach ($_SESSION['cart'] as $food_id => $quantity) {
                    $food = $food_details[$food_id];
                ?>
                    <div class="cart-item">
                        <h4><?php echo htmlspecialchars($food['name']); ?></h4>
                        <p>Price: Rs. <?php echo number_format($food['price'], 2); ?></p>
                        <p>Quantity: 
                            <input type="number" name="quantity[<?php echo $food_id; ?>]" value="<?php echo $quantity; ?>" min="1" class="form-control w-auto">
                        </p>
                        <p><strong>Total: Rs. <?php echo number_format($food['price'] * $quantity, 2); ?></strong></p>
                    </div>
                <?php } ?>
            </div>

            <button type="submit" name="update_cart" class="btn btn-secondary mt-3">Update Cart</button>
                </form>
</div>  
            <hr>
            <div class="container mt-5">
            <form action="cart.php" method="post">
            <h4>Delivery Information</h4>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" 
                    value="<?php echo isset($_SESSION['phone_number']) ? $_SESSION['phone_number'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="delivery_address">Delivery Address</label>
                <textarea class="form-control" id="delivery_address" name="delivery_address" rows="3" required><?php echo isset($_SESSION['delivery_address']) ? $_SESSION['delivery_address'] : ''; ?></textarea>
            </div>

            <button type="submit" name="checkout" value="1" class="btn btn-primary">Proceed to Checkout</button>
        </form>
    <?php } ?>
</div>

</body>
</html>
<?php require '../partials/footer.php';?>
