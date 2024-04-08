<?php
class DateTimeManager
{
private $pdo;

public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

public function getNotesByDateRange($startDate, $endDate)
    {
        
    }

public function addNote($timestamp, $noteContent)
    {
        try {
     $stmt = $this->pdo->prepare("INSERT INTO notes (timestamp, note) VALUES (?, ?)");
     $stmt->execute([$timestamp, $noteContent]);
     return $this->pdo->lastInsertId(); 
        } catch (PDOException $e) {
       
            error_log($e->getMessage());
       
        }
    }
}
?>
