<?php
session_start();
include("db_connection.php");
include("header.php");
include("nav.php");
?>
<link rel="stylesheet" href="assets/service/css/animate.css">
<link rel="stylesheet" href="assets/service/css/swiper.min.css">
<link rel="stylesheet" href="assets/service/css/magnific-popup.css">
<link rel="stylesheet" href="assets/service/css/font.css">
<link rel="stylesheet" href="assets/service/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/service/css/nice-select.css">
<link rel="stylesheet" href="assets/service/css/comman.css">
<link rel="stylesheet" href="assets/service/css/style.css">
<?php
$sql = "SELECT * FROM sliders ORDER BY slider_order ASC";
$result = $conn->query($sql);
$sliders = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sliders[] = $row;
    }
}
?>
<?php if (!empty($sliders)) : ?>
<div class="slider slider-15">
    <div id="rev_slider_15_1_wrapper" class="text-center rev_slider_wrapper fullscreen-container" data-alias="hebes-home-15" data-source="gallery" style="background:transparent;padding:0px;">
        <div id="rev_slider_15_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.7">
            <ul>
                <?php foreach ($sliders as $slider) : ?>
                    <li data-index="rs-<?= $slider['slider_id'] ?>" data-transition="parallaxvertical" data-thumb="<?= $slider['slider_bg_image'] ?>" data-dark-thumb="<?= $slider['slider_bg_image_dark'] ?>">
                        <img src="<?= $slider['slider_bg_image'] ?>" alt="" data-dark-src="<?= $slider['slider_bg_image_dark'] ?>" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                        <div class="tp-caption tp-resizeme" id="slide-<?= $slider['slider_id'] ?>-layer-1" data-x="<?= explode('-', $slider['slider_text_position'])[0] ?>" data-hoffset="['0','0','0','0']" data-y="<?= explode('-', $slider['slider_text_position'])[1] ?>" data-voffset="['300','300','300','300']" data-fontsize="['72','60','50','30']" data-lineheight="['72','60','50','30']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":2000,"speed":2000,"frame":"0","from":"<?= $slider['slider_text_transition'] ?>","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 60px; line-height: 60px; font-weight: 700; color: #ffffff; letter-spacing: 0px;font-family:Montserrat;">
                            <?= $slider['slider_text'] ?>
                        </div>
                        <?php if ($slider['slider_button_text'] && $slider['slider_button_link']) : ?>
                            <div class="tp-caption rev-btn" id="slide-<?= $slider['slider_id'] ?>-layer-2" data-x="<?= explode('-', $slider['slider_button_position'])[0] ?>" data-hoffset="['0','0','0','0']" data-y="<?= explode('-', $slider['slider_button_position'])[1] ?>" data-voffset="['500','500','450','450']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-responsive_offset="on" data-frames='[{"delay":2300,"speed":1500,"frame":"0","from":"<?= $slider['slider_button_transition'] ?>","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgba(255,255,255,0);bs:solid;bw:0 0 0 0;"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 11px; line-height: 12px; font-weight: 500; color: rgba(255,255,255,1); font-family:Montserrat;background-color:rgba(0,0,0,0);outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                <a href="<?= $slider['slider_button_link'] ?>" class="btn btn--vertical"><?= $slider['slider_button_text'] ?></a>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<script>
    var revapi15,
        tpj;
    (function() {
        if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad)
        else
            onLoad();
        function onLoad() {
            if (tpj === undefined) {
                tpj = jQuery;
                if ("off" == "on") tpj.noConflict();
            }
            if (tpj("#rev_slider_15_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_15_1");
            } else {
                revapi15 = tpj("#rev_slider_15_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "assets/revolution/js/",
                    sliderLayout: "fullscreen",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        arrows: {
                            style: "metis",
                            enable: true,
                            hide_onmobile: false,
                            hide_onleave: false,
                            tmp: '',
                            left: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 20,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 20,
                                v_offset: 50
                            }
                        },
                        bullets: {
                            enable: true,
                            hide_onmobile: false,
                            style: "metis",
                            hide_onleave: false,
                            direction: "horizontal",
                            container: "layergrid",
                            h_align: "right",
                            v_align: "bottom",
                            h_offset: 30,
                            v_offset: 15,
                            space: 5,
                            tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
                        }
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [700, 768, 960, 720],
                    lazyType: "none",
                    parallax: {
                        type: "mouse",
                        origo: "enterpoint",
                        speed: 400,
                        speedbg: 0,
                        speedls: 0,
                        levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 3, 2, 55],
                    },
                    shadow: 0,
                    spinner: "spinner0",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenAutoWidth: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
                var api = revapi15;
                /* no need to edit below */
                var divider = ' / ',
                    totalSlides,
                    numberText;
                api.one('revolution.slide.onloaded', function() {
                    totalSlides = api.revmaxslide();
                    numberText = api.find('.slide-status-numbers').text('1' + divider + totalSlides);
                    api.on('revolution.slide.onbeforeswap', function(e, data) {
                        numberText.text((data.nextslide.index() + 1) + divider + totalSlides);
                    });
                });
            }; /* END OF revapi call */
        }; /* END OF ON LOAD FUNCTION */
    }()); /* END OF WRAPPING FUNCTION */
