<?php
session_start();
include("db_connection.php");
include("header.php");
include("nav.php");
if (isset($_SESSION['customer_email'])) {
    $customerEmail = $_SESSION['customer_email'];
    $sql = "SELECT customer_id FROM customers WHERE customer_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $customerEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $customerId = $row['customer_id'];
    $sql = "SELECT products.product_id, products.product_name, products.product_photo, products.product_price, products.product_stock_quantity
            FROM wishlist
            INNER JOIN products ON wishlist.product_id = products.product_id
            WHERE wishlist.customer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $customerId);
    $stmt->execute();
    $result = $stmt->get_result();
    $wishlistItems = [];
    while ($row = $result->fetch_assoc()) {
        $wishlistItems[] = $row;
    }
}
?>
<!-- Page Title #1
============================================= -->
<section id="page-title" class="page-title mt-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="title title-1 text-center">
                    <div class="title--content">
                        <div class="title--heading">
                            <h1>My Wishlist</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb">
                        <li><a href="index-2.html">Home</a></li>
                        <li class="active">Wishlist</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- wishlist
============================================= -->
<section id="wishlist" class="shop shop-cart wishlist pt-0 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="cart-table wishlist table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="cart-product">
                                <th class="cart-product-item">PRODUCT NAME</th>
                                <th class="cart-product-price">UNIT PRICE</th>
                                <th class="cart-product-status">STOCK STATUS</th>
                                <th class="cart-product-total"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($wishlistItems)) {
                                foreach ($wishlistItems as $item) {
                            ?>
                                    <tr class="cart-product">
                                        <td class="cart-product-item">
                                            <div class="cart-product-img">
                                                <img src="<?= strpos($item['product_photo'], 'http') === 0 ? $item['product_photo'] : 'admin/' . $item['product_photo']; ?>" alt="product" style="width: 100px; height: 100px; object-fit: cover;">
                                            </div>
                                            <div class="cart-product-content">
                                                <div class="cart-product-name">
                                                    <h6><?php echo $item['product_name']; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart-product-price">$<?php echo $item['product_price']; ?></td>
                                        <td class="cart-product-status"><?php echo $item['product_stock_quantity'] > 0 ? 'In Stock' : 'Out of Stock'; ?></td>
                                        <td class="cart-product-total">
                                            <a href="javascript:void(0);" class="btn btn--primary btn--rounded add-to-cart-index" data-product-id="<?php echo $item['product_id']; ?>"><i class="icon-bag"></i>ADD TO CART</a>
                                            <div class="cart-product-remove" data-product-id="<?php echo $item['product_id']; ?>">x</div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include("footer.php");
?>