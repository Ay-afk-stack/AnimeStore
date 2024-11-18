<?php
include ('./includes/connect.php');
// include('./functions/common_function.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="icon" type="image" href="./img/head-logo.png">
    <!-- Bootstraps,Fonts,styles -->
    
    <?php 
    include('./includes/links.php')
    ?>
</head>
<body>
    <!-- php to access user id -->
    <?php
    $user_id=$_SESSION['user_id'];
    $get_user = "Select * from `user_table` where user_id=$user_id";
    $result = mysqli_query($con, $get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];






    ?>



    <div class="container">
        <h1 class="text-center text-primary my-2">Payment Option</h1>
        <div class="row d-flex justify-content-center align-items-center my-5 ">
            <div class="col-md-6">
            <a href="https://esewa.com.np/#/home"  target="_blank"><img src="./img/esewalogo.png" class="w-100 mx-2" alt="esewa_logo"></a>
        </div>
            <div class="col-md-6"><h2 class="text-center mx-2">
            <a class="text-decoration-none cash-on-delivery  " href="order.php?user_id=<?php echo $user_id; ?>">Pay Offline</a></h2>
        </div>
        </div>
    </div>
</body>
</html>