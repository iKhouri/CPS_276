<?php

$db = new DB();
$db->query("TRUNCATE TABLE names");
$db->execute();
?>
