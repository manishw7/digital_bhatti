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
    }
    else {
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>
    <?php require '../partials/nav.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
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
    </div>
  </body>
</html>
<?php require '../partials/footer.php';?>