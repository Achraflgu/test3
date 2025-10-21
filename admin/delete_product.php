<?php
if (isset($_POST['productId'])) {
    include 'db_connection.php';
    $productId = filter_var($_POST['productId'], FILTER_SANITIZE_NUMBER_INT);
    $deleteOrderItemsSql = "DELETE FROM orderitems WHERE product_id = ?";
    $stmtOrderItems = $conn->prepare($deleteOrderItemsSql);
    $stmtOrderItems->bind_param("i", $productId);
    $stmtOrderItems->execute();
    $deleteProductSql = "DELETE FROM products WHERE product_id = ?";
    $stmtProduct = $conn->prepare($deleteProductSql);
    $stmtProduct->bind_param("i", $productId);
    $stmtProduct->execute();
    if ($stmtProduct->affected_rows > 0) {
        $response = array('success' => true, 'message' => 'Product deleted successfully');
    } else {
        $response = array('success' => false, 'message' => 'Failed to delete product');
    }
    $stmtOrderItems->close();
    $stmtProduct->close();
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; 
} else {
    $response = array('success' => false, 'message' => 'Product ID not provided');
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; 
}
?>