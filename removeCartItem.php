<?php
include 'db_connection.php';
if(isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    $query = "DELETE FROM cart WHERE product_id = ? AND user_ip = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'is', $productId, $_SERVER['REMOTE_ADDR']);
    if(mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to remove item']);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>