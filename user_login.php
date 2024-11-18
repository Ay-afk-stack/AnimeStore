<?php
include("./includes/connect.php");
include("./functions/common_function.php");
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Login</title>
    <link rel="icon" type="image" href="../img/head-logo.png">
    <!-- Bootstraps -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center my-3">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-outline fs-5">
                    <!-- Username -->
                        <label for="user_username" class="form-label">
                            Username:
                        </label>
                        <input type="text" class="form-control  mb-2" name="user_username" id="user_username" autocomplete="off" placeholder="Enter your username" required autofocus>
                        <!-- Password -->
                        <label for="user_password" class="form-label">
                            Password:
                        </label>
                        <input type="password" class="form-control mb-2" name="user_password" id="user_password" autocomplete="off" placeholder="Enter your password" required>
                        <div class="mt-3 pt-1">
                            <input type="submit" value="Login" class="bg-primary py-2 px-3 border-0 rounded text-white" name="user_login">
                            <p class="mt-3 fw-bold small">Don't have an account?  <a href="user_registration.php" class="text-primary text-decoration-none">Register</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!-- bootstrap js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<!-- PHP code -->
<?php
if (isset($_POST['user_login'])) {
    // Sanitize user inputs to avoid SQL injection
    $user_username = mysqli_real_escape_string($con, $_POST["user_username"]);
    $user_password = $_POST["user_password"]; // Passwords should not be sanitized, as they are hashed

    // Prepare and execute the query to fetch the user record
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_username'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if ($rows_count > 0) {
        // Verify password
        if (password_verify($user_password, $row_data['user_password'])) {
            $_SESSION['user_id'] = $row_data['user_id'];  // Store user_id in session
            $_SESSION['username'] = $user_username;  // Store username in session

            // Check if the user has cart items by user_id
            $user_id = $row_data['user_id']; // Get user_id from the session
            $select_query_cart = "SELECT * FROM `cart_details` WHERE user_id = $user_id";
            $select_cart = mysqli_query($con, $select_query_cart);
            $rows_count_cart = mysqli_num_rows($select_cart);

            if ($rows_count_cart == 0) {
                // No items in the cart
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
            } else {
                // User has items in the cart
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('checkout.php', '_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>
