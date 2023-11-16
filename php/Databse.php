<?php
class Database {
    private $host = 'db';
    private $port = 5432;
    private $db = 'db';
    private $user = 'docker';
    private $password = 'docker';
    private $conn;

    public function __construct() {
        $this->conn = new PDO("pgsql:host={$this->host};port={$this->port};dbname={$this->db};user={$this->user};password={$this->password}");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getUserByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$userData) {
            return null;
        }

        return new User($userData['id'], $userData['username'], $userData['email'], $userData['password_hash'], $userData['salt'], $userData['role']);
    }

    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$userData) {
            return null;
        }

        return new User($userData['id'], $userData['username'], $userData['email'], $userData['password_hash'], $userData['salt'], $userData['role']);
    }

    public function createUserWithRole($username, $email, $passwordHash, $salt, $role) {
        $stmt = $this->conn->prepare("INSERT INTO users (username, email, password_hash, salt, role) VALUES (:username, :email, :passwordHash, :salt, :role)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':passwordHash', $passwordHash);
        $stmt->bindParam(':salt', $salt);
        $stmt->bindParam(':role', $role);
        return $stmt->execute();
    }
}
?>
