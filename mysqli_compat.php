<?php
/**
 * MySQLi Compatibility Layer for PostgreSQL PDO
 * This allows old mysqli code to work with PostgreSQL
 */

// Make sure we have the PDO connection
if (!isset($con)) {
    require_once __DIR__ . '/db_connection.php';
}

// Create a global mysqli-compatible connection variable
$conn = $con;

/**
 * mysqli_query compatibility
 */
function mysqli_query($connection, $query) {
    global $con;
    try {
        $stmt = $con->query($query);
        return $stmt;
    } catch (PDOException $e) {
        error_log("Query error: " . $e->getMessage());
        return false;
    }
}

/**
 * mysqli_fetch_array compatibility
 */
function mysqli_fetch_array($result, $type = MYSQLI_BOTH) {
    if (!$result) return null;
    
    try {
        if ($type === MYSQLI_ASSOC) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } elseif ($type === MYSQLI_NUM) {
            return $result->fetch(PDO::FETCH_NUM);
        } else {
            return $result->fetch(PDO::FETCH_BOTH);
        }
    } catch (Exception $e) {
        return null;
    }
}

/**
 * mysqli_fetch_assoc compatibility
 */
function mysqli_fetch_assoc($result) {
    if (!$result) return null;
    try {
        return $result->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        return null;
    }
}

/**
 * mysqli_num_rows compatibility
 */
function mysqli_num_rows($result) {
    if (!$result) return 0;
    try {
        return $result->rowCount();
    } catch (Exception $e) {
        return 0;
    }
}

/**
 * mysqli_real_escape_string compatibility
 */
function mysqli_real_escape_string($connection, $string) {
    global $con;
    // For PDO, we should use prepared statements, but for compatibility:
    return addslashes($string);
}

/**
 * mysqli_insert_id compatibility
 */
function mysqli_insert_id($connection) {
    global $con;
    try {
        return $con->lastInsertId();
    } catch (Exception $e) {
        return 0;
    }
}

/**
 * mysqli_error compatibility
 */
function mysqli_error($connection) {
    global $con;
    $error = $con->errorInfo();
    return isset($error[2]) ? $error[2] : '';
}

/**
 * mysqli_affected_rows compatibility
 */
function mysqli_affected_rows($connection) {
    // This is tricky with PDO, return 0 as default
    return 0;
}

/**
 * mysqli_free_result compatibility
 */
function mysqli_free_result($result) {
    // PDO doesn't require this, but we'll keep for compatibility
    return true;
}

/**
 * mysqli_close compatibility
 */
function mysqli_close($connection) {
    // PDO handles this automatically
    return true;
}

// Define mysqli constants if not already defined
if (!defined('MYSQLI_ASSOC')) define('MYSQLI_ASSOC', PDO::FETCH_ASSOC);
if (!defined('MYSQLI_NUM')) define('MYSQLI_NUM', PDO::FETCH_NUM);
if (!defined('MYSQLI_BOTH')) define('MYSQLI_BOTH', PDO::FETCH_BOTH);

?>

