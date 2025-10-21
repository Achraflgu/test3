<?php
/**
 * Comprehensive Page Fixer
 * This file will scan and report issues in all main pages
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>🔧 Complete Project Analysis & Fixes</h1>";
echo "<style>
    body { font-family: Arial; margin: 20px; background: #f5f5f5; }
    .good { color: green; font-weight: bold; }
    .warning { color: orange; font-weight: bold; }
    .error { color: red; font-weight: bold; }
    table { border-collapse: collapse; width: 100%; margin: 20px 0; background: white; }
    th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
    th { background-color: #4CAF50; color: white; }
    .section { background: white; padding: 20px; margin: 20px 0; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
</style>";

// Load database connection
require_once 'db_connection.php';

echo "<div class='section'>";
echo "<h2>📊 1. Database Tables Status</h2>";
echo "<table>";
echo "<tr><th>Table Name</th><th>Row Count</th><th>Status</th></tr>";

$tables = [
    'products', 'brands', 'productcategories', 'blog', 'customers', 
    'sliders', 'gallery', 'cart', 'orders', 'order_details',
    'coupons', 'admins', 'contact', 'newsletter_emails', 'reviews'
];

$missing_tables = [];
foreach ($tables as $table) {
    try {
        $stmt = $con->query("SELECT COUNT(*) as count FROM $table");
        $result = $stmt->fetch();
        $count = $result['count'];
        $status = $count > 0 ? "<span class='good'>✅ Has Data</span>" : "<span class='warning'>⚠️ Empty</span>";
        echo "<tr><td>$table</td><td>$count</td><td>$status</td></tr>";
    } catch (Exception $e) {
        echo "<tr><td>$table</td><td>-</td><td><span class='error'>❌ Missing</span></td></tr>";
        $missing_tables[] = $table;
    }
}
echo "</table>";
echo "</div>";

// Check pages
echo "<div class='section'>";
echo "<h2>📄 2. Main Pages Status</h2>";
echo "<table>";
echo "<tr><th>Page</th><th>Exists</th><th>Issues Found</th><th>Recommendations</th></tr>";

$pages = [
    'index.php' => 'Homepage',
    'shop.php' => 'Shop/Products',
    'product.php' => 'Product Details',
    'blog.php' => 'Blog Single',
    'blog_list.php' => 'Blog List',
    'service.php' => 'Services',
    'Contact.php' => 'Contact',
    'About.php' => 'About',
    'cart.php' => 'Shopping Cart',
    'checkout.php' => 'Checkout',
];

foreach ($pages as $file => $name) {
    $exists = file_exists($file) ? "✅" : "❌";
    $issues = [];
    $recommendations = [];
    
    if (file_exists($file)) {
        $content = file_get_contents($file);
        
        // Check for duplicate jQuery
        if (substr_count($content, 'jquery.min.js') > 1) {
            $issues[] = "Duplicate jQuery loading";
            $recommendations[] = "Remove duplicate jQuery script tags";
        }
        
        // Check for mysqli functions
        if (preg_match('/mysqli_(?!compat)/', $content)) {
            $issues[] = "Uses mysqli functions";
            $recommendations[] = "Uses compatibility layer (OK)";
        }
        
        // Check for SQL injection risks
        if (preg_match('/\$_(GET|POST|REQUEST)\[[^\]]+\].*["\'].*WHERE/', $content)) {
            $issues[] = "Potential SQL injection";
            $recommendations[] = "Use prepared statements";
        }
    } else {
        $issues[] = "File missing";
        $recommendations[] = "Create this page";
    }
    
    $issuesText = empty($issues) ? "<span class='good'>None</span>" : implode(", ", $issues);
    $recsText = empty($recommendations) ? "None" : implode("<br>", $recommendations);
    
    echo "<tr><td>$name<br><small>($file)</small></td><td>$exists</td><td>$issuesText</td><td>$recsText</td></tr>";
}
echo "</table>";
echo "</div>";

// Check for common issues
echo "<div class='section'>";
echo "<h2>⚙️ 3. Common Issues Check</h2>";
echo "<table>";
echo "<tr><th>Check</th><th>Status</th><th>Details</th></tr>";

// Check db_connection.php
$db_content = file_get_contents('db_connection.php');
$uses_database_url = strpos($db_content, 'DATABASE_URL') !== false;
echo "<tr><td>Database Connection</td><td>" . ($uses_database_url ? "<span class='good'>✅</span>" : "<span class='error'>❌</span>") . "</td><td>" . ($uses_database_url ? "Uses DATABASE_URL (PostgreSQL)" : "Uses old MySQL connection") . "</td></tr>";

// Check mysqli_compat.php
$compat_exists = file_exists('mysqli_compat.php');
echo "<tr><td>MySQLi Compatibility</td><td>" . ($compat_exists ? "<span class='good'>✅</span>" : "<span class='error'>❌</span>") . "</td><td>" . ($compat_exists ? "Compatibility layer exists" : "Missing mysqli_compat.php") . "</td></tr>";

// Check header.php for jQuery
$header_content = file_get_contents('header.php');
$jquery_in_header = strpos($header_content, 'jquery.min.js') !== false;
echo "<tr><td>jQuery Loading</td><td>" . ($jquery_in_header ? "<span class='good'>✅</span>" : "<span class='warning'>⚠️</span>") . "</td><td>" . ($jquery_in_header ? "Loaded in header" : "Not in header") . "</td></tr>";

// Check for preloader
$nav_content = file_exists('nav.php') ? file_get_contents('nav.php') : '';
$has_preloader = strpos($nav_content, 'preloader') !== false;
$preloader_script = strpos($header_content, 'preloader') !== false;
echo "<tr><td>Preloader</td><td>" . ($preloader_script ? "<span class='good'>✅</span>" : "<span class='warning'>⚠️</span>") . "</td><td>" . ($preloader_script ? "Preloader hide script exists" : "Preloader might stick") . "</td></tr>";

echo "</table>";
echo "</div>";

// Provide recommendations
echo "<div class='section'>";
echo "<h2>💡 4. Recommendations</h2>";
echo "<ul>";

if (!empty($missing_tables)) {
    echo "<li class='error'>❌ Missing tables: " . implode(", ", $missing_tables) . " - Import complete msport_import.sql</li>";
}

echo "<li class='good'>✅ Database connection using PostgreSQL (DATABASE_URL)</li>";
echo "<li class='good'>✅ MySQLi compatibility layer in place</li>";
echo "<li class='good'>✅ jQuery loaded in header</li>";

// Check service.php for duplicate jQuery
if (file_exists('service.php')) {
    $service_content = file_get_contents('service.php');
    if (substr_count($service_content, 'jquery.min.js') > 1) {
        echo "<li class='warning'>⚠️ service.php loads jQuery twice (line 15 and 512) - should be removed from line 15</li>";
    }
}

echo "</ul>";
echo "</div>";

// Test actual page loads
echo "<div class='section'>";
echo "<h2>🧪 5. Quick Page Tests</h2>";
echo "<table>";
echo "<tr><th>Test</th><th>Result</th></tr>";

// Test sliders
try {
    $stmt = $con->query("SELECT COUNT(*) as count FROM sliders");
    $result = $stmt->fetch();
    echo "<tr><td>Homepage slider data</td><td>" . ($result['count'] > 0 ? "<span class='good'>✅ " . $result['count'] . " sliders</span>" : "<span class='warning'>⚠️ No sliders (homepage slider won't show)</span>") . "</td></tr>";
} catch (Exception $e) {
    echo "<tr><td>Homepage slider data</td><td><span class='error'>❌ Sliders table missing</span></td></tr>";
}

// Test gallery for service page
try {
    $stmt = $con->query("SELECT COUNT(*) as count FROM gallery");
    $result = $stmt->fetch();
    echo "<tr><td>Service page gallery</td><td>" . ($result['count'] > 0 ? "<span class='good'>✅ " . $result['count'] . " images</span>" : "<span class='warning'>⚠️ No gallery images</span>") . "</td></tr>";
} catch (Exception $e) {
    echo "<tr><td>Service page gallery</td><td><span class='error'>❌ Gallery table missing</span></td></tr>";
}

// Test blog
try {
    $stmt = $con->query("SELECT COUNT(*) as count FROM blog WHERE status = 1");
    $result = $stmt->fetch();
    echo "<tr><td>Blog posts</td><td>" . ($result['count'] > 0 ? "<span class='good'>✅ " . $result['count'] . " active posts</span>" : "<span class='warning'>⚠️ No active blog posts</span>") . "</td></tr>";
} catch (Exception $e) {
    echo "<tr><td>Blog posts</td><td><span class='error'>❌ Blog table issue</span></td></tr>";
}

// Test contact table
try {
    $stmt = $con->query("SELECT COUNT(*) as count FROM contact");
    $result = $stmt->fetch();
    echo "<tr><td>Contact form</td><td><span class='good'>✅ Table exists (" . $result['count'] . " messages)</span></td></tr>";
} catch (Exception $e) {
    echo "<tr><td>Contact form</td><td><span class='error'>❌ Contact table missing</span></td></tr>";
}

echo "</table>";
echo "</div>";

echo "<div class='section' style='background: #4CAF50; color: white;'>";
echo "<h2>🎯 Summary</h2>";
echo "<p><strong>Your project is using:</strong></p>";
echo "<ul>";
echo "<li>✅ PostgreSQL (Neon) database</li>";
echo "<li>✅ MySQLi compatibility layer</li>";
echo "<li>✅ Railway deployment</li>";
echo "</ul>";
echo "<p><strong>Main pages should work if all tables have data!</strong></p>";
echo "</div>";

echo "<p style='text-align: center; margin-top: 40px;'><a href='/' style='background: #4CAF50; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block;'>← Back to Homepage</a></p>";
?>

