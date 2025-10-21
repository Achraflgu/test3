<?php
include("db_connection.php");
if(isset($_POST['productId'])) {
    $productId = mysqli_real_escape_string($conn, $_POST['productId']);
    $sql = "SELECT product_photo FROM products WHERE product_id = $productId";
    $result = mysqli_query($conn, $sql);
    if($result) {
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $productPhoto = $row['product_photo'];
            echo $productPhoto;
        } else {
            echo "No photo found";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Product ID not specified";
}
?>