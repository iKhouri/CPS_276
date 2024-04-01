<?php
include_once 'Db_conn.php'; 

$name = isset($_POST['name']) ? $_POST['name'] : '';
$nameParts = explode(' ', $name);
$lastName = isset($nameParts[0]) ? $nameParts[0] : '';
$firstName = isset($nameParts[1]) ? $nameParts[1] : '';

$rearrangedName = $lastName . ', ' . $firstName;

$db = new DB();
$db->query("INSERT INTO names (name) VALUES (:name)");
$db->bind(':name', $rearrangedName);
$db->execute();
?>

