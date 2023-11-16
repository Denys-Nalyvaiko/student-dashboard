<?php
session_start();
require_once 'php/User.php';
require_once 'php/Databse.php';

$db = new Database();

function generateSalt($length = 32) {
    return bin2hex(random_bytes($length));
}

function hashPassword($password, $salt) {
    return hash('sha512', $password . $salt);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $loginInput = $_POST['loginInput'];
    $password = $_POST['password'];

    if (filter_var($loginInput, FILTER_VALIDATE_EMAIL)) {
        $user = $db->getUserByEmail($loginInput);
    } else {
        $user = $db->getUserByUsername($loginInput);
    }

    if ($user && hashPassword($password, $user->salt) === $user->password_hash) {
        $_SESSION['user_id'] = $user->id;
        echo "Zalogowano pomyślnie!";
    } else {
        echo "Błąd logowania.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 'User';

    if ($db->getUserByUsername($username) || $db->getUserByEmail($email)) {
        echo "Użytkownik o podanej nazwie użytkownika lub emailu już istnieje.";
    } else {
        $salt = generateSalt();
        $hashedPassword = hashPassword($password, $salt);

        if ($db->createUserWithRole($username, $email, $hashedPassword, $salt, $role)) {
            echo "Rejestracja pomyślna!";
        } else {
            echo "Błąd rejestracji.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
</head>
<body>

    <h1>Login</h1>
    <form method="post" action="index.php">
        <label for="loginInput">Username or Email:</label>
        <input type="text" name="loginInput" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="login">Login</button>
    </form>

    <h1>Register</h1>
    <form method="post" action="index.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="register">Register</button>
    </form>

</body>
</html>
