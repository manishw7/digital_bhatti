<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Simulate a successful submission
    $successMessage = "Thank you for contacting us! We will get back to you shortly.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title> 
    <style>
        /* General Layout Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    min-height: 100vh; /* Allow the page to take full height */
    padding-top: 60px; /* To ensure content does not overlap with the fixed navbar */
}

/* Navbar Styles */
.navbar {
    background-color: #333;
    padding: 10px 0;
    color: white;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%; /* Make navbar cover full width */
    z-index: 1000; /* Ensure it stays on top of other content */
}

.navbar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px; /* The width of the content inside the navbar */
    margin: 0 auto; /* Center the navbar content */
    padding: 0 20px;
}

.navbar-links {
    list-style: none;
    display: flex;
    gap: 20px;
}

.navbar-links li {
    display: inline;
}

.navbar-links a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
}

.navbar-links a:hover {
    color: #f39c12;
}

/* Contact Form Styling */
.contact-form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    margin-top: 80px; /* Create space below the fixed navbar */
    margin-bottom: 20px; /* Space for the footer */
    flex-grow: 1; /* Allow the form container to take up available space */
}

/* Success message styling */
.success-message {
    background-color: #28a745;
    color: white;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 20px;
    text-align: center;
}

/* Form and Input Styles */
h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input, .form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

/* Footer Styling */
footer {
    background-color: #333;
    color: white;
    padding: 10px 0;
    text-align: center;
    margin-top: 20px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact-form-container {
        width: 100%;
        margin-top: 20px;
    }

    .navbar-container {
        padding: 0 10px;
    }
}

        </style>
</head>
<body>

    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <div class="navbar-container">
                <div class="logo">
                    <h1>Digital Bhatti</h1>
                </div>
                <ul class="navbar-links">
                    <li><a href="/digital_bhatti/home.php">Home</a></li>
                    <li><a href="/digital_bhatti/menu/menu.php">Menu</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="/digital_bhatti/auth/login.php">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Contact Form -->
    <div class="contact-form-container">
        <h2>Contact Us</h2>
        <?php if (isset($successMessage)): ?>
            <div class="success-message"><?php echo $successMessage; ?></div>
        <?php endif; ?>

        <form action="contact.php" method="POST">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required>
            </div>

            <div class="form-group">
                <label for="message">Your Message</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
<?php require '../partials/footer.php';?>