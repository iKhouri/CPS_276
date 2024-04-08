<?php
class NotesManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getNotesByDateRange($startDate, $endDate) {
      
        $sql = "SELECT date_time, note FROM note WHERE date_time BETWEEN :begDate AND :endDate ORDER BY date_time DESC";
        $stmt = $this->pdo->prepare($sql);

       
        $stmt->bindParam(':begDate', $startDate);
        $stmt->bindParam(':endDate', $endDate);

        $stmt->execute();

   
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


$pdo = new PDO('mysql:host=localhost;dbname=khfountain', 'khfountain', 'KwFbKywK8Ss3');
$notesManager = new NotesManager($pdo);

$startDate = '2024-04-01 00:00:00';
$endDate = '2024-04-07 23:59:59';

$notes = $notesManager->getNotesByDateRange($startDate, $endDate);

if (!empty($notes)) {
    echo '<table>';
    echo '<tr><th>Date Time</th><th>Note</th></tr>';
    foreach ($notes as $note) {
        echo '<tr>';
        echo '<td>' . date('m/d/Y h:i A', strtotime($note['date_time'])) . '</td>';
        echo '<td>' . $note['note'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No notes found for the selected date range.';
}
?>
