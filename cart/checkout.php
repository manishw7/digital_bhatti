<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../auth/login.php");
    exit;
}

include '../partials/dbconnect.php'; // Include the database connection

// Check if cart is not empty and if delivery info is available
// if (empty($_SESSION['cart']) || !isset($_SESSION['phone_number']) || !isset($_SESSION['delivery_address'])) {
//     header("location: cart.php"); // Redirect to cart if no cart or delivery info
//     exit;
// }

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

// Set order success variables
$orderSuccess = true;
$orderReference = time();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Bhatti - Order Confirmed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ff6b35',
                        secondary: '#2b2d42',
                        success: '#2ecc71',
                        accent: '#8d99ae',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 font-sans min-h-screen">
    <?php include "../partials/nav.php"; ?>
    <?php if (isset($orderSuccess) && $orderSuccess): ?>
        <div class="max-w-2xl mx-auto px-4 py-8">
            <div class="bg-white rounded-2xl shadow-lg p-8 transition-transform duration-300 hover:-translate-y-1">
                <!-- Success Icon -->
                <div class="text-center">
                    <div class="text-success text-5xl mb-6 animate-pulse">
                        <i class="fas fa-check-circle"></i>
                    </div>

                    <h2 class="text-2xl font-bold text-success mb-4">Order Confirmed!</h2>

                    <p class="text-gray-700 text-base mb-8">
                        Thank you for your order. We've received your request and are preparing your delicious food right
                        now.
                    </p>
                </div>

                <!-- Order Details -->
                <div class="bg-gray-50 rounded-xl p-5 mb-8">
                    <h3 class="text-base font-semibold text-secondary inline-block border-b-2 border-primary pb-1 mb-4">
                        Order Details
                    </h3>

                    <div class="space-y-3">
                        <p class="text-gray-700">
                            <span class="font-semibold text-secondary">Order Status:</span>
                            Being prepared
                        </p>

                        <p class="text-gray-700">
                            <span class="font-semibold text-secondary">Delivery Address:</span>
                            Your food will be delivered to the address you provided
                        </p>

                        <p class="text-gray-700">
                            <span class="font-semibold text-secondary">Payment Method:</span>
                            Cash on Delivery
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-3 sm:space-y-0 sm:flex sm:justify-center sm:space-x-4">
                    <a href="../menu/menu.php"
                        class="w-full sm:w-auto bg-primary hover:bg-orange-600 text-white font-semibold py-3 px-6 rounded-full inline-flex justify-center items-center transition-all duration-300 shadow-md hover:shadow-lg">
                        <i class="fas fa-utensils mr-2"></i> Order More Food
                    </a>

                    <a href="../orders/order_status.php"
                        class="w-full sm:w-auto bg-secondary hover:bg-gray-800 text-white font-semibold py-3 px-6 rounded-full inline-flex justify-center items-center transition-all duration-300 shadow-md hover:shadow-lg">
                        <i class="fas fa-clipboard-list mr-2"></i> View My Orders
                    </a>
                </div>

                <!-- Footer Info -->
                <div class="mt-8 pt-4 border-t border-gray-200 text-center text-gray-500 text-sm">
                    <p>Order reference: #<?php echo $orderReference; ?></p>
                    <p class="mt-1">A confirmation has been sent to your email address</p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</body>

</html>