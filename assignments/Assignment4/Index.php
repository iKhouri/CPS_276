<?php
$output = '';
if (count($_POST) > 0) {
    require_once 'addednames.php';
    $addName = new addednames();
    $output = $addName->addClearNames();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Names</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container { max-width: 600px; }
        .mt-20 { margin-top: 20px; }
        .btn-space { margin-right: 10px; }
    </style>
</head>
<body>
<div class="container mt-20">
    <h1>Add Names</h1>
    <form method="post" class="mt-20">
        <div class="form-group">
            <input type="submit" name="add" value="Add Name" class="btn btn-primary btn-space">
            <input type="submit" name="clear" value="Clear Names" class="btn btn-primary">
        </div>
        <div class="form-group">
            <label for="name">Enter Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>List of Names</label>
            <textarea name="namelist" class="form-control" readonly><?php echo htmlspecialchars($output); ?></textarea>
        </div>
    </form>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

