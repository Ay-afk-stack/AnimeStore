
        <?php
        $get_users = "Select * from `user_table`";
        $result=mysqli_query($con,$get_users);
        $row_count=mysqli_num_rows($result);
        if ($row_count > 0) {
          
        echo" 
        <h3 class='text-center text-success my-4'>All Users</h3>
        <table class='table table-bordered mt-5'>
    <thead class='text-center'>
               <tr>
            <th>SNo.</th>
            <th>Username</th>
            <th>Email</th>
            <th>User Image</th>
            <th>User address</th>
            <th>User Mobile</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='text-center'>";
        } 
        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No Users Found.</h2>";
        } else {
          $number = 0;
          while ($row_data = mysqli_fetch_assoc($result)) {
            $user_id = $row_data["user_id"];
            $username = $row_data["username"];
            $email = $row_data["user_email"];
            $user_image = $row_data["user_image"];
            $user_address = $row_data["user_address"];
            $user_mobile = $row_data["user_mobile"]; 
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$username</td>
            <td>$email</td>
            <td><img src='../user_images/$user_image' class='product_image'></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            <td><a class='text-dark btn' data-toggle='modal' data-target='#exampleModalCenter'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
        </tr>";
          }
        }
        ?>



  
    </tbody>
</table>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you Sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_payments" class="text-decoration-none text-light">No</a></button>
        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-light" href="index.php?delete_users=<?php echo $user_id;?>">Yes</a></button>
      </div>
    </div>
  </div>
</div>
           