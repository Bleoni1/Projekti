<?php
class User {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function register($name, $email, $password, $role = 'user') {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $query = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssss", $name, $email, $hashedPassword, $role);
    
        return $stmt->execute();
    }
    
    public function login($email, $password) {
        $query = "SELECT id, name, email, password, role FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name, $email, $hashedPassword, $role);
            $stmt->fetch();

            if (password_verify($password, $hashedPassword)) {
                $_SESSION["id"] = $id;
                $_SESSION["user_name"] = $name;
                $_SESSION["user_role"] = $role; // Save the role in the session
                return true;
            }
        }

        return false; // Invalid login
    }
    public function getUserByEmail($email) {
        $query = "SELECT id, name FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name);
            $stmt->fetch();

            return [
                'id' => $id,
                'name' => $name,
            ];
        }

        return null;
    }
    public function logout() {
        session_start(); // Ensure the session is started
        session_unset(); // Unset all session variables
        session_destroy(); // Destroy the session

        // Redirect to the login page or any other desired page after logout
        header("Location: index.php");
        exit();
    }
}
