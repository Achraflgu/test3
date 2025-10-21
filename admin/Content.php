<?php
if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'index.php') !== false) {
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }
    include_once 'db_connection.php'; 
    $email = $_SESSION['email'];
} else {
    echo '<script>window.location.href = "index.php?page=Content";</script>';
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Event Schedule list - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
        }
        .event-schedule-area .section-title .title-text {
            margin-bottom: 50px;
        }
        .event-schedule-area .tab-area .nav-tabs {
            border-bottom: inherit;
        }
        .event-schedule-area .tab-area .nav {
            border-bottom: inherit;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            margin-top: 80px;
        }
        .event-schedule-area .tab-area .nav-item {
            margin-bottom: 75px;
        }
        .event-schedule-area .tab-area .nav-item .nav-link {
            text-align: center;
            font-size: 22px;
            color: #333;
            font-weight: 600;
            border-radius: inherit;
            border: inherit;
            padding: 0px;
            text-transform: capitalize !important;
        }
        .event-schedule-area .tab-area .nav-item .nav-link.active {
            color: #4125dd;
            background-color: transparent;
        }
        .event-schedule-area .tab-area .tab-content .table {
            margin-bottom: 0;
            width: 80%;
        }
        .event-schedule-area .tab-area .tab-content .table thead td,
        .event-schedule-area .tab-area .tab-content .table thead th {
            border-bottom-width: 1px;
            font-size: 20px;
            font-weight: 600;
            color: #252525;
        }
        .event-schedule-area .tab-area .tab-content .table td,
        .event-schedule-area .tab-area .tab-content .table th {
            border: 1px solid #b7b7b7;
            padding-left: 30px;
        }
        .event-schedule-area .tab-area .tab-content .table tbody th .heading,
        .event-schedule-area .tab-area .tab-content .table tbody td .heading {
            font-size: 16px;
            text-transform: capitalize;
            margin-bottom: 16px;
            font-weight: 500;
            color: #252525;
            margin-bottom: 6px;
        }
        .event-schedule-area .tab-area .tab-content .table tbody th span,
        .event-schedule-area .tab-area .tab-content .table tbody td span {
            color: #4125dd;
            font-size: 18px;
            text-transform: uppercase;
            margin-bottom: 6px;
            display: block;
        }
        .event-schedule-area .tab-area .tab-content .table tbody th span.date,
        .event-schedule-area .tab-area .tab-content .table tbody td span.date {
            color: #656565;
            font-size: 14px;
            font-weight: 500;
            margin-top: 15px;
        }
        .event-schedule-area .tab-area .tab-content .table tbody th p {
            font-size: 14px;
            margin: 0;
            font-weight: normal;
        }
        .event-schedule-area-two .section-title .title-text h2 {
            margin: 0px 0 15px;
        }
        .event-schedule-area-two ul.custom-tab {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 30px;
        }
        .event-schedule-area-two ul.custom-tab li {
            margin-right: 70px;
            position: relative;
        }
        .event-schedule-area-two ul.custom-tab li a {
            font-size: 25px;
            line-height: 25px;
            font-weight: 600;
            text-transform: capitalize;
            padding: 35px 0;
            position: relative;
        }
        .event-schedule-area-two ul.custom-tab li a:hover:before {
            width: 100%;
        }
        .event-schedule-area-two ul.custom-tab li a:before {
            position: absolute;
            left: 0;
            bottom: 0;
            content: "";
            background: #4125dd;
            width: 0;
            height: 2px;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            transition: all 0.4s;
        }
        .event-schedule-area-two ul.custom-tab li a.active {
            color: #4125dd;
        }
        .event-schedule-area-two .primary-btn {
            margin-top: 40px;
        }
        .event-schedule-area-two .tab-content .table {
            -webkit-box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 0;
        }
        .event-schedule-area-two .tab-content .table thead {
            background-color: #007bff;
            color: #fff;
            font-size: 20px;
        }
        .event-schedule-area-two .tab-content .table thead tr th {
            padding: 20px;
            border: 0;
        }
        .event-schedule-area-two .tab-content .table tbody {
            background: #fff;
        }
        .event-schedule-area-two .tab-content .table tbody tr.inner-box {
            border-bottom: 1px solid #dee2e6;
        }
        .event-schedule-area-two .tab-content .table tbody tr th {
            border: 0;
            padding: 30px 20px;
            vertical-align: middle;
        }
        .event-schedule-area-two .tab-content .table tbody tr th .event-date {
            color: #252525;
            text-align: center;
        }
        .event-schedule-area-two .tab-content .table tbody tr th .event-date span {
            font-size: 50px;
            line-height: 50px;
            font-weight: normal;
        }
        .event-schedule-area-two .tab-content .table tbody tr td {
            padding: 30px 20px;
            vertical-align: middle;
        }
        .event-schedule-area-two .tab-content .table tbody tr td .r-no span {
            color: #252525;
        }
        .event-schedule-area-two .tab-content .table tbody tr td .event-wrap h3 a {
            font-size: 20px;
            line-height: 20px;
            color: #cf057c;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            transition: all 0.4s;
        }
        .event-schedule-area-two .tab-content .table tbody tr td .event-wrap h3 a:hover {
            color: #4125dd;
        }
        .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .categories {
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            margin: 10px 0;
        }
        .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .categories a {
            color: #252525;
            font-size: 16px;
            margin-left: 10px;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            transition: all 0.4s;
        }
        .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .categories a:before {
            content: "\f07b";
            font-family: fontawesome;
            padding-right: 5px;
        }
        .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .time span {
            color: #252525;
        }
        .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .organizers {
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            margin: 10px 0;
        }
        .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .organizers a {
            color: #4125dd;
            font-size: 16px;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            transition: all 0.4s;
        }
        .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .organizers a:hover {
            color: #4125dd;
        }
        .event-schedule-area-two .tab-content .table tbody tr td .event-wrap .organizers a:before {
            content: "\f007";
            font-family: fontawesome;
            padding-right: 5px;
        }
        .event-schedule-area-two .tab-content .table tbody tr td .primary-btn {
            margin-top: 0;
            text-align: center;
        }
        .event-schedule-area-two .tab-content .table tbody tr td .event-img img {
            width: 100px;
            height: 100px;
            border-radius: 8px;
        }
        .dark .table {
            color: white;
        }
        .table-hover tbody tr:hover {
            color: #606da6;
        }
        .dark .table-hover tbody tr:hover {
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
        .dark .btn-primary {
            color: white;
        }
        .event-schedule-area-two ul.custom-tab li a.active {
            color: #f26c4f;
        }
        .dark .event-schedule-area-two ul.custom-tab li a.active {
            color: #606da6;
        }
    </style>
</head>
<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="event-schedule-area-two bg-color pad100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <div class="title-text">
                            <h2>Edit Content of Pages</h2>
                        </div>
                        <p>
                            Modify the content of your website pages here. Make updates, corrections, and enhancements easily.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav custom-tab" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="cta-sections-tab" data-toggle="tab" href="#cta-sections" role="tab" aria-controls="cta-sections" aria-selected="true">CTA Sections</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sliders-tab" data-toggle="tab" href="#sliders" role="tab" aria-controls="sliders" aria-selected="false">Sliders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="gallery" aria-selected="false">Gallery</a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" id="banners-tab" data-toggle="tab" href="#banners" role="tab" aria-controls="banners" aria-selected="false">Banners</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="cta-sections" role="tabpanel" aria-labelledby="cta-sections-tab">
                    <p class="text-center">Content for CTA Sections</p>
                    <?php
                    $sql = "SELECT * FROM cta_sections";
                    $result = $conn->query($sql);
                    ?>
                    <div class="container">
                        <div class="tab-content" id="pills-tabContent">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="align-items-center text-center mb-4 position-relative" id="pills-intelligence" role="tabpanel" aria-labelledby="pills-intelligence-tab">
                                        <a href="#" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">
                                            <img src="/MSPORT/<?php echo $row['bg_image']; ?>" class="img-fluid" alt="">
                                            <div class="overlay-text">
                                                <p><?php echo htmlspecialchars($row['small_text']); ?></p>
                                                <p><span class="highlight"><?php echo htmlspecialchars($row['highlight_text']); ?></span></p>
                                                <p><a href="<?php echo htmlspecialchars($row['button_link']); ?>" class="btn btn-primary"><?php echo htmlspecialchars($row['button_text']); ?></a></p>
                                            </div>
                                        </a>
                                    </div>
                                    <style>
                                        .position-relative {
                                            position: relative;
                                        }
                                        .overlay-text {
                                            position: absolute;
                                            top: 50%;
                                            left: 50%;
                                            transform: translate(-50%, -50%);
                                            color: #fff;
                                            text-align: center;
                                        }
                                        .overlay-text p,
                                        .overlay-text h2 {
                                            margin: 0;
                                        }
                                        .overlay-text .highlight {
                                            color: #FF0000;
                                            /* Example color for highlight text */
                                        }
                                        .btn-primary {
                                            background-color: #007bff;
                                            border-color: #007bff;
                                            color: #fff;
                                        }
                                    </style>
                                    <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save_changes"])) {
                                        $id = $_POST['id'];
                                        $bg_image = $_POST['bg_image'];
                                        $small_text = $_POST['small_text'];
                                        $main_text = $_POST['main_text'];
                                        $highlight_text = $_POST['highlight_text'];
                                        $button_text = $_POST['button_text'];
                                        $button_link = $_POST['button_link'];
                                        $sql = "UPDATE cta_sections SET bg_image=?, small_text=?, main_text=?, highlight_text=?, button_text=?, button_link=? WHERE id=?";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param("ssssssi", $bg_image, $small_text, $main_text, $highlight_text, $button_text, $button_link, $id);
                                        if ($stmt->execute()) {
                                            echo '<script>alert("Section updated successfully!");window.location.href = "index.php?page=Content";</script>';
                                            exit();
                                        } else {
                                            echo "Error: " . $conn->error;
                                        }
                                    }
                                    ?>
                                    <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit CTA Section</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <div class="form-group">
                                                            <label for="bg_image">Background Image URL</label>
                                                            <input type="text" class="form-control" id="bg_image" name="bg_image" value="<?php echo $row['bg_image']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="small_text">Small Text</label>
                                                            <input type="text" class="form-control" id="small_text" name="small_text" value="<?php echo $row['small_text']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="main_text">Main Text</label>
                                                            <input type="text" class="form-control" id="main_text" name="main_text" value="<?php echo htmlspecialchars($row['main_text']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="highlight_text">Highlight Text</label>
                                                            <input type="text" class="form-control" id="highlight_text" name="highlight_text" value="<?php echo $row['highlight_text']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="button_text">Button Text</label>
                                                            <input type="text" class="form-control" id="button_text" name="button_text" value="<?php echo $row['button_text']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="button_link">Button Link</label>
                                                            <input type="text" class="form-control" id="button_link" name="button_link" value="<?php echo $row['button_link']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="save_changes">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No results found.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="sliders" role="tabpanel" aria-labelledby="sliders-tab">
    <p>Content for Sliders</p>
    <div class="text-right mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSliderModal"><i class="fa fa-plus"></i></button>
    </div>
    <div class="row">
        <?php
        $sql = "SELECT * FROM sliders";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-4 shadow-sm">
                        <img src="/MSPORT/<?php echo htmlspecialchars($row['slider_bg_image']); ?>" class="card-img-top" alt="Slider Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['slider_name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['slider_text']); ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#editSliderModal" data-id="<?php echo $row['slider_id']; ?>" data-name="<?php echo htmlspecialchars($row['slider_name']); ?>" data-bg-image="<?php echo htmlspecialchars($row['slider_bg_image']); ?>" data-bg-image-dark="<?php echo htmlspecialchars($row['slider_bg_image_dark']); ?>" data-text="<?php echo htmlspecialchars($row['slider_text']); ?>" data-button-text="<?php echo htmlspecialchars($row['slider_button_text']); ?>" data-button-link="<?php echo htmlspecialchars($row['slider_button_link']); ?>"><i class="fa fa-pencil"></i></button>
                                    <a href="Content.php?page=&delete_slider=<?php echo $row['slider_id']; ?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>No sliders found.</p>";
        }
        ?>
    </div>
