<?php
include ('./includes/connect.php');
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "Select * from `user_orders` where order_id=$order_id";
    $result = mysqli_query($con,$select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch["invoice_number"];
    $amount_due = $row_fetch['amount_due'];
}
if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount_due = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query="insert into `user_payments` (order_id,invoice_number,amount,payment_mode) values($order_id,$invoice_number,$amount_due,'$payment_mode')";
    $result = mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Your Order is Confirmed and will arrive within 2,3 days.')</script>";
        echo"<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders = "Update `user_orders` set order_status='Complete' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
   <link rel="icon" type="image" href="./img/head-logo.png">
    <!-- Bootstraps,Fonts,styles -->
    
    <?php 
    include('./includes/links.php')
    ?>
</head>
<body class="bg-secondary">
    <h1 class="text-center text-light mt-5">
        Confirm Payment
    </h1>
    <div class="container my-5">
        <form action="" method="POST">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light mb-2 fs-5">Invoice Number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number
                 ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light mb-2 fs-5">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due
                 ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light mb-2 fs-5">Select Payment</label>
                <select name="payment_mode" id="payment_mode" class="form-select w-50 m-auto">
                    <option value="Select payment mode">Select Payment Mode</option>
                    <option value="Mobile Banking">Mobile Banking</option>
                    <option value="Esewa">Esewa</option>
                    <option value="Khalti">Khalti</option>
                    <option value="Cash on delivery">Cash on delivery</option>
                </select>
            </div>
            <div class="form-outline text-center w-50 m-auto">
                <input type="submit" value="confirm" class=" py-2 px-3 rounded btn btn-success" name="confirm_payment">
            </div>
        </form>
    </div>
    
<!-- bootstrap js -->
<?php include('./includes/bootstrapsjs.php') ?>
</body>
</body>
</html>