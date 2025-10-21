<?php
include 'db_connection.php';
session_start();
if (!isset($_SESSION['customer_email'])) {
    echo "You must be logged in to add a review.";
    exit;
}
if (!isset($_POST['review_text']) || !isset($_POST['rating']) || !isset($_POST['product_id'])) {
    echo "One or more required fields are missing.";
    echo "<br>";
    echo "Received data:";
    var_dump($_POST);
    exit;
}
$reviewText = $_POST['review_text'];
$rating = $_POST['rating'];
$productId = $_POST['product_id']; 
$reviewText = htmlspecialchars($reviewText);
if (empty($reviewText)) {
    echo "Review text is required.";
    exit;
}
$customerEmail = $_SESSION['customer_email'];
$query = "SELECT customer_id FROM customers WHERE customer_email = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $customerEmail);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (!$result) {
    echo "Error retrieving customer data: " . mysqli_error($conn);
    exit;
}
$row = mysqli_fetch_assoc($result);
$customerId = $row['customer_id'];
$query = "INSERT INTO productreviews (product_id, customer_id, review_text, rating, review_date) VALUES (?, ?, ?, ?, NOW())";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "iisi", $productId, $customerId, $reviewText, $rating);
mysqli_stmt_execute($stmt);
if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Review added successfully.";
    header("Location: product.php?id=" . $productId);
} else {
    echo "Error adding review: " . mysqli_error($conn);
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>