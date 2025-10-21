<?php
/**
 * Test if DATABASE_URL environment variable is set
 * Visit this file in your browser: https://your-app.railway.app/test-env.php
 */

echo "<h1>Environment Variable Test</h1>";

$database_url = getenv('DATABASE_URL');

if ($database_url) {
    echo "<p style='color: green; font-size: 20px;'>✅ DATABASE_URL is SET!</p>";
    
    // Show partial URL (hide password for security)
    $parts = parse_url($database_url);
    $safe_url = "postgresql://{$parts['user']}:****@{$parts['host']}" . $parts['path'];
    echo "<p>Connection: <code>$safe_url</code></p>";
    
    echo "<h2>Next step:</h2>";
    echo "<p>DATABASE_URL is configured correctly. The app should connect to Neon database.</p>";
    echo "<p><a href='/'>Go to Homepage</a></p>";
    
} else {
    echo "<p style='color: red; font-size: 20px;'>❌ DATABASE_URL is NOT SET!</p>";
    
    echo "<h2>To fix this:</h2>";
    echo "<ol>";
    echo "<li>Go to Railway Dashboard</li>";
    echo "<li>Click on your project</li>";
    echo "<li>Go to <strong>Variables</strong> tab</li>";
    echo "<li>Click <strong>New Variable</strong></li>";
    echo "<li>Name: <code>DATABASE_URL</code></li>";
    echo "<li>Value: <code>postgresql://neondb_owner:npg_3qhtrFepc5wj@ep-green-forest-ag0gs7i6-pooler.c-2.eu-central-1.aws.neon.tech/neondb?sslmode=require</code></li>";
    echo "<li>Click <strong>Add</strong></li>";
    echo "<li>Wait 2-3 minutes for redeploy</li>";
    echo "<li>Refresh this page</li>";
    echo "</ol>";
}

echo "<hr>";
echo "<h2>All Environment Variables:</h2>";
echo "<pre>";
foreach ($_ENV as $key => $value) {
    if (strpos($key, 'DATABASE') !== false || strpos($key, 'PG') !== false || strpos($key, 'PORT') !== false) {
        // Hide sensitive data
        if (strpos($key, 'PASSWORD') !== false || strpos($key, 'URL') !== false) {
            echo "$key = " . substr($value, 0, 20) . "...[HIDDEN]\n";
        } else {
            echo "$key = $value\n";
        }
    }
}
echo "</pre>";
?>

