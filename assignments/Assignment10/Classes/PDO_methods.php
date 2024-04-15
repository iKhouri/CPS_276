<?php
require_once 'Database.php';  

class PDO_Methods {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->connect();
    }

    public function select($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("PDO select error: " . $e->getMessage());
        }
    }


    public function insert($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $this->pdo->lastInsertId();  
        } catch (PDOException $e) {
            die("PDO insert error: " . $e->getMessage());
        }
    }

   
    public function update($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->rowCount();  
        } catch (PDOException $e) {
            die("PDO update error: " . $e->getMessage());
        }
    }

    public function delete($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->rowCount();  
        } catch (PDOException $e) {
            die("PDO delete error: " . $e->getMessage());
        }
    }
}

?>
