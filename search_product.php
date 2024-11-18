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
    <!-- Bootstraps,Fonts,styles -->
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
       <?php cart(); ?>

<!-- third child -->
<div class=" mt-2">
    <h3 class="text-center">Items and Accessories</h3>
    <p class="text-center">Get Your Anime merch and accessories.</p>
     <form class="d-flex position-relative mb-3 mx-auto w-25" role="search" action="search_product.php" method="get">
            <input class="form-control fs-5 me-3 " type="search" placeholder="Search" aria-label="Search"
              name="search_data"  autocomplete="off">
              
            <input class="btn btn-primary fs-5" type="submit" value="search" name="search_data_product">
        
          </form>
</div>


<!-- Fourth Child -->
<!-- Fourth Child -->
    <div class="container my-4">
        <!-- Products Row -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <!-- fetching items -->
            <?php 
                searchProduct();
                getUniqueCategories();
            ?>
  <!-- col end -->
</div>
<!-- fourth end -->
</div>

<!-- last child -->
<!-- Footer -->
<?php 
include ('./includes/footer.php');
?>



    
<!-- bootstrap js -->
<?php include('./includes/bootstrapsjs.php') ?>
</body>
</html>