<?php
include 'db_connection.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$response = [];
$userIp = $_SERVER['REMOTE_ADDR'];
$currentDate = date("Y-m-d");
$query = "SELECT c.cart_id, c.product_id, c.quantity, c.color, c.size, p.product_name, p.product_price, p.product_sale_price, p.product_tag, p.product_photo, p.sale_start_date, p.sale_end_date 
          FROM cart c
          INNER JOIN products p ON c.product_id = p.product_id
          WHERE c.user_ip = '$userIp'";
$result = mysqli_query($conn, $query);
if ($result) {
    $cartData = [];
    $cartTotal = 0;
    $cartCount = mysqli_num_rows($result);
    while ($row = mysqli_fetch_assoc($result)) {
        $price = $row['product_price'];
        if ($row['product_tag'] === 'Sale' && $currentDate >= $row['sale_start_date'] && $currentDate <= $row['sale_end_date']) {
            $price = $row['product_sale_price'];
        }
        $subtotal = $row['quantity'] * $price;
        $cartTotal += $subtotal;
        $cartData[] = [
            'cart_id' => $row['cart_id'],
            'product_id' => $row['product_id'],
            'quantity' => $row['quantity'],
            'color' => $row['color'],
            'size' => $row['size'],
            'product_name' => $row['product_name'],
            'product_price' => $row['product_price'], 
            'product_sale_price' => $row['product_sale_price'], 
            'product_tag' => $row['product_tag'],
            'product_photo' => $row['product_photo'],
            'sale_start_date' => $row['sale_start_date'], 
            'sale_end_date' => $row['sale_end_date'], 
            'subtotal' => $subtotal
        ];
    }
    $response['status'] = 'success';
    $response['cartTotal'] = $cartTotal;
    $response['cartCount'] = $cartCount;
    $response['products'] = $cartData;
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response['status'] = 'error';
    $response['message'] = 'Failed to fetch cart data';
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>