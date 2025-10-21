<?php
/**
 * PostgreSQL Database Connection for Neon
 * Uses DATABASE_URL environment variable
 */

// Get DATABASE_URL from environment (Railway, Heroku, etc.)
$database_url = getenv('DATABASE_URL');

if (!$database_url) {
    // Fallback: Load from .env file for local development
    if (file_exists(__DIR__ . '/.env')) {
        $lines = file(__DIR__ . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
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
    // Parse DATABASE_URL (format: postgresql://user:pass@host:port/dbname?sslmode=require)
    $db_parts = parse_url($database_url);
    
    $db_host = $db_parts['host'];
    $db_port = isset($db_parts['port']) ? $db_parts['port'] : 5432;
    $db_name = ltrim($db_parts['path'], '/');
    $db_user = $db_parts['user'];
    $db_password = $db_parts['pass'];
    
    // Build DSN
    $dsn = "pgsql:host=$db_host;port=$db_port;dbname=$db_name;sslmode=require";
    
    // Create PDO connection
    $con = new PDO($dsn, $db_user, $db_password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Helper function to convert mysqli queries to PDO
function executeQuery($query, $params = []) {
    global $con;
    try {
        $stmt = $con->prepare($query);
        $stmt->execute($params);
        return $stmt;
    } catch (PDOException $e) {
        error_log("Query error: " . $e->getMessage());
        return false;
    }
}

// Helper function for SELECT queries
function fetchAll($query, $params = []) {
    $stmt = executeQuery($query, $params);
    return $stmt ? $stmt->fetchAll() : [];
}

// Helper function for single row SELECT
function fetchOne($query, $params = []) {
    $stmt = executeQuery($query, $params);
    return $stmt ? $stmt->fetch() : null;
}

// Helper function for INSERT/UPDATE/DELETE
function execute($query, $params = []) {
    $stmt = executeQuery($query, $params);
    return $stmt ? $stmt->rowCount() : 0;
}

// Helper function to get last insert ID
function getLastInsertId() {
    global $con;
    return $con->lastInsertId();
}
?>

