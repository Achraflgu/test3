<?php
session_start();
include("db_connection.php");
include("header.php");
include("nav.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var productsPerPage = 12;
        var currentFilters = {
            category: null,
            subcategory: null,
            brand: null,
            minPrice: null,
            maxPrice: null
        };
        function showPage(pageNumber) {
            var filteredProducts = filterProducts();
            var totalProducts = filteredProducts.length;
            var totalPages = Math.ceil(totalProducts / productsPerPage);
            $('.category-item').hide();
            var startIndex = (pageNumber - 1) * productsPerPage;
            var endIndex = Math.min(startIndex + productsPerPage, totalProducts);
            for (var i = startIndex; i < endIndex; i++) {
                $(filteredProducts[i]).show();
            }
            generatePagination(totalPages, pageNumber);
        }
        function generatePagination(totalPages, currentPage) {
            var paginationHTML = '<li><a href="#" aria-label="previous"><i class="fa fa-chevron-left"></i></a></li>';
            for (var i = 1; i <= totalPages; i++) {
                paginationHTML += '<li><a href="#">' + i + '</a></li>';
            }
            paginationHTML += '<li><a href="#" aria-label="Next"><i class="fa fa-chevron-right"></i></a></li>';
            $('.pagination').html(paginationHTML);
            $('.pagination li').eq(currentPage).addClass('active');
            $('.pagination li a').on('click', function(e) {
                e.preventDefault();
                var page = $(this).text();
                if ($(this).attr('aria-label') === 'previous') {
                    page = Math.max(1, currentPage - 1);
                } else if ($(this).attr('aria-label') === 'Next') {
                    page = Math.min(totalPages, currentPage + 1);
                } else {
                    page = parseInt(page);
                }
                showPage(page);
            });
        }
        function filterProducts() {
            return $('.category-item').filter(function() {
                var $item = $(this);
                var match = true;
                if (currentFilters.category) {
                    match = match && $item.data('category') == currentFilters.category;
                }
                if (currentFilters.subcategory) {
                    var keywords = $item.data('keywords') || '';
                    match = match && keywords.includes(currentFilters.subcategory);
                }
                if (currentFilters.brand) {
                    match = match && $item.data('brand') == currentFilters.brand;
                }
                if (currentFilters.minPrice !== null && currentFilters.maxPrice !== null) {
                    var price = parseFloat($item.data('price'));
                    match = match && price >= currentFilters.minPrice && price <= currentFilters.maxPrice;
                }
                return match;
            });
        }
        function updateURLParameter(param, value) {
            var url = new URL(window.location);
            if (value !== null) {
                url.searchParams.set(param, value);
            } else {
                url.searchParams.delete(param);
            }
            window.history.pushState({}, '', url);
        }
        function clearFilters(except) {
            for (var key in currentFilters) {
                if (key !== except) {
                    currentFilters[key] = null;
                    updateURLParameter(key, null);
                }
            }
        }
        function updateFilters(filterType, value) {
            if (filterType === 'subcategory' && currentFilters.category === null) {
                console.error('Category must be set before setting a subcategory.');
                return;
            }
            clearFilters(filterType);
            currentFilters[filterType] = value;
            updateURLParameter(filterType, value);
            showPage(1);
        }
        window.filterByCategory = function(categoryId) {
            updateFilters('category', categoryId);
        };
        window.filterBySubcategory = function(subcategoryName, categoryId) {
            currentFilters.category = categoryId; 
            updateURLParameter('category', categoryId); 
            updateFilters('subcategory', subcategoryName);
        };
        window.filterByBrand = function(brandId) {
            updateFilters('brand', brandId);
        };
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('subcategory')) {
            currentFilters.subcategory = urlParams.get('subcategory');
        }
        if (urlParams.has('category')) {
            currentFilters.category = urlParams.get('category');
        }
        if (urlParams.has('brand')) {
            currentFilters.brand = urlParams.get('brand');
        }
        var $sliderRange = $("#slider-range");
        var $sliderAmount = $("#amount");
        $sliderRange.slider({
            range: true,
            min: 0,
            max: 500,
            values: [50, 300],
            slide: function(event, ui) {
                $sliderAmount.val(ui.values[0] + " TND - " + ui.values[1] + " TND");
                currentFilters.minPrice = ui.values[0];
                currentFilters.maxPrice = ui.values[1];
                showPage(1);
            }
        });
        $sliderAmount.val($sliderRange.slider("values", 0) + " TND - " + $sliderRange.slider("values", 1) + " TND");
        $(".filter-category").on("click", function() {
            updateFilters('category', $(this).data('category'));
        });
        $(".filter-subcategory").on("click", function() {
            var subcategory = $(this).data('subcategory');
            var category = $(this).data('category');
            filterBySubcategory(subcategory, category);
        });
        $(".filter-brand").on("click", function() {
            updateFilters('brand', $(this).data('brand'));
        });
        $("#clear-filters").on("click", function() {
            currentFilters = {
                category: null,
                subcategory: null,
                brand: null,
                minPrice: null,
                maxPrice: null
            };
            window.history.pushState({}, '', window.location.pathname);
            showPage(1);
        });
        showPage(1);
    });
