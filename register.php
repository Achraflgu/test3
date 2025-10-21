<?php
ob_start();
session_start();
include("db_connection.php");
include("header.php");
include("nav.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'admin/vendor/autoload.php'; 

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_password = $_POST['customer_password'];
    $customer_address = $_POST['customer_address'];
    $customer_city = $_POST['customer_city'];
    $customer_postal_code = $_POST['customer_postal_code'];
    $customer_country = $_POST['customer_country'];
    $customer_phone = $_POST['customer_phone'];

    $target_dir = "admin/uploads/";
    $target_file = $target_dir . basename($_FILES["customers_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["customers_photo"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $error_message = "File is not an image.";
            $uploadOk = 0;
        }
    }

    
    if ($uploadOk == 0 || !isset($_FILES["customers_photo"]) || $_FILES["customers_photo"]["error"] != UPLOAD_ERR_OK) {
        
        $db_file_path = 'uploads/default.jpg';
    } else {
        if (move_uploaded_file($_FILES["customers_photo"]["tmp_name"], $target_file)) {
            $success_message = "The file " . htmlspecialchars(basename($_FILES["customers_photo"]["name"])) . " has been uploaded.";
            
            $db_file_path = str_replace('admin/', '', $target_file);
        } else {
            $error_message = "Sorry, there was an error uploading your file.";
            
            $db_file_path = 'uploads/default.jpg';
        }
    }

    $confirmation_code = bin2hex(random_bytes(16));
    $_SESSION['registration_details'] = array(
        'customer_name' => $customer_name,
        'customer_email' => $customer_email,
        'customer_password' => $customer_password,
        'customer_address' => $customer_address,
        'customer_city' => $customer_city,
        'customer_postal_code' => $customer_postal_code,
        'customer_country' => $customer_country,
        'customer_phone' => $customer_phone,
        'confirmation_code' => $confirmation_code,
        'customer_photo' => $db_file_path
    );

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'achrafgu92@gmail.com';
        $mail->Password = 'frfpvyagagwfwhju';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('achrafgu92@gmail.com', 'SPARK');
        $mail->addAddress($customer_email, $customer_name);
        $mail->isHTML(true);
        $mail->Subject = 'Confirm Your Registration';
        ob_start();
        include('ConfirmationMailer.php');
        $htmlContent = ob_get_clean();
        $mail->Body = $htmlContent;
        $mail->send();
        $success_message .= " A confirmation email has been sent to your email address. Please click on the link provided to complete your registration.";
        echo '<script>
            toastr.success("A confirmation email has been sent to your email.", "", {
                timeOut: 6000,
                positionClass: "toast-bottom-slightly-left"
            });
         </script>';
    } catch (Exception $e) {
        $error_message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<script>
        function validateForm() {
            let isValid = true;
            let errorMessage = "";

            const name = document.getElementById("customer_name").value.trim();
            const email = document.getElementById("customer_email").value.trim();
            const password = document.getElementById("customer_password").value.trim();
            const address = document.getElementById("customer_address").value.trim();
            const city = document.getElementById("customer_city").value.trim();
            const postalCode = document.getElementById("customer_postal_code").value.trim();
            const country = document.getElementById("customer_country").value.trim();
            const phone = document.getElementById("customer_phone").value.trim();

            if (!name) {
                errorMessage += "Name is required.\n";
                isValid = false;
            }
            if (!email) {
                errorMessage += "Email is required.\n";
                isValid = false;
            } else if (!/\S+@\S+\.\S+/.test(email)) {
                errorMessage += "Email is invalid.\n";
                isValid = false;
            }
            if (!password) {
                errorMessage += "Password is required.\n";
                isValid = false;
            }
            if (!address) {
                errorMessage += "Address is required.\n";
                isValid = false;
            }
            if (!city) {
                errorMessage += "City is required.\n";
                isValid = false;
            }
            if (!postalCode) {
                errorMessage += "Postal code is required.\n";
                isValid = false;
            } else if (isNaN(postalCode)) {
                errorMessage += "Postal code must be a number.\n";
                isValid = false;
            }
            if (!country) {
                errorMessage += "Country is required.\n";
                isValid = false;
            }
            if (!phone) {
                errorMessage += "Phone is required.\n";
                isValid = false;
            } else if (isNaN(phone)) {
                errorMessage += "Phone number must be a number.\n";
                isValid = false;
            }

            if (!isValid) {
                toastr.error(errorMessage, '', { 
                    timeOut: 6000, 
                    positionClass: 'toast-bottom-slightly-left' 
                });
            }
            return isValid;
        }
    </script>
<!-- Page Title #1
============================================= -->
<section id="page-title" class="page-title mt-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="title title-1 text-center">
                    <div class="title--content">
                        <div class="title--heading">
                            <h1>Login & Register</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb">
                        <li><a href="index-2.html">Home</a></li>
                        <li class="active">Login & Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- register-login
============================================= -->
<section id="register-login" class="register-login pt-30 pb-150">
    <div class="container">
        <div class="register-title text-center mb-4">
            <h4>Register account now</h4>
            <p>Pellentesque habitant morbi tristique senectus et netus et</p>
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return validateForm();">
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-3">
                    <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Your Name">
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <input type="email" class="form-control" name="customer_email" id="customer_email" placeholder="Email">
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <input type="password" class="form-control" name="customer_password" id="customer_password" placeholder="Password">
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <input type="text" class="form-control" name="customer_address" id="customer_address" placeholder="Address">
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <input type="text" class="form-control" name="customer_city" id="customer_city" placeholder="City">
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <input type="number" class="form-control" name="customer_postal_code" id="customer_postal_code" placeholder="Postal Code">
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <input type="text" class="form-control" name="customer_country" id="customer_country" placeholder="Country">
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <input type="number" class="form-control" name="customer_phone" id="customer_phone" placeholder="Phone">
                </div>
            </div>
            <div class="col-sm-12 col-md-12 mb-4">
                <div class="form-group">
                    <div class="form-control" style="position: relative; overflow: hidden;">
                        <input type="file" id="customers_photo" name="customers_photo" style="position: absolute; font-size: 100px; opacity: 0;">
                        <label for="customers_photo" style="cursor: pointer;">Upload Your Profile Photo</label>
                    </div>
                </div>
            </div>
            <?php if (!empty($error_message)) : ?>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty($success_message)) : ?>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-success" role="alert">
                        <?php echo $success_message; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-sm-12 col-md-12 text-center">
                <div class="mb-3">
                    <button type="submit" class="btn btn--primary btn--rounded">Register</button>
                </div>
                <div class="already-customer">
                    <p>Already a customer? <a href="login.php">Login here</a></p>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
include("footer.php");
ob_end_flush();
?>

