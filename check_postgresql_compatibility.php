<?php
/**
 * PostgreSQL Compatibility Checker
 * Scans all PHP files for PostgreSQL compatibility issues
 */

echo "<h1>PostgreSQL Compatibility Check</h1>";
echo "<style>
    body { font-family: Arial; margin: 20px; }
    .good { color: green; }
    .warning { color: orange; }
    .error { color: red; }
    table { border-collapse: collapse; width: 100%; margin: 20px 0; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background-color: #4CAF50; color: white; }
    .file-path { font-family: monospace; font-size: 12px; }
</style>";

$issues = [];
$warnings = [];
$goodFiles = 0;

// Function to scan a file for issues
function scanFile($filePath) {
    global $issues, $warnings, $goodFiles;
    
    if (!file_exists($filePath)) return;
    
    $content = file_get_contents($filePath);
    $fileIssues = [];
    $fileWarnings = [];
    
    // Check for mysqli functions (should use compatibility layer)
    if (preg_match('/mysqli_connect\s*\(/i', $content)) {
        $fileWarnings[] = "Uses mysqli_connect (compatibility layer will handle)";
    }
    
    // Check for MySQL-specific SQL syntax
    if (preg_match('/AUTO_INCREMENT/i', $content)) {
        $fileIssues[] = "Uses AUTO_INCREMENT (PostgreSQL uses SERIAL)";
    }
    
    // Check for direct variable insertion (SQL injection risk)
    if (preg_match('/\$_(GET|POST|REQUEST|COOKIE)\[[^\]]+\].*["\'].*WHERE/i', $content)) {
        $fileIssues[] = "Potential SQL injection - direct variable in query";
    }
    
    // Check for LIMIT without OFFSET compatibility
    if (preg_match('/LIMIT\s+\d+\s*,\s*\d+/i', $content)) {
        $fileIssues[] = "MySQL LIMIT syntax (use LIMIT x OFFSET y for PostgreSQL)";
    }
    
    // Check for backticks (MySQL identifier quotes)
    if (preg_match('/`[a-zA-Z_]+`/', $content)) {
        $fileWarnings[] = "Uses backticks for identifiers (PostgreSQL uses double quotes)";
    }
    
    // Check for CONCAT vs ||
    if (preg_match('/CONCAT\s*\(/i', $content)) {
        $fileWarnings[] = "Uses CONCAT (PostgreSQL prefers || operator)";
    }
    
    if (!empty($fileIssues)) {
        $issues[$filePath] = $fileIssues;
    } elseif (!empty($fileWarnings)) {
        $warnings[$filePath] = $fileWarnings;
    } else {
        $goodFiles++;
    }
}

// Scan all PHP files
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator(__DIR__),
    RecursiveIteratorIterator::SELF_FIRST
);

$phpFiles = [];
foreach ($files as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $path = $file->getPathname();
        // Skip vendor directory
        if (strpos($path, 'vendor') === false && 
            strpos($path, 'node_modules') === false) {
            $phpFiles[] = str_replace(__DIR__ . DIRECTORY_SEPARATOR, '', $path);
        }
    }
}

// Scan each file
foreach ($phpFiles as $file) {
    scanFile($file);
}

// Display results
echo "<h2>📊 Summary</h2>";
echo "<table>";
echo "<tr><th>Status</th><th>Count</th></tr>";
echo "<tr class='error'><td>❌ Critical Issues</td><td>" . count($issues) . "</td></tr>";
echo "<tr class='warning'><td>⚠️ Warnings</td><td>" . count($warnings) . "</td></tr>";
echo "<tr class='good'><td>✅ Clean Files</td><td>$goodFiles</td></tr>";
echo "<tr><td><strong>Total Scanned</strong></td><td><strong>" . count($phpFiles) . "</strong></td></tr>";
echo "</table>";

// Display critical issues
if (!empty($issues)) {
    echo "<h2 class='error'>❌ Critical Issues (Need Fixing)</h2>";
    echo "<table>";
    echo "<tr><th>File</th><th>Issues</th></tr>";
    foreach ($issues as $file => $fileIssues) {
        echo "<tr>";
        echo "<td class='file-path'>$file</td>";
        echo "<td><ul>";
        foreach ($fileIssues as $issue) {
            echo "<li>$issue</li>";
        }
        echo "</ul></td>";
        echo "</tr>";
    }
    echo "</table>";
}

// Display warnings
if (!empty($warnings)) {
    echo "<h2 class='warning'>⚠️ Warnings (Should Work with Compatibility Layer)</h2>";
    echo "<table>";
    echo "<tr><th>File</th><th>Warnings</th></tr>";
    foreach ($warnings as $file => $fileWarnings) {
        echo "<tr>";
        echo "<td class='file-path'>$file</td>";
        echo "<td><ul>";
        foreach ($fileWarnings as $warning) {
            echo "<li>$warning</li>";
        }
        echo "</ul></td>";
        echo "</tr>";
    }
    echo "</table>";
}

echo "<h2>✅ Compatibility Status</h2>";
if (count($issues) == 0) {
    echo "<p class='good'>✅ <strong>No critical PostgreSQL compatibility issues found!</strong></p>";
    echo "<p>Your project should work with PostgreSQL using the mysqli compatibility layer.</p>";
} else {
    echo "<p class='error'>❌ Found " . count($issues) . " file(s) with critical issues that need fixing.</p>";
}

echo "<hr>";
echo "<p><a href='/'>← Back to Homepage</a> | <a href='/debug.php'>Debug Page</a></p>";
?>

