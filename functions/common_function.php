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
            echo " <div class='mx-3 mb-3'>
                
                <div class='card'>
                <div class='card-body'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top p-2' alt='...'>
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

//Similar Category
function SimilarCategory() {
    global $con;

    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        // 1. Fetch the category_id of the current product
        $select_query = "SELECT * FROM products WHERE product_id = $product_id";
        $result_query = mysqli_query($con, $select_query);
        
        // If product exists, get the category ID
        if ($row = mysqli_fetch_assoc($result_query)) {
            $category_id = $row['category_id'];

            // 2. Fetch other products from the same category, excluding the current product
            $related_query = "SELECT * FROM products WHERE category_id = $category_id AND product_id != $product_id order by rand() LIMIT 3"; // Fetch up to 4 related products
            $related_result = mysqli_query($con, $related_query);

            // 3. Display the related products
            while ($related_row = mysqli_fetch_assoc($related_result)) {
                $related_product_id = $related_row['product_id'];
                $related_product_name = $related_row['product_name'];
                $related_product_price = $related_row['product_price'];
                $related_product_image1 = $related_row['product_image1'];

                echo "
                <div class='mx-3 mb-3'>
                
                <div class='card'>
                <div class='card-body'>
                    <img src='./admin_area/product_images/$related_product_image1' class='card-img-top p-2' alt='...'>
                        <h5 class='card-title'>$related_product_name</h5>
                        <p class='fs-5'>Rs-$related_product_price</p>
                        <a href='index.php?add_to_cart=$related_product_id' class='btn btn-primary'>Add To Cart</a>
                                        <a href='product_details.php?product_id=$related_product_id' class='btn btn-secondary'>View More</a>
                                        
                                </div>
                            </div>
                            </div>
                ";
            }
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
            echo " <div class='p-2'>
                
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
        $search_query = "select * from products where product_keywords like '%$search_data_value%'";
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
                echo " <div class='container my-4'>
    <div class='row g-4'>
        <!-- Product Card Section (left side) -->
        <div class='col-md-4'>
            <div class='card border rounded shadow-sm h-100 '>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top pt-3' alt='Product Image'>
                <div class='card-body'>
                    <h5 class='card-title pt-3 ps-3'>$product_name</h5>
                    <p class='fs-5 text-muted ps-3'>Rs-$product_price</p>
                    <div class='d-flex justify-content-between'>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary position-absolute start-0 bottom-0 mb-4 ms-4'>Add To Cart</a>
                        <a href='index.php' class='btn btn-secondary position-absolute bottom-0  end-0 mb-4 me-4'>Go Home</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Description and Related Images Section (right side) -->
        <div class='col-md-8'>
            <!-- Related Images Section -->
            <div class='border p-3 rounded shadow-sm mb-4'>
                <h4 class='text-center mb-3'>Other Images</h4>
                <div class='row g-2'>
                    <div class='col-md-6'>
                        <img src='./admin_area/product_images/$product_image2' class='img-fluid card-img-top rounded ' alt='...'>
                    </div>
                    <div class='col-md-6'>
                        <img src='./admin_area/product_images/$product_image3' class='img-fluid card-img-top rounded ' alt='...'>
                    </div>
                </div>
            </div>

            <!-- Product Description Section -->
            <div class='border p-3 rounded shadow-sm'>
                <h5 class='ms-4'>Product Description:</h5>
                <p class='fs-5 ms-4'>$product_description</p>
            </div>
        </div>
    </div> <!-- End of row -->
</div> <!-- End of container -->
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