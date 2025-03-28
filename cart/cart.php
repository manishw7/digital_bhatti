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
    <title>Your Cart</title>
</head>
<body>

<?php require '../partials/nav.php'; ?>
    <h2>Your Cart</h2>
    
    <?php if (empty($_SESSION['cart'])) { ?>
        <p>Your cart is empty.</p>
    <?php } else { ?>
        <form action="checkout.php" method="post">
            <?php foreach ($_SESSION['cart'] as $food_id => $quantity) {
                $food = $food_details[$food_id];
            ?>
                <p>
                    <strong><?php echo $food['name']; ?></strong><br>
                    Price: Rs. <?php echo $food['price']; ?><br>
                    Quantity: <?php echo $quantity; ?><br>
                    Total: Rs. <?php echo $food['price'] * $quantity; ?>
                </p>
            <?php } ?>
            <button type="submit" name="checkout" value="1">Proceed to Checkout</button>
        </form>
    <?php } ?>
    
    <?php if (empty($_SESSION['cart'])) { ?>
        <a href="../menu/menu.php"><button> Order from here</button></a>
    <?php } ?>

    <!-- Button to show update cart form -->
    <form action="cart.php" method="POST">
        <button name="update" value="yes">Want to update cart?</button>
    </form>

    <!-- Show update cart form when button is clicked -->
    <?php if (isset($_POST['update'])) { ?>
        <form method="post" action="cart.php">
            <?php foreach ($_SESSION['cart'] as $food_id => $quantity) { ?>
                <p>
                    <strong><?php echo $food_details[$food_id]['name']; ?></strong><br>
                    Price: Rs. <?php echo $food_details[$food_id]['price']; ?><br>
                    Quantity: <input type="number" name="quantity[<?php echo $food_id; ?>]" value="<?php echo $quantity; ?>" min="1"><br>
                    Total: Rs. <?php echo $food_details[$food_id]['price'] * $quantity; ?>
                </p>
            <?php } ?>
            <button type="submit" name="update_cart">Update Cart</button>
        </form>
    <?php } ?>

</body>
</html>
