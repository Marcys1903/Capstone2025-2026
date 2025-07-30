<?php
header('Content-Type: application/json');

// Include your database connection file
require_once 'db_connect.php'; 

$response = ['success' => false, 'message' => 'Registration failed.'];

// Check if $conn is properly set up from db_connect.php
if (!isset($conn) || !$conn instanceof mysqli || $conn->connect_error) {
    $response['message'] = 'Database connection not established.';
    echo json_encode($response);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $username = $data['username'] ?? '';
    $email = $data['email'] ?? '';
    $password = $data['password'] ?? ''; // Plain password
    $confirm_password = $data['confirm_password'] ?? '';

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $response['message'] = 'All fields are required.';
        echo json_encode($response);
        exit();
    }

    if ($password !== $confirm_password) {
        $response['message'] = 'Passwords do not match.';
        echo json_encode($response);
        exit();
    }

    // --- SECURITY WARNING: Storing plain passwords is NOT recommended for production. ---
    // The $password variable now holds the plain password.

    // Sanitize inputs using mysqli_real_escape_string
    $username_escaped = $conn->real_escape_string($username);
    $email_escaped = $conn->real_escape_string($email);
    $password_escaped = $conn->real_escape_string($password); // Escape plain password

    try {
        // Check if username or email already exists
        $stmt_check = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ? LIMIT 1");
        if ($stmt_check === false) {
            throw new Exception("Prepare failed on user check: " . $conn->error);
        }
        $stmt_check->bind_param("ss", $username_escaped, $email_escaped);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();
        
        if ($result_check->num_rows > 0) {
            $response['message'] = 'Username or Email already exists.';
        } else {
            // Insert the new user into the database
            // The 'password' column will now store the plain password
            $stmt_insert = $conn->prepare("INSERT INTO users (username, email, password, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())");
            if ($stmt_insert === false) {
                throw new Exception("Prepare failed on user insert: " . $conn->error);
            }
            // Binding the plain password directly
            $stmt_insert->bind_param("sss", $username_escaped, $email_escaped, $password_escaped); 
            
            if ($stmt_insert->execute()) {
                $response['success'] = true;
                $response['message'] = 'Registration successful! You can now log in.';
            } else {
                $response['message'] = 'Failed to register user: ' . $stmt_insert->error;
            }
        }
        $stmt_check->close(); // Close the check statement
        if (isset($stmt_insert) && $stmt_insert !== false) {
            $stmt_insert->close(); // Close the insert statement if it was prepared
        }

    } catch (Exception $e) {
        error_log("Database error during registration: " . $e->getMessage());
        $response['message'] = 'A database error occurred during registration. Please try again later.';
        // For development, uncomment the line below to show specific database errors to the user
        // $response['debug_message'] = $e->getMessage(); 
    } finally {
        // Close the database connection if it was opened by this script
        // Note: db_connect.php already handles closing if it dies, but this ensures it if not.
        if (isset($conn) && $conn instanceof mysqli && !$conn->connect_error) {
            // $conn->close(); // Only close if it's not being reused by other scripts in the same request
        }
    }
} else {
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
?>
