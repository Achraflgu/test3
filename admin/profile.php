<?php
session_start();
if (!isset($_SESSION['email'])) { 
    header("Location: login.php");
    exit();
}
include_once 'db_connection.php'; 
$email = $_SESSION['email']; 
$sql = "SELECT * FROM admins WHERE admin_email = '$email'";
$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $admin_name = $row['admin_name'];
        $admin_job = $row['admin_job'];
        $admin_photo = $row['admin_photo'];
        $admin_email = $row['admin_email']; 
        $admin_phone = $row['admin_phone']; 
        $admin_password = $row['admin_password']; 
    } else {
        $admin_name = "Admin Name Not Found";
        $admin_job = "Admin Job Not Found";
    }
} else {
    $admin_name = "Error Retrieving Admin Name";
    $admin_job = "Error Retrieving Admin Job";
    echo "SQL Error: " . mysqli_error($conn); 
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background: #f8f8f8;
            margin-top: 0;
        }
        .dark .table{
            color: white;
        }
        .table-hover tbody tr:hover{
            color: #606da6;
        }
        .dark .table-hover tbody tr:hover{
            color: #f26c4f;
        }
        .btn-primary {
            background-color: #606da6;
            border-color: #606da6;
        }
        .dark .btn-primary {
            background-color: #f26c4f !important;
            border-color: #f26c4f;
        }
        .btn-sm:hover {
            background-color: #606da6b5 !important;
        }
        .dark .btn-sm:hover {
            background-color: #f26c4f9c !important;
        }
        .badge-primary {
            background-color: #606da6;
            border-color: #606da6;
        }
        .dark .badge-primary {
            background-color: #f26c4f !important;
            border-color: #f26c4f;
        }
        .btn-sm:hover {
            background-color: #606da6b5 !important;
        }
        .dark .btn-sm:hover {
            background-color: #f26c4f9c !important;
        }
        .page-item.active .page-link {
            background-color: #606da6 !important;
            border-color: #606da6;
        }
        .dark .page-item.active .page-link {
            background-color: #f26c4f !important;
            border-color: #f26c4f;
        }
        .dark .page-link {
            color: white;
            background-color: #000;
            border: 1px solid #000000;
        }
        .dark a {
    color: #f26c4f;
}
a {
    color: #606da6;
}
.dark .btn-primary{
            color: white;
        }
    </style>
</head>
<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">
                                            <div class="mx-auto" style="width: 140px;">
                                                <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                    <img id="adminPhoto" src="<?php echo $admin_photo; ?>" alt="Admin Photo" width="100%" height="100%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $admin_name; ?></h4>
                                                <p class="mb-0">@<?php echo explode("@", $admin_email)[0]; ?></p>
                                                <div class="text-muted"><small>Last seen 2 hours ago</small></div>
                                                <form id="photoForm" action="update_profile.php" method="post" enctype="multipart/form-data">
                                                    <input type="file" name="admin_photo" id="photoInput" style="display: none;">
                                                    <div class="mt-2" style="display: inline-block;">
                                                        <button class="btn btn-primary" type="button" onclick="document.getElementById('photoInput').click();">
                                                            <i class="fa fa-fw fa-camera"></i> Upload Photo
                                                        </button>
                                                    </div>
                                                    <div class="mt-2" style="display: inline-block; margin-left: 10px;">
                                                        <button class="btn btn-primary" type="submit" id="submitPhotoBtn">
                                                            <i class="fa fa-fw fa-save"></i> Save Photo
                                                        </button>
                                                    </div>
                                                </form>
                                                <script>
                                                    function updateAdminPhoto(event) {
                                                        var adminPhoto = document.getElementById('adminPhoto');
                                                        adminPhoto.src = URL.createObjectURL(event.target.files[0]);
                                                        adminPhoto.onload = function() {
                                                            URL.revokeObjectURL(adminPhoto.src); 
                                                        };
                                                    }
                                                    document.getElementById('photoInput').addEventListener('change', updateAdminPhoto);
                                                </script>
                                            </div>
                                            <div class="text-center text-sm-right">
                                                <span class="badge badge-secondary"><?php echo $admin_job; ?></span>
                                                <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href class="active nav-link">Settings</a></li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <form class="form" id="profileForm" method="post" action="update_profile.php" enctype="multipart/form-data"> 
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Full Name</label>
                                                                    <input class="form-control" type="text" name="name" placeholder="" value="<?php echo $admin_name; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Phone</label>
                                                                    <input class="form-control" type="number" name="phone" placeholder="" value="<?php echo $admin_phone; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input class="form-control" type="email" name="email" placeholder="" value="<?php echo $admin_email; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mb-3">
                                                        <div class="mb-2"><b>Change Password</b></div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Current Password</label>
                                                                    <input class="form-control" type="password" name="current_password" placeholder="Current Password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>New Password</label>
                                                                    <input class="form-control" type="password" name="new_password" placeholder="New Password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                                                    <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                                        <div class="mb-2"><b>Keeping in Touch</b></div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label>Email Notifications</label>
                                                                <div class="custom-controls-stacked px-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="notifications-blog" checked>
                                                                        <label class="custom-control-label" for="notifications-blog">Blog posts</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="notifications-news" checked>
                                                                        <label class="custom-control-label" for="notifications-news">Newsletter</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="notifications-offers" checked>
                                                                        <label class="custom-control-label" for="notifications-offers">Personal Offers</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn btn-primary" type="submit" id="saveChangesBtn">Save Changes</button> 
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="px-xl-3">
                                    <a href="logout.php" class="btn btn-block btn-secondary" role="button" aria-label="Logout">
                                        <i class="fa fa-sign-out"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title font-weight-bold">Support</h6>
                                <p class="card-text">Get fast, free help from our friendly assistants.</p>
                                <button type="button" class="btn btn-primary" id="sendEmailBtn">Send Email</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
  function sendEmail() {
    var email = 'achrafgu92@gmail.com';
    var subject = 'Inquiry';
    var body = 'Please write your message here.';
    var mailtoLink = 'mailto:' + email + '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);
    window.location.href = mailtoLink;
  }
  $(document).ready(function() {
    $('#sendEmailBtn').click(function() {
      sendEmail();
    });
  });
</script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var originalPhotoURL = document.getElementById('adminPhoto').src;
            document.getElementById('photoInput').addEventListener('change', function(event) {
                var file = event.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('adminPhoto').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
            document.getElementById('saveChangesBtn').addEventListener('click', function(event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'update_profile.php',
                    data: $('#profileForm').serialize(),
                    success: function(response) {
                        console.log('Profile updated successfully.');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating profile:', error);
                    }
                });
            });
            document.getElementById('photoInput').addEventListener('blur', function(event) {
                if (!event.target.files[0]) {
                    document.getElementById('adminPhoto').src = originalPhotoURL;
                }
            });
        });
    </script>
</body>
</html>