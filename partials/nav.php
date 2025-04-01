<?php
session_start(); // Ensure session is started
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Bhatti</title>

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

</head>

<body>
    <header class="sticky top-0 bg-white z-50 shadow-md">
        <nav class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="logo">
                    <h1 class="text-2xl font-bold text-primary">Digital Bhatti</h1>
                </div>

                <div class="hidden py-2 md:block">
                    <ul class="flex space-x-6">
                        <?php
                        if (!$loggedin) {
                            // Show login, signup, and admin login links if not logged in
                            // echo '<li><a href="/digital_bhatti/index.php">Welcome</a></li>';
                            // echo '<li><a href="/digital_bhatti/auth/login.php">Login</a></li>';
                            // echo '<li><a href="/digital_bhatti/auth/signup.php">Signup</a></li>';
                            // echo '<li><a href="/digital_bhatti/admin/admin_login.php">Admin Login</a></li>';
                        

                            echo ' <li><a href="/digital_bhatti/index.php" class="text-dark hover:text-primary transition-colors">Home</a></li>';
                            echo ' <li><a href="/digital_bhatti/menu/menu.php" class="text-dark hover:text-primary transition-colors">Menu</a></li>';
                            echo ' <li><a href="/digital_bhatti/about/about.php" class="text-dark hover:text-primary transition-colors">About</a></li>';
                            echo ' <li><a href="/digital_bhatti/about/contact.php" class="text-dark hover:text-primary transition-colors">Contact</a></li>';
                            echo ' <li><a href="/digital_bhatti/auth/login.php" class="bg-primary text-white px-4 py-2 rounded-full hover:bg-opacity-90 transition-all">Login</a></li>';
                        } else {
                            // Show logout, cart, and current orders if logged in
                            echo ' <li><a href="/digital_bhatti/index.php" class="text-dark hover:text-primary transition-colors">Home</a></li>';
                            echo ' <li><a href="/digital_bhatti/menu/menu.php" class="text-dark hover:text-primary transition-colors">Menu</a></li>';

                            echo '<li><a href="/digital_bhatti/cart/cart.php">Cart</a></li>';
                            echo ' <li><a href="/digital_bhatti/orders/order_status.php" class="text-dark hover:text-primary transition-colors">Orders</a></li>';
                            echo ' <li><a href="/digital_bhatti/auth/logout.php" class="bg-primary text-white px-4 py-2 rounded-full hover:bg-opacity-90 transition-all">Logout</a></li>';

                        }
                        ?>
                    </ul>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-dark focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div id="mobile-menu" class="hidden md:hidden mt-4">
                <ul class="flex flex-col space-y-3">
                    <?php
                    if (!$loggedin) {
                        // Show login, signup, and admin login links if not logged in
                        // echo '<li><a href="/digital_bhatti/index.php">Welcome</a></li>';
                        // echo '<li><a href="/digital_bhatti/auth/login.php">Login</a></li>';
                        // echo '<li><a href="/digital_bhatti/auth/signup.php">Signup</a></li>';
                        // echo '<li><a href="/digital_bhatti/admin/admin_login.php">Admin Login</a></li>';
                    

                        echo ' <li><a href="/digital_bhatti/index.php" class="text-dark hover:text-primary transition-colors">Home</a></li>';
                        echo ' <li><a href="/digital_bhatti/menu/menu.php" class="text-dark hover:text-primary transition-colors">Menu</a></li>';
                        echo ' <li><a href="/digital_bhatti/about/about.php" class="text-dark hover:text-primary transition-colors">About</a></li>';
                        echo ' <li><a href="/digital_bhatti/about/contact.php" class="text-dark hover:text-primary transition-colors">Contact</a></li>';
                        echo ' <li><a href="/digital_bhatti/auth/login.php" class="bg-primary text-white px-4 py-2 rounded-full hover:bg-opacity-90 transition-all">Login</a></li>';
                    } else {
                        // Show logout, cart, and current orders if logged in
                        echo ' <li><a href="/digital_bhatti/index.php" class="text-dark hover:text-primary transition-colors">Home</a></li>';
                        echo ' <li><a href="/digital_bhatti/menu/menu.php" class="text-dark hover:text-primary transition-colors">Menu</a></li>';

                        echo '<li><a href="/digital_bhatti/cart/cart.php">Cart</a></li>';
                        echo ' <li><a href="/digital_bhatti/orders/order_status.php" class="text-dark hover:text-primary transition-colors">Orders</a></li>';
                        echo ' <li><a href="/digital_bhatti/auth/logout.php" class="bg-primary text-white px-4 py-2 rounded-full hover:bg-opacity-90 transition-all">Login</a></li>';

                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>



</body>
<script>
    // Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Check for success parameter in URL to show success message
    window.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('success') === 'true') {
            const successMessage = document.getElementById('success-message');
            successMessage.classList.remove('hidden');

            // Scroll to success message
            successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });

            // Hide success message after 5 seconds
            setTimeout(() => {
                successMessage.classList.add('hidden');
            }, 5000);
        }
    });
</script>

</html>