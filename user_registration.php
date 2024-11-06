<?php
include("./includes/connect.php");
include("./functions/common_function.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Registration</title>
    <link rel="icon" type="image" href="../img/head-logo.png">
    <!-- Bootstraps -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<!-- Fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- CSS -->
<link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container-fluid">
        <h2 class="text-center my-3">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-outline fs-5">
                        <!-- Username -->
                        <label for="user_username" class="form-label">
                            Username:
                        </label>
                        <input type="text" class="form-control  mb-2" name="user_username" id="user_username"
                            autocomplete="off" placeholder="Enter your username" required autofocus>
                        <!-- Email -->
                        <label for="user_email" class="form-label">
                            Email:
                        </label>
                        <input type="text" class="form-control mb-2" name="user_email" id="user_email"
                            autocomplete="off" placeholder="Enter your email" required>
                        <!-- Image -->
                        <label for="user_image" class="form-label">
                            User Image:
                        </label>
                        <input type="file" class="form-control mb-2" name="user_image" id="user_image" required>
                        <!-- Password -->
                        <label for="user_password" class="form-label">
                            Password:
                        </label>
                        <input type="password" class="form-control mb-2" name="user_password" id="user_password"
                            autocomplete="off" placeholder="Enter your password" required>
                        <!-- Confirm Password -->
                        <label for="conf_user_password" class="form-label">
                            Confirm Password:
                        </label>
                        <input type="password" class="form-control mb-2" name="conf_user_password"
                            id="conf_user_password" autocomplete="off" placeholder="Confirm your password" required>
                        <!-- Address -->
                        <label for="user_address" class="form-label">
                            Address:
                        </label>
                        <input type="text" class="form-control mb-2" name="user_address" id="user_address"
                            autocomplete="off" placeholder="Enter your address" required>
                        <!-- Contact Field -->
                        <label for="user_contact" class="form-label">
                            Contact:
                        </label>
                        <input type="text" class="form-control mb-2" name="user_contact" id="user_contact"
                            autocomplete="off" placeholder="Enter your Mobile Number" required>
                        <div class="mt-3 pt-1">
                            <input type="submit" value="Register"
                                class="bg-primary py-2 px-3 border-0 rounded text-white" name="user_register">
                            <p class="mt-3 fw-bold small">Already have an account? <a href="user_login.php"
                                    class="text-primary text-decoration-none">Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>
<!-- select query -->



<?php
if (isset($_POST["user_register"])) {
    $user_username = $_POST["user_username"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST["conf_user_password"];
    $user_mobile = $_POST["user_contact"];
    $user_address = $_POST["user_address"];
    $user_image = $_FILES["user_image"]["name"];
    $user_image_tmp = $_FILES["user_image"]["tmp_name"];
    $user_ip = getIPAddress();

    // select query

    $select_query = "Select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Username and email already exist.')</script>";
    } else if ($user_password != $conf_user_password) {
        echo "<script>alert('Password doesn;'t match.')</script>";
    } else {

        //insert Query
        $insert_query = "insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password','$user_image ','$user_ip','$user_address','$user_mobile')";

        $sql_execute = mysqli_query($con, $insert_query);
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        echo "<script>alert('User Created.')</script>";
        echo "<script>window.open('user_login.php')</script>";
    }

    //selecting cart items$_SESSION['username']
    $select_cart_items = "Select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con, $select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if ($rows_count > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart.')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    
    
    }
    else{
        echo "<script>window.open('index.php','_self')</script>";
    }




}



?>