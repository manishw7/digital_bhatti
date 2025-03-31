<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../auth/login.php");
    exit;
}
include '../partials/dbconnect.php'; // Include the database connection
// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
// Add item to cart if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $food_id => $quantity) {
        if ($quantity > 0) {
            $_SESSION['cart'][$food_id] = $quantity;
        } else {
            unset($_SESSION['cart'][$food_id]);
        }
    }
    header("Location: cart.php"); // Refresh the page to reflect changes
    exit;
}
// Store phone number and delivery address if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    $_SESSION['phone_number'] = $_POST['phone_number'];
    $_SESSION['delivery_address'] = $_POST['delivery_address'];
    header("Location: checkout.php"); // Redirect to checkout after storing delivery info
    exit;
}
// Fetch food details from the database
$food_details = [];
if (!empty($_SESSION['cart'])) {
    $food_ids = implode(",", array_keys($_SESSION['cart']));
    $sql = "SELECT id, name, price, image_path FROM food_items WHERE id IN ($food_ids)";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $food_details[$row['id']] = $row;
    }
}
// Calculate cart totals
$subtotal = 0;
$delivery_fee = 50; // Fixed delivery fee
foreach ($_SESSION['cart'] as $food_id => $quantity) {
    if (isset($food_details[$food_id])) {
        $subtotal += $food_details[$food_id]['price'] * $quantity;
    }
}
$total = $subtotal + $delivery_fee;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart - Digital Bhatti</title>
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
        .quantity-input {
            position: relative;
            display: flex;
            align-items: center;
            max-width: 120px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-radius: 9999px;
            overflow: hidden;
        }

        .quantity-input button {
            background-color: #f3f4f6;
            border: none;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .quantity-input button:hover {
            background-color: #e5e7eb;
        }

        .quantity-input button:first-child {
            border-radius: 9999px 0 0 9999px;
        }

        .quantity-input button:last-child {
            border-radius: 0 9999px 9999px 0;
        }

        .quantity-input input {
            width: 40px;
            height: 36px;
            text-align: center;
            border: none;
            font-size: 14px;
            font-weight: 500;
            background-color: #f3f4f6;
            -moz-appearance: textfield;
        }

        .quantity-input input::-webkit-outer-spin-button,
        .quantity-input input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        body {
            background-color: #F7F7F2;
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .btn-hover {
            transition: all 0.3s ease;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .animate-pulse-slow {
            animation: pulse 2s infinite;
        }

        .remove-btn {
            transition: all 0.2s ease;
        }

        .remove-btn:hover {
            background-color: #FEE2E2;
            color: #EF4444;
        }
    </style>
</head>

<body class="font-sans bg-light text-dark min-h-screen">
    <?php include '../partials/nav.php'; ?>
    <!-- Cart Content -->
    <div class="container mx-auto px-4 pb-16">
        <?php if (empty($_SESSION['cart'])) { ?>
            <div
                class="bg-white rounded-2xl shadow-xl p-12 text-center max-w-2xl mx-auto border border-gray-100 card-hover">
                <div class="bg-primary/10 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-3">Your cart is empty</h3>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">Looks like you haven't added any delicious items to your cart
                    yet. Let's fix that!</p>
                <a href="../menu/menu.php"
                    class="bg-primary text-white px-8 py-3 rounded-full font-medium hover:bg-primary/90 inline-flex items-center btn-hover animate-pulse-slow">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                        </path>
                    </svg>
                    Browse Our Menu
                </a>
            </div>
        <?php } else { ?>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2">
                    <form action="cart.php" method="post" id="cart-form">
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 card-hover">
                            <div class="p-6 border-b border-gray-200 bg-gray-50">
                                <h2 class="text-xl font-bold flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    Your Items (<?php echo count($_SESSION['cart']); ?>)
                                </h2>
                            </div>

                            <?php foreach ($_SESSION['cart'] as $food_id => $quantity) {
                                if (!isset($food_details[$food_id]))
                                    continue;
                                $food = $food_details[$food_id];
                                $item_total = $food['price'] * $quantity;
                                ?>
                                <div
                                    class="p-6 border-b border-gray-100 flex flex-col md:flex-row items-start md:items-center hover:bg-gray-50 transition-colors">
                                    <!-- Food Image -->
                                    <div
                                        class="w-full md:w-24 h-24 rounded-xl overflow-hidden mb-4 md:mb-0 md:mr-6 flex-shrink-0 shadow-md">
                                        <img src="../<?php echo htmlspecialchars($food['image_path'] ?? ''); ?>"
                                            alt="<?php echo htmlspecialchars($food['name']); ?>"
                                            class="w-full h-full object-cover"
                                            onerror="this.src='https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1760&q=80'">
                                    </div>

                                    <!-- Food Details -->
                                    <div class="flex-grow">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-lg font-bold"><?php echo htmlspecialchars($food['name']); ?></h3>
                                            <div class="flex items-center justify-center">

                                                <div class="font-bold text-lg text-primary">
                                                    Rs. <?php echo number_format($item_total, 2); ?>
                                                </div>

                                                <button type="button"
                                                    class="remove-btn text-red-500 p-2 rounded-full ml-0 md:ml-4 mt-3 md:mt-0 transition-colors"
                                                    onclick="removeItem(<?php echo $food_id; ?>)">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>


                                        </div>
                                        <p class="text-gray-600 mb-3">Rs. <?php echo number_format($food['price'], 2); ?> each
                                        </p>

                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between">
                                            <!-- Quantity Selector -->
                                            <div class="quantity-input mb-3 sm:mb-0">
                                                <button type="button"
                                                    class="decrement bg-gray-100 text-gray-600 hover:bg-gray-200"
                                                    onclick="decrementQuantity(<?php echo $food_id; ?>)">-</button>
                                                <input type="number" name="quantity[<?php echo $food_id; ?>]"
                                                    id="quantity-<?php echo $food_id; ?>" min="0"
                                                    value="<?php echo $quantity; ?>" class="quantity-field" readonly>
                                                <button type="button"
                                                    class="increment bg-gray-100 text-gray-600 hover:bg-gray-200"
                                                    onclick="incrementQuantity(<?php echo $food_id; ?>)">+</button>
                                            </div>

                                            <!-- Item Total -->

                                        </div>
                                    </div>

                                    <!-- Remove Button -->

                                </div>
                            <?php } ?>

                            <div class="p-6 bg-gray-50">
                                <button type="submit" name="update_cart"
                                    class="bg-secondary text-white px-6 py-2 rounded-full font-medium hover:bg-secondary/90 transition-colors btn-hover flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                        </path>
                                    </svg>
                                    Update Cart
                                </button>
                            </div>
                        </div>
                        <!-- Hidden input for automatically submitting the form -->
                        <input type="hidden" name="update_cart" value="1" id="update_cart_hidden">
                    </form>
                </div>

                <!-- Order Summary & Checkout -->
                <div class="lg:col-span-1">
                    <div
                        class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 sticky top-4 card-hover">
                        <div class="p-6 border-b border-gray-200 bg-gray-50">
                            <h2 class="text-xl font-bold flex items-center">
                                <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                                Order Summary
                            </h2>
                        </div>

                        <div class="p-6">
                            <div class="flex justify-between mb-4">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium">Rs. <?php echo number_format($subtotal, 2); ?></span>
                            </div>

                            <div class="flex justify-between mb-4">
                                <span class="text-gray-600">Delivery Fee</span>
                                <span class="font-medium">Rs. <?php echo number_format($delivery_fee, 2); ?></span>
                            </div>

                            <div class="border-t border-dashed border-gray-200 pt-4 mb-6">
                                <div class="flex justify-between">
                                    <span class="font-bold text-lg">Total</span>
                                    <span class="font-bold text-lg text-primary">Rs.
                                        <?php echo number_format($total, 2); ?></span>
                                </div>
                            </div>

                            <!-- Delivery Information Form -->
                            <form action="cart.php" method="post">
                                <h3 class="text-lg font-bold mb-4 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Delivery Information
                                </h3>

                                <div class="mb-4">
                                    <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">Phone
                                        Number</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <input type="text" id="phone_number" name="phone_number"
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                            value="<?php echo isset($_SESSION['phone_number']) ? htmlspecialchars($_SESSION['phone_number']) : ''; ?>"
                                            placeholder="Enter your phone number" required>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <label for="delivery_address"
                                        class="block text-sm font-medium text-gray-700 mb-1">Delivery Address</label>
                                    <div class="relative">
                                        <div class="absolute top-3 left-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                                </path>
                                            </svg>
                                        </div>
                                        <textarea id="delivery_address" name="delivery_address" rows="3"
                                            class="w-full pl-10 px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                            placeholder="Enter your full delivery address"
                                            required><?php echo isset($_SESSION['delivery_address']) ? htmlspecialchars($_SESSION['delivery_address']) : ''; ?></textarea>
                                    </div>
                                </div>

                                <button type="submit" name="checkout" value="1"
                                    class="w-full bg-primary text-white py-4 px-4 rounded-xl font-medium hover:bg-primary/90 focus:outline-none transition-all transform hover:scale-[1.02] flex items-center justify-center btn-hover">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                    Proceed to Checkout
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Continue Shopping Link -->

                </div>
            </div>
        <?php } ?>
    </div>



    <script>
        // Quantity Increment/Decrement
        function incrementQuantity(foodId) {
            const input = document.getElementById('quantity-' + foodId);
            input.value = parseInt(input.value) + 1;
        }

        function decrementQuantity(foodId) {
            const input = document.getElementById('quantity-' + foodId);
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }

        // Remove Item - now with proper form submission
        function removeItem(foodId) {
            // Get the quantity input element
            const input = document.getElementById('quantity-' + foodId);

            // Set the quantity to 0
            input.value = 0;

            // Submit the form (this ensures the POST request happens)
            document.getElementById('cart-form').submit();
        }
    </script>
</body>

</html>