</div>
<script>
    $('#editSliderModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); 
        var id = button.data('id'); 
        var name = button.data('name');
        var bgImage = button.data('bg-image');
        var bgImageDark = button.data('bg-image-dark');
        var text = button.data('text');
        var buttonText = button.data('button-text');
        var buttonLink = button.data('button-link');
        var modal = $(this);
        modal.find('#edit_slider_id').val(id);
        modal.find('#edit_slider_name').val(name);
        modal.find('#edit_slider_bg_image').val(bgImage);
        modal.find('#edit_slider_bg_image_dark').val(bgImageDark);
        modal.find('#edit_slider_text').val(text);
        modal.find('#edit_slider_button_text').val(buttonText);
        modal.find('#edit_slider_button_link').val(buttonLink);
    });
</script>
<div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="addSliderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSliderModalLabel">Add Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?page=Content#sliders'; ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="slider_name">Slider Name</label>
                        <input type="text" class="form-control" id="slider_name" name="slider_name" required>
                    </div>
                    <div class="form-group">
                        <label for="slider_bg_image">Slider Background Image URL</label>
                        <input type="text" class="form-control" id="slider_bg_image" name="slider_bg_image" required>
                    </div>
                    <div class="form-group">
                        <label for="slider_bg_image_dark">Slider Background Image Dark URL</label>
                        <input type="text" class="form-control" id="slider_bg_image_dark" name="slider_bg_image_dark">
                    </div>
                    <div class="form-group">
                        <label for="slider_text">Slider Text</label>
                        <textarea class="form-control" id="slider_text" name="slider_text" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="slider_button_text">Slider Button Text</label>
                        <input type="text" class="form-control" id="slider_button_text" name="slider_button_text">
                    </div>
                    <div class="form-group">
                        <label for="slider_button_link">Slider Button Link</label>
                        <input type="text" class="form-control" id="slider_button_link" name="slider_button_link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add_slider">Add Slider</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editSliderModal" tabindex="-1" role="dialog" aria-labelledby="editSliderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSliderModalLabel">Edit Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editSliderForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?page=Content#sliders'; ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" id="edit_slider_id" name="slider_id">
                    <div class="form-group">
                        <label for="edit_slider_name">Slider Name</label>
                        <input type="text" class="form-control" id="edit_slider_name" name="slider_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_slider_bg_image">Slider Background Image URL</label>
                        <input type="text" class="form-control" id="edit_slider_bg_image" name="slider_bg_image" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_slider_bg_image_dark">Slider Background Image Dark URL</label>
                        <input type="text" class="form-control" id="edit_slider_bg_image_dark" name="slider_bg_image_dark">
                    </div>
                    <div class="form-group">
                        <label for="edit_slider_text">Slider Text</label>
                        <textarea class="form-control" id="edit_slider_text" name="slider_text" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_slider_button_text">Slider Button Text</label>
                        <input type="text" class="form-control" id="edit_slider_button_text" name="slider_button_text">
                    </div>
                    <div class="form-group">
                        <label for="edit_slider_button_link">Slider Button Link</label>
                        <input type="text" class="form-control" id="edit_slider_button_link" name="slider_button_link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="update_slider">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_slider"])) {
    $slider_name = $_POST['slider_name'];
    $slider_bg_image = $_POST['slider_bg_image'];
    $slider_bg_image_dark = $_POST['slider_bg_image_dark'];
    $slider_text = $_POST['slider_text'];
    $slider_button_text = $_POST['slider_button_text'];
    $slider_button_link = $_POST['slider_button_link'];
    $sql = "INSERT INTO sliders (slider_name, slider_bg_image, slider_bg_image_dark, slider_text, slider_button_text, slider_button_link) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $slider_name, $slider_bg_image, $slider_bg_image_dark, $slider_text, $slider_button_text, $slider_button_link);
    if ($stmt->execute()) {
        echo '<script>alert("Slider added successfully!"); window.location.href = "index.php?page=Content#sliders";</script>';
    } else {
        echo "Error: " . $conn->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_slider"])) {
    $slider_id = $_POST['slider_id'];
    $slider_name = $_POST['slider_name'];
    $slider_bg_image = $_POST['slider_bg_image'];
    $slider_bg_image_dark = $_POST['slider_bg_image_dark'];
    $slider_text = $_POST['slider_text'];
    $slider_button_text = $_POST['slider_button_text'];
    $slider_button_link = $_POST['slider_button_link'];
    $sql = "UPDATE sliders SET slider_name=?, slider_bg_image=?, slider_bg_image_dark=?, slider_text=?, slider_button_text=?, slider_button_link=? WHERE slider_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $slider_name, $slider_bg_image, $slider_bg_image_dark, $slider_text, $slider_button_text, $slider_button_link, $slider_id);
    if ($stmt->execute()) {
        echo '<script>alert("Slider updated successfully!"); window.location.href = "index.php?page=Content#sliders";</script>';
    } else {
        echo "Error: " . $conn->error;
    }
}
if (isset($_GET['delete_slider'])) {
    $slider_id = $_GET['delete_slider'];
    $sql = "DELETE FROM sliders WHERE slider_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $slider_id);
    if ($stmt->execute()) {
        echo '<script>alert("Slider deleted successfully!"); window.location.href = "index.php?page=Content#sliders";</script>';
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_image"])) {
                    $image_url = $_POST['image_url'];
                    $sql = "INSERT INTO gallery (image_url) VALUES (?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $image_url);
                    if ($stmt->execute()) {
                        echo "<script>alert('Image added successfully!'); window.location.href='index.php?page=Content#gallery';</script>";
                    } else {
                        echo "Error: " . $conn->error;
                    }
                }
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_image"])) {
                    $id = $_POST['id'];
                    $image_url = $_POST['image_url'];
                    $sql = "UPDATE gallery SET image_url=? WHERE id=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("si", $image_url, $id);
                    if ($stmt->execute()) {
                        echo "<script>alert('Image updated successfully!'); window.location.href='index.php?page=Content#gallery';</script>";
                    } else {
                        echo "Error: " . $conn->error;
                    }
                }
                if (isset($_GET['delete_image'])) {
                    $id = $_GET['delete_image'];
                    $sql = "DELETE FROM gallery WHERE id=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $id);
                    if ($stmt->execute()) {
                        echo "<script>alert('Image deleted successfully!'); window.location.href='index.php?page=Content#gallery';</script>";
                    } else {
                        echo "Error: " . $conn->error;
                    }
                }
                $sql = "SELECT * FROM gallery";
                $result = $conn->query($sql);
                ?>
                <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                    <p class="text-center">Content for gallery</p>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_1" class="tabcontent story-area">
                                                    <div class="story-container-1">
                                                        <div class="single-create-story">
                                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?page=Content'; ?>" method="post">
                                                                <div class="form-group">
                                                                    <label for="image_url">Image URL</label>
                                                                    <input type="text" class="form-control" id="image_url" name="image_url" required>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary" name="add_image"><i class="fa fa-plus"></i></button>
                                                            </form>
                                                        </div>
                                                        <?php
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                                <div class="single-story" style="position: relative;">
                                                                    <img src="/MSPORT/<?php echo htmlspecialchars($row['image_url']); ?>" class="single-story-bg">
                                                                    <div class="story-actions" style="position: absolute; top: 5px; right: 5px;">
                                                                        <a href="#" data-toggle="modal" data-target="#editImageModal<?php echo $row['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                                                        <a href="Content.php?page=&delete_image=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="editImageModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editImageModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?page=Content'; ?>" method="post">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="editImageModalLabel<?php echo $row['id']; ?>">Edit Image</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                                    <div class="form-group">
                                                                                        <label for="image_url<?php echo $row['id']; ?>">Image URL</label>
                                                                                        <input type="text" class="form-control" id="image_url<?php echo $row['id']; ?>" name="image_url" value="<?php echo htmlspecialchars($row['image_url']); ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary" name="update_image">Save changes</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo "<p>No images found.</p>";
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .widget {
                        padding: 0;
                        margin-top: 0;
                        margin-bottom: 0;
                        border-radius: 6px;
                        -webkit-box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
                        -moz-box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.08), 0 1px 20px 0 rgba(0, 0, 0, 0.07), 0px 1px 11px 0px rgba(0, 0, 0, 0.07);
                        box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
                    }
                    .widget.box .widget-header {
                        background: #fff;
                        padding: 0px 8px 0px;
                        border-top-right-radius: 6px;
                        border-top-left-radius: 6px;
                    }
                    .widget .widget-header {
                        border-bottom: 0px solid #f1f2f3;
                    }
                    .widget.box .widget-header {
                        background: #fff;
                        padding: 0px 8px 0px;
                        border-top-right-radius: 6px;
                        border-top-left-radius: 6px;
                    }
                    .widget .widget-header {
                        border-bottom: 0px solid #f1f2f3;
                    }
                    .widget .widget-header:after {
                        clear: both;
                    }
                    .widget .widget-header:before,
                    .widget .widget-header:after {
                        display: table;
                        content: "";
                        line-height: 0;
                    }
                    .widget-content-area {
                        padding: 20px;
                        position: relative;
                        background-color: #fff;
                        border-bottom-left-radius: 6px;
                        border-bottom-right-radius: 6px;
                    }
                    .story-container-1 {
                        display: flex;
                        align-items: center;
                        justify-content: flex-start;
                    }
                    .story-container-1 .single-create-story {
                        height: 175px;
                        width: 110px;
                        border-radius: 10px;
                        overflow: hidden;
                        position: relative;
                        margin-right: 10px;
                        margin-bottom: 10px;
                        background: #e4e4e4;
                        text-align: center;
                    }
                    img.single-create-story-bg {
                        width: 100%;
                        height: 120px;
                        object-fit: cover;
                    }
                    .create-story-author img {
                        height: 40px;
                        width: 40px;
                        margin-top: -20px;
                        padding: 4px;
                        background: #e4e4e4;
                        border-radius: 50%;
                    }
                    .story-container-1 .single-story {
                        height: 175px;
                        width: 110px;
                        border-radius: 10px;
                        overflow: hidden;
                        position: relative;
                        margin-right: 10px;
                        margin-bottom: 10px;
                    }
                    .story-container-1 .single-story::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        bottom: 0;
                        right: 0;
                        left: 0;
                        background-image: linear-gradient(rgb(255 0 0 / 0%), black);
                    }
                    img.single-story-bg {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }
                    .story-container-1 .story-author {
                        position: absolute;
                        top: 50%;
                        left: 0px;
                        transform: translateY(-50%);
                        right: 0px;
                        text-align: center;
                        z-index: 99;
                        cursor: pointer;
                    }
                    .story-author img {
                        height: 60px;
                        width: 60px;
                        border-radius: 50%;
                        border: 1px solid white;
                        padding: 4px;
                    }
                    .story-container-1 .story-author p {
                        color: #fff;
                        width: 100%;
                        margin: 5px 0px 0px 0px;
                        font-weight: 600;
                        font-size: 12px;
                    }
                    .create-story-author p {
                        margin: 0px;
                        font-size: 13px;
                        font-weight: 500;
                    }
                </style>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save_changes1"])) {
                    $banner_id = $_POST['banner_id'];
                    $image_src = $_POST['image_src'];
                    $link = $_POST['link'];
                    $sql = "UPDATE banners SET image_src=?, link=? WHERE banner_id=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssi", $image_src, $link, $banner_id);
                    if ($stmt->execute()) {
                        echo "<script>
            alert('Banner updated successfully!');
            window.location.href='index.php?page=Content#banners';
        </script>";
                    } else {
                        echo "Error: " . $conn->error;
                    }
                }
                $sql = "SELECT * FROM banners";
                $result = $conn->query($sql);
                ?>
                <div class="tab-pane fade" id="banners" role="tabpanel" aria-labelledby="banners-tab">
                    <div class="container">
                        <div class="row">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <div class="col-md-6 text-center mb-4">
                                        <a href="#" data-toggle="modal" data-target="#editBannerModal<?php echo $row['banner_id']; ?>">
                                            <img src="/MSPORT/<?php echo htmlspecialchars($row['image_src']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($row['alt_text']); ?>">
                                        </a>
                                        <p><?php echo $row['alt_text']; ?></p>
                                    </div>
                                    <div class="modal fade" id="editBannerModal<?php echo $row['banner_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editBannerModalLabel<?php echo $row['banner_id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?page=Content'; ?>" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editBannerModalLabel<?php echo $row['banner_id']; ?>">Edit Banner</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="banner_id" value="<?php echo $row['banner_id']; ?>">
                                                        <div class="form-group">
                                                            <label for="image_src<?php echo $row['banner_id']; ?>">Image URL</label>
                                                            <input type="text" class="form-control" id="image_src<?php echo $row['banner_id']; ?>" name="image_src" value="<?php echo htmlspecialchars($row['image_src']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="link<?php echo $row['banner_id']; ?>">Link</label>
                                                            <input type="text" class="form-control" id="link<?php echo $row['banner_id']; ?>" name="link" value="<?php echo htmlspecialchars($row['link']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="save_changes1">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "<p>No banners found.</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    </script>
</body>
</html>