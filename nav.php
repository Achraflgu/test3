<div class="preloader">
    <div class="loader-eclipse">
        <div class="loader-content"></div>
    </div>
</div> <!-- Document Wrapper
	============================================= -->
<div id="wrapperParallax" class="wrapper clearfix">
    <header id="navbar-spy1" class="header header-1 header-light d-none d-xl-block">
        <nav id="primary-menu1" class="navbar navbar-expand-xl navbar-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img class="logo" src="assets/images/logo/logo-dark.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="has-dropdown mega-dropdown <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="has-dropdown mega-dropdown <?php echo in_array(basename($_SERVER['PHP_SELF']), ['shop.php', 'product.php']) ? 'active' : ''; ?>">
                            <a href="shop.php" class="dropdown-toggle menu-item">Shop</a>
                            <ul class="dropdown-menu mega-dropdown-menu collections-menu">
                                <div class="container">
                                    <div class="row">
                                        <?php
                                        $category_sql = "SELECT * FROM productcategories WHERE pcategory_status = 1";
                                        $category_result = mysqli_query($conn, $category_sql);
                                        if (mysqli_num_rows($category_result) > 0) {
                                            while ($category_row = mysqli_fetch_assoc($category_result)) {
                                                $pcategory_id = $category_row['pcategory_id'];
                                                $pcategory_name = $category_row['pcategory_name'];
                                                $pcategory_photo = $category_row['pcategory_photo'];
                                        ?>
                                                <div class="col-md-12 col-lg-5ths">
                                                    <a href="shop.php?category=<?php echo $pcategory_id; ?>">
                                                        <li>
                                                            <div class="collection--menu-content">
                                                                <h5><?php echo $pcategory_name; ?></h5>
                                                                <ul>
                                                                    <?php
                                                                    $subcategory_sql = "SELECT DISTINCT SUBSTRING_INDEX(SUBSTRING_INDEX(REPLACE(REPLACE(product_keywords, '[', ''), ']', ''), ',', n.digit+1), ',', -1) AS subcategory
                                            FROM products
                                            INNER JOIN (
                                            SELECT 0 AS digit UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4) AS n
                                            WHERE pcategory_id = $pcategory_id AND product_keywords LIKE '%f-%'";
                                                                    $subcategory_result = mysqli_query($conn, $subcategory_sql);
                                                                    while ($subcategory_row = mysqli_fetch_assoc($subcategory_result)) {
                                                                        $subcategory_name = trim($subcategory_row['subcategory'], '"');
                                                                        if (strpos($subcategory_name, 'f-') === 0) {
                                                                            $subcategory_name = substr($subcategory_name, 2);
                                                                    ?>
                                                                            <li>
                                                                                <a href="shop.php?subcategory=<?php echo $subcategory_name; ?>&category=<?php echo $pcategory_id; ?>">
                                                                                    <?php echo $subcategory_name; ?>
                                                                                </a>
                                                                            </li>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                            <div class="menu--img">
                                                                <img src="admin/<?php echo $pcategory_photo; ?>" alt="<?php echo $pcategory_name; ?>" class="img-fluid">
                                                            </div>

                                                        </li>
                                                    </a>
                                                </div>
                                        <?php
                                            }
                                        } else {
                                            echo '<li>No categories found</li>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li class="has-dropdown mega-dropdown <?php echo basename($_SERVER['PHP_SELF']) == 'service.php' ? 'active' : ''; ?>">
                            <a href="http://localhost/msport/service.php" class="link-hover">Service</a>
                        </li>
                        <li class="has-dropdown mega-dropdown <?php echo in_array(basename($_SERVER['PHP_SELF']), ['blog.php', 'blog_list.php']) ? 'active' : ''; ?>">
                            <a href="http://localhost/msport/blog_list.php" class="link-hover">Blog</a>
                        </li>
                        <li class="has-dropdown mega-dropdown <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">
                            <a href="http://localhost/msport/contact.php" class="menu-item">Contact</a>
                        </li>
                        <li class="has-dropdown mega-dropdown <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">
                            <a href="http://localhost/msport/about.php" class="link-hover">About Us</a>
                        </li>
                    </ul>
                    <div class="module-container">
                        <div class="module module-search pull-left">
                            <div class="module-icon search-icon">
                                <i class="lnr lnr-magnifier"></i>
                                <span class="title">Search</span>
                            </div>
                            <div class="module-content module--search-box">
                                <form class="form-search" action="shop.php" method="GET">
                                    <input type="text" class="form-control" name="query" placeholder="Search anything">
                                    <button type="submit"><span class="fa fa-arrow-right"></span></button>
                                </form>
                            </div>
                        </div>
                        <div class="vertical-divider pull-left mr-30"></div>
                        <div class="module module-lang pull-left">
                            <div class="module-icon">
                                <div class="theme-switch">
                                    <input type="checkbox" id="theme-checkbox" class="toggle-checkbox" />
                                    <label for="theme-checkbox">
                                        <div class="toggle-handle"></div>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 moon-icon">
                                                <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 sun-icon">
                                                <path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"></path>
                                            </svg>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="module module-dropdown module-currency module-dropdown-right pull-left">
                            <div class="module-icon  dropdown">
                                <?php if (!isset($_SESSION['customer_email'])) : ?>
                                    <style>
                                        /* Styling for the login link */
                                        .login-link {
                                            text-decoration: none;
                                            padding: 8px 16px;
                                            /* border: 2px solid #4CAF50;
                                            border-radius: 5px;
                                            background-color: #4CAF50;*/
                                            font-weight: bold;
                                            transition: all 0.3s ease;
                                        }

                                        /* Styling for the icon */
                                        .login-icon {
                                            margin-right: 8px;
                                        }
                                    </style>
                                    <a href="login.php" class="login-link">
                                        <i class="fa fa-user login-icon"></i> Log In
                                    </a>
                                <?php else : ?>
                                    <?php
                                    $customer_email = $_SESSION['customer_email'];
                                    $sql = "SELECT customers_photo FROM customers WHERE customer_email = '$customer_email'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $customers_photo = $row['customers_photo'];
                                    ?>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button" id="myAccountDropdown" data-toggle="dropdown">
                                            <img src="admin/<?php echo $customers_photo; ?>" alt="Customer Photo" class="customer-photo mb-2" style="border-radius: 50%; width: 40px; height: 40px; object-fit: cover; border: 2px solid #ffffff;">
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        <div class="module-dropdown-menu module-content" aria-labelledby="myAccountDropdown">
    <a class="dropdown-item" href="Settings.php"><i class="lnr lnr-cog"></i> Settings</a>
    <a class="dropdown-item" href="wishlist.php"><i class="lnr lnr-heart"></i> Wishlist</a>
    <a class="dropdown-item" href="logout.php"><i class="lnr lnr-exit"></i> Logout</a>
  </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="module module-cart pull-left">
                            <div class="module-icon cart-icon">
                                <i class="icon-bag"></i>
                                <span class="title">shop cart</span>
                                <label class="module-label">0</label>
                            </div>
                            <div class="module-content module-box cart-box">
                                <div class="cart-overview">
                                    <ul class="list-unstyled">
                                    </ul>
                                </div>
                                <div class="cart-total">
                                    <div class="total-desc">
                                        Sub total
                                    </div>
                                    <div class="total-price">
                                        $0.00
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="cart--control">
                                    <a class="btn btn--white btn--bordered btn--rounded" href="cart.php">view cart </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <header id="navbar-spy" class="header header-1 header-transparent d-block d-xl-none">
        <nav id="primary-menu" class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img class="logo" src="assets/images/logo/logo-dark.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="has-dropdown mega-dropdown <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="has-dropdown mega-dropdown <?php echo in_array(basename($_SERVER['PHP_SELF']), ['shop.php', 'product.php']) ? 'active' : ''; ?>">
                            <a href="shop.php" class="dropdown-toggle menu-item">Shop</a>
                            <ul class="dropdown-menu mega-dropdown-menu collections-menu">
                                <div class="container">
                                    <div class="row">
                                        <?php
                                        $category_sql = "SELECT * FROM productcategories WHERE pcategory_status = 1";
                                        $category_result = mysqli_query($conn, $category_sql);
                                        if (mysqli_num_rows($category_result) > 0) {
                                            while ($category_row = mysqli_fetch_assoc($category_result)) {
                                                $pcategory_id = $category_row['pcategory_id'];
                                                $pcategory_name = $category_row['pcategory_name'];
                                                $pcategory_photo = $category_row['pcategory_photo'];
                                        ?>
                                                <div class="col-md-12 col-lg-5ths">
                                                    <a href="shop.php?category=<?php echo $pcategory_id; ?>">
                                                        <li>
                                                            <div class="collection--menu-content">
                                                                <h5><?php echo $pcategory_name; ?></h5>
                                                                <ul>
                                                                    <?php
                                                                    $subcategory_sql = "SELECT DISTINCT SUBSTRING_INDEX(SUBSTRING_INDEX(REPLACE(REPLACE(product_keywords, '[', ''), ']', ''), ',', n.digit+1), ',', -1) AS subcategory
                                            FROM products
                                            INNER JOIN (
                                            SELECT 0 AS digit UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4) AS n
                                            WHERE pcategory_id = $pcategory_id AND product_keywords LIKE '%f-%'";
                                                                    $subcategory_result = mysqli_query($conn, $subcategory_sql);
                                                                    while ($subcategory_row = mysqli_fetch_assoc($subcategory_result)) {
                                                                        $subcategory_name = trim($subcategory_row['subcategory'], '"');
                                                                        if (strpos($subcategory_name, 'f-') === 0) {
                                                                            $subcategory_name = substr($subcategory_name, 2);
                                                                    ?>
                                                                            <li>
                                                                                <a href="shop.php?subcategory=<?php echo $subcategory_name; ?>&category=<?php echo $pcategory_id; ?>">
                                                                                    <?php echo $subcategory_name; ?>
                                                                                </a>
                                                                            </li>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                            <div class="menu--img">
                                                                <img src="admin/<?php echo $pcategory_photo; ?>" alt="<?php echo $pcategory_name; ?>" class="img-fluid" style=" object-fit: cover;">
                                                            </div>
                                                        </li>
                                                    </a>
                                                </div>
                                        <?php
                                            }
                                        } else {
                                            echo '<li>No categories found</li>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li class="has-dropdown mega-dropdown <?php echo basename($_SERVER['PHP_SELF']) == 'service.php' ? 'active' : ''; ?>">
                            <a href="http://localhost/msport/service.php" class="link-hover">Service</a>
                        </li>
                        <li class="has-dropdown mega-dropdown <?php echo in_array(basename($_SERVER['PHP_SELF']), ['blog.php', 'blog_list.php']) ? 'active' : ''; ?>">
                            <a href="http://localhost/msport/blog_list.php" class="link-hover">Blog</a>
                        </li>
                        <li class="has-dropdown mega-dropdown <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">
                            <a href="http://localhost/msport/contact.php" class="menu-item">Contact</a>
                        </li>
                        <li class="has-dropdown mega-dropdown <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">
                            <a href="http://localhost/msport/about.php" class="link-hover">About Us</a>
                        </li>
                    </ul>
                    <div class="module-container">
                        <div class="module module-search pull-left">
                            <div class="module-icon search-icon">
                                <i class="lnr lnr-magnifier"></i>
                                <span class="title">Search</span>
                            </div>
                            <div class="module-content module--search-box">
                                <form class="form-search" action="shop.php" method="GET">
                                    <input type="text" class="form-control" name="query" placeholder="Search anything">
                                    <button type="submit"><span class="fa fa-arrow-right"></span></button>
                                </form>
                            </div>
                        </div>
                        <div class="vertical-divider pull-left mr-30"></div>
                        <div class="module module-lang pull-left">
                            <div class="module-icon">
                                <div class="theme-switch">
                                    <input type="checkbox" id="theme-checkbox" class="toggle-checkbox" />
                                    <label for="theme-checkbox">
                                        <div class="toggle-handle"></div>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 moon-icon">
                                                <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 sun-icon">
                                                <path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"></path>
                                            </svg>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="module module-dropdown module-currency module-dropdown-right pull-left">
                            <div class="module-icon  dropdown">
                                <?php if (!isset($_SESSION['customer_email'])) : ?>
                                    <style>
                                        /* Styling for the login link */
                                        .login-link {
                                            text-decoration: none;
                                            padding: 8px 16px;
                                            /* border: 2px solid #4CAF50;
                                            border-radius: 5px;
                                            background-color: #4CAF50;*/
                                            font-weight: bold;
                                            transition: all 0.3s ease;
                                        }

                                        /* Styling for the icon */
                                        .login-icon {
                                            margin-right: 8px;
                                        }
                                    </style>
                                    <a href="login.php" class="login-link">
                                        <i class="fa fa-user login-icon"></i> LOGIN
                                    </a>
                                <?php else : ?>
                                    <?php
                                    $customer_email = $_SESSION['customer_email'];
                                    $sql = "SELECT customers_photo FROM customers WHERE customer_email = '$customer_email'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $customers_photo = $row['customers_photo'];
                                    ?>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button" id="myAccountDropdown" data-toggle="dropdown">
                                            <img src="admin/<?php echo $customers_photo; ?>" alt="Customer Photo" class="customer-photo mb-2" style="border-radius: 50%; width: 40px; height: 40px; object-fit: cover; border: 2px solid #ffffff;">
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        <div class="module-dropdown-menu module-content" aria-labelledby="myAccountDropdown">
                                            <a class="dropdown-item" href="Settings.php">Settings</a>
                                            <a class="dropdown-item" href="wishlist.php">Wishlist</a>
                                            <a class="dropdown-item" href="logout.php">Logout</a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="module module-cart pull-left">
                            <div class="module-icon cart-icon">
                                <i class="icon-bag"></i>
                                <span class="title">shop cart</span>
                                <label class="module-label">0</label>
                            </div>
                            <div class="module-content module-box cart-box">
                                <div class="cart-overview">
                                    <ul class="list-unstyled">
                                    </ul>
                                </div>
                                <div class="cart-total">
                                    <div class="total-desc">
                                        Sub total
                                    </div>
                                    <div class="total-price">
                                        $0.00
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="cart--control">
                                    <a class="btn btn--white btn--bordered btn--rounded" href="cart.php">view cart </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>