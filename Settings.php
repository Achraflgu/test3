<?php
ob_start();
session_start();
include("db_connection.php");
include("header.php");
include("nav.php");
if (isset($_SESSION['customer_email'])) {
    $customer_email = $_SESSION['customer_email'];
    $sql = "SELECT * FROM customers WHERE customer_email = '$customer_email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $customer_id = $row['customer_id'];
    $order_query = "SELECT * FROM orders WHERE customer_id = '$customer_id' ORDER BY order_id DESC";
    $order_result = mysqli_query($conn, $order_query);
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updatePersonalInfo'])) {
        $first_name = $_POST['inputFirstName'];
        $email = $_POST['customerEmail'];
        $address = $_POST['customerAddress'];
        $city = $_POST['customerCity'];
        $postal_code = $_POST['customerPostalCode'];
        $country = $_POST['customerCountry'];
        $phone = $_POST['customerPhone'];

        // Handle file upload
        if (isset($_FILES['customerPhoto']) && $_FILES['customerPhoto']['error'] == UPLOAD_ERR_OK) {
            $file_tmp = $_FILES['customerPhoto']['tmp_name'];
            $file_name = basename($_FILES['customerPhoto']['name']);
            $target_dir = "admin/uploads/";
            $target_file = $target_dir . $file_name;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($file_tmp, $target_file)) {
                $photo_path = "uploads/" . $file_name;
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error uploading photo.</div>";
                $photo_path = $row['customers_photo']; // Keep the old photo if the upload fails
            }
        } else {
            $photo_path = $row['customers_photo']; // Keep the old photo if no new photo is uploaded
        }

        // Update query with the photo path
        $update_query = "UPDATE customers SET 
                        customer_name = '$first_name', 
                        customer_email = '$email', 
                        customer_address = '$address', 
                        customer_city = '$city', 
                        customer_postal_code = '$postal_code', 
                        customer_country = '$country', 
                        customer_phone = '$phone', 
                        customers_photo = '$photo_path' 
                        WHERE customer_email = '$email'";

        if (mysqli_query($conn, $update_query)) {
            $sql = "SELECT * FROM customers WHERE customer_email = '$email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo "<div class='alert alert-success' role='alert'>Customer information updated successfully!</div>";
            if ($_SESSION['customer_email'] != $email) {
                $_SESSION['customer_email'] = $email;
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error updating customer information: " . mysqli_error($conn) . "</div>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['changePassword'])) {
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        if ($currentPassword === $row['customer_password']) {
            if ($newPassword === $confirmPassword) {
                $update_query = "UPDATE customers SET customer_password = '$newPassword' WHERE customer_email = '$customer_email'";
                if (mysqli_query($conn, $update_query)) {
                    echo "<div class='alert alert-success' role='alert'>Password updated successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Error updating password: " . mysqli_error($conn) . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>New password and confirm password do not match!</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Current password is incorrect!</div>";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Delete'])) {
        $delete_query = "DELETE FROM customers WHERE customer_email = '$customer_email'";

        if (mysqli_query($conn, $delete_query)) {
            echo "<div class='alert alert-success' role='alert'>Account deleted successfully!</div>";
            header("Location: logout.php");
            exit();
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error deleting account: " . mysqli_error($conn) . "</div>";
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
<style>
    /* Additional styling for the modal */
.modal-dialog.modal-sm {
    max-width: 300px;
    margin: 30px auto;
}

.modal-content {
    border-radius: 10px;
}

.modal-header {
    border-bottom: none;
}

.modal-footer {
    border-top: none;
}

/* Optional: Adding a fade-in animation */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.modal.fade .modal-dialog {
    animation: fadeIn 0.3s;
}

</style>
<!-- Page Title #1
============================================= -->
<section id="page-title" class="page-title mt-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="title title-1 text-center">
                    <div class="title--content">
                        <div class="title--heading">
                            <h1>Settings</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <ol class="breadcrumb breadcrumb-bottom">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="register-login info" class="register-login pt-30 pb-150  pt-1">
    <div class="container p-0">
        <div class="row">
            <div class="col-md-5 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Profile Settings</h6>
                    </div>
                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab" aria-selected="false">
                            Account
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab" aria-selected="true">
                            Password
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#order-history" role="tab" aria-selected="false">
                            My Orders
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#privacy-safety" role="tab">
                            Privacy And Safety
                        </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#delete-account" role="tab">
                            Delete Account
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-xl-8">
                <div class="tab-content">
                    <script>
                        $(document).ready(function() {
                            <?php if (!empty($success_message)) : ?>
                                toastr.success('<?php echo $success_message; ?>', '', {
                                    timeOut: 6000,
                                    positionClass: 'toast-bottom-slightly-left'
                                });
                            <?php endif; ?>
                            <?php if (!empty($error_message)) : ?>
                                toastr.error('<?php echo $error_message; ?>', '', {
                                    timeOut: 6000,
                                    positionClass: 'toast-bottom-slightly-left'
                                });
                            <?php endif; ?>
                        });

                        function validateForm() {
                            var name = document.getElementById('inputFirstName').value.trim();
                            var email = document.getElementById('customerEmail').value.trim();
                            var address = document.getElementById('customerAddress').value.trim();
                            var city = document.getElementById('customerCity').value.trim();
                            var postalCode = document.getElementById('customerPostalCode').value.trim();
                            var country = document.getElementById('customerCountry').value.trim();
                            var phone = document.getElementById('customerPhone').value.trim();

                            if (name === "") {
                                toastr.error('Name is required!', '', {
                                    timeOut: 6000,
                                    positionClass: 'toast-bottom-slightly-left'
                                });
                                return false;
                            }

                            if (email === "") {
                                toastr.error('Email is required!', '', {
                                    timeOut: 6000,
                                    positionClass: 'toast-bottom-slightly-left'
                                });
                                return false;
                            }

                            if (address === "") {
                                toastr.error('Address is required!', '', {
                                    timeOut: 6000,
                                    positionClass: 'toast-bottom-slightly-left'
                                });
                                return false;
                            }

                            if (city === "") {
                                toastr.error('City is required!', '', {
                                    timeOut: 6000,
                                    positionClass: 'toast-bottom-slightly-left'
                                });
                                return false;
                            }

                            if (postalCode === "") {
                                toastr.error('Postal Code is required!', '', {
                                    timeOut: 6000,
                                    positionClass: 'toast-bottom-slightly-left'
                                });
                                return false;
                            }

                            if (country === "") {
                                toastr.error('Country is required!', '', {
                                    timeOut: 6000,
                                    positionClass: 'toast-bottom-slightly-left'
                                });
                                return false;
                            }

                            if (phone === "") {
                                toastr.error('Phone is required!', '', {
                                    timeOut: 6000,
                                    positionClass: 'toast-bottom-slightly-left'
                                });
                                return false;
                            }

                            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                            if (!emailPattern.test(email)) {
                                toastr.error('Invalid email format!', '', {
                                    timeOut: 6000,
                                    positionClass: 'toast-bottom-slightly-left'
                                });
                                return false;
                            }

                            return true;
                        }
                    </script>
                    </head>

                    <body>
                        <div class="tab-pane fade active show" id="account" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Public info</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="inputFirstName">Name</label>
                                                    <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" value="<?php echo htmlspecialchars($row['customer_name']); ?>" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-center">
                                                    <img alt="<?php echo htmlspecialchars($row['customer_name']); ?>" src="admin/<?php echo htmlspecialchars($row['customers_photo']); ?>" class="rounded-circle img-responsive mt-2" width="128" height="128" style="object-fit: cover;">
                                                    <div class="mt-2">
                                                        <input type="file" name="customerPhoto" id="customerPhoto" class="btn btn-primary btn-sm">
                                                    </div>
                                                    <small>For best results, use an image at least 128px by 128px in .jpg format</small>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Private info</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="customerEmail">Email</label>
                                        <input type="email" class="form-control" id="customerEmail" name="customerEmail" value="<?php echo htmlspecialchars($row['customer_email']); ?>" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="customerAddress">Address</label>
                                        <input type="text" class="form-control" id="customerAddress" name="customerAddress" value="<?php echo htmlspecialchars($row['customer_address']); ?>" placeholder="1234 Main St">
                                    </div>
                                    <div class="form-group">
                                        <label for="customerCity">City</label>
                                        <input type="text" class="form-control" id="customerCity" name="customerCity" value="<?php echo htmlspecialchars($row['customer_city']); ?>">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="customerPostalCode">Postal Code</label>
                                            <input type="number" class="form-control" id="customerPostalCode" name="customerPostalCode" value="<?php echo htmlspecialchars($row['customer_postal_code']); ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="customerCountry">Country</label>
                                            <input type="text" class="form-control" id="customerCountry" name="customerCountry" value="<?php echo htmlspecialchars($row['customer_country']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customerPhone">Phone</label>
                                        <input type="number" class="form-control" id="customerPhone" name="customerPhone" value="<?php echo htmlspecialchars($row['customer_phone']); ?>" placeholder="Phone">
                                    </div>
                                    <button type="submit" class="btn btn--primary btn--rounded" name="updatePersonalInfo">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="password" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Change Password</h5>
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="inputPasswordCurrent">Current Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="currentPassword" id="inputPasswordCurrent" required>
                                                <div class="input-group-append">
                                                    <button class="btn-sm  btn-outline-secondary toggle-password" type="button" data-target="#inputPasswordCurrent">
                                                        <i class="ti ti-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPasswordNew">New Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="newPassword" id="inputPasswordNew" required>
                                                <div class="input-group-append">
                                                    <button class="btn-sm  btn-outline-secondary toggle-password" type="button" data-target="#inputPasswordNew">
                                                        <i class="ti ti-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPasswordNew2">Confirm New Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="confirmPassword" id="inputPasswordNew2" required>
                                                <div class="input-group-append">
                                                    <button class="btn-sm btn-outline-secondary  toggle-password" type="button" data-target="#inputPasswordNew2">
                                                        <i class="ti ti-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn--primary btn--rounded" name="changePassword">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="delete-account" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Delete Account</h5>
                                    <p>Are you sure you want to delete your account?</p>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Delete Account</button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your account? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form method="post">
                    <input type="hidden" name="customer_email" value="<?php echo $customer_email; ?>"> <!-- Include the customer email -->
                    <button type="submit" class="btn btn-danger" name="Delete">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
                        <div class="tab-pane fade" id="privacy-safety" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Privacy and Safety</h5>
                                    <p class="lead">At , we take your privacy and safety seriously. Here are some measures we take to ensure a secure shopping experience:</p>
                                    <ul class="list-unstyled">
                                        <li><strong>Secure Payment Methods:</strong> We use trusted payment gateways and SSL encryption to protect your financial information.</li>
                                        <li><strong>Data Protection:</strong> Your personal information is kept confidential and will not be shared with third parties.</li>
                                        <li><strong>Privacy Policy:</strong> Read our <a href="privacy-policy.html">privacy policy</a> to understand how we collect, use, and protect your data.</li>
                                        <li><strong>Secure Shopping Environment:</strong> Our website is equipped with security features to safeguard your information during checkout.</li>
                                        <li><strong>Customer Account Security:</strong> Create a strong password for your account and enable two-factor authentication for added security.</li>
                                        <li><strong>Safe Delivery:</strong> We ensure that your orders are delivered safely and securely to your doorstep.</li>
                                        <li><strong>Product Safety Information:</strong> Learn about the proper usage and safety precautions for our sports equipment.</li>
                                        <li><strong>Feedback and Reviews:</strong> Share your feedback and read reviews from other customers about their shopping experience.</li>
                                        <li><strong>Customer Support:</strong> Contact our <a href="contact.html">customer support team</a> for any privacy or safety-related inquiries.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php if (mysqli_num_rows($order_result) > 0) { ?>
                            <div class="tab-pane fade" id="order-history" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Order History and Details</h5>
                                        <div class="table-responsive table-borderless table-hover">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            <div class="toggle-btn">
                                                                <div class="inner-circle"></div>
                                                            </div>
                                                        </th>
                                                        <th>Order Reference</th>
                                                        <th>Date</th>
                                                        <th>Total Price</th>
                                                        <th>Payment Method</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-body">
                                                    <?php
                                                    while ($order_row = mysqli_fetch_assoc($order_result)) {
                                                        $order_id = $order_row['order_id'];
                                                        $order_date = $order_row['order_date'];
                                                        $total_amount = $order_row['total_amount'];
                                                        $payment_status = $order_row['payment_status'];
                                                        $invoice_no = $order_row['invoice_no'];
                                                        $payment_method_query = "SELECT payment_method FROM order_details WHERE order_id = '$order_id'";
                                                        $payment_method_result = mysqli_query($conn, $payment_method_query);
                                                        $payment_method_row = mysqli_fetch_assoc($payment_method_result);
                                                        $payment_method = ($payment_method_row !== null) ? $payment_method_row['payment_method'] : '';
                                                    ?>
                                                        <tr class="cell-1">
                                                            <td class="text-center">
                                                                <div class="toggle-btn">
                                                                    <div class="inner-circle"></div>
                                                                </div>
                                                            </td>
                                                            <td><?php echo $invoice_no; ?></td>
                                                            <td><?php echo date('M d, Y', strtotime($order_date)); ?></td>
                                                            <td><?php echo $total_amount; ?> TND</td>
                                                            <td><?php echo $payment_method; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($payment_status == 'complete') {
                                                                    echo '<span class="badge badge-success">Complete</span>';
                                                                } elseif ($payment_status == 'pending-unpaid' || $payment_status == 'pending-paid') {
                                                                    echo '<span class="badge badge-warning">Pending</span>';
                                                                } elseif ($payment_status == 'failed') {
                                                                    echo '<span class="badge badge-danger">Failed</span>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-info-circle text-info" data-toggle="modal" data-target="#orderDetailsModal<?php echo $order_id; ?>" style="cursor: pointer;"></i>
                                                            </td>
                                                        </tr>
                                                        <div class="modal model-bg-light fade compare-popup modal-fullscreen" id="orderDetailsModal<?php echo $order_id; ?>" tabindex="-1" role="dialog" aria-labelledby="orderDetailsModalLabel<?php echo $order_id; ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="orderDetailsModalLabel<?php echo $order_id; ?>">Order Details - <?php echo $invoice_no; ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="cart-total-amount">
                                                                            <h4>Your Order</h4>
                                                                            <div class="cart--products">
                                                                                <h6>Products</h6>
                                                                                <div class="clearfix"></div>
                                                                                <ul class="list-unstyled">
                                                                                    <?php
                                                                                    $query = "SELECT * FROM order_details WHERE order_id = $order_id";
                                                                                    $result = mysqli_query($conn, $query);
                                                                                    if (mysqli_num_rows($result) > 0) {
                                                                                        $order_detail = mysqli_fetch_assoc($result);
                                                                                        echo $order_detail['products_list'];
                                                                                    ?>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="cart--subtotal">
                                                                                <h6>Subtotal</h6>
                                                                                <span class="price"><?php echo $order_detail['subtotal']; ?> TND</span>
                                                                            </div>
                                                                            <div class="cart--discount">
                                                                                <h6 style="font-size: smaller;">Discount Total</h6>
                                                                                <span class="price"><?php echo $order_detail['discount_total']; ?> TND</span>
                                                                            </div>
                                                                            <div class="cart--Tax border-top-0 pt-0">
                                                                                <h6 style="font-size: smaller;">Tax Stamp</h6>
                                                                                <span class="price"><?php echo $order_detail['tax_stamp']; ?> TND</span>
                                                                            </div>
                                                                            <div class="cart--shipping border-top-0 pt-0">
                                                                                <h6 style="font-size: smaller;">Shipping</h6>
                                                                                <span class="price"><?php echo $order_detail['shipping']; ?> TND</span>
                                                                            </div>
                                                                            <div class="cart--total">
                                                                                <div class="clearfix">
                                                                                    <h6>Total</h6>
                                                                                    <span class="price"><?php echo $order_detail['total_amount']; ?> TND</span>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePasswordButtons = document.querySelectorAll('.toggle-password');
            togglePasswordButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const targetInput = document.querySelector(targetId);
                    if (targetInput.type === 'password') {
                        targetInput.type = 'text';
                        this.innerHTML = '<i class="ti ti-close"></i>';
                    } else {
                        targetInput.type = 'password';
                        this.innerHTML = '<i class="ti ti-eye"></i>';
                    }
                });
            });
        });
    </script>
</section>
<?php
include("footer.php");
ob_end_flush();
?>