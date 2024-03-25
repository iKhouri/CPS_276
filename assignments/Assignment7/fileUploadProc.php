<?php
require_once 'Db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $fileName = $_POST['fileName'];
            $file = $_FILES['pdfFile'];

$uploadDir = 'uploaded_files/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if ($file['size'] <= 100000 && $file['type'] == 'application/pdf') {
            $filePath = $uploadDir . $file['name'];
                move_uploaded_file($file['tmp_name'], $filePath);

            $db = new Db_conn();
             $pdo = $db->connect();
                 $stmt = $pdo->prepare("INSERT INTO files (file_name, file_path) VALUES (?, ?)");
                    $stmt->execute([$fileName, $filePath]);

        echo "File uploaded successfully!";
    } else {
        echo "Error: Please upload a PDF file under 100KB.";
    }
}
?>

