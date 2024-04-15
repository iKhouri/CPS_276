<?php
session_start();
require 'classes/Database.php';
require 'classes/Validation.php';
require 'classes/StickyForm.php';


if (!isset($_SESSION['user_id']) || !in_array($_SESSION['user_status'], ['staff', 'admin'])) {
    header('Location: index.php?page=login');
    exit;
}

$form = new StickyForm();
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
            $address = $_POST['address'];
                $city = $_POST['city'];
                    $state = $_POST['state'];
                        $phone = $_POST['phone'];
                             $email = $_POST['email'];
                                 $dob = $_POST['dob'];
                                    $contacts = $_POST['contacts'];
                                            $age = $_POST['age'];

$form->setValue('name', $name);
$form->setValue('address', $address);
$form->setValue('city', $city);
$form->setValue('state', $state);
$form->setValue('phone', $phone);
$form->setValue('email', $email);
$form->setValue('dob', $dob);
form->setValue('contacts', $contacts);
$form->setValue('age', $age);

 $errors = false;

  
if (!Validation::validateName($name)) {
        $form->setError('name', 'Invalid name format.');
        $errors = true;
    }
if (!Validation::validateAddress($address)) {
        $form->setError('address', 'Invalid address format.');
        $errors = true;
    }
if (!Validation::validateCity($city)) {
        $form->setError('city', 'City must contain only letters and spaces.');
        $errors = true;
    }
if (!Validation::validatePhone($phone)) {
        $form->setError('phone', 'Phone format must be 999.999.9999.');
        $errors = true;
    }
if (!Validation::validateEmail($email)) {
        $form->setError('email', 'Invalid email address.');
        $errors = true;
    }
if (!Validation::validateDOB($dob)) {
        $form->setError('dob', 'Date format must be mm/dd/yyyy.');
        $errors = true;
    }

if (!$errors) {
        $db = new Database();
        $conn = $db->connect();
        $stmt = $conn->prepare("INSERT INTO contacts (name, address, city, state, phone, email, dob, contacts, age) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$name, $address, $city, $state, $phone, $email, $dob, $contacts, $age])) {
            $successMessage = "Contact Information Added";
            $form = new StickyForm(); 
        } else {
            $successMessage = "There was an error adding the record.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Add Contact</h2>
    <?php if ($successMessage): ?>
        <div class="alert alert-success"><?= $successMessage ?></div>
    <?php endif; ?>
    <form method="POST" action="index.php?page=addContact">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $form->getValue('name') ?>" required>
            <?= $form->getError('name') ?>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?= $form->getValue('address') ?>" required>
            <?= $form->getError('address') ?>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" value="<?= $form->getValue('city') ?>" required>
            <?= $form->getError('city') ?>
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <select class="form-select" id="state" name="state">
                <option value="">Select a state</option>
                <option value="AL" <?= $form->preserveSelect('state', 'AL'); ?>>Alabama</option>
                <option value="AK" <?= $form->preserveSelect('state', 'AK'); ?>>Alaska</option>
                <option value="AZ" <?= $form->preserveSelect('state', 'AZ'); ?>>Arizona</option>
                <option value="AR" <?= $form->preserveSelect('state', 'AR'); ?>>Arkansas</option>
                <option value="CA" <?= $form->preserveSelect('state', 'CA'); ?>>California</option>
            </select>
            <?= $form->getError('state') ?>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= $form->getValue('phone') ?>" required>
            <?= $form->getError('phone') ?>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $form->getValue('email') ?>" required>
            <?= $form->getError('email') ?>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" id="dob" name="dob" placeholder="mm/dd/yyyy" value="<?= $form->getValue('dob') ?>" required>
            <?= $form->getError('dob') ?>
        </div>
        <div class="mb-3">
            <label for="contacts" class="form-label">Additional Contacts</label>
            <textarea class="form-control" id="contacts" name="contacts"><?= $form->getValue('contacts') ?></textarea>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="<?= $form->getValue('age') ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

