<?php
include_once 'db_connection.php'; 
if(isset($_POST['adminId'])) {
    $adminId = $_POST['adminId'];
    $stmt = $conn->prepare("SELECT admin_name, admin_photo, admin_job, admin_phone FROM admins WHERE admin_id = ?");
    $stmt->bind_param("i", $adminId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    echo json_encode($row);
} else {
    http_response_code(400);
    echo "Error: Admin ID is not set.";
}
?>