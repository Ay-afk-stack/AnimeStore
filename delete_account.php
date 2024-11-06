
<form action="" method="POST">
<div class="form-outline m-auto w-50 my-5">
    <input type="submit"class="form-outline btn btn-outline-danger w-50 my-5" name="delete" value="Delete Account">
</div>

</form>

<?php
$username_session = $_SESSION['username'];
if (isset($_POST['delete'])) {
    $delete_query = "Delete From `user_table` where username='$username_session'";
    $result=mysqli_query($con, $delete_query);
    if($result){
        session_destroy();
        echo"<script>alert('Your Account have been deleted.')</script>";
        echo"<script>window.open('index.php','_self')</script>";
    }
}
?>