(function ($) {
    "use strict";
    /* ------------------  LOADING SCREEN ------------------ */
    $(window).on("load", function () {
        setTimeout(function () {
            $(".preloader")
                .fadeOut(1000, function () {  
                    $(this).remove();  
                });
        });  
    });
    document.addEventListener("DOMContentLoaded", function () {
        var darkModeToggle = document.getElementById("theme-checkbox"); 
        var navbar = document.querySelector(".navbar");
        var header = document.querySelector(".header");
        var logo = document.querySelectorAll(".logo"); 
        var sliderItems = document.querySelectorAll('.tp-revslider-slidesli');
        var darkModeLink = document.querySelector("link[href='assets/css/style-dark.css']");
        function toggleDarkMode(enable) {
            if (enable) {
                darkModeLink.disabled = false; 
                darkModeToggle.checked = true;
                navbar.classList.remove("navbar-light");
                navbar.classList.add("navbar-dark");
                header.classList.remove("header-light");
                header.classList.add("header-dark");
                logo.forEach(function (img) {
                    img.src = "assets/images/logo/2.png"; 
                });
            } else {
                darkModeLink.disabled = true; 
                darkModeToggle.checked = false;
                navbar.classList.remove("navbar-dark");
                navbar.classList.add("navbar-light");
                header.classList.remove("header-dark");
                header.classList.add("header-light");
                logo.forEach(function (img) {
                    img.src = "assets/images/logo/1.png"; 
                });
            }
            sliderItems.forEach(function (item) {
                var thumb = item.getAttribute(enable ? 'data-dark-thumb' : 'data-thumb');
                var img = item.querySelector('.tp-bgimg');
                if (img && thumb) {
                    img.setAttribute('src', thumb);
                    img.style.backgroundImage = 'url("' + thumb + '")'; 
                }
            });
            var bulletImages = document.querySelectorAll('.tp-bullet-image');
            bulletImages.forEach(function (bulletImage, index) {
                var thumb = sliderItems[index].getAttribute(enable ? 'data-dark-thumb' : 'data-thumb');
                if (thumb) {
                    bulletImage.style.backgroundImage = 'url("' + thumb + '")';
                }
            });
            localStorage.setItem("darkModeEnabled", enable);
        }
        var prefersDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        var storedDarkMode = localStorage.getItem("darkModeEnabled") === "true";
        toggleDarkMode(prefersDarkMode || storedDarkMode);
        darkModeToggle.addEventListener("change", function () {
            toggleDarkMode(this.checked);
        });
    });
    $(document).ready(function() {
        setTimeout(function() {
            if (!sessionStorage.getItem('popupShown')) {
                $('#newsletter-popup').modal('show');
                sessionStorage.setItem('popupShown', 'true');
            }
        }, 10000);
        $('.mailchimp').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var emailInput = form.find('input[type="email"]');
            var email = emailInput.val();
            if (validateEmail(email)) {
                $.ajax({
                    type: 'POST',
                    url: 'subscribe.php',
                    data: { email: email },
                    success: function(response) {
                        form.find('.subscribe-alert').html('<p>Subscription successful!</p>');
                        toastr.success('Subscription successful!', '', {
                            timeOut: 6000,
                            positionClass: 'toast-bottom-slightly-left'
                        });
                        if (form.hasClass('form--popup-newsletter')) {
                            $('#newsletter-popup').modal('hide');
                        }
                    },
                    error: function() {
                        form.find('.subscribe-alert').html('<p>Subscription failed. Please try again.</p>');
                        toastr.error('Subscription failed. Please try again.', '', {
                            timeOut: 6000,
                            positionClass: 'toast-bottom-slightly-left'
                        });
                    }
                });
            } else {
                form.find('.subscribe-alert').html('<p>Please enter a valid email address.</p>');
                toastr.warning('Please enter a valid email address.', '', {
                    timeOut: 6000,
                    positionClass: 'toast-bottom-slightly-left'
                });
            }
        });
        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    });
    $(document).ready(function() {
        $('.compare').on('click', function() {
            var productId = $(this).data('product-id');

            $.ajax({
                url: 'fetch_product_details.php',
                type: 'POST',
                data: { product_id: productId },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.error) {
                        alert(data.error);
                    } else {
                        var product = data.product;
                        var otherProduct = data.other_product;

                        // Update details for product 1
                        $('#compare-popup .product--img img').eq(0).attr('src', product.product_photo);
                    $('#compare-popup .product--title h3').eq(0).text(product.product_name);
                    $('#compare-popup tbody tr:eq(1) td').eq(0).html(product.product_details); // Update with appropriate data
                    $('#compare-popup tbody tr:eq(2) td').eq(0).text(product.product_stock_quantity); // Update with appropriate data
                    $('#compare-popup tbody tr:eq(3) td').eq(0).text(product.product_id); // Update with appropriate data
                    $('#compare-popup tbody tr:eq(4) td').eq(0).text( product.product_price +' TND'); // Update with appropriate data
                    $('#compare-popup .add-to-cart-index').eq(0).data('product-id', product.product_id); // Update data-product-id attribute

                    // Update details for product 2
                    $('#compare-popup .product--img img').eq(1).attr('src', otherProduct.product_photo);
                    $('#compare-popup .product--title h3').eq(1).text(otherProduct.product_name);
                    $('#compare-popup tbody tr:eq(1) td').eq(1).html(otherProduct.product_details); // Update with appropriate data
                    $('#compare-popup tbody tr:eq(2) td').eq(1).text(otherProduct.product_stock_quantity); // Update with appropriate data
                    $('#compare-popup tbody tr:eq(3) td').eq(1).text(otherProduct.product_id); // Update with appropriate data
                    $('#compare-popup tbody tr:eq(4) td').eq(1).text(otherProduct.product_price +' TND'); // Update with appropriate data
                    $('#compare-popup .add-to-cart-index').eq(1).data('product-id', otherProduct.product_id); // Update data-product-id attribute

                    }
                }
            });
        });
        $('.add-to-cart-index').on('click', function() {
            // Close the comparison popup
            $('#compare-popup').modal('hide');
        });
    });

    
    $(document).ready(function () {
        $('#product-detalis9 .product--meta-select3 select').change(function () {
            const productId = $(this).val();
            if (!isNaN(productId)) {
                window.location.href = 'product.php?id=' + productId;
            }
        });
        function loadProductDetails(productId) {
            $.ajax({
                url: 'get_product_details.php',
                type: 'GET',
                data: { product_id: productId },
                dataType: 'json',
                success: function (response) {
                    var currentDate = response.currentDate;
                    $('#product-detalis9 .product--title h3').text(response.product_name);
                    $('#product-detalis9 .product--rating').html(generateStars(response.avg_rating));
                    $('#product-detalis9 .product--review').text(response.reviews + ' Reviews');
                    if (response.product_tag === 'Sale' && response.currentDate >= response.sale_start_date && response.currentDate <= response.sale_end_date) {
                        $('#product-detalis9 .product--price').html('<span class="original-price">' + response.product_price + ' TND</span><span class="sale-price">' + response.product_sale_price + ' TND</span>');
                    } else {
                        $('#product-detalis9 .product--price').text(response.product_price + ' TND');
                    }
                    $('#product-detalis9 .product--desc-tabs #product--desc-tabs-1 .product--desc p').text(response.product_description);
                    $('#product-detalis9 .product--desc-tabs #product--desc-tabs-2 .product--desc p').text(response.product_features);
                    $('#product-detalis9 .product--desc-tabs #product--desc-tabs-3 .product--desc p').text(response.product_details);
                    $('#product-detalis4 .tab-content #description .product--desc p').text(response.product_description);
                    $('#product-detalis4 .tab-content #description .product--desc-list p').text(response.product_details);
                    $('#addtional-info .product--desc p').text(response.product_features);
                    $('.product--desc-list').html(response.product_details);
                    $('#product-detalis9 .product--meta-info li:eq(0) span').text(response.product_stock_quantity > 0 ? 'In Stock' : 'Out of Stock');
                    $('#product-detalis9 .product--meta-info li:eq(1) span').text(response.product_id);
                    $('#product-detalis9 .add-to-cart').attr('data-product-id', response.product_id);
                    $('#product-detalis9 .add-to-wishlist').attr('data-product-id', response.product_id);
                    $('#product-detalis9 .compare').attr('data-product-id', response.product_id);
                    var reviewsCount = response.reviews;
                    $('#product-detalis4 ul.nav-tabs li:nth-child(3) a').text('reviews(' + reviewsCount + ')');
                    $('#product-detalis9 .products-gallery-carousel.products-gallery-carousel-1 .product-img img').each(function (index) {
                        var photoField = 'product_photo';
                        if (index === 1) photoField = 'product_photo_1';
                        else if (index === 2) photoField = 'product_photo_2';
                        else if (index === 3) photoField = 'product_photo_3';
                        var imageUrl = response[photoField] ? (response[photoField].startsWith('http') ? response[photoField] : 'admin/' + response[photoField]) : '';
                        $('#product-detalis9 .products-gallery-carousel.products-gallery-carousel-1 .product-img #product-img-' + (index + 1)).attr('src', imageUrl).toggle(!!response[photoField]);
                    });
                    $('#product-detalis9 .owl-thumbs .owl-thumb-item').each(function (index) {
                        var thumbField = 'product_photo';
                        if (index === 1) thumbField = 'product_photo_1';
                        else if (index === 2) thumbField = 'product_photo_2';
                        else if (index === 3) thumbField = 'product_photo_3';
                        var thumbImageUrl = response[thumbField] ? (response[thumbField].startsWith('http') ? response[thumbField] : 'admin/' + response[thumbField]) : '';
                        $('#product-detalis9 .owl-thumbs .owl-thumb-item #thumb-' + (index + 1)).attr('src', thumbImageUrl).toggle(!!response[thumbField]);
                    });
                    const keywords = JSON.parse(response.product_keywords);
                    updateProductMeta(keywords);
                    loadSimilarProducts(response.product_name, keywords);
                    checkWishlistItems();
                    $('#product-detalis9').show();
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('id');
        loadProductDetails(productId);
    });
    $(document).ready(function () {
        $('a[data-target="#product-popup"], div[data-target="#product-popup"]').on('click', function () {
            resetModal();
            var productId = $(this).data('product-id');
            loadProductPopup(productId);
        });
        $('#product-popup .product--meta-select3 select').change(function () {
            const productId = $(this).val();
            if (!isNaN(productId)) {
                loadProductPopup(productId);
            }
        });
        function loadProductPopup(productId) {
            $.ajax({
                url: 'get_product_details.php',
                type: 'GET',
                data: { product_id: productId },
                dataType: 'json',
                success: function (response) {
                    var currentDate = response.currentDate;
                    $('#product-popup .product--title h3').text(response.product_name);
                    $('#product-popup .product--rating').html(generateStars(response.avg_rating));
                    $('#product-popup .product--review').text(response.reviews + ' Reviews');
                    if (response.product_tag === 'Sale' && response.currentDate >= response.sale_start_date && response.currentDate <= response.sale_end_date) {
                        $('#product-popup .product--price').html('<span class="original-price">' + response.product_price + ' TND</span><span class="sale-price">' + response.product_sale_price + ' TND</span>');
                    } else {
                        $('#product-popup .product--price').text(response.product_price + ' TND');
                    }
                    $('#product-popup .product--desc-tabs #popup--desc-tabs-1 .product--desc p').text(response.product_description);
                    $('#product-popup .product--desc-tabs #popup--desc-tabs-2 .product--desc p').text(response.product_features);
                    $('#product-popup .product--desc-tabs #popup--desc-tabs-3 .product--desc p').text(response.product_details);
                    $('#product-popup .product--details').html(response.product_details);
                    $('#product-popup .product--features').html(response.product_features);
                    const stockStatus = response.product_stock_quantity > 0 ? 'In Stock' : 'Out Stock';
                    $('#product-popup .product--meta-info li:eq(0) span').text(stockStatus);
                    if (stockStatus === 'In Stock') {
                        $('.add-to-cart').removeAttr('disabled').removeClass('disabled');
                        $('.add-to-cart').css({ 'cursor': 'pointer', 'opacity': '1' });
                    } else {
                        $('.add-to-cart').attr('disabled', 'disabled').addClass('disabled');
                        $('.add-to-cart').css({ 'cursor': 'not-allowed', 'opacity': '0.7' });
                    }
                    $('#product-popup .product--meta-info li:eq(1) span').text(response.product_id);
                    $(".add-to-cart").data("product-id", response.product_id);
                    $(".compare").data("product-id", response.product_id);
                    $("#product-popup .add-to-wishlist").attr("data-product-id", response.product_id);
                    $('#product-popup .products-gallery-carousel.products-gallery-carousel-2 .product-img #product-img-1').attr('src', response.product_photo ? (response.product_photo.startsWith('http') ? response.product_photo : 'admin/' + response.product_photo) : '').toggle(!!response.product_photo);
                    $('#product-popup .products-gallery-carousel.products-gallery-carousel-2 .product-img #product-img-2').attr('src', response.product_photo_1 ? (response.product_photo_1.startsWith('http') ? response.product_photo_1 : 'admin/' + response.product_photo_1) : '').toggle(!!response.product_photo_1);
                    $('#product-popup .products-gallery-carousel.products-gallery-carousel-2 .product-img #product-img-3').attr('src', response.product_photo_2 ? (response.product_photo_2.startsWith('http') ? response.product_photo_2 : 'admin/' + response.product_photo_2) : '').toggle(!!response.product_photo_2);
                    $('#product-popup .products-gallery-carousel.products-gallery-carousel-2 .product-img #product-img-4').attr('src', response.product_photo_3 ? (response.product_photo_3.startsWith('http') ? response.product_photo_3 : 'admin/' + response.product_photo_3) : '').toggle(!!response.product_photo_3);
                    $('#product-popup .owl-thumbs .owl-thumb-item #thumb-1').attr('src', response.product_photo ? (response.product_photo.startsWith('http') ? response.product_photo : 'admin/' + response.product_photo) : '').toggle(!!response.product_photo);
                    $('#product-popup .owl-thumbs .owl-thumb-item #thumb-2').attr('src', response.product_photo_1 ? (response.product_photo_1.startsWith('http') ? response.product_photo_1 : 'admin/' + response.product_photo_1) : '').toggle(!!response.product_photo_1);
                    $('#product-popup .owl-thumbs .owl-thumb-item #thumb-3').attr('src', response.product_photo_2 ? (response.product_photo_2.startsWith('http') ? response.product_photo_2 : 'admin/' + response.product_photo_2) : '').toggle(!!response.product_photo_2);
                    $('#product-popup .owl-thumbs .owl-thumb-item #thumb-4').attr('src', response.product_photo_3 ? (response.product_photo_3.startsWith('http') ? response.product_photo_3 : 'admin/' + response.product_photo_3) : '').toggle(!!response.product_photo_3);
                    const keywords = JSON.parse(response.product_keywords);
                    updateProductMeta(keywords);
                    loadSimilarProducts(response.product_name, keywords);
                    $('#product-popup').modal('show');
                    checkWishlistItems();
                }
            });
        }
    });
    function updateProductMeta(keywords) {
        const colorSelect = $('.product--meta-select3 select:eq(0)');
        const weightSelect = $('.product--meta-select3 select:eq(1)');
        const sizeSelect = $('.product--meta-select3 select:eq(2)'); 
        colorSelect.empty();
        weightSelect.empty();
        sizeSelect.empty();
        const colorNames = ['red', 'blue', 'green', 'yellow', 'black', 'white', 'orange']; 
        keywords.forEach(keyword => {
            if (colorNames.includes(keyword.toLowerCase())) {
                colorSelect.append($('<option>', { value: keyword, text: keyword }));
            } else if (keyword.startsWith('w-')) {
                const weight = keyword.substring(2) + ' kg';
                weightSelect.append($('<option>', { value: weight, text: weight }));
            }
        });
    }
    function loadSimilarProducts(productName, keywords) {
        $.ajax({
            url: 'get_similar_products.php',
            type: 'GET',
            data: { product_name: productName },
            dataType: 'json',
            success: function (response) {
                const similarOptions = { color: new Map(), weight: new Map(), size: new Set() };
                const currentProductKeywords = new Set(keywords);
                response.forEach(product => {
                    const productId = product.product_id;
                    const productKeywords = JSON.parse(product.product_keywords);
                    productKeywords.forEach(keyword => {
                        if (isColorName(keyword.toLowerCase())) {
                            if (!keywords.includes(keyword)) {
                                similarOptions.color.set(keyword, productId);
                            }
                        } else if (keyword.startsWith('w-')) {
                            const weight = keyword.substring(2) + ' kg';
                            if (!keywords.includes(weight)) {
                                if (!similarOptions.weight.has(weight)) {
                                    similarOptions.weight.set(weight, []);
                                }
                                similarOptions.weight.get(weight).push(productId);
                            }
                        } else if (keyword.startsWith('s-')) {
                            const size = keyword.substring(2);
                            if (!keywords.includes(size) && currentProductKeywords.has(keyword)) {
                                similarOptions.size.add(size);
                            }
                        }
                    });
                });
                const colorSelect = $('.product--meta-select3 select:eq(0)');
                const weightSelect = $('.product--meta-select3 select:eq(1)');
                const sizeSelect = $('.product--meta-select3 select:eq(2)'); 
                similarOptions.color.forEach((productId, color) => {
                    colorSelect.append($('<option>', { value: productId, text: color }));
                });
                const selectedWeight = weightSelect.val();
                similarOptions.weight.forEach((productIds, weight) => {
                    if (selectedWeight !== weight) {
                        weightSelect.append($('<option>', { value: productIds.join(','), text: weight }));
                    }
                });
                similarOptions.size.forEach(size => {
                    sizeSelect.append($('<option>', { value: size, text: size }));
                });
                $('.product--meta-select3 .col-6').each(function() {
                    const select = $(this).find('select');
                    if (select.find('option').length === 0) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
                sizeSelect.off('change');
                sizeSelect.on('change', function (event) {
                    event.stopPropagation(); 
                    event.preventDefault();  
                });
                colorSelect.on('change', function () {
                    const selectedColor = $(this).val();
                    weightSelect.empty();
                    similarOptions.weight.forEach((productIds, weight) => {
                        if (productIds.includes(parseInt(selectedColor))) {
                            weightSelect.append($('<option>', { value: productIds.join(','), text: weight }));
                        }
                    });
                });
            }
        });
    }
    function isColorName(name) {
        const colorNames = ['red', 'blue', 'green', 'yellow', 'black', 'white', 'orange']; 
        return colorNames.includes(name);
    }
    function checkWishlistItems() {
        $.ajax({
            url: 'check_wishlist.php',
            type: 'GET',
            success: function (response) {
                try {
                    if (!response.trim()) {
                        console.warn('Empty response received.');
                        return;
                    }
                    var wishlistItems = JSON.parse(response);
                    wishlistItems.forEach(function (item) {
                        $('.add-to-wishlist[data-product-id="' + item.product_id + '"]').addClass('added');
                    });
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                    alert('Error fetching wishlist items. Please try again later.');
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
                alert('Error fetching wishlist items. Please try again later.');
            }
        });
    }
    function resetModal() {
        $('#thumb-1').attr('src', '').addClass('active');
        $('#thumb-2').attr('src', '').removeClass('active');
        $('#thumb-3').attr('src', '').removeClass('active');
        $('#thumb-4').attr('src', '').removeClass('active');
        var firstThumbSrc = $('#thumb-1').attr('src');
        $('#product-img-1').attr('src', firstThumbSrc);
        $('.owl-thumbs .owl-thumb-item').removeClass('active');
        $('.owl-thumbs .owl-thumb-item:first-child').addClass('active');
        var owl = $('.products-gallery-carousel-2 .owl-carousel');
        owl.trigger('to.owl.carousel', [0]);
        $('#product-popup .product--desc-tabs #popup--desc-tabs-1').addClass('active show');
        $('#product-popup .product--desc-tabs #popup--desc-tabs-2').removeClass('active show');
        $('#product-popup .product--desc-tabs #popup--desc-tabs-3').removeClass('active show');
        $('#product-popup #popup--desc-tabs-1').addClass('active show');
        $('#product-popup #popup--desc-tabs-2').removeClass('active show');
        $('#product-popup #popup--desc-tabs-3').removeClass('active show');
        $('#product-popup .nav.nav-tabs li a').removeClass('active');
        $('#product-popup .nav.nav-tabs li:first-child a').addClass('active');
        $('.product--meta-info li span').text('');
        $('.select--box select').val('');
        $('.qty').val('1');
        $('#product-popup .add-to-wishlist').removeClass('added');
        $('#product-popup .product--meta-select3 select:eq(0)').empty();
        $('#product-popup .product--meta-select3 select:eq(1)').empty();
        $('#product-popup .product--meta-select3 select:eq(2)').empty();
    }
    function generateStars(rating) {
        var stars = '';
        for (var i = 1; i <= 5; i++) {
            if (i <= rating) {
                stars += '<i class="fa fa-star active"></i>';
            } else {
                stars += '<i class="fa fa-star"></i>';
            }
        }
        return stars;
    }
    $('.btn--primary.btn--rounded.btn--block').click(function (e) {
        e.preventDefault();
        var cartData = {
            products: [],
            total: $('.total span').text(), 
            subtotal: $('.sub--total span').text(), 
            discountTotal: $('.discount-amount').text() 
        };
        $('.cart-product').each(function () {
            var productId = $(this).find('.product-id').val();
            var productName = $(this).find('.cart-product-name h6').text();
            var productPrice = $(this).find('.cart-product-total span').text();
            var productQuantity = $(this).find('.qty').val();
            var productColor = $(this).find('ul li:contains("Color") span').last().text().trim(); 
            var productWeight = $(this).find('ul li:contains("Weight") span').last().text().trim(); 
            var productSize = $(this).find('ul li:contains("Size") span').last().text().trim(); 
            cartData.products.push({
                id: productId,
                name: productName,
                price: productPrice,
                quantity: productQuantity,
                color: productColor,
                weight: productWeight,
                size: productSize
            });
        });
        sessionStorage.setItem('cartData', JSON.stringify(cartData));
        window.location.href = 'checkout.php';
    });
    /* ------------------ CART COUPON ------------------ */
    $(document).ready(function () {
        $('.cart-product-action .btn--secondary').click(function (e) {
            e.preventDefault();
            applyCoupon();
        });
        if (window.location.pathname === '/msport/cart.php') {
            var storedCouponCode = localStorage.getItem('couponCode');
            if (storedCouponCode) {
                $('#coupon').val(storedCouponCode);
                applyCoupon();
            }
        }
    });
    function applyCoupon() {
        var couponCode = $('#coupon').val(); 
        var products = [];
        $('.cart-product').each(function () {
            var productId = $(this).find('.product-id').val();
            var priceString = $(this).find('.cart-product-total span').text();
            var price = parseFloat(priceString.replace('TND', '').trim());
            if (!isNaN(price)) {
                products.push({ id: productId, price: price });
            }
        });
        console.log('Products in Cart:', products); 
        $.ajax({
            url: 'validateCoupon.php',
            type: 'POST',
            dataType: 'json',
            data: { coupon_code: couponCode, products: products }, 
            success: function (response) {
                if (response.status === 'success') {
                    var discountAmount = response.discount_amount; 
                    var discountedProducts = response.discounted_products; 
                    console.log('Discount Amount:', response.discount_amount);
                    console.log('Discounted Products:', response.discounted_products);
                    if (discountedProducts.length > 0) {
                        updateCartTotal(discountAmount, discountedProducts);
                        discountedProducts.forEach(function (discountedProduct) {
                            var productId = discountedProduct.product_id;
                            var discountPercentage = parseFloat(discountedProduct.discount_percentage);
                            var product = products.find(function (prod) {
                                return prod.id === productId;
                            });
                            if (product) {
                                var discountedPrice = product.price - (product.price * (discountPercentage / 100));
                                var discountAmount = product.price - discountedPrice;
                                $('#product_' + productId + '_price .product-price').text(discountedPrice + ' TND'); 
                                console.log('Updated Price for Product ID ' + productId + ': ' + discountedPrice + ' TND'); 
                                console.log('Discount Amount for Product ID ' + productId + ': ' + discountAmount + ' TND'); 
                            }
                        });
                        localStorage.setItem('couponCode', couponCode);
                        toastr.success('Coupon applied successfully!', '', { 
                            timeOut: 6000, 
                            positionClass: 'toast-bottom-slightly-left' 
                        });
                    } else {
                        console.log('No discounted products for this coupon.');
                        toastr.info('No discounted products for this coupon.', '', { 
                            timeOut: 6000, 
                            positionClass: 'toast-bottom-slightly-left' 
                        });
                    }
                } else {
                    toastr.error('Invalid coupon code. Please try again.', '', { 
                        timeOut: 6000, 
                        positionClass: 'toast-bottom-slightly-left' 
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error applying coupon:', textStatus, errorThrown);
                console.log('Server response:', jqXHR.responseText);
            }
        });
    }
    function updateCartTotal(totalProductDiscount, discountedProducts) {
        var cartSubtotal = 0;
        var totalDiscountAmount = 0;
        $('.cart-product').each(function () {
            var productId = $(this).find('.product-id').val();
            var priceString = $(this).find('.cart-product-total span').text();
            var price = parseFloat(priceString.replace('TND', '')); 
            if (!isNaN(price)) {
                var discountedProduct = discountedProducts.find(function (product) {
                    return product.product_id === productId;
                });
                if (discountedProduct) {
                    var discountPercentage = parseFloat(discountedProduct.discount_percentage);
                    var discountedPrice = price - (price * (discountPercentage / 100));
                    totalDiscountAmount += price - discountedPrice;
                    var cartTotalElement = $(this).find('.cart-product-total span');
                    cartTotalElement.html('<del>' + price.toFixed(2) + ' TND</del> ' + discountedPrice + ' TND');
                }
                cartSubtotal += price;
            }
        });
        console.log('Cart Subtotal:', cartSubtotal); 
        console.log('Discount Total:', totalDiscountAmount); 
        var discountTotal = totalDiscountAmount; 
        console.log('Discount Total:', discountTotal); 
        var grandTotal = cartSubtotal - discountTotal;
        console.log('Grand Total:', grandTotal); 
        $('.total span').text(grandTotal.toFixed(2) + ' TND'); 
        $('.discount-amount').text(discountTotal.toFixed(2) + ' TND'); 
    }
    /* ------------------ PAGE CART & CART BOX ------------------ */
    $(document).ready(function () {
        function loadCart() {
            $.ajax({
                url: 'loadCart.php',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        updateCartUI(response);
                    } else {
                        console.error('Error loading cart:', response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error loading cart:', textStatus, errorThrown);
                    console.log('Server response:', jqXHR.responseText);
                }
            });
        }
        function updateCartUI(response) {
            var cartTotal = parseFloat(response.cartTotal);
            var cartCount = response.cartCount;
            var products = response.products;
            var currentDate = new Date().toISOString().slice(0, 10);
            $('.cart-total .total-price').text(cartTotal + ' TND');
            $('.cart-icon .module-label').text(cartCount);
            $('.sub--total span').text(cartTotal + ' TND');
            $('.total span').text(cartTotal + ' TND');
            var cartOverview = $('.cart-overview ul');
            var cartTableBody = $('#shopcart .cart-table tbody');
            cartOverview.empty();
            cartTableBody.empty();
            products.forEach(function (product) {
                var priceHtml = '';
                console.log("Current Date:", currentDate);
                console.log("Product Sale Start Date:", product.sale_start_date);
                console.log("Product Sale End Date:", product.sale_end_date);
                if (product.product_tag === 'Sale' && currentDate >= product.sale_start_date && currentDate <= product.sale_end_date) {
                    console.log("Product is on sale and within the sale period");
                    priceHtml = `<p class="product-price"><del>${product.product_price} TND</del> ${product.product_sale_price} TND</p>`;
                } else {
                    console.log("Product is not on sale or the current date is not within the sale period");
                    priceHtml = `<p class="product-price">${product.product_price} TND</p>`;
                }
                var productHtmlOverview = `
                    <li>
                    <img class="img-fluid" src="${product.product_photo.startsWith('http') ? product.product_photo : 'admin/' + product.product_photo}" alt="product" />
                        <div class="product-meta">
                        <h5 class="product-title"><a href="http://localhost/msport/product.php?id=${product.product_id}" target="_blank">${product.product_name}</a></h5>

                            <div class="product-quantity">
                                <button class="quantity-btn minus" data-cart-id="${product.cart_id}">-</button>
                                <input type="text" id="pro${product.cart_id}-qunt" value="${product.quantity}" class="quantity-input" readonly>
                                <button class="quantity-btn plus" data-cart-id="${product.cart_id}">+</button>
                            </div>
                            <p class="product-price mt-3" style="text-align: right;">
    ${(product.product_tag === 'Sale' && currentDate >= product.sale_start_date && currentDate <= product.sale_end_date) ?
                        `<del>${product.product_price * product.quantity} TND</del> ${product.product_sale_price * product.quantity} TND` :
                        `${product.product_price * product.quantity} TND`}
</p>
                        </div>
                        <a class="cart-cancel" href="#" data-cart-id="${product.cart_id}"><i class="lnr lnr-cross"></i></a>
                    </li>`;
                cartOverview.append(productHtmlOverview);
                var productHtmlTable = `
<tr class="cart-product">
    <td class="cart-product-item">
        <div class="cart-product-img">
        <img src="${product.product_photo.startsWith('http') ? product.product_photo : 'admin/' + product.product_photo}" alt="product" style="max-width: 100px; max-height: 100px;" />
        </div>
        <div class="cart-product-content">
            <div class="cart-product-name">
            <h6><a href="http://localhost/msport/product.php?id=${product.product_id}" target="_blank">${product.product_name}</a></h6>

            </div>
            <ul class="list-unstyled mb-0">
                ${product.color ? `<li><span>Color:</span><span>${product.color}</span></li>` : ''}
                ${product.size ?
                    (isNaN(product.size) ? 
                        `<li><span>Weight:</span><span>${product.size}</span></li>` : 
                        `<li><span>Size:</span><span>${product.size}</span></li>` 
                    ) : ''}
            </ul>
        </div>
    </td>
    <td class="cart-product-price">
        ${priceHtml}
    </td>
    <td class="cart-product-quantity">
        <div class="product-quantity">
            <button class="minus" data-cart-id="${product.cart_id}">-</button>
            <input type="text" id="pro${product.cart_id}-qunt" value="${product.quantity}" class="qty" readonly>
            <button class="plus" data-cart-id="${product.cart_id}">+</button>
        </div>
    </td>
    <td class="cart-product-total">
    <span>${(product.product_tag === 'Sale' && currentDate >= product.sale_start_date && currentDate <= product.sale_end_date) ? product.product_sale_price * product.quantity + ' TND' : product.product_price * product.quantity + ' TND'}</span>
    <div class="cart-product-remove" data-cart-id="${product.cart_id}">x</div>
        <input type="hidden" class="product-id" value="${product.product_id}">
    </td>
</tr>`;
                cartTableBody.append(productHtmlTable);
            });
            $('.minus').click(function (e) {
                e.preventDefault();
                var cartId = $(this).data('cart-id');
                var quantityInput = $(this).siblings('.quantity-input, .qty');
                var currentQuantity = parseInt(quantityInput.val());
                if (currentQuantity > 1) {
                    updateCartQuantity('decrease', cartId, currentQuantity);
                } else {
                    console.log('Minimum quantity reached');
                }
            });
            $('.plus').click(function (e) {
                e.preventDefault();
                var cartId = $(this).data('cart-id');
                updateCartQuantity('increase', cartId);
            });
            $('.cart-cancel, .cart-product-remove').click(function (e) {
                e.preventDefault();
                var cartId = $(this).data('cart-id');
                removeCartItem(cartId);
            });
        }
        function updateCartQuantity(action, cartId, currentQuantity = null) {
            $.ajax({
                url: 'addToCart.php',
                type: 'POST',
                data: {
                    action: action,
                    cartId: cartId,
                    quantity: currentQuantity
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        loadCart();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error updating cart quantity:', textStatus, errorThrown);
                    console.log('Server response:', jqXHR.responseText);
                }
            });
        }
        function removeCartItem(cartId) {
            $.ajax({
                url: 'addToCart.php',
                type: 'POST',
                data: {
                    action: 'remove',
                    cartId: cartId
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        loadCart();
                        toastr.info('Product removed from cart', '', {
                            timeOut: 6000,
                            positionClass: 'toast-bottom-slightly-left'
                        });
                    } else {
                        console.error('Error removing cart item:', response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error removing cart item:', textStatus, errorThrown);
                    console.log('Server response:', jqXHR.responseText);
                }
            });
        }
        loadCart();
        $(document).on('click', '#product-popup .add-to-cart', function (e) {
            e.preventDefault();
            var productId = $(this).data("product-id");
            var modalQuantityInput = $("#product-popup .qty");
            var quantity = modalQuantityInput.val();
            var color = $('#product-popup .product--meta-select3 select:eq(0)').val();
            var sizeSelect1 = $('#product-popup .product--meta-select3 select:eq(1)');
            var sizeSelect2 = $('#product-popup .product--meta-select3 select:eq(2)');
            console.log('Size Select 1:', sizeSelect1.val());
            console.log('Size Select 2:', sizeSelect2.val());
            var size;
            if (sizeSelect1.length && sizeSelect1.val() !== null) {
                size = sizeSelect1.val();
            } else if (sizeSelect2.length && sizeSelect2.val() !== null) {
                size = sizeSelect2.val();
            } else {
                size = sizeSelect2.val();         
            }
            console.log('Selected Size:', size);
            var requestData = {
                action: 'add',
                productId: productId,
                quantity: quantity,
                color: color,
                size: size
            };
            $.ajax({
                url: 'addToCart.php',
                type: 'POST',
                data: requestData,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        loadCart();
                        $("#product-popup").modal('hide');
                        // Show success notification
                        toastr.success('Product added to cart successfully!', '', { 
                            timeOut: 6000, 
                            positionClass: 'toast-bottom-slightly-left' 
                        });
                    } else {
                        console.error('Error adding to cart:', response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                    console.log('Server response:', jqXHR.responseText);
                }
            });
        });
        
        $(document).on('click', '#product-detalis9 .add-to-cart', function (e) {
            e.preventDefault();
            var productId = $(this).data("product-id");
            var modalQuantityInput = $("#product-detalis9 .qty"); 
            var quantity = modalQuantityInput.val();
            var color = $('#product-detalis9 .product--meta-select3 select:eq(0)').val();
            var sizeSelect1 = $('#product-detalis9 .product--meta-select3 select:eq(1)');
            var sizeSelect2 = $('#product-detalis9 .product--meta-select3 select:eq(2)');
            console.log('Size Select 1:', sizeSelect1.val());
            console.log('Size Select 2:', sizeSelect2.val());
            var size;
            if (sizeSelect1.length && sizeSelect1.val() !== null) {
                size = sizeSelect1.val();
            } else if (sizeSelect2.length && sizeSelect2.val() !== null) {
                size = sizeSelect2.val();
            } else {
                size = sizeSelect2.val();         
               }
            console.log('Selected Size:', size);
            $.ajax({
                url: 'addToCart.php',
                type: 'POST',
                data: {
                    action: 'add',
                    productId: productId,
                    quantity: quantity,
                    color: color,
                    size: size
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        loadCart();
                        $("#product-popup").modal('hide');
                        toastr.success('Product added to cart successfully!', '', { 
                            timeOut: 6000, 
                            positionClass: 'toast-bottom-slightly-left' 
                        });
                    } else {
                        console.error('Error adding to cart:', response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                    console.log('Server response:', jqXHR.responseText);
                }
            });
        });
        $(document).on('click', '.add-to-cart-index', function (e) {
            e.preventDefault();
            var productId = $(this).data("product-id");
            $.ajax({
                url: 'addToCart.php',
                type: 'POST',
                data: {
                    action: 'add',
                    productId: productId,
                    quantity: 1 
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        loadCart();
                        $('#compare-popup').modal('hide');
                        toastr.success('Product added to cart successfully!', '', { 
                            timeOut: 6000, 
                            positionClass: 'toast-bottom-slightly-left' 
                        });
                    } else {
                        console.error('Error adding to cart:', response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                    console.log('Server response:', jqXHR.responseText);
                }
            });
        });
    });
    /* ------------------  ICON ADD WISHLIST ------------------ */
    $(document).ready(function () {
        checkWishlistItems();
        $('.add-to-wishlist').on('click', function (e) {
            e.preventDefault();
            var productId = $(this).data('product-id');
            var action = $(this).hasClass('added') ? 'remove' : 'add';
            $.ajax({
                url: 'wishlist_action.php',
                type: 'POST',
                data: {
                    action: action,
                    product_id: productId
                },
                success: function (response) {
                    if (response === 'not_logged_in') {
                        toastr.warning('Please log in to add items to wishlist.', '', { 
                            timeOut: 6000, 
                            positionClass: 'toast-bottom-slightly-left' 
                        });
                        return;
                    }
                    if (action === 'add') {
                        $('.add-to-wishlist[data-product-id="' + productId + '"]').addClass('added');
                        toastr.success('Item added to wishlist!', '', { 
                            timeOut: 6000, 
                            positionClass: 'toast-bottom-slightly-left' 
                        });
                    } else {
                        $('.add-to-wishlist[data-product-id="' + productId + '"]').removeClass('added');
                        toastr.info('Item removed from wishlist.', '', { 
                            timeOut: 6000, 
                            positionClass: 'toast-bottom-slightly-left' 
                        });
                    }
                }
            });
        });
        function checkWishlistItems() {
            $.ajax({
                url: 'check_wishlist.php',
                type: 'GET',
                success: function (response) {
                    try {
                        if (!response.trim()) {
                            console.warn('Empty response received.');
                            return;
                        }
                        var wishlistItems = JSON.parse(response);
                        wishlistItems.forEach(function (item) {
                            $('.add-to-wishlist[data-product-id="' + item.product_id + '"]').addClass('added');
                        });
                    } catch (e) {
                        console.error('Error parsing JSON:', e);
                        alert('Error fetching wishlist items. Please try again later.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', status, error);
                    alert('Error fetching wishlist items. Please try again later.');
                }
            });
        }
        $('.cart-product-remove').on('click', function (e) {
            e.preventDefault();
            var productId = $(this).data('product-id');
            $.ajax({
                url: 'wishlist_action.php',
                type: 'POST',
                data: {
                    action: 'remove',
                    product_id: productId
                },
                success: function (response) {
                    if (response === 'not_logged_in') {
                        toastr.warning('Please log in to add items to wishlist.', '', { 
                            timeOut: 6000, 
                            positionClass: 'toast-bottom-slightly-left' 
                        });
                        return;
                    }
                    $('.add-to-wishlist[data-product-id="' + productId + '"]').removeClass('added');
                    $(e.target).closest('.cart-product').remove();
                    toastr.info('Item removed from wishlist.', '', { 
                        timeOut: 6000, 
                        positionClass: 'toast-bottom-slightly-left' 
                    });
                }
            });
        });
    });
    /* ------------------  HOVER PHOTO ------------------ */
    $(document).on('mouseenter', '.color-box', function () {
        var productId = $(this).data('product-id');
        var productPhotoPopup = $(this).next('.product-photo-popup');
        getProductPhoto(productId, productPhotoPopup);
    });
    function getProductPhoto(productId, productPhotoPopup) {
        $.ajax({
            url: 'get_product_photo.php',
            method: 'POST',
            data: { productId: productId },
            success: function (response) {
                var imageUrl = response.startsWith('http') ? response : 'admin/' + response;
                productPhotoPopup.html('<img src="' + imageUrl + '" alt="Product Photo" style="mix-blend-mode: multiply;">'); productPhotoPopup.show();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    $(document).on('mouseleave', '.color-box', function () {
        $(this).next('.product-photo-popup').hide();
    });
    /* ------------------  Filter ------------------ */
    $(document).ready(function () {
        $('.product--rating a').click(function (e) {
            e.preventDefault(); 
            $('.product--rating a i').removeClass('active');
            $(this).find('i').addClass('active');
            var newRating = $(this).prevAll().length + 1;
            $('#rating_input').val(newRating); 
        });
    });
    /* ------------------  Background INSERT ------------------ */
    var $bgSection = $(".bg-section"),
        $bgPattern = $(".bg-pattern"),
        $colBg = $(".col-bg");
    $bgSection.each(function () {
        var bgSrc = $(this)
            .children("img")
            .attr("src");
        var bgUrl = "url(" + bgSrc + ")";
        $(this)
            .parent()
            .css("backgroundImage", bgUrl);
        $(this)
            .parent()
            .addClass("bg-section");
        $(this).remove();
    });
    $bgPattern.each(function () {
        var bgSrc = $(this)
            .children("img")
            .attr("src");
        var bgUrl = "url(" + bgSrc + ")";
        $(this)
            .parent()
            .css("backgroundImage", bgUrl);
        $(this)
            .parent()
            .addClass("bg-pattern");
        $(this).remove();
    });
    $colBg.each(function () {
        var bgSrc = $(this)
            .children("img")
            .attr("src");
        var bgUrl = "url(" + bgSrc + ")";
        $(this)
            .parent()
            .css("backgroundImage", bgUrl);
        $(this)
            .parent()
            .addClass("col-bg");
        $(this).remove();
    });
    /* ------------------  NAV MODULE  ------------------ */
    var $moduleIcon = $(".module-icon"),
        $moduleCancel = $(".module-cancel");
    $moduleIcon.on("click", function (e) {
        $(this)
            .parent()
            .siblings()
            .removeClass("module-active"); 
        $(this)
            .parent(".module")
            .toggleClass("module-active"); //Add the class .active to parent .module for this element.
        e.stopPropagation();
    });
    $moduleCancel.on("click", function (e) {
        $(".module").removeClass("module-active");
        e.stopPropagation();
        e.preventDefault();
    });
    $(".side-nav-icon").on("click", function () {
        if (
            $(this)
                .parent()
                .hasClass("module-active")
        ) {
            $(".wrapper").addClass("hamburger-active");
            $(this).addClass("module-hamburger-close");
        } else {
            $(".wrapper").removeClass("hamburger-active");
            $(this).removeClass("module-hamburger-close");
        }
    });
    $(document).on("click", function (e) {
        if (
            $(e.target).is(
                ".hamburger-panel,.hamburger-panel .list-links,.hamburger-panel .list-links a,.hamburger-panel .social-share,.hamburger-panel .social-share a i,.hamburger-panel .social-share a,.hamburger-panel .copywright"
            ) === false
        ) {
            $(".wrapper").removeClass("page-transform"); 
            $(".module-side-nav").removeClass("module-active");
            e.stopPropagation();
        }
    });
    $(document).on("click", function (e) {
        if (
            !$(e.target).closest(".module").length &&
            !$(e.target).closest(".module-content").length
        ) {
            $module.removeClass("module-active"); 
            e.stopPropagation();
        }
    });
    /* ------------------  MOBILE MENU ------------------ */
    var $dropToggle = $("ul.dropdown-menu [data-toggle=dropdown]"),
        $module = $(".module");
    $dropToggle.on("click", function (event) {
        event.preventDefault();
        event.stopPropagation();
        $(this)
            .parent()
            .siblings()
            .removeClass("show");
        $(this)
            .parent()
            .toggleClass("show");
    });
    $module.on("click", function () {
        $(this).toggleClass("toggle-module");
    });
    $module
        .find("input.form-control", ".btn", ".module-cancel")
        .click(function (e) {
            e.stopPropagation();
        });
    /* ------------------  COUNTER UP ------------------ */
    $(".counting").counterUp({
        delay: 10,
        time: 1000
    });
    /* ------------------ COUNTDOWN DATE ------------------ */
    $(".countdown").each(function () {
        var $countDown = $(this),
            countDate = $countDown.data("count-date"),
            newDate = new Date(countDate);
        $countDown.countdown({
            until: newDate,
            format: "dHMS"
        });
    });
    /* ------------------  AJAX MAILCHIMP ------------------ */
    $(".mailchimp").ajaxChimp({
        url:
            "http://wplly.us5.list-manage.com/subscribe/post?u=91b69df995c1c90e1de2f6497&id=aa0f2ab5fa", //Replace with your own mailchimp Campaigns URL.
        callback: chimpCallback
    });
    function chimpCallback(resp) {
        if (resp.result === "success") {
            $(".subscribe-alert")
                .html('<h5 class="alert alert-success">' + resp.msg + "</h5>")
                .fadeIn(1000);
            //$('.subscribe-alert').delay(6000).fadeOut();
        } else if (resp.result === "error") {
            $(".subscribe-alert")
                .html('<h5 class="alert alert-danger">' + resp.msg + "</h5>")
                .fadeIn(1000);
        }
    }
    /* ------------------  AJAX CAMPAIGN MONITOR  ------------------ */
    $("#campaignmonitor").submit(function (e) {
        e.preventDefault();
        $.getJSON(this.action + "?callback=?", $(this).serialize(), function (
            data
        ) {
            if (data.Status === 400) {
                alert("Error: " + data.Message);
            } else {
                alert("Success: " + data.Message);
            }
        });
    });
    /* ------------------  AJAX CONTACT FORM  ------------------ */
    /* ------------------ OWL CAROUSEL ------------------ */
    var $productsSlider = $(".products-slider");
    $(".carousel").each(function () {
        var $Carousel = $(this);
        $Carousel.owlCarousel({
            loop: $Carousel.data("loop"),
            autoplay: $Carousel.data("autoplay"),
            margin: $Carousel.data("space"),
            nav: $Carousel.data("nav"),
            dots: $Carousel.data("dots"),
            center: $Carousel.data("center"),
            dotsSpeed: $Carousel.data("speed"),
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: $Carousel.data("slide-rs")
                },
                1000: {
                    items: $Carousel.data("slide")
                }
            }
        });
    });
    $productsSlider.owlCarousel({
        thumbs: true,
        thumbsPrerendered: true,
        loop: true,
        margin: 0,
        autoplay: false,
        nav: false,
        dots: false,
        dotsSpeed: 200,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    /* ------------------ MAGNIFIC POPUP ------------------ */
    var $imgPopup = $(".img-popup");
    $imgPopup.magnificPopup({
        type: "image"
    });
    $(".img-gallery-item").magnificPopup({
        type: "image",
        gallery: {
            enabled: true
        }
    });
    /* ------------------  MAGNIFIC POPUP VIDEO ------------------ */
    $(".popup-video,.popup-gmaps").magnificPopup({
        disableOn: 700,
        mainClass: "mfp-fade",
        removalDelay: 0,
        preloader: false,
        fixedContentPos: false,
        type: "iframe",
        iframe: {
            markup:
                '<div class="mfp-iframe-scaler">' +
                '<div class="mfp-close"></div>' +
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                "</div>",
            patterns: {
                youtube: {
                    index: "youtube.com/",
                    id: "v=",
                    src: "//www.youtube.com/embed/%id%?autoplay=1"
                }
            },
            srcAction: "iframe_src"
        }
    });
    /* ------------------  SWITCH GRID ------------------ */
    var $switchList = $("#switch-list"),
        $switchGrid = $("#switch-grid"),
        $productItem = $(".product-item");
    $switchList.on("click", function (event) {
        event.preventDefault();
        $(this).addClass("active");
        $(this)
            .siblings()
            .removeClass("active");
        $productItem.each(function () {
            $(this).addClass("product-list");
            $(this).removeClass("product-grid");
        });
    });
    $switchGrid.on("click", function (event) {
        event.preventDefault();
        $(this).addClass("active");
        $(this)
            .siblings()
            .removeClass("active");
        $productItem.each(function () {
            $(this).removeClass("product-list");
            $(this).addClass("product-grid");
        });
    });
    /* ------------------  BACK TO TOP ------------------ */
    var backTop = $("#back-to-top");
    if (backTop.length) {
        var scrollTrigger = 200, 
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    backTop.addClass("show");
                } else {
                    backTop.removeClass("show");
                }
            };
        backToTop();
        $(window).on("scroll", function () {
            backToTop();
        });
        backTop.on("click", function (e) {
            e.preventDefault();
            $("html,body").animate(
                {
                    scrollTop: 0
                },
                700
            );
        });
    }
    /* ------------------ BLOG FLITER ------------------ */
    var $blogFilter = $(".blog-filter"),
        blogLength = $blogFilter.length,
        blogFinder = $blogFilter.find("a"),
        $blogAll = $("#enrty-all");
    blogFinder.on("click", function (e) {
        e.preventDefault();
        $blogFilter.find("a.active-filter").removeClass("active-filter");
        $(this).addClass("active-filter");
    });
    if (blogLength > 0) {
        $blogAll.imagesLoaded().progress(function () {
            $blogAll.isotope({
                filter: "*",
                animationOptions: {
                    duration: 750,
                    itemSelector: ".blog-entry",
                    easing: "linear",
                    queue: false
                }
            });
        });
    }
    blogFinder.on("click", function (e) {
        e.preventDefault();
        var $selector = $(this).attr("data-filter");
        $blogAll.imagesLoaded().progress(function () {
            $blogAll.isotope({
                filter: $selector,
                animationOptions: {
                    duration: 750,
                    itemSelector: ".blog-entry",
                    easing: "linear",
                    queue: false
                }
            });
            return false;
        });
    });
    /* ------------------  SCROLL TO ------------------ */
    var aScroll = $('a[data-scroll="scrollTo"]');
    aScroll.on("click", function (event) {
        var target = $($(this).attr("href"));
        if (target.length) {
            event.preventDefault();
            $("html, body").animate(
                {
                    scrollTop: target.offset().top
                },
                1000
            );
            if ($(this).hasClass("menu-item")) {
                $(this)
                    .parent()
                    .addClass("active");
                $(this)
                    .parent()
                    .siblings()
                    .removeClass("active");
            }
        }
    });
    /* ------------------ SLIDER RANGE ------------------ */
    /* ------------------ GOOGLE MAP ------------------ */
    $(".googleMap").each(function () {
        var $gmap = $(this);
        $gmap.gMap({
            address: $gmap.data("map-address"),
            zoom: $gmap.data("map-zoom"),
            maptype: $gmap.data("map-type"),
            markers: [
                {
                    address: $gmap.data("map-address"),
                    maptype: $gmap.data("map-type"),
                    html: $gmap.data("map-info"),
                    icon: {
                        image: $gmap.data("map-maker-icon"),
                        iconsize: [76, 61],
                        iconanchor: [76, 61]
                    }
                }
            ]
        });
    });
    /* ------------------ WIDGET CATEGORY TOGGLE MENU  ------------------ */
    var $widgetCategoriesLink = $(".widget-categories2 .main--list > li > a");
    $widgetCategoriesLink.on("click", function (e) {
        $(this)
            .parent()
            .siblings()
            .removeClass("active");
        $(this)
            .parent()
            .toggleClass("active");
        e.stopPropagation();
        e.preventDefault();
    });
    /* ------------------  ToolTIP ------------------ */
    $('[data-toggle="tooltip"]').tooltip();
    /* ------------------ ANIMATION ------------------ */
    new WOW().init();
    /* ------------------  PARALLAX EFFECT ------------------ */
    siteFooter();
    $(window).resize(function () {
        siteFooter();
    });
    function siteFooter() {
        var siteContent = $("#wrapperParallax");
        var contentParallax = $(".contentParallax");
        var siteFooter = $("#footerParallax");
        var siteFooterHeight = siteFooter.height();
        siteContent.css({
            "margin-bottom": siteFooterHeight
        });
    }
    /* ------------------ EQUAL IMAGE AND CONTENT CATEGORY ------------------ */
    var $categoryImg = $(".category-5 .category--img"),
        $categoryContent = $(".category-5 .category--content"),
        $categoryContentHeight = $categoryContent.outerHeight();
    $categoryImg.css("height", $categoryContentHeight);
    /* ------------------ PRODUCT QANTITY ------------------ */
    var $productQuantity = $(".product-quantity");
    $productQuantity.on("click", ".plus", function (e) {
        var $input = $(this).prev("input.qty");
        var val = parseInt($input.val());
        var step = $input.attr("step");
        step = "undefined" !== typeof step ? parseInt(step) : 1;
        $input.val(val + step).change();
    });
    $productQuantity.on("click", ".minus", function (e) {
        var $input = $(this).next("input.qty");
        var val = parseInt($input.val());
        var step = $input.attr("step");
        step = "undefined" !== typeof step ? parseInt(step) : 1;
        if (val > 0) {
            $input.val(val - step).change();
        }
    });
})(jQuery);