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

        $select_query = "select * from `products` order by rand() LIMIT 4";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
           // Fetch all ratings for the product
            $get_ratings_query = "SELECT rating FROM ratings WHERE product_id = $product_id";
            $ratings_result = mysqli_query($con, $get_ratings_query);

            $total_rating = 0; // Sum of all ratings
            $ratings_count = 0; // Number of ratings

            while ($rating_row = mysqli_fetch_assoc($ratings_result)) {
                $total_rating += $rating_row['rating'];
                $ratings_count++;
            }

            // Calculate the average rating
            $avg_rating = $ratings_count > 0 ? round($total_rating / $ratings_count, 1) : 0;
            echo " <div class='mx-3 mb-3'>
                
                <div class='card'>
                <div class='card-body'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top p-2' alt='...'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='fs-5'>Rs-$product_price</p>
                       <p class='text-success'>Average Rating: <strong>$avg_rating ★</strong></p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To Cart</a>
                                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                        
                                </div>
                            </div>
                            </div>";
        }
    }
}

//Similar Category
// function SimilarCategory() {
//     global $con;

//     if (isset($_GET['product_id'])) {
//         $product_id = $_GET['product_id'];
//                      // Fetch all ratings for the product
//             $get_ratings_query = "SELECT rating FROM ratings WHERE product_id = $product_id";
//             $ratings_result = mysqli_query($con, $get_ratings_query);

//             $total_rating = 0; // Sum of all ratings
//             $ratings_count = 0; // Number of ratings

//             while ($rating_row = mysqli_fetch_assoc($ratings_result)) {
//                 $total_rating += $rating_row['rating'];
//                 $ratings_count++;
//             }

//             // Calculate the average rating
//             $avg_rating = $ratings_count > 0 ? round($total_rating / $ratings_count, 1) : 0;

//         // 1. Fetch the category_id of the current product
//         $select_query = "SELECT * FROM products WHERE product_id = $product_id";
//         $result_query = mysqli_query($con, $select_query);
        
//         // If product exists, get the category ID
//         if ($row = mysqli_fetch_assoc($result_query)) {
//             $category_id = $row['category_id'];

//             // 2. Fetch other products from the same category, excluding the current product
//             $related_query = "SELECT * FROM products WHERE category_id = $category_id AND product_id != $product_id order by rand() LIMIT 3"; // Fetch up to 4 related products
//             $related_result = mysqli_query($con, $related_query);
            

//             // 3. Display the related products
//             while ($related_row = mysqli_fetch_assoc($related_result)) {
//                 $related_product_id = $related_row['product_id'];
//                 $related_product_name = $related_row['product_name'];
//                 $related_product_price = $related_row['product_price'];
//                 $related_product_image1 = $related_row['product_image1'];

//                 echo "
//                 <div class='mx-3 mb-3'>
                
//                 <div class='card'>
//                 <div class='card-body'>
//                     <img src='./admin_area/product_images/$related_product_image1' class='card-img-top p-2' alt='...'>
//                         <h5 class='card-title'>$related_product_name</h5>
//                         <p class='fs-5'>Rs-$related_product_price</p>
//                         <p class='text-success'>Average Rating: <strong>$avg_rating ★</strong></p>
//                         <a href='index.php?add_to_cart=$related_product_id' class='btn btn-primary'>Add To Cart</a>
//                                         <a href='product_details.php?product_id=$related_product_id' class='btn btn-secondary'>View More</a>
                                        
//                                 </div>
//                             </div>
//                             </div>
//                 ";
//             }
//         }
//     }
// }

// function SimilarCategory() {
//     global $con;

//     if (isset($_GET['product_id'])) {
//         $product_id = $_GET['product_id'];
        
//         // Fetch all ratings for the product
//         $get_ratings_query = "SELECT rating FROM ratings WHERE product_id = $product_id";
//         $ratings_result = mysqli_query($con, $get_ratings_query);

//         $total_rating = 0; // Sum of all ratings
//         $ratings_count = 0; // Number of ratings

//         while ($rating_row = mysqli_fetch_assoc($ratings_result)) {
//             $total_rating += $rating_row['rating'];
//             $ratings_count++;
//         }

//         // Calculate the average rating for the current product
//         $avg_rating = $ratings_count > 0 ? round($total_rating / $ratings_count, 1) : 0;

