<?php
include_once 'Db_conn.php'; 

$db = new DB();
$db->query("TRUNCATE TABLE names");
$db->execute();
?>
