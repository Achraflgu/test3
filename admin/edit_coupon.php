<?php
include_once 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editCouponId = $_POST['editCouponId'];
    $editCouponName = mysqli_real_escape_string($conn, $_POST['editCouponName']);
    $editCouponCode = mysqli_real_escape_string($conn, $_POST['editCouponCode']);
    $editDiscount = $_POST['editDiscount'];
    $editExpiryDate = $_POST['editExpiryDate'];
    $editLimitUsage = $_POST['editLimitUsage'];
    $editProducts = $_POST['editProducts']; 
    $checkCouponQuery = "SELECT * FROM coupons WHERE coupon_id = '$editCouponId'";
    $checkCouponResult = mysqli_query($conn, $checkCouponQuery);
    if (mysqli_num_rows($checkCouponResult) > 0) {
        $sql = "UPDATE coupons SET 
                coupon_name = '$editCouponName', 
                coupon_code = '$editCouponCode', 
                discount = '$editDiscount', 
                expiry_date = '$editExpiryDate', 
                limit_usage = '$editLimitUsage' 
                WHERE coupon_id = '$editCouponId'";
        if (mysqli_query($conn, $sql)) {
            $deleteQuery = "DELETE FROM product_coupons WHERE coupon_id = '$editCouponId'";
            mysqli_query($conn, $deleteQuery);
            foreach ($editProducts as $productId) {
                $insertQuery = "INSERT INTO product_coupons (coupon_id, product_id) VALUES ('$editCouponId', '$productId')";
                mysqli_query($conn, $insertQuery);
            }
            $response = array("success" => true, "message" => "Coupon updated successfully");
            echo json_encode($response);
        } else {
            $error = mysqli_error($conn);
            $response = array("success" => false, "error" => $error);
            echo json_encode($response);
        }
    } else {
        $response = array("success" => false, "error" => "Coupon ID does not exist");
        echo json_encode($response);
    }
} else {
    $response = array("success" => false, "error" => "Form data not submitted");
    echo json_encode($response);
}
?>