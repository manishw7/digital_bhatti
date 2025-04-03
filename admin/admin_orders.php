<?php
session_start();
include '../partials/dbconnect.php';

// Ensure only admin can access
if (!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true) {
    header("Location: admin_login.php"); // Redirect to login page
    exit;
}

$success_message = '';
$error_message = '';

// Check for messages in session (from redirects)
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']); // Clear the message
}

if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']); // Clear the message
}

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id']) && isset($_POST['status'])) {
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    $new_status = mysqli_real_escape_string($conn, $_POST['status']);

    // Validate status
    $valid_statuses = ['Pending', 'Cooking', 'Delivered', 'Canceled'];
    if (in_array($new_status, $valid_statuses)) {
        $update_sql = "UPDATE orders SET status=? WHERE order_id=?";
        $stmt = mysqli_prepare($conn, $update_sql);
        mysqli_stmt_bind_param($stmt, "si", $new_status, $order_id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_message'] = "Order #$order_id status updated to $new_status";
        } else {
            $_SESSION['error_message'] = "Error updating order: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['error_message'] = "Invalid status provided";
    }

    // Redirect to the same page to prevent form resubmission on refresh
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Fetch all orders
$sql = "SELECT orders.order_id, users.username, food_items.name, orders.quantity, orders.status, 
        orders.phone_number, orders.delivery_address, orders.order_date
        FROM orders 
        JOIN users ON orders.user_id = users.id
        JOIN food_items ON orders.food_id = food_items.id
        ORDER BY orders.order_id DESC";

$result = mysqli_query($conn, $sql);
$orders = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $orders[] = $row;
    }
}

// Count orders by status
$pending_count = 0;
$cooking_count = 0;
$delivered_count = 0;
$canceled_count = 0;

foreach ($orders as $order) {
    switch ($order['status']) {
        case 'Pending':
            $pending_count++;
            break;
        case 'Cooking':
            $cooking_count++;
            break;
        case 'Delivered':
            $delivered_count++;
            break;
        case 'Canceled':
            $canceled_count++;
            break;
    }
}

