<?php
include_once 'db_connection.php'; 
if (isset($_POST['productId'])) {
    $productId = mysqli_real_escape_string($conn, $_POST['productId']);
    $query = "SELECT p.*, pc.pcategory_id, pc.pcategory_name, b.brand_id, b.brand_name
              FROM products p
              LEFT JOIN productcategories pc ON p.pcategory_id = pc.pcategory_id
              LEFT JOIN brands b ON p.brand_id = b.brand_id
              WHERE p.product_id = '$productId'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $productDetails = mysqli_fetch_assoc($result);
            $productKeywordsQuery = "SELECT product_keywords FROM products WHERE product_id = '$productId'";
            $productKeywordsResult = mysqli_query($conn, $productKeywordsQuery);
            if ($productKeywordsResult) {
                $productKeywordsRow = mysqli_fetch_assoc($productKeywordsResult);
                $productDetails['product_keywords'] = $productKeywordsRow['product_keywords'];
            } else {
                echo json_encode(array('error' => 'Failed to fetch product keywords'));
                exit; 
            }
            $queryCategories = "SELECT * FROM productcategories";
            $queryBrands = "SELECT * FROM brands";
            $resultCategories = mysqli_query($conn, $queryCategories);
            $resultBrands = mysqli_query($conn, $queryBrands);
            $allCategories = [];
            $allBrands = [];
            while ($rowCategories = mysqli_fetch_assoc($resultCategories)) {
                $allCategories[] = $rowCategories;
            }
            while ($rowBrands = mysqli_fetch_assoc($resultBrands)) {
                $allBrands[] = $rowBrands;
            }
            $productDetails['allCategories'] = $allCategories;
            $productDetails['allBrands'] = $allBrands;
            echo json_encode($productDetails);
        } else {
            echo json_encode(array('error' => 'Product not found'));
        }
    } else {
        echo json_encode(array('error' => 'Failed to fetch product details'));
    }
    mysqli_close($conn);
} else {
    echo json_encode(array('error' => 'ProductId not provided'));
}
?>