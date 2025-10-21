<?php
session_start();
include("db_connection.php");
include("header.php");
include("nav.php");
if (isset($_GET['blog_id'])) {
    $blog_id = $_GET['blog_id'];
    $sql = "SELECT * FROM blog WHERE blog_id = $blog_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <section id="blog-single" class="blog blog-single pt-100">
            <div class="container">
                <div class="row page-title">
                    <div class="col-sm-12 col-sm-6 col-lg-7">
                        <div class="title title-2 pt-0">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Blog & News</li>
                            </ol>
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1><?php echo $row['name_blog']; ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-5">
                        <div class="title--meta entry--meta pt-30">
                            <span class="meta--time"><?php echo date('F j, Y, g:i a', strtotime($row['date_posted'])); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-lg-12 mb-70">
                        <div class="entry--img bg-parallax">
                            <div class="bg-section">
                                <img src="<?php echo strpos($row['photo_blog'], 'http') === 0 ? $row['photo_blog'] : 'admin/' . $row['photo_blog']; ?>" alt="entry image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="sidebar">
                            <div class="widget widget-search">
                                <div class="widget--content">
                                    <form class="form-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search anything">
                                            <span class="input-group-btn">
                                                <button class="btn" type="button"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="widget widget-recent-posts">
                                <div class="widget--title">
                                    <h3>Recent Posts</h3>
                                </div>
                                <div class="widget--content">
                                    <?php
                                    $sql_recent = "SELECT * FROM blog ORDER BY date_posted DESC LIMIT 5";
                                    $result_recent = $conn->query($sql_recent);
                                    if ($result_recent && $result_recent->num_rows > 0) {
                                        while ($recent_row = $result_recent->fetch_assoc()) {
                                    ?>
                                            <div class="entry">
                                                <a href="http://localhost/msport/blog.php?blog_id=<?php echo $recent_row['blog_id']; ?>">
                                                    <img src="<?php echo strpos($recent_row['photo_blog'], 'http') === 0 ? $recent_row['photo_blog'] : 'admin/' . $recent_row['photo_blog']; ?>" alt="<?php echo $recent_row['name_blog']; ?>" style="object-fit: cover;" />
                                                </a>
                                                <div class="entry-desc">
                                                    <div class="entry-title">
                                                        <a href="http://localhost/msport/blog.php?blog_id=<?php echo $recent_row['blog_id']; ?>"><?php echo $recent_row['name_blog']; ?></a>
                                                    </div>
                                                    <div class="entry-meta">
                                                        <a href="#"><?php echo date('M d, Y', strtotime($recent_row['date_posted'])); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    } else {
                                        echo "No recent posts found.";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="widget widget-share mb-40">
                                <span class="share--title">share : </span>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="blog-entry">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="entry--bio">
                                        <?php echo $row['content']; ?>
                                    </div>
                                    <div class="entry-widget entry-comments clearfix">
                                        <div class="entry-widget-title">
                                            <?php
                                            $count_review_sql = "SELECT COUNT(*) AS num_reviews FROM blogreviews WHERE blog_id = $blog_id";
                                            $count_review_result = mysqli_query($conn, $count_review_sql);
                                            $num_reviews = mysqli_fetch_assoc($count_review_result)['num_reviews'];
                                            echo "<h4>Comments <span>($num_reviews)</span></h4>";
                                            ?>
                                        </div>
                                        <div class="entry-widget-content">
                                            <ul class="comments-list">
                                                <?php
                                                $review_sql = "SELECT * FROM blogreviews WHERE blog_id = $blog_id";
                                                $review_result = mysqli_query($conn, $review_sql);
                                                if (mysqli_num_rows($review_result) > 0) {
                                                    while ($review_row = mysqli_fetch_assoc($review_result)) {
                                                        $customer_id = $review_row['customer_id'];
                                                        $customer_sql = "SELECT * FROM customers WHERE customer_id = $customer_id";
                                                        $customer_result = mysqli_query($conn, $customer_sql);
                                                        $customer_row = mysqli_fetch_assoc($customer_result);
                                                ?>
                                                        <li class="comment-body">
                                                            <div class="comment">
                                                                <h6><?php echo $customer_row['customer_name']; ?></h6>
                                                                <div class="date"><?php echo $review_row['date_posted']; ?></div>
                                                                <p><?php echo $review_row['review_content']; ?></p>
                                                            </div>
                                                        </li>
                                                <?php
                                                    }
                                                } else {
                                                    echo "<li>No reviews found for this blog post.</li>";
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_SESSION['customer_email'])) {
                                        $user_email = $_SESSION['customer_email'];
                                        $check_comment_sql = "SELECT * FROM blogreviews WHERE blog_id = $blog_id AND customer_id IN (SELECT customer_id FROM customers WHERE customer_email = '$user_email')";
                                        $check_comment_result = mysqli_query($conn, $check_comment_sql);
                                        $existing_comment = mysqli_fetch_assoc($check_comment_result);
                                    ?>
                                        <div class="entry-widget entry-add-comment mb-0 clearfix">
                                            <div class="entry-widget-title">
                                                <h4>Leave A COMMENT</h4>
                                            </div>
                                            <div class="entry-widget-content">
                                                <form id="post-comment" class="comments-form mb-0" method="POST" action="comment_bloc.php">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <textarea class="form-control" id="comment" name="comment" rows="2" placeholder="Your message"><?php echo isset($existing_comment['review_content']) ? $existing_comment['review_content'] : ''; ?></textarea>
                                                            <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>">
                                                            <?php if (isset($existing_comment['review_id'])) { ?>
                                                                <input type="hidden" name="review_id" value="<?php echo $existing_comment['review_id']; ?>">
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <button type="submit" class="btn btn--primary btn--rounded">Submit <i class="lnr lnr-arrow-right"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                        echo "Please log in to leave a comment.";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    } else {
        echo "Blog post not found!";
    }
} else {
    echo "No blog ID specified!";
}
?>
<?php
include("footer.php");
?>