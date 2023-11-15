<?php
require_once 'php/db.php';

session_start();

// Generate salt
function generateSalt($length = 32) {
    return bin2hex(random_bytes($length));
}

// Hash password
function hashPassword($password, $salt) {
    return hash('sha512', $password . $salt);
}

// Connect with Data Base
$db = new Database();

// Login user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $db->getUserByUsername($username);

    if ($user && hashPassword($password, $user['salt']) === $user['password_hash']) {
        $_SESSION['user_id'] = $user['id'];
        echo "Login success!";
    } else {
        echo "Login error";
    }
}

// Register new user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $salt = generateSalt();
    $hashedPassword = hashPassword($password, $salt);

    if ($db->createUser($username, $hashedPassword, $salt)) {
        echo "Register success!";
    } else {
        echo "Register error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="login">Login</button>
    </form>

    <h1>Register</h1>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>