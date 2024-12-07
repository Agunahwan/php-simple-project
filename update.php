<?php
require_once 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->execute([$name, $email, $id]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h1>Update User</h1>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
        <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
