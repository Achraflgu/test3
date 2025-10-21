<?php
ob_start();
session_start();
include("db_connection.php");
include("header.php");
include("nav.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_password'])) {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if ($new_password !== $confirm_password) {
        $_SESSION['error_message'] = "Passwords do not match.";
        header("Location: forgot_password.php?token=$token");
        exit();
    }
    if (isset($_SESSION['password_reset']) && $_SESSION['password_reset']['token'] === $token && $_SESSION['password_reset']['expires_at'] > time()) {
        $email = $_SESSION['password_reset']['email'];
        $sql = "UPDATE customers SET customer_password = ? WHERE customer_email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $new_password, $email);
        $stmt->execute();
        unset($_SESSION['password_reset']);
        $_SESSION['success_message'] = "Your password has been reset successfully.";
        header("Location: login.php");
        echo '<script>
            toastr.success("' . $_SESSION['success_message'] . '", "", {
                timeOut: 6000,
                positionClass: "toast-bottom-slightly-left"
            });
         </script>';
        exit();
    } else {
        $_SESSION['error_message'] = "Invalid or expired token.";
        header("Location: login.php");
        exit();
    }
}
?>
<section id="register-login" class="register-login pt-30 pb-150" style="margin-top: 100px;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <?php if (isset($_GET['token']) && isset($_SESSION['password_reset']['token']) && $_SESSION['password_reset']['token'] === $_GET['token'] && $_SESSION['password_reset']['expires_at'] > time()): ?>
                <h4>Reset Your Password</h4>
                <?php if (!empty($error_message)): ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>
                <form method="post" action="">
                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" name="new_password" id="new_password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </form>
            <?php else: ?>
                <div class="alert alert-danger">Invalid or expired token.</div>
            <?php endif; ?>
        </div>
    </div>
</div>
</section>
<?php include("footer.php"); 
ob_end_flush();?>