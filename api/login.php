<?php
header('Content-Type: application/json');

// Include your database connection file
require_once 'db_connect.php'; 

$response = ['success' => false, 'message' => 'An unexpected error occurred.'];

// Check if $conn is properly set up from db_connect.php
if (!isset($conn) || !$conn instanceof mysqli || $conn->connect_error) {
    $response['message'] = 'Database connection not established.';
    echo json_encode($response);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $username_or_email = $data['username'] ?? '';
    $entered_password = $data['password'] ?? ''; // Plain password entered by user

    if (empty($username_or_email) || empty($entered_password)) {
        $response['message'] = 'Please enter both username/email and password.';
        echo json_encode($response);
        exit();
    }

    // Sanitize input using mysqli_real_escape_string
    $username_or_email_escaped = $conn->real_escape_string($username_or_email);

    try {
        // Prepare a SQL statement to fetch the user by username or email
        // Fetching the 'password' column (which now stores plain text)
        $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE username = ? OR email = ? LIMIT 1");
        
        if ($stmt === false) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("ss", $username_or_email_escaped, $username_or_email_escaped);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close(); // Close the statement

        if ($user) {
            // User found, now compare the plain password directly
            // --- SECURITY WARNING: Direct comparison of plain passwords is NOT recommended for production. ---
            if ($entered_password === $user['password']) { // DIRECT COMPARISON
                // Password is correct!
                $response['success'] = true;
                $response['message'] = 'Login successful!';
                // Return less sensitive user data
                $response['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email']
                ];
            } else {
                // Password does not match
                $response['message'] = 'Invalid username/email or password.';
            }
        } else {
            // User not found
            $response['message'] = 'Invalid username/email or password.';
        }

    } catch (Exception $e) {
        error_log("Database error during login: " . $e->getMessage());
        $response['message'] = 'A database error occurred. Please try again later.';
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
