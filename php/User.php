<?php
class User {
    public $id;
    public $username;
    public $email;
    public $password_hash;
    public $salt;
    public $role;

    public function __construct($id, $username, $email, $password_hash, $salt, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password_hash = $password_hash;
        $this->salt = $salt;
        $this->role = $role;
    }
}
?>
