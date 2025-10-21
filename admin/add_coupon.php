<?php
include_once 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $addCouponName = mysqli_real_escape_string($conn, $_POST['addCouponName']);
    $addCouponCode = mysqli_real_escape_string($conn, $_POST['addCouponCode']);
    $addDiscount = $_POST['addDiscount'];
    $addExpiryDate = $_POST['addExpiryDate'];
    $addLimitUsage = $_POST['addLimitUsage'];
    $addProducts = $_POST['addProducts']; 
    $sql = "INSERT INTO coupons (coupon_name, coupon_code, discount, expiry_date, limit_usage) 
            VALUES ('$addCouponName', '$addCouponCode', '$addDiscount', '$addExpiryDate', '$addLimitUsage')";
    if (mysqli_query($conn, $sql)) {
        $newCouponId = mysqli_insert_id($conn);
        foreach ($addProducts as $productId) {
            $insertQuery = "INSERT INTO product_coupons (coupon_id, product_id) 
                            VALUES ('$newCouponId', '$productId')";
            mysqli_query($conn, $insertQuery);
        }
        $response = array("success" => true, "message" => "Coupon added successfully");
        echo json_encode($response);
    } else {
        $error = mysqli_error($conn);
        $response = array("success" => false, "error" => $error);
        echo json_encode($response);
    }
} else {
    $response = array("success" => false, "error" => "Form data not submitted");
    echo json_encode($response);
}
?>