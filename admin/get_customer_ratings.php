<?php
include_once 'db_connection.php';
if (isset($_POST['productId'])) {
    $productId = mysqli_real_escape_string($conn, $_POST['productId']);
    $query = "SELECT pr.*, c.customer_name
              FROM productreviews pr
              INNER JOIN customers c ON pr.customer_id = c.customer_id
              WHERE pr.product_id = '$productId'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $ratings = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $ratings[] = $row;
            }
            echo json_encode($ratings);
        } else {
            echo json_encode(array('error' => 'No ratings found for the product'));
        }
    } else {
        echo json_encode(array('error' => 'Failed to fetch ratings'));
    }
    mysqli_close($conn);
} else {
    echo json_encode(array('error' => 'ProductId not provided'));
}
?>