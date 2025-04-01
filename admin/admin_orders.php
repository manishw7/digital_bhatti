<?php
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <style>/* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    height: 100%;
}

/* Body Layout */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* Main Content Wrapper */
.main-content {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

/* Container */
.main-container {
    background: white;
    padding: 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-align: center;
    width: 350px;
}

/* Footer */
.admin-footer {
    background-color: #222;
    color: #ccc;
    text-align: center;
    padding: 15px 0;
    font-size: 14px;
    width: 100%;
}
</style>
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
<?php require 'admin_footer.php';?>