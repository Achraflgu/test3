<?php
session_start();
include("db_connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['customer_email'])) {
        $user_email = $_SESSION['customer_email'];
        $comment = $_POST['comment'];
        $blog_id = $_POST['blog_id'];
        $current_date = date('Y-m-d H:i:s');
        if (!empty($comment)) {
            $check_comment_sql = "SELECT * FROM blogreviews WHERE blog_id = $blog_id AND customer_id IN (SELECT customer_id FROM customers WHERE customer_email = '$user_email')";
            $check_comment_result = mysqli_query($conn, $check_comment_sql);
            $existing_comment = mysqli_fetch_assoc($check_comment_result);
            if ($existing_comment) {
                $review_id = $existing_comment['review_id'];
                $update_comment_sql = "UPDATE blogreviews SET review_content = '$comment', date_posted = '$current_date' WHERE review_id = $review_id";
                mysqli_query($conn, $update_comment_sql);
            } else {
                $customer_id_sql = "SELECT customer_id FROM customers WHERE customer_email = '$user_email'";
                $customer_id_result = mysqli_query($conn, $customer_id_sql);
                $customer_id = mysqli_fetch_assoc($customer_id_result)['customer_id'];
                $insert_comment_sql = "INSERT INTO blogreviews (blog_id, customer_id, review_content, date_posted) VALUES ($blog_id, $customer_id, '$comment', '$current_date')";
                mysqli_query($conn, $insert_comment_sql);
            }
        } else {
            $delete_comment_sql = "DELETE FROM blogreviews WHERE blog_id = $blog_id AND customer_id IN (SELECT customer_id FROM customers WHERE customer_email = '$user_email')";
            mysqli_query($conn, $delete_comment_sql);
        }
        header("Location: blog.php?blog_id=$blog_id");
        exit();
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>