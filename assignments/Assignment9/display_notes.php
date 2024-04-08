<?php
require_once 'DateTimeManager.php';

$pdo = new PDO('mysql:host=localhost;dbname=khfountain', 'khfountain', 'KwFbKywK8Ss3');
$dateTimeManager = new DateTimeManager($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $startDate = $_POST['begDate'];
    $endDate = $_POST['endDate'];

    $notes = $dateTimeManager->getNotesByDateRange($startDate, $endDate);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Notes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Display Notes</h2>
        <form method="POST">
            <div class="form-group">
                <label for="begDate">Start Date:</label>
                <input type="date" class="form-control" id="begDate" name="begDate" required>
            </div>
            <div class="form-group">
                <label for="endDate">End Date:</label>
                <input type="date" class="form-control" id="endDate" name="endDate" required>
            </div>
            <button type="submit" class="btn btn-primary">Get Notes</button>
        </form>

        <?php if (!empty($notes)): ?>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Date and Time</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($notes as $note): ?>
                        <tr>
                            <td><?= date('m/d/Y h:i A', strtotime($note['timestamp'])); ?></td>
                            <td><?= $note['note']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info mt-3" role="alert">No notes found for the selected date range.</div>
        <?php endif; ?>
    </div>
</body>
</html>
