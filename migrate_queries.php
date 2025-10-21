<?php
/**
 * MySQL to PostgreSQL Query Migration Helper
 * 
 * This script scans PHP files and identifies MySQL-specific code
 * that needs to be updated for PostgreSQL compatibility
 */

function scanDirectory($dir, $extensions = ['php']) {
    $files = [];
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir)
    );
    
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $ext = pathinfo($file->getFilename(), PATHINFO_EXTENSION);
            if (in_array($ext, $extensions)) {
                $files[] = $file->getPathname();
            }
        }
    }
    
    return $files;
}

function checkFile($filepath) {
    $content = file_get_contents($filepath);
    $issues = [];
    
    // Check for mysqli functions
    if (preg_match('/mysqli_/i', $content)) {
        $issues[] = "Uses mysqli_* functions - needs conversion to PDO";
    }
    
    // Check for MySQL-specific SQL
    $patterns = [
        '/LIMIT\s+\d+\s*,\s*\d+/i' => 'LIMIT x,y syntax - should be LIMIT y OFFSET x',
        '/AUTO_INCREMENT/i' => 'AUTO_INCREMENT - should use SERIAL',
        '/TINYINT/i' => 'TINYINT - should use SMALLINT or BOOLEAN',
        '/UNSIGNED/i' => 'UNSIGNED - not supported in PostgreSQL',
        '/`([^`]+)`/' => 'Backticks for identifiers - use double quotes',
        '/ENGINE\s*=/i' => 'ENGINE clause - not needed in PostgreSQL',
        '/CHARSET\s*=/i' => 'CHARSET clause - not needed in PostgreSQL',
        '/NOW\(\)/i' => 'NOW() - use CURRENT_TIMESTAMP',
        '/CONCAT\(/i' => 'CONCAT() - might need || operator instead',
    ];
    
    foreach ($patterns as $pattern => $message) {
        if (preg_match($pattern, $content)) {
            $issues[] = $message;
        }
    }
    
    return $issues;
}

// Main execution
echo "=== MySQL to PostgreSQL Migration Scanner ===\n\n";

$directories = ['.'];
$exclude = ['vendor', 'node_modules', 'assets', '.git'];

foreach ($directories as $dir) {
    if (!is_dir($dir)) continue;
    
    echo "Scanning directory: $dir\n";
    echo str_repeat('-', 50) . "\n";
    
    $files = scanDirectory($dir);
    
    foreach ($files as $file) {
        // Skip excluded directories
        $skip = false;
        foreach ($exclude as $exc) {
            if (strpos($file, $exc) !== false) {
                $skip = true;
                break;
            }
        }
        if ($skip) continue;
        
        $issues = checkFile($file);
        
        if (!empty($issues)) {
            echo "\n📄 File: " . str_replace(getcwd() . DIRECTORY_SEPARATOR, '', $file) . "\n";
            foreach ($issues as $issue) {
                echo "   ⚠️  $issue\n";
            }
        }
    }
}

echo "\n" . str_repeat('=', 50) . "\n";
echo "Scan complete!\n\n";

echo "📝 Next Steps:\n";
echo "1. Replace mysqli_* functions with PDO\n";
echo "2. Update SQL syntax for PostgreSQL\n";
echo "3. Test all database operations\n";
echo "4. Update db_connection.php to use PostgreSQL\n";
echo "\nSee db_connection_postgres.php for the new connection file.\n";
?>

