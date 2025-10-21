<?php
include_once 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderId = isset($_POST['order_id']) ? $_POST['order_id'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    if (!empty($orderId) && !empty($status)) {
        $sql = "UPDATE orders SET payment_status = ? WHERE order_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $status, $orderId);
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false, "error" => "Failed to update order status"));
        }
    } else {
        echo json_encode(array("success" => false, "error" => "Invalid input parameters"));
    }
} else {
    echo json_encode(array("success" => false, "error" => "Invalid request method"));
}
mysqli_close($conn);
?>