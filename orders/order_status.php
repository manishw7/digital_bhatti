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
    $order_id = (int) $_POST["order_id"];

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
$sql = "SELECT orders.order_id, food_items.name, orders.quantity, orders.status, orders.order_date
        FROM orders 
        JOIN food_items ON orders.food_id = food_items.id
        WHERE orders.user_id = ?
        ORDER BY orders.order_date DESC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - Digital Bhatti</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF6B35',
                        secondary: '#2E294E',
                        accent: '#1B998B',
                        light: '#F7F7F2',
                        dark: '#252422'
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>

<body>
    <?php include '../partials/nav.php'; ?>
    <div class="font-sans bg-gray-100 min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-secondary text-white p-6">
                    <h1 class="text-2xl font-bold">Your Order History</h1>
                    <p class="text-sm mt-1 text-gray-200">Track the status of your orders</p>
                </div>

                <div class="p-6">
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                            Order ID</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                            Food Item</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                            Quantity</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                            Status</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                            Order Date</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">
                                                    #<?php echo htmlspecialchars($row['order_id']); ?></div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900"><?php echo htmlspecialchars($row['name']); ?>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    <?php echo htmlspecialchars($row['quantity']); ?>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <?php
                                                $statusClass = '';
                                                switch ($row['status']) {
                                                    case 'Pending':
                                                        $statusClass = 'bg-yellow-100 text-yellow-800';
                                                        break;
                                                    case 'Cooking':
                                                        $statusClass = 'bg-blue-100 text-blue-800';
                                                        break;
                                                    case 'Delivered':
                                                        $statusClass = 'bg-green-100 text-green-800';
                                                        break;
                                                    case 'Canceled':
                                                        $statusClass = 'bg-red-100 text-red-800';
                                                        break;
                                                }
                                                ?>
                                                <span
                                                    class="px-4 py-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo $statusClass; ?>">
                                                    <?php echo htmlspecialchars($row['status']); ?>
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-800">
                                                    <?php echo date("d M Y, h:i A", strtotime($row['order_date'])); ?>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <?php if ($row['status'] === 'Pending' || $row['status'] === 'Cooking'): ?>
                                                    <form method="post"
                                                        onsubmit="return confirm('Are you sure you want to cancel this order?');">
                                                        <input type="hidden" name="order_id"
                                                            value="<?php echo htmlspecialchars($row['order_id']); ?>">
                                                        <button type="submit"
                                                            class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-4 py-2.5 transition-colors">
                                                            Cancel
                                                        </button>
                                                    </form>
                                                <?php else: ?>
                                                    <span class="text-gray-700">-</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No orders found</h3>
                            <p class="mt-1 text-sm text-gray-500">You haven't placed any orders yet.</p>
                            <div class="mt-6">
                                <a href="../menu.php"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                    Browse Menu
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
    <?php include '../partials/footer.php'; ?>
</body>

</html>