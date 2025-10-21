<?php
if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'index.php') !== false) {
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }
    include_once 'db_connection.php'; 
    $email = $_SESSION['email'];
    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    header("Location: index.php?page=product");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>bs4 ecommerce products - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/styles/default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rk4bir/simple-tags-input@1.0.0/src/simple-tag-input.min.css">
</head>
<style type="text/css">
    body {
        margin-top: 0px;
        background-color: #f4f7f6;
    }
    body.dark li {
        color: #CCC;
    }
    .page-item.active .page-link {
        background-color: #606da6 !important;
        border-color: #606da6;
    }
    .dark .page-item.active .page-link {
        background-color: #f26c4f !important;
        border-color: #f26c4f;
    }
    .dark .page-link {
        color: white;
        background-color: #000;
        border: 1px solid #000000;
    }
    .dark .product_item .product_details h5 {
        color: white;
        font-size: 16px;
    }
    .dark .product_item .product_details h5 a {
        color: white;
        font-size: 16px;
    }
    .btn-primary {
        background-color: #606da6;
        border-color: #606da6;
    }
    .dark .btn-primary {
        background-color: #f26c4f !important;
        border-color: #f26c4f;
    }
    .btn-sm:hover {
        background-color: #606da6b5 !important;
    }
    .dark .btn-sm:hover {
        background-color: #f26c4f9c !important;
    }
    .c_review {
        margin-bottom: 0
    }
    .c_review li {
        margin-bottom: 16px;
        padding-bottom: 13px;
        border-bottom: 1px solid #e8e8e8
    }
    .c_review li:last-child {
        margin: 0;
        border: none
    }
    .c_review .avatar {
        float: left;
        width: 80px
    }
    .c_review .comment-action {
        float: left;
        width: calc(100% - 80px)
    }
    .c_review .comment-action .c_name {
        margin: 0
    }
    .c_review .comment-action p {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        max-width: 95%;
        display: block
    }
    .product_item:hover .cp_img {
        top: -40px
    }
    .product_item:hover .cp_img img {
        box-shadow: 0 19px 38px rgba(0, 0, 0, 0.3), 0 15px 12px rgba(0, 0, 0, 0.22)
    }
    .product_item:hover .cp_img .hover {
        display: block
    }
    .product_item .cp_img {
        position: absolute;
        top: 0px;
        left: 50%;
        transform: translate(-50%);
        -webkit-transform: translate(-50%);
        -ms-transform: translate(-50%);
        -moz-transform: translate(-50%);
        -o-transform: translate(-50%);
        -khtml-transform: translate(-50%);
        width: 100%;
        padding: 15px;
        transition: all 0.2s ease-in-out
    }
    .product_item .cp_img img {
        transition: all 0.2s ease-in-out;
        border-radius: 6px
    }
    .product_item .cp_img .hover {
        display: none;
        text-align: center;
        margin-top: 10px
    }
    .product_item .product_details {
        padding-top: 110%;
        text-align: center
    }
    .product_item .product_details h5 {
        margin-bottom: 5px
    }
    .product_item .product_details h5 a {
        font-size: 16px;
        color: #444;
    }
    .dark .product_item .product_details h5 a {
        font-size: 16px;
        color: white;
    }
    .product_item .product_details h5 a:hover {
        text-decoration: none
    }
    .product_item .product_details .product_price {
        margin: 0
    }
    .product_item .product_details .product_price li {
        display: inline-block;
        padding: 0 10px
    }
    .product_item .product_details .product_price .new_price {
        color: #fff;
        /* Set text color */
        background-color: #f26c4f;
        /* Set background color */
        padding: 5px 10px;
        /* Add padding for better spacing */
        border-radius: 5px;
        /* Add rounded corners */
        font-weight: bold;
        /* Make the sale price bold */
        font-family: 'Arial', sans-serif;
        /* Use a specific font */
    }
    .product_item_list table tr td {
        vertical-align: middle
    }
    .product_item_list table tr td h5 {
        font-size: 15px;
        margin: 0
    }
    .product_item_list table tr td .btn {
        box-shadow: none !important
    }
    .product-order-list table tr th:last-child {
        width: 145px
    }
    .preview {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column
    }
    .preview .preview-pic {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1
    }
    .preview .preview-thumbnail.nav-tabs {
        margin-top: 15px;
        font-size: 0
    }
    .preview .preview-thumbnail.nav-tabs li {
        width: 20%;
        display: inline-block
    }
    .preview .preview-thumbnail.nav-tabs li nav-link img {
        max-width: 100%;
        display: block
    }
    .preview .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 2px;
        border-radius: 0 !important;
        border-top: none !important;
        border-left: none !important;
        border-right: none !important
    }
    .preview .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0
    }
    .preview .tab-content {
        overflow: hidden
    }
    .preview .tab-content img {
        width: 100%;
        -webkit-animation-name: opacity;
        animation-name: opacity;
        -webkit-animation-duration: .3s;
        animation-duration: .3s
    }
    .details {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column
    }
    .details .rating .stars {
        display: inline-block
    }
    .details .sizes .size {
        margin-right: 10px
    }
    .details .sizes .size:first-of-type {
        margin-left: 40px
    }
    .details .colors .color {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        height: 2em;
        width: 2em;
        border-radius: 2px
    }
    .details .colors .color:first-of-type {
        margin-left: 20px
    }
    .details .colors .not-available {
        text-align: center;
        line-height: 2em
    }
    .details .colors .not-available:before {
        font-family: Material-Design-Iconic-Font;
        content: "\f136";
        color: #fff
    }
    @media screen and (max-width: 996px) {
        .preview {
            margin-bottom: 20px
        }
    }
    @-webkit-keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3)
        }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }
    @keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3)
        }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }
    .cart-page .cart-table tr th:last-child {
        width: 145px
    }
    .cart-table .quantity-grp {
        width: 120px
    }
    .cart-table .quantity-grp .input-group {
        margin-bottom: 0
    }
    .cart-table .quantity-grp .input-group-addon {
        padding: 0 !important;
        text-align: center;
        background-color: #1ab1e3
    }
    .cart-table .quantity-grp .input-group-addon a {
        display: block;
        padding: 8px 10px 10px;
        color: #fff
    }
    .cart-table .quantity-grp .input-group-addon a i {
        vertical-align: middle
    }
    .cart-table .quantity-grp .form-control {
        background-color: #fff
    }
    .cart-table .quantity-grp .form-control+.input-group-addon {
        background-color: #1ab1e3
    }
    .ec-checkout .wizard .content .form-group .btn-group.bootstrap-select.form-control {
        padding: 0
    }
    .ec-checkout .wizard .content .form-group .btn-group.bootstrap-select.form-control .btn-round.btn-simple {
        padding-top: 12px;
        padding-bottom: 12px
    }
    .ec-checkout .wizard .content ul.card-type {
        font-size: 0
    }
    .ec-checkout .wizard .content ul.card-type li {
        display: inline-block;
        margin-right: 10px
    }
    .card {
        background: var(--light);
        margin-bottom: 30px;
        transition: .5s;
        border: 0;
        border-radius: .55rem;
        position: relative;
        width: 100%;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
    }
    .card .body {
        font-size: 14px;
        color: #424242;
        padding: 20px;
        font-weight: 400;
    }
    /* Ensure cp_img maintains position on smaller screens */
    .cp_img {
        position: relative;
        width: 100%;
        padding: 15px;
        transition: all 0.2s ease-in-out;
    }
    /* Ensure images within cp_img maintain proper sizing */
    .product_item .cp_img img {
        width: 100%;
        border-radius: 6px;
    }
    .tag {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #f26c4f;
        color: white;
        padding: 5px;
        border-radius: 5px;
        font-size: 12px;
    }
    .ccp_img {
        position: relative;
        width: 100%;
        padding: 15px;
        transition: all 0.2s ease-in-out;
    }
    .product_item .ccp_img {
        position: absolute;
        top: 0px;
        left: 50%;
        transform: translate(-50%);
        -webkit-transform: translate(-50%);
        -ms-transform: translate(-50%);
        -moz-transform: translate(-50%);
        -o-transform: translate(-50%);
        -khtml-transform: translate(-50%);
        width: 100%;
        padding: 15px;
        transition: all 0.2s ease-in-out
    }
    /* Ensure images within cp_img maintain proper sizing */
    .product_item .ccp_img img {
        width: 100%;
        border-radius: 6px;
    }
    @keyframes zigzag {
        0% {
            transform: translateY(0);
        }
        25% {
            transform: translateY(-10px) rotate(5deg);
        }
        50% {
            transform: translateY(0);
        }
        75% {
            transform: translateY(-10px) rotate(-5deg);
        }
        100% {
            transform: translateY(0);
        }
    }
    /* Apply the animation to .ccp_img */
    .product_item:hover .ccp_img {
        animation: zigzag 0.5s ease-in-out infinite;
        left: 0;
    }
    .cp_img img {
        width: 100%;
        height: auto;
        aspect-ratio: 1;
        /* Set aspect ratio to 1:1 */
    }
    .product_item .body {
        display: flex;
        flex-direction: column;
    }
    .product_item {
        display: flex;
        flex-direction: column;
        height: 90%;
        /* Make the card take full height */
    }
    @media (max-width: 767px) {
        .product_item {
            height: 98%;
            /* Make the card take up 99% of the viewport height */
        }
    }
