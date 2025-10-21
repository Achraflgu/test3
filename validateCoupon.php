<?php
include("db_connection.php");
session_start();
if (isset($_POST['coupon_code'])) {
    $couponCode = $_POST['coupon_code'];
    $query = "SELECT * FROM coupons WHERE coupon_code = ? AND expiry_date >= CURDATE() AND usage_count <= limit_usage";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $couponCode);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $couponData = mysqli_fetch_assoc($result);
            $discountAmount = $couponData['discount'];
            $discountedProducts = array(); 
            $couponId = $couponData['coupon_id'];
            $queryProducts = "SELECT product_id FROM product_coupons WHERE coupon_id = $couponId";
            $resultProducts = mysqli_query($conn, $queryProducts);
            if ($resultProducts) {
                while ($row = mysqli_fetch_assoc($resultProducts)) {
                    $product = array(
                        'product_id' => $row['product_id'],
                        'discount_percentage' => $couponData['discount'] 
                    );
                    $discountedProducts[] = $product;
                }
            }
            /*$updateQuery = "UPDATE coupons SET usage_count = usage_count + 1 WHERE coupon_code = ?";
            $stmt = mysqli_prepare($conn, $updateQuery);
            mysqli_stmt_bind_param($stmt, "s", $couponCode);
            mysqli_stmt_execute($stmt);*/
            $_SESSION['couponCode'] = $couponCode;
            $response = array(
                'status' => 'success',
                'discount_amount' => $discountAmount,
                'discounted_products' => $discountedProducts
            );
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Invalid coupon code');
            echo json_encode($response);
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Error in database query');
        echo json_encode($response);
    }
} else {
    $response = array('status' => 'error', 'message' => 'Coupon code is missing');
    echo json_encode($response);
}
mysqli_close($conn);
?>