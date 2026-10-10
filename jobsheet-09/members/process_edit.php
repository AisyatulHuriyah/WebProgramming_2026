<?php
session_start();
require __DIR__ . '/../includes/connection.php';

$id = $_POST['id'] ?? null;
$name = $_POST['name'] ?? '';
$member_id = $_POST['member_id'] ?? '';
$phone = $_POST['phone'] ?? '';
$address = $_POST['address'] ?? '';

if (!$id) {
    header('Location: list.php');
    exit;
}

$stmt = $pdo->prepare("UPDATE members SET name = :name, member_id = :member_id, phone = :phone, address = :address WHERE id = :id");
$stmt->execute([
    'name' => $name,
    'member_id' => $member_id,
    'phone' => $phone,
    'address' => $address,
    'id' => $id,
]);

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Member updated successfully.'];
header('Location: list.php');
exit;