<!-- Connection -->
<?php
include ('./includes/connect.php');
include('./functions/common_function.php');
@session_start();
echo "<script>window.print()</script>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Report</title>
        <link rel="icon" type="image" href="./img/head-logo.png">
    <!-- Bootstraps,Fonts,styles -->
    
    <?php 
    include('./includes/links.php')
    ?>
</head>
<body class="container">
    <h2 class="text-center mt-5">Bill Receipt</h2>
    <div class="row container justify-content-between">
        <div class="col-3">
            <h3>From:</h3>
            <p class="fs-4">AR store</p>
            <p>+977 9812312322</p>
            <p>Kathmandu</p>
        </div>
            <?php
            $total = 0;
$username = $_SESSION['username'];
$get_user = "Select * from `user_table` where username='$username'";
$result=mysqli_query($con, $get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];
$get_address=$row_fetch['user_address'];
$get_mobile=$row_fetch['user_mobile'];
?>
        <div class="col-3">  
            <h3>To:</h3>
            <p class="fs-4 text-capitalize"><?php echo $_SESSION['username'] ?></p>
            <p>+977 <?php echo $get_mobile ?></p>
            <p><?php echo $get_address ?></p>
        </div>
    </div>

<table class="table table-bordered mt-5 me-5 ">
    <thead class="bg-primary text-center">
    <tr>
        <th>SNo.</th>
        <th>Invoice Number</th>
        <th>Total Products</th>
        <th>Date</th>
        <th>Total Cost</th>
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
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$amount_due</td>";
            $total = $total + $amount_due;
        }
            ?>
        <tr>
        <td colspan='4'>Grand Total</td>
        <td>Rs:<?php echo $total ?></td>
        </tr>
    </tbody>
</table>
</body>
</html>