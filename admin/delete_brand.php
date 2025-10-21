<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
include_once 'db_connection.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brandId = $_POST['brandId'];
    $delete_query = "DELETE FROM brands WHERE brand_id='$brandId'";
    if (mysqli_query($conn, $delete_query)) {
        echo "Brand deleted successfully";
    } else {
        echo "Error deleting brand: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>