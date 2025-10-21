<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <!-- Document Meta
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Multi-purpose Business html5 template">
    <link href="assets/images/favicon/1.png" rel="icon">
    <!-- Fonts
    ============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i%7CMontserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CPlayfair+Display:400,400i"
        rel="stylesheet">
    <!-- Stylesheets
    ============================================= -->
    <link href="assets/css/external.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="assets/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="assets/revolution/css/navigation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/css/style-dark.css" rel="stylesheet" disabled>
    <!-- Load jQuery first -->
    <script src="assets/service/js/jquery.min.js"></script>
    <!-- Load Swiper JS -->
    <script src="assets/service/js/swiper.min.js"></script>
    <!-- Revolution Slider Fallback -->
    <script>
        // Fallback function if Revolution Slider is not available
        window.revslider_showDoubleJqueryError = function(sliderID) {
            console.warn('Revolution Slider not loaded for: ' + sliderID);
            // Hide the slider and remove loader
            jQuery(sliderID).closest('.slider').hide();
        };
        
        // Hide preloader when page is loaded
        jQuery(window).on('load', function() {
            jQuery('.preloader').fadeOut(500);
        });
        
        // Fallback: Hide preloader after 3 seconds if not already hidden
        setTimeout(function() {
            if (jQuery('.preloader').is(':visible')) {
                jQuery('.preloader').fadeOut(500);
            }
        }, 3000);
    </script>
    <!-- Load Revolution Slider JS files -->
    <script src="assets/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="assets/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <!-- Document Title
    ============================================= -->
    <title>Spark</title>
</head>
<?php include("faq.php");?>
<body>