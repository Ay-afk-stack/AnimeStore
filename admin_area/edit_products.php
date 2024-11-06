<?php
if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    $get_data = "Select * from `products` where product_id=$edit_id";
    $result_query=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result_query);
    $product_title= $row["product_name"];
    $product_description= $row["product_description"];
    $product_price= $row["product_price"];
    $product_keywords = $row['product_keywords'];
    $category_id= $row['category_id'];
    $product_image1= $row['product_image1'];
    $product_image2= $row['product_image2'];
    $product_image3= $row['product_image3'];

    //fetching category name
    $select_category = "Select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category["category_title"];




}

?>



<div class="container mt-5">
    <h1 class="text-center text-success">Edit Products</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mt-3">
            <label for="product_title" class="form-label fs-5 fw-4">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" value="<?php echo $product_title ?>">
        </div>
        <div class="form-outline w-50 m-auto mt-3">
            <label for="product_description" class="form-label fs-5 fw-4">Product Description</label>
            <input type="text" id="product_description" name="product_description" class="form-control"value="<?php echo $product_description ?>">
        </div>
         <div class="form-outline w-50 m-auto mt-3">
            <label for="product_keywords" class="form-label fs-5 fw-4">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control" value="<?php echo $product_keywords ?>">
        </div>
         <div class="form-outline w-50 m-auto mt-3">
            <label for="product_category" class="form-label fs-5 fw-4">Product Category</label>
            <select name="product_category" class="form-select">
                <option value='<?php echo $category_id ?>'>
                    <?php echo $category_title ?>
                </option>
            <?php
            $select_category_all = "Select * from `categories`";
            $result_category_all=mysqli_query($con,$select_category_all);
            while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                 $category_title=$row_category_all["category_title"];
                 $category_id=$row_category_all["category_id"];
                echo "
                <option value='$category_id'>$category_title</option>
                ";
            }
           
            ?>


            </select>
        </div>
         <div class="form-outline w-50 m-auto mt-3">
            <label for="product_image1" class="form-label fs-5 fw-4">Product image1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" value="<?php echo $product_image1 ?>">
            <img src="./product_images/<?php echo $product_image1 ?>" class="product_image" alt="">
            </div>
        </div>
         <div class="form-outline w-50 m-auto mt-3">
            <label for="product_image2" class="form-label fs-5 fw-4">Product image2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto">
            <img src="./product_images/<?php echo $product_image2 ?>" class="product_image" alt="">
            </div>
        </div>
         <div class="form-outline w-50 m-auto mt-3">
            <label for="product_image3" class="form-label fs-5 fw-4">Product image3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto">
            <img src="./product_images/<?php echo $product_image3 ?>" class="product_image" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mt-3">
            <label for="product_price" class="form-label fs-5 fw-4">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" value="<?php echo $product_price ?>">
        </div>
        <div class="text-center my-4">
            <input type="submit" name="edit_product" value="Update" class="btn btn-success px-3 py-2">
        </div>
    </form>
</div>

<!-- Editing products -->
<?php
if (isset($_POST["edit_product"])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_price= $_POST['product_price'];
    $product_category = $_POST['product_category'];

    $product_image1= $_FILES['product_image1']['name'];
    $product_image2= $_FILES['product_image2']['name'];
    $product_image3= $_FILES['product_image3']['name'];  

    $temp_image1= $_FILES['product_image1']['tmp_name'];
    $temp_image2= $_FILES['product_image2']['tmp_name'];
    $temp_image3= $_FILES['product_image3']['tmp_name'];
    
    
    //Checking for fields empty or not
    if($product_title=='' or $product_description== '' or $product_keywords=='' or $product_image1=='' or $product_category=='' or $product_price==''){
        echo "<Script>alert('please Fill all the fields and continue the process')</Script>";
    }
    else{
        move_uploaded_file($temp_image1,'./product_images/$product_image1');
        move_uploaded_file($temp_image2,'./product_images/$product_image2');
        move_uploaded_file($temp_image3,'./product_images/$product_image3');

        //query to update products
        $update_product = "update `products` set category_id='$product_category',product_name='$product_title',product_description='$product_description',product_keywords='$product_keywords',product_price='$product_price',date=NOW(),product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3' where product_id=$edit_id ";
        $result_update = mysqli_query($con, $update_product);
        if ($result_update) {
            echo "<script>alert('Products updated successfully.')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        }
    }
}

?>