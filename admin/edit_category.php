<?php
include_once 'db_connection.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryId = $_POST['editCategoryId'];
    $categoryName = mysqli_real_escape_string($conn, $_POST['editCategoryName']);
    if(isset($_FILES['editCategoryPhoto']) && $_FILES['editCategoryPhoto']['error'] === UPLOAD_ERR_OK) {
        $photoTmpName = $_FILES['editCategoryPhoto']['tmp_name'];
        $photoName = $_FILES['editCategoryPhoto']['name'];
        $photoPath = "uploads/" . $photoName; 
        if(move_uploaded_file($photoTmpName, $photoPath)) {
            $query = "UPDATE productcategories SET pcategory_name = '$categoryName', pcategory_photo = '$photoPath' WHERE pcategory_id = $categoryId";
            $result = mysqli_query($conn, $query);
            if($result) {
                echo "Category updated successfully.";
            } else {
                echo "Error updating category.";
            }
        } else {
            echo "Error uploading photo.";
        }
    } else {
        $query = "UPDATE productcategories SET pcategory_name = '$categoryName' WHERE pcategory_id = $categoryId";
        $result = mysqli_query($conn, $query);
        if($result) {
            echo "Category updated successfully.";
        } else {
            echo "Error updating category.";
        }
    }
}
?>