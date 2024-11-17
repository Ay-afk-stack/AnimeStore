<?php
include("../includes/connect.php");
include("../functions/common_function.php");
session_start();
$username=$_SESSION['admin_name'];
if(!isset($username)) {
    header('Location: admin_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>
    <link rel="icon" type="image/png" href="../img/head-logo.png">
<!-- BootStraps and css -->
<?php
include("./includes/links.php");
?>
<style>
    body{
        overflow-x: hidden;
    }
    .product_image{
        width: 100px;
        object-fit: contain;
    
    }
</style>
</head>
<body> <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- first Child -->
        <nav class="navbar navbar-expand-md navbar-light bg-primary">
            <div class="container-fluid">
                <img src="../img/brand-logo1.png" class="logo" alt="">
                <nav class="navbar navbar-expand-md navbar-light ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link text-decoration-none text-white text-capitalize">Welcome <?php echo $username ?></a>
                        </li>
                        <li>
                            <a href="admin_logout.php" class="nav-link text-decoration-none text-white text-capitalize">Logout</a>
                        </li>

                    </ul>
                </nav>
            </div>

        </nav>
<!-- Second child -->
<div class="mx-auto">
    <h3 class="text-center p-2 my-4">Manage Details</h3>

    <!-- Row for Stats Cards -->
    <div class="row mx-auto d-flex justify-content-center">
        <!-- No. of Products -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-left-primary shadow-sm h-100 py-3">
                <div class="card-body d-flex align-items-center">
                    <div class="col mr-3">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            No. Of Products
                        </div>
                        <?php
                            $products = "SELECT * FROM products";
                            $result = mysqli_query($con, $products);
                            if ($result) {
                                $itemsCount = mysqli_num_rows($result);
                            }
                        ?>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            <?php echo $itemsCount; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-box fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- No. of Categories -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-left-success shadow-sm h-100 py-3">
                <div class="card-body d-flex align-items-center">
                    <div class="col mr-3">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            No. Of Categories
                        </div>
                        <?php
                            $categories = "SELECT * FROM categories";
                            $result = mysqli_query($con, $categories);
                            if ($result) {
                                $categoriesCount = mysqli_num_rows($result);
                            }
                        ?>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            <?php echo $categoriesCount; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-layer-group fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-left-warning shadow-sm h-100 py-3">
                <div class="card-body d-flex align-items-center">
                    <div class="col mr-3">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Earnings
                        </div>
                        <?php
                            $ordersMoney = "SELECT * FROM user_orders";
                            $result = mysqli_query($con, $ordersMoney);
                            $number = 0;
                            while ($row_data = mysqli_fetch_assoc($result)) {
                                $order_status = $row_data["order_status"];
                                if ($order_status == "Complete") {
                                    $order_price = $row_data["amount_due"];
                                    $number = $number + $order_price;
                                }
                            }
                        ?>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            Rs. <?php echo number_format($number, 2); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-money-bill-wave fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Row -->
</div>


        <!-- Third Child -->
         <hr />
        <div class="row">
            <div class="col-md-12 p-1  bg-info-emphasis  d-flex align-items-center">
                <!-- button*10>a.nav-link.text-light -->
                <div class="button text-center mx-auto">
                    <a href="index.php?insert_product" class="btn btn-primary m-1">Insert Products</a>
                    <a href="index.php?view_products" class="btn btn-primary m-1">View Products</a>
                    <a href="index.php?insert_categories" class="btn btn-primary m-1">Insert Categories</a>
                    <a href="index.php?view_categories" class="btn btn-primary m-1">View Categories</a>
                    <a href="index.php?list_orders" class="btn btn-primary m-1">All Orders</a>
                    <a href="index.php?list_payments" class="btn btn-primary m-1">All Payments</a>
                    <a href="index.php?list_users" class="btn btn-primary m-1">List Users</a>

                </div>
            </div>
        </div
        <!-- Fourth Child -->
        <div class="container my-2">
            <!-- For Insert -->
            <?php
            if (isset($_GET['insert_product'])) {
                include('insert_product.php');
            }
            if (isset($_GET['insert_categories'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['delete_products'])) {
                include('delete_products.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['edit_categories'])) {
                include('edit_categories.php');
            }
            if (isset($_GET['delete_categories'])) {
                include('delete_categories.php');
            }
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            if (isset($_GET['delete_orders'])) {
                include('delete_orders.php');
            }
            if (isset($_GET['list_payments'])) {
                include('list_payments.php');
            }
            if (isset($_GET['delete_payments'])) {
                include('delete_payments.php');
            }
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }
            if (isset($_GET['delete_users'])) {
                include('delete_users.php');
            }
            
            ?>
        </div>
    </div>


    <!-- Bootstraps Js link -->
<?php include('../includes/bootstrapsjs.php') ?>
</body>
</html>