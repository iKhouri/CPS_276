<?php
require_once 'Db_conn.php';

function getListOfFiles() {
    $db = new Db_conn();
    $pdo = $db->connect();
    $stmt = $pdo->query("SELECT * FROM files");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>


