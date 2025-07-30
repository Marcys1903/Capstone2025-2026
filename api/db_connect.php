<?php
// Database connection parameters
define('DB_HOST', 'localhost'); // Your MySQL host (usually 'localhost' for XAMPP)
define('DB_USER', 'root');     // Your MySQL username (default for XAMPP is 'root')
define('DB_PASS', '');         // Your MySQL password (default for XAMPP is empty)
define('DB_NAME', 'qcalerto_db'); // The database name you created

// Create connection
$conn = null; // Initialize $conn to null
try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        // Ensure header is set before dying
        header('Content-Type: application/json');
        die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]));
    }

    // Set character set to UTF-8 for proper handling of special characters
    $conn->set_charset("utf8mb4");

} catch (Exception $e) {
    // Catch any other exceptions during connection
    header('Content-Type: application/json');
    die(json_encode(['success' => false, 'message' => 'Database connection exception: ' . $e->getMessage()]));
}

// The $conn variable (mysqli object) is now available for other scripts that include this file.
?>
