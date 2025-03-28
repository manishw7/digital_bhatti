<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../auth/login.php");
    exit;
}

include '../partials/dbconnect.php';

$user_id = $_SESSION['user_id'];

// Fetch orders with food names, order date, and status
$sql = "SELECT orders.quantity, orders.status, food_items.name, orders.order_date 
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
    <link rel="stylesheet" href="css/order_history.css"> <!-- Custom Stylesheet -->
</head>
<body>

<?php require '../partials/nav.php'; ?>

<div class="container mt-5">
    <h2>Your Orders</h2>

    <?php if (mysqli_num_rows($result) > 0) { ?>
        <div class="order-list">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="order-item card mb-4 p-3">
                    <h4><?php echo htmlspecialchars($row['name']); ?></h4>
                    <p><strong>Quantity:</strong> <?php echo htmlspecialchars($row['quantity']); ?></p>
                    <p><strong>Status:</strong> <span class="badge <?php echo getStatusClass($row['status']); ?>"><?php echo htmlspecialchars($row['status']); ?></span></p>
                    <p><strong>Ordered on:</strong> <?php echo date("d M Y, h:i A", strtotime($row['order_date'])); ?></p>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <p>No orders found. Start ordering now!</p>
    <?php } ?>
</div>

</body>
</html>

<?php
// Function to return a badge class based on the order status
function getStatusClass($status) {
    switch ($status) {
        case 'Pending':
            return 'badge-warning';
        case 'Delivered':
            return 'badge-success';
        case 'Canceled':
            return 'badge-danger';
        default:
            return 'badge-secondary';
    }
}
