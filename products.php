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

<!-- Fourth Child -->
<div class="row px-1 m-2">
  <!-- Products -->
<div class="col-md-12">
      <div class="row">
            <!-- fetching items -->
            <?php 
                allProducts();
                getUniqueCategories();

            ?>
      <!-- row end -->
  </div>
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