<?php
if(isset($_POST['categoryId'])) {
    include 'db_connection.php';
    $categoryId = mysqli_real_escape_string($conn, $_POST['categoryId']);
    $query = "DELETE FROM productcategories WHERE pcategory_id = $categoryId";
    $result = mysqli_query($conn, $query);
    if($result) {
        echo json_encode(array('status' => 'success', 'message' => 'Category deleted successfully'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Failed to delete category'));
    }
    mysqli_close($conn);
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Category ID not provided'));
}
?>