</script>
<?php endif; // End sliders check ?>
<!-- about #1
============================================= -->
<section id="about1" class="about about-1 pt-140 pt-60-xs pb-120 pb-60-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="heading heading-2">
                    <p class="heading--subtitle">HISTORY SINCE 2015</p>
                    <h2 class="heading--title">Welcome to <span>SPARK</span> Your Fitness Destination</h2>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="about--text">
                    <p>Since 2015, we’ve been dedicated to helping you achieve your fitness goals. Our gym offers top-notch equipment and expert trainers to guide your journey.</p>
                    <p>Discover our range of quality sportswear, training gear, and supplements designed to elevate your performance. Join our community and transform your <span>body and mind</span> with us.</p>
                </div>
                <div class="about--signature">Get in Shape<span>Join Now !</span></div>
            </div>
        </div>
    </div>
</section>
<!-- feature #1
============================================= -->
<section id="feature1" class="feature feature-1 pt-4 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-panel">
                    <div class="feature--icon">
                        <i class="icon-bolt"></i>
                    </div>
                    <div class="feature--content">
                        <h3>Creative &amp; Unique</h3>
                        <p>GREAT FROM SPARK</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-panel">
                    <div class="feature--icon">
                        <i class="icon-location"></i>
                    </div>
                    <div class="feature--content">
                        <h3>Free Shipping</h3>
                        <p>ALL ORDER OVER 100 TND</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-panel">
                    <div class="feature--icon">
                        <i class="icon-phone"></i>
                    </div>
                    <div class="feature--content">
                        <h3>Support Customer</h3>
                        <p>SUPPORT 24/7</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="feature-panel">
                    <div class="feature--icon">
                        <i class="icon-link icon-md"></i>
                    </div>
                    <div class="feature--content">
                        <h3>Secure Payment</h3>
                        <p>100% SECURE PAYMENT</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- products carousel #2
