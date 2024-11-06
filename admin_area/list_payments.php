
        <?php
        $get_payments = "Select * from `user_payments`";
        $result=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result);
        if ($row_count > 0) {
          
        echo" 
        <h3 class='text-center text-success my-4'>All Payments</h3>
        <table class='table table-bordered mt-5'>
    <thead class='text-center'>
               <tr>
            <th>SNo.</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Order Date/Time</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='text-center'>";
        } 
        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No Payments Yet.</h2>";
        } else {
          $number = 0;
          while ($row_data = mysqli_fetch_assoc($result)) {
            $order_id = $row_data["order_id"];
            $payment_id = $row_data["payment_id"];
            $amount = $row_data["amount"];
            $invoice_number = $row_data["invoice_number"];
            $payment_mode = $row_data["payment_mode"];
            $order_date = $row_data["date"]; 
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$order_date</td>
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
        <button type="button" class="btn btn-primary"><a class="text-decoration-none text-light" href="index.php?delete_payments=<?php echo $payment_id;?>">Yes</a></button>
      </div>
    </div>
  </div>
</div>
           