<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

session_start();

// Database connection
$conn = mysqli_connect("localhost", "root", "", "user_system");

if (!$conn) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit();
}

// Read raw JSON from React
$input = json_decode(file_get_contents("php://input"), true);

// ====================== SIGN UP ======================
if (isset($input['action']) && $input['action'] === 'signup') {
    $username = $input['username'];
    $email = $input['email'];
    $password = password_hash($input['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo json_encode(["success" => false, "message" => "Email already exists!"]);
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(["success" => true, "message" => "Signup successful!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error: " . mysqli_error($conn)]);
        }
    }
}

// ====================== LOGIN ======================
if (isset($input['action']) && $input['action'] === 'login') {
    $email = $input['email'];
    $password = $input['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        echo json_encode(["success" => true, "message" => "Login successful!", "username" => $user['username']]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid email or password!"]);
    }
}

// ====================== LOGOUT ======================
if (isset($_GET['logout'])) {
    session_destroy();
    echo json_encode(["success" => true, "message" => "Logged out successfully"]);
}

mysqli_close($conn);
?>