============================================= -->
<?php
$query = "SELECT * FROM productcategories WHERE pcategory_status = 1";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
?>
    <section id="products-carousel2" class="products-carousel products-carousel-2 px-4 mx-4 mr-4 ml-4">
        <div class="container-fluid mr-0 pr-0 pl-0">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="carousel black owl-carousel pt-0 pb-0" data-slide="4" data-slide-rs="2" data-autoplay="true" data-nav="true" data-dots="false" data-space="0" data-loop="true" data-speed="800">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="product-item">
                                <div class="product--img">
                                    <img src="<?php echo strpos($row['pcategory_photo'], 'http') === 0 ? $row['pcategory_photo'] : 'admin/' . $row['pcategory_photo']; ?>" alt="<?php echo $row['pcategory_name']; ?>" style="width: 430px !important; height: 880px !important; object-fit: cover;">
                                </div>
                                <div class="product--title">
                                    <h3><a href="shop.php?category=<?php echo $row['pcategory_id']; ?>"><?php echo $row['pcategory_name']; ?></a></h3>
                                </div>
                                <div class="product--hover">
                                    <div class="product--action">
                                        <div class="product--action-content">
                                            <h3><a href="shop.php?category=<?php echo $row['pcategory_id']; ?>"><?php echo $row['pcategory_name']; ?></a></h3>
                                            <a href="shop.php?category=<?php echo $row['pcategory_id']; ?>" class="btn btn--underlined">SHOP NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
} else {
    echo "No product categories found.";
}
?>
<!-- products #1
============================================= -->
<section id="products2" class="products pb-60 text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="heading heading-2 mb-30">
                    <h2 class="heading--title">New Arrivals</h2>
                </div>
            </div>
        </div>
        <?php
        include("db_connection.php");
        $sql = "SELECT * FROM productcategories where pcategory_status='1'";
        $result = mysqli_query($conn, $sql);
        $productCategories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="products-tabs products-filter products-filter-2">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <?php foreach ($productCategories as $index => $category) : ?>
                            <li>
                                <a href="#<?= strtolower(str_replace(' ', '_', $category['pcategory_name'])); ?>" aria-controls="<?= strtolower(str_replace(' ', '_', $category['pcategory_name'])); ?>" role="tab" data-toggle="tab" <?php if ($index === 0) : ?> class="active" <?php endif; ?>>
                                    <?= strtoupper($category['pcategory_name']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content">
    <?php foreach ($productCategories as $category) : ?>
        <div role="tabpanel" class="tab-pane fade <?= $category['pcategory_id'] === $productCategories[0]['pcategory_id'] ? 'show active' : ''; ?>" id="<?= strtolower(str_replace(' ', '_', $category['pcategory_name'])); ?>">
            <div class="row">
                <?php
                $sql = "SELECT * FROM products WHERE pcategory_id = {$category['pcategory_id']} AND product_status='1' ORDER BY product_id DESC LIMIT 10"; 
                $result = mysqli_query($conn, $sql);
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $uniqueProductNames = array();
                $displayedCount = 0;
                foreach ($products as $product) :
                    if (!in_array($product['product_name'], $uniqueProductNames) && $displayedCount < 4) :
                        $uniqueProductNames[] = $product['product_name'];
                        $displayedCount++;
                ?>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="product-item style2">
                                <div class="product--img">
                                    <img src="<?= strpos($product['product_photo'], 'http') === 0 ? $product['product_photo'] : 'admin/' . $product['product_photo']; ?>" alt="<?= $product['product_name']; ?>" style="width: 100% !important; height: 276px !important; object-fit: cover;">
                                    <?php if (isset($product['product_tag']) && !empty($product['product_tag'])) : ?>
                                        <?php if ($product['product_tag'] === 'Sale' && isset($product['sale_start_date']) && isset($product['sale_end_date'])) : ?>
                                            <?php
                                            $currentDate = date("Y-m-d");
                                            if ($currentDate >= $product['sale_start_date'] && $currentDate <= $product['sale_end_date']) {
                                            ?>
                                                <span class="featured-item featured-item2"><?= $product['product_tag']; ?></span>
                                            <?php } else { ?>
                                            <?php } ?>
                                        <?php else : ?>
                                            <span class="featured-item featured-item2"><?= $product['product_tag']; ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="product--content">
                                    <div class="product--title">
                                        <h3><a href=""><?= $product['product_name']; ?></a></h3>
                                    </div>
                                    <div class="product--price">
                                        <?php if ($product['product_tag'] === 'Sale' && $currentDate >= $product['sale_start_date'] && $currentDate <= $product['sale_end_date']) : ?>
                                            <div class="sale-wrapper">
                                                <span class="original-price"><?= $product['product_price']; ?> TND</span>
                                                <span class="sale-price"><?= $product['product_sale_price']; ?> TND</span>
                                                <span class="sale-badge">Sale</span>
                                            </div>
                                        <?php else : ?>
                                            <span><?= $product['product_price']; ?> TND</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="product--hover">
                                    <div class="product--action">
                                        <?php if ($product['product_stock_quantity'] > 0) : ?>
                                            <a href="" class="btn btn--primary btn--rounded" data-product-id="<?= $product['product_id']; ?>" data-toggle="modal" data-target="#product-popup">
                                                <i class="icon-bag"></i> ADD TO CART
                                            </a>
                                        <?php else : ?>
                                            <span class="btn btn--primary btn--rounded" style="cursor: not-allowed; opacity: 0.7;" disabled><i class="icon-bag"></i> OUT OF STOCK</span>
                                        <?php endif; ?>
                                        <div class="product--action-content">
                                            <div class="product--action-icons">
                                                <a data-toggle="modal" data-target="#product-popup" data-product-id="<?= $product['product_id']; ?>"><i class="ti-search"></i></a>
                                                <a class="add-to-wishlist" data-product-id="<?= $product['product_id']; ?>"><i class="ti-heart"></i></a>
                                                <a data-toggle="modal" data-target="#compare-popup" class="compare" data-product-id="<?= $product['product_id']; ?>"><i class="ti-control-shuffle"></i></a>
                                            </div>
                                            <div class="product--hover-info">
                                                <div class="product--title">
                                                    <h3><a href="http://localhost/msport/product.php?id=<?= $product['product_id']; ?>" target="_blank"><?= $product['product_name']; ?></a></h3>
                                                </div>
                                                <div class="product--price">
                                                    <?php if ($product['product_tag'] === 'Sale' && $currentDate >= $product['sale_start_date'] && $currentDate <= $product['sale_end_date']) : ?>
                                                        <span class="original-price" style="text-decoration: line-through;"><?php echo $product['product_price']; ?> TND</span>
                                                        <span class="sale-price"><?php echo $product['product_sale_price']; ?> TND</span>
                                                    <?php else : ?>
                                                        <span><?php echo $product['product_price']; ?> TND</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="category--colors">
                                                <?php
                                                foreach ($products as $same_name_product) {
                                                    if ($same_name_product['product_name'] === $product['product_name']) {
                                                        $keywords = explode(",", $same_name_product['product_keywords']);
                                                        $color_keywords = array("red", "blue", "green", "yellow", "black", "white");
                                                        $product_colors = [];
                                                        foreach ($keywords as $keyword) {
                                                            foreach ($color_keywords as $color) {
                                                                if (stripos($keyword, $color) !== false) {
                                                                    $product_colors[] = strtolower($color);
                                                                }
                                                            }
                                                        }
                                                        foreach ($product_colors as $color) {
                                                            echo '<div class="color-box circular" style="background-color: ' . $color . ';" data-product-id="' . $same_name_product['product_id'] . '" data-toggle="modal" data-target="#product-popup"></div>';
                                                            echo '<div class="product-photo-popup" style="display: none;"></div>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    endif; 
                endforeach; 
                ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- call to action #1
============================================= -->
<?php
$sql = "SELECT * FROM cta_sections LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bg_image = $row['bg_image'];
        $small_text = $row['small_text'];
        $main_text = $row['main_text'];
        $button_text = $row['button_text'];
        $button_link = $row['button_link'];
    }
} else {
    echo "0 results";
}
?>
<section id="cta1" class="cta cta-1 text-center bg-parallax">
    <div class="bg-section">
        <img src="<?php echo $bg_image; ?>" alt="background">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                <p class="color-red"><?php echo $small_text; ?></p>
                <h3><?php echo $main_text; ?></h3>
                <a href="<?php echo $button_link; ?>" class="btn btn--secondary btn--rounded"><?php echo $button_text; ?></a>
            </div>
        </div>
    </div>
</section>
<section class="gym_ourtopservices">
    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-8 col-12 offset-lg-3 offset-md-3 offset-sm-2 text-center">
            <div class="gym_heading">
                <h2>Our Top Services</h2>
                <img src="assets/images/icons/1.png" alt="">
                <p>Tailored workout plans designed to meet your unique fitness goals, guided by our expert trainers.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="gym_servicesslider">
                <div class="swiper-container gym_topservices_slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="gym_slider_inner text-center">
                                <div class="gym_serviceinner_img">
                                    <img class="gym_topservice_icon1" src="assets/service/images/topservices_icon1.png" alt="" />
                                    <img class="gym_topservice_icon2" src="assets/service/images/topservices_icon_white.png" alt="" />
                                </div>
                                <h4>Professional Trainer</h4>
                                <p>Our trainers are certified professionals with extensive knowledge and experience in fitness and wellness.</p>
                                <a href="http://localhost/msport/service.php" class="gym_btn btn_1">Know More</a>
                                <span>01</span>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gym_slider_inner text-center">
                                <div class="gym_serviceinner_img">
                                    <img class="gym_topservice_icon1" src="assets/service/images/topservices_icon2.png" alt="" />
                                    <img class="gym_topservice_icon2" src="assets/service/images/topservices_icon_white2.png" alt="" />
                                </div>
                                <h4>Maintain Timetable</h4>
                                <p>Discover convenience with our straightforward timetable, making it effortless to schedule your workouts.</p>
                                <a href="http://localhost/msport/service.php" class="gym_btn btn_1">Know More</a>
                                <span>02</span>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gym_slider_inner text-center">
                                <div class="gym_serviceinner_img">
                                    <img class="gym_topservice_icon1" src="assets/service/images/topservices_icon3.png" alt="" />
                                    <img class="gym_topservice_icon2" src="assets/service/images/topservices_icon_white3.png" alt="" />
                                </div>
                                <h4>Healthy Diet Plan</h4>
                                <p>Unlock your wellness journey with our balanced diet plans, tailored to fuel your body and enhance your fitness.</p>
                                <a href="http://localhost/msport/service.php" class="gym_btn btn_1">Know More</a>
                                <span>03</span>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gym_slider_inner text-center">
                                <div class="gym_serviceinner_img">
                                    <img class="gym_topservice_icon1" src="assets/service/images/topservices_icon1.png" alt="" />
                                    <img class="gym_topservice_icon2" src="assets/service/images/topservices_icon_white.png" alt="" />
                                </div>
                                <h4>Professional Trainer</h4>
                                <p>Our trainers are certified professionals with extensive knowledge and experience in fitness and wellness.</p>
                                <a href="http://localhost/msport/service.php" class="gym_btn btn_1">Know More</a>
                                <span>01</span>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gym_slider_inner text-center">
                                <div class="gym_serviceinner_img">
                                    <img class="gym_topservice_icon1" src="assets/service/images/topservices_icon2.png" alt="" />
                                    <img class="gym_topservice_icon2" src="assets/service/images/topservices_icon_white2.png" alt="" />
                                </div>
                                <h4>Maintain Timetable</h4>
                                <p>Discover convenience with our straightforward timetable, making it effortless to schedule your workouts.</p>
                                <a href="http://localhost/msport/service.php" class="gym_btn btn_1">Know More</a>
                                <span>02</span>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gym_slider_inner text-center">
                                <div class="gym_serviceinner_img">
                                    <img class="gym_topservice_icon1" src="assets/service/images/topservices_icon3.png" alt="" />
                                    <img class="gym_topservice_icon2" src="assets/service/images/topservices_icon_white3.png" alt="" />
                                </div>
                                <h4>Healthy Diet Plan</h4>
                                <p>Unlock your wellness journey with our balanced diet plans, tailored to fuel your body and enhance your fitness.</p>
                                <a href="http://localhost/msport/service.php" class="gym_btn btn_1">Know More</a>
                                <span>03</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog grid  
============================================= -->
<section id="blog-grid" class="blog-grid pt-150 pb-150 pt-60-xs pb-60-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="heading text-center mb-60">
                    <h2 class="heading--title">Blog & News</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM blog WHERE status = 1 ORDER BY date_posted DESC LIMIT 3";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="blog-entry">
                            <div class="entry--img">
                                <a href="http://localhost/msport/blog.php?blog_id=<?php echo $row['blog_id']; ?>">
                                    <img src="<?php echo strpos($row['photo_blog'], 'http') === 0 ? $row['photo_blog'] : 'admin/' . $row['photo_blog']; ?>" alt="entry image" style="width: 370px !important; height: 230px !important; object-fit: cover; display: block; margin: 0 auto;" />
                                </a>
                            </div>
                            <div class="entry--content">
                                <div class="entry--meta">
                                    <span class="meta--time"><?php echo date("F j, Y", strtotime($row['date_posted'])); ?></span>
                                </div>
                                <div class="entry--title">
                                    <h4><a href="http://localhost/msport/blog.php?blog_id=<?php echo $row['blog_id']; ?>"><?php echo $row['name_blog']; ?></a></h4>
                                </div>
                                <div class="entry--footer">
                                    <div class="entry--more">
                                        <a href="http://localhost/msport/blog.php?blog_id=<?php echo $row['blog_id']; ?>">read more<i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No blog posts found.";
            }
            ?>
        </div>
    </div>
</section>
<!-- day deals
============================================= -->
<?php
$sql = "SELECT * FROM products WHERE sale_start_date <= CURDATE() AND sale_end_date >= CURDATE() AND product_status='1'ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product_name = $row['product_name'];
        $product_id = $row['product_id'];
        $product_price = $row['product_price'];
        $product_sale_price = $row['product_sale_price'];
        $product_description = $row['product_description'];
        $product_photo_1 = $row['product_photo'];
        $product_photo_2 = $row['product_photo_1'];
        $sale_end_date = $row['sale_end_date']; 
    }
} else {
    echo "No deal available.";
}
?>
<style>
    /* CSS for countdown */
    .countdown-style {
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        background-color: #333;
        padding: 10px 20px;
        border-radius: 5px;
        display: inline-block;
    }
