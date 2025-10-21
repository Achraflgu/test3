<?php
ob_start();
session_start();
include("db_connection.php");
include("header.php");
include("nav.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_email = $_POST['customer_email'];
    $customer_password = $_POST['customer_password'];
    $sql = "SELECT * FROM customers WHERE customer_email = ? AND customer_password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $customer_email, $customer_password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['customer_email'] = $customer_email;
        $_SESSION['customer_name'] = $row['customer_name'];
        echo '<script>
            toastr.success("Login successful!", "", {
                timeOut: 6000,
                positionClass: "toast-bottom-slightly-left"
            });
         </script>';
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Invalid email or password!";
        echo '<script>
            toastr.error("Invalid email or password!", "", {
                timeOut: 6000,
                positionClass: "toast-bottom-slightly-left"
            });
         </script>';
    }
}
?>
<script>
        function validateLoginForm() {
            let isValid = true;
            let errorMessage = "";

            const email = document.getElementById("user-name").value.trim();
            const password = document.getElementById("login-password").value.trim();

            if (!email) {
                errorMessage += "Email is required.\n";
                isValid = false;
            } else if (!/\S+@\S+\.\S+/.test(email)) {
                errorMessage += "Invalid email format.\n";
                isValid = false;
            }

            if (!password) {
                errorMessage += "Password is required.\n";
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
        <div class="register-title text-center"> 
            <h4>Login your account</h4>
            <p>Login to your account to discover all great features in this item</p>
        </div>
        <div class="row justify-content-center"> 
            <div class="col-sm-12 col-md-12 col-lg-6">
                <form method="post" action="" onsubmit="return validateLoginForm();">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <input type="email" class="form-control" name="customer_email" id="user-name" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="customer_password" id="login-password" placeholder="Your Password" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="input-checkbox inline-block">
                                    <label class="label-checkbox">Keep me logged in
                                        <input type="checkbox" checked>
                                        <span class="check-indicator"></span>
                                    </label>
                                </div>
                                <a href="reset_password.php" class="forget--password">Forgot your password?</a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                            <div class="mb-3">
                            <button type="submit" class="btn btn--primary btn--rounded">Login</button>
                            </div>
                            <div class="already-customer">
                                <p class="mb-0">Don't have an account? <a href="register.php">Register here</a></p>
                            </div>
                        </div>
                        <?php if (isset($error_message)) : ?>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error_message; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include("footer.php");
ob_end_flush();
?>