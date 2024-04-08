<?php
require_once 'DateTimeManager.php';

$pdo = new PDO('mysql:host=localhost;dbname=khfountain', 'khfountain', 'KwFbKywK8Ss3');
$dateTimeManager = new DateTimeManager($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dateTime = $_POST['dateTime'];
    $note = $_POST['note'];

    if ($dateTimeManager->addNote($dateTime, $note)) {
        echo '<div class="alert alert-success" role="alert">Note added successfully.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Please enter a valid date, time, and note.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Note</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Note</h2>
        <form method="POST">
            <div class="form-group">
                <label for="dateTime">Date and Time:</label>
                <input type="datetime-local" class="form-control" id="dateTime" name="dateTime" required>
            </div>
            <div class="form-group">
                <label for="note">Note:</label>
                <textarea class="form-control" id="note" name="note" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
        </form>
    </div>
</body>
</html>
