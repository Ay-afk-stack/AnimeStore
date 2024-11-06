
<h3 class="text-center text-success mt-3">All Categories</h3>
<table class="table table-bordered mt-5">
<thead class="text-center">
    <tr>
        <th>SNo.</th>
        <th>Category Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

</thead>
<tbody class="text-center">
<?php
$get_categories = "Select * from `categories`";
$result=mysqli_query($con,$get_categories);
$number = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $category_id = $row["category_id"];
    $category_title = $row["category_title"];
    $number++;
    ?>


    <tr>
        <th><?php echo $number ?></th>
        <th><?php echo $category_title ?></th>
        <th><a href='index.php?edit_categories=<?php echo $category_id ?>' class='text-dark'><i class='fa fa-pencil' aria-hidden='true'></i></a></th>
        <th><a class='text-dark btn' data-toggle="modal" data-target="#exampleModalCenter"><i class='fa fa-trash' aria-hidden='true'></i></a></th>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_categories" class="text-decoration-none text-light">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_categories=<?php echo $category_id ?>' class="text-decoration-none text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>