<!-- Connection -->
<?php
include ('./includes/connect.php');
include('./functions/common_function.php');

if(isset($_POST['Submit'])){
    $email = $_POST['email'];
    $mobile = $_POST['phone'];
    $message = $_POST['message'];
    if($email=='' or $mobile=='' or $message==''){
        echo "<h3 class='text-center text-danger'>Please Fill All the fields</h3>";
    }
    else{
    $insert_query="insert into `contact_table` (email,mobile,message) values ('$email','$mobile','$message')";
        $result = mysqli_query($con, $insert_query);
        if($result){
            echo "<script>alert('Message sent.')</script>";
        }
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AR Store</title>
    <link rel="icon" type="image" href="./img/head-logo.png">
    <!-- Bootstraps,Fonts,styles -->
    
    <?php 
    include('./includes/links.php')
    ?>
<style>
    body{
    background:lightblue;
}
.contact-form{
    background: #fff;
    margin-top: 5%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}
</style>
</head>
<body>
  <!-- Navbar -->
<div class="container-fluid p-0">
       <!-- Header navbar -->
       <?php include('./includes/header.php') ?>
       <!-- Calling cart function -->
       <?php  
       cart();
       ?>
       <!-- Contact info -->
<div class="container contact-form">
            <form method="POST">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                        <div class="form-group mb-4">
                            <input type="submit" name="Submit" class="btn btn-danger" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
</div>

<!-- Footer -->
<?php 
include ('./includes/footer.php');
?>



    
<!-- bootstrap js -->
<?php include('./includes/bootstrapsjs.php') ?>
</body>
</html>