<?php
include_once 'Db_conn.php'; 
$db = new DB();
$db->query("SELECT * FROM names ORDER BY name ASC");
$rows = $db->resultset();

$namesHTML = "";
foreach ($rows as $row) {
    $namesHTML .= "<p>{$row['name']}</p>";
}


echo json_encode(array("names" => $namesHTML));
?>

