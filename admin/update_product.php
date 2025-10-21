<?php
include_once 'db_connection.php'; 
if (
    isset($_POST['productId']) &&
    isset($_POST['productName']) &&
    isset($_POST['productStock']) &&
    isset($_POST['productPrice']) &&
    isset($_POST['productUrl']) &&
    isset($_POST['productCategory']) &&
    isset($_POST['productBrand']) &&
    isset($_POST['productTag']) &&
    isset($_POST['saleStartDate']) &&
    isset($_POST['saleEndDate']) &&
    isset($_POST['productSalePrice']) &&
    isset($_POST['productDesc']) &&
    isset($_POST['productFeatures']) &&
    isset($_POST['productDetails']) &&
    isset($_POST['productKeywords'])
) {
    $productId = mysqli_real_escape_string($conn, $_POST['productId']);
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productStock = mysqli_real_escape_string($conn, $_POST['productStock']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']);
    $productUrl = mysqli_real_escape_string($conn, $_POST['productUrl']);
    $productCategory = mysqli_real_escape_string($conn, $_POST['productCategory']);
    $productBrand = mysqli_real_escape_string($conn, $_POST['productBrand']);
    $productTag = mysqli_real_escape_string($conn, $_POST['productTag']);
    $saleStartDate = mysqli_real_escape_string($conn, $_POST['saleStartDate']);
    $saleEndDate = mysqli_real_escape_string($conn, $_POST['saleEndDate']);
    $salePrice = mysqli_real_escape_string($conn, $_POST['productSalePrice']);
    $productDesc = mysqli_real_escape_string($conn, $_POST['productDesc']);
    $productFeatures = mysqli_real_escape_string($conn, $_POST['productFeatures']);
    $productDetails = mysqli_real_escape_string($conn, $_POST['productDetails']);
    $productKeywords = mysqli_real_escape_string($conn, $_POST['productKeywords']);
    $query = "UPDATE products SET 
                product_name='$productName', 
                product_stock_quantity='$productStock', 
                product_price='$productPrice', 
                product_url='$productUrl', 
                pcategory_id='$productCategory', 
                brand_id='$productBrand',
                product_tag='$productTag',
                sale_start_date='$saleStartDate',
                sale_end_date='$saleEndDate',
                product_sale_price='$salePrice',
                product_description='$productDesc',
                product_features='$productFeatures',
                product_details='$productDetails',
                product_keywords='$productKeywords'
              WHERE product_id='$productId'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] == UPLOAD_ERR_OK) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["productImage"]["name"]);
            if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
                $query = "UPDATE products SET product_photo='$targetFile' WHERE product_id='$productId'";
                $result = mysqli_query($conn, $query);
            }
        }
        for ($i = 1; $i <= 3; $i++) {
            $inputName = "otherImage" . $i;
            if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == UPLOAD_ERR_OK) {
                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($_FILES[$inputName]["name"]);
                if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile)) {
                    $column = "product_photo_" . $i;
                    $query = "UPDATE products SET $column='$targetFile' WHERE product_id='$productId'";
                    $result = mysqli_query($conn, $query);
                }
            }
        }
        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('error' => 'Failed to update product photos'));
        }
    } else {
        echo json_encode(array('error' => 'Failed to update product details'));
    }
    mysqli_close($conn);
} else {
    echo json_encode(array('error' => 'Required data is missing.'));
}
?>