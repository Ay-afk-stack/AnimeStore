
        <?php
        $get_orders = "Select * from `user_orders`";
        $result=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result);
        if ($row_count > 0) {
          
        echo" 
        <h3 class='text-center text-success my-4'>All Orders</h3>
        <table class='table table-bordered mt-5'>
    <thead class='text-center bg-primary'>
               <tr>
            <th>SNo.</th>
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date/Time</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='text-center'>";
        } 
        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No Orders Yet.</h2>";
        } else {
          $number = 0;
          while ($row_data = mysqli_fetch_assoc($result)) {
            $order_id = $row_data["order_id"];
            $user_id = $row_data["user_id"];
            $amount_due = $row_data["amount_due"];
            $invoice_number = $row_data["invoice_number"];
            $total_products = $row_data["total_products"];
            $order_date = $row_data["order_date"];
            $order_status = $row_data["order_status"];
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_orders" class="text-decoration-none text-light">No</a></button>
        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-light" href="index.php?delete_orders=<?php echo $order_id;?>">Yes</a></button>
      </div>
    </div>
  </div>
</div>
           