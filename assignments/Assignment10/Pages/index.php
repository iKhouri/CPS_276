<?php
session_start();

if (!isset($_GET['page'])) {
    $_GET['page'] = 'login'; 
}

if (!isset($_SESSION['user_id']) && $_GET['page'] != 'login') {
    header("Location: index.php?page=login");
    exit;
}

$page = $_GET['page'];

switch ($page) {
    case 'login':
        require 'login.php';
        break;
    case 'welcome':
        require 'welcome.php';
        break;
    case 'addContact':
        require 'addContact.php';
        break;
    case 'deleteContacts':
        require 'deleteContacts.php';
        break;
    case 'addAdmin':
        require 'addAdmin.php';
        break;
    case 'deleteAdmins':
        require 'deleteAdmins.php';
        break;
    case 'logout':
        require 'logout.php';
        break;
    default:
      
        header("Location: index.php?page=login");
        exit;
}
?>
