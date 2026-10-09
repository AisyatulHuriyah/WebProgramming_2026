<?php
session_start();

$name = trim($_POST['name'] ?? '');
$memberId = trim($_POST['member_id'] ?? '');
$address = trim($_POST['address'] ?? '');
$phone = trim($_POST['phone'] ?? '');

$errors = [];
if ($name === '') {
    $errors[] = "Name is required.";
}
if ($memberId === '') {
    $errors[] = "Member ID is required.";
} elseif (strlen($memberId) < 3) {
    $errors[] = "Member ID must be at least 3 characters.";
}
if ($address === '') {
    $errors[] = "Address is required.";
}
if ($phone === '') {
    $errors[] = "Phone is required.";
} elseif (!preg_match('/^[0-9+\-\s]+$/', $phone)) {
    $errors[] = "Phone can only contain digits, +, -, and spaces.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => implode(' ', $errors)];
    header('Location: add.php');
    exit;
}

if (!isset($_SESSION['members'])) {
    $_SESSION['members'] = [];
}

$_SESSION['members'][] = [
    'name' => $name,
    'member_id' => $memberId,
    'address' => $address,
    'phone' => $phone,
];

$_SESSION['flash'] = ['type' => 'success', 'message' => 'Member added successfully.'];
header('Location: list.php');
exit;