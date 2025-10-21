<?php
include_once 'db_connection.php'; 
$query = "SELECT * FROM products WHERE product_stock_quantity <= 0";
$result = mysqli_query($conn, $query);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Out of Stock Products</title>
</head>
<body>
    <h1>Out of Stock Products</h1>
    <ul>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li>' . $row['product_name'] . '</li>';
            }
        } else {
            echo '<li>No out-of-stock products found.</li>';
        }
        ?>
    </ul>
</body>
</html>