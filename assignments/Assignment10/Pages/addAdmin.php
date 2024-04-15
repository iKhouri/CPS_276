<?php
session_start();
require 'classes/Database.php';

if ($_SESSION['user_status'] != 'admin') {
    header("Location: index.php?page=login");
    exit;
}

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $status = $_POST['status'];

    $check = $conn->prepare("SELECT email FROM admins WHERE email = :email");
    $check->bindParam(':email', $email);
    $check->execute();

    if ($check->rowCount() > 0) {
        $error = 'Email already exists.';
    } else {
        $stmt = $conn->prepare("INSERT INTO admins (name, email, password, status) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$name, $email, $password, $status])) {
            $success = "Admin added successfully.";
        } else {
            $error = "Failed to add admin.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
