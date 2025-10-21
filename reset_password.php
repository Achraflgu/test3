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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset_email'])) {
    $reset_email = $_POST['reset_email'];
    $sql = "SELECT * FROM customers WHERE customer_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $reset_email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(50)); 
        $_SESSION['password_reset'] = array(
            'email' => $reset_email,
            'token' => $token,
            'expires_at' => time() + 3600 
        );
        $reset_link = "http://localhost/msport/forgot_password.php?token=$token";
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
            $mail->addAddress($reset_email);
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            ob_start();
            include('ForgetMailer.php');
            $htmlContent = ob_get_clean();
            $mail->Body = $htmlContent;           
            $mail->send();
            $success_message = "A password reset link has been sent to your email address.";
            echo '<script>
            toastr.success("A password reset link has been sent to your email address.", "", {
                timeOut: 6000,
                positionClass: "toast-bottom-slightly-left"
            });
         </script>';
        } catch (Exception $e) {
            $error_message = "Failed to send reset email. Please try again.";
        }
    } else {
        $error_message = "No account found with that email address.";
        echo '<script>
            toastr.error("No account found with that email address.", "", {
                timeOut: 6000,
                positionClass: "toast-bottom-slightly-left"
            });
         </script>';
    }
}
?>
<section id="register-login" class="register-login pt-30 pb-150" style="margin-top: 100px;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <h4>Forgot Your Password?</h4>
            <?php if (!empty($success_message)): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php endif; ?>
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <form method="post" action="">
                <div class="form-group">
                    <label for="resetEmail">Enter your email address</label>
                    <input type="email" class="form-control" name="reset_email" id="resetEmail" required>
                </div>
                <button type="submit" class="btn btn-primary">Send Reset Link</button>
            </form>
        </div>
    </div>
</div>
</section>
<?php include("footer.php"); 
ob_end_flush();
?>