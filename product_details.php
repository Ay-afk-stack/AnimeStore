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
<style>
   .fa-star {
    color: #ddd;
    cursor: pointer;
    font-size: 2em; /* Increase star size */
    transition: color 0.2s;
  }
  .fa-star.checked {
    color: #ffc107;
}
    .product-image-container img {
                        width: 100%; /* Ensures the image takes full width of its container */
                        height: auto; /* Maintains aspect ratio */
                        max-height: 300px; /* Sets a maximum height for consistent alignment */
                        object-fit: cover; /* Ensures the image fills the area without distortion */ /* Adds a shadow for better visibility */
    }
</style>
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

</div> <!-- End of container -->
<!-- last child -->
 <div>
   <h3 class="text-center mt-3 my-4">Recommendation for you</h3>
 </div>
<div class="d-flex justify-content-center">
            <!-- fetching items -->
            <?php 
                SimilarCategory();
                getUniqueCategories();
            ?>
  <!-- col end -->
  </div>
</div>
<!-- Footer -->
<?php 
include ('./includes/footer.php');
?>



    
<!-- bootstrap js -->
<?php include('./includes/bootstrapsjs.php') ?>
<!-- RATING SCRIPT -->
<script>
  document.querySelectorAll('.fa-star').forEach(star => {
    star.addEventListener('click', function() {
      const rating = this.getAttribute('data-rating');
      document.getElementById('rating-value').value = rating;
      
      // Update the checked class for selected stars
      document.querySelectorAll('.fa-star').forEach(s => s.classList.remove('checked'));
      for (let i = 1; i <= rating; i++) {
        document.querySelector(`.fa-star[data-rating="${i}"]`).classList.add('checked');
      }
    });
  });
</script>

</body>
</html>