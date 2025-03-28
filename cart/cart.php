<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../auth/login.php");
    exit;
}

include '../partials/dbconnect.php'; // Include the database connection

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item to cart if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $food_id = $_POST['food_id'];
    $quantity = $_POST['quantity'];

    // Add or update the item in the cart (update quantity if already exists)
    if (isset($_SESSION['cart'][$food_id])) {
        $_SESSION['cart'][$food_id] += $quantity;  // If the item exists, increase the quantity
    } else {
        $_SESSION['cart'][$food_id] = $quantity;  // If the item doesn't exist, add it to the cart
    }
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
</body>
</html>
