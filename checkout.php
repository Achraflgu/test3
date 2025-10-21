<?php
session_start();
include("db_connection.php");
include("header.php");
include("nav.php");
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
                            <h1>checkout</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb">
                        <li><a href="index-2.html">Home</a></li>
                        <li class="active">checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- checkout
============================================= -->
<section id="checkout" class="shop shop-cart checkout pt-30">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 active" id="step1">
                <div class="cart-shiping">
                    <div class="cart--shiping-text">
                        <?php
                        echo '<h3>Personal Information</h3>';
                        if (!isset($_SESSION['customer_email'])) {
                            echo '<p>New here? <a href="register.php">Register</a> to continue checkout. Returning customer? <a href="login.php">Login</a></p>';
                            echo '<p style="color: #999; opacity: 0.7; font-size: 1.0em;">You need to be logged in to continue checkout.</p>';
                        } else {
                            echo '<p>Logged in as ' . $_SESSION['customer_name'] . '.</p>';
                            echo '<p>Not you? <a href="logout.php">Disconnect</a></p>';
                            echo '<p style="color: #999; opacity: 0.7; font-size: 1.0em;">If you log out now, you won\'t be able to continue checkout without accessing your account.</p>';
                        }
                        ?>
                        <?php
                        if (!isset($_SESSION['couponCode'])) {
                            echo '<p>Have a Coupon? <a href="#">Click here to enter your code</a></p>';
                        }
                        ?>
                        <h3>Shipping Info</h3>
                    </div>
                    <?php
                    $shipping_address = '';
                    $shipping_city = '';
                    $shipping_postal_code = '';
                    $shipping_country = '';
                    $shipping_phone = '';
                    $first_name = '';
                    $last_name = '';
                    if (isset($_SESSION['customer_email'])) {
                        $customer_email = $_SESSION['customer_email'];
                        $customer_query = mysqli_query($conn, "SELECT `customer_id` FROM `customers` WHERE `customer_email` = '$customer_email'");
                        if ($customer_query) {
                            $customer_row = mysqli_fetch_assoc($customer_query);
                            $customer_id = $customer_row['customer_id'];
                            $shipping_query = mysqli_query($conn, "SELECT * FROM `shipping_info` WHERE `customer_id` = $customer_id");
                            if (mysqli_num_rows($shipping_query) > 0) {
                                $shipping_info = mysqli_fetch_assoc($shipping_query);
                                $shipping_address = $shipping_info['shipping_address'];
                                $shipping_city = $shipping_info['shipping_city'];
                                $shipping_postal_code = $shipping_info['shipping_postal_code'];
                                $shipping_country = $shipping_info['shipping_country'];
                                $shipping_phone = $shipping_info['shipping_phone'];
                                $first_name = $shipping_info['first_name'];
                                $last_name = $shipping_info['last_name'];
                            }
                        }
                    }
                    ?>
                    <form>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="first-name">FIRST NAME</label>
                                    <input type="text" class="form-control" id="first-name" name="first_name" value="<?php echo isset($first_name) ? $first_name : ''; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="last-name">LAST NAME</label>
                                    <input type="text" class="form-control" id="last-name" name="last_name" value="<?php echo isset($last_name) ? $last_name : ''; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="company-name">COMPANY NAME</label>
                                    <input type="text" class="form-control" id="company-name" name="company_name">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="address">ADDRESS</label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?php echo isset($shipping_address) ? $shipping_address : ''; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="city-town">CITY</label>
                                    <input type="text" class="form-control" id="city-town" name="city" value="<?php echo isset($shipping_city) ? $shipping_city : ''; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="postcode">POSTCODE / ZIP</label>
                                    <input type="number" class="form-control" id="postcode" name="postcode" value="<?php echo isset($shipping_postal_code) ? $shipping_postal_code : ''; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="phone">PHONE</label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="<?php echo isset($shipping_phone) ? $shipping_phone : ''; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="order-note">ORDER NOTE</label>
                                    <textarea id="order-note" class="form-control" name="order_note"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                function parseCartData(cartDataString) {
                    try {
                        return JSON.parse(cartDataString);
                    } catch (error) {
                        console.error('Error parsing cart data:', error);
                        return null;
                    }
                }

                function displayProducts(products) {
                    var productListContainer = document.getElementById('product-list');
                    var productListHtml = '';
                    products.forEach(function(product) {
                        if (product.id && product.name && product.quantity && product.price) {
                            var priceParts = product.price.split('TND');
                            var originalPrice = '';
                            var discountedPrice = '';
                            if (priceParts.length > 1) {
                                originalPrice = priceParts[0].trim();
                                discountedPrice = priceParts[1].trim();
                            } else {
                                originalPrice = product.price.trim();
                            }
                            productListHtml += '<li style="display: flex; justify-content: space-between;">';
                            productListHtml += '<div class="product-details" style="flex: 1;">';
                            productListHtml += product.quantity + ' x ' + product.name;
                            var additionalDetails = '';
                            if (product.color) {
                                additionalDetails += product.color;
                            }
                            if (product.weight) {
                                if (additionalDetails !== '') {
                                    additionalDetails += ' / ';
                                }
                                additionalDetails += product.weight;
                            }
                            if (additionalDetails !== '') {
                                productListHtml += ' (' + additionalDetails + ')';
                            }
                            productListHtml += '</div>';
                            productListHtml += '<span class="price" style="text-align: right;">';
                            if (discountedPrice) {
                                productListHtml += '<del>' + originalPrice + ' TND</del> ' + discountedPrice + ' TND';
                            } else {
                                productListHtml += originalPrice + ' TND';
                            }
                            productListHtml += '</span>';
                            productListHtml += '</li>';
                        }
                    });
                    productListContainer.innerHTML = productListHtml;
                }

                function displayTotals(totals) {
                    document.getElementById('subtotal').innerText = totals.subtotal;
                    document.getElementById('discountTotal').innerText = totals.discountTotal;
                    document.getElementById('total').innerText = totals.total;
                }

                function initializeCheckoutPage() {
                    var cartDataString = sessionStorage.getItem('cartData');
                    console.log('Cart data:', cartDataString);
                    var cartData = parseCartData(cartDataString);
                    if (cartData) {
                        if (cartData.products.length > 0) {
                            displayProducts(cartData.products);
                            displayTotals(cartData);
                        } else {
                            console.error('Cart data is empty');
                            // Redirect to index.php
                            window.location.href = 'index.php';
                        }
                    } else {
                        console.error('Error: Cart data is null');
                    }
                }

                document.addEventListener('DOMContentLoaded', function() {
                    initializeCheckoutPage();
                });
            </script>
            <div class="col-sm-12 col-md-6 col-lg-5 offset-lg-1">
                <div class="cart-total-amount">
                    <h4>Your order</h4>
                    <div class="cart--products">
                        <h6>Products</h6>
                        <div class="clearfix"></div>
                        <ul id="product-list" name="product-list" class="list-unstyled">
                        </ul>
                    </div>
                    <div class="cart--subtotal">
                        <h6>Subtotal</h6>
                        <span id="subtotal" name="subtotal" class="price"></span>
                    </div>
                    <div class="cart--discount">
                        <h6 style="font-size: smaller;">Discount Total</h6>
                        <span id="discountTotal" name="discountTotal" class="price"></span>
                    </div>
                    <?php
                    $tax_query = mysqli_query($conn, "SELECT `default_tax` FROM `settings`");
                    $tax_row = mysqli_fetch_assoc($tax_query);
                    $default_tax = $tax_row['default_tax'];
                    ?>
                    <div class="cart--Tax border-top-0 pt-0">
                        <h6 style="font-size: smaller;">Tax Stamp</h6>
                        <span id="tax" name="tax" class="price"><?php echo number_format($default_tax); ?> TND</span>
                    </div>
                    <div class="cart--shipping border-top-0 pt-0">
                        <h6 style="font-size: smaller;">Shipping</h6>
                        <span id="Shipping" name="Shipping" class="price">0 TND</span>
                    </div>
                    <div class="cart--total">
                        <div class="clearfix">
                            <h6>Total</h6>
                            <span id="total" name="total" class="price"></span>
                        </div>
                        <fieldset class="mb-30 mt-30">
                            <div class="form-group">
                                <label for="delivery-method">Delivery Method</label>
                                <select class="form-control" id="delivery-method" name="delivery_method" onchange="updateTotal()">
                                    <option value="" disabled selected>Select Delivery Method</option>
                                    <?php
                                    $delivery_methods_query = mysqli_query($conn, "SELECT * FROM `delivery_methods`");
                                    while ($delivery_method = mysqli_fetch_assoc($delivery_methods_query)) {
                                        echo "<option value='{$delivery_method['method_id']}' data-charge='{$delivery_method['delivery_charge']}'>{$delivery_method['method_name']} ({$delivery_method['delivery_charge']})</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <label for="payment-method">Payment Method</label>
                            <?php
                            $payment_methods_query = mysqli_query($conn, "SELECT * FROM `payment_methods` WHERE icon_class IS NULL");
                            while ($payment_method = mysqli_fetch_assoc($payment_methods_query)) {
                            ?>
                                <div class="input-radio">
                                    <label class="label-radio">
                                        <?php echo $payment_method['method_name']; ?>
                                        <input type="radio" id="<?php echo $payment_method['method_id']; ?>" class="payment-method-radio" name="payment_method" value="<?php echo $payment_method['method_id']; ?>" onclick="showIcons()">
                                        <span class="radio-indicator"></span>
                                    </label>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="input-radio">
                                <label class="label-radio">Transfer
                                    <span class="currency--icons" id="payment_icons">
                                        <?php
                                        $payment_methods_query = mysqli_query($conn, "SELECT * FROM `payment_methods` WHERE icon_class IS NOT NULL");
                                        while ($payment_method = mysqli_fetch_assoc($payment_methods_query)) {
                                            echo "<i class='{$payment_method['icon_class']}' id='{$payment_method['method_id']}'></i>";
                                        }
                                        ?>
                                    </span>
                                    <input type="radio" name="payment_method" value="transfer" onclick="showIcons()" id="transferOption" class="payment-method-radio">
                                    <span class="radio-indicator"></span>
                                </label>
                            </div>
                        </fieldset>
                        <button id="place-order-btn" class="btn btn--primary btn--rounded btn--block disabled" onclick="placeOrder()">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function updateTotal() {
        var subtotal = parseFloat(document.getElementById('subtotal').innerText.replace('TND', ''));
        var discountTotal = parseFloat(document.getElementById('discountTotal').innerText.replace('TND', ''));
        var taxElement = document.getElementById('tax');
        var shippingElement = document.querySelector('.cart--shipping .price');
        var totalElement = document.getElementById('total');
        var tax = parseFloat(taxElement.innerText.replace('TND', ''));
        var deliveryCharge = 0;
        var deliveryMethodSelect = document.getElementById('delivery-method');
        if (deliveryMethodSelect) {
            var selectedOption = deliveryMethodSelect.options[deliveryMethodSelect.selectedIndex];
            deliveryCharge = selectedOption.dataset.charge ? parseFloat(selectedOption.dataset.charge) : 0;
        }
        var shippingPrice = deliveryCharge + ' TND';
        shippingElement.innerText = shippingPrice;
        var total = subtotal - discountTotal + tax + deliveryCharge;
        totalElement.innerText = total + ' TND';
    }
    document.addEventListener('DOMContentLoaded', function() {
        updateTotal();
    });

    function showIcons() {
        var transferRadio = document.getElementById('transferOption');
        var iconsContainer = document.getElementById('payment_icons');
        var icons = iconsContainer.querySelectorAll('i');
        if (transferRadio.checked) {
            iconsContainer.style.display = 'inline-block';
            icons.forEach(function(icon) {
                icon.style.display = 'inline-block';
                icon.addEventListener('mouseenter', function() {
                    icon.style.transform = 'scale(1.2)';
                });
                icon.addEventListener('mouseleave', function() {
                    icon.style.transform = 'scale(1)';
                });
                icon.addEventListener('click', function() {
                    icons.forEach(function(otherIcon) {
                        otherIcon.classList.remove('selected');
                        otherIcon.style.border = 'none';
                    });
                    icon.classList.add('selected');
                    icon.style.border = '1px solid #007bff';
                    var transferRadio = document.getElementById('transferOption');
                    transferRadio.checked = true;
                    transferRadio.dispatchEvent(new Event('change'));
                    document.querySelector('.payment-method-radio:checked').value = icon.id;
                });
            });
        } else {
            iconsContainer.style.display = 'none';
            icons.forEach(function(icon) {
                icon.style.border = 'none';
                icon.classList.remove('selected');
            });
        }
    }
</script>
<script>
    function checkCompletion() {
        var personalInfoLoggedIn = <?php echo isset($_SESSION['customer_email']) ? 'true' : 'false'; ?>;
        var shippingInfoCompleted = checkShippingInfo();
        var deliveryMethodSelected = checkDeliveryMethod();
        var paymentMethodSelected = checkPaymentMethod();
        return personalInfoLoggedIn && shippingInfoCompleted && deliveryMethodSelected && paymentMethodSelected;
    }

    function checkShippingInfo() {
        var firstName = document.getElementById('first-name').value.trim();
        var lastName = document.getElementById('last-name').value.trim();
        var address = document.getElementById('address').value.trim();
        var city = document.getElementById('city-town').value.trim();
        var postcode = document.getElementById('postcode').value.trim();
        var phone = document.getElementById('phone').value.trim();
        return firstName !== '' && lastName !== '' && address !== '' && city !== '' && postcode !== '' && phone !== '';
    }

    function checkDeliveryMethod() {
        var deliveryMethodSelect = document.getElementById('delivery-method');
        return deliveryMethodSelect && deliveryMethodSelect.selectedIndex !== -1 && deliveryMethodSelect.selectedIndex !== 0;
    }

    function checkPaymentMethod() {
        var transferRadio = document.getElementById('transferOption');
        var paymentMethodRadio = document.querySelector('input[name="payment_method"]:checked');
        var iconsContainer = document.getElementById('payment_icons');
        var selectedIcon = iconsContainer.querySelector('i.selected');
        if (transferRadio.checked) {
            return selectedIcon !== null;
        } else {
            return paymentMethodRadio !== null;
        }
    }

    function placeOrder() {
        if (checkCompletion()) {
            var formData = new FormData();
            formData.append('first_name', document.getElementById('first-name').value.trim());
            formData.append('last_name', document.getElementById('last-name').value.trim());
            formData.append('company_name', document.getElementById('company-name').value.trim());
            formData.append('address', document.getElementById('address').value.trim());
            formData.append('city', document.getElementById('city-town').value.trim());
            formData.append('postcode', document.getElementById('postcode').value.trim());
            formData.append('phone', document.getElementById('phone').value.trim());
            formData.append('order_note', document.getElementById('order-note').value.trim());
            formData.append('delivery_method', document.getElementById('delivery-method').value.trim());
            var paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
            var selectedPaymentMethod = '';
            paymentMethodRadios.forEach(function(radio) {
                if (radio.checked) {
                    selectedPaymentMethod = radio.value;
                }
            });
            if (selectedPaymentMethod === '') {
                var selectedIcon = document.querySelector('.currency--icons i.selected');
                if (selectedIcon) {
                    selectedPaymentMethod = selectedIcon.id;
                }
            }
            formData.append('payment_method', selectedPaymentMethod);
            var totalAmountElement = document.getElementById('total');
            var totalAmount = totalAmountElement.textContent.trim();
            formData.append('total_amount', totalAmount);
            var cartDataString = sessionStorage.getItem('cartData');
            formData.append('cart_data', cartDataString);
            var productList = document.getElementById('product-list').innerHTML;
            formData.append('product_list', productList);
            var subtotal = document.getElementById('subtotal').textContent.trim();
            formData.append('subtotal', subtotal);
            var discountTotal = document.getElementById('discountTotal').textContent.trim();
            formData.append('discount_total', discountTotal);
            var taxStamp = document.getElementById('tax').textContent.trim();
            formData.append('tax_stamp', taxStamp);
            var shipping = document.querySelector('.cart--shipping .price').textContent.trim();
            formData.append('shipping', shipping);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'place_order.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    toastr.success('Your order has been successfully added', '', {
                        timeOut: 6000,
                        positionClass: 'toast-bottom-slightly-left'
                    });
                    var invoiceNo = xhr.responseText.trim();
                    alert("Your order has been successfully added with the invoice number: " + invoiceNo);
                    window.location.href = 'order_success.php?invoice_no=' + invoiceNo;
                    localStorage.removeItem('couponCode');
                } else {
                    console.error('Error occurred while processing order:', xhr.responseText);
                    alert('Error occurred while processing order. Please try again.');
                }
            };
            xhr.onerror = function() {
                console.error('Network error occurred while processing order.');
                alert('Network error occurred. Please try again.');
            };
            xhr.send(formData);
        } else {
            alert('Please complete all required steps before placing the order.');
        }
    }

    function updatePlaceOrderButton() {
        var placeOrderBtn = document.getElementById('place-order-btn');
        var completionStatus = checkCompletion();
        var cartDataString = sessionStorage.getItem('cartData');
        var cartData = parseCartData(cartDataString);
        if (completionStatus && cartData && cartData.products.length > 0) {
            placeOrderBtn.classList.remove('disabled');
            placeOrderBtn.removeAttribute('disabled');
        } else {
            placeOrderBtn.classList.add('disabled');
            placeOrderBtn.setAttribute('disabled', 'disabled');
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        updatePlaceOrderButton();
    });
    var inputFields = document.querySelectorAll('#first-name, #last-name, #address, #city-town, #postcode, #phone, #delivery-method');
    inputFields.forEach(function(input) {
        input.addEventListener('input', updatePlaceOrderButton);
    });
    var paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
    paymentMethodRadios.forEach(function(radio) {
        radio.addEventListener('change', updatePlaceOrderButton);
    });
</script>
<?php
include("footer.php");
?>