</style>
<section id="day-deals" class="day-deals bg-lightBlue pt-0 pb-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-5 pr-0">
                <div class="heading heading-2">
                    <p class="heading--subtitle">SPARK STORE</p>
                    <h2 class="heading--title">Deal of the Week</h2>
                </div>
                <div class="deal--desc"><a href="http://localhost/msport/product.php?id=<?php echo $product_id ?>" target="_blank"><?php echo $product_name ?></a></div>
                <div class="deal--price"><del><?php echo $product_price; ?>-</del><?php echo $product_sale_price; ?> TND</div>
                <div class="countdown mb-60 is-countdown" id="countdown" data-count-date="<?php echo date('Y, m, d', strtotime($sale_end_date)); ?>">
                    <span class="countdown-row countdown-show3">
                        <span class="countdown-section"><span class="countdown-amount">0</span><span class="countdown-period">Hours</span></span>
                        <span class="countdown-section"><span class="countdown-amount">0</span><span class="countdown-period">Minutes</span></span>
                        <span class="countdown-section"><span class="countdown-amount">0</span><span class="countdown-period">Seconds</span></span>
                    </span>
                </div>
                <a href="javascript:void(0);" class="btn btn--primary btn--rounded add-to-cart-index" data-product-id="<?php echo $product_id ?>"><i class="icon-bag"></i> ADD TO CART</a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-7">
                <div class="carousel owl-carousel carousel-dots" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="true" data-space="0" data-loop="true" data-speed="800">
                    <div class="deal--img">
                        <img src="<?= strpos($product_photo_1, 'http') === 0 ? $product_photo_1 : 'admin/' . $product_photo_1; ?>" alt="<?= htmlspecialchars($product_name_1); ?>" style="width: 100% !important;  object-fit: cover;">
                    </div>
                    <div class="deal--img">
                        <img src="<?= strpos($product_photo_2, 'http') === 0 ? $product_photo_2 : 'admin/' . $product_photo_2; ?>" alt="<?= htmlspecialchars($product_name_2); ?>" style="width: 100% !important; object-fit: cover;">
                    </div>
                </div>
                <div class="vertical--text">Deal</div>
            </div>
        </div>
    </div>
