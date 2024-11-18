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
    <title>AR Store</title>
    <link rel="icon" type="image" href="./img/head-logo.png">

    <!-- Bootstraps -->
    <?php  include('./includes/links.php') ?>
<body>
  <!-- Navbar -->
<div class="container-fluid p-0">
<!-- First Child -->
<?php include('./includes/header.php') ?>
<?php cart(); ?>

<!-- third child -->
<div class="mt-2">
    <h3 class="text-center pt-2">Items and Accessories</h3>
    <p class="text-center">Get Your Anime merch and accessories.</p>
</div>

<!-- search Child -->
 <form class="d-flex position-relative mx-auto w-25" role="search" action="search_product.php" method="get">
            <input class="form-control fs-5 me-3 " type="search" placeholder="Search" aria-label="Search"
              name="search_data"  autocomplete="off">
              
            <input class="btn btn-primary fs-5" type="submit" value="search" name="search_data_product">
        
          </form>
<!-- Fourth Child -->
    <div class="container my-4">
        <!-- Products Row -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <!-- fetching items -->
            <?php 
                allProducts();
                getUniqueCategories();
            ?>
  <!-- col end -->
</div>
<!-- fourth end -->
</div>
<!-- footer -->
<?php 
include ('./includes/footer.php');
?>
</div>
    
<!-- Bootstraps js -->
<?php include('./includes/bootstrapsjs.php') ?>
</body>
</html>