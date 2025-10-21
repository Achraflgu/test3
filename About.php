<?php
session_start();
include("db_connection.php");
include("header.php");
include("nav.php");
?>
<section id="page-title" class="page-title mt-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="title title-1 text-center">
                    <div class="title--content">
                        <div class="title--heading">
                            <h1>About Spark</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb breadcrumb-bottom">
                        <li><a href="index-2.html">Home</a></li>
                        <li class="active">About Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
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
<!-- about gallery
============================================= -->
<section id="about-gallery" class="about about-gallery pt-0 pb-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="carousel owl-carousel" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="false" data-space="0" data-loop="true" data-speed="800">
                    <div class="gallery--item">
                        <img src="assets/images/about/gallery/1.png" alt="img">
                    </div>
                    <div class="gallery--item">
                        <img src="assets/images/about/gallery/2.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- interactive banners
============================================= -->
<section id="interactive1" class="interactive interactive-1">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="banner-panel">
                    <div class="num">01</div>
                    <div class="panel--content">
                        <h5>GYM & STORE TUNIS</h5>
                        <p>Avenue Habib Bourguiba - TUNIS</p>
                        <ul class="list-unstyled mb-0">
                            <li><a href="mailto:info@spark.tn">Email: info@spark.tn</a></li>
                            <li><a href="tel:+21634567890">Phone: (+216) 71 199 205</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="banner-panel">
                    <div class="num">02</div>
                    <div class="panel--content">
                        <h5>GYM & STORE BOUMHAL</h5>
                        <p>Rue de l'Indépendance - Bassatin</p>
                        <ul class="list-unstyled mb-0">
                            <li><a href="mailto:info@spark.tn">Email: info@spark.tn</a></li>
                            <li><a href="tel:+21634567890">Phone: (+216) 71 199 205</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="banner-panel">
                    <div class="num">03</div>
                    <div class="panel--content">
                        <h5>GYM & STORE MOUROUJ</h5>
                        <p>El Mourouj (4) - MOUROUJ</p>
                        <ul class="list-unstyled mb-0">
                            <li><a href="mailto:info@spark.tn">Email: info@spark.tn</a></li>
                            <li><a href="tel:+21671199205">Phone: (+216) 71 199 205</a></li>
                        </ul>
                    </div>
                </div>
            </div>
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
                                <a href="http://localhost/msport/blog.php?blog_id=<?php echo $row['brand_id']; ?>">
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
<?php
include("footer.php");
?>