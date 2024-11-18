<!-- Connection -->
<?php
include ('./includes/connect.php');
include('./functions/common_function.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <link rel="icon" type="image" href="./img/head-logo.png">
    <!-- Bootstraps,Fonts,styles -->
    <style>
        .cart-image{
            width: 80px;
            height: 80px;
            object-fit: contain;
}
    </style>
    <?php 
    include('./includes/links.php')
    ?>

</head>
<body>
  <!-- Navbar -->
<div class="container-fluid p-0">
        <!-- First Child -->
       <!-- Header navbar -->
       <?php include('./includes/header.php') ?>
       <!-- Calling cart function -->
       <?php  
       cart();
       ?>
<!-- contents -->
<div class="pt-2">
    <h3 class="text-center">Your Cart</h3>
</div>
<!-- contents-table -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
<!--php code to display -->
<?php
    global $con;
    $username = $_SESSION['username'];
    $get_details = "Select * from `user_table` where username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
       $user_id = $row_query["user_id"];
    }
    $total_price=0;
    $cart_query="select * from `cart_details` where user_id='$user_id'";
    $result_query=mysqli_query($con,$cart_query);
    $result_count=mysqli_num_rows($result_query);
    if($result_count>0){
        echo "            <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Remove</th>
            <th colspan='2'>Operations</th>
        </tr>
    </thead>
    <tbody>";


    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $select_products="select * from `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $price_table=$row_product_price['product_price'];
            $product_name=$row_product_price['product_name'];
            $product_image1=$row_product_price['product_image1'];
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
       
?>
                <tr>
                    <td><?php echo $product_name ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart-image"></td>
                    <td><input type="number" name="qty" class="w-25 text-center" value="1" autocomplete=off></td>
                    <?php 
                    $username = $_SESSION['username'];
                    $get_details = "Select * from `user_table` where username='$username'";
                    $result_query = mysqli_query($con, $get_details);
                    while ($row_query = mysqli_fetch_array($result_query)) {
                    $user_id = $row_query["user_id"];
                    }
                        if(isset($_POST['update_cart'])){
                                $quantities=$_POST['qty'];
                                $update_cart="update `cart_details` set quantity=$quantities where user_id='$user_id'";
                                $result_products_quantity=mysqli_query($con,$update_cart);
                        $total_price = $total_price * $quantities;
                        }
                    ?>
                    <td><?php echo $product_values ?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"/></td>
                    <td class="d-flex justify-content-center">
                    <input type="submit" class="mx-3 px-3 btn btn-success" name="update_cart" value="Update" >
                    <input type="submit" class="mx-3 px-3 btn btn-danger" name="remove_cart" value="Remove" >
                    </td>
                </tr>
<?php 
    }
 }
}

else{
    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
}
?>
            </tbody>
        </table>
        <div class="my-3 d-flex">
            <?php 
                 $username = $_SESSION['username'];
    $get_details = "Select * from `user_table` where username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
       $user_id = $row_query["user_id"];
    }
                 $cart_query="select * from `cart_details` where user_id='$user_id'";
                 $result_query=mysqli_query($con,$cart_query);
                 $result_count=mysqli_num_rows($result_query);
                 if($result_count>0){
                    echo "
                    <h4>
                    Subtotal: Rs.<strong class='text-dark'>$total_price/-</strong>
                </h4>
                <a href='products.php' class='mx-3 px-3 btn btn-outline-primary'>Continue Shopping</a>
                <a href='checkout.php' class=' mx-2 btn btn-outline-success px-3'>Checkout</a>";
                }
                else{
                    echo " <a href='products.php' class='align-self-center mx-3 px-3 btn btn-outline-primary'>Continue Shopping</a>";
                }
            ?>


        </div>
        
        
    </div>
</div>
</form>
<!-- To remove items -->
<?php 
     function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){    
                echo $remove_id;
                $delete_query="Delete from `cart_details` where product_id=$remove_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
    }
    echo $remove_item=remove_cart_item();

?>

<!-- last child -->
<!-- Footer -->
<?php 
include ('./includes/footer.php');
?>



    
<!-- bootstrap js -->
<?php include('./includes/bootstrapsjs.php') ?>
</body>
</html>