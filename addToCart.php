<?php
include 'db_connection.php';
session_start();
$response = [];
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $userIp = $_SERVER['REMOTE_ADDR'];
    if ($action === 'add' && isset($_POST['productId'])) {
        $productId = $_POST['productId'];
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1; 
        if (isset($_POST['size'])) {
            $size = $_POST['size'];
            $stmt = $conn->prepare("SELECT * FROM cart WHERE product_id = ? AND size = ? AND user_ip = ?");
            $stmt->bind_param("iss", $productId, $size, $userIp);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $existingProduct = $result->fetch_assoc();
                $newQuantity = $existingProduct['quantity'] + $quantity;
                $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE product_id = ? AND size = ? AND user_ip = ?");
                $stmt->bind_param("iiss", $newQuantity, $productId, $size, $userIp);
                $stmt->execute();
            } else {
                $stmt = $conn->prepare("INSERT INTO cart (product_id, quantity, user_ip, size) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("iiss", $productId, $quantity, $userIp, $size);
                $stmt->execute();
            }
        } else {
            $stmt = $conn->prepare("SELECT * FROM cart WHERE product_id = ? AND user_ip = ?");
            $stmt->bind_param("is", $productId, $userIp);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $existingProduct = $result->fetch_assoc();
                $newQuantity = $existingProduct['quantity'] + $quantity;
                $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE product_id = ? AND user_ip = ?");
                $stmt->bind_param("iis", $newQuantity, $productId, $userIp);
                $stmt->execute();
            } else {
                $stmt = $conn->prepare("INSERT INTO cart (product_id, quantity, user_ip) VALUES (?, ?, ?)");
                $stmt->bind_param("iis", $productId, $quantity, $userIp);
                $stmt->execute();
            }
        }
        if (isset($_POST['color'])) {
            $color = $_POST['color'];
            $stmt = $conn->prepare("UPDATE cart SET color = ? WHERE product_id = ? AND user_ip = ?");
            $stmt->bind_param("sis", $color, $productId, $userIp);
            $stmt->execute();
        }
    } elseif ($action === 'remove' && isset($_POST['cartId'])) {
        $cartId = $_POST['cartId'];
        $stmt = $conn->prepare("DELETE FROM cart WHERE cart_id = ? AND user_ip = ?");
        $stmt->bind_param("is", $cartId, $userIp);
        $stmt->execute();
    } elseif (($action === 'increase' || $action === 'decrease') && isset($_POST['cartId'])) {
        $cartId = $_POST['cartId'];
        if ($action === 'increase') {
            $stmt = $conn->prepare("UPDATE cart SET quantity = quantity + 1 WHERE cart_id = ? AND user_ip = ?");
        } elseif ($action === 'decrease') {
            $stmt = $conn->prepare("UPDATE cart SET quantity = quantity - 1 WHERE cart_id = ? AND user_ip = ?");
        }
        $stmt->bind_param("is", $cartId, $userIp);
        $stmt->execute();
    } else {
        $response = ['status' => 'error', 'message' => 'Invalid request'];
        echo json_encode($response);
        exit();
    }
    $stmt = $conn->prepare("SELECT * FROM cart WHERE user_ip = ?");
    $stmt->bind_param("s", $userIp);
    $stmt->execute();
    $result = $stmt->get_result();
    $cartItems = [];
    while ($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
    }
    $stmt = $conn->prepare("SELECT SUM(product_price * quantity) as cartTotal FROM cart JOIN products ON cart.product_id = products.product_id WHERE user_ip = ?");
    $stmt->bind_param("s", $userIp);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $cartTotal = $row['cartTotal'];
    $cartCount = count($cartItems);
    $response = [
        'status' => 'success',
        'cartTotal' => $cartTotal,
        'cartCount' => $cartCount,
        'cartItems' => $cartItems
    ];
} else {
    $response = ['status' => 'error', 'message' => 'Invalid request'];
}
echo json_encode($response);
$stmt->close();
$conn->close();
?>