$total_orders = count($orders);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Orders - Digital Bhatti Admin</title>
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
    <style>
        .form-select:focus {
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.3);
        }

        /* Status badge colors */
        .status-pending {
            background-color: #FEF3C7;
            color: #92400E;
        }

        .status-cooking {
            background-color: #DBEAFE;
            color: #1E40AF;
        }

        .status-delivered {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .status-canceled {
            background-color: #FEE2E2;
            color: #B91C1C;
        }
    </style>
</head>

<body>
    <div class="font-sans bg-gray-100 text-dark pb-52">
        <?php include '../admin/admin_nav.php'; ?>
        <!-- Main Content -->
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-2xl font-bold mb-6">Order Management</h2>

            <?php if ($success_message): ?>
                <div id="successAlert"
                    class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline"><?php echo $success_message; ?></span>
                </div>
            <?php endif; ?>

            <?php if ($error_message): ?>
                <div id="errorAlert" class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline"><?php echo $error_message; ?></span>
                </div>
            <?php endif; ?>

            <!-- Order Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
                <div class="bg-white rounded-xl shadow-md p-4">
                    <div class="flex flex-col items-center">
                        <div class="text-gray-500 text-sm">Total Orders</div>
                        <div class="text-2xl font-bold"><?php echo $total_orders; ?></div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-4">
                    <div class="flex flex-col items-center">
                        <div class="text-gray-500 text-sm">Pending</div>
                        <div class="text-2xl font-bold text-yellow-600"><?php echo $pending_count; ?></div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-4">
                    <div class="flex flex-col items-center">
                        <div class="text-gray-500 text-sm">Cooking</div>
                        <div class="text-2xl font-bold text-blue-600"><?php echo $cooking_count; ?></div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-4">
                    <div class="flex flex-col items-center">
                        <div class="text-gray-500 text-sm">Delivered</div>
                        <div class="text-2xl font-bold text-green-600"><?php echo $delivered_count; ?></div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-4">
                    <div class="flex flex-col items-center">
                        <div class="text-gray-500 text-sm">Canceled</div>
                        <div class="text-2xl font-bold text-red-600"><?php echo $canceled_count; ?></div>
                    </div>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6 bg-secondary text-white">
                    <h3 class="text-xl font-bold">All Orders</h3>
                </div>

                <?php if (empty($orders)): ?>
                    <div class="p-6 text-center">
                        <p class="text-gray-500">No orders found.</p>
                    </div>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Order ID</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Customer</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Food Item</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Quantity</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Phone</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Address</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($orders as $order): ?>
                                    <tr id="order-row-<?php echo $order['order_id']; ?>">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">#<?php echo $order['order_id']; ?>
                                                <span class="text-xs text-gray-500"><?php
                                                echo isset($order['order_date']) ? date('M d, Y H:i', strtotime($order['order_date'])) : 'N/A';
                                                ?></span>
                                            </div>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                <?php echo htmlspecialchars($order['username']); ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"><?php echo htmlspecialchars($order['name']); ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"><?php echo $order['quantity']; ?></div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                <?php echo htmlspecialchars($order['phone_number']); ?>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="text-xs text-gray-900">
                                                <?php echo htmlspecialchars($order['delivery_address']); ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php
                                            $statusClass = '';
                                            switch ($order['status']) {
                                                case 'Pending':
                                                    $statusClass = 'status-pending';
                                                    break;
                                                case 'Cooking':
                                                    $statusClass = 'status-cooking';
                                                    break;
                                                case 'Delivered':
                                                    $statusClass = 'status-delivered';
                                                    break;
                                                case 'Canceled':
                                                    $statusClass = 'status-canceled';
                                                    break;
                                            }
                                            ?>
                                            <span id="status-badge-<?php echo $order['order_id']; ?>"
                                                class="px-4 py-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo $statusClass; ?>">
                                                <?php echo $order['status']; ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                                                class="status-form">
                                                <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                                <div class="flex items-center space-x-4">
                                                    <select name="status"
                                                        class="form-select px-4 py-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                                        <option value="Pending" <?php if ($order['status'] == 'Pending')
                                                            echo 'selected'; ?>>Pending</option>
                                                        <option value="Cooking" <?php if ($order['status'] == 'Cooking')
                                                            echo 'selected'; ?>>Cooking</option>
                                                        <option value="Delivered" <?php if ($order['status'] == 'Delivered')
                                                            echo 'selected'; ?>>Delivered</option>
                                                        <option value="Canceled" <?php if ($order['status'] == 'Canceled')
                                                            echo 'selected'; ?>>Canceled</option>
                                                    </select>
                                                    <button type="submit"
                                                        class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                                        Update
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        // Auto-hide success message after 3 seconds
        document.addEventListener('DOMContentLoaded', function () {
            const successAlert = document.getElementById('successAlert');
            if (successAlert) {
                setTimeout(function () {
                    successAlert.style.opacity = '0';
                    successAlert.style.transition = 'opacity 0.5s';
                    setTimeout(function () {
                        successAlert.style.display = 'none';
                    }, 500);
                }, 3000);
            }

            // Optional: AJAX form submission for a smoother experience
            /*
            const forms = document.querySelectorAll('.status-form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    const orderId = formData.get('order_id');
                    const newStatus = formData.get('status');
                    
                    fetch(this.action, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update UI without page refresh
                            const statusBadge = document.getElementById(`status-badge-${orderId}`);
                            
                            // Remove old status class
                            statusBadge.classList.remove('status-pending', 'status-cooking', 'status-delivered', 'status-canceled');
                            
                            // Add new status class
                            statusBadge.classList.add(`status-${newStatus.toLowerCase()}`);
                            
                            // Update text
                            statusBadge.textContent = newStatus;
                            
                            // Show success message
                            // ...
                        }
                    });
                });
            });
            */
        });
    </script>
    <?php include '../admin/admin_footer.php'; ?>
</body>

</html>