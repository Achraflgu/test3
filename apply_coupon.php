<?php
session_start();
include("db_connection.php");
$response = array();
try {
    if (isset($_POST['couponCode'])) {
        $couponCode = $_POST['couponCode'];
        $query = "SELECT * FROM coupons WHERE coupon_code = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "s", $couponCode);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $coupon = mysqli_fetch_assoc($result);
            $couponId = $coupon['coupon_id'];
            $discount = $coupon['discount'];
            $cart = $_SESSION['cart'];
            $newCartTotal = 0;
            foreach ($cart as $key => $item) {
                $productId = $item['product_id'];
                $quantity = $item['quantity'];
                $query = "SELECT * FROM product_coupons WHERE product_id = ? AND coupon_id = ?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "ii", $productId, $couponId);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    $product = mysqli_fetch_assoc($result);
                    $productPrice = $item['product_price'];
                    $discountAmount = ($productPrice * $discount) / 100;
                    $newPrice = $productPrice - $discountAmount;
                    $newCartTotal += $newPrice * $quantity;
                    $_SESSION['cart'][$key]['product_price'] = $newPrice;
                } else {
                    $newCartTotal += $item['product_price'] * $quantity;
                }
            }
            $_SESSION['cartTotal'] = $newCartTotal;
            $response['success'] = true;
            $response['message'] = 'Coupon applied successfully!';
            $response['cartTotal'] = $newCartTotal;
        } else {
            $response['success'] = false;
            $response['message'] = 'Invalid coupon code!';
        }
    } else {
        $response['success'] = false;
        $response['message'] = 'Coupon code is required!';
    }
} catch (Exception $e) {
    $response['success'] = false;
    $response['message'] = 'Error applying coupon: ' . $e->getMessage();
}
header('Content-Type: application/json');
echo json_encode($response);
?>