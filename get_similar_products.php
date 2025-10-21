<?php
include("db_connection.php");
$productName = $_GET['product_name'];
$currentProductId = isset($_GET['current_product_id']) ? $_GET['current_product_id'] : null;
$query = "SELECT * FROM products WHERE product_name = ?";
if ($currentProductId !== null) {
    $query .= " AND product_id != ?";
}
$stmt = $conn->prepare($query);
if ($currentProductId !== null) {
    $stmt->bind_param('si', $productName, $currentProductId);
} else {
    $stmt->bind_param('s', $productName);
}
$stmt->execute();
$results = $stmt->get_result();
$similarProducts = $results->fetch_all(MYSQLI_ASSOC);
echo json_encode($similarProducts);
?>