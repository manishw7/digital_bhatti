<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../auth/login.php");
    exit;
}

include '../partials/dbconnect.php'; // Include the database connection
require '../partials/nav.php';

// Check if cart is not empty and if delivery info is available
if (empty($_SESSION['cart']) || !isset($_SESSION['phone_number']) || !isset($_SESSION['delivery_address'])) {
    header("location: cart.php"); // Redirect to cart if no cart or delivery info
    exit;
}

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

// Success message
echo "<div class='container mt-5 text-center'>";
echo "<h2>Order placed successfully!</h2>";
echo "<p>Your order is now being processed and will be delivered to your address shortly.</p>";
echo "<a href='../menu/menu.php' class='btn btn-primary btn-lg mt-4'>Order more food</a>";
echo "</div>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Bhatti - Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJd0QJXhd8LZP3jYtDdaQKzE8lBsHmeTDbsh9H7WhK3Ypg6Zy9aG7M1l3WwN" crossorigin="anonymous">
    <style>

        .logo {
            display: flex;
            align-items: center;
            flex-grow: 1; /* Ensures logo pushes links to the right */
        }

        .logo h1 {
            margin: 0;
            font-size: 24px;
            color: white;
        }


        /* Adjust body content for fixed navbar */
        body {
            padding-top: 80px; /* Adjust for fixed navbar */
        }

        /* General Body Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Container for the Success Message */
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }

        /* Heading Styles */
        h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #28a745; /* Green color for success */
            margin-bottom: 20px;
        }

        /* Paragraph Styles */
        p {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 30px;
        }

        /* Button Styles */
        .btn-primary {
            background-color: #007bff;
            color: white;
            font-size: 1.2rem;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 1.8rem;
            }

            .btn-primary {
                font-size: 1rem;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>

</body>
</html>
<?php require '../partials/footer.php';?>