<?php
class Database {
    private $host = "localhost";
    private $dbname = "khfountain";
    private $username = "khfountain";
    private $password = "KwFbKywK8Ss3";

    public function connect() {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
            exit;
        }
    }
}
?>
