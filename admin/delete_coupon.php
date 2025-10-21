<?php
include_once 'db_connection.php';
if(isset($_POST['coupon_id'])) {
    $coupon_id = mysqli_real_escape_string($conn, $_POST['coupon_id']);
    $delete_product_mapping_query = "DELETE FROM product_coupons WHERE coupon_id = '$coupon_id'";
    if(mysqli_query($conn, $delete_product_mapping_query)) {
        $delete_query = "DELETE FROM coupons WHERE coupon_id = '$coupon_id'";
        if(mysqli_query($conn, $delete_query)) {
            $response = array("success" => true, "message" => "Coupon deleted successfully");
            echo json_encode($response);
        } else {
            $error = mysqli_error($conn);
            $response = array("success" => false, "error" => $error);
            echo json_encode($response);
        }
    } else {
        $error = mysqli_error($conn);
        $response = array("success" => false, "error" => $error);
        echo json_encode($response);
    }
} else {
    $response = array("success" => false, "error" => "Coupon ID not provided");
    echo json_encode($response);
}
?>