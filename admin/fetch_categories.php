<?php
include 'db_connection.php';
$query = "SELECT * FROM productcategories";
$result = mysqli_query($connection, $query);
if ($result) {
    $categories = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row['pcategory_name'];
    }
    echo json_encode($categories);
} else {
    echo "Error: " . mysqli_error($connection);
}
mysqli_close($connection);
?>