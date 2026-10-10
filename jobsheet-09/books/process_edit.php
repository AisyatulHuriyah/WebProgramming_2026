<?php
session_start();
require __DIR__ . '/../includes/connection.php';

$id = $_POST['id'] ?? null;
$title = $_POST['title'] ?? '';
$author = $_POST['author'] ?? '';
$year = $_POST['year'] ?? '';
$isbn = $_POST['isbn'] ?? '';
$stock = $_POST['stock'] ?? '';
$category = $_POST['category'] ?? '';

if (!$id) {
    header('Location: list.php');
    exit;
}

$stmt = $pdo->prepare("UPDATE books SET title = :title, author = :author, year = :year, isbn = :isbn, stock = :stock, category = :category WHERE id = :id");
$stmt->execute([
    'title' => $title,
    'author' => $author,
    'year' => (int) $year,
    'isbn' => $isbn,
    'stock' => (int) $stock,
    'category' => $category,
    'id' => $id,
]);

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Book updated successfully.'];
header('Location: list.php');
exit;