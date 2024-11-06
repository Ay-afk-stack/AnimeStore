
<h3 class="text-center text-success mt-3">All Products</h3>
<table class="table table-bordered mt-5">
<thead class="text-center">
    <tr>
        <th>Product ID</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Total Sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

</thead>
<tbody class="text-center">
<?php
$get_products = "Select * from `products`";
$result=mysqli_query($con,$get_products);
$number = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $product_id = $row["product_id"];
    $product_title = $row["product_name"];
    $product_image1 = $row["product_image1"];
    $product_price = $row["product_price"];
    $status = $row["status"];
    $number++;
    ?>


    <tr>
        <th><?php echo $number ?></th>
        <th><?php echo $product_title ?></th>
        <th><img src='./product_images/<?php echo $product_image1; ?>' class='product_image'></th>
        <th><?php echo $product_price ?></th>
        <th>1</th>
        <th><?php
        $get_count = "Select * from `orders_pending` where product_id=$product_id";
        $result_count = mysqli_query($con, $get_count);
        $rows_count = mysqli_num_rows($result_count);
        echo $rows_count;
        ?></th>
        <th><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-dark'><i class='fa fa-pencil' aria-hidden='true'></i></a></th>
        <th><a  data-toggle="modal" data-target="#exampleModalCenter" class='text-dark btn'><i class='fa fa-trash' aria-hidden='true'></i></a></th>
    </tr>
    <?php
}
    ?>




</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you Sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?edit_categories" class="text-decoration-none text-light">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_products=<?php echo $product_id ?>' class="text-decoration-none text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>