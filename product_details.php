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

<!-- fourth Child -->
<div class="row px-1 m-2">
  <!-- Products -->
<div class="col-md-12">
      <div class="row border rounded">
            <!-- fetching items -->
            <?php 
                view_details();
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