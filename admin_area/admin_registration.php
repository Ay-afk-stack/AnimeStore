<?php
include("../includes/connect.php");
include("../functions/common_function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="icon" type="image/png" href="../img/head-logo.png">
<!-- BootStraps and css -->
<?php
include("./includes/links.php");
?>
</head>
<body>    <link rel="icon" type="image/png" href="../img/head-logo.png">
<!-- BootStraps and css -->
<?php
include("./includes/links.php");
?>
    <div class="container-fluid my-3">
        <h2 class="text-center mt-5">
            Admin Registration
        </h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../img/admin-regis.png" alt="admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <form action="" method="POST">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">
                            Username
                        </label>
                        <input type="text" autocomplete="off" id="username" name="username" placeholder="Enter your username"  class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">
                            Email
                        </label>
                        <input type="text" autocomplete="off" id="email" name="email" placeholder="Enter your email" class="form-control" required >
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">
                            Password
                        </label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control" required >
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">
                            Confirm Password
                        </label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" class="form-control" required >
                    </div>
                    <div class="form-outline mb-4">
                        <input type="submit" value="Register" class="btn btn-primary mb-2" name="admin_register">
                        <p class="fw-bold">Already have an account? <a href="admin_login.php" >Login</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- Bootstraps Js link -->
<?php include('../includes/bootstrapsjs.php') ?>
</body>
</html>
<?php
if (isset($_POST["admin_register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $confirmpassword = $_POST["confirm_password"];

    // select query

    $select_query = "Select * from `admin_table` where admin_name='username' or admin_email='$email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Username and email already exist.')</script>";
    } else if ($user_password != $conf_user_password) {
        echo "<script>alert('Password doesn;'t match.')</script>";
    } else {

        //insert Query
        $insert_query = "insert into `admin_table` (admin_name,admin_email,admin_password) values('$username','$email','$hash_password')";

        $sql_execute = mysqli_query($con, $insert_query);
        echo "<script>alert('User Created.')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    }



}



?>