</section>
<script>
    var countdownInterval = setInterval(function() {
        var countdownElement = document.getElementById('countdown');
        var countDate = countdownElement.getAttribute('data-count-date');
        var targetDate = new Date(countDate);
        var now = new Date().getTime();
        var timeRemaining = targetDate - now;
        var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
        var countdownHTML = '<span class="countdown-row countdown-show3">';
        countdownHTML += '<span class="countdown-section"><span class="countdown-amount">' + days + '</span><span class="countdown-period">Days</span></span>';
        countdownHTML += '<span class="countdown-section"><span class="countdown-amount">' + hours + '</span><span class="countdown-period">Hours</span></span>';
        countdownHTML += '<span class="countdown-section"><span class="countdown-amount">' + minutes + '</span><span class="countdown-period">Minutes</span></span>';
        countdownHTML += '<span class="countdown-section"><span class="countdown-amount">' + seconds + '</span><span class="countdown-period">Seconds</span></span>';
        countdownHTML += '</span>';
        countdownElement.innerHTML = countdownHTML;
        if (timeRemaining <= 0) {
            clearInterval(countdownInterval);
            countdownElement.innerHTML = "Sale has ended";
        }
    }, 1000); 
</script>
<!-- Testimonial #7
============================================= -->
<section id="testimonial7" class="testimonial testimonial-7 text-center pb-140 pb-60-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="heading mb-90">
                    <h2 class="heading--title">Happy Clients Say</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="carousel owl-carousel " data-slide="3" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="false" data-space="30" data-loop="true" data-speed="800">
                    <div class="testimonial-panel">
                        <div class="testimonial--meta-img">
                            <img src="assets/images/testimonials/authors/6.jpg" alt="athlete">
                        </div>
                        <div class="testimonial--meta">
                            <h4>Anime bennour</h4>
                            <span>Professional Athlete</span>
                        </div>
                        <div class="testimonial--body">
                            <p>"As a professional athlete, I rely on top-notch equipment and nutritional supplements. This gym provides everything I need to stay at the top of my game."</p>
                        </div>
                    </div>
                    <div class="testimonial-panel">
                        <div class="testimonial--meta-img">
                            <img src="assets/images/testimonials/authors/5.jpg" alt="client">
                        </div>
                        <div class="testimonial--meta">
                            <h4>Ameni trabelsi</h4>
                            <span>Satisfied Client</span>
                        </div>
                        <div class="testimonial--body">
                            <p>"Joining this gym was one of the best decisions I've made for my fitness journey. The trainers are incredibly supportive, and the variety of classes keeps me motivated and engaged."</p>
                        </div>
                    </div>
                    <div class="testimonial-panel">
                        <div class="testimonial--meta-img">
                            <img src="assets/images/testimonials/authors/7.jpg" alt="coach">
                        </div>
                        <div class="testimonial--meta">
                            <h4>malek guarmechi</h4>
                            <span>Fitness Coach</span>
                        </div>
                        <div class="testimonial--body">
                            <p>"I've been coaching at this gym for years, and I've seen countless transformations. The dedication of both the staff and the members makes this place truly exceptional."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-img #10
