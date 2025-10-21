<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db_connection.php';
if (isset($_SESSION['customer_email'])) {
    if (isset($_POST['review_id'], $_POST['review_text'], $_POST['rating'])) {
        $reviewId = $_POST['review_id'];
        $reviewText = $_POST['review_text'];
        $rating = $_POST['rating'];
        $productId = $_POST['product_id'];
        $reviewText = htmlspecialchars($reviewText);
        if (empty($reviewText)) {
            header("Location: product.php?id=" . $productId);
            exit;
        }
        $query = "UPDATE productreviews SET review_text = ?, rating = ?, review_date = NOW() WHERE review_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sii", $reviewText, $rating, $reviewId);
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Review updated successfully.";
            if (isset($_SERVER['HTTP_REFERER'])) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                header("Location: index.php");
            }
            exit; 
        } else {
            echo "Error updating review: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "One or more required fields are missing.";
    }
} else {
    echo "You must be logged in to edit a review.";
}
mysqli_close($conn);
?>