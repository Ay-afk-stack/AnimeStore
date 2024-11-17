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
<!-- second child -->
<!-- third -->
<div class=" pt-3">
    <h3 class="text-center my-2">Items and Accessories</h3>
    <p class="text-center">Get Your Anime merch and accessories.</p>
</div>

<!-- Fourth Child: Product List Section -->
<div class="container my-4">
    <div class="border p-4 rounded shadow-sm">
        <div class="">
            <!-- Fetching items -->
            <?php 
                view_details();
                getUniqueCategories();
            ?>
        </div>
    </div>
</div> <!-- End of container -->
<!-- last child -->
 <div>
   <h3 class="text-center mt-3 my-2">Related Products</h3>
 </div>
<div class="d-flex justify-content-center">
            <!-- fetching items -->
            <?php 
                SimilarCategory();
                getUniqueCategories();

            ?>
  <!-- col end -->
  </div>
<!-- Footer -->
<?php 
include ('./includes/footer.php');
?>



    
<!-- bootstrap js -->
<?php include('./includes/bootstrapsjs.php') ?>
</body>
</html>