</style>
<style type="text/css">
    /* Initially hide the border for out-of-stock products */
    .product_item.out-of-stock.out-of-stock-border {
        border: 2px solid red;
    }
</style>
</head>
<body>
    <style>
        .modal-dialog.modal-xl {
            max-width: 90vw;
            /* Adjust the width as needed */
            width: 90%;
            /* Adjust the width as needed */
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"></script>
    <style>
        .filters {
            margin-bottom: 20px;
            text-align: center;
        }
        .search-container {
            display: inline-block;
            margin-right: 10px;
        }
        .search-container input[type="text"] {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .filters button {
            padding: 5px 10px;
            border: none;
            background-color: #606da6;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        .dark .filters button {
            background-color: #f26c4f;
        }
        .tag{
            background-color: #606da6;
            color: white;
        }
        .dark .tag{
            color: white;
            background-color: #f26c4f;
        }
        .dark .tag span{
            color: white;
            background-color: #f26c4f;
        }
        #filterFeedback {
            display: none;
            margin-left: 10px;
            color: #606da6;
        }
        .sidebar {
    float: left;
    margin-right: 30px;
    width: 250px;
    background-color: #f9f9f9;
    padding: 10px;
    border-radius: 5px;
    max-height: 700px; /* Set the desired maximum height */
    overflow-y: auto;  /* Enable vertical scrolling */
}
        .dark .sidebar {
            background-color: #333;
            /* Dark background color */
            color: #fff;
            /* Light text color */
        }
        .sidebar h3 {
            margin-top: 0;
        }
        .filter-list {
            list-style: none;
            padding: 0;
        }
        .filter-list li {
            margin-bottom: 5px;
        }
        .filter-list label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .filter-list input[type="checkbox"] {
            margin-right: 5px;
        }
        .filter-count {
            font-size: 0.8em;
            color: #888;
        }
        .price-filter {
            margin-bottom: 20px;
        }
        .price-filter label {
            margin-right: 10px;
        }
        .price-filter input[type="range"] {
            width: 80%;
            margin-right: 10px;
        }
        .price-filter #price-output {
            font-weight: bold;
        }
        .price-filter #max-price {
            font-weight: bold;
        }
        @media only screen and (max-width: 1408px) {
            .sidebar {
                float: none;
                width: 80%;
                margin: 20px auto;
                /* Center the sidebar horizontally */
                padding: 5px;
                /* Adjust the padding as needed */
            }
            .search-container input[type="text"] {
                width: 100%;
            }
        }
    </style>
    <div class="filters">
        <div class="row align-items-center m-0">
            <div class="col-md-4">
                <h5 class="card-title mb-0">Products List <span class="text-muted fw-normal">(<?php echo mysqli_num_rows($result); ?>)</span></h5>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center">
                    <input type="text" id="search" class="form-control me-2 mr-2" placeholder="Search..." onkeyup="applyFilters()">
                    <button style="display: none;" onclick="applyFilters()" class="btn btn-primary">Apply Filters</button>
                    <button onclick="clearFilters()" class="btn btn-secondary">
                        <i class="fa fa-fw fa-eraser"></i> 
                    </button>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <span id="filterFeedback">Applying Filters...</span>
    </div>
    <div class="sidebar">
        <h3>Categories</h3>
        <ul class="filter-list" id="categoryList">
            <?php
            $sql = "SELECT * FROM productcategories";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li><label><input type='checkbox' class='categoryCheckbox' value='" . $row['pcategory_id'] . "' onchange='applyFilters()'>" . $row['pcategory_name'] . " <span id='categoryCount_" . $row['pcategory_id'] . "'>(0)</span></label></li>";
            }
            ?>
        </ul>
        <h3>Brands</h3>
        <ul class="filter-list" id="brandList">
            <?php
            $sql = "SELECT * FROM brands";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li><label><input type='checkbox' class='brandCheckbox' value='" . $row['brand_id'] . "' onchange='applyFilters()'>" . $row['brand_name'] . " <span id='brandCount_" . $row['brand_id'] . "'>(0)</span></label></li>";
            }
            ?>
        </ul>
        <h3>Tags</h3>
        <ul class="filter-list" id="tagList">
            <?php
            $sql = "SELECT DISTINCT product_tag FROM products";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $tag = $row['product_tag'];
                $tagName = !empty($tag) ? $tag : "Others";
                $countSql = "SELECT COUNT(*) AS tagCount FROM products WHERE product_tag = '$tag'";
                $countResult = mysqli_query($conn, $countSql);
                $tagCount = 0;
                if ($countRow = mysqli_fetch_assoc($countResult)) {
                    $tagCount = $countRow['tagCount'];
                }
                echo "<li><label><input type='checkbox' class='tagCheckbox' value='" . $tag . "' onchange='applyFilters()'>" . $tagName . " <span id='tagCount_" . $tag . "'>(" . $tagCount . ")</span></label></li>";
            }
            ?>
        </ul>
        <div class="price-filter">
            <label for="price-range">Price Range:</label>
            <input type="range" id="price-range" name="price-range" min="0" max="1000" step="10" value="0" oninput="updatePriceOutput(); applyFilters()">
            <span id="price-output">0 DT</span> - <span id="max-price">1000 DT</span>
        </div>
    </div>
    <div class="row" id="products">
    </div>
    <script>
        function setupPagination(filteredProducts) {
            let productItems;
            let totalProducts;
            if (filteredProducts && filteredProducts.length > 0) {
                productItems = filteredProducts;
                totalProducts = filteredProducts.length;
            } else {
                productItems = document.querySelectorAll(".product");
                totalProducts = productItems.length;
            }
            const itemsPerPage = 7; 
            const maxPageLinks = 3; 
            function displayProducts(page) {
                const startIndex = (page - 1) * itemsPerPage;
                const endIndex = Math.min(startIndex + itemsPerPage, totalProducts);
                productItems.forEach(function(productItem, index) {
                    if (index >= startIndex && index < endIndex) {
                        productItem.style.display = "block"; 
                    } else {
                        productItem.style.display = "none"; 
                    }
                });
            }
            function generatePaginationLinks(currentPage) {
                const totalPages = Math.ceil(totalProducts / itemsPerPage);
                const paginationLinks = document.getElementById("paginationLinks");
                paginationLinks.innerHTML = ""; 
                const startPage = Math.max(1, currentPage - Math.floor(maxPageLinks / 2));
                const endPage = Math.min(totalPages, startPage + maxPageLinks - 1);
                const previousLi = document.createElement("li");
                previousLi.classList.add("page-item");
                previousLi.innerHTML = `<a class="page-link" href="#" aria-label="Previous">
                            <i class="mdi mdi-chevron-double-left fs-15"></i>
                        </a>`;
                previousLi.addEventListener("click", function(event) {
                    event.preventDefault();
                    const prevPage = currentPage - 1;
                    if (prevPage >= 1) {
                        displayProducts(prevPage);
                        generatePaginationLinks(prevPage);
                    }
                });
                paginationLinks.appendChild(previousLi);
                for (let i = startPage; i <= endPage; i++) {
                    const li = document.createElement("li");
                    li.classList.add("page-item");
                    if (i === currentPage) {
                        li.classList.add("active");
                    }
                    li.innerHTML = `<a class="page-link" href="#" data-page="${i}">${i}</a>`;
                    li.addEventListener("click", function(event) {
                        event.preventDefault();
                        const page = parseInt(event.target.getAttribute("data-page"));
                        displayProducts(page);
                        generatePaginationLinks(page);
                    });
                    paginationLinks.appendChild(li);
                }
                const nextLi = document.createElement("li");
                nextLi.classList.add("page-item");
                nextLi.innerHTML = `<a class="page-link" href="#" aria-label="Next">
                        <i class="mdi mdi-chevron-double-right fs-15"></i>
                    </a>`;
                nextLi.addEventListener("click", function(event) {
                    event.preventDefault();
                    const nextPage = currentPage + 1;
                    if (nextPage <= totalPages) {
                        displayProducts(nextPage);
                        generatePaginationLinks(nextPage);
                    }
                });
                paginationLinks.appendChild(nextLi);
            }
            displayProducts(1);
            generatePaginationLinks(1);
        }
        document.addEventListener("DOMContentLoaded", function() {
            setupPagination();
        });
        window.onload = function() {
            setupPagination();
        };
        setupPagination();
    </script>
    <script>
        function clearFilters() {
            document.getElementById("search").value = "";
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
            document.getElementById("price-range").value = 0;
            updatePriceOutput();
            applyFilters();
        }
        function applyFilters() {
            document.getElementById("filterFeedback").style.display = "inline";
            var search = document.getElementById("search").value.toLowerCase();
            var selectedCategories = Array.from(document.querySelectorAll('.categoryCheckbox:checked')).map(c => c.value);
            var selectedTags = Array.from(document.querySelectorAll('.tagCheckbox:checked')).map(t => t.value);
            var selectedBrands = Array.from(document.querySelectorAll('.brandCheckbox:checked')).map(b => b.value);
            var minPrice = parseInt(document.getElementById("price-range").value);
            var products = document.getElementsByClassName("product");
            var filteredProducts = [];
            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                var category = product.getAttribute("data-category");
                var tag = product.getAttribute("data-tag");
                var brand = product.getAttribute("data-brand");
                var price = parseInt(product.getAttribute("data-price"));
                if (tag === 'Sale') {
                    price = parseInt(product.getAttribute("data-sale-price"));
                }
                var categoryMatch = (selectedCategories.length === 0 || selectedCategories.includes(category));
                var tagMatch = (selectedTags.length === 0 || selectedTags.includes(tag));
                var brandMatch = (selectedBrands.length === 0 || selectedBrands.includes(brand));
                var searchMatch = (search === "" || product.innerHTML.toLowerCase().includes(search));
                var priceMatch = (price >= minPrice);
                if (categoryMatch && tagMatch && brandMatch && searchMatch && priceMatch) {
                    product.style.display = "block";
                    filteredProducts.push(product); 
                } else {
                    product.style.display = "none";
                }
            }
            updateFilterCounts();
            document.getElementById("filterFeedback").style.display = "none";
            if (filteredProducts.length > 0) {
                setupPagination(filteredProducts);
            } else {
                var paginationLinks = document.getElementById("paginationLinks");
            }
        }
        function updatePriceOutput() {
            var minPrice = parseInt(document.getElementById("price-range").value);
            document.getElementById("price-output").textContent = minPrice + " DT";
        }
        function updateFilterCounts() {
            var categoryCounts = {};
            var tagCounts = {};
            var brandCounts = {};
            document.querySelectorAll('.categoryCheckbox').forEach(function(checkbox) {
                categoryCounts[checkbox.value] = 0;
            });
            document.querySelectorAll('.tagCheckbox').forEach(function(checkbox) {
                tagCounts[checkbox.value] = 0;
            });
            document.querySelectorAll('.brandCheckbox').forEach(function(checkbox) {
                brandCounts[checkbox.value] = 0;
            });
            var products = document.getElementsByClassName("product");
            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                var category = product.getAttribute("data-category");
                var tag = product.getAttribute("data-tag");
                var brand = product.getAttribute("data-brand");
                if (category in categoryCounts) {
                    categoryCounts[category]++;
                }
                if (tag in tagCounts) {
                    tagCounts[tag]++;
                }
                if (brand in brandCounts) {
                    brandCounts[brand]++;
                }
            }
            Object.keys(categoryCounts).forEach(function(category) {
                document.getElementById('categoryCount_' + category).textContent = '(' + categoryCounts[category] + ')';
            });
            Object.keys(tagCounts).forEach(function(tag) {
                document.getElementById('tagCount_' + tag).textContent = '(' + tagCounts[tag] + ')';
            });
            Object.keys(brandCounts).forEach(function(brand) {
                document.getElementById('brandCount_' + brand).textContent = '(' + brandCounts[brand] + ')';
            });
        }
        updateFilterCounts();
        updatePriceOutput();
    </script>
    <script>
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }
        function checkUrlParametersAndApplyFilters() {
            var categoryId = getUrlParameter('category_id');
            if (categoryId) {
                var checkbox = document.querySelector('.categoryCheckbox[value="' + categoryId + '"]');
                if (checkbox) {
                    checkbox.checked = true;
                    applyFilters(); 
                }
            }
            var brandId = getUrlParameter('brand_id');
            if (brandId) {
                var checkbox = document.querySelector('.brandCheckbox[value="' + brandId + '"]');
                if (checkbox) {
                    checkbox.checked = true;
                    applyFilters(); 
                }
            }
        }
        document.addEventListener("DOMContentLoaded", function() {
            setupPagination();
            checkUrlParametersAndApplyFilters();
        });
        window.onload = function() {
            setupPagination();
            checkUrlParametersAndApplyFilters();
        };
        setupPagination();
        checkUrlParametersAndApplyFilters();
    </script>
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3 class="h6 mb-4">Product information</h3>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="productName">Product Name</label>
                                                <input type="text" class="form-control" id="productName">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label">Product Brand</label>
                                                <select class="select2 form-control select2-hidden-accessible" id="productBrand" data-select2-placeholder="Select Brand" tabindex="-1" aria-hidden="true">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label">Product Category</label>
                                                <select class="select2 form-control select2-hidden-accessible" id="productCategory" data-select2-placeholder="Select Category" tabindex="-1" aria-hidden="true">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="productPrice">Product Price</label>
                                                <input type="Number" class="form-control" id="productPrice">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="productUrl">Product Url</label>
                                                <input type="text" placeholder="Example: navy-blue-t-shirt" class="form-control" id="productUrl">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="productStock">Product Stock</label>
                                                <input type="Number" class="form-control" id="productStock">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3 class="h6 mb-4">More</h3>
                                    <ul class="nav nav-tabs" id="productTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="productDesc-tab" data-toggle="tab" href="#productDesc" role="tab" aria-controls="productDesc" aria-selected="true">Description</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="features-tab" data-toggle="tab" href="#features" role="tab" aria-controls="features" aria-selected="false">Features</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="Details-tab" data-toggle="tab" href="#Details" role="tab" aria-controls="Details" aria-selected="false">Details</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="productTabsContent">
                                        <div class="tab-pane fade show active" id="productDesc" role="tabpanel" aria-labelledby="productDesc-tab">
                                            <div class="form-group">
                                                <label class="form-label">Product Description</label>
                                                <textarea class="form-control" rows="3" style="min-height: 139px;"></textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                                            <div class="form-group">
                                                <label class="form-label">Features</label>
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="Details" role="tabpanel" aria-labelledby="Details-tab">
                                            <div class="form-group">
                                                <label class="form-label">Details</label>
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3 class="h6 mb-4">Customer Ratings</h3>
                                    <table class="table" id="customerRatingsTable">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Rating</th>
                                                <th>Review</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3 class="h6 mb-4">Tag</h3>
                                    <select id="tagSelect" class="form-select">
                                        <option value="" selected>None</option>
                                        <option value="New">New</option>
                                        <option value="Sale">Sale</option>
                                        <option value="Featured">Featured</option>
                                    </select>
                                </div>
                            </div>
                            <div id="newFields" style="display: none;">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h3 class="h6 mb-4">Sale Product</h3>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="startDate">From:</label>
                                                    <input type="date" class="form-control" id="startDate">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="endDate">To:</label>
                                                    <input type="date" class="form-control" id="endDate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="newPrice">New Price:</label>
                                            <input type="text" class="form-control" id="newPrice">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                document.getElementById("tagSelect").addEventListener("change", function() {
                                    var selectedValue = this.value;
                                    var newFieldsDiv = document.getElementById("newFields");
                                    if (selectedValue === "Sale") {
                                        newFieldsDiv.style.display = "block";
                                    } else {
                                        newFieldsDiv.style.display = "none";
                                    }
                                });
                            </script>
                            <input type="file" id="productImageInput" name="productImage" accept="image/*" style="display: none;">
                            <input type="file" id="otherImage1Input" name="otherImage1" accept="image/*" style="display: none;">
                            <input type="file" id="otherImage2Input" name="otherImage2" accept="image/*" style="display: none;">
                            <input type="file" id="otherImage3Input" name="otherImage3" accept="image/*" style="display: none;">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h3 class="h5">Product Images</h3>
                                    <div class="image-container">
                                        <label for="productImage">Main Product Image:</label>
                                        <img id="uploadedImage" src="uploads/Cat.jpg" style="max-width: 200px; cursor: pointer;">
                                        <div class="other-images">
                                            <h6>Other Images:</h6>
                                            <img id="otherImage1Preview" src="uploads/Cat.jpg" style="max-width: 100px; cursor: pointer;">
                                            <img id="otherImage2Preview" src="uploads/Cat.jpg" style="max-width: 100px; cursor: pointer;">
                                            <img id="otherImage3Preview" src="uploads/Cat.jpg" style="max-width: 100px; cursor: pointer;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function previewImage(input, imageId) {
                                    const inputElement = document.getElementById(input);
                                    const image = document.getElementById(imageId);
                                    const file = inputElement.files[0];
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        image.src = e.target.result;
                                    };
                                    reader.readAsDataURL(file);
                                }
                                function triggerFileInputClick(inputId) {
                                    $('#' + inputId).trigger('click');
                                }
                                $(document).ready(function() {
                                    $('#uploadedImage').click(function() {
                                        triggerFileInputClick('productImageInput');
                                    });
                                    $('#otherImage1Preview').click(function() {
                                        if (!$(this).attr('src')) {
                                            $(this).attr('src', 'uploads/Cat.jpg');
                                        }
                                        triggerFileInputClick('otherImage1Input');
                                    });
                                    $('#otherImage2Preview').click(function() {
                                        if (!$(this).attr('src')) {
                                            $(this).attr('src', 'uploads/Cat.jpg');
                                        }
                                        triggerFileInputClick('otherImage2Input');
                                    });
                                    $('#otherImage3Preview').click(function() {
                                        if (!$(this).attr('src')) {
                                            $(this).attr('src', 'uploads/Cat.jpg');
                                        }
                                        triggerFileInputClick('otherImage3Input');
                                    });
                                    $('#productImageInput').change(function() {
                                        previewImage('productImageInput', 'uploadedImage');
                                    });
                                    $('#otherImage1Input').change(function() {
                                        previewImage('otherImage1Input', 'otherImage1Preview');
                                    });
                                    $('#otherImage2Input').change(function() {
                                        previewImage('otherImage2Input', 'otherImage2Preview');
                                    });
                                    $('#otherImage3Input').change(function() {
                                        previewImage('otherImage3Input', 'otherImage3Preview');
                                    });
                                });
                            </script>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <label class="h6" for="tagsInput">Keywords:</label>
                                    <ul id="tagsList"></ul>
                                    <input type="text" class="form-control" id="tagsInput" spellcheck="false" />
                                    <div style="font-size: 13px; color: #383737">
                                        <small><strong>[ NB:</strong> Hit <span class="text-danger"><strong>&lt;ENTER&gt;</strong></span> or <span class="text-danger"><strong>&lt;SPACE&gt;</strong></span> key to add the list</small> <strong>]</strong>
                                    </div>
                                </div>
                            </div>
                            <script src="https://cdn.jsdelivr.net/gh/rk4bir/simple-tags-input@1.0.0/src/simple-tag-input.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $(document).ready(function() {
                                        const inputEl = document.getElementById('tagsInput');
                                        const listEl = document.getElementById('tagsList');
                                        if (inputEl && listEl) {
                                            new simpleTagsInput({
                                                inputEl: "tagsInput",
                                                listEl: "tagsList"
                                            });
                                        } else {
                                            console.error('Input or list element not found');
                                        }
                                    });
                                });
                            </script>
                            <script src="https://cdn.jsdelivr.net/gh/rk4bir/simple-tags-input@1.0.0/src/simple-tag-input.min.js"></script>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="savePChangesBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h3 class="h6 mb-4">Product information</h3>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="productName" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" id="productName" name="productName">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Product Brand</label>
                                                    <select class="select2 form-control select2-hidden-accessible" id="brandId" name="brandId" data-select2-placeholder="Select Brand" tabindex="-1" aria-hidden="true">
                                                        <option value="">Select Brand</option>
                                                        <?php
                                                        $brandsQuery = "SELECT * FROM brands";
                                                        $brandsResult = $conn->query($brandsQuery);
                                                        if ($brandsResult->num_rows > 0) {
                                                            while ($row = $brandsResult->fetch_assoc()) {
                                                                echo "<option value='" . $row['brand_id'] . "'>" . $row['brand_name'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Product Category</label>
                                                    <select class="select2 form-control select2-hidden-accessible" id="productCategory" name="productCategory" data-select2-placeholder="Select Category" tabindex="-1" aria-hidden="true">
                                                        <option value="">Select Category</option>
                                                        <?php
                                                        $categoriesQuery = "SELECT * FROM productcategories";
                                                        $categoriesResult = $conn->query($categoriesQuery);
                                                        if ($categoriesResult->num_rows > 0) {
                                                            while ($row = $categoriesResult->fetch_assoc()) {
                                                                echo "<option value='" . $row['pcategory_id'] . "'>" . $row['pcategory_name'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="productPrice" class="form-label">Product Price</label>
                                                    <input type="number" class="form-control" id="productPrice" name="productPrice">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="productUrl">Product Url</label>
                                                    <input type="text" placeholder="Example: navy-blue-t-shirt" class="form-control" name="productUrl" id="productUrl">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="productStock" class="form-label">Stock Quantity</label>
                                                    <input type="number" class="form-control" id="productStock" name="productStock">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h3 class="h6 mb-4">More</h3>
                                        <ul class="nav nav-tabs" id="productTabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="productDescTab" data-toggle="tab" href="#productDescContent" role="tab" aria-controls="productDescContent" aria-selected="true">Description</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="featuresTab" data-toggle="tab" href="#featuresContent" role="tab" aria-controls="featuresContent" aria-selected="false">Features</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="detailsTab" data-toggle="tab" href="#detailsContent" role="tab" aria-controls="detailsContent" aria-selected="false">Details</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="productTabsContent">
                                            <div class="tab-pane fade show active" id="productDescContent" role="tabpanel" aria-labelledby="productDescTab">
                                                <div class="form-group">
                                                    <label class="form-label">Product Description</label>
                                                    <textarea class="form-control" rows="3" name="productDescription" id="productDescription" style="min-height: 139px;"></textarea>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="featuresContent" role="tabpanel" aria-labelledby="featuresTab">
                                                <div class="form-group">
                                                    <label class="form-label">Features</label>
                                                    <textarea class="form-control" rows="3" name="productFeatures" id="productFeatures"></textarea>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="detailsContent" role="tabpanel" aria-labelledby="detailsTab">
                                                <div class="form-group">
                                                    <label class="form-label">Details</label>
                                                    <textarea class="form-control" rows="3" name="productDetails" id="productDetails"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h3 class="h6 mb-4">Product Tag</h3>
                                        <select id="productTagSelect" class="form-select" name="productTag">
                                            <option value="" selected>None</option>
                                            <option value="New">New</option>
                                            <option value="Sale">Sale</option>
                                            <option value="Featured">Featured</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="productSaleFields" style="display: none;">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h3 class="h6 mb-4">Product Sale</h3>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="productSaleStartDate">From:</label>
                                                        <input type="date" class="form-control" id="productSaleStartDate" name="productSaleStartDate">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="productSaleEndDate">To:</label>
                                                        <input type="date" class="form-control" id="productSaleEndDate" name="productSaleEndDate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="productSalePrice">Sale Price:</label>
                                                <input type="text" class="form-control" id="productSalePrice" name="productSalePrice">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    document.getElementById("productTagSelect").addEventListener("change", function() {
                                        var selectedValue = this.value;
                                        var productSaleFieldsDiv = document.getElementById("productSaleFields");
                                        if (selectedValue === "Sale") {
                                            productSaleFieldsDiv.style.display = "block";
                                        } else {
                                            productSaleFieldsDiv.style.display = "none";
                                        }
                                    });
                                </script>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="productPhoto" class="form-label">Main Product Photo</label>
                                            <input type="file" class="form-control" id="productPhoto" name="productPhoto" onchange="previewImage1(this, 'previewMainPhoto')">
                                            <img id="previewMainPhoto" src="#" alt="Main Product Photo Preview" style="display: none; max-width: 200px; max-height: 200px;">
                                        </div>
                                        <script>
                                            function previewImage1(input, previewId) {
                                                var preview = document.getElementById(previewId);
                                                preview.src = input.files && input.files[0] ? URL.createObjectURL(input.files[0]) : "#";
                                                preview.style.display = input.files && input.files[0] ? 'block' : 'none';
                                            }
                                        </script>
                                        <div class="mb-3">
                                            <label class="form-label">Additional Product Photos</label>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="file" class="form-control" id="productPhoto1" name="productPhoto1" onchange="previewImage1(this, 'previewPhoto1')">
                                                    <img id="previewPhoto1" src="#" alt="Additional Product Photo 1 Preview" style="display: none; max-width: 100px; max-height: 100px;">
                                                </div>
                                                <div class="col">
                                                    <input type="file" class="form-control" id="productPhoto2" name="productPhoto2" onchange="previewImage1(this, 'previewPhoto2')">
                                                    <img id="previewPhoto2" src="#" alt="Additional Product Photo 2 Preview" style="display: none; max-width: 100px; max-height: 100px;">
                                                </div>
                                                <div class="col">
                                                    <input type="file" class="form-control" id="productPhoto3" name="productPhoto3" onchange="previewImage1(this, 'previewPhoto3')">
                                                    <img id="previewPhoto3" src="#" alt="Additional Product Photo 3 Preview" style="display: none; max-width: 100px; max-height: 100px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <label class="h6" for="productKeywordsInput">Keywords:</label>
                                        <ul id="productKeywordsList"></ul>
                                        <input type="text" class="form-control" id="productKeywordsInput" name="productKeywords[]" spellcheck="false" />
                                        <div style="font-size: 13px; color: #383737">
                                            <small><strong>[ NB:</strong> Hit <span class="text-danger"><strong>&lt;ENTER&gt;</strong></span> or <span class="text-danger"><strong>&lt;SPACE&gt;</strong></span> key to add the list</small> <strong>]</strong>
                                        </div>
                                    </div>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/gh/rk4bir/simple-tags-input@1.0.0/src/simple-tag-input.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        const inputEl = $('#productKeywordsInput');
                                        const listEl = $('#productKeywordsList');
                                        if (inputEl.length > 0 && listEl.length > 0) {
                                            const tagsInput = new simpleTagsInput({
                                                inputEl: "productKeywordsInput",
                                                listEl: "productKeywordsList"
                                            });
                                            function addKeyword(keyword) {
                                                var lowercaseKeyword = keyword.toLowerCase().trim();
                                                var keywordExists = false;
                                                listEl.find('li').each(function() {
                                                    var listItemText = $(this).text().toLowerCase().trim();
                                                    if (listItemText.indexOf(lowercaseKeyword) !== -1) {
                                                        keywordExists = true;
                                                        return false; 
                                                    }
                                                });
                                                if (!keywordExists) {
                                                    const keywordItem = '<li>' + lowercaseKeyword + '<button type="button" class="btn btn-sm btn-outline-danger ml-2 delete-keyword">x</button></li>';
                                                    listEl.append(keywordItem);
                                                } else {
                                                    alert('Keyword already exists: ' + lowercaseKeyword);
                                                }
                                            }
                                            inputEl.on('keydown', function(event) {
                                                const keyword = $(this).val().trim();
                                                if (event.keyCode === 13 || event.keyCode === 32) { 
                                                    event.preventDefault(); 
                                                    if (keyword !== '') {
                                                        addKeyword(keyword);
                                                        $(this).val(''); 
                                                    }
                                                }
                                            });
                                            $(document).on('click', '.delete-keyword', function() {
                                                $(this).parent().remove(); 
                                            });
                                        } else {
                                            console.error('Input or list element not found');
                                        }
                                    });
                                </script>
                                <script src="https://cdn.jsdelivr.net/gh/rk4bir/simple-tags-input@1.0.0/src/simple-tag-input.min.js"></script>
                                
                            </div>
                        </div>
                </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id="addProductBtn" class="btn btn-primary">Add Product</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card product_item">
                    <div class="body">
                        <div class="ccp_img">
                            <a href="#" data-toggle="modal" data-target="#addProductModal"><img src="files/addp.png" alt="Product" class="img-fluid"></a>
                        </div>
                        <div class="product_details">
                            <h5>Add Product</h5>
                            <?php
                            $in_stock = 0;
                            $out_of_stock = 0;
                            foreach ($rows as $row) {
                                if ($row['product_stock_quantity'] > 0) {
                                    $in_stock++;
                                } else {
                                    $out_of_stock++;
                                }
                            }
                            ?>
                            <ul class="product_price list-unstyled">
                                <li class="old_price"><?php echo $in_stock; ?> in stock</li>
                                <li id="outOfStock" class="new_price"><?php echo $out_of_stock; ?> out of stock</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            foreach ($rows as $row) {
                $css_class = ($row['product_stock_quantity'] <= 0) ? 'out-of-stock hidden' : 'hidden';
                $eye_icon_class = ($row['product_status'] == 1) ? 'zmdi-eye' : 'zmdi-eye-off';
                $action_text = ($row['product_status'] == 1) ? 'Hide' : 'Show';
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 product" data-category="<?php echo $row['pcategory_id']; ?>" data-tag="<?php echo $row['product_tag']; ?>" data-price="<?php echo $row['product_price']; ?>" data-sale-price="<?php echo $row['product_sale_price']; ?>" data-brand="<?php echo $row['brand_id']; ?>">
                    <div class="card product_item <?php echo $css_class; ?>">
                        <div class="body">
                            <div class="cp_img">
                                <img src="<?php echo $row['product_photo']; ?>" alt="Product" class="img-fluid">
                                <div class="hover">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm waves-effect edit-product-btn" data-toggle="modal" data-target="#editProductModal" data-product-id="<?php echo $row['product_id']; ?>">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm waves-effect delete-product-btn" data-product-id="<?php echo $row['product_id']; ?>">
                                        <i class="zmdi zmdi-delete"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm waves-effect toggle-visibility-btn" data-product-id="<?php echo $row['product_id']; ?>">
                                        <i class="zmdi <?php echo $eye_icon_class; ?>"></i>
                                    </a>
                                </div>
                                <?php if (!empty($row['product_tag'])) { ?>
                                    <div class="tag">
                                        <span class="tag-text"><?php echo $row['product_tag']; ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="product_details">
                                <h5><a href="http://localhost/msport/product.php?id=<?= $row['product_id']; ?>" target="_blank"><?php echo $row['product_name']; ?></a></h5>
                                <ul class="product_price list-unstyled">
                                    <li class="old_price" <?php if ($row['product_tag'] === 'Sale') echo ' style="text-decoration: line-through;"'; ?>>Price: <?php echo $row['product_price']; ?> DT</li>
                                    <?php if ($row['product_tag'] === 'Sale') { ?>
                                        <li class="new_price"><?php echo $row['product_sale_price']; ?> DT</li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="pagination justify-content-center" id="paginationLinks">
                    <li class="page-item disabled">
                        <a class="page-link" tabindex="-1" href="#"><i class="mdi mdi-chevron-double-left fs-15"></i></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="mdi mdi-chevron-double-right fs-15"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productTabs a').click(function(e) {
                e.preventDefault()
                $(this).tab('show')
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#outOfStock', function(event) {
                var outOfStockItems = $('.product_item.out-of-stock, .Product_item.out-of-stock');
                outOfStockItems.toggleClass('out-of-stock-border');
            });
        });
    </script>
    <script>
        $(document).on('click', '.toggle-visibility-btn', function() {
            var productId = $(this).data('product-id');
            var icon = $(this).find('i');
            var currentStatus = icon.hasClass('zmdi-eye') ? 0 : 1; 
            $.ajax({
                url: 'update_product_status.php',
                type: 'POST',
                data: {
                    productId: productId,
                    status: currentStatus
                },
                success: function(response) {
                    if (response === 'success') {
                        icon.toggleClass('zmdi-eye zmdi-eye-off');
                    } else {
                        console.error('Failed to update product status. Response: ' + response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' - ' + error);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var productId; 
            $(document).on('click', '.edit-product-btn', function() {
                productId = $(this).data('productId'); 
                $('#tagsList').empty();
                function addKeyword(keyword) {
                    var tagsList = $('#tagsList');
                    var tagsInputValue = $('#tagsInput').val().trim().toLowerCase();
                    var lowercaseKeyword = keyword.toLowerCase().trim();
                    if (!tagsList.find('li:contains("' + lowercaseKeyword + '")').length) {
                        var keywordItem = '<li>' + lowercaseKeyword + '<button type="button" class="btn btn-sm btn-outline-danger ml-2 delete-keyword">x</button></li>';
                        tagsList.append(keywordItem);
                    } else if (lowercaseKeyword === tagsInputValue) {
                        alert('Keyword already exists: ' + lowercaseKeyword);
                    } else {
                        console.log('Keyword already exists: ' + lowercaseKeyword);
                    }
                }
                $('#tagsInput').off('keydown').on('keydown', function(event) {
                    var keyword = $(this).val().trim();
                    if (event.keyCode === 13 || event.keyCode === 32) { 
                        event.preventDefault(); 
                        if (keyword !== '') {
                            addKeyword(keyword);
                            $(this).val(''); 
                        }
                    }
                });
                $(document).on('click', '.delete-keyword', function() {
                    $(this).parent().remove(); 
                });
                $.ajax({
                    url: 'get_product_details.php',
                    method: 'POST',
                    data: {
                        productId: productId
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#productName').val(response.product_name);
                        $('#productStock').val(response.product_stock_quantity);
                        $('#productPrice').val(response.product_price);
                        $('#productUrl').val(response.product_url);
                        $('#uploadedImage').attr('src', response.product_photo || 'uploads/Cat.jpg');
                        $('#uploadedImage').show();
                        $('#otherImage1Preview').attr('src', response.product_photo_1 || 'uploads/Cat.jpg');
                        $('#otherImage1Preview').show();
                        $('#otherImage2Preview').attr('src', response.product_photo_2 || 'uploads/Cat.jpg');
                        $('#otherImage2Preview').show();
                        $('#otherImage3Preview').attr('src', response.product_photo_3 || 'uploads/Cat.jpg');
                        $('#otherImage3Preview').show();
                        var categoryDropdown = $('#productCategory');
                        categoryDropdown.empty();
                        $.each(response.allCategories, function(index, category) {
                            categoryDropdown.append($('<option></option>').attr('value', category.pcategory_id).text(category.pcategory_name));
                        });
                        categoryDropdown.val(response.pcategory_id);
                        var brandDropdown = $('#productBrand');
                        brandDropdown.empty();
                        $.each(response.allBrands, function(index, brand) {
                            brandDropdown.append($('<option></option>').attr('value', brand.brand_id).text(brand.brand_name));
                        });
                        brandDropdown.val(response.brand_id);
                        var tagSelect = $('#tagSelect');
                        tagSelect.val(response.product_tag); 
                        if (response.product_tag === "Sale") {
                            $('#newFields').show();
                            $('#newPrice').val(response.product_sale_price);
                            $('#startDate').val(response.sale_start_date);
                            $('#endDate').val(response.sale_end_date);
                        } else {
                            $('#newFields').hide();
                        }
                        $('#productDesc textarea').val(response.product_description);
                        $('#features textarea').val(response.product_features);
                        $('#Details textarea').val(response.product_details);
                        var productKeywords = JSON.parse(response.product_keywords);
                        $.each(productKeywords, function(index, keyword) {
                            addKeyword(keyword);
                        });
                        $('#editProductModal').modal('show');
                        $.ajax({
                            url: 'get_customer_ratings.php',
                            method: 'POST',
                            data: {
                                productId: productId
                            },
                            dataType: 'json',
                            success: function(ratingsResponse) {
                                var ratingsTableBody = $('#customerRatingsTable tbody');
                                ratingsTableBody.empty(); 
                                var totalRating = 0;
                                var totalRating = 0;
                                if (ratingsResponse.length > 0) {
                                    $.each(ratingsResponse, function(index, rating) {
                                        totalRating += parseInt(rating.rating);
                                        var row = '<tr>' +
                                            '<td>' + rating.customer_name + '</td>' +
                                            '<td>' + rating.rating + '</td>' +
                                            '<td>' + rating.review_text + '</td>' +
                                            '<td>' + rating.review_date + '</td>' +
                                            '<td><button type="button" class="btn btn-danger delete-rating" data-rating-id="' + rating.review_id + '">Delete</button></td>' +
                                            '</tr>';
                                        ratingsTableBody.append(row);
                                    });
                                    var averageRating = totalRating / ratingsResponse.length;
                                    var averageRow = '<tr>' +
                                        '<td colspan="4"><strong>Average Rating: (</strong>' +
                                        '<strong>' + averageRating + ' )</strong></td>' +
                                        '</tr>';
                                    ratingsTableBody.append(averageRow); 
                                } else {
                                    ratingsTableBody.html('<tr><td colspan="5">No ratings available.</td></tr>');
                                }
                                $('.delete-rating').on('click', function() {
                                    var ratingId = $(this).data('rating-id');
                                    var buttonElement = this;
                                    var confirmDelete = confirm("Are you sure you want to delete this rating?");
                                    if (confirmDelete) {
                                        deleteRating(ratingId, buttonElement); 
                                    }
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                alert('Failed to fetch customer ratings. Please try again.');
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Failed to fetch product details. Please try again.');
                    }
                });
            });
            $('#savePChangesBtn').on('click', function() {
                var updatedProductName = $('#productName').val();
                var updatedProductStock = $('#productStock').val();
                var updatedProductPrice = $('#productPrice').val();
                var updatedProductCategory = $('#productCategory').val();
                var updatedProductBrand = $('#productBrand').val();
                var updatedProductUrl = $('#productUrl').val();
                var updatedMainImage = $('#productImageInput')[0].files[0]; 
                var updatedOtherImage1 = $('#otherImage1Input')[0].files[0]; 
                var updatedOtherImage2 = $('#otherImage2Input')[0].files[0]; 
                var updatedOtherImage3 = $('#otherImage3Input')[0].files[0]; 
                var productTag = $('#tagSelect').val(); 
                var saleStartDate = $('#startDate').val(); 
                var saleEndDate = $('#endDate').val(); 
                var productSalePrice = $('#newPrice').val(); 
                var productDesc = $('#productDesc textarea').val(); 
                var productFeatures = $('#features textarea').val(); 
                var productDetails = $('#Details textarea').val();
                var formData = new FormData();
                formData.append('productId', productId);
                formData.append('productName', updatedProductName);
                formData.append('productStock', updatedProductStock);
                formData.append('productPrice', updatedProductPrice);
                formData.append('productCategory', updatedProductCategory);
                formData.append('productBrand', updatedProductBrand);
                formData.append('productUrl', updatedProductUrl);
                formData.append('productImage', updatedMainImage); 
                formData.append('otherImage1', updatedOtherImage1); 
                formData.append('otherImage2', updatedOtherImage2); 
                formData.append('otherImage3', updatedOtherImage3); 
                formData.append('productTag', productTag); 
                formData.append('saleStartDate', saleStartDate); 
                formData.append('saleEndDate', saleEndDate); 
                formData.append('productSalePrice', productSalePrice);
                formData.append('productDesc', productDesc); 
                formData.append('productFeatures', productFeatures); 
                formData.append('productDetails', productDetails); 
                var keywordsList = [];
                $('#tagsList li').each(function() {
                    var keyword = $(this).clone().children('.delete-keyword').remove().end().text().trim();
                    keywordsList.push(keyword);
                });
                formData.append('productKeywords', JSON.stringify(keywordsList));
                $.ajax({
                    url: 'update_product.php',
                    method: 'POST',
                    data: formData,
                    processData: false, 
                    contentType: false, 
                    success: function() {
                        console.log('Product details updated successfully');
                        $('#editProductModal').modal('hide');
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Failed to update product details. Please try again.');
                    }
                });
            });
            function deleteRating(ratingId, buttonElement) {
                $.ajax({
                    url: 'delete_rating.php',
                    method: 'POST',
                    data: {
                        ratingId: ratingId
                    },
                    success: function() {
                        $(buttonElement).closest('tr').remove();
                        console.log('Rating deleted successfully.');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Failed to delete rating. Please try again.');
                    }
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete-product-btn', function() {
                var productId = $(this).data('productId');
                if (confirm("Are you sure you want to delete this product?")) {
                    $.ajax({
                        url: 'delete_product.php',
                        method: 'POST',
                        data: {
                            productId: productId
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                alert('Product deleted successfully');
                                window.location.reload();
                            } else {
                                alert('Failed to delete product. Please try again.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('Failed to delete product. Please try again.');
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#addProductBtn', function() {
                var formData = new FormData($('#addProductForm')[0]);
                var keywords = [];
                $('#productKeywordsList li').each(function() {
                    var keywordText = $(this).clone().children('.delete-keyword').remove().end().text().trim();
                    keywords.push(keywordText);
                });
                formData.append('productKeywords', JSON.stringify(keywords));
                $.ajax({
                    url: 'add_product.php',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log('Product added successfully');
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Failed to add product. Please try again.');
                    }
                });
            });
        });
    </script>
</body>
</html>