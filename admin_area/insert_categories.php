<?php 
    include('../includes/connect.php');
    if(isset($_POST['insert_cat'])){
      $category_title=$_POST['cat_title'];

      // select data from database
      $select_query="Select * from `categories` where category_title='$category_title'";
      $result_select=mysqli_query($con,$select_query);
      $number=mysqli_num_rows($result_select);
      // checking the data from database.
      if($number>0){
        echo "<script>alert('Already in the Database.')</script>";
      }
      else{
      // insertion
      $insert_query="insert into `categories` (category_title) values ('$category_title')";
      $result=mysqli_query($con,$insert_query);
      if($result){
        echo "<script>alert('category added')</script>";
      }
    }
  }
?>

<form action="" method="post" class="my-2">
  <h3 class="text-center ">Insert Categories</h3>
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-primary" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" autocomplete="off" \>
</div>
<div class="input-group w-10 my-2 m-auto">
<input type="submit" class="btn btn-primary p-2 my-2 border-0" name="insert_cat" value="insert categories" placeholder="Insert Categories"\>
</div>
</form>