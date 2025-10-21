<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
include_once 'db_connection.php';

$order_id = $_GET['order_id'];
$sql = "SELECT o.*, c.customer_name, c.customer_address, c.customers_photo, c.customer_city, c.customer_country, c.customer_postal_code,
        od.products_list, od.subtotal, od.discount_total, od.tax_stamp, od.shipping, od.delivery_method, od.payment_method, od.total_amount AS order_total_amount,
        si.shipping_address, si.shipping_city, si.shipping_postal_code, si.shipping_country, si.shipping_phone, si.first_name, si.last_name
        FROM orders o
        INNER JOIN customers c ON o.customer_id = c.customer_id
        INNER JOIN order_details od ON o.order_id = od.order_id
        INNER JOIN shipping_info si ON o.order_id = si.order_id
        WHERE o.order_id = $order_id";

$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $order = mysqli_fetch_assoc($result);
    $order_id = $order['order_id'];
    $customer_photo = $order['customers_photo'];
    $customer_name = $order['customer_name'];
    $customer_address = $order['customer_address'];
    $customer_city = $order['customer_city'];
    $customer_country = $order['customer_country'];
    $customer_postal_code = $order['customer_postal_code'];
    $products_list = $order['products_list'];
    $subtotal = $order['subtotal'];
    $discount_total = $order['discount_total'];
    $tax_stamp = $order['tax_stamp'];
    $shipping = $order['shipping'];
    $delivery_method = $order['delivery_method'];
    $payment_method = $order['payment_method'];
    $order_total_amount = $order['order_total_amount'];
    $shipping_address = $order['shipping_address'];
    $shipping_city = $order['shipping_city'];
    $shipping_postal_code = $order['shipping_postal_code'];
    $shipping_country = $order['shipping_country'];
    $shipping_phone = $order['shipping_phone'];
    $shipping_name = $order['first_name'] . ' ' . $order['last_name'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Order</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                margin-top: 10px;
                background: #eee;
            }
        </style>
    </head>

    <body>
        <div class="container bootdey">
            <div class="row invoice row-printable">
                <div class="col-md-10">
                    <div class="panel panel-default plain" id="dash_0">
                        <div class="panel-body p30">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="invoice-logo"> <img width="100" src="<?php echo $customer_photo; ?>" alt="Customer Photo">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="invoice-from">
                                        <ul class="list-unstyled text-right">
                                            <li>Dash LLC</li>
                                            <li>Avenue Habib Bourguiba</li>
                                            <li>012 - TUNIS.</li>
                                            <li>(+216) 71 199 205</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="invoice-details mt25">
                                        <div class="well">
                                            <ul class="list-unstyled mb0">
                                                <li><strong>Invoice</strong> #<?php echo $order['invoice_no']; ?></li>
                                                <li><strong>Invoice Date:</strong> <?php echo date('l, F jS, Y', strtotime($order['order_date'])); ?></li>
                                                <li><strong>Status:</strong> <span class="label label-danger"><?php echo $order['payment_status']; ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="invoice-to mt25">
                                        <ul class="list-unstyled">
                                            <li><strong>Shipping To</strong></li>
                                            <li><?php echo $shipping_name; ?></li>
                                            <li><?php echo $shipping_address; ?></li>
                                            <li><?php echo $shipping_city . ', ' . $shipping_country . ', ' . $shipping_postal_code; ?></li>
                                            <li><?php echo $shipping_phone; ?></li>
                                        </ul>
                                    </div>
                                    <div class="invoice-items">
                                        <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="per70 text-center">Description</th>
                                                        <th class="per5 text-center">Qty</th>
                                                        <th class="per25 text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
    <?php
    $product_lines = explode('</li>', $products_list);
    foreach ($product_lines as $product_line) {
        if (trim($product_line) !== '') {
            // Extracting product description, quantity, and price
            preg_match('/(\d+)\s+x\s+(.+?)<\/div><span.+?>(.+?)<\/span>/', $product_line, $matches);
            $qty = trim($matches[1]);
            $desc = trim($matches[2]);
            // Extracting regular and promotional prices
            preg_match('/<del>(.+?)<\/del>\s*(\d+\.\d+)\s*TND/', $product_line, $price_matches);
            if (isset($price_matches[2])) {
                // Product has promotional price
                $regular_price = floatval(trim($price_matches[1]));
                $promo_price = floatval(trim($price_matches[2]));
            } else {
                // Product does not have promotional price, set regular price as promotional price
                $regular_price = floatval(trim($matches[3]));
                $promo_price = $regular_price;
            }
            ?>
            <tr>
                <td><?php echo $desc; ?></td>
                <td class="text-center"><?php echo $qty; ?></td>
                <td class="text-center">
                    <?php
                    if ($promo_price !== null) {
                        // Display promotional price if available
                        if ($promo_price != $regular_price) {
                            echo "<del>" . number_format($regular_price, 2) . " TND</del> " . number_format($promo_price, 2) . " TND";
                        } else {
                            echo number_format($promo_price, 2) . " TND";
                        }
                    } else {
                        // Display regular price if promotional price not available
                        echo number_format($regular_price, 2) . " TND";
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</tbody>



                                                <tfoot>
                                                    <tr>
                                                        <th colspan="2" class="text-right">Subtotal:</th>
                                                        <th class="text-center"><?php echo number_format($subtotal, 2); ?> TND</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2" class="text-right">Discount:</th>
                                                        <th class="text-center"><?php echo number_format($discount_total, 2); ?> TND</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2" class="text-right">Tax Stamp:</th>
                                                        <th class="text-center"><?php echo number_format($tax_stamp, 2); ?> TND</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2" class="text-right">Shipping:</th>
                                                        <th class="text-center"><?php echo number_format($shipping, 2); ?> TND</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2" class="text-right">Total:</th>
                                                        <th class="text-center"><?php echo number_format($order_total_amount, 2); ?> TND</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="invoice-footer mt25">
                                        <p class="text-center">Generated on <?php echo date('l, F jS, Y'); ?>
                                            <a href="#" class="btn btn-default ml15" onclick="printInvoice()"><i class="fa fa-print mr5"></i> Print</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <script>
                function printInvoice() {
                    window.print();
                }
            </script>
    </body>

    </html>
<?php
} else {
    echo "Order not found.";
}
?>