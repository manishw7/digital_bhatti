<?php
session_start();

// Admin credentials
$admin_username = "admin";
$admin_password = "admin123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION["admin_loggedin"] = true;
        header("Location: admin_dashboard.php");
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
    <link rel="stylesheet" href="../css/admin_login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

<?php require '../admin/admin_nav.php'; ?>
<style>/* Admin Footer Styles */
.admin-footer {
    background-color: #222;
    color: #ccc;
    text-align: center;
    padding: 15px 0;
    font-size: 14px;
    position: absolute;
    bottom: 0;
    width: 100%;
}

/* Ensure the footer sticks to the bottom */
html, body {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
}

.main-content {
    flex: 1;
}
</style>

<div class="main-container">
    <h2>Admin Login</h2>

    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>

    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
<?php require 'admin_footer.php';?>