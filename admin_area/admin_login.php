<?php
include("../includes/connect.php");
include("../functions/common_function.php");
if(isset($_POST['admin_login'])){
    include("../includes/connect.php");
    $username=$_POST["username"];
    $password=$_POST["password"];
    $select_query ="SELECT * FROM `admin_table` WHERE  `admin_name` = '$username'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if ($rows_count > 0) {
        while($row_data=mysqli_fetch_assoc($result)){
        if (password_verify($password, $row_data['admin_password'])) {
                session_start();
                $_SESSION['admin_name'] = $username;
                // echo "<script>alert('Login Successful')</script>";
                // echo "<script>window.open('index.php','_self')</script>";
                header("location: index.php");
                    exit();
            }
        }
    }
    else{
        echo "<script>alert('Invalid Credentials')</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
            Admin Login
        </h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../img/admin-login1.jpg" alt="admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 w-50 m-auto">
                <form action="" method="POST">
                    <div class="form-outline mb-4 ">
                        <label for="username" class="form-label">
                            Username
                        </label>
                        <input type="text" id="username" name="username" placeholder="Enter your username"  class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">
                        </label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control" required >
                    </div>
                    <div class="form-outline mb-4">
                        <input type="submit" value="Login" class="btn btn-primary mb-2" name="admin_login">
                        <p class="fw-bold">Don't you have an account? <a href="admin_registration.php" >Register</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- Bootstraps Js link -->
<?php include('../includes/bootstrapsjs.php') ?>
</body>
</html>

<!-- PHP code -->
