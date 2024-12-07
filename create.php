<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->execute([$name, $email]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>

<body>
    <h1>Create New User</h1>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>