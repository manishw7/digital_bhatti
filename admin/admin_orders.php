<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include '../partials/dbconnect.php';

// Ensure only admin can access
if (!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true) {
    header("Location: admin_login.php"); // Redirect to login page
    exit;
}

// Fetch all orders
$sql = "SELECT orders.order_id, users.username, food_items.name, orders.quantity, orders.status, orders.phone_number, orders.delivery_address
        FROM orders 
        JOIN users ON orders.user_id = users.id
        JOIN food_items ON orders.food_id = food_items.id
        ORDER BY orders.order_id ASC";

$result = mysqli_query($conn, $sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['status'];
    mysqli_query($conn, "UPDATE orders SET status='$new_status' WHERE order_id='$order_id'");
    header("Refresh:0"); // Refresh page after update
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Orders</title>
    <link rel="stylesheet" href='css/admin_orders.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<?php require '../admin/admin_nav.php'; ?>
    <h2>Order Management</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Food Item</th>
                <th>Quantity</th>
                <th>Phone Number</th>
                <th>Delivery Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['delivery_address']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                            <select name="status" class="form-control">
                                <option value="Pending" <?php if ($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                <option value="Cooking" <?php if ($row['status'] == 'Cooking') echo 'selected'; ?>>Cooking</option>
                                <option value="Delivered" <?php if ($row['status'] == 'Delivered') echo 'selected'; ?>>Delivered</option>
                                <option value="Canceled" <?php if ($row['status'] == 'Canceled') echo 'selected'; ?>>Canceled</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
