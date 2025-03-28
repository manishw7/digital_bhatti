<?php
session_start();

// Define the admin credentials
$admin_username = "admin";
$admin_password = "admin123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if entered credentials match admin credentials
    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION["admin_loggedin"] = true;  // Set session for admin
        header("Location: admin_dashboard.php"); // Redirect to admin dashboard
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<?php require '../admin/admin_nav.php'; ?>
    <h2>Admin Login</h2>
    
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
