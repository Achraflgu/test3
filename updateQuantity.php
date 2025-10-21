<?php
include 'db_connection.php';
session_start();
$response = [];
if(isset($_POST['action']) && isset($_POST['cartId'])) {
    $action = $_POST['action'];
    $cartId = $_POST['cartId'];
    $userIp = $_SERVER['REMOTE_ADDR'];
    $stmt = $conn->prepare("SELECT * FROM cart WHERE cart_id = ? AND user_ip = ?");
    $stmt->bind_param("is", $cartId, $userIp);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $cartData = $result->fetch_assoc();
        $quantity = $cartData['quantity'];
        if($action === 'increase') {
            $stmt = $conn->prepare("UPDATE cart SET quantity = quantity + 1 WHERE cart_id = ? AND user_ip = ?");
        } elseif($action === 'decrease' && $quantity > 1) {
            $stmt = $conn->prepare("UPDATE cart SET quantity = quantity - 1 WHERE cart_id = ? AND user_ip = ?");
        } else {
            $stmt = $conn->prepare("DELETE FROM cart WHERE cart_id = ? AND user_ip = ?");
        }
        $stmt->bind_param("is", $cartId, $userIp);
        $stmt->execute();
        $stmt = $conn->prepare("SELECT SUM(product_price * quantity) as cartTotal FROM cart JOIN products ON cart.product_id = products.product_id WHERE user_ip = ?");
        $stmt->bind_param("s", $userIp);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $cartTotal = $row['cartTotal'];
        $stmt = $conn->prepare("SELECT COUNT(*) as cartCount FROM cart WHERE user_ip = ?");
        $stmt->bind_param("s", $userIp);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $cartCount = $row['cartCount'];
        $stmt = $conn->prepare("SELECT products.*, cart.quantity FROM cart JOIN products ON cart.product_id = products.product_id WHERE user_ip = ?");
        $stmt->bind_param("s", $userIp);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = array();
        while($row = $result->fetch_assoc()){
            $products[] = $row;
        }
        $response = array(
            'status' => 'success',
            'cartTotal' => $cartTotal,
            'cartCount' => $cartCount,
            'products' => $products
        );
    } else {
        $response = array('status' => 'error', 'message' => 'Product not found in cart');
    }
} else {
    $response = array('status' => 'error', 'message' => 'Invalid request');
}
echo json_encode($response);
$stmt->close();
$conn->close();
?>