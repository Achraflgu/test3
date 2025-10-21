<?php
session_start();
include("db_connection.php");
include("header.php");
include("nav.php");
?>
<!-- page soon 
============================================= -->
<section id="page-soon" class="page-soon bg-overlay bg-overlay-light bg-parallax mtop-100">
    <div class="bg-section">
        <img src="assets/images/background/4.jpg" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="heading heading-2">
                    <h2 class="heading--title">Comming Soon...</h2>
                    <p class="heading--desc">WE ARE GLAD TO SEE YOU, BUT PLEASE BE PATIENT THIS PAGE IS UNDER
                        CONTRUCTIONS</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-5">
                <div class="countdown mb-50" data-count-date="2019, 12, 1"></div>
                <form class="mailchimp form--newsletter">
                    <div class="form--heading">
                        <h5>Stay In Touch</h5>
                        <p>Please, write your email below to stay in touch with us</p>
                    </div>
                    <div class="input--wrapper">
                        <input type="text" class="form-control" placeholder="Enter your email" require>
                        <button type="submit"><i class="fa fa-chevron-right"></i></button>
                    </div>
                    <div class="subscribe-alert"></div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 text--center widget--social">
                <div class="social--icons mb-10">
                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="google-plus" href="#"><i class="fa fa-pinterest-p"></i></a>
                    <a class="instagram" href="#"><i class="fa fa-instagram"></i></a>
                </div>
                <div class="copyrights mb-0">
                    <p>© 2015 SPARK - All Rights Reserved, by SAVA3GE,HUNTER.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
#footerParallax {
    display: none;
}
.navbar-nav.mr-auto {
    display: none!important;
}
.module-container {
    position: relative;
    float: right;
    margin-left: 600px;
}
</style>
<?php
include("footer.php");
?>