============================================= -->
<section id="banner-img" class="banner-img banner-img-hover pt-0 pb-0">
    <div class="container-fluid pr-0 pl-0">
        <div class="row row-no-padding">
            <?php
            $sql = "SELECT * FROM banners";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $image_src = $row['image_src'];
                    $alt_text = $row['alt_text'];
                    $link = $row['link'];
            ?>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="banner--img">
                            <a href="<?php echo $link; ?>">
                                <img src="<?php echo $image_src; ?>" alt="<?php echo $alt_text; ?>" class="img-fluid">
                            </a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No banners found.";
            }
            ?>
        </div>
    </div>
</section>
<!-- Clients #1
============================================= -->
<?php
$query = "SELECT * FROM brands WHERE brand_status = 1";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
?>
    <section id="clients1" class="clients clients-1 text-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="carousel owl-carousel" data-slide="6" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="false" data-space="0" data-loop="true" data-speed="800">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="client">
                                <a href="http://localhost/msport/shop.php?brand=<?php echo $row['brand_id']; ?>">
                                    <img src="<?php echo strpos($row['brand_photo'], 'http') === 0 ? $row['brand_photo'] : 'admin/' . $row['brand_photo']; ?>" alt="<?php echo $row['brand_name']; ?>" style="width: 155px !important; height: 124px !important; object-fit: cover;" />
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
} else {
    echo "No brands found.";
}
?>
<!-- instagram #2
============================================= -->
<section id="instagram2" class="instagram instagram-2 pb-0">
    <div class="container-fluid pr-40 pl-40">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading mb-100 text-center">
                    <h2 class="heading--title">From Instagram</h2>
                    <div class="heading--icon"><i class="fa fa-instagram"></i><a href="#">SPARK.COM</a></div>
                    <p class="heading--desc">FITNESS, ATTRACTIVE, INTERACTIVE, SIMPLIFIED AND PERSONAL TOUCH , GYM, ATHLETE</p>
                </div>
            </div>
        </div>
        <div class="row row-no-padding">
            <?php
            $sql = "SELECT * FROM gallery";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $image_url = $row['image_url'];
            ?>
                    <div class="col">
                        <div class="instagram--img">
                            <div class="img--hover"></div>
                            <img src="<?php echo $image_url; ?>" alt="img" class="img-fluid" style="object-fit: cover;">
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<!-- Footer #2
============================================= -->
<script src="assets/service/js/jquery.min.js"></script>
<script src="assets/service/js/SmoothScroll.min.js"></script>
<script src="assets/service/js/nice-select.min.js"></script>
<script src="assets/service/js/swiper.min.js"></script>
<script src="assets/service/js/wow.min.js"></script>
<script src="assets/service/js/tilt.js"></script>
<script src="assets/service/js/jquery.magnific-popup.min.js"></script>
<script src="assets/service/js/custom.js"></script>
<?php
include("footer.php");
?>