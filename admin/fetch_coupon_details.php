<?php
include_once 'db_connection.php';
if(isset($_POST['coupon_id'])) {
    $couponId = $_POST['coupon_id'];
    $sql = "SELECT * FROM coupons WHERE coupon_id = $couponId";
    $result = mysqli_query($conn, $sql);
    if($result) {
        $couponData = mysqli_fetch_assoc($result);
        $productIds = array();
        $productSql = "SELECT product_id FROM product_coupons WHERE coupon_id = $couponId";
        $productResult = mysqli_query($conn, $productSql);
        while($row = mysqli_fetch_assoc($productResult)) {
            $productIds[] = $row['product_id'];
        }
        $couponData['product_ids'] = $productIds;
        echo json_encode($couponData);
    } else {
        $error = mysqli_error($conn);
        echo json_encode(array('error' => $error));
    }
} else {
    echo json_encode(array('error' => 'Coupon ID is not set'));
}
?>