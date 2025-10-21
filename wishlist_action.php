<?php
include 'db_connection.php';
session_start();
if(!isset($_SESSION['customer_email'])){
    echo 'not_logged_in';
    exit;
}
if(isset($_POST['action']) && isset($_POST['product_id'])){
    $customerEmail = $_SESSION['customer_email'];
    $sql = "SELECT customer_id FROM customers WHERE customer_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $customerEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $customerId = $row['customer_id'];
    $productId = $_POST['product_id'];
    if($_POST['action'] === 'add'){
        $sql = "INSERT INTO wishlist (customer_id, product_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $customerId, $productId);
        $stmt->execute();
    } elseif($_POST['action'] === 'remove'){
        $sql = "DELETE FROM wishlist WHERE customer_id = ? AND product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $customerId, $productId);
        $stmt->execute();
    }
    echo 'success';
}
?>