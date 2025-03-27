<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../auth/login.php");
    exit;
}

include '../partials/dbconnect.php';

$user_id = $_SESSION['user_id'];

// Fetch orders with food names and order date
$sql = "SELECT orders.quantity, food_items.name, orders.order_date 
        FROM orders 
        JOIN food_items ON orders.food_id = food_items.id 
        WHERE orders.user_id = '$user_id'
        ORDER BY orders.order_date DESC"; // Latest orders first

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Bhatti - Order History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<?php require '../partials/nav.php'; ?>
<h2>Your Orders</h2>
<ul>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <li>
            You ordered: <strong><?php echo $row['name']; ?></strong><br>
            Quantity: <?php echo $row['quantity']; ?><br>
            Ordered on: <?php echo date("d M Y, h:i A", strtotime($row['order_date'])); ?>
        </li>
    <?php } ?>
</ul>
