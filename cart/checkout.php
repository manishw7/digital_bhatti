<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../auth/login.php");
    exit;
}

include '../partials/dbconnect.php'; // Include the database connection
require '../partials/nav.php';

// Check if cart is not empty and if delivery info is available
if (empty($_SESSION['cart']) || !isset($_SESSION['phone_number']) || !isset($_SESSION['delivery_address'])) {
    header("location: cart.php"); // Redirect to cart if no cart or delivery info
    exit;
}

// Prepare the SQL statement to insert the order
$sql = "INSERT INTO orders (user_id, food_id, quantity, phone_number, delivery_address, status) VALUES (?, ?, ?, ?, ?, ?)";

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);
if ($stmt === false) {
    die('MySQL prepare failed: ' . mysqli_error($conn));
}

$user_id = $_SESSION['user_id'];
$phone_number = $_SESSION['phone_number'];
$delivery_address = $_SESSION['delivery_address'];
$status = "Pending"; // Default status for the order

// Loop through the cart and insert each item into the orders table
foreach ($_SESSION['cart'] as $food_id => $quantity) {
    // Bind the parameters and execute the query
    mysqli_stmt_bind_param($stmt, "iiisss", $user_id, $food_id, $quantity, $phone_number, $delivery_address, $status);
    
    // Execute the prepared statement for each food item in the cart
    if (!mysqli_stmt_execute($stmt)) {
        echo 'Error inserting order: ' . mysqli_stmt_error($stmt);
        break;
    }
}

// Clear the cart after the order is placed
$_SESSION['cart'] = [];
$_SESSION['phone_number'] = '';
$_SESSION['delivery_address'] = '';

// Close the prepared statement
mysqli_stmt_close($stmt);

// Success message
echo "<div class='container mt-5 text-center'>";
echo "<h2>Order placed successfully!</h2>";
echo "<p>Your order is now being processed and will be delivered to your address shortly.</p>";
echo "<a href='../menu/menu.php' class='btn btn-primary btn-lg mt-4'>Order more food</a>";
echo "</div>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Bhatti - Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
</body>
</html>
