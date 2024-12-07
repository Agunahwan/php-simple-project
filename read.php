<?php
require_once 'db.php';

// Ambil ID dari parameter query
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "No user ID specified!";
    exit;
}

// Query untuk mendapatkan data user berdasarkan ID
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "User not found!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>View User Details</title>
</head>

<body>
    <h1>User Details</h1>
    <p><strong>ID:</strong> <?= htmlspecialchars($user['id']) ?></p>
    <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
    <a href="index.php">Back to Home</a>
</body>

</html>