//         // 1. Fetch the category_id of the current product
//         $select_query = "SELECT * FROM products WHERE product_id = $product_id";
//         $result_query = mysqli_query($con, $select_query);
        
//         // If product exists, get the category ID
//         if ($row = mysqli_fetch_assoc($result_query)) {
//             $category_id = $row['category_id'];

//             // 2. Fetch other products from the same category, excluding the current product
//             // Now, calculate the average rating for each product in the category
//             $related_query = "
//                 SELECT p.product_id, p.product_name, p.product_price, p.product_image1,
//                        IFNULL(AVG(r.rating), 0) AS avg_rating
//                 FROM products p
//                 LEFT JOIN ratings r ON p.product_id = r.product_id
//                 WHERE p.category_id = $category_id AND p.product_id != $product_id
//                 GROUP BY p.product_id
//                 ORDER BY avg_rating DESC
//                 LIMIT 3"; // Fetch top 3 related products based on average rating

//             $related_result = mysqli_query($con, $related_query);

//             // 3. Display the related products
//             while ($related_row = mysqli_fetch_assoc($related_result)) {
//                 $related_product_id = $related_row['product_id'];
//                 $related_product_name = $related_row['product_name'];
//                 $related_product_price = $related_row['product_price'];
//                 $related_product_image1 = $related_row['product_image1'];
//                 $related_avg_rating = round($related_row['avg_rating'], 1); // Get the average rating for display

//                 echo "
//                 <div class='mx-3 mb-3'>
//                     <div class='card'>
//                         <div class='card-body'>
//                             <img src='./admin_area/product_images/$related_product_image1' class='card-img-top p-2' alt='...'>
//                             <h5 class='card-title'>$related_product_name</h5>
//                             <p class='fs-5'>Rs-$related_product_price</p>
//                             <p class='text-success'>Average Rating: <strong>$related_avg_rating ★</strong></p>
//                             <a href='index.php?add_to_cart=$related_product_id' class='btn btn-primary'>Add To Cart</a>
//                             <a href='product_details.php?product_id=$related_product_id' class='btn btn-secondary'>View More</a>
//                         </div>
//                     </div>
//                 </div>";
//             }
//         }
//     }
// }

