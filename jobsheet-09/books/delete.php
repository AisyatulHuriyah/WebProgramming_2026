<?php
session_start();
require __DIR__ . '/../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: list.php');
    exit;
}

$id = $_POST['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM books WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Book deleted successfully.'];
}

header('Location: list.php');
exit;