<?php
session_start();

// Restrict access to only logged-in admins
if (!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true) {
    header("Location: admin_login.php"); // Redirect to login page
    exit;
}
include '../partials/dbconnect.php'; // Connect to database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // File upload settings
    $target_dir = __DIR__ . "/../uploads/"; // Absolute path of target folder
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is an actual image
    if (getimagesize($_FILES["image"]["tmp_name"]) === false) {
        die("Invalid file type.");
    }

    // Allow only certain formats (JPG, JPEG, PNG, GIF)
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        die("Only JPG, JPEG, PNG, and GIF files are allowed.");
    }

    // Move the uploaded file to the "uploads" directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_path = "uploads/" . $image_name; // Store relative path in DB

        // Insert into database
        $sql = "INSERT INTO food_items (name, price, image_path) VALUES ('$name', '$price', '$image_path')";
        mysqli_query($conn, $sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, Admin!</h2>
    <p>You have successfully logged in.</p>

    <h2>Admin Panel</h2>
    <form action="/digital_bhatti/admin/admin_dashboard.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Food Name" required>
        <input type="number" name="price" placeholder="Price" required>
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Add Food Item</button>
    </form>
    <!-- Logout Button -->
    <form method="post" action="admin_logout.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html>




