
<?php
session_start();
include '../partials/dbconnect.php';

// Ensure user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["user_id"])) {
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

// Handle order cancellation
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["order_id"])) {
    $order_id = (int)$_POST["order_id"];
    
    // Update status only if order is still Pending or Cooking
    $update_sql = "UPDATE orders SET status='Canceled' WHERE order_id=? AND user_id=? AND status IN ('Pending', 'Cooking')";
    $stmt = mysqli_prepare($conn, $update_sql);
    mysqli_stmt_bind_param($stmt, "ii", $order_id, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: order_status.php"); // Refresh page
    exit();
}

// Fetch user's order history
$sql = "SELECT orders.order_id, food_items.name, orders.quantity, orders.status 
        FROM orders 
        JOIN food_items ON orders.food_id = food_items.id
        WHERE orders.user_id = ?
        ORDER BY orders.order_id ASC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<?php require '../partials/nav.php'; ?>
    <h2>Your Order Status</h2>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>Food Item</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['order_id']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td>
                    <?php if ($row['status'] === 'Pending' || $row['status'] === 'Cooking') { ?>
                        <form method="post">
                            <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($row['order_id']); ?>">
                            <button type="submit">Cancel</button>
                        </form>
                    <?php } else { ?>
                        -
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