</script>
<!-- Page Title #1
============================================= -->
<section id="page-title" class="page-title bg-parallax">
    <div class="bg-section">
        <img src="assets/images/page-title/1.png" alt="background">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="title title-3 text-center">
                    <div class="title--content">
                        <div class="title--heading">
                            <h1>Spark Shop</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb breadcrumb-bottom">
                        <li><a href="index-2.html">Home</a></li>
                        <li class="active">Shop Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- category #16
============================================= -->
<section id="category16" class="category category-3 category-6 category-13 category-16 pt-50 pb-80 pr-5 pl-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="sidebar mr-5">
                    <!-- Categories
    ============================= -->
                    <div class="widget widget-categories2">
                        <div class="widget--title">
                            <h3>Categories</h3>
                        </div>
                        <div class="widget--content">
                            <ul class="main--list list-unstyled mb-0">
                                <?php
                                $category_sql = "SELECT * FROM productcategories where pcategory_status='1'";
                                $category_result = mysqli_query($conn, $category_sql);
                                if (mysqli_num_rows($category_result) > 0) {
                                    while ($category_row = mysqli_fetch_assoc($category_result)) {
                                        $pcategory_id = $category_row['pcategory_id'];
                                        $pcategory_name = $category_row['pcategory_name'];
                                        $product_count_sql = "SELECT COUNT(*) AS product_count 
                                          FROM products 
                                          WHERE pcategory_id = $pcategory_id";
                                        $product_count_result = mysqli_query($conn, $product_count_sql);
                                        $product_count_row = mysqli_fetch_assoc($product_count_result);
                                        $product_count = $product_count_row['product_count'];
                                ?>
                                        <li>
                                            <a href="javascript:void(0);" onclick="filterByCategory(<?php echo $pcategory_id; ?>)">
                                                <?php echo $pcategory_name; ?>
                                                <span>(<?php echo $product_count; ?>)</span>
                                            </a>
                                            <ul class="inner--list list-unstyled mb-0">
                                                <?php
                                                $subcategory_sql = "SELECT DISTINCT SUBSTRING_INDEX(SUBSTRING_INDEX(REPLACE(REPLACE(product_keywords, '[', ''), ']', ''), ',', n.digit+1), ',', -1) AS subcategory
                                                FROM products
                                                INNER JOIN (
                                                    SELECT 0 AS digit UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
                                                ) AS n
                                                WHERE pcategory_id = $pcategory_id
                                                    AND product_keywords LIKE '%f-%'";
                                                $subcategory_result = mysqli_query($conn, $subcategory_sql);
                                                while ($subcategory_row = mysqli_fetch_assoc($subcategory_result)) {
                                                    $subcategory_name = trim($subcategory_row['subcategory'], '"');
                                                    if (strpos($subcategory_name, 'f-') === 0) {
                                                        $subcategory_name = substr($subcategory_name, 2);
                                                        $subcategory_product_count_sql = "SELECT COUNT(*) AS subcategory_product_count 
                                                                      FROM products 
                                                                      WHERE pcategory_id = $pcategory_id 
                                                                      AND product_keywords LIKE '%$subcategory_name%'";
                                                        $subcategory_product_count_result = mysqli_query($conn, $subcategory_product_count_sql);
                                                        $subcategory_product_count_row = mysqli_fetch_assoc($subcategory_product_count_result);
                                                        $subcategory_product_count = $subcategory_product_count_row['subcategory_product_count'];
                                                        echo '<li><a href="javascript:void(0);" onclick="filterBySubcategory(\'' . $subcategory_name . '\', ' . $pcategory_id . ')">' . $subcategory_name . '<span>(' . $subcategory_product_count . ')</span></a></li>';
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                <?php
                                    }
                                } else {
                                    echo '<li>No categories found</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Widget Filter
    ============================================= -->
                    <div class="widget widget-filter">
                        <div class="widget--title">
                            <h3>Filter By</h3>
                        </div>
                        <div class="widget--content">
                            <div class="category--filter">
                                <h4 class="subtitle mt-0">price</h4>
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly>
                                </p>
                            </div>
                            <div class="brands--fiter">
                                <h4 class="subtitle">Brands</h4>
                                <ul class="list-unstyled mb-0">
                                    <?php
                                    $brand_sql = "SELECT * FROM brands where brand_status='1'";
                                    $brand_result = mysqli_query($conn, $brand_sql);
                                    if (mysqli_num_rows($brand_result) > 0) {
                                        while ($brand_row = mysqli_fetch_assoc($brand_result)) {
                                            $brand_id = $brand_row['brand_id'];
                                            $brand_name = $brand_row['brand_name'];
                                            $product_count_sql = "SELECT COUNT(*) AS product_count 
                    FROM products 
                    WHERE brand_id = $brand_id";
                                            $product_count_result = mysqli_query($conn, $product_count_sql);
                                            $product_count_row = mysqli_fetch_assoc($product_count_result);
                                            $product_count = $product_count_row['product_count'];
                                    ?>
                                            <li><a href="javascript:void(0);" onclick="filterByBrand(<?php echo $brand_id; ?>)"><?php echo $brand_name; ?><span>(<?php echo $product_count; ?>)</span></a></li>
                                    <?php
                                        }
                                    } else {
                                        echo '<li>No brands found</li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 category-options">
                        <div class="category-num pull-left pull-none-xs">
                            <?php
                            $count_query = "SELECT COUNT(*) AS total_products FROM products where product_status='1'";
                            $count_result = mysqli_query($conn, $count_query);
                            if ($count_result) {
                                $row = mysqli_fetch_assoc($count_result);
                                $total_products = $row['total_products'];
                            } else {
                                $total_products = 0;
                            }
                            echo "<h2><span>{$total_products}</span> PRODUCTS FOUND</h2>";
                            ?>
                        </div>
                        <div class="category-select pull-right text-right text-left-sm pull-none-xs">
                            <ul class="list-unstyled mb-0">
                                <li class="option sort--options">
                                    <span class="option--title">Sort by:</span>
                                    <div class="select-form">
                                        <i class="fa fa-caret-down"></i>
                                        <select>
                                            <option selected="" value="Default">Default</option>
                                            <option value="name">Name</option>
                                            <option value="price">Price</option>
                                            <option value="branding">Branding</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="option">
                                    <span class="option--title">SHOW</span>
                                    <ul class="list-unstyled show--num">
                                        <li>2</li>
                                        <li>4</li>
                                        <li>6</li>
                                    </ul>
                                </li>
                                <li class="option view--type">
                                    <a onclick="clearAllFilters()" id="clear-filters" class=""><i class="fa fa-times-circle"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mb-60">
                    <?php
                    if (isset($_GET['query'])) {
                        $search_query = mysqli_real_escape_string($conn, $_GET['query']);
                        $sql = "SELECT * FROM products WHERE product_name LIKE '%$search_query%' AND product_status='1'";
                    } else {
                        $sql = "SELECT * FROM products where product_status='1'";
                    }
                    $result = mysqli_query($conn, $sql);
                    $uniqueProductNames = array();
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if (!in_array($row['product_name'], $uniqueProductNames)) {
                                $uniqueProductNames[] = $row['product_name'];
                                $product_name = mysqli_real_escape_string($conn, $row['product_name']);
                                $same_name_sql = "SELECT * FROM products WHERE product_name='$product_name'";
                                $same_name_result = mysqli_query($conn, $same_name_sql);
                                $color_keywords = array("red", "blue", "green", "yellow", "black", "white");
                                echo '<div class="col-sm-6 col-md-6 col-lg-3 category-item"';
                                echo ' data-category="' . $row['pcategory_id'] . '"';
                                echo ' data-brand="' . $row['brand_id'] . '"';
                                echo ' data-keywords=\'' . htmlspecialchars(json_encode($row['product_keywords'])) . '\'';
                                echo ' data-price="' . $row['product_price'] . '"';
                                while ($same_name_row = mysqli_fetch_assoc($same_name_result)) {
                                    $keywords = explode(",", $same_name_row['product_keywords']);
                                    foreach ($keywords as $keyword) {
                                        foreach ($color_keywords as $color) {
                                            if (stripos($keyword, $color) !== false) {
                                                echo ' data-subcategory="' . strtolower($color) . '"';
                                            }
                                        }
                                    }
                                }
                                echo '>';
                                $currentDate = date("Y-m-d");
                                $isSale = isset($row['product_tag']) && !empty($row['product_tag']) && stripos($row['product_tag'], 'Sale') !== false &&
                                    isset($row['sale_start_date']) && isset($row['sale_end_date']) &&
                                    $currentDate >= $row['sale_start_date'] && $currentDate <= $row['sale_end_date'];
                    ?>
                                <div class="category--img">
                                    <img src="<?php echo strpos($row['product_photo'], 'http') === 0 ? $row['product_photo'] : 'admin/' . $row['product_photo']; ?>" alt="category" style="width: 100% !important; height: 420px !important; object-fit: cover;">
                                    <?php if (isset($row['product_tag']) && !empty($row['product_tag'])) : ?>
                                        <?php if ($row['product_tag'] === 'Sale' && isset($row['sale_start_date']) && isset($row['sale_end_date'])) : ?>
                                            <?php
                                            if ($currentDate >= $row['sale_start_date'] && $currentDate <= $row['sale_end_date']) {
                                            ?>
                                                <span class="featured-item featured-item2"><?= $row['product_tag']; ?></span>
                                            <?php } else { ?>
                                            <?php } ?>
                                        <?php else : ?>
                                            <span class="featured-item featured-item2"><?= $row['product_tag']; ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="category--content">
                                    <div class="category--title">
                                        <h3><a href="#"><?php echo $row['product_name']; ?></a></h3>
                                    </div>
                                    <div class="category--price">
                                        <?php if ($isSale) : ?>
                                            <div class="sale-wrapper">
                                                <span class="original-price"><?php echo $row['product_price']; ?> TND</span>
                                                <span class="sale-price"><?php echo $row['product_sale_price']; ?> TND</span>
                                                <span class="sale-badge">Sale</span>
                                            </div>
                                        <?php else : ?>
                                            <span class="regular-price"><?php echo $row['product_price']; ?> TND</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="category--hover">
                                    <div class="category--action">
                                        <?php
                                        if (mysqli_num_rows($same_name_result) > 1) {
                                        ?>
                                            <a href="" class="btn btn--primary btn--rounded" data-product-id="<?= $row['product_id']; ?>" data-toggle="modal" data-target="#product-popup">
                                                <i class="icon-bag"></i> ADD TO CART
                                            </a> <?php } else { ?>
                                            <?php if ($row['product_stock_quantity'] > 0) : ?>
                                                <a href="javascript:void(0);" class="btn btn--primary btn--rounded add-to-cart-index" data-product-id="<?= $row['product_id']; ?>"><i class="icon-bag"></i> ADD TO CART</a>
                                            <?php else : ?>
                                                <span class="btn btn--primary btn--rounded" style="cursor: not-allowed; opacity: 0.7;"><i class="icon-bag"></i> OUT OF STOCK</span>
                                            <?php endif; ?>
                                        <?php } ?>
                                        <div class="category--action-content">
                                            <div class="category--action-icons">
                                                <a data-toggle="modal" data-target="#product-popup" data-product-id="<?= $row['product_id']; ?>"><i class="ti-search"></i></a>
                                                <a class="add-to-wishlist" data-product-id="<?= $row['product_id']; ?>"><i class="ti-heart"></i></a>
                                                <a data-toggle="modal" data-target="#compare-popup" class="compare" data-product-id="<?= $row['product_id']; ?>"><i class="ti-control-shuffle"></i></a>
                                            </div>
                                            <div class="category--hover-info">
                                                <div class="category--title">
                                                    <h3><a href="http://localhost/msport/product.php?id=<?= $row['product_id']; ?>"><?php echo $row['product_name']; ?></a></h3>
                                                </div>
                                                <div class="category--price">
                                                    <?php if ($isSale) : ?>
                                                        <span class="original-price" style="text-decoration: line-through;"><?php echo $row['product_price']; ?> TND</span>
                                                        <span class="sale-price"><?php echo $row['product_sale_price']; ?> TND</span>
                                                    <?php else : ?>
                                                        <span><?php echo $row['product_price']; ?> TND</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="category--colors">
                                                <?php
                                                $same_name_result = mysqli_query($conn, $same_name_sql);
                                                while ($same_name_row = mysqli_fetch_assoc($same_name_result)) {
                                                    $keywords = explode(",", $same_name_row['product_keywords']);
                                                    foreach ($keywords as $keyword) {
                                                        foreach ($color_keywords as $color) {
                                                            if (stripos($keyword, $color) !== false) {
                                                                echo '<div class="color-box circular" style="background-color: ' . strtolower($color) . ';" data-product-id="' . $same_name_row['product_id'] . '" data-toggle="modal" data-target="#product-popup"></div>';
                                                                echo '<div class="product-photo-popup" style="display: none;"></div>';
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
    <?php
                            }
                        }
                    } else {
                        echo "No products found";
                    }
    ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 clearfix text--center">
            <ul class="pagination">
            </ul>
        </div>
    </div>
    </div>
</section>
<?php
include("footer.php");
?>