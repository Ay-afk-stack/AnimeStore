<?php
//including database
// include("./includes/connect.php");


//getting categories
function getCategories()
{
    global $con;
    $select_category = "select * from `categories`";
    $result_category = mysqli_query($con, $select_category);
    while ($row_data = mysqli_fetch_assoc($result_category)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "
              
              <a href='products.php?categories=$category_id' class='dropdown-item text-capitalize'>$category_title</a>
              
              ";

    }
}
//getting Products

function getProducts()
{
    global $con;
    //condition to check isset or not:
    if (!isset($_GET['categories'])) {

        $select_query = "select * from `products` order by rand() LIMIT 0,3";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo " <div class='col-md-4 mb-3'>
                
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top p-2' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='fs-5'>Rs-$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To Cart</a>
                                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                        
                                </div>
                            </div>
                            </div>";
        }
    }
}
// Getting all products
function allProducts()
{
    global $con;
    //condition to check isset or not:
    if (!isset($_GET['categories'])) {

        $select_query = "select * from `products` order by rand()";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo " <div class='col-md-4 mb-3'>
                
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top p-2' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='fs-5'>Rs-$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To Cart</a>
                                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                        
                                </div>
                            </div>
                            </div>";
        }
    }
}
//getting a single categories
function getUniqueCategories()
{
    global $con;
    //condition to check isset or not:
    if (isset($_GET['categories'])) {
        $category_id = $_GET['categories'];
        $select_query = "select * from `products` where category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows === 0) {
            echo " <h2 class='text-center text-danger'>No Stock For This Category</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo " <div class='col-md-4 mb-3'>
                
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top p-2' alt='$product_name'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='fs-5'>Rs-$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To Cart</a>
                                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                        
                                </div>
                            </div>
                            </div>";
        }
    }
}
// searching product

function searchProduct()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows === 0) {
            echo " <h2 class='text-center text-danger'>No Result Found.</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo " <div class='col-md-4 mb-3'>
                
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top p-2' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='fs-5'>Rs-$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To Cart</a>
                                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                        
                                </div>
                            </div>
                            </div>";
        }
    }
}

//view details function\\
function view_details()
{
    global $con;
    //condition to check isset or not:
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['categories'])) {
            $product_id = $_GET['product_id'];
            $select_query = "select * from `products` where product_id=$product_id";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $product_description = $row['product_description'];
                $product_keywords = $row['product_keywords'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];
                $product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                echo " <div class='col-md-4 my-4'>
                
                <div class='card pt-2'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top pt-2' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='fs-5'>Rs-$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To Cart</a>
                                        <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                        
                                </div>
                            </div>
                            </div>
                            <div class='col-md-8'>
                            <!--related Images -->
                            <div class='row m-2'>
                              <div class='col-md-12'>
                                <h4 class='text-center m-2'>Related Products</h4>
                              </div>
                              <div class='col-md-6'>
                              <img src='./admin_area/product_images/$product_image2' class='card-img-top p-2 border' alt='...'>
                              </div>
                              <div class='col-md-6'>
                              <img src='./admin_area/product_images/$product_image3' class='card-img-top p-2 border' alt='...'>
                              </div>
                            </div>
                            <p class='fs-5 mt-4'>$product_description</p>
                          </div>
                            
                            ";
            }
        }
    }
}
//get Ip address function
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

//Cart Function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "select * from `cart_details` where ip_address='$get_ip' and product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('Item already Added.')</script>";
            echo "<script>window.Open('index.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip',0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Items Added To Cart!')</script>";
            echo "<script>window.Open('index.php','_self')</script>";
        }
    }
}

// function for cart items num
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip = getIPAddress();
        $select_query = "select * from `cart_details` where ip_address='$get_ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip = getIPAddress();
        $select_query = "select * from `cart_details` where ip_address='$get_ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

//get user order details
function get_user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "Select * from `user_table` where username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
       $user_id = $row_query["user_id"];
        if (!isset($_GET["edit_account"])) {
            if (!isset($_GET["my_orders"])) {
                if (!isset($_GET["delete_account"])) {
                    $get_order = "Select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_orders_query=mysqli_query($con, $get_order);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if($row_count>0){
                        echo"<h3 class='text-center text-success my-5'>You have <span class='text-danger'>$row_count</span> pending Orders.<p class='my-2'>
                        <a class='text-dark' href='profile.php?my_orders'>Order Details</a><p></h3>
                        ";
                    }
                    else{
                        echo "<h3 class='text-center text-success my-5'>You have <span class='text-danger'>0</span> Pending Order.<p class='my-2'>
                        <a class='text-dark' href='index.php'>Explore Products</a><p></h3>";
                    }
                }
            }
        }
    }
}






?>