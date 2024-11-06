<!-- Connection -->
<?php
include ('./includes/connect.php');
include('./functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AR Store</title>
    <link rel="icon" type="image" href="./img/head-logo.png">
    <!-- Bootstraps,Fonts,styles -->
    
    <?php 
    include('./includes/links.php')
    ?>
    <style>
       .profile_picture{
        background-color: white;
        width: 90%;
        height:90%;
        object-fit: contain;
       }
       .edit_image{
        width: 100px;
        height: 100px;
        object-fit: contain;
       }
    </style>
</head>
<body>
  <!-- Navbar -->
<div class="container-fluid p-0">
       <?php include('./includes/header.php') ?>
       <?php  
       cart();
       ?>
<!-- profile -->

<div class="row">
  <div class="col-md-2">
      <ul class=" navbar-nav bg-secondary text-center text-white m-2">
        <li class="nav-item bg-primary">
        <h4><a href="#" class="text-white text-decoration-none">Your Profile</a></h4>
        </li>
        <?php
        $username = $_SESSION['username'];
        $user_image = "Select * from `user_table` where username='$username'";
        $result_image=mysqli_query($con,$user_image);
        $row_image=mysqli_fetch_array($result_image);
        $user_image = $row_image['user_image'];
        echo "<li class='nav-item p-2'>
        <img src='./user_images/$user_image' class='profile_picture alt=''>
        </li>
        ";
        ?>
        <li class="nav-item ">
        <h6><a href="profile.php" class="text-white text-decoration-none">Pending Orders</a>
        </li></h6>
        <li class="nav-item ">
        <h6><a href="profile.php?edit_account" class="text-white text-decoration-none">Editing Account</a>
        </li></h6>
        <li class="nav-item ">
        <h6><a href="profile.php?my_orders" class="text-white text-decoration-none">My Orders</a>
        </li></h6>
        <li class="nav-item ">
        <h6><a href="profile.php?delete_account" class="text-white text-decoration-none">Delete Account</a>
        </li></h6>
        <li class="nav-item ">
        <h6><a href="logout.php" class="text-white text-decoration-none">Logout</a>
        </li></h6>
      </ul>
  </div>
  <div class="col-md-10">
       <?php
       get_user_order_details();
       if (isset($_GET["edit_account"])) {
        include("edit_account.php");
      }
       if (isset($_GET["my_orders"])) {
        include("user_orders.php");
      }
       if (isset($_GET["delete_account"])) {
        include("delete_account.php");
      }
       ?>
  </div>
</div>





<!-- Footer -->
<?php 
include ('./includes/footer.php');
?> 
<!-- bootstrap js -->
<?php include('./includes/bootstrapsjs.php') ?>
</body>
</html>