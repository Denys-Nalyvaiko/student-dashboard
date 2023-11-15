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

    // Login a user by username
    public function getUserByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Register new user
    public function createUser($username, $passwordHash, $salt) {
        $stmt = $this->conn->prepare("INSERT INTO users (username, password_hash, salt) VALUES (:username, :passwordHash, :salt)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':passwordHash', $passwordHash);
        $stmt->bindParam(':salt', $salt);
        return $stmt->execute();
    }
}
?>
