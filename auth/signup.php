<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../partials/dbconnect.php';

    // Trim input to remove spaces and prevent empty input
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $cpassword = trim($_POST["cpassword"]);

    // Check if any field is empty
    if (empty($username) || empty($email) || empty($password) || empty($cpassword)) {
        $showError = "All fields are required!";
    }
    // Check if email is valid
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $showError = "Invalid email format!";
    }
    // Check if passwords match
    elseif ($password !== $cpassword) {
        $showError = "Passwords do not match!";
    } else {
        // Check if the username already exists
        $existSql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $existSql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $numExistRows = mysqli_num_rows($result);

        if ($numExistRows > 0) {
            $showError = "Username already exists!";
        } else {
            // Hash the password
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Use prepared statement to prevent SQL injection
            $sql = "INSERT INTO users (username, email, password, dt) VALUES (?, ?, ?, CURRENT_TIMESTAMP())";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hash);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $showAlert = true;
            } else {
                $showError = "Error in signup!";
            }
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
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
        .login-bg {
            background: linear-gradient(rgba(46, 41, 78, 0.9), rgba(46, 41, 78, 0.9)), url('uploads/food-bg.jpg');
            background-size: cover;
            background-position: center;
        }

        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.3);
        }
    </style>

    <title>SignUp</title>
</head>

<body>
    <?php require '../partials/nav.php' ?>
    <?php
    if ($showAlert) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if ($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    <!-- <div class="container my-4">
     <h1 class="text-center">Signup to Digital Bhatti</h1>
     <form action="/digital_bhatti/auth/signup.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" maxlength="11" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" maxlength="20" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" maxlength="23" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
        </div>
         
        <button type="submit" class="btn btn-primary">SignUp</button>
     </form>
    </div> -->

    <main class="flex-grow h-screen -mt-10 flex items-center justify-center px-4">
        <div class="w-full max-w-5xl bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">
            <!-- Left Side - Image -->

            <!-- Right Side - Form -->
            <div class="w-full md:w-1/2 p-4 md:p-12">
                <div class="mb-4 text-center md:text-left">
                    <h2 class="text-2xl md:text-3xl font-bold text-secondary mb-1">Sign up to get started!</h2>
                </div>

                <form action="/digital_bhatti/auth/signup.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" id="username" name="username"
                                class="form-input block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                placeholder="Enter your username" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" id="email" name="email"
                                class="form-input block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                placeholder="Enter your email" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="flex items-center justify-between mb-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                            <input type="password" id="password" name="password"
                                class="form-input block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                placeholder="Enter your password" required>

                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="flex items-center justify-between mb-1">
                            <label for="cpassword" class="block text-sm font-medium text-gray-700">Confirm
                                Password</label>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                            <input type="password" id="cpassword" name="cpassword"
                                class="form-input block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                placeholder="Enter your password" required>

                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-primary text-white py-3 px-4 rounded-lg font-medium hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all transform hover:scale-[1.02]">
                        Sign Up
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="/digital_bhatti/auth/login.php"
                            class="font-medium text-primary hover:text-primary/80 transition-colors">
                            Sign in
                        </a>
                    </p>
                </div>


            </div>


            <div class="login-image w-full md:w-1/2 h-64 md:h-auto relative">
                <img src="../uploads/menu.jpeg" alt="Login Food Image" class="w-full h-full object-cover">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent  to-secondary/60 flex flex-col justify-center px-8 text-white">
                    <h2 class="text-3xl font-bold mb-4">Taste the Tradition</h2>
                    <p class="text-lg max-w-xs">Experience authentic Nepali cuisine at your fingertips.</p>
                </div>
            </div>

        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>
<?php require '../partials/footer.php'; ?>