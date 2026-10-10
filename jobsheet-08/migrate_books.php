<?php
require __DIR__ . '/includes/connection.php';

$jsonPath = __DIR__ . '/../jobsheet-06/data/books.json';

if (!file_exists($jsonPath)) {
    die("File JSON tidak ditemukan: $jsonPath\n");
}

$json = file_get_contents($jsonPath);
$data = json_decode($json, true);

if (!is_array($data)) {
    die("Format JSON tidak valid.\n");
}

$stmt = $pdo->prepare("
    INSERT INTO books (title, author, year, isbn, stock, category)
    VALUES (:title, :author, :year, :isbn, :stock, :category)
");

$jumlah = 0;

foreach ($data as $b) {
    $stmt->execute([
        'title'    => $b['title'] ?? '',
        'author'   => $b['author'] ?? '',
        'year'     => (int)($b['year'] ?? 0),
        'isbn'     => $b['isbn'] ?? null,
        'stock'    => (int)($b['stock'] ?? 0),
        'category' => $b['category'] ?? null,
    ]);
    $jumlah++;
}

echo "Migrasi selesai: $jumlah buku dimasukkan.\n";
