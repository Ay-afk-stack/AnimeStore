<?php
if(isset($_GET['edit_categories'])){
    $edit_id = $_GET['edit_categories'];
     //fetching category name
    $select_category = "Select * from `categories` where category_id=$edit_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category["category_title"];




}

?>
<div class="container mt-5">
    <h1 class="text-center text-success">Edit Category</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mt-3">
            <label for="category_title" class="form-label fs-5 fw-4">Category Title</label>
            <input type="text" id="category_title" name="category_title" class="form-control" value="<?php echo $category_title ?>">
        </div>
        <div class="text-center my-4">
            <input type="submit" name="edit_category" value="Update" class="btn btn-success px-3 py-2">
        </div>
</div>


<!-- Editing categoru -->
<?php
if (isset($_POST["edit_category"])) {
    $category_title = $_POST['category_title'];
    $update_category = "update `categories` set category_title='$category_title' where category_id=$edit_id";
    $result_category=mysqli_query($con,$update_category);
    if($result_category){
        echo "<script>alert('Category updated successfully.')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}

?>