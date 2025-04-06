<?php
ini_set('display_errors', 1);  // Display errors
ini_set('display_startup_errors', 1);  // Display startup errors
error_reporting(E_ALL);  // Report all types of errors

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../auth/login.php");
    exit;
}
include '../partials/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout1'])) {
    $_SESSION['payment-method'] = $_POST['payment-method'];
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
    header("Location: checkout.php"); // Redirect to checkout after storing payment info
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment Form</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .hidden {
      display: none;
    }
  </style>
</head>
<body class="bg-gray-100">

  <?php include '../partials/nav.php'; ?>

  <!-- Payment Section -->
  <section class="flex items-center justify-center py-12 px-4">
    <form class="bg-white p-8 rounded-lg shadow-md w-full max-w-md space-y-6" action="payment.php" method="post">
      <h2 class="text-2xl font-bold text-center">Payment Method</h2>

      <!-- Payment Method Selection -->
      <div>
        <label class="block font-medium">Select Payment Method:</label>
        <select id="payment-method" name="payment-method" class="w-full mt-1 border p-2 rounded" onchange="togglePaymentFields()">
          <option value="Cash on Delivery">Cash on Delivery</option>
          <option value="Online">Online</option>
        </select>
      </div>

      <!-- eSewa Payment Options -->
      <div id="esewa-fields" class="hidden space-y-4">
        <label class="block font-medium">Online Payment Type:</label>
        <div class="flex space-x-4">
          <label class="flex items-center space-x-2">
            <input type="radio" name="esewa-option" value="esewa-id" onchange="toggleEsewaOptions()" />
            <span>eSewa ID</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="radio" name="esewa-option" value="credit-card" onchange="toggleEsewaOptions()" />
            <span>Credit Card</span>
          </label>
        </div>

        <!-- eSewa ID Login -->
        <div id="esewa-id-fields" class="hidden">
          <label class="block mt-2">eSewa ID:</label>
          <input type="text" class="w-full border p-2 rounded" placeholder="Enter your eSewa ID" />

          <label class="block mt-2">Password:</label>
          <input type="password" class="w-full border p-2 rounded" placeholder="Enter password" />
        </div>

        <!-- Credit Card Payment -->
        <div id="credit-card-fields" class="hidden">
          <label class="block mt-2">Card Number:</label>
          <input type="text" class="w-full border p-2 rounded" placeholder="Enter card number" />

          <label class="block mt-2">Cardholder Name:</label>
          <input type="text" class="w-full border p-2 rounded" placeholder="Enter cardholder name" />

          <div class="flex space-x-4 mt-2">
            <div class="flex-1">
              <label>Expiry Date:</label>
              <input type="text" class="w-full border p-2 rounded" placeholder="MM/YY" />
            </div>
            <div class="flex-1">
              <label>CVV:</label>
              <input type="text" class="w-full border p-2 rounded" placeholder="CVV" />
            </div>
          </div>
        </div>
      </div>

      <!-- Submit Button -->
      <button type="submit" name='checkout1' value='1' class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition" '>
        Submit Payment
      </button>
    </form>
  </section>

  <?php include "../partials/footer.php"; ?>


  <script>
    function togglePaymentFields() {
      const paymentMethod = document.getElementById('payment-method').value;
      const esewaFields = document.getElementById('esewa-fields');
      if (paymentMethod === 'Online') {
        esewaFields.classList.remove('hidden');
      } else {
        esewaFields.classList.add('hidden');
        document.getElementById('esewa-id-fields').classList.add('hidden');
        document.getElementById('credit-card-fields').classList.add('hidden');
      }
    }

    function toggleEsewaOptions() {
      const selected = document.querySelector('input[name="esewa-option"]:checked').value;
      const idFields = document.getElementById('esewa-id-fields');
      const cardFields = document.getElementById('credit-card-fields');
      if (selected === 'esewa-id') {
        idFields.classList.remove('hidden');
        cardFields.classList.add('hidden');
      } else if (selected === 'credit-card') {
        cardFields.classList.remove('hidden');
        idFields.classList.add('hidden');
      }
    }
  </script>
</body>
</html>
