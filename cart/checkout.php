<?php
session_start();
include '../partials/dbconnect.php'; // Connect to database
require '../partials/nav.php';

// Check if the user is logged in, else redirect
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || !isset($_SESSION['user_id'])) {
    echo "Please log in to place an order.";
    header("Location: ../auth/login.php"); // Redirect to the login page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];

    // Prepare the SQL statement to insert the order
    $stmt = mysqli_prepare($conn, "INSERT INTO orders (user_id, food_id, quantity, status) VALUES (?, ?, ?, ?)");

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die('MySQL prepare failed: ' . mysqli_error($conn));
    }

    $status = "Pending"; // Default status when order is placed

    // Loop through the cart and insert each item
    foreach ($_SESSION['cart'] as $food_id => $quantity) {
        // Bind parameters inside the loop
        mysqli_stmt_bind_param($stmt, "iiis", $user_id, $food_id, $quantity, $status);
        
        // Execute the prepared statement for each food item in the cart
        if (!mysqli_stmt_execute($stmt)) {
            echo 'Error inserting order: ' . mysqli_stmt_error($stmt);
            break;
        }
    }

    // Clear the cart after the order is placed
    $_SESSION['cart'] = [];

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    echo "Order placed successfully! Thank you for your order.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Bhatti - Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<a href="../orders/order_status.php"> Check order status</a>
