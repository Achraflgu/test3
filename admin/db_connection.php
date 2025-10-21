<?php
/**
 * PostgreSQL Database Connection for Admin Panel
 * Uses DATABASE_URL environment variable
 */

// Get DATABASE_URL from environment
$database_url = getenv('DATABASE_URL');

if (!$database_url) {
    // Fallback: Load from .env file
    if (file_exists(__DIR__ . '/../.env')) {
        $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos($line, 'DATABASE_URL=') === 0) {
                $database_url = trim(substr($line, 13));
                break;
            }
        }
    }
}

if (!$database_url) {
    die("DATABASE_URL environment variable not set");
}

try {
    // Parse DATABASE_URL
    $db_parts = parse_url($database_url);
    
    $db_host = $db_parts['host'];
    $db_port = isset($db_parts['port']) ? $db_parts['port'] : 5432;
    $db_name = ltrim($db_parts['path'], '/');
    $db_user = $db_parts['user'];
    $db_password = $db_parts['pass'];
    
    // Create PDO connection
    $dsn = "pgsql:host=$db_host;port=$db_port;dbname=$db_name;sslmode=require";
    $conn = new PDO($dsn, $db_user, $db_password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    
    // For backward compatibility, also create $con variable
    $con = $conn;
    
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
