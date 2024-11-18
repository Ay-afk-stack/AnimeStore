<?php
// submit_rating.php
session_start();
// Database connection
include './includes/connect.php'; 
include './functions/common_function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $rating = $_POST['rating'];
    $username = $_SESSION['username'];
    $get_details = "SELECT * FROM user_table WHERE username='$username'";
    $result_query = mysqli_query($con, $get_details);

    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query["user_id"];

        // Prepare the query with placeholders
        $insert_query = "INSERT INTO ratings (user_id, product_id, rating) VALUES (?, ?, ?)
                         ON DUPLICATE KEY UPDATE rating = ?";
        $stmt = mysqli_prepare($con, $insert_query);

        if ($stmt) {
            // Bind the parameters: 'iiii' indicates integer types
            mysqli_stmt_bind_param($stmt, 'iiii', $user_id, $product_id, $rating, $rating);

            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Close the statement
            mysqli_stmt_close($stmt);
        }
    }

    // Output the alert and redirect with JavaScript
    echo "<script>
        alert('Rating submitted successfully');
        window.location.href = 'product_details.php?product_id=$product_id';
    </script>";
    exit();
}
?>