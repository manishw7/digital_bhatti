<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../auth/login.php");
    exit;
}
include '../partials/dbconnect.php';
// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
// Add selected items to cart and redirect to cart.php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    foreach ($_POST['quantity'] as $food_id => $quantity) {
        if ($quantity > 0) {
            $_SESSION['cart'][$food_id] = $quantity;
        }
    }
    header("Location: ../cart/cart.php"); // Redirect to cart.php
    exit;
}
// Reset the cart
if (isset($_POST['reset_cart'])) {
    $_SESSION['cart'] = [];
}
// Fetch food details from the database
$food_details = [];
$sql = "SELECT id, name, price, image_path FROM food_items";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $food_details[$row['id']] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu | Food Ordering System</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ff6b6b',
                        secondary: '#4ecdc4',
                        accent: '#ffe66d',
                        dark: '#292f36',
                    }
                }
            }
        }
    </script>
    <style>
        .no-arrows::-webkit-inner-spin-button,
        .no-arrows::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .no-arrows {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <?php include '../partials/nav.php'; ?>


    <div class="container mx-auto px-4 py-8">
        <!-- Cart Actions -->
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center">
                <?php
                $cartCount = 0;
                foreach ($_SESSION['cart'] as $quantity) {
                    $cartCount += $quantity;
                }
                ?>
                <span class="relative inline-block mr-2">
                    <i class="fas fa-shopping-cart text-xl text-gray-700"></i>
                    <?php if ($cartCount > 0): ?>
                        <span
                            class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                            <?php echo $cartCount; ?>
                        </span>
                    <?php endif; ?>
                </span>
                <span class="text-gray-700">Items in cart: <?php echo $cartCount; ?></span>
            </div>

            <form method="post" action="menu.php">
                <button type="submit" name="reset_cart"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-full transition duration-300 ease-in-out flex items-center">
                    <i class="fas fa-trash-alt mr-2"></i> Clear Cart
                </button>
            </form>
        </div>


        <!-- Add to Cart Form -->
        <form method="post" action="menu.php" id="menuForm">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php foreach ($food_details as $food_id => $food) { ?>
                    <div class="food-item">
                        <div
                            class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            <img src="../<?php echo htmlspecialchars($food['image_path']); ?>"
                                alt="<?php echo htmlspecialchars($food['name']); ?>" class="w-full h-48 object-cover">
                            <div class="p-6 ">
                                <div class="flex items-center justify-between">

                                    <h5 class="text-lg font-semibold text-gray-800 mb-2">
                                        <?php echo htmlspecialchars($food['name']); ?>
                                    </h5>
                                    <p class="text-primary font-bold text-lg mb-4">
                                        ₹<?php echo number_format($food['price'], 2); ?></p>
                                </div>

                                <!-- Quantity Selector -->
                                <div class="flex items-center border border-gray-300 rounded-full overflow-hidden">
                                    <button type="button"
                                        class="quantity-btn-minus px-4 py-1.5  hover:bg-gray-100 focus:outline-none"
                                        data-id="<?php echo $food_id; ?>">
                                        <i class="fas fa-minus text-gray-600"></i>
                                    </button>
                                    <input type="number" name="quantity[<?php echo $food_id; ?>]"
                                        id="quantity-<?php echo $food_id; ?>"
                                        class="no-arrows w-full text-center py-2 border-0 focus:ring-0 focus:outline-none"
                                        min="0"
                                        value="<?php echo isset($_SESSION['cart'][$food_id]) ? $_SESSION['cart'][$food_id] : 0; ?>">
                                    <button type="button"
                                        class="quantity-btn-plus px-4 py-2  hover:bg-gray-100 focus:outline-none"
                                        data-id="<?php echo $food_id; ?>">
                                        <i class="fas fa-plus text-gray-600"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Add to Cart Button -->
            <div class="text-center my-12">
                <button type="submit" name="add_to_cart"
                    class="bg-primary hover:bg-red-500 text-white font-bold py-3 px-8 rounded-full shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                    <i class="fas fa-shopping-cart mr-2"></i> Update Cart and Checkout
                </button>
            </div>
        </form>

        <!-- Floating Cart Button (for mobile) -->
        <div class="fixed bottom-6 right-6 md:hidden bg-primary text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:bg-red-500 transition duration-300 cursor-pointer z-10"
            onclick="document.getElementById('menuForm').submit();">
            <i class="fas fa-shopping-cart text-xl"></i>
        </div>
    </div>

    <?php require '../partials/footer.php'; ?>


    <script>
        // Quantity buttons functionality
        document.addEventListener('DOMContentLoaded', function () {
            // Add event listeners to quantity buttons
            const minusButtons = document.querySelectorAll('.quantity-btn-minus');
            const plusButtons = document.querySelectorAll('.quantity-btn-plus');

            minusButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    const input = document.getElementById('quantity-' + id);
                    const currentValue = parseInt(input.value) || 0;
                    if (currentValue > 0) {
                        input.value = currentValue - 1;
                    }
                });
            });

            plusButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    const input = document.getElementById('quantity-' + id);
                    const currentValue = parseInt(input.value) || 0;
                    input.value = currentValue + 1;
                });
            });
        });
    </script>
</body>

</html>