function SimilarCategory() {
    global $con;

    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        // 1. Fetch the category ID of the current product
        $select_query = "SELECT * FROM products WHERE product_id = $product_id";
        $result_query = mysqli_query($con, $select_query);

        // Get category_id from current product
        $category_id = 0;
        if ($row = mysqli_fetch_assoc($result_query)) {
            $category_id = $row['category_id'];
        }

        // 2. Fetch all products from the same category excluding the current product
        $related_products_query = "SELECT * FROM products WHERE category_id = $category_id AND product_id != $product_id";
        $related_products_result = mysqli_query($con, $related_products_query);
        
        // 3. Initialize an array to hold products and their average ratings
        $products_with_avg_rating = array();

        while ($related_row = mysqli_fetch_assoc($related_products_result)) {
            $related_product_id = $related_row['product_id'];
            $related_product_name = $related_row['product_name'];
            $related_product_price = $related_row['product_price'];
            $related_product_image1 = $related_row['product_image1'];

            // Fetch ratings for each product
            $get_ratings_query = "SELECT rating FROM ratings WHERE product_id = $related_product_id";
            $ratings_result = mysqli_query($con, $get_ratings_query);

            $total_rating = 0;
            $ratings_count = 0;

            // Calculate the average rating
            while ($rating_row = mysqli_fetch_assoc($ratings_result)) {
                $total_rating += $rating_row['rating'];
                $ratings_count++;
            }

            // Calculate average rating, default to 0 if no ratings
            $avg_rating = $ratings_count > 0 ? round($total_rating / $ratings_count, 1) : 0;

            // Add the product and its average rating to the array
            $products_with_avg_rating[] = array(
                'product_id' => $related_product_id,
                'product_name' => $related_product_name,
                'product_price' => $related_product_price,
                'product_image1' => $related_product_image1,
                'avg_rating' => $avg_rating
            );
        }

        // 4. Sort the products by average rating in descending order
        usort($products_with_avg_rating, function ($a, $b) {
            return $b['avg_rating'] <=> $a['avg_rating']; // Sort descending
        });

        // 5. Display the top 3 products based on sorted ratings
        $top_n = 3;
        for ($i = 0; $i < min($top_n, count($products_with_avg_rating)); $i++) {
            $product = $products_with_avg_rating[$i];
            echo "
            <div class='mx-3 mb-3'>
                <div class='card'>
                    <div class='card-body'>
                        <img src='./admin_area/product_images/{$product['product_image1']}' class='card-img-top p-2' alt='...'>
                        <h5 class='card-title'>{$product['product_name']}</h5>
                        <p class='fs-5'>Rs-{$product['product_price']}</p>
                        <p class='text-success'>Average Rating: <strong>{$product['avg_rating']} ★</strong></p>
                        <a href='index.php?add_to_cart={$product['product_id']}' class='btn btn-primary'>Add To Cart</a>
                        <a href='product_details.php?product_id={$product['product_id']}' class='btn btn-secondary'>View More</a>
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
             // Fetch all ratings for the product
            $get_ratings_query = "SELECT rating FROM ratings WHERE product_id = $product_id";
            $ratings_result = mysqli_query($con, $get_ratings_query);

            $total_rating = 0; // Sum of all ratings
            $ratings_count = 0; // Number of ratings

            while ($rating_row = mysqli_fetch_assoc($ratings_result)) {
                $total_rating += $rating_row['rating'];
                $ratings_count++;
            }

            // Calculate the average rating
            $avg_rating = $ratings_count > 0 ? round($total_rating / $ratings_count, 1) : 0;
            echo " <div class='p-2'>
                
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top p-2' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='fs-5'>Rs-$product_price</p>
                        <p class='text-success'>Average Rating: <strong>$avg_rating ★</strong></p>
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
                       // Fetch all ratings for the product
            $get_ratings_query = "SELECT rating FROM ratings WHERE product_id = $product_id";
            $ratings_result = mysqli_query($con, $get_ratings_query);

            $total_rating = 0; // Sum of all ratings
            $ratings_count = 0; // Number of ratings

            while ($rating_row = mysqli_fetch_assoc($ratings_result)) {
                $total_rating += $rating_row['rating'];
                $ratings_count++;
            }

            // Calculate the average rating
            $avg_rating = $ratings_count > 0 ? round($total_rating / $ratings_count, 1) : 0;
            echo " <div class='col-md-4 mb-3'>
                
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top p-2' alt='$product_name'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='fs-5'>Rs-$product_price</p>
                        <p class='text-success'>Average Rating: <strong>$avg_rating ★</strong></p>
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
             // Fetch all ratings for the product
            $get_ratings_query = "SELECT rating FROM ratings WHERE product_id = $product_id";
            $ratings_result = mysqli_query($con, $get_ratings_query);

            $total_rating = 0; // Sum of all ratings
            $ratings_count = 0; // Number of ratings

            while ($rating_row = mysqli_fetch_assoc($ratings_result)) {
                $total_rating += $rating_row['rating'];
                $ratings_count++;
            }

            // Calculate the average rating
            $avg_rating = $ratings_count > 0 ? round($total_rating / $ratings_count, 1) : 0;
            echo "
             <div class='col-md-4 mb-3'>
                
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top p-2' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='fs-5'>Rs-$product_price</p>
                        <p class='text-success'>Average Rating: <strong>$avg_rating ★</strong></p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To Cart</a>
                                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                        
                                </div>
                            </div>
                            </div>";
        }
    }
}



