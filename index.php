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
       <!-- Calling cart function -->
       <?php  
       cart();
       ?>
<!-- second child -->
<div class="">
  <div class="card w-100">
    <div class="container w-100">
    <img src="./img/homepageback-gojo.jpg" class=" img-fluid w-100" alt="Gojo image">
    </div>
<div class="card-img-overlay">
    <div class="card-body text-dark px-5 mt-5">
      <p class="card-title display-1 font-weight-bolder">Anime Store</p>
      <p class="card-subtitle display-4 font-weight-light">Cheap and Get Goods at your door step</p>
      <a href="products.php" role="button" class="btn btn-primary mt-5">Shop Now</a>

    </div>
  </div>
  </div>
</div>
<!-- third -->
<div class=" pt-2">
    <h3 class="text-center">Items and Accessories</h3>
    <p class="text-center">Get Your Anime merch and accessories.</p>
</div>

<!-- fourth Child -->
<div class="row px-1 m-2">
  <!-- Products -->
<div class="col-md-12">
      <div class="row">
            <!-- fetching items -->
            <?php 
                getProducts();
                getUniqueCategories();

            ?>
      <!-- row end -->
    </div>
  <!-- col end -->
  </div>
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