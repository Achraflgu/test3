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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    #footerParallax {
        z-index: 1;
    }
</style>
<section id="page-title" class="page-title bg-parallax">
    <div class="bg-section">
        <img src="assets/images/page-title/2.png" alt="background">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="title title-3 text-center">
                    <div class="title--content">
                        <div class="title--heading">
                            <h1>Spark Service</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb breadcrumb-bottom">
                        <li><a href="index-2.html">Home</a></li>
                        <li class="active">Service</li>
                    </ol>
                </div>
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
                                <a href="#" class="gym_btn btn_1">Know More</a>
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
                                <a href="#" class="gym_btn btn_1">Know More</a>
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
                                <a href="#" class="gym_btn btn_1">Know More</a>
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
                                <a href="#" class="gym_btn btn_1">Know More</a>
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
                                <a href="#" class="gym_btn btn_1">Know More</a>
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
                                <a href="#" class="gym_btn btn_1">Know More</a>
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
<section class="gym_swiper_section">
    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-8 col-12 offset-lg-3 offset-md-3 offset-sm-2 text-center">
            <div class="gym_heading">
                <h2>Some of Our Classes</h2>
                <img src="assets/images/icons/1.png" alt="">
                <p>Explore the diverse range of our expertly designed classes, each tailored to enhance your skills and knowledge in a supportive and engaging environment.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="gym_class_slider">
            <div class="swiper-container padd_b90">
                <div class="swiper-wrapper">
                    <?php
                    $sql = "SELECT * FROM gallery";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $image_url = $row['image_url'];
                    ?>
                            <div class="swiper-slide">
                                <div class="gym_classes_section relative text-center">
                                    <div class="gym_classes_imgWrap">
                                        <img src="<?php echo $image_url; ?>" alt="img" class="img-fluid" style="height: 287px!important; weight: 383px; object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gym_services_section pad_t0">
    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-8 col-12 offset-lg-3 offset-md-3 offset-sm-2 text-center">
            <div class="gym_heading">
                <h2>We Can Give You <br> Much More Than Others</h2>
                <img src="assets/images/icons/1.png" alt="">
                <p>Experience a level of service and quality that surpasses the ordinary. Step into our gym and discover a welcoming environment where personalized attention.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                <div class="gym_services">
                    <img src="assets/service/images/service1.svg" alt="" />
                    <a href="#">
                        <h4>cycling</h4>
                    </a>
                    <p>Pedal towards your fitness goals with our invigorating cycling classes.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                <div class="gym_services">
                    <img src="assets/service/images/service2.svg" alt="" />
                    <a href="#">
                        <h4>meditation</h4>
                    </a>
                    <p>Find serenity and inner peace with our rejuvenating meditation sessions.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                <div class="gym_services">
                    <img src="assets/service/images/service3.svg" alt="" />
                    <a href="#">
                        <h4>cardio</h4>
                    </a>
                    <p>Elevate your heart rate and boost your endurance with our dynamic cardio workouts.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                <div class="gym_services">
                    <img src="assets/service/images/service4.svg" alt="" />
                    <a href="#">
                        <h4>running</h4>
                    </a>
                    <p>Hit the ground running and embrace the exhilaration of our outdoor running sessions.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                <div class="gym_services">
                    <img src="assets/service/images/service5.svg" alt="" />
                    <a href="#">
                        <h4>yoga</h4>
                    </a>
                    <p>Unwind, stretch, and find your balance with our tranquil yoga classes.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                <div class="gym_services">
                    <img src="assets/service/images/service6.svg" alt="" />
                    <a href="#">
                        <h4>weight lifting</h4>
                    </a>
                    <p>Build strength and sculpt your physique with our empowering weight lifting sessions.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gym_calculator_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-8 col-12 offset-lg-3 offset-md-3 offset-sm-2 text-center">
                <div class="gym_heading">
                    <h2>Calculate Your BMI</h2>
                    <img src="assets/images/icons/1.png" alt="">
                    <p>Unlock insights into your health and fitness with our BMI section, providing personalized metrics to guide your wellness journey.</p>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-12 mb_30">
                <div class="gym_calculator_wrap">
                    <h4 class="gym_subTitle">Calculate Your BMI</h4>
                    <p class="gym_subDesc">Take control of your health journey with our BMI calculator, empowering you to track and optimize your fitness goals.</p>
                    <div class="gym_tabs_container">
                        <ul class="gym_tabs_nav mb_30">
                            <li><a href="#male">Male</a></li>
                            <li><a href="#female">Female</a></li>
                        </ul>
                        <div class="gym_tabs_content">
                            <div id="male" class="gym_single_tab">
                                <form id="maleForm">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="gym_form_field mb_30">
                                                <input id="maleHeight" class="gym_field_inner" type="text" placeholder="Height / Centimetre" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="gym_form_field mb_30">
                                                <input id="maleWeight" class="gym_field_inner" type="text" placeholder="Weight / Kilogram" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="gym_form_field gym_sel_fld_icon">
                                                <select id="maleAge" class="gym_field_inner mb_30">
                                                    <option>Age</option>
                                                    <option value="1">18+</option>
                                                    <option value="2">20+</option>
                                                    <option value="3">22+</option>
                                                    <option value="4">24+</option>
                                                    <option value="5">30+</option>
                                                    <option value="6">60+</option>
                                                    <option value="7">80+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-12 text-right">
                                            <div class="gym_form_field mb_30">
                                                <a href="javascript:void(0);" id="calculateMaleBMI" class="gym_btn btn_1">Calculate</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="female" class="gym_single_tab">
                                <form id="femaleForm">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="gym_form_field mb_30">
                                                <input id="femaleHeight" class="gym_field_inner" type="text" placeholder="Height / Centimetre" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="gym_form_field mb_30">
                                                <input id="femaleWeight" class="gym_field_inner" type="text" placeholder="Weight / Kilogram" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="gym_form_field">
                                                <select id="femaleAge" class="gym_field_inner mb_30">
                                                    <option>Age</option>
                                                    <option value="1">18+</option>
                                                    <option value="2">20+</option>
                                                    <option value="3">22+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-12 text-right">
                                            <div class="gym_form_field mb_30">
                                                <a href="javascript:void(0);" id="calculateFemaleBMI" class="gym_btn btn_1">Calculate</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h4 id="resultBMI" class="gym_totleIBM">Your BMI : <span class=""></span></h4>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb_30">
                <div class="gym_calculator_info">
                    <h4 class="gym_subTitle">BMI Chart</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Weight Status</th>
                                <th>BMI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Underweight</td>
                                <td>Below 18.5</td>
                            </tr>
                            <tr>
                                <td>Healthy</td>
                                <td>18.5 - 24.9</td>
                            </tr>
                            <tr>
                                <td>Overweight</td>
                                <td>25.0 - 29.9</td>
                            </tr>
                            <tr>
                                <td>Obese</td>
                                <td>30.0 - and Above</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gym_table_section">
            <div class="container">
                <div class="col-lg-6 col-md-6 col-sm-8 col-12 offset-lg-3 offset-md-3 offset-sm-2 text-center">
                    <div class="gym_heading">
                        <h2>classes timetable</h2>
                        <img src="assets/images/heading_line.svg" alt="" />
                        <p>Stay on track and maximize your workouts with our convenient and comprehensive classes timetable.</p>
                    </div>
                </div>
                <div class="gym_time_table">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>6:00 - 7:00</th>
                                    <th>8:00 - 10:00</th>
                                    <th>17:00 - 19:00</th>
                                    <th>19:00 - 20:30</th>
                                    <th>21:00 - 22:00</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h4>Monday</h4>
                                    </td>
                                    <td>Meditation<br><span></span></td>
                                    <td>Running<br><span></span></td>
                                    <td>&nbsp;</td>
                                    <td>Cycling<br><span></span></td>
                                    <td>Meditation<br><span></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Tuesday</h4>
                                    </td>
                                    <td>Running<br><span></span></td>
                                    <td>&nbsp;</td>
                                    <td>Meditation<br><span></span></td>
                                    <td>&nbsp;</td>
                                    <td>Running<br><span></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Wednesday</h4>
                                    </td>
                                    <td>Cycling<br><span></span></td>
                                    <td>Running<br><span></span></td>
                                    <td>&nbsp;</td>
                                    <td>Running<br><span></span></td>
                                    <td>Cycling<br><span></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Thursday</h4>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>Meditation<br><span></span></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Friday</h4>
                                    </td>
                                    <td>Meditation<br><span></span></td>
                                    <td>Running<br><span></span></td>
                                    <td>&nbsp;</td>
                                    <td>Running<br><span></span></td>
                                    <td>Meditation<br><span></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Saturday</h4>
                                    </td>
                                    <td>Running<br><span></span></td>
                                    <td>&nbsp;</td>
                                    <td>Meditation<br><span></span></td>
                                    <td>Meditation<br><span></span></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Sunday</h4>
                                    </td>
                                    <td>Cycling<br><span></span></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>Running<br><span></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
<script>
    document.getElementById('calculateMaleBMI').addEventListener('click', function() {
        var height = parseFloat(document.getElementById('maleHeight').value);
        var weight = parseFloat(document.getElementById('maleWeight').value);
        var bmi = weight / ((height / 100) * (height / 100));
        document.getElementById('resultBMI').innerHTML = 'Your BMI : <span class="">' + bmi.toFixed(1) + '</span>';
    });
    document.getElementById('calculateFemaleBMI').addEventListener('click', function() {
        var height = parseFloat(document.getElementById('femaleHeight').value);
        var weight = parseFloat(document.getElementById('femaleWeight').value);
        var bmi = weight / ((height / 100) * (height / 100));
        document.getElementById('resultBMI').innerHTML = 'Your BMI : <span class="">' + bmi.toFixed(1) + '</span>';
    });
</script>
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
</div>
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