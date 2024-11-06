<?php
$username = $_SESSION['username'];
$get_user = "Select * from `user_table` where username='$username'";
$result=mysqli_query($con, $get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];
?>

<h3 class="text-success text-center my-4">All My Orders</h3>
<table class="table table-bordered mt-5 me-5">
    <thead class="bg-primary text-center">
    <tr>
        <th>SNo.</th>
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Complete/InComplete</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="text-center">
        <?php
         $number = 0;
        $get_order_details = "Select * from `user_orders` where user_id=$user_id";
        $result_orders=mysqli_query($con, $get_order_details);
        while ($row_data = mysqli_fetch_assoc($result_orders)) {
            $order_id = $row_data["order_id"];
            $amount_due = $row_data["amount_due"];
            $total_products = $row_data["total_products"];
            $invoice_number = $row_data["invoice_number"];
            $order_status = $row_data["order_status"];
            if ($order_status == "pending") {
                $order_status = "Incomplete";
            } else {
                $order_status = "Complete";
            }

            $order_date = $row_data["order_date"];
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>";
        
            ?>
            <?php 
            if($order_status=="Complete"){
                echo"<td class='text-dark'>Paid</td></tr>";}
                else{
                    echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-decoration-none text-success'>Confirm</a></td>
            
        </tr>";
            $number++;
        }}
        ?>

    </tbody>
</table>
<a href="pdf.php" target="_blank" class="btn btn-danger my-3" value="print" id="print">Generate Bill</a>


