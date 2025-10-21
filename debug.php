<?php
/**
 * Debug page to check what's happening with database queries
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>🔍 Debug Information</h1>";

// Test 1: Check DATABASE_URL
echo "<h2>1. Environment Variable</h2>";
$database_url = getenv('DATABASE_URL');
if ($database_url) {
    $parts = parse_url($database_url);
    echo "✅ DATABASE_URL is set<br>";
    echo "Host: " . $parts['host'] . "<br>";
    echo "Database: " . ltrim($parts['path'], '/') . "<br>";
} else {
    echo "❌ DATABASE_URL not set<br>";
}

// Test 2: Include connection file
echo "<h2>2. Database Connection</h2>";
try {
    require_once 'db_connection.php';
    echo "✅ Connection file loaded<br>";
    echo "✅ Connected to database<br>";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "<br>";
    exit;
}

// Test 3: Check if tables exist
echo "<h2>3. Tables Check</h2>";
try {
    $tables = ['products', 'brands', 'pcategories', 'blog', 'customers'];
    foreach ($tables as $table) {
        $stmt = $con->query("SELECT COUNT(*) as count FROM $table");
        $result = $stmt->fetch();
        echo "✅ Table '$table': " . $result['count'] . " rows<br>";
    }
} catch (Exception $e) {
    echo "❌ Error checking tables: " . $e->getMessage() . "<br>";
}

// Test 4: Try to fetch some products
echo "<h2>4. Sample Products Query</h2>";
try {
    $stmt = $con->query("SELECT product_id, product_name, product_price FROM products LIMIT 5");
    $products = $stmt->fetchAll();
    
    if ($products) {
        echo "✅ Found " . count($products) . " products:<br><br>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Name</th><th>Price</th></tr>";
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>" . $product['product_id'] . "</td>";
            echo "<td>" . $product['product_name'] . "</td>";
            echo "<td>$" . $product['product_price'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "❌ No products found<br>";
    }
} catch (Exception $e) {
    echo "❌ Error fetching products: " . $e->getMessage() . "<br>";
}

// Test 5: Check homepage file
echo "<h2>5. Homepage Check</h2>";
if (file_exists('index.php')) {
    echo "✅ index.php exists<br>";
    
    // Check if it uses mysqli or PDO
    $content = file_get_contents('index.php');
    if (strpos($content, 'mysqli_') !== false) {
        echo "⚠️ WARNING: index.php uses mysqli functions (needs conversion to PDO)<br>";
    }
    if (strpos($content, '$con->query') !== false || strpos($content, '$con->prepare') !== false) {
        echo "✅ index.php uses PDO<br>";
    }
} else {
    echo "❌ index.php not found<br>";
}

echo "<h2>6. PHP Info</h2>";
echo "PHP Version: " . PHP_VERSION . "<br>";
echo "PDO PostgreSQL Extension: " . (extension_loaded('pdo_pgsql') ? '✅ Loaded' : '❌ Not loaded') . "<br>";

echo "<hr>";
echo "<p><a href='/'>← Back to Homepage</a></p>";
?>