//view details function
function view_details() {
    global $con;

    // Check if product_id is set
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM products WHERE product_id=$product_id";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            // Product details
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2']; // Assuming second image exists
            $product_image3 = $row['product_image3']; // Assuming third image exists
            $product_price = $row['product_price'];

            // Fetch all ratings for the product
            $get_ratings_query = "SELECT rating FROM ratings WHERE product_id = $product_id";
            $ratings_result = mysqli_query($con, $get_ratings_query);

            $total_rating = 0; // Sum of all ratings
            $ratings_count = 0; // Number of ratings

            while ($rating_row = mysqli_fetch_assoc($ratings_result)) {
                $total_rating += $rating_row['rating'];
                $ratings_count++;
            }

            // Calculate the average rating
            $avg_rating = $ratings_count > 0 ? round($total_rating / $ratings_count, 1) : 0;

            // Get the user's rating for this product
            $username = $_SESSION['username']; // Assuming user is logged in
            $get_user_query = "SELECT user_id FROM user_table WHERE username = '$username'";
            $user_result = mysqli_query($con, $get_user_query);
            $user_row = mysqli_fetch_assoc($user_result);
            $user_id = $user_row['user_id'];

            $get_rating_query = "SELECT rating FROM ratings WHERE user_id = $user_id AND product_id = $product_id";
            $rating_result = mysqli_query($con, $get_rating_query);
            $existing_rating = mysqli_fetch_assoc($rating_result);

            // Display product details with embedded CSS for image sizing
            echo "
            <div class='container my-4'>
                <h3 class='text-center'>$product_name</h3>
                <p class='text-center text-muted'>Average Rating: <strong>$avg_rating ★</strong></p>
                <div class='row g-4'>
                    <!-- Product Image and Price -->
                    <div class='col-md-4'>
                        <div class='product-image-container'>
                            <img src='./admin_area/product_images/$product_image1' alt='Product Image'>
                        </div>
                        <p class='text-center fs-5 mt-3'>Price: Rs-$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary d-flex justify-content-center'>Add To Cart</a>
                    </div>
                    <!-- Product Description and Additional Images -->
                    <div class='col-md-8'>
                        <h5>Description:</h5>
                        <p>$product_description</p>
                        
                        <div class='row mt-4 g-2'>
                            <div class='col-6'>
                                <div class='product-image-container'>
                                    <img src='./admin_area/product_images/$product_image2' alt='Additional Image 1'>
                                </div>
                            </div>
                            <div class='col-6'>
                                <div class='product-image-container'>
                                    <img src='./admin_area/product_images/$product_image3' alt='Additional Image 2'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";

            // Rating Form
            if (!$existing_rating) {
                echo "
                <form action='submit_rating.php' method='POST' class='mt-4'>
                    <div class='text-center'>
                        <p>Rate this product:</p>
                        <div class='star-rating'>";
                for ($i = 1; $i <= 5; $i++) {
                    echo "<i class='fa fa-star' data-rating='$i'></i>";
                }
                echo "
                        </div>
                        <input type='hidden' name='rating' id='rating-value'>
                        <input type='hidden' name='product_id' value='$product_id'>
                        <button type='submit' class='btn btn-primary mt-3'>Submit Rating</button>
                    </div>
                </form>";
            } else {
                echo "
                <div class='text-center mt-4'>
                    <p class='text-success'>Your Rating: " . str_repeat('★', $existing_rating['rating']) . "</p>
                </div>";
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
    // Ensure the user is logged in and the user_id exists in the session
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Please log in to add items to your cart.'); window.open('user_login.php', '_self');</script>";
        return;
    }

    if (isset($_GET['add_to_cart'])) {
        global $con;
        
        // Get the user_id from the session
        $user_id = $_SESSION['user_id'];

        // Get the product_id from the URL parameter
        $get_product_id = $_GET['add_to_cart'];

        // Check if the product is already in the user's cart
        $select_query = "SELECT * FROM `cart_details` WHERE user_id = '$user_id' AND product_id = '$get_product_id'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
            // Product already in the cart
            echo "<script>alert('Item already added to your cart.')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            // Insert the product into the cart (with initial quantity of 1, for example)
            $insert_query = "INSERT INTO `cart_details` (product_id, user_id, quantity) VALUES ('$get_product_id', '$user_id', 1)";
            $result_query = mysqli_query($con, $insert_query);

            if ($result_query) {
                echo "<script>alert('Item added to your cart!')</script>";
            } else {
                echo "<script>alert('Error adding item to cart. Please try again.')</script>";
            }
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
}


// function for cart items num
function cart_item()
{
    global $con;

    // Assuming user is logged in and user_id is stored in session
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id']; // Get the user ID from the session
    } else {
        // If no user is logged in, you could use a fallback like anonymous user ID
        $user_id = null; // Adjust as needed, or handle this case separately
    }

    if ($user_id) {
        // Query the cart details for the logged-in user
        $select_query = "SELECT * FROM `cart_details` WHERE user_id = '$user_id'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        // Handle cases where the user is not logged in, if necessary
        $count_cart_items = 0;
    }

    // Echo the count of items in the cart
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