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
                            <h1>Contact Us</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb breadcrumb-bottom">
                        <li><a href="index-2.html">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact #1
=========================================-->
<section id="contact1" class="contact contact-1 pt-50 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="contact-panel">
                    <div class="contact--icon">c</div>
                    <div class="contact--content">
                        <h3>CALL US</h3>
                        <ul class="list-unstyled mb-0">
                            <li><a href="tel:+21671199205">Phone 01:  (+216) 71 199 205</a></li>
                            <li><a href="tel:+21671354687">Phone 02: (+216) 71 354 687</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="contact-panel">
                    <div class="contact--icon">v</div>
                    <div class="contact--content">
                        <h3>VISIT US</h3>
                        <ul class="list-unstyled mb-0">
                            <li>SPARK Fitness, Avenue Habib Bourguiba,</li>
                            <li>Tunis, Tunisia</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="contact-panel">
                    <div class="contact--icon">E</div>
                    <div class="contact--content">
                        <h3>EMAIL</h3>
                        <ul class="list-unstyled mb-0">
                            <li><a href="mailto:Support@SPARK.tn">Support@SPARK.tn</a></li>
                            <li><a href="mailto:info@SPARK.tn"> info@SPARK.tn</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- google-map
============================================= -->
<section id="google-map" class="google-map pb-0 pt-0">
    <div class="container-fluid pr-0 pl-0">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 pr-0 pl-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.189394282248!2d0.12738971567463627!3d51.50735077963433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604e4b946a1e1%3A0x7957b35e6cb7a207!2sBuckingham%20Palace!5e0!3m2!1sen!2suk!4v1621806159899!5m2!1sen!2suk" width="100%" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- contact #2
============================================= -->
<?php
$message = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("db_connection.php");
    if (isset($_SESSION['customer_email'])) {
        $customer_email = $_SESSION['customer_email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $customer_id_query = "SELECT customer_id FROM customers WHERE customer_email = '$customer_email'";
        $customer_id_result = mysqli_query($conn, $customer_id_query);
        $customer_id_row = mysqli_fetch_assoc($customer_id_result);
        $customer_id = $customer_id_row['customer_id'];
        $insert_contact_query = "INSERT INTO contact (customer_id, subject, message) VALUES ($customer_id, '$subject', '$message')";
        if(mysqli_query($conn, $insert_contact_query)) {
            $message = '<div class="alert alert-success" role="alert"><strong>Thank you. We will contact you shortly.</strong></div>';
            echo '<script>
            toastr.success("Thank you. We will contact you shortly.", "", {
                timeOut: 6000,
                positionClass: "toast-bottom-slightly-left"
            });
         </script>';
        } else {
            $message = '<div class="alert alert-danger" role="alert"><strong>Sorry, an error occurred. Please try again later.</strong></div>';
            echo '<script>
            toastr.error("Sorry, an error occurred. Please try again later.", "", {
                timeOut: 6000,
                positionClass: "toast-bottom-slightly-left"
            });
         </script>';
        }
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $insert_contact_query = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
        if(mysqli_query($conn, $insert_contact_query)) {
            $message = '<div class="alert alert-success" role="alert"><strong>Thank you. We will contact you shortly.</strong></div>';
            echo '<script>
            toastr.success("Thank you. We will contact you shortly.", "", {
                timeOut: 6000,
                positionClass: "toast-bottom-slightly-left"
            });
         </script>';
        } else {
            $message = '<div class="alert alert-danger" role="alert"><strong>Sorry, an error occurred. Please try again later.</strong></div>';
            echo '<script>
            toastr.error("Sorry, an error occurred. Please try again later.", "", {
                timeOut: 6000,
                positionClass: "toast-bottom-slightly-left"
            });
         </script>';
        }
    }
}
?>
<section id="contact2" class="contact contact-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading heading-2 mb-40 text--center">
                    <h2 class="heading--title">Get In Touch With Us</h2>
                    <p class="heading--desc italic">Connect with us effortlessly and let's start your journey towards a healthier lifestyle. </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <form method="post" class="contactForm mb-0">
                    <div class="row">
                        <?php if (isset($_SESSION['customer_email'])) : ?>
                            <div class="col-sm-12 col-md-12 col-lg-4 offset-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group mb-80">
                                    <textarea class="form-control" name="message" rows="2" placeholder="Your message here"></textarea>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group mb-80">
                                    <textarea class="form-control" name="message" rows="2" placeholder="Your message here"></textarea>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-sm-12 col-md-12 col-lg-12 text--center">
                            <button type="submit" class="btn btn--primary btn--rounded">SEND TO US</button>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div id="contactResult" class="contact-result"><?php echo $message; ?></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include("footer.php");
?>