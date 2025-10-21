<?php
include_once 'db_connection.php';
if (isset($_POST['search'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_POST['search']);
    $query = "SELECT * FROM products WHERE product_name LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="product-item" data-category="' . $row['pcategory_id'] . '">' . $row['product_name'] . '</div>';
        }
    } else {
        echo 'No products found.';
    }
} else {
    echo 'Search term is required.';
}
?>