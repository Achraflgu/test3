<?php
/**
 * PostgreSQL Database Connection for Neon
 * Replace your existing db_connection.php with this file
 */

// Load environment variables (for local development)
if (file_exists(__DIR__ . '/.env')) {
    $lines = file(__DIR__ . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            if (!array_key_exists($key, $_ENV)) {
                putenv("$key=$value");
                $_ENV[$key] = $value;
            }
        }
    }
}

// Database configuration
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_name = getenv('DB_NAME') ?: 'msport';
$db_user = getenv('DB_USER') ?: 'postgres';
$db_password = getenv('DB_PASSWORD') ?: '';
$db_port = getenv('DB_PORT') ?: '5432';

try {
    // PDO connection for PostgreSQL
    $dsn = "pgsql:host=$db_host;port=$db_port;dbname=$db_name;sslmode=require";
    
    $con = new PDO($dsn, $db_user, $db_password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    
    // For backward compatibility with mysqli code
    // You'll need to gradually migrate mysqli_ functions to PDO
    
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

