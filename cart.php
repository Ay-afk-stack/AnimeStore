<?php
include ('./includes/connect.php');
include('./functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <link rel="icon" type="image" href="./img/head-logo.png">
    <style>
        .cart-image {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
    <?php include('./includes/links.php'); ?>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- Header navbar -->
        <?php include('./includes/header.php'); ?>
        <?php cart(); ?>

        <!-- Cart Contents -->
        <div class="pt-2">
            <h3 class="text-center">Your Cart</h3>
        </div>

        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">
                        <?php
                        global $con;
                        $username = $_SESSION['username'];

                        // Fetch user ID once
                        $get_user = "SELECT user_id FROM `user_table` WHERE username='$username'";
                        $result_user = mysqli_query($con, $get_user);
                        $user_data = mysqli_fetch_assoc($result_user);
                        $user_id = $user_data['user_id'];

                        $total_price = 0;
                        $cart_query = "SELECT * FROM `cart_details` WHERE user_id='$user_id'";
                        $result_cart = mysqli_query($con, $cart_query);
                        $cart_count = mysqli_num_rows($result_cart);

                        if ($cart_count > 0) {
                            echo "
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Remove</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>";

                            // Display each cart item
                            while ($cart_item = mysqli_fetch_assoc($result_cart)) {
                                $product_id = $cart_item['product_id'];
                                $quantity = $cart_item['quantity'];

                                // Fetch product details
                                $product_query = "SELECT * FROM `products` WHERE product_id='$product_id'";
                                $result_product = mysqli_query($con, $product_query);
                                $product_data = mysqli_fetch_assoc($result_product);

                                $product_name = $product_data['product_name'];
                                $product_image = $product_data['product_image1'];
                                $product_price = $product_data['product_price'];
                                $subtotal = $product_price * $quantity;
                                $total_price += $subtotal;

                                echo "
                                <tr>
                                    <td>{$product_name}</td>
                                    <td><img src='./admin_area/product_images/{$product_image}' alt='{$product_name}' class='cart-image'></td>
                                    <td><input type='number' name='qty[{$product_id}]' class='w-25 text-center' value='{$quantity}' min='1'></td>
                                    <td>Rs. {$subtotal}</td>
                                    <td><input type='checkbox' name='removeitem[]' value='{$product_id}'/></td>
                                    <td>
                                        <input type='submit' class='btn btn-success' name='update_cart' value='Update'>
                                        <input type='submit' class='btn btn-danger' name='remove_cart' value='Remove'>
                                    </td>
                                </tr>";
                            }
                            echo "</tbody>";
                        } else {
                            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                        }
                        ?>
                    </table>

                    <!-- Subtotal and Actions -->
                    <div class="my-3 d-flex">
                        <?php
                        if ($cart_count > 0) {
                            echo "
                            <h4>Subtotal: Rs. <strong class='text-dark'>{$total_price}/-</strong></h4>
                            <a href='products.php' class='mx-3 px-3 btn btn-outline-primary'>Continue Shopping</a>
                            <a href='checkout.php' class='mx-2 btn btn-outline-success px-3'>Checkout</a>";
                        } else {
                            echo "<a href='products.php' class='align-self-center mx-3 px-3 btn btn-outline-primary'>Continue Shopping</a>";
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Remove Cart Items -->
    <?php 
    function remove_cart_item() {
        global $con;
        if (isset($_POST['remove_cart'])) {
            foreach ($_POST['removeitem'] as $remove_id) {
                $delete_query = "DELETE FROM `cart_details` WHERE product_id='$remove_id'";
                $run_delete = mysqli_query($con, $delete_query);
                if ($run_delete) {
                    echo "<script>window.open('cart.php', '_self')</script>";
                }
            }
        }
    }
    remove_cart_item();
    ?>

    <!-- Footer -->
    <?php include('./includes/footer.php'); ?>
    <?php include('./includes/bootstrapsjs.php'); ?>
</body>
</html>
